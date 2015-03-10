$(document).ready(function ()
{
	$("#form_submit").click(function()
	{
		$("#target_form").submit();
	});

	$("#category_submit").click(function()
	{
		$("#category_form").submit();
	});

	$(".new_category").click(function()
	{
		var id = event.target.id;
		var pieces = id.split("-");
		$("#category_form").prop('action', '/forum/category/' + pieces[2] + '/new');
	});

	$(".delete_group").click(function(event)
	{
		$("#btn_delete_group").prop('href', '/forum/group/' + event.target.id + '/delete');
	});

	$(".delete_category").click(function(event)
	{
		$("#btn_delete_category").prop('href', '/forum/category/' + event.target.id + '/delete');
	});
});



$('#toggle-login').click(function(){
    $('#login').toggle();
});


$('.bxslider').bxSlider({
    minSlides: 4,
    maxSlides: 4,
    slideWidth: 170,
    slideMargin: 10,
    ticker: true,
    speed: 6000
});




/* pokretna slova */

function findBrowserTransform() {
    if (!window.getComputedStyle)
        return false;

    var el = document.createElement('p'),
        has3d,
        transforms = {
            'webkitTransform':'-webkit-transform',
            'OTransform':'-o-transform',
            'msTransform':'-ms-transform',
            'MozTransform':'-moz-transform',
            'transform':'transform'
        };

    // Add it to the body to get the computed style.
    document.body.insertBefore(el, null);

    for (var t in transforms) {
        if (el.style[t] !== undefined) {
            el.style[t] = "translate3d(1px,1px,1px)";
            has3d = window.getComputedStyle(el).getPropertyValue(transforms[t]);
            return t;
        }
    }

    document.body.removeChild(el);
    return "transition";
}

var sentence = document.querySelector(".sentence");
var browserTransform = findBrowserTransform();

document.addEventListener("mousemove", function(e) {
    xpos = e.offsetX == undefined ? e.layerX : e.offsetX;
    ypos = e.offsetY == undefined ? e.layerY : e.offsetY;

    var ax = -(window.innerWidth / 2 - xpos) / 20;
    var ay = (window.innerHeight / 2 - ypos) / 10;

    sentence.style[browserTransform] = "rotateY("+ax+"deg) rotateX("+ay+"deg)";
});


