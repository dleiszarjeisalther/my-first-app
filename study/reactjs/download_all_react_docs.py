import os
import re
import urllib.request
import urllib.parse
from pathlib import Path

BASE_DIR = Path(r"C:\Users\universal\Herd\my-first-app\study\reactjs")
ASSETS_DIR = BASE_DIR / "assets"
CSS_DIR = ASSETS_DIR / "css"
JS_DIR = ASSETS_DIR / "js"
FONTS_DIR = ASSETS_DIR / "fonts"
IMG_DIR = ASSETS_DIR / "images"
ICONS_DIR = ASSETS_DIR / "icons"

for d in [ASSETS_DIR, CSS_DIR, JS_DIR, FONTS_DIR, IMG_DIR, ICONS_DIR]:
    d.mkdir(parents=True, exist_ok=True)

HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
}

PAGES = {
    "quick-start.html": "https://react.dev/learn",
    "thinking-in-react.html": "https://react.dev/learn/thinking-in-react",
    "installation.html": "https://react.dev/learn/installation",
    "your-first-component.html": "https://react.dev/learn/your-first-component",
    "writing-markup-with-jsx.html": "https://react.dev/learn/writing-markup-with-jsx",
    "passing-props-to-a-component.html": "https://react.dev/learn/passing-props-to-a-component",
    "conditional-rendering.html": "https://react.dev/learn/conditional-rendering",
    "rendering-lists.html": "https://react.dev/learn/rendering-lists",
    "keeping-components-pure.html": "https://react.dev/learn/keeping-components-pure",
    "describing-the-ui.html": "https://react.dev/learn/describing-the-ui",
    "responding-to-events.html": "https://react.dev/learn/responding-to-events",
    "state-a-components-memory.html": "https://react.dev/learn/state-a-components-memory",
    "render-and-commit.html": "https://react.dev/learn/render-and-commit",
    "state-as-a-snapshot.html": "https://react.dev/learn/state-as-a-snapshot",
    "adding-interactivity.html": "https://react.dev/learn/adding-interactivity",
    "updating-objects-in-state.html": "https://react.dev/learn/updating-objects-in-state",
    "updating-arrays-in-state.html": "https://react.dev/learn/updating-arrays-in-state",
    "managing-state.html": "https://react.dev/learn/managing-state",
    "escape-hatches.html": "https://react.dev/learn/escape-hatches",
    "compiler.html": "https://react.dev/learn/react-compiler",
    "hooks.html": "https://react.dev/reference/react",
    "state-hooks.html": "https://react.dev/reference/react/useState",
    "effects-refs.html": "https://react.dev/reference/react/useEffect",
    "context.html": "https://react.dev/reference/react/useContext",
    "server-components.html": "https://react.dev/reference/rsc/server-components",
    "rsc-actions.html": "https://react.dev/reference/rsc/server-actions",
    "react-19-features.html": "https://react.dev/blog/2024/12/05/react-19",
    "react-dom-reference.html": "https://react.dev/reference/react-dom"
}

def download_file(url, target_path):
    try:
        req = urllib.request.Request(url, headers=HEADERS)
        with urllib.request.urlopen(req, timeout=20) as resp:
            data = resp.read()
            with open(target_path, 'wb') as f:
                f.write(data)
            print(f"[OK] Downloaded: {url} -> {target_path.name}")
            return True
    except Exception as e:
        print(f"[ERR] Failed {url}: {e}")
        return False

def get_asset_local_path(url):
    clean_url = url.split('?')[0].split('#')[0]
    filename = os.path.basename(clean_url)
    if not filename or len(filename) > 60:
        filename = f"asset_{abs(hash(clean_url))}.bin"

    if clean_url.endswith('.css'):
        return CSS_DIR / filename, f"assets/css/{filename}"
    elif clean_url.endswith('.js'):
        return JS_DIR / filename, f"assets/js/{filename}"
    elif clean_url.endswith(('.woff2', '.woff', '.ttf', '.eot')):
        return FONTS_DIR / filename, f"assets/fonts/{filename}"
    elif clean_url.endswith(('.png', '.jpg', '.jpeg', '.gif', '.svg', '.webp')):
        return IMG_DIR / filename, f"assets/images/{filename}"
    elif clean_url.endswith(('.ico', '.webmanifest')):
        return ICONS_DIR / filename, f"assets/icons/{filename}"
    else:
        return ASSETS_DIR / filename, f"assets/{filename}"

print("Step 1: Downloading all React.dev documentation pages...")
for filename, url in PAGES.items():
    target_path = BASE_DIR / filename
    if not target_path.exists() or target_path.stat().st_size < 20000:
        print(f"Fetching page: {filename} from {url}")
        download_file(url, target_path)

print("\nStep 2: Scanning pages & downloading offline assets...")
for html_file in BASE_DIR.glob("*.html"):
    if html_file.name == "index.html":
        continue
    
    try:
        with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
    except Exception:
        continue

    asset_urls = set()
    css_links = re.findall(r'<link[^>]+href=["\']([^"\']+)["\']', content)
    js_links = re.findall(r'<script[^>]+src=["\']([^"\']+)["\']', content)
    img_links = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', content)
    
    for url in css_links + js_links + img_links:
        if url.startswith('http://') or url.startswith('https://') or url.startswith('/_next/') or url.startswith('/fonts/') or url.startswith('/images/'):
            asset_urls.add(url)

    replacements = {}
    for raw_url in asset_urls:
        full_url = "https://react.dev" + raw_url if raw_url.startswith('/') else raw_url
        target_file, rel_path = get_asset_local_path(full_url)
        
        if not target_file.exists():
            download_file(full_url, target_file)
        
        replacements[raw_url] = rel_path

    for old_url, new_url in replacements.items():
        content = content.replace(old_url, new_url)

    # Add persistent sticky navigation bar
    nav_header = '''<div id="offline-nav-header" style="position: sticky; top: 0; z-index: 999999; background: #0b0f19; border-bottom: 2px solid #61dafb; padding: 10px 16px; font-family: system-ui, -apple-system, sans-serif; display: flex; flex-wrap: wrap; gap: 8px; align-items: center; box-shadow: 0 4px 12px rgba(0,0,0,0.6);">
  <a href="index.html" style="background: #61dafb; color: #0b0f19; padding: 6px 14px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 13px;">⚛️ React Hub</a>
  <span style="color: #475569; font-weight: bold;">|</span>
  <a href="quick-start.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Quick Start</a>
  <a href="thinking-in-react.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Thinking in React</a>
  <a href="your-first-component.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">First Component</a>
  <a href="describing-the-ui.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Describing UI</a>
  <a href="adding-interactivity.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Interactivity</a>
  <a href="managing-state.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Managing State</a>
  <a href="escape-hatches.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Escape Hatches</a>
  <a href="hooks.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Hooks Reference</a>
</div>
'''
    if 'id="offline-nav-header"' not in content:
        content = re.sub(r'(<body[^>]*>)', r'\1\n' + nav_header, content, count=1, flags=re.IGNORECASE)

    with open(html_file, 'w', encoding='utf-8') as f:
        f.write(content)

print("\nStep 3: Creating Master Index.html Dashboard...")
index_content = """<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>React.js Official Documentation - Offline Master Hub</title>
  <style>
    :root {
      --bg-main: #0b0f19;
      --bg-card: #111827;
      --bg-card-hover: #1f2937;
      --accent: #61dafb;
      --accent-hover: #38bdf8;
      --text-main: #f9fafb;
      --text-muted: #9ca3af;
      --border: #374151;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background-color: var(--bg-main);
      color: var(--text-main);
      min-height: 100vh;
      padding: 2.5rem 2rem;
    }

    header {
      max-width: 1200px;
      margin: 0 auto 3rem auto;
      text-align: center;
    }

    .logo-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      background: rgba(97, 218, 251, 0.1);
      border: 1px solid var(--accent);
      padding: 0.5rem 1.25rem;
      border-radius: 9999px;
      margin-bottom: 1rem;
      color: var(--accent);
      font-weight: 600;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 0.75rem;
      background: linear-gradient(135deg, #ffffff 0%, #61dafb 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    p.subtitle {
      font-size: 1.125rem;
      color: var(--text-muted);
      max-width: 700px;
      margin: 0 auto;
    }

    .section-header {
      max-width: 1200px;
      margin: 2.5rem auto 1rem auto;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--accent);
      border-bottom: 1px solid var(--border);
      padding-bottom: 0.5rem;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background-color: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 1.5rem;
      text-decoration: none;
      color: inherit;
      transition: all 0.2s ease-in-out;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card:hover {
      background-color: var(--bg-card-hover);
      border-color: var(--accent);
      transform: translateY(-3px);
      box-shadow: 0 10px 25px -5px rgba(97, 218, 251, 0.15);
    }

    .card-icon {
      font-size: 2rem;
      margin-bottom: 0.75rem;
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 0.5rem;
    }

    .card-desc {
      font-size: 0.9rem;
      color: var(--text-muted);
      line-height: 1.5;
      margin-bottom: 1.25rem;
    }

    .card-footer {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--accent);
    }

    footer {
      max-width: 1200px;
      margin: 4rem auto 0 auto;
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid var(--border);
      color: var(--text-muted);
      font-size: 0.875rem;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo-badge">
      <span>⚛️</span> React.dev Offline Master Edition
    </div>
    <h1>React 19 Complete Offline Documentation</h1>
    <p class="subtitle">Full offline learning suite including Quick Start, Thinking in React, Describing UI, Interactivity, State, Hooks & Server Components.</p>
  </header>

  <div class="section-header">🚀 GET STARTED</div>
  <div class="container">
    <a href="quick-start.html" class="card">
      <div>
        <div class="card-icon">⚡</div>
        <div class="card-title">Quick Start Guide</div>
        <div class="card-desc">The official 5-minute introduction to React concepts: components, JSX, props, state, and event handlers.</div>
      </div>
      <div class="card-footer">Read Quick Start &rarr;</div>
    </a>

    <a href="thinking-in-react.html" class="card">
      <div>
        <div class="card-icon">💡</div>
        <div class="card-title">Thinking in React</div>
        <div class="card-desc">Learn how to break UI down into component hierarchies and build static & dynamic data applications.</div>
      </div>
      <div class="card-footer">Read Guide &rarr;</div>
    </a>

    <a href="installation.html" class="card">
      <div>
        <div class="card-icon">🛠️</div>
        <div class="card-title">Installation</div>
        <div class="card-desc">How to set up React using Next.js, Vite, or embed it directly inside existing HTML projects.</div>
      </div>
      <div class="card-footer">Read Installation &rarr;</div>
    </a>
  </div>

  <div class="section-header">🎨 CORE LEARNING MODULES</div>
  <div class="container">
    <a href="your-first-component.html" class="card">
      <div>
        <div class="card-icon">🧩</div>
        <div class="card-title">Your First Component</div>
        <div class="card-desc">Components are the building blocks of React applications. Learn how to write, import, and export them.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="writing-markup-with-jsx.html" class="card">
      <div>
        <div class="card-icon">📝</div>
        <div class="card-title">Writing Markup with JSX</div>
        <div class="card-desc">JSX is a syntax extension for JavaScript that lets you write HTML-like markup inside JS files.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="passing-props-to-a-component.html" class="card">
      <div>
        <div class="card-icon">📦</div>
        <div class="card-title">Passing Props</div>
        <div class="card-desc">Pass data from parent to child components using props, default values, and JSX children.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="conditional-rendering.html" class="card">
      <div>
        <div class="card-icon">🔀</div>
        <div class="card-title">Conditional Rendering</div>
        <div class="card-desc">Render different UI elements conditionally using `if`, ternary `? :`, and logical `&&` operators.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="rendering-lists.html" class="card">
      <div>
        <div class="card-icon">📋</div>
        <div class="card-title">Rendering Lists</div>
        <div class="card-desc">Render dynamic data collections using JavaScript `map()` and assign unique key props.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="keeping-components-pure.html" class="card">
      <div>
        <div class="card-icon">🧼</div>
        <div class="card-title">Keeping Components Pure</div>
        <div class="card-desc">Pure components produce identical outputs for given inputs and avoid side-effects during render.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>
  </div>

  <div class="section-header">⚡ INTERACTIVITY & STATE</div>
  <div class="container">
    <a href="responding-to-events.html" class="card">
      <div>
        <div class="card-icon">🖱️</div>
        <div class="card-title">Responding to Events</div>
        <div class="card-desc">Add click, form submit, and mouse event handlers to React components.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="state-a-components-memory.html" class="card">
      <div>
        <div class="card-icon">💾</div>
        <div class="card-title">State: Component Memory</div>
        <div class="card-desc">Use `useState` to store data that changes over time and triggers UI re-renders.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="render-and-commit.html" class="card">
      <div>
        <div class="card-icon">🔄</div>
        <div class="card-title">Render & Commit Cycle</div>
        <div class="card-desc">Understand how React triggers renders, calculates diffs, and commits changes to the DOM.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="state-as-a-snapshot.html" class="card">
      <div>
        <div class="card-icon">📸</div>
        <div class="card-title">State as a Snapshot</div>
        <div class="card-desc">Learn why state variables act as snapshots during render cycles.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="updating-objects-in-state.html" class="card">
      <div>
        <div class="card-icon">🏗️</div>
        <div class="card-title">Updating Objects in State</div>
        <div class="card-desc">Immutably update nested JavaScript objects in component state using spread syntax `...`.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="updating-arrays-in-state.html" class="card">
      <div>
        <div class="card-icon">📚</div>
        <div class="card-title">Updating Arrays in State</div>
        <div class="card-desc">Add, remove, filter, and transform arrays in state without mutating original state.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>
  </div>

  <div class="section-header">🪝 API REFERENCE & ARCHITECTURE</div>
  <div class="container">
    <a href="hooks.html" class="card">
      <div>
        <div class="card-icon">🪝</div>
        <div class="card-title">React Hooks API</div>
        <div class="card-desc">Full API reference for `useState`, `useReducer`, `useEffect`, `useContext`, `useRef`, `useMemo`, `useCallback`.</div>
      </div>
      <div class="card-footer">Read Reference &rarr;</div>
    </a>

    <a href="react-dom-reference.html" class="card">
      <div>
        <div class="card-icon">🌐</div>
        <div class="card-title">React DOM API</div>
        <div class="card-desc">`createRoot`, `hydrateRoot`, `findDOMNode`, and browser DOM integration methods.</div>
      </div>
      <div class="card-footer">Read Reference &rarr;</div>
    </a>

    <a href="server-components.html" class="card">
      <div>
        <div class="card-icon">🖥️</div>
        <div class="card-title">Server Components & Actions</div>
        <div class="card-desc">Learn about React Server Components (RSC), Server Actions (`'use server'`), and streaming rendering.</div>
      </div>
      <div class="card-footer">Read Architecture &rarr;</div>
    </a>
  </div>

  <footer>
    <p>Complete Offline React 19 Hub saved in <code>C:\\Users\\universal\\Herd\\my-first-app\\study\\reactjs</code></p>
  </footer>

</body>
</html>
"""

with open(BASE_DIR / "index.html", "w", encoding="utf-8") as f:
    f.write(index_content)

print("\n[SUCCESS] All missing React documentation pages & assets processed!")
