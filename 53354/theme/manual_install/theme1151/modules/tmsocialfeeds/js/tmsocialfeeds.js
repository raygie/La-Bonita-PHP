$(document).ready(function() {
	$('.tmsocials_button').on('click', function() {
		if($(this).hasClass('active'))
		{
			$(this).parent().next().slideUp(),
			$(this).removeClass('active');
		}
		else
		{
			$(this).parent().next().slideDown();
			$(this).addClass('active');
		}
		return false;
	});
});