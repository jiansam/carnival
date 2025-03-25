//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});

var html5QrCode = null;

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
   html5QrCode = new Html5Qrcode("qr-reader");
});
 
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
	//if (decodedText)
	
	html5QrCode.stop();
	
	$('.popUp').removeClass('active');
		
	//alert("scan text :" + decodedText+"/phone");
	
	var url =decodedText+"/phone";
	console.log("scan url"+= url);
	
	$.post(url ,[],function(result) {
		
		
	});

};
	
//popUp
$('.list li img').click(function () {
	test();
	/*
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

		// If you want to prefer front camera test
	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');
	*/
	
});

$('.popUp button').click(function () {
	html5QrCode.stop();
	$('.popUp').removeClass('active');
	//$('.popUp_qrcode').addClass('active');
});
