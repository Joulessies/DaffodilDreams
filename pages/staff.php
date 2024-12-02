<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .staff-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .staff-section {
        text-align: center;
        padding: 30px;
        background-color: burlywood;
        width: 1200px;
        height: 700px;
        border: 1px solid black;
    }

    .staff-members {
        display: flex;
        flex-wrap: wrap;
        background-color: aliceblue;
        margin: 20px;
        padding: 20px;
        width: 300px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="staff-wrapper">
        <section class="staff-section">
            <h1 class="staff-title">Our Staff</h1>
            <div class="staff-members">
                <div class="staff-1">
                    <h2 class="staff-member-name">John Doe</h2>
                    <p>Member</p>
                    <img src="assets\images\Staff\leader.jpg" alt="Staff">
                </div>
            </div>
        </section>
    </div>

</body>

</html>