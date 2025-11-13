<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register - Flower Power</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Join Flower Power</h2>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<p>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        echo "<p style='color:red;'>Email already registered.</p>";
    }
}
?>
</body>
</html>
