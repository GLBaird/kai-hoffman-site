var items = document.querySelectorAll('a[data-tref="delete"]');
items.forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault();
        if (confirm("Are you sure you want to delete this?")) {
            location.href = event.currentTarget;
        }
    });
});