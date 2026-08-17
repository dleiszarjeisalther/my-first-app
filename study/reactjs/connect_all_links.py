import os
import re
from pathlib import Path

BASE_DIR = Path(r"C:\Users\universal\Herd\my-first-app\study\reactjs")

# Map title / inner text / path keywords to exact local HTML file
TITLE_TO_FILE = {
    "Quick Start": "quick-start.html",
    "Tutorial: Tic-Tac-Toe": "tutorial-tic-tac-toe.html",
    "Thinking in React": "thinking-in-react.html",
    "Installation": "installation.html",
    "Creating a React App": "start-a-new-react-project.html",
    "Start a New React Project": "start-a-new-react-project.html",
    "Build a React App from Scratch": "add-react-to-an-existing-project.html",
    "Add React to an Existing Project": "add-react-to-an-existing-project.html",
    "Setup": "editor-setup.html",
    "Editor Setup": "editor-setup.html",
    "Using TypeScript": "typescript.html",
    "TypeScript": "typescript.html",
    "React Developer Tools": "react-developer-tools.html",
    "React Compiler": "compiler.html",

    "Describing the UI": "describing-the-ui.html",
    "Your First Component": "your-first-component.html",
    "Importing and Exporting Components": "importing-and-exporting-components.html",
    "Writing Markup with JSX": "writing-markup-with-jsx.html",
    "JavaScript in JSX with Curly Braces": "javascript-in-jsx-with-curly-braces.html",
    "Passing Props to a Component": "passing-props-to-a-component.html",
    "Conditional Rendering": "conditional-rendering.html",
    "Rendering Lists": "rendering-lists.html",
    "Keeping Components Pure": "keeping-components-pure.html",
    "Your UI as a Tree": "understanding-your-ui-as-a-tree.html",
    "Understanding Your UI as a Tree": "understanding-your-ui-as-a-tree.html",

    "Adding Interactivity": "adding-interactivity.html",
    "Responding to Events": "responding-to-events.html",
    "State: A Component's Memory": "state-a-components-memory.html",
    "Render and Commit": "render-and-commit.html",
    "State as a Snapshot": "state-as-a-snapshot.html",
    "Queueing a Series of State Updates": "queueing-a-series-of-state-updates.html",
    "Updating Objects in State": "updating-objects-in-state.html",
    "Updating Arrays in State": "updating-arrays-in-state.html",

    "Managing State": "managing-state.html",
    "Reacting to Input with State": "reacting-to-input-with-state.html",
    "Choosing the State Structure": "choosing-the-state-structure.html",
    "Sharing State Between Components": "sharing-state-between-components.html",
    "Preserving and Resetting State": "preserving-and-resetting-state.html",
    "Extracting State Logic into a Reducer": "extracting-state-logic-into-a-reducer.html",
    "Passing Data Deeply with Context": "passing-data-deeply-with-context.html",
    "Scaling Up with Reducer and Context": "scaling-up-with-reducer-and-context.html",

    "Escape Hatches": "escape-hatches.html",
    "Referencing Values with Refs": "referencing-values-with-refs.html",
    "Manipulating the DOM with Refs": "manipulating-the-dom-with-refs.html",
    "Synchronizing with Effects": "synchronizing-with-effects.html",
    "You Might Not Need an Effect": "you-might-not-need-an-effect.html",
    "Lifecycle of Reactive Effects": "lifecycle-of-reactive-effects.html",
    "Separating Events from Effects": "separating-events-from-effects.html",
    "Removing Effect Dependencies": "removing-effect-dependencies.html",
    "Reusing Logic with Custom Hooks": "reusing-logic-with-custom-hooks.html",

    "Hooks Reference": "hooks.html",
    "React Hooks": "hooks.html",
    "useState": "state-hooks.html",
    "useEffect": "effects-refs.html",
    "useContext": "context.html",
    "Server Components": "server-components.html",
    "Server Actions": "rsc-actions.html",
    "React 19": "react-19-features.html",
    "React DOM": "react-dom-reference.html"
}

# Also map route paths
ROUTE_TO_FILE = {
    "/learn": "quick-start.html",
    "/learn/": "quick-start.html",
    "/learn/quick-start": "quick-start.html",
    "/learn/tutorial-tic-tac-toe": "tutorial-tic-tac-toe.html",
    "/learn/thinking-in-react": "thinking-in-react.html",
    "/learn/installation": "installation.html",
    "/learn/start-a-new-react-project": "start-a-new-react-project.html",
    "/learn/add-react-to-an-existing-project": "add-react-to-an-existing-project.html",
    "/learn/editor-setup": "editor-setup.html",
    "/learn/typescript": "typescript.html",
    "/learn/react-developer-tools": "react-developer-tools.html",
    "/learn/react-compiler": "compiler.html",
    "/learn/describing-the-ui": "describing-the-ui.html",
    "/learn/your-first-component": "your-first-component.html",
    "/learn/importing-and-exporting-components": "importing-and-exporting-components.html",
    "/learn/writing-markup-with-jsx": "writing-markup-with-jsx.html",
    "/learn/javascript-in-jsx-with-curly-braces": "javascript-in-jsx-with-curly-braces.html",
    "/learn/passing-props-to-a-component": "passing-props-to-a-component.html",
    "/learn/conditional-rendering": "conditional-rendering.html",
    "/learn/rendering-lists": "rendering-lists.html",
    "/learn/keeping-components-pure": "keeping-components-pure.html",
    "/learn/understanding-your-ui-as-a-tree": "understanding-your-ui-as-a-tree.html",
    "/learn/adding-interactivity": "adding-interactivity.html",
    "/learn/responding-to-events": "responding-to-events.html",
    "/learn/state-a-components-memory": "state-a-components-memory.html",
    "/learn/render-and-commit": "render-and-commit.html",
    "/learn/state-as-a-snapshot": "state-as-a-snapshot.html",
    "/learn/queueing-a-series-of-state-updates": "queueing-a-series-of-state-updates.html",
    "/learn/updating-objects-in-state": "updating-objects-in-state.html",
    "/learn/updating-arrays-in-state": "updating-arrays-in-state.html",
    "/learn/managing-state": "managing-state.html",
    "/learn/reacting-to-input-with-state": "reacting-to-input-with-state.html",
    "/learn/choosing-the-state-structure": "choosing-the-state-structure.html",
    "/learn/sharing-state-between-components": "sharing-state-between-components.html",
    "/learn/preserving-and-resetting-state": "preserving-and-resetting-state.html",
    "/learn/extracting-state-logic-into-a-reducer": "extracting-state-logic-into-a-reducer.html",
    "/learn/passing-data-deeply-with-context": "passing-data-deeply-with-context.html",
    "/learn/scaling-up-with-reducer-and-context": "scaling-up-with-reducer-and-context.html",
    "/learn/escape-hatches": "escape-hatches.html",
    "/learn/referencing-values-with-refs": "referencing-values-with-refs.html",
    "/learn/manipulating-the-dom-with-refs": "manipulating-the-dom-with-refs.html",
    "/learn/synchronizing-with-effects": "synchronizing-with-effects.html",
    "/learn/you-might-not-need-an-effect": "you-might-not-need-an-effect.html",
    "/learn/lifecycle-of-reactive-effects": "lifecycle-of-reactive-effects.html",
    "/learn/separating-events-from-effects": "separating-events-from-effects.html",
    "/learn/removing-effect-dependencies": "removing-effect-dependencies.html",
    "/learn/reusing-logic-with-custom-hooks": "reusing-logic-with-custom-hooks.html",
    "/reference/react": "hooks.html",
    "/reference/react/useState": "state-hooks.html",
    "/reference/react/useEffect": "effects-refs.html",
    "/reference/react/useContext": "context.html",
    "/reference/rsc/server-components": "server-components.html",
    "/reference/rsc/server-actions": "rsc-actions.html",
    "/blog/2024/12/05/react-19": "react-19-features.html",
    "/reference/react-dom": "react-dom-reference.html"
}

def process_file(html_file):
    try:
        with open(html_file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
    except Exception as e:
        print(f"Error reading {html_file.name}: {e}")
        return False

    modified = False

    # 1. Update <a> tags based on title="..." attribute
    def replace_a_tag(match):
        nonlocal modified
        full_tag = match.group(0)
        title_attr = match.group(1)
        
        for title_key, local_file in TITLE_TO_FILE.items():
            if title_key.lower() == title_attr.lower():
                # Replace href="..." with local_file
                new_tag = re.sub(r'href=["\'][^"\']*["\']', f'href="{local_file}"', full_tag)
                if new_tag != full_tag:
                    modified = True
                    return new_tag
        return full_tag

    content = re.sub(r'<a[^>]*title=["\']([^"\']+)["\'][^>]*>', replace_a_tag, content)

    # 2. Update <a> tags based on online route paths
    sorted_routes = sorted(ROUTE_TO_FILE.keys(), key=len, reverse=True)
    for route, local_file in ROUTE_TO_FILE.items():
        pattern = re.compile(r'href=["\'](?:https://react\.dev)?' + re.escape(route) + r'/?([#?][^"\']*)?["\']')
        new_content, count = pattern.subn(f'href="{local_file}\\1"', content)
        if count > 0:
            modified = True
            content = new_content

    if modified:
        with open(html_file, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"[CONNECTED LINKS] {html_file.name}")
        return True
    return False

total_updated = 0
for html_file in BASE_DIR.glob("*.html"):
    if process_file(html_file):
        total_updated += 1

print(f"\n[SUCCESS] Connected links across {total_updated} HTML files!")
