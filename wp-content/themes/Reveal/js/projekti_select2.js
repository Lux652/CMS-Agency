(function($) {
	$(document).ready(function(){
		var select_projekt = $('.s2p');
		if(select_projekt)
		{
			select_projekt.select2({
				width: '100%',
      			placeholder: 'Kliknite ovdje za odabir projekata'
			});
		}
	});
})(jQuery);