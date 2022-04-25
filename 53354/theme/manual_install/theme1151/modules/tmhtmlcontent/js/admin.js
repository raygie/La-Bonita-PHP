
jQuery(document).ready(function() {

	//show new item panel
	$('.button-new-item').on('click', function() {
		$('.new-item').find('.item-container').slideToggle();
	});
	// cancel new item
	$('.button-new-item-cancel').on('click',function() {
		$('.new-item').find('.item-container').slideToggle();
	});
	//show item content edit panel
	$('.button-edit').on('click', function(e) {
		e.preventDefault();
		var $item_container = $(this).closest('.item');
		$item_container.find('.item-container').slideToggle();
		$(this).find('.button-edit-edit').toggleClass('hide');
		$(this).find('.button-edit-close').toggleClass('hide');
	});
	//cancel item edit
	$('.button-item-edit-cancel').on('click',function(){
		$(this).closest('form').find('.button-edit .button-edit-edit').toggleClass('hide');
		$(this).closest('form').find('.button-edit .button-edit-close').toggleClass('hide');
		$(this).closest('form').find('.item-container').slideToggle();
	});

	// set language for new item
	$('.new-lang-flag').on('click', function() {
		var lang_id = (this.id).substr(5);
		$('.new-lang-flag').each(function () {
			$(this).removeClass('active');
		});
		$(this).addClass('active');
		$("#lang-id").val(lang_id)
	});
});

$(function() {
	 $(".list-unstyled" ).sortable().bind('sortupdate', function() {
		var test = $(this).sortable('toArray');
		var h4_title = $(this).prev('h4').html();
		$.ajax({
			type: 'POST',
			url: theme_url + '&configure=tmhtmlcontent&ajax',
			headers: { "cache-control": "no-cache" },
			dataType: 'json',
			data: {
				action: 'updateposition',
				item: test,
				title: h4_title,
			},
			success: function(msg)
			{
				if (msg.error)
				{
					showErrorMessage(msg.error);
					return;
				}
				showSuccessMessage(msg.success);
			}
		});
	 });
 });