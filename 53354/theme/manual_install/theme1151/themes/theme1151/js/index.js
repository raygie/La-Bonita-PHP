$(document).ready(function(){
	$('#home-page-tabs li:first, #index .tab-content ul:first').addClass('active');
	$('#home-page-tabs li').on('click', function(){
		thisClass = $(this).attr('class');
		listTabsAnimate('.tab-content ul.'+thisClass+' li');
	})
});