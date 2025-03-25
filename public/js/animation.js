//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});

const qrCodeSuccessCallback = (decodedText, decodedResult) => {
	html5QrCode.stop();
	alert("scan text :" + decodedText);
	//$("#qr-reader-results").html("scan text :" + decodedText);

};
	
//popUp
$('.list li img').click(function () {
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

		// If you want to prefer front camera test
	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');
});

$('.popUp button').click(function () {
	html5QrCode.stop();
	$('.popUp').removeClass('active');
	//$('.popUp_qrcode').addClass('active');
});
