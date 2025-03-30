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
                        <li id="no1"><img no="1" type="12fbd294-cea7-7918-732c-331fef15e4b4" src="/carnival/public/img/list-1.png"></li>
                        <li id="no2"><img no="2" type="251af113-5889-92d3-6680-70ae1d472344" src="/carnival/public/img/list-2.png"></li>
                        <li id="no3"><img no="3" type="3774cf35-62ff-4b20-b950-756f51927aab" src="/carnival/public/img/list-3.png"></li>
                        <li id="no4"><img no="4" type="4e8bc10a-f901-c352-4e70-097edfd34743" src="/carnival/public/img/list-4.png"></li>
                        <li id="no5"><img no="5" type="56de0ac2-e64b-0aa0-e7de-df60a119f8aa" src="/carnival/public/img/list-5.png"></li>
                        <li id="no6"><img no="6" type="639854b3-fe4f-799c-022e-a0032e1d2e90" src="/carnival/public/img/list-6.png"></li>
                        <li id="no7"><img no="7" type="7c211bd1-00df-3ce3-7d3a-6678fc41ef59" src="/carnival/public/img/list-7.png"></li>
                        <li id="no8"><img no="8" type="88be2eb2-bf1f-b7e8-9649-598563935d95" src="/carnival/public/img/list-8.png"></li>
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