(function($) {
	$(document).ready(function(){
		var select_zaposlenik = $('.s2z');
		if(select_zaposlenik)
		{
			select_zaposlenik.select2({
				width: '100%',
      			placeholder: 'Kliknite ovdje za odabir zaposlenika'
			});
		}
	});
})(jQuery);