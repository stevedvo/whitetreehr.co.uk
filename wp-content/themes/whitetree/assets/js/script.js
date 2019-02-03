var $ = jQuery.noConflict();

$(document).ready(function($)
{
	menuInteraction();
	equaliseContainerHeights($("body.home article.service"));
	addRequiredAsterisks($("form.wpcf7-form"));
});

$(window).on('resize', function()
{
	equaliseContainerHeights($("body.home article.service"));
});

$(window).on('scroll', function()
{

});

function menuInteraction()
{
	$(document).on("click", "#navButton", function()
	{
		$("body").toggleClass("menu-open");
	});
}

function equaliseContainerHeights($selector)
{
	if ($selector.length > 0)
	{
		tempArray = [];

		for (j = 0; j < $selector.length; j++)
		{
			$selector.eq(j).css('height','auto');
			tempArray[j] = $selector.eq(j).height();
		}

		maxHeight = Math.max.apply(null, tempArray);

		if ($(window).width() > 558)
		{
			for (j = 0; j < $selector.length; j++)
			{
				$selector.eq(j).height(maxHeight);
			}
		}
	}
}

function addRequiredAsterisks($form)
{
	$form.find(".wpcf7-validates-as-required").each(function()
	{
		$(this).parent().append("<span class='required-asterisk'>*</span>");
	});
}
