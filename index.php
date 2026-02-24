<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Portfolio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: transparent;
      font-family: 'Courier New', Courier, monospace;
      color: #dddddd;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
      position: relative;
      isolation: isolate;
      cursor: auto;
    }

    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: grayscale(1) brightness(0.6) contrast(1.2);
      z-index: -2;
      pointer-events: none;
    }

    body::after {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.65);
      z-index: -1;
      pointer-events: none;
    }

    .retro-card {
      max-width: 700px;
      width: 100%;
      background: rgba(26, 26, 26, 0.85);
      border: 2px solid #555555;
      box-shadow: 14px 14px 0 #000000;
      padding: 2.5rem 2rem;
      position: relative;
      background-image: 
        repeating-linear-gradient(45deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 2px, transparent 2px, transparent 8px),
        linear-gradient(rgba(255,255,255,0.02) 50%, rgba(0,0,0,0.02) 50%);
      background-size: auto, 100% 4px;
      overflow: hidden;
      backdrop-filter: blur(1px);
    }

    .retro-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(transparent 50%, rgba(255,255,255,0.01) 50%);
      background-size: 100% 8px;
      pointer-events: none;
      animation: scan 12s linear infinite;
      z-index: 2;
      opacity: 0.3;
    }

    @keyframes scan {
      0% { background-position: 0 0; }
      100% { background-position: 0 20px; }
    }

    /* top bar with icons */
    .top-bar {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 2.5rem;
      padding-bottom: 0.75rem;
      border-bottom: 1px solid #444444;
    }

    .led {
      width: 12px;
      height: 12px;
      background-color: #777777;
      border-radius: 50%;
      animation: ledPulse 2s infinite ease-in-out;
    }

    .led:nth-child(2) {
      background-color: #aaaaaa;
      animation-delay: 0.3s;
    }

    .led:nth-child(3) {
      background-color: #cccccc;
      animation-delay: 0.6s;
    }

    @keyframes ledPulse {
      0%, 100% { opacity: 0.7; transform: scale(1); box-shadow: 0 0 2px #888; }
      50% { opacity: 1; transform: scale(1.2); box-shadow: 0 0 6px #aaa; }
    }

    .path {
      margin-left: auto;
      font-size: 0.8rem;
      color: #777777;
      letter-spacing: 1px;
    }
    .path i {
      margin-right: 4px;
      color: #888;
    }

    /* profile picture */
    .pfp-section {
      display: flex;
      justify-content: center;
      margin: 1rem 0 2rem;
    }

    .pfp-frame img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border: 4px solid #777777;
      background-color: #2a2a2a;
      image-rendering: pixelated;
      image-rendering: crisp-edges;
      transition: border 0.2s, transform 0.2s;
    }

    .pfp-frame img:hover {
      border-color: #aaaaaa;
      transform: scale(1.02);
    }

    /* name / title with icon */
    .name {
      font-size: 2.2rem;
      font-weight: normal;
      text-transform: uppercase;
      letter-spacing: 4px;
      color: #eeeeee;
      border-left: 6px solid #888888;
      padding-left: 1.2rem;
      margin: 1.8rem 0 1.2rem;
      line-height: 1.2;
    }
    .name i {
      color: #aaa;
      margin-right: 10px;
      font-size: 2rem;
    }

    /* ---------- CAROUSEL ---------- */
    .carousel-container {
      background: #111111;
      border-left: 6px solid #777777;
      margin: 1.5rem 0 2rem;
      padding: 1.2rem 1rem;
      position: relative;
      transition: border-color 0.2s;
    }

    .carousel-container:hover {
      border-left-color: #aaaaaa;
    }

    .carousel-nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1rem;
      border-bottom: 1px dashed #444;
      padding-bottom: 0.5rem;
    }

    .nav-arrow {
      background: transparent;
      border: 2px solid #777;
      color: #ddd;
      font-size: 1.8rem;
      line-height: 1;
      padding: 0.2rem 0.8rem;
      cursor: pointer;
      font-family: 'Courier New', monospace;
      transition: all 0.2s;
      user-select: none;
      border-radius: 0;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .nav-arrow:hover {
      background: #333;
      border-color: #aaa;
      color: #fff;
      transform: scale(1.05);
    }

    .nav-arrow:active {
      transform: translate(2px, 2px) scale(1);
    }

    .nav-indicator {
      font-size: 0.9rem;
      letter-spacing: 2px;
      color: #888;
      text-transform: uppercase;
      background: #1e1e1e;
      padding: 0.3rem 1rem;
      border: 1px solid #444;
    }

    .carousel-items {
      display: grid;
      min-height: 380px;
      align-items: start;
      position: relative;
    }

    .carousel-item {
      grid-area: 1/1/1/1;
      opacity: 0;
      pointer-events: none;
      padding: 0.5rem 0.2rem;
      color: #bbbbbb;
      font-size: 1rem;
      line-height: 1.7;
      transition: opacity 0.15s;
    }

    .carousel-item.active {
      opacity: 1;
      pointer-events: auto;
      z-index: 2;
    }

    .carousel-item.wipe-in {
      animation: diagonalWipeIn 0.5s ease-out forwards;
      z-index: 3;
    }

    @keyframes diagonalWipeIn {
      0% { clip-path: polygon(0 0, 0 0, 0 100%, 0 100%); opacity: 1; }
      100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); opacity: 1; }
    }

    .carousel-item.hide-instantly {
      opacity: 0 !important;
      pointer-events: none !important;
      transition: none;
    }

    .carousel-item p {
      margin-bottom: 1rem;
    }
    .carousel-item p:last-of-type {
      margin-bottom: 0;
    }

    .home-image {
      margin: 1.2rem 0 0.5rem;
      width: 100%;
      aspect-ratio: 16 / 9;
      background-color: #1e1e1e;
      border: 2px dashed #555;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      font-size: 0.9rem;
    }

    .home-image img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
      display: block;
    }

    .carousel-item p i {
      color: #888;
      width: 1.5rem;
      margin-right: 0.3rem;
    }

    .carousel-item ul {
      list-style: none;
      padding-left: 1rem;
      border-left: 3px solid #555;
      margin: 1rem 0;
    }

    .carousel-item li {
      margin-bottom: 0.5rem;
      color: #ccc;
    }
    .carousel-item li i {
      color: #777;
      width: 1.5rem;
      margin-right: 0.3rem;
    }

    .carousel-item a {
      color: #aaa;
      text-decoration: none;
      border-bottom: 1px dotted #666;
      transition: color 0.2s, border-bottom 0.2s;
    }

    .carousel-item a:hover {
      color: #fff;
      border-bottom: 1px solid #ccc;
    }

    .footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-top: 2rem;
      border-top: 1px solid #333333;
      padding-top: 1.2rem;
      flex-wrap: wrap;
    }

    .footer-left {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-right: auto;
    }

    .footer-right {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .block {
      display: inline-block;
      width: 10px;
      height: 10px;
      background-color: #888888;
      animation: blockPulse 1.8s infinite alternate;
    }

    .block:nth-child(2) { animation-delay: 0.2s; }
    .block:nth-child(3) { animation-delay: 0.4s; }

    @keyframes blockPulse {
      0% { opacity: 0.5; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.3); background-color: #aaa; }
    }

    .cursor {
      font-size: 1.2rem;
      line-height: 1;
      color: #aaaaaa;
      animation: blink 1.2s step-end infinite;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.2; }
    }

    .replace-note {
      text-align: center;
      font-size: 0.7rem;
      color: #555555;
      margin-top: 1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      animation: fadeNote 4s infinite;
      pointer-events: none;
    }
    .replace-note i {
      margin: 0 4px;
    }

    @keyframes fadeNote {
      0%, 100% { opacity: 0.5; }
      50% { opacity: 1; }
    }

    .retro-card::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: repeating-linear-gradient(0deg, rgba(0,0,0,0.1) 0px, rgba(255,255,255,0.02) 1px, transparent 2px);
      pointer-events: none;
      opacity: 0.15;
      animation: flicker 5s infinite;
    }

    @keyframes flicker {
      0%, 100% { opacity: 0.15; }
      25% { opacity: 0.2; }
      50% { opacity: 0.1; }
      75% { opacity: 0.18; }
    }

    .glitch-text {
      position: relative;
      color: #ddd;
      text-decoration: none;
      display: inline-block;
    }
    .glitch-text::before,
    .glitch-text::after {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #111;
    }
    .glitch-text::before {
      left: 2px;
      text-shadow: -2px 0 #ffffff;
      animation: glitch-anim-1 2s infinite linear alternate-reverse;
    }
    .glitch-text::after {
      left: -2px;
      text-shadow: 2px 0 #888888;
      animation: glitch-anim-2 2s infinite linear alternate-reverse;
    }
    @keyframes glitch-anim-1 {
      0% { clip-path: inset(20% 0 30% 0); }
      20% { clip-path: inset(60% 0 10% 0); }
      40% { clip-path: inset(10% 0 60% 0); }
      60% { clip-path: inset(40% 0 40% 0); }
      80% { clip-path: inset(70% 0 5% 0); }
      100% { clip-path: inset(15% 0 70% 0); }
    }
    @keyframes glitch-anim-2 {
      0% { clip-path: inset(40% 0 40% 0); }
      20% { clip-path: inset(15% 0 70% 0); }
      40% { clip-path: inset(70% 0 5% 0); }
      60% { clip-path: inset(60% 0 10% 0); }
      80% { clip-path: inset(10% 0 60% 0); }
      100% { clip-path: inset(20% 0 30% 0); }
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
      backdrop-filter: blur(2px);
    }
    .modal-content {
      background-color: #111;
      margin: 15% auto;
      padding: 20px;
      border: 2px solid #777;
      width: 300px;
      max-width: 90%;
      text-align: center;
      color: #ddd;
      font-family: 'Courier New', monospace;
      box-shadow: 10px 10px 0 #000;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }
    .close:hover {
      color: #fff;
    }
    .modal-btn {
      background: transparent;
      border: 2px solid #777;
      color: #ddd;
      padding: 5px 20px;
      margin-top: 15px;
      font-family: 'Courier New', monospace;
      cursor: pointer;
    }
    .modal-btn:hover {
      background: #333;
      border-color: #aaa;
      color: #fff;
    }

    .footer-robot {
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      transform: translateY(-2px);
    }
    .robot-eyes {
      display: flex;
      gap: 6px;
      background: #222;
      padding: 4px 8px;
      border: 1px solid #666;
      border-radius: 10px;
    }
    .eye {
      width: 16px;
      height: 16px;
      background: #eee;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .pupil {
      width: 6px;
      height: 6px;
      background: #111;
      border-radius: 50%;
      transition: transform 0.1s ease;
    }
    .robot-antenna {
      width: 4px;
      height: 12px;
      background: #888;
      margin-bottom: 2px;
      border-radius: 2px;
      position: relative;
    }
    .robot-antenna::after {
      content: '';
      position: absolute;
      top: -5px;
      left: -3px;
      width: 10px;
      height: 10px;
      background: #aaa;
      border-radius: 50%;
    }

    .cd-player-outside {
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 2000;
      display: flex;
      align-items: stretch; 
      filter: drop-shadow(4px 4px 0 #000);
    }
    .cd-icon-wrapper {
      background: #1a1a1a;
      border: 2px solid #777;
      border-right: none; 
      width: 70px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: none; 
      transition: border-color 0.2s;
    }
    .cd-icon-wrapper:hover {
      border-color: #aaa;
    }
    .cd-icon-outside {
      font-size: 3.5rem;
      color: #ccc;
      animation: spin 6s linear infinite;
      transition: color 0.2s;
    }
    .cd-icon-outside:hover {
      color: #fff;
    }
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .cd-panel {
      width: 0;
      overflow: hidden;
      background: #222;
      border: 2px solid #777;
      border-left: none; 
      box-shadow: none;
      transition: width 0.3s ease-out;
      white-space: nowrap;
      height: 70px; 
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 0;
    }
    .cd-player-outside:hover .cd-panel {
      width: 300px; 
      padding: 0 10px;
    }
    .song-info {
      display: flex;
      flex-direction: column;
      color: #ddd;
      font-size: 0.9rem;
      min-width: 130px;
    }
    .song-title {
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .song-artist {
      font-size: 0.7rem;
      color: #888;
    }
    .cd-btn {
      background: transparent;
      border: 1px solid #777;
      color: #ddd;
      font-size: 1.2rem;
      padding: 5px 10px;
      cursor: pointer;
      transition: all 0.2s;
      border-radius: 0;
    }
    .cd-btn:hover {
      background: #333;
      border-color: #aaa;
      color: #fff;
    }

    @media (max-width: 500px) {
      .retro-card { padding: 1.5rem; }
      .name { font-size: 1.8rem; }
      .carousel-container { padding: 1rem 0.8rem; }
      .nav-arrow { font-size: 1.5rem; padding: 0.1rem 0.5rem; }
      .carousel-items { min-height: 440px; }
      .modal-content { margin: 30% auto; }
      .footer-left { gap: 10px; }
      .footer-right { gap: 8px; }
      .cd-player-outside { top: 10px; left: 10px; }
      .cd-icon-wrapper { width: 50px; height: 50px; }
      .cd-icon-outside { font-size: 2.5rem; }
      .cd-player-outside:hover .cd-panel { width: 240px; }
      .song-info { min-width: 100px; }
    }
  </style>
</head>
<body>
  <video autoplay loop muted playsinline id="bg-video" src="Shizuku.mp4"></video>

  <div class="cd-player-outside" id="cdPlayerOutside">
    <div class="cd-icon-wrapper">
      <i class="fas fa-compact-disc cd-icon-outside" id="cdIconOutside"></i>
    </div>
    <div class="cd-panel" id="cdPanel">
      <div class="song-info">
        <span class="song-title" id="currentSongTitle">Consume</span>
        <span class="song-artist" id="currentSongArtist">track</span>
      </div>
      <button class="cd-btn" id="playPauseBtnOutside"><i class="fas fa-play" id="playPauseIconOutside"></i></button>
      <button class="cd-btn" id="prevBtnOutside"><i class="fas fa-step-backward"></i></button>
      <button class="cd-btn" id="nextBtnOutside"><i class="fas fa-step-forward"></i></button>
    </div>
  </div>

  <div class="retro-card">
    <div class="top-bar">
      <span class="led"></span>
      <span class="led"></span>
      <span class="led"></span>
      <span class="path"><i class="fas fa-terminal"></i> ~/me</span>
    </div>

    <div class="pfp-section">
      <div class="pfp-frame">
        <img src="pfp.png" alt="profile picture">
      </div>
    </div>

    <div class="name"><i class="fas fa-gamepad"></i> >  Future Game_Dev</div>

    <div class="carousel-container">
      <div class="carousel-nav">
        <button class="nav-arrow" id="arrowPrev"><i class="fas fa-chevron-left"></i></button>
        <span class="nav-indicator" id="slideIndicator">HOME</span>
        <button class="nav-arrow" id="arrowNext"><i class="fas fa-chevron-right"></i></button>
      </div>

      <div class="carousel-items" id="carouselItems">
        <div class="carousel-item active" id="slide1">
          <p><i class="fas fa-home"></i> <span style="color:#ccc;">home</span></p>
          <p>Welcome to my digital space. <br> I build Games/Webs and overthink everything. <br> This terminal runs on curiosity, caffeine and the parts of me that don’t sleep.</p>
          <div class="home-image">
            <img src="Sky.png" alt="Sky">
          </div>
          <p><i class="fas fa-code"></i> current status: + Knowledge / debugging reality</p>
        </div>

        <div class="carousel-item" id="slide2">
          <p><i class="fas fa-user"></i> <span style="color:#ccc;">about me</span></p>
          <p><i class="fas fa-dice-d6"></i> I’ve always been into games. I can spend hours in front of a screen without even noticing the time, learning mechanics and improving little by little. From massive RPG worlds to fast-paced shooters or any rhythm games, gaming isn’t just something I do it’s something I genuinely enjoy and take seriously (sometimes).</p>
          <p><i class="fas fa-microchip"></i> I love analyzing game mechanics, memorizing maps and strategizing every move like a dumbass. When I’m not gaming, you can catch me geeking out over new tech or watching anime.</p>
          <p><i class="fas fa-book"></i> I just like getting better at what I care about, whether that’s in a game or in real life.</p>
          <p><i class="fas fa-circle-info"></i>Current mission: </p>
                                            <p> ☐ finish project </p>
                                           <p> ☐ fix bug </p>
                                             <p> ☑ questioning life choices</p>
        </div>

        <div class="carousel-item" id="slide3">
          <p><i class="fas fa-share-alt"></i> <span style="color:#ccc;">social</span></p>
          <p>find me on these networks:</p>
          <ul>
            <li><i class="fab fa-tiktok"></i> <a href="https://www.tiktok.com/@s1mple.louie">@s1mple.louie</a> (Random ¯\_(ツ)_/¯)</li>
            <li><i class="fab fa-facebook"></i> <a href="https://www.facebook.com/louie.carcasona.3">facebook.com/louie.carcasona.3</a> (Silly :P)</li>
            <li><i class="fab fa-spotify"></i> <a href="https://open.spotify.com/playlist/69VupzmyVjn6aV1Il1SaK7?si=5e0ff7a853a2419f&pt=0bfde5dfaff1fe6535cd6f18f6d66d3a">My playlist (?)</a></li>
            <li><a href="#" class="glitch-text discord-link" id="discordLink" data-text="DiScOrD.gG\VeNoMz65">discord.gg/Venomz65</a> (Not yet..)</li>
          </ul>
          <p><i class="fas fa-copyright"></i> 01101110 01100101 01110010 01100100 :p</p>
        </div>
      </div>
    </div>

    <div class="footer">
      <div class="footer-left">
        <!-- Silly robot -->
        <div class="footer-robot" id="footerRobot">
          <div class="robot-antenna"></div>
          <div class="robot-eyes">
            <div class="eye"><div class="pupil" id="pupilLeft"></div></div>
            <div class="eye"><div class="pupil" id="pupilRight"></div></div>
          </div>
        </div>
      </div>

      <div class="footer-right">
        <span class="block"></span>
        <span class="block"></span>
        <span class="block"></span>
        <span class="cursor">_</span>
      </div>
    </div>

    <div class="replace-note">
      <i class="fas fa-copyright"></i> 2026 Louie Carcasona / Venomz65. All rights reserved. <i class="fas fa-copyright"></i>
    </div>
  </div>

  <div id="errorModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p style="font-size:1.4rem; margin:10px 0;">ERROR 404</p>
      <p>something might have happen ;)</p>
      <button class="modal-btn" id="modalOk">OK</button>
    </div>
  </div>

  <script>
    (function() {
      const items = document.querySelectorAll('.carousel-item');
      const prevBtn = document.getElementById('arrowPrev');
      const nextBtn = document.getElementById('arrowNext');
      const indicator = document.getElementById('slideIndicator');
      const carouselContainer = document.querySelector('.carousel-container');
      let currentIndex = 0;
      const titles = ['HOME', 'ABOUT ME', 'SOCIAL'];
      
      let isAnimating = false;
      let animationTimer = null;
      let animationEndHandler = null;
      let touchStartX = 0, touchEndX = 0;
      const minSwipeDistance = 50;

      if (items.length && prevBtn && nextBtn && indicator) {
        function resetAnimationState() {
          if (animationTimer) clearTimeout(animationTimer);
          if (animationEndHandler) {
            const prevActive = document.querySelector('.carousel-item.wipe-in');
            if (prevActive) prevActive.removeEventListener('animationend', animationEndHandler);
          }
          items.forEach(item => item.classList.remove('wipe-in', 'hide-instantly'));
          isAnimating = false;
        }

        function updateSlide(newIndex) {
          if (isAnimating) return;
          if (newIndex < 0) newIndex = items.length - 1;
          if (newIndex >= items.length) newIndex = 0;
          if (newIndex === currentIndex) return;

          isAnimating = true;
          const currentItem = items[currentIndex];
          const nextItem = items[newIndex];

          currentItem.classList.add('hide-instantly');
          currentItem.classList.remove('active');

          nextItem.classList.add('active', 'wipe-in');
          indicator.textContent = titles[newIndex];

          const cleanup = () => {
            nextItem.classList.remove('wipe-in');
            items.forEach((item, idx) => {
              item.classList.remove('prev-active', 'hide-instantly', 'wipe-in');
              if (idx === newIndex) item.classList.add('active');
              else item.classList.remove('active');
            });
            currentIndex = newIndex;
            isAnimating = false;
            if (animationTimer) clearTimeout(animationTimer);
            if (animationEndHandler) {
              nextItem.removeEventListener('animationend', animationEndHandler);
              animationEndHandler = null;
            }
          };

          const onAnimationEnd = () => cleanup();
          animationEndHandler = onAnimationEnd;
          nextItem.addEventListener('animationend', onAnimationEnd, { once: true });

          animationTimer = setTimeout(() => {
            if (isAnimating) {
              if (animationEndHandler) {
                nextItem.removeEventListener('animationend', animationEndHandler);
                animationEndHandler = null;
              }
              cleanup();
            }
          }, 600);
        }

        prevBtn.addEventListener('click', () => updateSlide(currentIndex - 1));
        nextBtn.addEventListener('click', () => updateSlide(currentIndex + 1));

        window.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowLeft') { e.preventDefault(); updateSlide(currentIndex - 1); }
          else if (e.key === 'ArrowRight') { e.preventDefault(); updateSlide(currentIndex + 1); }
        });

        carouselContainer.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
        carouselContainer.addEventListener('touchend', (e) => {
          if (isAnimating) return;
          touchEndX = e.changedTouches[0].screenX;
          const deltaX = touchEndX - touchStartX;
          if (Math.abs(deltaX) > minSwipeDistance) {
            if (deltaX > 0) updateSlide(currentIndex - 1);
            else updateSlide(currentIndex + 1);
          }
        }, { passive: true });

        items.forEach((item, idx) => {
          item.classList.remove('active', 'prev-active', 'hide-instantly', 'wipe-in');
          if (idx === 0) item.classList.add('active');
        });
      }

      const modal = document.getElementById('errorModal');
      const discordLink = document.getElementById('discordLink');
      const closeBtn = document.querySelector('.close');
      const okBtn = document.getElementById('modalOk');
      if (modal && discordLink) {
        discordLink.addEventListener('click', (e) => {
          e.preventDefault();
          modal.style.display = 'block';
        });
        function closeModal() { modal.style.display = 'none'; }
        closeBtn.addEventListener('click', closeModal);
        okBtn.addEventListener('click', closeModal);
        window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
      }

      const pupilLeft = document.getElementById('pupilLeft');
      const pupilRight = document.getElementById('pupilRight');
      const robot = document.getElementById('footerRobot');
      if (pupilLeft && pupilRight && robot) {
        const maxMove = 4;
        function updatePupils(e) {
          const rect = robot.getBoundingClientRect();
          const robotCenterX = rect.left + rect.width / 2;
          const robotCenterY = rect.top + rect.height / 2;
          const mouseX = e.clientX, mouseY = e.clientY;
          const dx = mouseX - robotCenterX, dy = mouseY - robotCenterY;
          const distance = Math.sqrt(dx*dx + dy*dy);
          let moveX = 0, moveY = 0;
          if (distance > 0) {
            const ratio = Math.min(1, maxMove / distance);
            moveX = dx * ratio;
            moveY = dy * ratio;
          }
          pupilLeft.style.transform = `translate(${moveX}px, ${moveY}px)`;
          pupilRight.style.transform = `translate(${moveX}px, ${moveY}px)`;
        }
        document.addEventListener('mousemove', updatePupils);
        document.addEventListener('touchmove', (e) => {
          if (e.touches.length) updatePupils(e.touches[0]);
        }, { passive: true });
      }

      const songs = [
        'Consume.mp3',
        'Untitled.mp3',
        'Hell_or_flying.mp3'
      ]; 
      let currentSong = 0;
      let audio = new Audio();
      audio.volume = 0.5; 
      audio.src = songs[currentSong];
      audio.loop = false;

      const playPauseBtn = document.getElementById('playPauseBtnOutside');
      const playPauseIcon = document.getElementById('playPauseIconOutside');
      const prevBtnCD = document.getElementById('prevBtnOutside');
      const nextBtnCD = document.getElementById('nextBtnOutside');
      const songTitleSpan = document.getElementById('currentSongTitle');
      const songArtistSpan = document.getElementById('currentSongArtist'); 

      function updateSongTitle() {
        let fullName = songs[currentSong];
        let name = fullName.substring(0, fullName.lastIndexOf('.')) || fullName;
        songTitleSpan.textContent = name;
      }
      updateSongTitle();

      if (playPauseBtn && nextBtnCD && prevBtnCD) {
        playPauseBtn.addEventListener('click', () => {
          if (audio.paused) {
            audio.play().catch(e => console.log('Playback failed:', e));
            playPauseIcon.className = 'fas fa-pause';
          } else {
            audio.pause();
            playPauseIcon.className = 'fas fa-play';
          }
        });

        nextBtnCD.addEventListener('click', () => {
          currentSong = (currentSong + 1) % songs.length;
          audio.src = songs[currentSong];
          audio.play().catch(e => console.log('Playback failed:', e));
          playPauseIcon.className = 'fas fa-pause';
          updateSongTitle();
        });

        prevBtnCD.addEventListener('click', () => {
          currentSong = (currentSong - 1 + songs.length) % songs.length;
          audio.src = songs[currentSong];
          audio.play().catch(e => console.log('Playback failed:', e));
          playPauseIcon.className = 'fas fa-pause';
          updateSongTitle();
        });

        audio.addEventListener('ended', () => {
          currentSong = (currentSong + 1) % songs.length;
          audio.src = songs[currentSong];
          audio.play().catch(e => console.log('Auto-next failed:', e));
          playPauseIcon.className = 'fas fa-pause';
          updateSongTitle();
        });
      }
    })();
  </script>
</body>
</html>