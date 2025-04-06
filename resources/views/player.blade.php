<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $data->title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Plyr CSS -->
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    :root {
      --plyr-color-main: #6b7280; /* Gray progress bar */
    }
    :root {
  --plyr-color-main: #212422; /* Gray progress bar */
}

    body {
      background-color: #111827;
    }

    .plyr {
      border-radius: 16px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
      max-width: 900px;
      margin: 40px auto;
    }

    .plyr__control {
      background-color: #1f2937;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .plyr__control:hover {
      background-color: #374151;
    }

    .plyr__menu__container {
      background-color: #1f2937;
    }

    .plyr__tooltip {
      background: #374151;
      color: #fff;
    }

    /* Customize speed and share text */
    .plyr__menu__container .plyr__menu__value {
      color: #ddd !important; /* Yellow text */
      font-weight: 500;
    }

    .plyr__menu__container .share-text {
      color: #60a5fa !important; /* Blue for share */
      font-weight: 600;
    }
    
  </style>
</head>
<body class="bg-gray-900 text-white font-sans">

  <div class="max-w-7xl mx-auto px-4 py-12">

   
    <h1 class="text-3xl font-bold mb-6 text-center">{{ $data->title }}</h1>
      <video id="player" playsinline controls data-poster="{{ $data->image }}">
        <source src="{{ $data->watch }}" type="video/mp4" size="720" />
        <!-- If using multiple quality sources, add more sources like: -->
        <!-- <source src="video-480p.mp4" type="video/mp4" size="480" /> -->
      </video>
    </div>
  </div>

  <!-- Plyr JS -->
  <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
  <script>
    const player = new Plyr('#player', {
      controls: [
        'play-large', 'rewind', 'play', 'fast-forward',
        'progress', 'current-time', 'duration',
        'mute', 'volume', 'captions',
        'settings', 'pip', 'airplay', 'fullscreen'
      ],
      settings: ['captions', 'quality', 'speed'],
      ratio: '16:9',
      autoplay: false,
      seekTime: 10,
      quality: {
        default: 720,
        options: [1080, 720, 480],
        forced: true,
        onChange: (quality) => {
        //   console.log('Quality changed to:', quality);
          // You can hook into this to switch sources manually if needed
        }
      }
    });

    player.on('ready', () => {
      const settingsMenu = document.querySelector('.plyr__menu__container [data-plyr="settings"]')?.parentNode;

      if (settingsMenu) {
        const shareOption = document.createElement('button');
        shareOption.className = 'plyr__control plyr__control--forward';
        shareOption.setAttribute('type', 'button');
        shareOption.setAttribute('role', 'menuitem');
        shareOption.innerHTML = `<span class="plyr__menu__value share-text">Share</span>`;
        shareOption.onclick = shareVideo;

        settingsMenu.appendChild(shareOption);
      }
    });

    function shareVideo() {
      if (navigator.share) {
        navigator.share({
          title: document.title,
          text: 'Check out this video!',
          url: window.location.href
        }).catch(err => console.error('Share failed:', err));
      } else {
        alert('Sharing is not supported in your browser.');
      }
    }
  </script>

</body>
</html>
