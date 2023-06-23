@extends('master')

@push('style')
    <style>
        html, body {
            height: 100%;
            background-image: linear-gradient(-105deg, #009acc, #363795);
        }

        .container {
            background-color: blue;
        }
        .spinner {
            -webkit-animation: rotate 2s linear 2;
            animation: rotate 2s linear 2;
            z-index: 2;
            /* position: absolute; */
            /* top: 50%;
            left: 50%; */
            margin: -25px 0 0 -25px;
            width: 50px;
            height: 50px;
        }

        .spinner .path {
            stroke: #93bfec;
            stroke-linecap: round;
            -webkit-animation: dash 1.5s ease-in-out 2;
            animation: dash 1.5s ease-in-out 2;
        }

        @-webkit-keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        @-webkit-keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124;
            }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124;
            }
        }

        .end-animation {
            -webkit-animation: end-rotate 1s linear forwards;
            animation: end-rotate 1s linear forwards;
        }

        @-webkit-keyframes end-rotate {
            100% {
                transform: rotate(0deg);
                opacity: 0;
            }
        }

        @keyframes end-rotate {
            100% {
                transform: rotate(0deg);
                opacity: 0;
            }
        }
    </style>
@endpush

@section('title', 'Payment')

@section('content')
<div class="container d-flex justify-content-center">
    <h1>title</h1>
    <svg class="spinner" viewBox="0 0 50 50" id="spinner">
        <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
    </svg>
</div>

<script>
    var spinnerElement = document.getElementById('spinner');
    var animationIterationCount = 2;
    var animationCount = 0;

    // Animation iteration event listener
    spinnerElement.addEventListener('animationiteration', function(event) {
        animationCount++;

        // Check if animation completed 4 times
        // if (animationCount === animationIterationCount) {
        //     spinnerElement.classList.add('end-animation');
        // }
        // setTimeout(function() {
        //         window.location.href = '{{ route('vps.index') }}'; // Replace with the desired URL
        // }, 1500);
    });
</script>
@endsection
