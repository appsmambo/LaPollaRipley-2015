var pagina = 0;
var pronostico = {
	campeon:'',
	subcampeon:'',
	tercero:'',
	cuarto:''
};
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
			if (data.success === 'ok')
				pagina = 3;  // va al mensaje de gracias
			else {
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
	$('.terminos a').click(function() {
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
		pagina = 1;  // va a formulario
		$.fn.fullpage.moveSlideRight();
		return false;
	});
	$('.siguiente').click(function() {
		if ($('#registro').isValid() === true) {
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
