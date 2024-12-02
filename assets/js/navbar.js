$(document).ready(function () {
    // Data arrays for cart and favorites
    var cartItems = [
        { name: "Cart Item 1", price: 100 },
        { name: "Cart Item 2", price: 100 },
        { name: "Cart Item 3", price: 120 }
    ];

    var favoriteItems = [
        { name: "Favorite Item 1", price: 150 },
        { name: "Favorite Item 2", price: 200 }
    ];

    // Default user profile
    var userName = "Guest"; 
    var userEmail = "guest@example.com";

    // Function to update Cart content
    function updateCartContent() {
        var content = '';
        cartItems.forEach(function (item) {
            content += '<div class="cart-item"><span class="item-name">' + item.name +
                '</span><span class="item-price">$' + item.price + '</span></div>';
        });
        $('#cartContent').html(content);
    }

    // Function to update Cart modal
    function updateCartModal() {
        var content = '';
        cartItems.forEach(function (item) {
            content += '<p class="cart-item"><span class="item-name">' + item.name +
                '</span> <span class="item-price">$' + item.price + '</span></p>';
        });
        $('#modalCartContent').html(content);
    }

    // Function to update Favorites content
    function updateFavoritesContent() {
        var content = '';
        favoriteItems.forEach(function (item) {
            content += '<div class="favorite-item"><span class="item-name">' + item.name +
                '</span><span class="item-price">$' + item.price + '</span></div>';
        });
        $('#favoritesContent').html(content);
    }

    // Function to update Favorites modal
    function updateFavoritesModal() {
        var content = '';
        favoriteItems.forEach(function (item) {
            content += '<p class="favorite-item"><span class="item-name">' + item.name +
                '</span> <span class="item-price">$' + item.price + '</span></p>';
        });
        $('#modalFavoritesContent').html(content);
    }

    // Function to update Profile modal content
    function updateProfileModal() {
        $('#profileName').text(userName);
        $('#profileEmail').text(userEmail);
    }

    // Show success alert after sign-up or login
    function showSuccessAlert(message) {
        $('#successAlert').html(
            `<strong>Success!</strong> ${message} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`
        ).show();
    }

    // Update initial Cart and Favorites content
    updateCartContent();
    updateFavoritesContent();

    // Hover behavior for Cart and Favorites
    $('.cart-button').hover(function () {
        $('#cartContent').slideDown();
    }, function () {
        $('#cartContent').slideUp();
    });

    $('.favorites-button').hover(function () {
        $('#favoritesContent').slideDown();
    }, function () {
        $('#favoritesContent').slideUp();
    });

    // Modal Events
    $('#cartModal').on('show.bs.modal', function () {
        updateCartModal();
    });

    $('#favoritesModal').on('show.bs.modal', function () {
        updateFavoritesModal();
    });

    // Sign Up Form submission
    $('#signupForm').on('submit', function (e) {
        e.preventDefault();
        userName = $('#signupName').val();
        userEmail = $('#signupEmail').val();
        updateProfileModal();
        $('#signupModal').modal('hide');
        showSuccessAlert("You have successfully signed up!");
    });

    // Login Form submission
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        userEmail = $('#loginEmail').val();
        updateProfileModal();
        $('#loginModal').modal('hide');
        showSuccessAlert("You have successfully logged in!");
    });

    // Add to Favorites example
    function addToFavorites(item) {
        favoriteItems.push(item);
        updateFavoritesContent();
    }

    // Add a new favorite item dynamically
    addToFavorites({ name: 'New Favorite Item', price: '$40' });
});
