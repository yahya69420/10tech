<!DOCTYPE html>
<html>
<!--TODO: kulim park font still doesnt work, need to look into it. -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About Us</title>
    <style>
        @font-face {
            font-family: "Kulim Park";
            src: url("https://fonts.googleapis.com/css?family=Kulim+Park:700,200");
        }

        html,
        body {
            margin: 0px;
            height: 100%;
        }

        .about-us {
            background-color: #ffffff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
        }

        .about-us .div {
            background-color: #ffffff;
            width: 1440px;
            height: 1024px;
            position: relative;
        }

        .about-us .overlap-group {
            position: absolute;
            width: 1440px;
            height: 116px;
            top: 0;
            left: 0;
            background-color: #ffffff;
            box-shadow: 0px 4px 4px #00000040;
        }

        .about-us .rectangle {
            position: absolute;
            width: 59px;
            height: 3px;
        }

        .about-us .text-wrapper {
            position: absolute;
            width: 279px;
            top: 34px;
            left: 580px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #000000;
            font-size: 60px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .about-us .overlap {
            position: absolute;
            width: 408px;
            height: 70px;
            top: 29px;
            left: 107px;
        }

        .about-us .text-wrapper-2 {
            position: absolute;
            width: 279px;
            top: 11px;
            left: 0;
            opacity: 0.5;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #000000;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .about-us .text-wrapper-3 {
            position: absolute;
            width: 320px;
            top: 451px;
            left: 37px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #000000;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
            white-space: nowrap;
        }

        .about-us .p {
            position: absolute;
            width: 893px;
            top: 497px;
            left: 56px;
            font-family: "Kulim Park";
            font-weight: 200;
            color: #000000;
            font-size: 40px;
            letter-spacing: 0;
            line-height: normal;
        }

        .about-us .div-wrapper {
            position: absolute;
            width: 1440px;
            height: 284px;
            top: 116px;
            left: 0;
            background-color: #D9D9D9;
            box-shadow: 0px 4px 4px 0px #00000040;
        }

        .about-us .text-wrapper-4 {
            position: absolute;
            width: 330px;
            top: 55px;
            left: 555px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #000000;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
            line-height: normal;
        }

        .about-us .simple-static-image-wrapper {
            position: absolute;
            width: 448px;
            height: 459px;
            top: 452px;
            left: 967px;
            background-color: #D9D9D9;
            box-shadow: 0px 4px 4px 0px #00000040;
        }

        .about-us .simple-static-image {
            position: absolute;
            width: 330px;
            top: 172px;
            left: 59px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #000000;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
        }
    </style>
</head>
<body>
<div class="about-us">
    <div class="div">
        <!--This is a temporary placeholder header util the proper one gets pushed  -->
        <div class="overlap-group">
            <div class="text-wrapper">TenTech</div>
            <div class="overlap">
                <div class="rectangle"></div>
                <div class="text-wrapper-2">Search...</div>
            </div>
        </div>
        <div class="text-wrapper-3">Who We Are (1)</div>
        <p class="p">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est laborum.
        </p>
        <div class="div-wrapper"><p class="text-wrapper-4">Simple static banner, no carousel</p></div>
        <div class="simple-static-image-wrapper">
            <div class="simple-static-image">Simple static image<br />1</div>
        </div>
    </div>
</div>
</body>
</html>
