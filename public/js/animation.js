//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});

var html5QrCode = null;
var no = null;
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
	
	scan(no , decodedText);
	
	/*
	var url =decodedText+"/phone";
	console.log("scan url"+= url);
	
	$.post(url ,[],function(result) {
		
		
	});*/
};
	
$('#gift-button').click(function () {
	var status = $(this).attr("class");
	if (status == "" || status=="disabled") return;
	
	no =9;
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');
});
	
//popUp
$('.list li img').click(function () {
	//test();
	
	no =  $(this).attr("no");
	
	const config = { fps: 10, qrbox: { width: 500, height: 400 } };

	html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	
    $('.popUp').addClass('active');

	
});

$('.popUp button').click(function () {
	no="";
	html5QrCode.stop();
	$('.popUp').removeClass('active');
	//$('.popUp_qrcode').addClass('active');
});



function scan(no , decodedText){
		
	  //  var decodedText = "http://127.0.0.1/carnival/convert/12fbd294-cea7-7918-732c-331fef15e4b4"
		try {
			var arr  = decodedText.split("/")
			var code = arr[arr.length-1];
			var index = code.charAt(0);
			
			if (index != no) {
				alert("掃碼關卡與網址不符!");
				return;
			}
		} catch (e) {
			
			alert("掃碼網址錯誤 "+decodedText);
			return;
		}
	  	
	  	var url =decodedText+"/"+phone;
		
		
		
		console.log("conn url:" + url);
	
		$.ajax({
		    url: url,
		    method: 'get',
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
						$("#gift-button").attr('class', result.status);
					} else {
						$("#no" + index).attr('class', 'disabled');
					    $("#gift-button").attr('class', result.status);
					}
				} 
				alert(result.message)
		    },
		    error: function (jqXHR, exception) {
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network ' + url;
		        } else if (jqXHR.status == 404) {
		            msg = '[404] 掃描伺服器網址錯誤 ' + url;
		        } else if (jqXHR.status == 500) {
		            msg = '[500] 伺服器錯誤 '+ jqXHR.responseText;
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
	//scan(1, "http://www.393988.xyz/carnival/convert/12fbd294-cea7-7918-732c-331fef15e4b4");