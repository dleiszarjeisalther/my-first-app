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

URL_MAP = {
    "https://react.dev/learn/installation": "installation.html",
    "https://react.dev/learn/describing-the-ui": "describing-the-ui.html",
    "https://react.dev/learn/adding-interactivity": "adding-interactivity.html",
    "https://react.dev/learn/managing-state": "managing-state.html",
    "https://react.dev/learn/escape-hatches": "escape-hatches.html",
    "https://react.dev/learn/react-compiler": "compiler.html",
    "https://react.dev/reference/react": "hooks.html",
    "https://react.dev/reference/react/useContext": "context.html",
    "https://react.dev/reference/react/useEffect": "effects-refs.html",
    "https://react.dev/reference/react/useState": "state-hooks.html",
    "https://react.dev/reference/rsc/server-components": "server-components.html",
    "https://react.dev/reference/rsc/server-actions": "rsc-actions.html",
    "https://react.dev/blog/2024/12/05/react-19": "react-19-features.html",
}

def download_file(url, target_path):
    try:
        req = urllib.request.Request(url, headers=HEADERS)
        with urllib.request.urlopen(req, timeout=15) as resp:
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

print("Step 1: Downloading missing/full HTML pages...")
for url, filename in URL_MAP.items():
    target_html = BASE_DIR / filename
    # Check if page is missing or too small
    if not target_html.exists() or target_html.stat().st_size < 20000:
        print(f"Downloading HTML: {url}")
        download_file(url, target_html)

print("\nStep 2: Scanning HTML files for external assets & rewriting paths...")

html_files = [f for f in BASE_DIR.glob("*.html")]

for html_file in html_files:
    if html_file.name == "index.html":
        continue
    
    with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()

    # Find external assets (CSS, JS, Fonts, Images, Favicons)
    asset_urls = set()
    
    # CSS & Preloads
    css_links = re.findall(r'<link[^>]+href=["\']([^"\']+)["\']', content)
    # JS scripts
    js_links = re.findall(r'<script[^>]+src=["\']([^"\']+)["\']', content)
    # Images
    img_links = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', content)
    
    for url in css_links + js_links + img_links:
        if url.startswith('http://') or url.startswith('https://') or url.startswith('/_next/') or url.startswith('/fonts/') or url.startswith('/images/'):
            asset_urls.add(url)

    replacements = {}
    for raw_url in asset_urls:
        if raw_url.startswith('/'):
            full_url = "https://react.dev" + raw_url
        else:
            full_url = raw_url

        target_file, rel_path = get_asset_local_path(full_url)
        
        if not target_file.exists():
            download_file(full_url, target_file)
        
        replacements[raw_url] = rel_path

    # Replace URLs in content
    for old_url, new_url in replacements.items():
        content = content.replace(old_url, new_url)

    # Inject sticky navigation header if not present
    nav_header = '''<div id="offline-nav-header" style="position: sticky; top: 0; z-index: 999999; background: #0b0f19; border-bottom: 2px solid #61dafb; padding: 10px 16px; font-family: system-ui, -apple-system, sans-serif; display: flex; flex-wrap: wrap; gap: 8px; align-items: center; box-shadow: 0 4px 12px rgba(0,0,0,0.6);">
  <a href="index.html" style="background: #61dafb; color: #0b0f19; padding: 6px 14px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 13px;">⚛️ React Hub</a>
  <span style="color: #475569; font-weight: bold;">|</span>
  <a href="describing-the-ui.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Describing UI</a>
  <a href="adding-interactivity.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Interactivity</a>
  <a href="managing-state.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Managing State</a>
  <a href="escape-hatches.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Escape Hatches</a>
  <a href="hooks.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Hooks API</a>
  <a href="installation.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Installation</a>
  <a href="server-components.html" style="color: #61dafb; text-decoration: none; font-size: 13px; padding: 4px 10px; border-radius: 4px; background: rgba(255,255,255,0.06);">Server Components</a>
</div>
'''
    if 'id="offline-nav-header"' not in content:
        content = re.sub(r'(<body[^>]*>)', r'\1\n' + nav_header, content, count=1, flags=re.IGNORECASE)

    with open(html_file, 'w', encoding='utf-8') as f:
        f.write(content)

print("\nStep 3: Creating complete Offline Landing Page index.html...")

index_content = """<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>React.js Official Documentation - Offline Study Hub</title>
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
      max-width: 1100px;
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
      max-width: 600px;
      margin: 0 auto;
    }

    .container {
      max-width: 1100px;
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
      margin-bottom: 1rem;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 0.5rem;
    }

    .card-desc {
      font-size: 0.95rem;
      color: var(--text-muted);
      line-height: 1.5;
      margin-bottom: 1.25rem;
    }

    .card-footer {
      font-size: 0.875rem;
      font-weight: 600;
      color: var(--accent);
      display: flex;
      align-items: center;
      gap: 0.35rem;
    }

    footer {
      max-width: 1100px;
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
      <span>⚛️</span> React.dev Offline Edition
    </div>
    <h1>React 19 Official Documentation</h1>
    <p class="subtitle">Complete offline study hub with styles, scripts, fonts, and assets included locally.</p>
  </header>

  <div class="container">
    <a href="installation.html" class="card">
      <div>
        <div class="card-icon">🚀</div>
        <div class="card-title">1. Installation & Setup</div>
        <div class="card-desc">Learn how to start a new React project with Vite, Next.js, or add React to an existing HTML page.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="describing-the-ui.html" class="card">
      <div>
        <div class="card-icon">🎨</div>
        <div class="card-title">2. Describing the UI</div>
        <div class="card-desc">Master JSX syntax, components, props, conditional rendering, rendering lists, and keeping components pure.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="adding-interactivity.html" class="card">
      <div>
        <div class="card-icon">⚡</div>
        <div class="card-title">3. Adding Interactivity</div>
        <div class="card-desc">State as a snapshot, handling events, updating arrays/objects in state, and batching state updates.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="managing-state.html" class="card">
      <div>
        <div class="card-icon">🧠</div>
        <div class="card-title">4. Managing State</div>
        <div class="card-desc">Structuring state, sharing state between components (lifting state up), Reducers, and Context API.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="escape-hatches.html" class="card">
      <div>
        <div class="card-icon">🛠️</div>
        <div class="card-title">5. Escape Hatches</div>
        <div class="card-desc">Refs (`useRef`), DOM manipulation, Effects (`useEffect`), reactive dependencies, and custom hooks.</div>
      </div>
      <div class="card-footer">Read Module &rarr;</div>
    </a>

    <a href="hooks.html" class="card">
      <div>
        <div class="card-icon">🪝</div>
        <div class="card-title">6. React Hooks Reference</div>
        <div class="card-desc">Complete API reference for `useState`, `useReducer`, `useEffect`, `useContext`, `useMemo`, `useCallback`, `useRef`.</div>
      </div>
      <div class="card-footer">Read Reference &rarr;</div>
    </a>

    <a href="server-components.html" class="card">
      <div>
        <div class="card-icon">🖥️</div>
        <div class="card-title">7. React Server Components</div>
        <div class="card-desc">Understand React Server Components (RSC), Server Actions (`'use server'`), streaming, and modern architecture.</div>
      </div>
      <div class="card-footer">Read Architecture &rarr;</div>
    </a>

    <a href="compiler.html" class="card">
      <div>
        <div class="card-icon">⚙️</div>
        <div class="card-title">8. React Compiler & React 19</div>
        <div class="card-desc">Learn about the new React Compiler, automatic memoization, and React 19 features.</div>
      </div>
      <div class="card-footer">Read Overview &rarr;</div>
    </a>
  </div>

  <footer>
    <p>Saved for offline study in <code>C:\\Users\\universal\\Herd\\my-first-app\\study\\reactjs</code></p>
  </footer>

</body>
</html>
"""

with open(BASE_DIR / "index.html", "w", encoding="utf-8") as f:
    f.write(index_content)

print("\n[SUCCESS] React offline documentation update complete!")
