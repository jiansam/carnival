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
	
	scan(decodedText);
	
	/*
	var url =decodedText+"/phone";
	console.log("scan url"+= url);
	
	$.post(url ,[],function(result) {
		
		
	});*/
};
	
$('#gift-button').click(function () {
	var status = $(this).attr("class");
	if (status == "" || status=="disabled") return;
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');
});
	
//popUp
$('.list li img').click(function () {
	//test();
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');

	
});

$('.popUp button').click(function () {
	html5QrCode.stop();
	$('.popUp').removeClass('active');
	//$('.popUp_qrcode').addClass('active');
});


function scan(decodedText){
		
	  //  var decodedText = "http://127.0.0.1/carnival/convert/12fbd294-cea7-7918-732c-331fef15e4b4"
		var url =decodedText+"/"+phone;
		
	
		$.ajax({
		    url: url,
		    method: 'post',
		    data: {},
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    success: function(result){
				var arr  = decodedText.split("/")
				var code = arr[arr.length-1];
				
				var  index = code.charAt(0);
				
				if (result.code ==1) {
					if (index == 9 ) {
						$("#no" + 9).attr('class', result.status);
					} else {
						$("#no" + index).attr('class', 'disabled');
					    $("#no" + 9).attr('class', result.status);
					}
				} 
				alert(result.message)
		    },
		    error: function (jqXHR, exception) {
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = '[404] 掃描伺服器網址錯誤!';
		        } else if (jqXHR.status == 500) {
		            msg = '[500] 伺服器錯誤!';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
		    }
		});
	}
	//scan("test");