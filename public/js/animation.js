//menu
$('#hamburger-button').click(function () {
    $('#hamburger-button').toggleClass('clicked');
    $('nav').toggleClass('clicked');
    $('html,body').toggleClass('hidden');
});


//popUp
$('.list li img').click(function () {
	
	
    $('.popUp').addClass('active');
});

$('.popUp button').click(function () {
    $('.popUp').removeClass('active');
		
	//$('.popUp_qrcode').addClass('active');
});
