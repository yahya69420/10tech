<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/registerPageFrontEnd.css') }}">
    <!-- Added icon for website -->
    <link rel="icon" href="{{ asset('icons8-register-16.png') }}" type="image/x-icon" />
    <!-- Bootstrap CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Roboto Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <!-- animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BoxIcon CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- JavaScript for login page -->
    <script src="registerPageFrontEndContinueButtonScript.js"></script>
    <title>Log In</title>
</head>

<body>
<!-- Dark Mode Toggle -->
<div class="darkToggle toggle-darkMode">
    <label class="swap swap-rotate">
        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" id="darkToggle" />
        <!-- sun icon -->
        <svg class="swap-on fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
        </svg>
        <!-- moon icon -->
        <svg class="swap-off fill-current w-10 h-10" id="darkModeIconInsideToggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
        </svg>
    </label>
</div>

<!-- Login Card -->
<div class="registerCard p-5 rounded-md w-96 shadow-2xl" id="loginCardDarkMode">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="text-3xl font-bold text-center p-5 pb-0">Log in to your account</h1>
        <p class="text-center font-semibold p-1">Tech awaits you...</p>

        <!-- Email field -->
        <div class="form-control email-form-field">
            <input type="email" id="email" name="email" autocomplete="on" class="border-1 rounded border mt-3 mx-5 mb-0 border-black" placeholder="Email" required>
            <i class='bx bxs-x-circle' id="clearEmailIcon"></i>
            <div class="email-strength-indicator mb-0" id="email-strength-indicator">
                <span class="email-indicator-circle" id="email-length-indicator"></span>
                <span id="email-validation-message">Invalid email!</span>
            </div>
        </div>

        <!-- Password label/field -->
        <div id="password-confirm-password" class="form-control">
            <input type="password" id="password" name="password" class="border-1 rounded border mt-3 mx-5 mb-1 border-black" placeholder="Password" required>
            <i class='bx bxs-hide' id="showPassIcon"></i>
        </div>

        <div class="continueButton">
            <button class="btn w-80 mt-3" id="continue-button" disabled>
                Log in
            </button>
        </div>

        <div class="register-link text-center pt-2" id="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
    </form>
</div>
</body>
</html>
