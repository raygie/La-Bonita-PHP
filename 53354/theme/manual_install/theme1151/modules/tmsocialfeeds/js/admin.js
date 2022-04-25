$(document).ready(function() {
	$('.socials-items .hook-title button').on('click',function(){
		if($(this).parent().next('.soc-settings-block').is(':hidden'))
		{
			tempName = $(this).html();
			$(this).text(closeText).addClass('btn-warning');
			$(this).parent().next('.soc-settings-block').slideDown();
		}
		else
		{
			$(this).text(tempName).removeClass('btn-warning');
			$(this).parent().next('.soc-settings-block').slideUp();
		}
	});
});