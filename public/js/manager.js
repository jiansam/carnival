//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});

var type = null;
var no = 0;
	
$('#gift-button').click(function () {
	type =  $(this).attr("type");
	no =  $(this).attr("no"); 
	scan(); 
});
	
//popUp
$('.list li img').click(function () {
	type =  $(this).attr("type");
	no =  $(this).attr("no"); 
	scan();
});

function scan(){
	var phone =  $("#phone").val();

	if (!phone) {
		alert("請輸入手機!");
		$("#phone").focus();
		return;
	}

	const taiwanMobileRegex = /^09[0-9]\d{7}$/;
	
	if (!taiwanMobileRegex.test(phone)) {
		 alert("手機號碼格式錯誤！");
		 $("#phone").focus();
	     return;
	}	
	
 
  	var url ="/carnival/manager/"+type+"/"+phone;
	
	console.log("conn url:" + url);

	$.ajax({
	    url: url,
	    method: 'get',
	    data: {},
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    success: function(result){
			if (result.code ==1) {
				var str ="";
				
				if (no==9) {
					str = `用戶 ${phone} 大禮物更新為已領取，請使用者重新刷新頁面。`;
				} else {
					str = `用戶 ${phone} 關卡${no}更新為已過關，請使用者重新刷新頁面。`;
				}
				
				alert(str);
			} else {
				alert(result.message)
			}
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