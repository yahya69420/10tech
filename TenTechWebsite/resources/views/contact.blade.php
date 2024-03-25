<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .hero {
            background-image: white;
            height: 15vh;
            width: 100%;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("pexels-orhan-pergel-18980943.jpg");
            height: 30%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero p {
            color: white;
            text-align: center;
            padding-top: 8vh;
        }

        .contact-info {
    text-align: center;
    margin-bottom: 20px;
    padding: 20px;
    background-color: #f2f2f2;
}

.contact-info p {
    margin: 5px 0;
}

.contact-us {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    max-width: 800px; /* Adjust the max-width as needed */
    padding: 20px;
}

.left, .right {
    flex: 1;
    padding: 20px;
    box-sizing: border-box;
}

.left {
    background-color: #ccc;
}

.left h2, .right h2 {
    margin-top: 0;
    margin-bottom: 10px;
}

.right textarea {
    width: 100%;
    min-height: 250px;
    padding: 10px;
    box-sizing: border-box;
    resize: vertical; /* Allow vertical resizing */
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #7f807f;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}
        
    </style>
</head>
<body>
@include('header')

<div class="contact-info">
        <p>Contact our company:</p>
        <p>Email: contact@company.com</p>
        <p>Phone: +1 123-456-7890</p>
        <p>Emergency 24-hour service: +1 987-654-3210</p>
    </div>


<div class="hero">
</div>

<div class="contact-us">
    <div class="left">  
        <h2>Contact Information</h2>
        <form action="{{ route('submit.message') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="right">
        <h2>Message</h2>
        <textarea id="subject" name="subject" placeholder="Your message here" required></textarea>
        <input type="submit" id="submit" value="Submit">
        <p id="submittedMessage" style="color: green;"></p>
        </form>
    </div>
</div>


</div>
</div>
<div class="hero">
</div>
@include('layouts/footer')

<script>
    const form = document.querySelector('form');
    const submittedMessage = document.querySelector("#submittedMessage");

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission behavior

        const formData = new FormData(form);

        fetch('{{ route("submit.message") }}', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                submittedMessage.innerText = 'Message submitted successfully!';
                form.reset(); // Optionally reset the form
            } else {
                submittedMessage.innerText = 'Error: ' + data.error;
            }
        })
        .catch(error => {
            submittedMessage.innerText = 'Submitted';
        });
    });
</script>