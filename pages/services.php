<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\styles.css">
    <style>
    .services {
        margin: 80px auto;
        text-align: center;
        width: 90%;
        max-width: 1200px;
        height: auto;
        border: 1px solid black;
        padding: 35px;
        background-color: bisque;
    }

    .bento-container {
        background-color: bisque;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1.5fr));
        gap: 5px;
        justify-items: center;
        align-items: start;
    }

    .bento-title h1 {
        font-size: 1.5rem;
    }

    .bento-description p {}

    .image-container img {
        max-width: 100%;
        height: auto;
    }

    .bento1 {
        border-radius: 20px;
        background-color: aliceblue;
        padding: 20px;
    }

    .bento2 {
        background-color: aliceblue;
        padding: 20px;
        border-radius: 20px;
    }

    .bento3 {
        background-color: aliceblue;
        padding: 20px;
        border-radius: 20px;
    }

    .bento4 {
        background-color: aliceblue;
        padding: 20px;
        grid-column: 1;
        border-radius: 20px;
    }

    .bento5 {
        background-color: aliceblue;
        padding: 20px;
        grid-column: 2;
        border-radius: 20px;
    }

    .bento6 {
        background-color: aliceblue;
        padding: 20px;
        border-radius: 20px;
    }
    </style>
</head>

<body>
    <section style="background-color: bisque;" class="services">
        <h1>Services We Offer</h1>
        <div class="bento-container">
            <div class="bento1">
                <div class="bento-title">
                    <h1>Celebrations</h1>
                </div>
                <div class="bento-description">
                    <p>Making every celebration unforgettable with personalized services and unique touches.</p>
                </div>
                <div class="image-container">
                    <img style="border-radius: 20px;" src="assets\images\Services\1.png"
                        alt="Logo representing service 1">
                </div>
            </div>
            <div class="bento2">
                <div class="bento-title">
                    <h1>Birthdays</h1>
                </div>
                <div class="bento-description">
                    <p>Our birthday services are designed to make every celebration extra special.</p>
                </div>
                <div class="image-container">
                    <img style="max-height: 222px;" src="assets\images\Services\2.png"
                        alt="Logo representing service 2">
                </div>
            </div>
            <div class="bento3">
                <div class="bento-title">
                    <h1>Anniversaries</h1>
                </div>
                <div class="bento-description">
                    <p>Celebrating your love with elegant flowers and thoughtful details.</p>
                </div>
                <div class="image-container">
                    <img style="max-height: 222px;" src="assets\images\Services\3.png"
                        alt="Logo representing service 2">
                </div>
            </div>
            <div class="bento4">
                <div class="bento-title">
                    <h1>Weddings</h1>
                </div>
                <div class="bento-description">
                    <p>Fresh, beautiful flowers for every occasion, thoughtfully arranged just for you.</p>
                </div>
                <div class="image-container">
                    <img src="assets\images\Services\4.png" alt="Logo representing service 2">
                </div>
            </div>
            <div class="bento5">
                <div class="bento-title">
                    <h1>Memorial Flowers</h1>
                </div>
                <div class="bento-description">
                    <p>Elegant floral arrangements to honor and remember loved ones.</p>
                </div>
                <div class="image-container">
                    <img style="max-height: 222px;" src="assets\images\Services\5.png"
                        alt="Logo representing service 2">
                </div>
            </div>
            <div class="bento6">
                <div class="bento-title">
                    <h1>Bouquets</h1>
                </div>
                <div class="bento-description">
                    <p>Creating stunning bouquets to add beauty and elegance to any occasion.</p>
                </div>
                <div class="image-container">
                    <img style="max-height: 222px;" src="assets\images\Services\6.png"
                        alt="Logo representing service 2">
                </div>
            </div>
        </div>
    </section>
</body>

</html>