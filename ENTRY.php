<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<div class='message error'>Database connection failed 💔<br>" . mysqli_connect_error() . "</div>");
}

if (isset($_POST['save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name1'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if the email already exists
    $check_email = "SELECT * FROM rf WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_email);

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Flower Power Registration</title>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap' rel='stylesheet'>
        <style>
            body {
                background-color: rgb(255, 228, 236);
                font-family: 'Momo Trust Display', cursive;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background-color: white;
                border-radius: 20px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
                padding: 40px;
                max-width: 400px;
                text-align: center;
                transition: 0.3s;
            }
            h2 {
                color: rgb(202, 20, 162);
                font-size: 1.5em;
            }
            .message {
                padding: 15px;
                border-radius: 12px;
                margin-top: 15px;
                animation: fadeIn 0.8s ease;
                font-size: 1.1em;
            }
            .success {
                background-color: #f3d1f4;
                border: 2px solid #c2185b;
                color: #8a005a;
            }
            .error {
                background-color: #ffe5e5;
                border: 2px solid #e53935;
                color: #b71c1c;
            }
            @keyframes fadeIn {
                from {opacity: 0; transform: scale(0.95);}
                to {opacity: 1; transform: scale(1);}
            }
            a {
                color: #c2185b;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
    <div class='container'>
    ";

    if (mysqli_num_rows($check_result) > 0) {
        echo "
        <h2>🌸 Email already registered 🌸</h2>
        <div class='message error'>
            This email is already in use.<br>
            Please use another one or 
            <a href='Login.html'>login here</a>.
        </div>";
    } else {
        $sql = "INSERT INTO rf (first_name, last_name, gender, email, phone, password)
                VALUES ('$first_name', '$last_name', '$gender', '$email', '$phone', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "
            <h2>🌸 Registration Successful! 🌸</h2>
            <div class='message success'>
                Welcome to <b>Flower Power</b>!<br>
                Your information has been saved securely.<br><br>
                <a href='Login.html'>Go to Login</a>
            </div>";
        } else {
            echo "
            <h2>Oops... something went wrong 💐</h2>
            <div class='message error'>
                We couldn’t save your data.<br>
                Please try again or contact support.<br><br>
                <a href='FORMS.html'>Go back to the form</a>
            </div>";
        }
    }

    echo "</div></body></html>";

    mysqli_close($conn);
}
?>