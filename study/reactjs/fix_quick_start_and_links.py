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

HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
}

PAGES_MAP = {
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
    "adding-interactivity.html": "https://react.dev/learn/adding-interactivity",
    "responding-to-events.html": "https://react.dev/learn/responding-to-events",
    "state-a-components-memory.html": "https://react.dev/learn/state-a-components-memory",
    "render-and-commit.html": "https://react.dev/learn/render-and-commit",
    "state-as-a-snapshot.html": "https://react.dev/learn/state-as-a-snapshot",
    "queueing-a-series-of-state-updates.html": "https://react.dev/learn/queueing-a-series-of-state-updates",
    "updating-objects-in-state.html": "https://react.dev/learn/updating-objects-in-state",
    "updating-arrays-in-state.html": "https://react.dev/learn/updating-arrays-in-state",
    "managing-state.html": "https://react.dev/learn/managing-state",
    "reacting-to-input-with-state.html": "https://react.dev/learn/reacting-to-input-with-state",
    "choosing-the-state-structure.html": "https://react.dev/learn/choosing-the-state-structure",
    "sharing-state-between-components.html": "https://react.dev/learn/sharing-state-between-components",
    "preserving-and-resetting-state.html": "https://react.dev/learn/preserving-and-resetting-state",
    "extracting-state-logic-into-a-reducer.html": "https://react.dev/learn/extracting-state-logic-into-a-reducer",
    "passing-data-deeply-with-context.html": "https://react.dev/learn/passing-data-deeply-with-context",
    "scaling-up-with-reducer-and-context.html": "https://react.dev/learn/scaling-up-with-reducer-and-context",
    "escape-hatches.html": "https://react.dev/learn/escape-hatches",
    "referencing-values-with-refs.html": "https://react.dev/learn/referencing-values-with-refs",
    "manipulating-the-dom-with-refs.html": "https://react.dev/learn/manipulating-the-dom-with-refs",
    "synchronizing-with-effects.html": "https://react.dev/learn/synchronizing-with-effects",
    "you-might-not-need-an-effect.html": "https://react.dev/learn/you-might-not-need-an-effect",
    "lifecycle-of-reactive-effects.html": "https://react.dev/learn/lifecycle-of-reactive-effects",
    "separating-events-from-effects.html": "https://react.dev/learn/separating-events-from-effects",
    "removing-effect-dependencies.html": "https://react.dev/learn/removing-effect-dependencies",
    "reusing-logic-with-custom-hooks.html": "https://react.dev/learn/reusing-logic-with-custom-hooks",
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

print("Step 1: Re-fetching quick-start.html directly from https://react.dev/learn...")
download_file("https://react.dev/learn", BASE_DIR / "quick-start.html")

print("\nStep 2: Processing all HTML files & fixing route link mapping...")

# Build URL mapping strictly for doc pages
DOC_ROUTE_MAP = {}
for filename, online_url in PAGES_MAP.items():
    DOC_ROUTE_MAP[online_url] = filename
    path = urllib.parse.urlparse(online_url).path
    if path:
        DOC_ROUTE_MAP[path] = filename
        DOC_ROUTE_MAP[path + "/"] = filename

# Add explicit mappings for /learn and /learn/
DOC_ROUTE_MAP["/learn"] = "quick-start.html"
DOC_ROUTE_MAP["/learn/"] = "quick-start.html"
DOC_ROUTE_MAP["https://react.dev/learn"] = "quick-start.html"
DOC_ROUTE_MAP["https://react.dev/learn/"] = "quick-start.html"

# Sort routes by length descending
sorted_routes = sorted(DOC_ROUTE_MAP.keys(), key=len, reverse=True)

for html_file in BASE_DIR.glob("*.html"):
    if html_file.name == "index.html":
        continue

    try:
        with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
    except Exception:
        continue

    # Fix any bogus "assets/learn" or "assets/learn/..." replacements
    content = re.sub(r'href=["\']assets/learn/?(["\'])', r'href="quick-start.html\1"', content)

    # Replace doc route hrefs with local html filenames
    for route in sorted_routes:
        local_target = DOC_ROUTE_MAP[route]
        # Match href="route" or href="route#anchor" or href="route?query"
        pattern = re.compile(r'href=["\']' + re.escape(route) + r'([#?][^"\']*)?["\']')
        content = pattern.sub(f'href="{local_target}\\1"', content)

    # Persistent sticky offline navigation header
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

print("[SUCCESS] Quick Start re-downloaded & all links fixed!")
