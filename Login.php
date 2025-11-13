<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fp";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("<div class='message error'>Database connection failed 💔</div>");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password_input = $_POST['password'];

    $query = "SELECT * FROM rf WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    $login_message = "";
    $message_class = "";

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $stored_password = $user['password'];

        if ($password_input === $stored_password) {
            $_SESSION['user'] = $user['first_name'];
            $login_message = "Welcome back, {$user['first_name']} 🌸 Redirecting to your member area...";
            $message_class = "success";
            echo "<meta http-equiv='refresh' content='2;url=Benefits.php'>";
        } else {
            $login_message = "Invalid password 💐 Please try again.";
            $message_class = "error";
        }
    } else {
        $login_message = "No account found 💔 Please register first.";
        $message_class = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Validation - Flower Power</title>
  <link href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Momo Trust Display", cursive;
      background: linear-gradient(135deg, rgb(255, 192, 203), rgb(255, 192, 203));
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .container {
      background-color: rgba(255,255,255,0.95);
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      padding: 40px;
      max-width: 420px;
      text-align: center;
      animation: fadeIn 0.6s ease;
    }

    h2 {
      color: rgb(202, 20, 162);
      margin-bottom: 16px;
    }

    .message {
      padding: 15px;
      border-radius: 10px;
      margin-top: 15px;
      font-size: 16px;
      font-weight: 500;
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

    a {
      color: #c2185b;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.95);}
      to {opacity: 1; transform: scale(1);}
    }
  </style>
</head>
<body>
  <div class="container">
    <?php if (!empty($login_message)): ?>
      <h2><?= $message_class === "success" ? "Login Successful 🌸" : "Login Failed 💔"; ?></h2>
      <div class="message <?= $message_class; ?>">
        <?= $login_message; ?>
        <br><br>
        <?php if ($message_class === "error"): ?>
          <a href="Login.html">Try Again</a>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <h2>Access Denied 🚫</h2>
      <div class="message error">
        Please use the <a href="Login.html">login form</a>.
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
