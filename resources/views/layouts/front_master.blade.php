<?php
    if (!isset($link))
    {
        $link = 0;
    }
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Sheba Foundation</title>

    <!-- Seo Meta Tags -->
    <meta name="keywords" content="{{ $seo_data->keywords }}" />
    <meta name="description" content="{{ $seo_data->description }}">
    <meta name="author" content="{{ $seo_data->author }}">
    <meta itemprop="name" content="{{ $seo_data->title }}">
    <meta itemprop="description" content="{{ $seo_data->description }}">
    <meta itemprop="image" content="{{ url('uploads/seo/card.jpg') }}">
    <meta name="twitter:card" content="{{ $seo_data->title }}">
    <meta name="twitter:title" content="{{ $seo_data->title }}">
    <meta name="twitter:description" content="{{ $seo_data->title }}">
    <meta name="twitter:image:src" content="{{ url('uploads/seo/card.jpg') }}">
    <meta property="og:title" content="{{ $seo_data->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ url('uploads/seo/card.jpg') }}" />
    <meta property="og:description" content="{{ $seo_data->description }}" />
    <meta property="og:site_name" content="{{ $seo_data->title }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ url('app/core/app.min.css') }}">
    <link rel="stylesheet" href="{{ url('app/core/theme.min.css') }}">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="{{ url('app/core/app.js') }} "></script>

    <style>
        .medium-content {
            float: left;
            width: 90%;
            margin-left: 60px;
        }

        .social-icons {
            margin: 0 0 13px 0;
            float: right;
        }

        .social-icons li {
            float: right;
        }

        .logo {
            transform: translateY(75%);
        }

        .current {
            background-color: #5659C9 !important;
            border-right: 1px solid #5659C9 !important;
        }
        .slicknav_menu {
            font-size: 16px;
            box-sizing: border-box;
            background: #4c4c4c;
            padding: 5px;
            width: inherit;
            margin: 0 auto;
        }

        @media screen and (max-width: 767px) and (min-width: 250px) {
            #logo a img {
                float: left;
                width: 270px;
                height: 100px;
                margin-bottom: 30px;
                margin-top: 13px;
            }
            
            
        }
        
        @media only screen and (min-width: 400px) and (max-width: 1037px) {
	
            .add{
                visibility: hidden;
            }
        }

        body {
            background-color: #5659c9;
            background-image: url("https://www.transparenttextures.com/patterns/dimension.png");
            background-attachment: fixed;
            font-size: 13px;
            line-height: 21px;
            color: #666;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
        }

        .login {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 50px;
        }

        #contact fieldset div input {
            width: 100%;
        }
        article td {
            padding: 5px !important;
        }
        article li {
            padding: 5px !important;
        }
        .style-2 ul li:first-child {
            margin-left: 0 !important;
        }
    </style>
</head>
<body>
        <div class="add" style="float: right; width: 150px; height: 1000px;position: absolute;">
           <a href="http://medihelp.info/" target="_blank"><img style="width: 150px; height: 400px;" src="{{ url('add/medihelpline.png') }}" alt="medihelp" /></a>
        </div>
<div id="wrapper">
    <div class="container" style="z-index:10;">
        
        <div class="clearfix"></div>
    </div>

    @include('inc.nav')

    <div class="clearfix"></div>
    @yield('content')
</div>

<footer id="footer-bottom">
    <div class="container">
        <div class="eight columns">
            <div class="copyright">
                © Copyright 2018 by <a href="#">Sheba Foundation</a>. All Rights Reserved.
            </div>
        </div>
        <div class="eight columns">
            <nav id="sub-menu">
                <ul>
                    <li><a href="">Contact</a></li>
                    <li style="color: #ffffff">Developed and maintained by <a href="http://proximio.net/">Proximio Tech</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
</body>
</html>