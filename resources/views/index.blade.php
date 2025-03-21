<html>
<head>
    <title>Html-Qrcode Demo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="/carnival/public/js/html5-qrcode.min.js"></script>
<body>
    <div id="qr-reader" ></div>
    <div id="qr-reader-results"></div>
</body>

<script>
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

		// If you want to prefer front camera
		html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
    });
</script>
</head>
</html>