var NINO = {
	init : function(){
		UTIL.slider();
		this.setupUi();
	},

	setupUi : function(){

		// console.log(SITE_URL);
		var map = L.map('map',{attributionControl: false}).setView([10.505, 12.00], 3);

		L.tileLayer( BASE_URL + 'content/map/{z}/{x}-{y}.jpg', {
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
			maxZoom: 5
		}).addTo(map);

		var marker = L.marker([4.505, 17.00]).addTo(map);

		$("#search_field").autocomplete({
			source: SITE_URL + '/app/search',
			minLength: 2,//search after two characters
			select: function(event,ui){
				console.log(ui);
			}
		});

		$('.grid_item').on('click', function(){

			var $single_item = $('#single_item');

			// console.log($(this).find(' h3'));

			$single_item.find('.item_name').text($(this).find('h3').text());
			$single_item.find('.item img').attr('src', $(this).find('.sphere img').attr('src'));

			$('#single_item, #overlay').fadeIn('fast');
		});


		$(document).keyup(function(e) {
			if (e.keyCode == 27) { $('#overlay').click(); }   // esc
		});

		$('#overlay').on('click', function(){
			$('#single_item').fadeOut();
			$(this).fadeOut();
		});
	}
};



var UTIL = {
	slider : function(){

		setInterval(function() {
			$('#random_item_sec').find('.active').fadeOut('slow', function(){
				$(this).removeClass('active');
				var $next = $(this).next();

				if(!$next.hasClass('item'))
					$next = $(this).siblings().first();

				$next.fadeIn('slow', function(){
					$(this).addClass('active');
				});
			});
		}, 4000);


	}
};

$(document).ready(function(){NINO.init();});



