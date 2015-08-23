$(document).ready(function(){
   	$('#menu li ul').hide();
	$('#menu li a.current').parent().find("ul").slideToggle('slow');
	$('#menu li a.parents').click(
		function () {
			$(this).parent().siblings().find('ul').slideUp('normal');
			$(this).next().slideToggle('normal');
			return false;
		}
	);
	$('#menu li a.nochild').click(
		function () {
			window.location.href=(this.href);
			return false;
		}
	);
	$('#menu li .parents').hover(
		function () {
			$(this).stop();
			$(this).animate({ paddingRight: '20px' }, 200);
		}, 
		function () {
			$(this).stop();
			$(this).animate({ paddingRight: '10px' });
		}
	);
	
	$('.close').click(
		function () {
			$(this).parent().fadeTo(400, 0, function () {
				$(this).slideUp(200);
			});
			return false;
		}
	);
	$('tbody tr:even').addClass('alt-row');
});