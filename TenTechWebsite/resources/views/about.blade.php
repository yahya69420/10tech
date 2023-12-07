<!DOCTYPE html>
<html>
<!--TODO: kulim park font still doesn't work, need to look into it. -->

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
            background-image: url('pexels-photomix-company-1038628.jpg');
            background-size: cover;
            box-shadow: 0px 4px 4px 0px #00000040;
        }

        .about-us .text-wrapper-4 {
            position: absolute;
            width: 330px;
            top: 55px;
            left: 555px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #D9D9D9;
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
            background-image: url('pexels-format-1029757.jpg');
            background-size: cover;
            box-shadow: 0px 4px 4px 0px #00000040;
        }

        .about-us .simple-static-image {
            position: absolute;
            width: 330px;
            top: 172px;
            left: 59px;
            font-family: "Kulim Park";
            font-weight: 700;
            color: #D9D9D9;
            font-size: 40px;
            text-align: center;
            letter-spacing: 0;
        }
    </style>
</head>
<body>
@include('header')
<div class="about-us">
    <div class="div">
        <div class="text-wrapper-3">Who We Are</div>
        <p class="p">
            Welcome to TenTech! We are a team of students that are committed to providing you the latest technology products.

        </p>
        <div class="div-wrapper"></div>
        <div class="simple-static-image-wrapper"></div>
    </div>
</div>
</body>
</html>
