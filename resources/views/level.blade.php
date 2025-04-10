<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>2025 新北平安護你行親子嘉年華</title>
    <link rel="shortcut icon" href="/carnival/public//carnival/public/img/favicon.ico" type="/carnival/public/img/favicon.ico" />
    <!-- Layout -->
    <link rel="stylesheet" href="/carnival/public/css/styles.min.css">
</head>

<body>
    <div id="app">
        <header>
            <button id="hamburger-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <!-- 已經兌換  class="disabled" -->
            <!-- 可兌換   class="default" -->
            <!-- 不可兌換  class="" -->
            <button id="gift-button" class="{{$status}}"  ></button>
            <nav>
                <ul>
                	<li><a href="index">首頁</a></li>
                    <li><a href="level">闖關關卡</a></li>
                    <li><a href="map">園區地圖</a></li>
                    <li><a href="programme">舞台節目表</a></li>
                </ul>
            </nav>
        </header>

        <main class="level">


            <img src="/carnival/public/img/bg-level.jpg" alt="">

            <section>


                <div class="list">
                    <ul>
                        <li id="no1" {{$sign->no1 ? "class=disabled" :""}}><img no="1" src="/carnival/public/img/list-1.png"></li>
                        <li id="no2" {{$sign->no2 ? "class=disabled" :""}}><img no="2" src="/carnival/public/img/list-2.png"></li>
                        <li id="no3" {{$sign->no3 ? "class=disabled" :""}}><img no="3" src="/carnival/public/img/list-3.png"></li>
                        <li id="no4" {{$sign->no4 ? "class=disabled" :""}}><img no="4" src="/carnival/public/img/list-4.png"></li>
                        <li id="no5" {{$sign->no5 ? "class=disabled" :""}}><img no="5" src="/carnival/public/img/list-5.png"></li>
                        <li id="no6" {{$sign->no6 ? "class=disabled" :""}}><img no="6" src="/carnival/public/img/list-6.png"></li>
                        <li id="no7" {{$sign->no7 ? "class=disabled" :""}}><img no="7" src="/carnival/public/img/list-7.png"></li>
                        <li id="no8" {{$sign->no8 ? "class=disabled" :""}}><img no="8" src="/carnival/public/img/list-8.png"></li>
                    </ul>
                </div>
            </section>
        </main>


        <!-- pop up -->
        <div class="popUp" >
            <div class="popUp--container">
                <h3>請掃描 QRCode</h3>
				<div id="qr-reader" ></div>
				<br>
			    <button class="btn">關閉</button>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript"> var phone ='{{$sign->phone}}';</script>
    <script src="/carnival/public/js/jquery.min.js"></script>
    <script src="/carnival/public/js/html5-qrcode.min.js"></script>
    <script src="/carnival/public/js/animation.js"></script>
</body>

</html>