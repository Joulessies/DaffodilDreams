<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .products-section {
        background-color: bisque;
        margin: 50px;
        padding: 20px;
        border: 1px solid black;
    }

    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .product {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        background-color: aliceblue;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .product-image {
        max-height: 200px;
        width: auto;
        margin: 10px auto;
    }

    .title {
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .product-description {
        color: #555;
        margin-bottom: 10px;
    }

    .add-to-cart {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
    }

    .add-to-cart:hover {
        background-color: #218838;
    }

    .cart-status {
        font-size: 1.2rem;
        margin-top: 20px;
        color: green;
    }
    </style>
</head>

<body>
    <section class="products-section">
        <h2 style="text-align: center;">Products</h2>
        <div class="products-container">
            <div class="product">
                <h3 class="title">Sunflower</h3>
                <img class="product-image" src="assets/images/Sunflowers/sunflower1.png" alt="Sunflower">
                <p class="product-description">A vibrant arrangement of fresh, handpicked flowers, perfect for any
                    occasion.</p>
                <button class="add-to-cart" data-product-id="1">Add to Cart</button>
            </div>
            <div class="product">
                <h3 class="title">Roses Bouquet</h3>
                <img class="product-image" src="assets\images\Roses\productrose2.png" alt="Sunflower">
                <p class="product-description">A classic bouquet of elegant, fresh roses, symbolizing love and beauty.
                </p>
                <button class="add-to-cart" data-product-id="2">Add to Cart</button>
            </div>
            <div class="product">
                <h3 class="title">Carnation</h3>
                <img class="product-image" src="assets\images\Carnations\carnationproduct1.png" alt="Sunflower">
                <p class="product-description">Delicate and charming carnations, full of color and lasting freshness.
                </p>
                <button class="add-to-cart" data-product-id="3">Add to Cart</button>
            </div>
        </div>
        <div class="cart-status" id="cart-status"></div>
    </section>

    <script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var productId = $(this).data('product-id');

            $.ajax({
                url: 'cart.php',
                type: 'POST',
                data: {
                    product_id: productId
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        $('#cart-status').text(data.message);
                    } else {
                        $('#cart-status').text('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });
    </script>
</body>

</html>