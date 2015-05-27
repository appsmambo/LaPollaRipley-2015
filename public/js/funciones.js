var pagina = 0;
var pronostico = {
	campeon:'',
	subcampeon:'',
	tercero:'',
	cuarto:''
};
var codigo_FB = '<!-- Facebook Conversion Code for Registros Polla 2015 --><script>(function(){var _fbq=window._fbq || (window._fbq=[]);if (!_fbq.loaded) {var fbds = document.createElement("script");fbds.async = true;fbds.src = "//connect.facebook.net/en_US/fbds.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(fbds, s);_fbq.loaded = true;}})();window._fbq = window._fbq || [];window._fbq.push(["track", "6025407327956", {"value":"0.00","currency":"USD"}]);</script><noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6025407327956&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>';
function validarPronostico() {
	var paises = [
		pronostico.campeon,
		pronostico.subcampeon,
		pronostico.tercero,
		pronostico.cuarto
	];
	for (var pais in paises)
		if (paises[pais] === '' || paises[pais] === null) return false;
	$.unique(paises);
	return (paises.length === 4);
}
function colocarPronostico() {
	$('#pronostico-campeon').val(pronostico.campeon);
	$('#pronostico-subcampeon').val(pronostico.subcampeon);
	$('#pronostico-tercero').val(pronostico.tercero);
	$('#pronostico-cuarto').val(pronostico.cuarto);
}
function registrarDatos() {
	$('body').css({'cursor':'wait'});
	$.ajax({
		type:"POST",
		url:urlBase + '/registro',
		data:$('#registro').serialize(),
		success:function(data) {
			if (data.success === 'ok') {
				$('body').append(codigo_FB);
				ga('send', 'event', 'registro-ok');
				totaltag('http://www.lapollaripley.com.pe/thankyou/');
				pagina = 3;  // va al mensaje de gracias
			} else {
				ga('send', 'event', 'registro-error');
				pagina = 1; // va al formulario y muestra mensaje
				$('.registrar').prop('disabled', false);
				var mensaje = '';
				jQuery.each(data.messages, function(i, val) {
					mensaje += i + ': ' + val + '<br>';
				});
				bootbox.alert({
					message: mensaje,
					title: "La Polla Ripley"
				});
			}
			$('body').css({'cursor':'default'});
			$.fn.fullpage.moveTo(2, pagina);
		},
		dataType:'json'
	});
}
$(document).ready(function() {
	$('#fullpage').fullpage({
		slidesNavigation:false,
		keyboardScrolling:false,
		animateAnchor:false,
		recordHistory:false,
		controlArrows:false,
		fixedElements:'.header, .footer',
		loopHorizontal:false,
		touchSensitivity:1800,
		scrollOverflow:true,
		css3:true
	});
	$('.checkbox-custom').customInput();
	$('.item').draggable({
		revert:true,
		cursor:'pointer'
	});
	$('.pais').droppable({
		accept:'.item',
		drop: function( event, ui ) {
			var html = ui.draggable.html();
			var id = $(this).attr('id');
			pronostico[id] = ui.draggable.data('pais');
			$(this).find("p").html(html);
		}
	});
	$('#responsive-campeon').change(function() {
		var pais = $(this).val();
		if (pais === '0') return false;
		pronostico.campeon = pais;
	});
	$('#responsive-subcampeon').change(function() {
		var pais = $(this).val();
		if (pais === '0') return false;
		pronostico.subcampeon = pais;
	});
	$('#responsive-tercero').change(function() {
		var pais = $(this).val();
		if (pais === '0') return false;
		pronostico.tercero = pais;
	});
	$('#responsive-cuarto').change(function() {
		var pais = $(this).val();
		if (pais === '0') return false;
		pronostico.cuarto = pais;
	});
	$('.terminos a').click(function() {
		ga('send', 'event', 'terminos-y-condiciones');
		fleXenv.updateScrollBars();
		$.fn.fullpage.moveTo(1, 0);
		return false;
	});
	$('.cerrar').click(function() {
		$.fn.fullpage.moveTo(2, pagina);
		return false;
	});
	fleXenv.initByClass("flexcroll");
	$('.participa').click(function() {
		$('#marcas').css('display', 'none');
		ga('send', 'event', 'participa');
		pagina = 1;  // va a formulario
		$.fn.fullpage.moveSlideRight();
		return false;
	});
	$('.siguiente').click(function() {
		if ($('#registro').isValid() === true) {
			ga('send', 'event', 'pronostico');
			pagina = 2; // va a pronostico
			$.fn.fullpage.moveSlideRight();
		}
		return false;
	});
	$('#tipo_compra').change(function() {
		var tipo = $(this).val(), imagen = '';
		if (tipo === 'ecommerce')
			imagen = 'orden-compra.png';
		else
			imagen = 'ticket.png';
		$('.ticket').attr('src', urlBase + '/img/' + imagen);
	});
	$('.registrar').click(function() {
		if ($('#registro').isValid() === false) {
			pagina = 1;
			$.fn.fullpage.moveTo(2, pagina);
		} else {
			if (validarPronostico() === true) {
				pagina = 3;
				$(this).prop('disabled', true);
				colocarPronostico();
				registrarDatos();
			} else {
				$('.tabla, .copa').addClass('bounce animated');
				setTimeout(function(){ $('.tabla, .copa').removeClass('bounce animated'); }, 2000);
			}
		}
		return false;
	});
	$.validate({
		form:'#registro',
		onError : function() {
			// error
		},
		onSuccess : function() {
		  alert('The form is valid!');
		  return false; // Will stop the submission of the form
		},
		onValidate : function() {
			return false;
		},
		onElementValidate : function(valid, $el, $form, errorMess) {
			console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
		}
	});
});
