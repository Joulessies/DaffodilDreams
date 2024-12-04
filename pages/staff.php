<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .staff-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: none;
        min-height: 95vh;
    }

    .staff-section {
        text-align: center;
        padding: 30px;
        background-color: burlywood;
        width: 100%;
        max-width: 1200px;
        border: 1px solid black;
        border-radius: 10px;
    }

    .staff-members {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px 0;
    }

    .staff-1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: aliceblue;
        margin: 10px;
        padding: 20px;
        width: 250px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
    }

    .staff-1:hover {
        transform: scale(1.05);
    }

    .staff-1 img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .staff-1 {
            width: 80%;
        }

        .staff-section {
            padding: 20px;
        }

        .staff-1 img {
            height: 150px;
        }
    }

    @media (max-width: 480px) {
        .staff-1 {
            width: 90%;
        }

        .staff-1 img {
            height: 120px;
        }
    }
    </style>
</head>

<body>
    <div class="staff-wrapper">
        <section class="staff-section">
            <h1 class="staff-title">Our Staff</h1>
            <div class="staff-members">
                <div class="staff-1">
                    <h2 class="staff-member-name">Julius</br> San Jose</h2>
                    <p>Leader</p>
                    <img src="assets\images\Staff\me.jpg" alt="Staff">
                </div>
                <div class="staff-1">
                    <h2 class="staff-member-name">Albert Binag</h2>
                    <p>Member</p>
                    <img src="assets\images\Staff\binag.jpg" alt="Staff">
                </div>
                <div class="staff-1">
                    <h2 class="staff-member-name">Kyle Domingo</h2>
                    <p>Member</p>
                    <img src="assets\images\Staff\domingo.png" alt="Staff">
                </div>
                <div class="staff-1">
                    <h2 class="staff-member-name">Enrique Jorge</h2>
                    <p>Member</p>
                    <img src="assets\images\Staff\jorge.png" alt="Staff">
                </div>
                <div class="staff-1">
                    <h2 class="staff-member-name">Jaycee Tesorero</h2>
                    <p>Member</p>
                    <img src="assets\images\Staff\jc.jpg" alt="Staff">
                </div>
            </div>
        </section>
        </section>
    </div>
</body>

</html>