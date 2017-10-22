$(function(){
	$('.owl-carousel').owlCarousel({
		responsive: {
			0: {
				items: 1
			},
			769: {
				items: 5
			}
		}
	});

	$('#twzipcode').twzipcode({
		// detect: true
	});

	$("#order-form").validate();

})