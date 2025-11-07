<?php include("templates/header.php"); ?>

<style>
  :root {
    --primary-color: #005fcc;
    --text-color: #000;
    --bg-color: #fff;
    --contrast-bg: #000;
    --contrast-text: #fff;
    --focus-outline: 3px dashed #ff0;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: system-ui, sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--bg-color);
    color: var(--text-color);
    transition: background-color 0.3s, color 0.3s;
  }

  .high-contrast {
    background-color: var(--contrast-bg);
    color: var(--contrast-text);
  }

  .skip-link {
    position: absolute;
    top: -40px;
    left: 0;
    background: #000;
    color: #fff;
    padding: 8px 16px;
    z-index: 100;
    text-decoration: none;
    font-weight: bold;
  }

  .skip-link:focus {
    top: 0;
  }

  .contrast-toggle {
    display: flex;
    justify-content: center;
    padding: 1rem;
    background-color: #f5f5f5;
  }

  .contrast-toggle button {
    padding: 12px 24px;
    font-size: 1rem;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
  }

  .contrast-toggle button:focus {
    outline: var(--focus-outline);
    outline-offset: 4px;
  }

  main {
    padding: 1.5rem;
  }

  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  @media screen and (max-width: 600px) {
    .contrast-toggle {
      flex-direction: column;
      align-items: center;
    }

    main {
      padding: 1rem;
    }

    h1 {
      font-size: 1.5rem;
    }

    p {
      font-size: 1rem;
    }
  }
</style>

<body>
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <div class="contrast-toggle" role="region" aria-label="Display settings">
    <button onclick="toggleContrast()" aria-pressed="false" id="contrastBtn">
      Toggle High Contrast
    </button>
  </div>

  <main id="main-content" role="main">
    <h1>Welcome to Our Accessible Website</h1>
    <p>This page is optimized for mobile devices and includes accessibility features like skip links and contrast toggles.</p>

    <div class="sr-only" aria-hidden="false">
      Use the skip link to jump to content. Press the toggle button to switch contrast mode.
    </div>
  </main>

  <script>
    function toggleContrast() {
      document.body.classList.toggle('high-contrast');
      const btn = document.getElementById('contrastBtn');
      const isPressed = btn.getAttribute('aria-pressed') === 'true';
      btn.setAttribute('aria-pressed', !isPressed);
    }
  </script>

<?php include("templates/footer.php"); ?>




