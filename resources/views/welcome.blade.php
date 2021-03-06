<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Multi Language App</title>
        <!--Favicon Description-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            @import 'https://fonts.googleapis.com/css?family=Inconsolata';

            html {
                min-height: 100%;
            }

            body {
                box-sizing: border-box;
                height: 100%;
                background-color: #000000;
                background-image: radial-gradient(#11581E, #041607), url("https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif");
                background-repeat: no-repeat;
                background-size: cover;
                font-family: 'Inconsolata', Helvetica, sans-serif;
                font-size: 1.5rem;
                color: rgba(128, 255, 128, 0.8);
                text-shadow:
                    0 0 1ex rgba(51, 255, 51, 1),
                    0 0 2px rgba(255, 255, 255, 0.8);
            }

            .noise {
                pointer-events: none;
                position: absolute;
                width: 100%;
                height: 100%;
                background-image: url("https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif");
                background-repeat: no-repeat;
                background-size: cover;
                z-index: -1;
                opacity: .02;
            }

            .overlay {
                pointer-events: none;
                position: absolute;
                width: 100%;
                height: 100%;
                background:
                    repeating-linear-gradient(
                        180deg,
                        rgba(0, 0, 0, 0) 0,
                        rgba(0, 0, 0, 0.3) 50%,
                        rgba(0, 0, 0, 0) 100%);
                background-size: auto 4px;
                z-index: 1;
            }

            .overlay::before {
                content: "";
                pointer-events: none;
                position: absolute;
                display: block;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                background-image: linear-gradient(
                    0deg,
                    transparent 0%,
                    rgba(32, 128, 32, 0.2) 2%,
                    rgba(32, 128, 32, 0.8) 3%,
                    rgba(32, 128, 32, 0.2) 3%,
                    transparent 100%);
                background-repeat: no-repeat;
                animation: scan 7.5s linear 0s infinite;
            }

            @keyframes scan {
                0%        { background-position: 0 -100vh; }
                35%, 100% { background-position: 0 100vh; }
            }

            .terminal {
                box-sizing: inherit;
                position: absolute;
                height: 100%;
                width: 1000px;
                max-width: 100%;
                padding: 4rem;
                text-transform: uppercase;
            }

            .output {
                color: rgba(128, 255, 128, 0.8);
                text-shadow:
                    0 0 1px rgba(51, 255, 51, 0.4),
                    0 0 2px rgba(255, 255, 255, 0.8);
            }

            .output::before {
                content: "> ";
            }

            /*
            .input {
              color: rgba(192, 255, 192, 0.8);
              text-shadow:
                  0 0 1px rgba(51, 255, 51, 0.4),
                  0 0 2px rgba(255, 255, 255, 0.8);
            }

            .input::before {
              content: "$ ";
            }
            */

            a {
                color: #fff;
                text-decoration: none;
            }

            a::before {
                content: "[";
            }

            a::after {
                content: "]";
            }

            .errorcode {
                color: white;
            }
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="noise"></div>
    <div class="overlay"></div>
    <div class="terminal">
        <h1>!! Elif Demir Error <span class="errorcode">404</span></h1>
        <p class="output">The page you are looking for might have been removed, had its name changed or is temporarily unavailable.</p>
        <p class="output">Please try to <a href="register">go back (REGISTER)</a> or <a href="login">return to the homepage(LOGIN)</a>.</p>
        <p class="output">Good luck.</p>
    </div>
    </body>
</html>
