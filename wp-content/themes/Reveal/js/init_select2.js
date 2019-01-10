(function($) {
	$(document).ready(function(){
		var select_zaposlenici = $('.s2');
		if(select_zaposlenici)
		{
			select_zaposlenici.select2({
				width: '100%',
      			placeholder: 'Kliknite ovdje za odabir zaposlenika'
			});
		}
	});
})(jQuery);