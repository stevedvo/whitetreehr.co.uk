var $ = jQuery.noConflict();

$(document).ready(function($)
{
	menuInteraction();
});

$(window).on('resize', function()
{

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