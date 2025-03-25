<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <!-- 已經兌換 class="default"; 已兌換 class="disabled" -->
            <!-- 可兌換 class="default"; 已兌換 class="default" -->
            <!-- 不可兌換 class="default"; 已兌換 class="" -->
            <button id="gift-button" class="default"></button>
            <nav>
                <ul>
                    <li><a href="level">闖關關卡</a></li>
                    <li><a href="map">園區地圖</a></li>
                    <li><a href="programme">舞台節目表</a></li>
                </ul>
            </nav>
        </header>

        <main class="level">
         	<div id="qr-reader" ></div>

            <img src="/carnival/public/img/bg-level.jpg" alt="">

            <section>


                <div class="list">
                    <ul>
                        <li id="no1" {{$sign->no1 ? "class=disabled" :""}}><img src="/carnival/public/img/list-1.png"></li>
                        <li id="no2" {{$sign->no2 ? "class=disabled" :""}}><img src="/carnival/public/img/list-2.png"></li>
                        <li id="no3" {{$sign->no3 ? "class=disabled" :""}}><img src="/carnival/public/img/list-3.png"></li>
                        <li id="no4" {{$sign->no4 ? "class=disabled" :""}}><img src="/carnival/public/img/list-4.png"></li>
                        <li id="no5" {{$sign->no5 ? "class=disabled" :""}}><img src="/carnival/public/img/list-5.png"></li>
                        <li id="no6" {{$sign->no6 ? "class=disabled" :""}}><img src="/carnival/public/img/list-6.png"></li>
                        <li id="no7" {{$sign->no7 ? "class=disabled" :""}}><img src="/carnival/public/img/list-7.png"></li>
                        <li id="no8" {{$sign->no8 ? "class=disabled" :""}}><img src="/carnival/public/img/list-8.png"></li>
                    </ul>
                </div>
            </section>
        </main>

		<div class="popUp_qrcode" >
            <div class="popUp--container">

        	</div>
         </div>
        <!-- pop up -->
        <div class="popUp" >
            <div class="popUp--container">
                <h3>請掃描 QRCode</h3>

			     <button class="btn">確定</button>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/carnival/public/js/jquery.min.js"></script>

    <script src="/carnival/public/js/html5-qrcode.min.js"></script>
    <script src="/carnival/public/js/animation.js"></script>
    <script type="text/javascript">
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        const html5QrCode = new Html5Qrcode("qr-reader");

		const qrCodeSuccessCallback = (decodedText, decodedResult) => {
			html5QrCode.stop();
			alert("scan text :" + decodedText);
			//$("#qr-reader-results").html("scan text :" + decodedText);

		};
		const config = { fps: 10, qrbox: { width: 500, height: 400 } };

		// If you want to prefer front camera test
		html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
    });
    </script>
</body>

</html>