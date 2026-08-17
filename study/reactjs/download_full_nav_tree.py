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

# Complete map of all pages from the nav bar
NAV_PAGES = {
    # GET STARTED
    "quick-start.html": "https://react.dev/learn",
    "tutorial-tic-tac-toe.html": "https://react.dev/learn/tutorial-tic-tac-toe",
    "thinking-in-react.html": "https://react.dev/learn/thinking-in-react",
    "installation.html": "https://react.dev/learn/installation",
    "start-a-new-react-project.html": "https://react.dev/learn/start-a-new-react-project",
    "add-react-to-an-existing-project.html": "https://react.dev/learn/add-react-to-an-existing-project",
    "editor-setup.html": "https://react.dev/learn/editor-setup",
    "typescript.html": "https://react.dev/learn/typescript",
    "react-developer-tools.html": "https://react.dev/learn/react-developer-tools",
    "compiler.html": "https://react.dev/learn/react-compiler",

    # DESCRIBING THE UI
    "describing-the-ui.html": "https://react.dev/learn/describing-the-ui",
    "your-first-component.html": "https://react.dev/learn/your-first-component",
    "importing-and-exporting-components.html": "https://react.dev/learn/importing-and-exporting-components",
    "writing-markup-with-jsx.html": "https://react.dev/learn/writing-markup-with-jsx",
    "javascript-in-jsx-with-curly-braces.html": "https://react.dev/learn/javascript-in-jsx-with-curly-braces",
    "passing-props-to-a-component.html": "https://react.dev/learn/passing-props-to-a-component",
    "conditional-rendering.html": "https://react.dev/learn/conditional-rendering",
    "rendering-lists.html": "https://react.dev/learn/rendering-lists",
    "keeping-components-pure.html": "https://react.dev/learn/keeping-components-pure",
    "understanding-your-ui-as-a-tree.html": "https://react.dev/learn/understanding-your-ui-as-a-tree",

    # ADDING INTERACTIVITY
    "adding-interactivity.html": "https://react.dev/learn/adding-interactivity",
    "responding-to-events.html": "https://react.dev/learn/responding-to-events",
    "state-a-components-memory.html": "https://react.dev/learn/state-a-components-memory",
    "render-and-commit.html": "https://react.dev/learn/render-and-commit",
    "state-as-a-snapshot.html": "https://react.dev/learn/state-as-a-snapshot",
    "queueing-a-series-of-state-updates.html": "https://react.dev/learn/queueing-a-series-of-state-updates",
    "updating-objects-in-state.html": "https://react.dev/learn/updating-objects-in-state",
    "updating-arrays-in-state.html": "https://react.dev/learn/updating-arrays-in-state",

    # MANAGING STATE
    "managing-state.html": "https://react.dev/learn/managing-state",
    "reacting-to-input-with-state.html": "https://react.dev/learn/reacting-to-input-with-state",
    "choosing-the-state-structure.html": "https://react.dev/learn/choosing-the-state-structure",
    "sharing-state-between-components.html": "https://react.dev/learn/sharing-state-between-components",
    "preserving-and-resetting-state.html": "https://react.dev/learn/preserving-and-resetting-state",
    "extracting-state-logic-into-a-reducer.html": "https://react.dev/learn/extracting-state-logic-into-a-reducer",
    "passing-data-deeply-with-context.html": "https://react.dev/learn/passing-data-deeply-with-context",
    "scaling-up-with-reducer-and-context.html": "https://react.dev/learn/scaling-up-with-reducer-and-context",

    # ESCAPE HATCHES
    "escape-hatches.html": "https://react.dev/learn/escape-hatches",
    "referencing-values-with-refs.html": "https://react.dev/learn/referencing-values-with-refs",
    "manipulating-the-dom-with-refs.html": "https://react.dev/learn/manipulating-the-dom-with-refs",
    "synchronizing-with-effects.html": "https://react.dev/learn/synchronizing-with-effects",
    "you-might-not-need-an-effect.html": "https://react.dev/learn/you-might-not-need-an-effect",
    "lifecycle-of-reactive-effects.html": "https://react.dev/learn/lifecycle-of-reactive-effects",
    "separating-events-from-effects.html": "https://react.dev/learn/separating-events-from-effects",
    "removing-effect-dependencies.html": "https://react.dev/learn/removing-effect-dependencies",
    "reusing-logic-with-custom-hooks.html": "https://react.dev/learn/reusing-logic-with-custom-hooks",

    # API REFERENCES
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

print("Step 1: Downloading all missing navigation pages...")
for filename, url in NAV_PAGES.items():
    target_path = BASE_DIR / filename
    if not target_path.exists() or target_path.stat().st_size < 20000:
        print(f"Fetching: {filename} from {url}")
        download_file(url, target_path)

print("\nStep 2: Scanning files, rewriting asset paths & local links...")

# Create mapping for online URLs -> local HTML filenames
URL_MAP = {}
for filename, url in NAV_PAGES.items():
    URL_MAP[url] = filename
    path = urllib.parse.urlparse(url).path
    if path:
        URL_MAP[path] = filename

for html_file in BASE_DIR.glob("*.html"):
    if html_file.name == "index.html":
        continue

    try:
        with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
    except Exception:
        continue

    # Download assets
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

    # Rewrite asset links
    for old_url, new_url in replacements.items():
        content = content.replace(old_url, new_url)

    # Rewrite internal documentation links
    sorted_urls = sorted(URL_MAP.keys(), key=len, reverse=True)
    for online_url in sorted_urls:
        local_target = URL_MAP[online_url]
        pattern = re.compile(r'href=["\']' + re.escape(online_url) + r'/?([#?][^"\']*)?["\']')
        content = pattern.sub(f'href="{local_target}\\1"', content)

    with open(html_file, 'w', encoding='utf-8') as f:
        f.write(content)

print("\nStep 3: All navigation tree pages downloaded & internal links updated!")
