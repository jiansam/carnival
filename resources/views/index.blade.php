<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 新北平安護你行親子嘉年華</title>
    <link rel="shortcut icon" href="/carnival/public/img/favicon.ico" type="/carnival/public/img/favicon.ico" />
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
            <nav>
                <ul>
                    <li><a href="level">闖關關卡</a></li>
                    <li><a href="map">園區地圖</a></li>
                    <li><a href="programme">舞台節目表</a></li>
                </ul>
            </nav>
        </header>

        <main class="index">
            <img src="/carnival/public/img/bg-index.jpg" alt="" class="bg">
            <section>
                <form id="form" method="post" action="toLevel">
					@csrf
                    <input id="phone" type="text" maxlength="10" name="phone" oninput="value=value.replace(/[^\d]/g,'')">
                    <img id="btnSend" src="/carnival/public/img/btn-index.png">
                </form>
            </section>
        </main>
        <!-- pop up -->
        <div class="popUp" id="bf-login">
            <div class="popUp--container">
                <button class="popUp--close"><i class="icon-times"></i></button>
                <h3>請使用beanfun!會員登入</h3>
                <div class="popUp--content text-center">
                    <button class="btn">beanfun! 登入</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/carnival/public/js/jquery.min.js"></script>
    <script src="/carnival/public/js/animation.js"></script>
    <script type="text/javascript">
		$("#btnSend").click(function(){
			var phone =  $("#phone").val();

			if (!phone) {
				alert("請輸入手機!");
				$("#phone").focus();
				return;
			}

			const taiwanMobileRegex = /^09[1-9]\d{7}$/;
			if (!taiwanMobileRegex.test(phone)) {
				 alert("手機號碼格式錯誤！");
				 $("#phone").focus();
			     return;
			}

			$("#form").submit();
		});
    </script>
</body>

</html>