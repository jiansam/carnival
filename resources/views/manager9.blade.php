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
   			<button id="gift-button" class="default" no="9" type="927ddfee-9740-7d96-1878-2f0bdbe490a2" ></button>

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
                 	<center>
                 	<input id="phone" type="text" maxlength="10" name="phone" oninput="value=value.replace(/[^\d]/g,'')"
                 		style="display: block;
                    	width: 80dvw;
                    	max-width: 500px;
                    	height: 60px;
                    	padding: 0 20px;
                    	margin: 0 auto 28px;
                    	border-radius: 50px;
                    	background-color: #fff;
                    	border: 6px solid #5796c8;
                    	font-size: 22px;
                    	font-weight: 500"
                        placeholder="請輸入手機號碼"
                 	>
                 	</center>
                    <ul>

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

    <script src="/carnival/public/js/jquery.min.js"></script>
    <script src="/carnival/public/js/manager.js"></script>
</body>

</html>