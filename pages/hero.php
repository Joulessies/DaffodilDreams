<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\styles.css">
</head>

<body>
    <div class="hero">
        <div class="text">
            <h1>Buy Flowers For Any <span id="occasions">Occasion</span></h1>
            <br>
            Whether you're celebrating a birthday, anniversary, wedding,
            or</br> want to brighten someone's day,</br>
            flowers are the perfect way to express your emotions.
            </p>
            <button href="shop.php" type="button" class="btn" style="background-color: #FF5733; color: white;"><a>Order
                    Now</a></button>
        </div>
        <div>
            <img class="image" src="assets/images/Hero/Hero2.png" alt="Hero Image">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        var occasions = [
            "Occasion",
            "Weddings",
            "Anniversaries",
            "Birthdays",
            "Special Events"
        ];

        var currentIndex = 0;

        function changeOccasion() {
            $('#occasions').fadeOut(500, function() {
                $(this).text(occasions[currentIndex]);
                $(this).fadeIn(500);
            });
            currentIndex = (currentIndex + 1) % occasions.length;
        }

        setInterval(changeOccasion, 3000);
    });
    </script>
</body>

</html>