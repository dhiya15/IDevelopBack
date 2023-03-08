<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }


        .flex-column {
            flex-direction: column;
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .link {
            text-decoration: underline;
            color: #0b4d75;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-white sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-column justify-center align-center text-center">
            <img
                style="max-width: 96px; margin: 0 auto;"
                src="data:image/png;base64,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">

            @if(isset($resend) && $resend == true)
                <h2 style="margin-bottom: 0">ID has been sent ✨</h2>
                <p>
                    Didn't receive your attendance id yet ?
                    reach us at <span class="link">contact@idevelop.club</span>
                </p>
            @else
                <h2 style="margin-bottom: 0">Thanks, Your attendance has been confirmed ✨</h2>
                <p> Your attendance will be sent to your email shortly </p>
                <p>
                    Didn't receive your attendance id yet ?
                    <a class="link" href="{{ route('attendance.resend-id', ['id' => $registration->id])  }}">
                        resend my ID
                    </a>
                    or reach us at <span class="link">contact@idevelop.club</span>
                </p>
            @endif
        </div>
    </div>
</div>
</body>
</html>
