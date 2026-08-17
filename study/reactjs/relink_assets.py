import re
from pathlib import Path

BASE_DIR = Path(r"C:\Users\universal\Herd\my-first-app\study\reactjs")

for html_file in BASE_DIR.glob("*.html"):
    if html_file.name == "index.html":
        continue
    with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()

    # Rewrite /_next/static/css/ -> assets/css/
    content = re.sub(r'["\']/_next/static/css/([^"\']+)["\']', r'"assets/css/\1"', content)
    # Rewrite /_next/static/chunks/ -> assets/js/
    content = re.sub(r'["\']/_next/static/chunks/([^"\']+)["\']', r'"assets/js/\1"', content)
    # Rewrite /fonts/ -> assets/fonts/
    content = re.sub(r'["\'](?:https://react.dev)?/fonts/([^"\']+)["\']', r'"assets/fonts/\1"', content)

    with open(html_file, 'w', encoding='utf-8') as f:
        f.write(content)

print("[OK] Asset paths rewritten for offline rendering!")
