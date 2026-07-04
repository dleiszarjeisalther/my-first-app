document.addEventListener('DOMContentLoaded', () => {

    const selectorGrid = document.getElementById('module-selector-grid');

    if (!selectorGrid) return;

    const createSubsystemCard = (subsystem) => {
        const modulePreview = subsystem.modules.slice(0, 4).map(item => {
            const moduleName = typeof item === 'string' ? item : item.name;
            return `<span class="module-chip">${moduleName}</span>`;
        }).join('');
        return `
            <article class="subsystem-card" data-subsystem-id="${subsystem.id}">
                <div class="subsystem-card-head">
                    <span class="eyebrow">${subsystem.category}</span>
                    <h3>${subsystem.title}</h3>
                    <p>${subsystem.description}</p>
                </div>
                <div class="subsystem-module-list">${modulePreview}</div>
                <div class="subsystem-card-meta">
                    <span class="subsystem-card-count">${subsystem.modules.length} modules</span>
                    <a class="btn btn-view" href="../dashboard_app_layout/code.html?subsystem=${encodeURIComponent(subsystem.id)}">Open Dashboard</a>
                </div>
            </article>
        `;
    };

    const renderSelectorGrid = () => {
        selectorGrid.innerHTML = SUBSYSTEMS.map(createSubsystemCard).join('');
    };

    renderSelectorGrid();
});
