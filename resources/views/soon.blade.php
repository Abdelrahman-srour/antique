<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Selema - Gold</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>

    body {
      margin: 0;
      padding: 0;
    }

    .container {
      position: relative;
    }

    main {
      padding: 1.5em 0;
      position: absolute;
      z-index: 1000;
      float: left;
      left: 930px;
      top: 450px;

    }

    .ip {
      width: 6em;
      height: 3em;

    }

    .ip__track {
      transition: stroke var(--trans-dur);
    }

    .ip__worm1,
    .ip__worm2 {
      animation: worm1 2s linear infinite;
    }

    .ip__worm2 {
      animation-name: worm2;
    }


    /* Animation */
    @keyframes worm1 {
      from {
        stroke-dashoffset: 0;
      }

      50% {
        animation-timing-function: steps(1);
        stroke-dashoffset: -358;
      }

      50.01% {
        animation-timing-function: linear;
        stroke-dashoffset: 358;
      }

      to {
        stroke-dashoffset: 0;
      }
    }

    @keyframes worm2 {
      from {
        stroke-dashoffset: 358;
      }

      50% {
        stroke-dashoffset: 0;
      }

      to {
        stroke-dashoffset: -358;
      }
    }
  </style>
  <link href="{{asset('build/assets/images/favicon.ico')}}" rel="icon">

</head>

<body>
  <div class="container">
    <main>
      <svg class="ip" viewBox="0 0 256 128" width="256px" height="128px" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad1" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#cf9d63" />
            <stop offset="33%" stop-color="#cf9d63" />
            <stop offset="67%" stop-color="#cf9d63" />
            <stop offset="100%" stop-color="#cf9d63" />
          </linearGradient>
          <linearGradient id="grad2" x1="1" y1="0" x2="0" y2="0">
            <stop offset="0%" stop-color="#cf9d63" />
            <stop offset="33%" stop-color="#cf9d63" />
            <stop offset="67%" stop-color="#cf9d63" />
            <stop offset="100%" stop-color="#cf9d63" />
          </linearGradient>
        </defs>
        <g fill="none" stroke-linecap="round" stroke-width="16">
          <g class="ip__track" stroke="#ddd">
            <path d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56" />
            <path d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64" />
          </g>
          <g stroke-dasharray="180 656">
            <path class="ip__worm1" stroke="url(#grad1)" stroke-dashoffset="0"
              d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56" />
            <path class="ip__worm2" stroke="url(#grad2)" stroke-dashoffset="358"
              d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64" />
          </g>
        </g>
      </svg>
    </main>
    <img style="height: 760px;width:1430px" src="{{asset('build/assets/images/soon.png')}}" alt="">
  </div>
</body>

</html>
