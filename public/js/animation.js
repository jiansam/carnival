//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});


//popUp
$('.list li img').click(function () {
	
	const html5QrCode = new Html5Qrcode("qr-reader");

	const qrCodeSuccessCallback = (decodedText, decodedResult) => {
		html5QrCode.stop();
		alert("scan text :" + decodedText);
		
		$('.popUp').removeClass('active');
	};
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

	// If you want to prefer front camera test
	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');
});

$('.popUp button').click(function () {
    $('.popUp').removeClass('active');
});
