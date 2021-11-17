<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GPR TV | Kementerian Komunikasi dan Informatika</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="{{ URL('/frontend') }}/img/logo-gpr.png">

    <!-- CSS here -->
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/ticker-style.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/slicknav.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/themify-icons.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/slick.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/nice-select.css">
        <link rel="stylesheet" href="{{ URL('/frontend') }}/css/style.css">
        <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

        <style>
            .video {
                padding: 0;
                margin: 0;
                list-style: none;
                display: flex;
                justify-content: center;
            }

            a.active {
                background-color: #ec2028;
                color:white
            }

            li a.active:hover {
                color: #214288
            }

            .trend-top-cap small a{
                color:#fff
            }

            .trend-top-cap h2:hover{
                color: #fc3f00
            }

            .footer-area {
                background-image: url("/frontend/img/footerbg.jpg"); background-repeat: no-repeat; background-size: cover
            }

            .footer-bottom-area {
                background-color: #fff
            }

            small a:hover{
                color:#fc3f00
            }

            .list-inline-item button {
                border: 0; background: none; color:#635c5c; cursor: pointer;
            }
            
            .list-inline-item button:hover {
                border: 0; background: none; color:#fc3f00
            }
            
            @media only screen and (max-width: 1024px) {
                .mobile-ver {
                    display: inline-block;
                }
                .desktop {
                    display: none;
                }
            }
            @media only screen and (min-width: 1024px) {
                .mobile-ver {
                    display: none;
                }
                .desktop {
                    display: block;
                }
            }

            .rainbow_text_animated {
                background: linear-gradient(90deg, #22e7ee, #d630f2, #ff002f, #e4ff00, #d630f2, #22e7ee);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-size: 400% 100%;
                animation: color-change 5s infinite;
                font-weight: 500
            }

            @keyframes color-change {
                0%,100% {
                    background-position: 0 0;
                }

                50% {
                    background-position: 100% 0;
                }
            }
        </style>
</head>