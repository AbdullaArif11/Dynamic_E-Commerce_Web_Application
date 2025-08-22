document.addEventListener('DOMContentLoaded', function() {
    const addToBuyButtons = document.querySelectorAll('.card-actions button');

    addToBuyButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the parent card element
            const card = button.closest('.card');

            // Get the title and price of the selected item
            const title = card.querySelector('.card-title').innerText;
            const price = parseFloat(card.querySelector('.card-price').innerText.replace('$', ''));

            // Create a new item object with title and price
            const item = { title, price };

            // Add the selected item to the cart
            addToCart(item);

            // Update the displayed cart items and total price
            updateCart();
        });
    });

    function addToCart(item) {
        // Retrieve the existing cart items from local storage
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        // Add the new item to the cart
        cartItems.push(item);

        // Save the updated cart items to local storage
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    function updateCart() {
        // Retrieve the cart items from local storage
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        // Display the cart items and calculate the total price
        const itemBox = document.getElementById('item-box');
        const totalPriceSpan = document.getElementById('Total-price');

        let itemListHTML = '';
        let totalPrice = 0;

        cartItems.forEach(item => {
            itemListHTML += `<div>${item.title} - $${item.price.toFixed(2)}</div>`;
            totalPrice += item.price;
        });

        itemBox.innerHTML = itemListHTML;
        totalPriceSpan.innerText = totalPrice.toFixed(2);
    }
});
