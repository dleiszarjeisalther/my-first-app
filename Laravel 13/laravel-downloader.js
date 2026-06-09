/**
 * Laravel 13.x Documentation Downloader (Numbered Version)
 * Run this in the browser console on https://laravel.com/docs/13.x
 * This version supports numbered folders and files as per laravel13.txt.
 */

(async function() {
    const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));
    
    const sections = [];
    const headings = Array.from(document.querySelectorAll('h2'));
    
    headings.forEach((h2, sectionIdx) => {
        const sectionName = `${(sectionIdx + 1).toString().padStart(2, '0')}${h2.innerText.trim()}`;
        let next = h2.nextElementSibling;
        const links = [];
        let fileIdx = 1;
        
        while (next && next.tagName !== 'H2') {
            if (next.tagName === 'UL') {
                const aElements = Array.from(next.querySelectorAll('a'));
                aElements.forEach(a => {
                    if (a.href.includes('/docs/13.x') && !a.href.includes('#')) {
                        links.push({
                            title: `${(fileIdx++).toString().padStart(2, '0')}${a.innerText.trim()}`,
                            url: a.href
                        });
                    }
                });
            }
            next = next.nextElementSibling;
        }
        if (links.length > 0) {
            sections.push({ name: sectionName, links });
        }
    });

    console.log(`Found ${sections.length} sections to download.`);

    for (const section of sections) {
        console.log(`--- Section: ${section.name} ---`);
        for (const link of section.links) {
            const fileName = `${section.name}/${link.title.replace(/[/\\?%*:|"<>]/g, '-')}.html`;
            console.log(`Downloading: ${fileName} from ${link.url}`);
            
            try {
                const response = await fetch(link.url);
                const html = await response.text();
                
                const blob = new Blob([html], { type: 'text/html' });
                const a = document.createElement('a');
                a.href = URL.createObjectURL(blob);
                a.download = fileName.replace(/\//g, ' - '); 
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                
                await sleep(500);
            } catch (err) {
                console.error(`Failed to download ${link.title}:`, err);
            }
        }
    }
    
    console.log('Download complete!');
})();
