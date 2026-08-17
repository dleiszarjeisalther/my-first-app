import os
import re
from pathlib import Path

BASE_DIR = Path(r"C:\Users\universal\Herd\my-first-app\study\reactjs")

URL_TO_LOCAL = {
    "/learn": "quick-start.html",
    "/learn/quick-start": "quick-start.html",
    "https://react.dev/learn": "quick-start.html",
    "https://react.dev/learn/quick-start": "quick-start.html",
    
    "/learn/thinking-in-react": "thinking-in-react.html",
    "https://react.dev/learn/thinking-in-react": "thinking-in-react.html",
    
    "/learn/installation": "installation.html",
    "https://react.dev/learn/installation": "installation.html",
    
    "/learn/your-first-component": "your-first-component.html",
    "https://react.dev/learn/your-first-component": "your-first-component.html",
    
    "/learn/writing-markup-with-jsx": "writing-markup-with-jsx.html",
    "https://react.dev/learn/writing-markup-with-jsx": "writing-markup-with-jsx.html",
    
    "/learn/passing-props-to-a-component": "passing-props-to-a-component.html",
    "https://react.dev/learn/passing-props-to-a-component": "passing-props-to-a-component.html",
    
    "/learn/conditional-rendering": "conditional-rendering.html",
    "https://react.dev/learn/conditional-rendering": "conditional-rendering.html",
    
    "/learn/rendering-lists": "rendering-lists.html",
    "https://react.dev/learn/rendering-lists": "rendering-lists.html",
    
    "/learn/keeping-components-pure": "keeping-components-pure.html",
    "https://react.dev/learn/keeping-components-pure": "keeping-components-pure.html",
    
    "/learn/describing-the-ui": "describing-the-ui.html",
    "https://react.dev/learn/describing-the-ui": "describing-the-ui.html",
    
    "/learn/responding-to-events": "responding-to-events.html",
    "https://react.dev/learn/responding-to-events": "responding-to-events.html",
    
    "/learn/state-a-components-memory": "state-a-components-memory.html",
    "https://react.dev/learn/state-a-components-memory": "state-a-components-memory.html",
    
    "/learn/render-and-commit": "render-and-commit.html",
    "https://react.dev/learn/render-and-commit": "render-and-commit.html",
    
    "/learn/state-as-a-snapshot": "state-as-a-snapshot.html",
    "https://react.dev/learn/state-as-a-snapshot": "state-as-a-snapshot.html",
    
    "/learn/adding-interactivity": "adding-interactivity.html",
    "https://react.dev/learn/adding-interactivity": "adding-interactivity.html",
    
    "/learn/updating-objects-in-state": "updating-objects-in-state.html",
    "https://react.dev/learn/updating-objects-in-state": "updating-objects-in-state.html",
    
    "/learn/updating-arrays-in-state": "updating-arrays-in-state.html",
    "https://react.dev/learn/updating-arrays-in-state": "updating-arrays-in-state.html",
    
    "/learn/managing-state": "managing-state.html",
    "https://react.dev/learn/managing-state": "managing-state.html",
    
    "/learn/escape-hatches": "escape-hatches.html",
    "https://react.dev/learn/escape-hatches": "escape-hatches.html",
    
    "/learn/react-compiler": "compiler.html",
    "https://react.dev/learn/react-compiler": "compiler.html",
    
    "/reference/react": "hooks.html",
    "https://react.dev/reference/react": "hooks.html",
    
    "/reference/react/useState": "state-hooks.html",
    "https://react.dev/reference/react/useState": "state-hooks.html",
    
    "/reference/react/useEffect": "effects-refs.html",
    "https://react.dev/reference/react/useEffect": "effects-refs.html",
    
    "/reference/react/useContext": "context.html",
    "https://react.dev/reference/react/useContext": "context.html",
    
    "/reference/rsc/server-components": "server-components.html",
    "https://react.dev/reference/rsc/server-components": "server-components.html",
    
    "/reference/rsc/server-actions": "rsc-actions.html",
    "https://react.dev/reference/rsc/server-actions": "rsc-actions.html",
    
    "/blog/2024/12/05/react-19": "react-19-features.html",
    "https://react.dev/blog/2024/12/05/react-19": "react-19-features.html",
    
    "/reference/react-dom": "react-dom-reference.html",
    "https://react.dev/reference/react-dom": "react-dom-reference.html",
}

def process_file(html_file):
    try:
        with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
    except Exception as e:
        print(f"Error reading {html_file.name}: {e}")
        return False

    modified = False
    sorted_urls = sorted(URL_TO_LOCAL.keys(), key=len, reverse=True)
    
    for online_url in sorted_urls:
        local_target = URL_TO_LOCAL[online_url]
        pattern = re.compile(r'href=["\']' + re.escape(online_url) + r'/?([#?][^"\']*)?["\']')
        
        def replace_href(match):
            nonlocal modified
            modified = True
            extra = match.group(1) if match.group(1) else ""
            return f'href="{local_target}{extra}"'

        content, count = pattern.subn(replace_href, content)

    if modified:
        with open(html_file, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"[UPDATED] Links in {html_file.name}")
        return True
    return False

updated_count = 0
for html_file in BASE_DIR.glob("*.html"):
    if process_file(html_file):
        updated_count += 1

print(f"\n[DONE] Updated internal local links across {updated_count} HTML files!")
