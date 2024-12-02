<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    section.discount {
        background-color: blanchedalmond;
        background-image: url("assets/images/Discount/1.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding: 20px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
    }

    .discount-text {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 10px;
    }

    .discount-text p {
        margin: 0;
        font-size: xx-large;
    }

    .highlight {
        font-weight: bold;
        transition: color 1s ease;
    }
    </style>
</head>

<body>
    <section class="discount">
        <div class="discount-text">
            <p>Get <span class="highlight">20%</span> off your first order!</p>
            <p>using this code <span class="highlight">flowers4days</span></p>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        const colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"];
        let index = 0;
        let delay = 1000;

        setInterval(function() {
            $(".highlight").css("color", colors[index]);
            index = (index + 1) % colors.length;
        }, delay);
    });
    </script>
</body>

</html>