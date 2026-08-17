(function() {
    // Icons
    const icons = {
        reader: `<svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>`,
        close: `<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`,
        play: `<svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>`,
        pause: `<svg viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>`,
        back: `<svg viewBox="0 0 24 24"><polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line></svg>`,
        next: `<svg viewBox="0 0 24 24"><polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line></svg>`,
        autoNext: `<svg viewBox="0 0 24 24"><path d="M13 17l5-5-5-5M6 17l5-5-5-5" fill="none" stroke="currentColor" stroke-width="2"></path></svg>`
    };

    // State
    const synth = window.speechSynthesis;
    let readingNodes = [];
    let currentIndex = -1;
    let isPlaying = false;
    let autoNextEnabled = localStorage.getItem('readerAutoNext') !== 'false';

    // Create UI Elements
    const container = document.createElement('div');
    container.className = 'reader-controls';

    const navContainer = document.createElement('div');
    navContainer.className = 'reader-nav-controls';

    const autoNextBtn = document.createElement('button');
    autoNextBtn.className = 'reader-btn reader-btn-small reader-btn-auto-next';
    autoNextBtn.innerHTML = icons.autoNext;
    autoNextBtn.title = 'Auto-Next Page: ' + (autoNextEnabled ? 'ON' : 'OFF');
    if (autoNextEnabled) autoNextBtn.classList.add('active');

    const backBtn = document.createElement('button');
    backBtn.className = 'reader-btn reader-btn-small';
    backBtn.innerHTML = icons.back;
    backBtn.title = 'Previous Paragraph';

    const nextBtn = document.createElement('button');
    nextBtn.className = 'reader-btn reader-btn-small';
    nextBtn.innerHTML = icons.next;
    nextBtn.title = 'Next Paragraph';

    const playBtn = document.createElement('button');
    playBtn.className = 'reader-btn reader-btn-play';
    playBtn.innerHTML = icons.play;
    playBtn.title = 'Read Aloud';

    const readerBtn = document.createElement('button');
    readerBtn.className = 'reader-btn reader-btn-toggle';
    readerBtn.innerHTML = icons.reader;
    readerBtn.title = 'Toggle Reader Mode';

    navContainer.appendChild(autoNextBtn);
    navContainer.appendChild(backBtn);
    navContainer.appendChild(nextBtn);
    container.appendChild(navContainer);
    container.appendChild(playBtn);
    container.appendChild(readerBtn);
    document.body.appendChild(container);

    // Navigation Logic
    function getNextPageUrl() {
        // Broaden the search to any link that looks like a documentation link
        const links = Array.from(document.querySelectorAll('aside a, .sidebar a, #sidebar a, nav a, .navigation a'));
        const currentUrl = decodeURI(window.location.href.split('#')[0]);
        
        // Filter for local HTML documentation links and normalize
        const docLinks = links.filter(a => {
            const href = decodeURI(a.href.split('#')[0]);
            return href.includes('Laravel 13') && href.endsWith('.html');
        });

        // Unique links only to avoid duplicates
        const uniqueLinks = [];
        const seen = new Set();
        for (const a of docLinks) {
            const href = decodeURI(a.href.split('#')[0]);
            if (!seen.has(href)) {
                seen.add(href);
                uniqueLinks.push(a);
            }
        }

        const index = uniqueLinks.findIndex(a => decodeURI(a.href.split('#')[0]) === currentUrl);
        console.log('Reader: Current Page Index:', index, 'Total Unique Pages:', uniqueLinks.length);

        if (index !== -1 && index < uniqueLinks.length - 1) {
            const nextUrl = uniqueLinks[index + 1].href;
            console.log('Reader: Next URL found:', nextUrl);
            return nextUrl;
        }
        
        console.warn('Reader: No next page found in navigation.');
        return null;
    }

    // Initialize Reading Nodes
    function refreshNodes() {
        const main = document.getElementById('main-content');
        if (!main) return;
        
        readingNodes = Array.from(main.querySelectorAll('p, h1, h2, h3, li')).filter(node => {
            return !node.closest('pre') && !node.closest('.code-container') && node.innerText.trim().length > 0;
        });

        readingNodes.forEach((node, index) => {
            node.onclick = (e) => {
                if (!document.body.classList.contains('reader-mode')) return;
                e.stopPropagation();
                startReading(index);
            };
        });
    }

    // TTS Control Functions
    function startReading(index) {
        if (index < 0 || index >= readingNodes.length) {
            handleEndOfPage();
            return;
        }

        currentIndex = index;
        const node = readingNodes[index];
        
        readingNodes.forEach(n => n.classList.remove('tts-active-node'));
        node.classList.add('tts-active-node');
        node.scrollIntoView({ behavior: 'smooth', block: 'center' });

        const utterance = new SpeechSynthesisUtterance(node.innerText);
        const voices = synth.getVoices();
        const preferredVoice = voices.find(v => v.lang.startsWith('en') && (v.name.includes('Google') || v.name.includes('Natural'))) || voices[0];
        if (preferredVoice) utterance.voice = preferredVoice;

        utterance.onstart = () => {
            isPlaying = true;
            playBtn.innerHTML = icons.pause;
        };

        utterance.onend = () => {
            if (currentIndex < readingNodes.length - 1) {
                startReading(currentIndex + 1);
            } else {
                handleEndOfPage();
            }
        };

        synth.cancel();
        synth.speak(utterance);
    }

    function handleEndOfPage() {
        if (autoNextEnabled) {
            const nextUrl = getNextPageUrl();
            if (nextUrl) {
                console.log('Reader: Auto-navigating to next page...');
                localStorage.setItem('readerAutoPlay', 'true');
                window.location.href = nextUrl;
                return;
            }
        }
        stopReading();
    }

    function stopReading() {
        synth.cancel();
        isPlaying = false;
        currentIndex = -1;
        playBtn.innerHTML = icons.play;
        readingNodes.forEach(n => n.classList.remove('tts-active-node'));
    }

    // Event Listeners
    readerBtn.addEventListener('click', () => {
        const isReader = document.body.classList.toggle('reader-mode');
        readerBtn.innerHTML = isReader ? icons.close : icons.reader;
        if (isReader) {
            refreshNodes();
            if (localStorage.getItem('readerAutoPlay') !== 'true') {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        } else {
            stopReading();
        }
    });

    playBtn.addEventListener('click', () => {
        if (isPlaying) {
            if (synth.paused) {
                synth.resume();
                playBtn.innerHTML = icons.pause;
            } else {
                synth.pause();
                playBtn.innerHTML = icons.play;
            }
        } else {
            startReading(currentIndex === -1 ? 0 : currentIndex);
        }
    });

    backBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        if (currentIndex > 0) startReading(currentIndex - 1);
    });

    nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        if (currentIndex < readingNodes.length - 1) startReading(currentIndex + 1);
        else handleEndOfPage();
    });

    autoNextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        autoNextEnabled = !autoNextEnabled;
        localStorage.setItem('readerAutoNext', autoNextEnabled);
        autoNextBtn.classList.toggle('active', autoNextEnabled);
        autoNextBtn.title = 'Auto-Next Page: ' + (autoNextEnabled ? 'ON' : 'OFF');
        console.log('Reader: Auto-Next toggled:', autoNextEnabled);
    });

    // Handle page unload
    window.addEventListener('beforeunload', () => synth.cancel());

    // Auto-Play Logic on Page Load
    window.addEventListener('load', () => {
        refreshNodes();
        if (localStorage.getItem('readerAutoPlay') === 'true') {
            localStorage.removeItem('readerAutoPlay');
            setTimeout(() => {
                document.body.classList.add('reader-mode');
                readerBtn.innerHTML = icons.close;
                startReading(0);
            }, 500);
        }
    });
})();
