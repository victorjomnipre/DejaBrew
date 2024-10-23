function coffeeInformation(coffeeId) {
    const coffeePopup = document.getElementById("coffeePopUp");
    const coffeeDetails = document.getElementById("coffeeDetails");
    
    fetch('html/coffeeInfo.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `coffee_id=${coffeeId}`
    })
    .then(response => response.text())
    .then(data => {
        coffeeDetails.innerHTML = data;
        coffeePopup.style.display = "flex";
    });
}

function closePopup() {
    document.getElementById("coffeePopUp").style.display = "none";
}

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
