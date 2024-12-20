// Sidebar Toggle
document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const contentIds = ['content', 'content-index', 'content-perfil', 'index-card'];

    // Load sidebar state from localStorage
    const sidebarState = localStorage.getItem('sidebarState');
    if (sidebarState === 'collapsed') {
        sidebar.classList.add('collapsed');
        contentIds.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.classList.add('collapsed');
            }
        });
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            contentIds.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.classList.toggle('collapsed');
                }
            });
            // Save sidebar state to localStorage
            localStorage.setItem('sidebarState', sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded');
        });
    }
});

// Mostrar sugerencias de búsqueda
function showSuggestions() {
    const input = document.getElementById('searchBar').value.toLowerCase();
    const suggestionsBox = document.getElementById('suggestions');
    suggestionsBox.innerHTML = '';

    if (input.length === 0) {
        suggestionsBox.style.display = 'none';
        return;
    }

    const suggestions = Object.keys(pages).filter(key => key.includes(input));

    if (suggestions.length > 0) {
        suggestions.forEach(suggestion => {
            const suggestionItem = document.createElement('div');
            suggestionItem.textContent = suggestion;
            suggestionItem.className = 'p-2';
            suggestionItem.style.cursor = 'pointer';
            suggestionItem.style.borderBottom = '1px solid #ddd';
            suggestionItem.onclick = () => {
                document.getElementById('searchBar').value = suggestion;
                suggestionsBox.style.display = 'none';
                window.location.href = pages[suggestion];
            };
            suggestionsBox.appendChild(suggestionItem);
        });
        suggestionsBox.style.display = 'block';
    } else {
        suggestionsBox.style.display = 'none';
    }
}

// Redireccionar al hacer la búsqueda
function searchRedirect(event) {
    event.preventDefault();
    const query = document.getElementById('searchBar').value.toLowerCase();
    if (pages[query]) {
        window.location.href = pages[query];
    } else {
        alert('No se encontró ninguna página relacionada.');
    }
}
