<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Member | Flower Power</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Momo Trust Display", cursive;
      background-image: url('img/puzzle-creative-T7r6ZZH5WoU-unsplash.jpg');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      min-height: 100vh;
    }
    .content-box {
      background-color: rgba(255, 0, 200, 0.75);
      padding: 35px 40px;
      border-radius: 20px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.4);
      width: 90%;
      max-width: 750px;
      color: #000;
      animation: fadeIn 1s ease-in-out;
    }
    h1 {
      text-align: center;
      font-family: "Momo Trust Display", cursive;
      color: #ffffff;
      margin-bottom: 15px;
      font-size: 2.3rem;
    }
    h2 {
      font-family: "Momo Trust Display", cursive;
      color: #ffe6fb;
      margin-top: 25px;
      font-size: 1.6rem;
    }
    p {
      font-size: 20px;
      line-height: 1.5;
      text-align: justify;
      margin-bottom: 15px;
      color: #fff;
    }
    ul {
      font-size: 20px;
      line-height: 1.6;
      text-align: justify;
      list-style-type: none;
      padding-left: 0;
      margin-top: 10px;
    }
    li {
      margin-bottom: 12px;
      transition: transform 0.2s ease;
      color: #fff;
    }
    li:hover {
      transform: scale(1.03);
    }
    strong {
      font-weight: bold;
    }
    .links {
      text-align: center;
      margin-top: 25px;
    }
    a {
      display: inline-block;
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
      font-family: "Momo Trust Display", cursive;
      background-color: rgba(255, 255, 255, 0.2);
      padding: 10px 20px;
      border-radius: 12px;
      margin: 10px;
      transition: background 0.3s ease, transform 0.2s ease;
    }
    a:hover {
      background-color: rgba(255, 255, 255, 0.4);
      transform: scale(1.05);
      text-decoration: none;
    }
    .logout-btn {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      border-radius: 12px;
      padding: 10px 25px;
      margin-top: 25px;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: background 0.3s ease, transform 0.2s ease;
    }
    .logout-btn:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="content-box">
    <h1>🌸 Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>! 🌸</h1>
    <p>We’re so happy to have you, <strong>dear member!</strong> Your journey with Flower Power has officially begun — full of color, fragrance, and joy. As part of our community, you now have access to exclusive perks designed to brighten your days like a fresh bouquet in bloom.</p>

    <h2>🌷 Your Member Benefits</h2>
    <ul>
      <li>💐 <strong>Exclusive Discounts:</strong> Get 10% off all purchases, every single time — online or in-store.</li>
      <li>🎂 <strong>Birthday Surprises:</strong> Receive a special gift or voucher during your birthday month.</li>
      <li>🚚 <strong>Priority Delivery:</strong> Enjoy same-day delivery until 1:00 PM — even during peak seasons.</li>
      <li>🌺 <strong>Early Access:</strong> Be the first to shop limited collections and floral launches.</li>
      <li>🌼 <strong>Loyalty Points:</strong> Earn points with every order and redeem them for your next bouquet.</li>
      <li>💖 <strong>Personalized Offers:</strong> Receive hand-picked promotions based on your favorite flowers.</li>
    </ul>

    <h2>💮 What’s Next?</h2>
    <p>Now that you’re part of the family, explore our latest collections, enjoy your exclusive discounts, and keep an eye on your inbox for your first member surprise. The world of Flower Power awaits — blooming just for you!</p>

    <div class="links">
      <a href="index.html">🏡 Back to Home</a>
      <a href="#">🌷 Explore Our Flowers</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>
  </div>
</body>
</html>
