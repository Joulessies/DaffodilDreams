<html lang="en">

<head>
    <title>Infinite Marquee</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@900&display=swap");

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        font-family: "Inter", sans-serif;
    }

    h1 {
        font-size: 4.4rem;
        font-weight: 900;
        word-spacing: 12px;
        padding-inline-start: 1rem;
    }

    .body__inner-wrapper {
        height: 100%;
        max-width: 104rem;
        display: flex;
        flex-direction: column;
        gap: 6rem;
        justify-content: center;
        margin-inline: auto;
        margin-block-start: 6rem;
    }

    .outline__text {
        font-family: sans-serif;
        -webkit-text-stroke: 1px black;
        -webkit-text-fill-color: white;
    }

    .marquee {
        width: 100%;
        height: 12rem;
        pointer-events: none;
        background: white;
        overflow: hidden;
    }

    .marquee__inner-wrap {
        height: 100%;
        width: 100%;
    }

    .marquee span {
        text-align: center;
        color: lightgray;
        font-weight: 400;
        white-space: nowrap;
        font-size: max(2vw, 2.4rem);
        line-height: 1.2;
        font-weight: 700;
        padding: 1vh 1vw 0;
        text-transform: uppercase;
    }

    .marquee__img {
        width: max(8rem, 12vw);
        height: 8rem;
        margin: 0 4vw;
        border-radius: 100rem;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #444;
        filter: grayscale(0.6);
    }

    .marquee__inner {
        height: 100%;
        width: fit-content;
        align-items: center;
        display: flex;
        position: relative;
        animation: marquee 50s linear infinite;
        will-change: transform;
    }

    @keyframes marquee {
        to {
            transform: translateX(-50%);
        }
    }
    </style>
</head>

<body>
    <div class="marquee">
        <div class="marquee__inner-wrap">
            <div class="marquee__inner">
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
                <div class="marquee__img" style="background-image: url('assets/images/Hero/Hero.png');"></div>
            </div>
        </div>
    </div>
</body>

</html>