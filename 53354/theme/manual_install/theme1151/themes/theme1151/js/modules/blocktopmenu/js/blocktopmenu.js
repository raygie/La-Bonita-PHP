var responsiveflagMenu = false;
var categoryMenu = $('ul.sf-menu');
var mCategoryGrover = $('.sf-contener .cat-title');

$(document).ready(function(){
	categoryMenu = $('ul.sf-menu');
	mCategoryGrover = $('.sf-contener .cat-title');
	responsiveMenu();
	$(window).resize(responsiveMenu);
});

// check resolution
function responsiveMenu()
{
   if ($(document).width() <= 767 && responsiveflagMenu == false)
	{
		menuChange('enable');
		responsiveflagMenu = true;
	}
	else if ($(document).width() >= 768)
	{
		menuChange('disable');
		responsiveflagMenu = false;
	}
}

// init Super Fish Menu for 767px+ resolution
function desktopInit()
{
	mCategoryGrover.off();
	mCategoryGrover.removeClass('active');
	$('.sf-menu > li > ul').removeClass('menu-mobile').parent().find('.menu-mobile-grover').remove();
	$('.sf-menu').removeAttr('style');
	categoryMenu.superfish('init');
	//add class for width define
	$('.sf-menu > li > ul').addClass('submenu-container clearfix'); 
	 // loop through each sublist under each top list item
    $('.sf-menu > li > ul').each(function(){
        i = 0;
        //add classes for clearing
        $(this).each(function(){ 
            if ($(this).attr('class') != "category-thumbnail"){
                i++;
                if(i % 2 == 1)
                    $(this).addClass('first-in-line-xs');
                else if (i % 5 == 1)
                    $(this).addClass('first-in-line-lg');
            }
        });
    });
}

function mobileInit()
{
	var clickEventType=((document.ontouchstart!==null)?'click':'touchstart');
	categoryMenu.superfish('destroy');
	$('.sf-menu').removeAttr('style');

	mCategoryGrover.on(clickEventType, function(e){
		$(this).toggleClass('active').parent().find('ul.menu-content').stop().slideToggle('medium');
		return false;
	});

	$('.sf-menu > li > ul').addClass('menu-mobile clearfix').parent().prepend('<span class="menu-mobile-grover"></span>');

	$(".sf-menu .menu-mobile-grover").on(clickEventType, function(e){
		var catSubUl = $(this).next().next('.menu-mobile');
		if (catSubUl.is(':hidden'))
		{
			catSubUl.slideDown();
			$(this).addClass('active');
		}
		else
		{
			catSubUl.slideUp();
			$(this).removeClass('active');
		}
		return false;
	});

	$('#block_top_menu > ul:first > li > a').on(clickEventType, function(e){
		var parentOffset = $(this).prev().offset(); 
	   	var relX = parentOffset.left - e.pageX;
		if ($(this).parent('li').find('ul').length && relX >= 0 && relX <= 20)
		{
			e.preventDefault();
			var mobCatSubUl = $(this).next('.menu-mobile');
			var mobMenuGrover = $(this).prev();
			if (mobCatSubUl.is(':hidden'))
			{
				mobCatSubUl.slideDown();
				mobMenuGrover.addClass('active');
			}
			else
			{
				mobCatSubUl.slideUp();
				mobMenuGrover.removeClass('active');
			}
		}
	});
}

// change the menu display at different resolutions
function menuChange(status)
{
	status == 'enable' ? mobileInit(): desktopInit();
}

/* Stik Up menu script */
(function($){
	$.fn.tmStickUp=function(options){ 
		
		var getOptions = {
			correctionSelector: $('.correctionSelector')
		}
		$.extend(getOptions, options); 

		var
			_this = $(this)
		,	_window = $(window)
		,	_document = $(document)
		,	thisOffsetTop = 0
		,	thisOuterHeight = 0
		,	thisMarginTop = 0
		,	thisPaddingTop = 0
		,	documentScroll = 0
		,	pseudoBlock
		,	lastScrollValue = 0
		,	scrollDir = ''
		,	tmpScrolled
		;

		init();
		function init(){
			thisOffsetTop = parseInt(_this.offset().top);
			thisMarginTop = parseInt(_this.css("margin-top"));
			thisOuterHeight = parseInt(_this.outerHeight(true));

			$('<div class="pseudoStickyBlock"></div>').insertAfter(_this);
			pseudoBlock = $('.pseudoStickyBlock');
			pseudoBlock.css({"position":"relative", "display":"block"});
			addEventsFunction();
		}//end init

		function addEventsFunction(){
			_document.on('scroll', function() {
				tmpScrolled = $(this).scrollTop();
					if (tmpScrolled > lastScrollValue){
						scrollDir = 'down';
					} else {
						scrollDir = 'up';
					}
				lastScrollValue = tmpScrolled;

				correctionValue = getOptions.correctionSelector.outerHeight(true);
				documentScroll = parseInt(_window.scrollTop());

				if(thisOffsetTop - correctionValue < documentScroll){
					_this.addClass('isStuck');
					_this.css({position:"fixed", top:correctionValue});
					pseudoBlock.css({"height":thisOuterHeight});
				}else{
					_this.removeClass('isStuck');
					_this.css({position:"relative", top:0});
					pseudoBlock.css({"height":0});
				}
			}).trigger('scroll');
		}
	}//end tmStickUp function
})(jQuery)

$(document).ready(function(){
	var stickMenu = true;
	var docWidth= $('body').find('.container').width();
	if(stickMenu && docWidth > 780) {
		$('body').find('#block_top_menu').wrapInner('<div class="stickUpTop"><div class="stickUpHolder container">');
		$('.stickUpTop').tmStickUp();
	}
	
	if(isiPad){categoryReload();} // hak for ipad
})