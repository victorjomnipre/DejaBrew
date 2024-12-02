function filterCoffee(category) {
    const cards = document.querySelectorAll('.coffee_card');
    cards.forEach(card => {
        if (category === 'All' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function showAllProducts() {
    filterCoffee('All');
}



