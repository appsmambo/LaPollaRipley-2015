<?php

class HomeController extends BaseController {

	private $_fechaFin = null;
	private $_fechaHoy = null;
	
	public function __construct()
	{
		$this->_fechaFin = strtotime('2015-06-15 00:00:00');
		$this->_fechaHoy = time();
	}
	
	public function getIndex()
	{
		if ($this->_fechaHoy > $this->_fechaFin)
			return View::make('final');
		else
			return View::make('index');
	}
	
	public function postRegistro()
	{
		if ($this->_fechaHoy > $this->_fechaFin)
			return Redirect::route('index');
		$messages = array(
			'required'		=> 'Es obligatorio.',
			'email'			=> 'Ingrese su cuenta de email.',
			'string'		=> 'Solo se permite letras.',
			'digits'		=> 'Solo se permite números.',
			'dni.unique'	=> 'El dni ingresado ya está registrado en nuestro sistema.',
			'email.unique'	=> 'El email ingresado ya está registrado en nuestro sistema.'
		);
		$rules = array(
			'tipo_compra'	=> 'required',
			'nro_ticket'	=> 'required',
			'nro_tarjeta'	=> 'required',
			'nombres'		=> 'required|string',
			'apellidos'		=> 'required|string',
			'direccion'		=> 'required',
			'telefono'		=> 'required',
			'dni'			=> 'required|digits_between:1,99999999999|unique:participante',
			'email'			=> 'required|email|unique:participante',
			'campeon'		=> 'required',
			'subcampeon'	=> 'required',
			'tercero'		=> 'required',
			'cuarto'		=> 'required',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			$respuesta = array('success' => 'error', 'messages' => $messages);
			return Response::json($respuesta, 200);
		} else {
			$participante = new Participante();
			$participante->tipo_compra	= Input::get('tipo_compra');
			$participante->nro_ticket	= Input::get('nro_ticket');
			$participante->nro_tarjeta	= Input::get('nro_tarjeta');
			$participante->nombres		= ucwords(strtolower(trim(Input::get('nombres'))));
			$participante->apellidos	= ucwords(strtolower(trim(Input::get('apellidos'))));
			$participante->direccion	= trim(Input::get('direccion'));
			$participante->telefono		= Input::get('telefono');
			$participante->dni			= Input::get('dni');
			$participante->email		= strtolower(Input::get('email'));
			$participante->campeon		= Input::get('campeon');
			$participante->subcampeon	= Input::get('subcampeon');
			$participante->tercero		= Input::get('tercero');
			$participante->cuarto		= Input::get('cuarto');
			$participante->ip			= Request::getClientIp(true);
			$participante->save();

			$urlBase = route('index');
			$mensaje = '<html><body>'
					. '<div style="width:750px;margin:0 auto;background-color:#fff;text-align:center">'
					. '<img src="'.$urlBase.'/img/mailing/encabezado.jpg" alt="" border="0" width="750" height="456" style="display:block;">'
					. '<div style="width:571px;margin:0 auto;background-color:#f3cf30">'
					. '<table rules="all" cellpadding="0" cellspacing="0" border="0" style="width:571px;background-color:#f3cf30" width="571" bgcolor="#f3cf30" align="center">'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; TIPO DE COMPRA: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->tipo_compra.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; N&deg; DE TICKET DE VENTA: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->nro_ticket.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; N&deg; DE TARJETA RIPLEY: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->nro_tarjeta.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; NOMBRES: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->nombres.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; APELLIDOS: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->apellidos.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; DIRECCI&oacute;N: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->direccion.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; TELEFONO: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->telefono.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; N&deg; DE DNI: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->dni.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="40%">&bull; CORREO ELECTRONICO: </td>'
					. '<td width="45%" style="background-color:#fff;border:2px solid #000;">'.$participante->email.'</td>'
					. '<td style="border:inset 0pt" width="10%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td colspan="4">'
					. '<p style="text-align:center">'
					. '&nbsp;<br>&nbsp;'
					. '<img src="'.$urlBase.'/img/mailing/pronostico.jpg" alt="" width="222" height="105"><br>'
					. '<img src="'.$urlBase.'/img/mailing/paises/'.$participante->campeon.'.jpg" alt="" width="211" height="30"><br>'
					. '<img src="'.$urlBase.'/img/mailing/campeon.jpg" alt="" width="64" height="15">'
					. '&nbsp;<br>&nbsp;'
					. '</p>'
					. '</td>'
					. '</tr>'
					. '</table>'
					. '<table rules="all" cellpadding="0" cellspacing="0" border="0" style="width:571px;background-color:#f3cf30" width="571" bgcolor="#f3cf30" align="center">'
					. '<tr>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '<td style="border:inset 0pt" width="30%" align="center"><img width="180" height="26" src="'.$urlBase.'/img/mailing/paises/'.$participante->subcampeon.'.jpg" alt=""><br><img src="'.$urlBase.'/img/mailing/subcampeon.jpg" alt=""></td>'
					. '<td style="border:inset 0pt" width="30%" align="center"><img width="180" height="26" src="'.$urlBase.'/img/mailing/paises/'.$participante->tercero.'.jpg" alt=""><br><img src="'.$urlBase.'/img/mailing/tercero.jpg" alt=""></td>'
					. '<td style="border:inset 0pt" width="30%" align="center"><img width="180" height="26" src="'.$urlBase.'/img/mailing/paises/'.$participante->cuarto.'.jpg" alt=""><br><img src="'.$urlBase.'/img/mailing/cuarto.jpg" alt=""></td>'
					. '<td style="border:inset 0pt" width="5%"> </td>'
					. '</tr>'
					. '<tr>'
					. '<td colspan="5">'
					. '&nbsp;<br><br>&nbsp;'
					. '</td>'
					. '</tr>'
					. '</table>'
					. '</div>'
					. '<img src="'.$urlBase.'/img/mailing/pie.jpg" alt="" width="750" height="132">'
					. '<p>
						Autorizo y otorgo a Tiendas por Departamento Ripley S.A. (en adelante "Tiendas Ripley"), hasta la culminaci&oacute;n de la presente campa&ntilde;a, mi total conformidad y consentimiento libre, previo, expreso, inequ&iacute;voco e informado para que recopile, de tratamiento, transfiera, importe y/o exporte mis datos personales, para elaborar Bancos de Datos, transferirlos a terceras personas vinculadas o no a Ripley (sean socios comerciales o no, nacionales o extranjeros, p&uacute;blicos o privados) con la estricta finalidad de poder llevar a cabo la realizaci&oacute;n de la campa&ntilde;a comercial denominada "La Polla Ripley", as&iacute; como para ser contactado para que se me informe y comunique informaci&oacute;n relacionada a dicha campa&ntilde;a, ya sea por intermedio de sistemas de llamado telef&oacute;nico, de env&iacute;o de mensajes de texto a celular, mensajes electr&oacute;nicos masivos o similares. En ese sentido, manifiesto mi conformidad y consentimiento en que mi informaci&oacute;n sea facilitada a terceros para la ejecuci&oacute;n de las referidas comunicaciones. As&iacute;, autorizo a Tiendas Ripley a recopilar y dar tratamiento (por s&iacute; mismo o a trav&eacute;s de terceros) a mis datos personales que incluyen mi nombre, apellidos, documento de identidad, n&uacute;mero de Tarjeta de Cr&eacute;dito Ripley, domicilios, correos electr&oacute;nicos y tel&eacute;fonos, para efectos de participar en la campa&ntilde;a antes indicada. Asimismo, declaro expresamente que he sido informado(a): i) que podr&eacute; revocar en cualquier momento mi consentimiento, sin necesidad de indicar ning&uacute;n motivo para ello, comunicando mi decisi&oacute;n por escrito en cualquiera de las tiendas de Tiendas Ripley, ii) que podr&eacute; ejercer mis derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n de mis datos de acuerdo a la legislaci&oacute;n vigente, iii) sobre la existencia del banco de datos en el que se almacenar&aacute;n mis datos, manifestando mi plena conformidad a ello. Asimismo, declaro que en caso decida revocar mi consentimiento de forma previa a la culminaci&oacute;n de la presente campa&ntilde;a, no podr&eacute; continuar participando de la misma toda vez que el organizador estar&aacute; impedido de continuar con el tratamiento de los datos proporcionados, siendo imposible la comunicaci&oacute;n informando la condici&oacute;n de ganador.
						<br><br>
						<strong>TCEA m&aacute;xima: 149.59%. Ejemplo explicativo:</strong> C&aacute;lculo referencial efectuado con la tasa m&aacute;xima seg&uacute;n tarifario y considerando un consumo total de 1000 soles, a 12 meses. Si mantuviera saldo de S/.10 o m&aacute;s en su tarjeta de cr&eacute;dito, se le cargar&aacute; S/. 5.90 mensual por concepto de seguro de desgravamen. En caso corresponda, aplicar&aacute; una comisi&oacute;n mensual por env&iacute;o f&iacute;sico de estado de cuenta de S/.6.90. En caso de incumplimiento en el pago, aplicar&aacute; penalidad por pago fuera de fecha seg&uacute;n tarifario vigente. ITF (0.005%). (*)Si usted opta realizar su compra en cuotas, el valor final de las mismas podr&iacute;a variar en funci&oacute;n a la fecha de desembolso, facturaci&oacute;n y pago del cliente. Mayor informaci&oacute;n de condiciones, restricciones y tarifas en <a href="http://www.bancoripley.com.pe" target="_blank">www.bancoripley.com.pe</a> y/o Agencias. <strong>Condiciones:</strong> Promoci&oacute;n valida del 23/05/15 al 14/06/15 y/o hasta agotar stock. Stock m&iacute;nimo de televisores: 3 unidades por marca participante. Exclusivo con Tarjeta Ripley. El cliente debe ingresar a <a href="http://www.lapollaripley.com.pe">www.lapollaripley.com.pe</a> colocar el n&uacute;mero de ticket de venta, n&uacute;mero de Tarjeta Ripley, sus nombres y apellidos, direcci&oacute;n, tel&eacute;fono, N&deg; de DNI y correo electr&oacute;nico indicando en orden, quien cree que ser&aacute;n los 4 primeros puestos de la Copa Am&eacute;rica. (1&deg; Puesto, 2&deg; Puesto, 3&deg; Puesto y 4&deg; Puesto). Plazo m&aacute;ximo de inscripci&oacute;n y anotar pron&oacute;sticos: 14/06/15. El tarjetahabiente no puede ceder su oportunidad de participar en la promoci&oacute;n a otra persona. <strong>Condiciones para obtener oportunidades de ganar:</strong> Si un tarjetahabiente compra 1 o m&aacute;s televisores, durante la duraci&oacute;n de la campa&ntilde;a, en diferentes tickets de compra, cada ticket es una oportunidad. Si compra 1 o m&aacute;s televisores en un solo ticket de compra, solo tendr&aacute; una oportunidad. <strong>Condiciones de devoluci&oacute;n:</strong> Si un tarjetahabiente compra modelos distintos de televisores de las marcas participantes se le devolver&aacute; el precio pagado en total del ticket ganador. Si compra m&aacute;s de 3 unidades de un mismo modelo, pulgada y valor, se le devolver&aacute; el monto por m&aacute;ximo 3 televisores, ya sea que la compra se haya efectuado en 1 o m&aacute;s tickets. La promoci&oacute;n es v&aacute;lida &uacute;nicamente por la compra de las marcas de televisores indicados en esta publicidad, en todas las Tiendas Ripley a nivel nacional y la Tienda Ripley Pucallpa de Tiendas por Departamento Ripley Oriente S.A.C., a excepci&oacute;n de Ripley Jir&oacute;n de la Uni&oacute;n que no forma parte de la campa&ntilde;a. La verificaci&oacute;n de las personas que acertaron la Polla Ripley se realizar&aacute; el 03/08/15, a las 16:00 horas, en Paseo de la Rep&uacute;blica 3118, Piso 13, San Isidro, en presencia de Notario y un representante de la ONAGI. De haber acertado, la devoluci&oacute;n se realizar&aacute; por medio de vales de consumo para que compre lo que desee en cualquiera de las Tiendas Ripley (Los vales de consumo ser&aacute;n entregados una semana despu&eacute;s de la fecha de verificaci&oacute;n en la direcci&oacute;n indicada l&iacute;neas arriba); o si el cliente lo solicita, la devoluci&oacute;n se podr&aacute; realizar, en el subsiguiente estado de cuenta de su Tarjeta Ripley, contado desde el 3/8/15. Si el cliente realiza la compra en cuotas, se le devolver&aacute; el valor de los televisores m&aacute;s los intereses pagados hasta el 3/8/15, quedando sin efecto las cuotas que pudieran quedar pendientes de pago (no se devolver&aacute;n comisiones ni gastos ni penalidades por pago fuera de fecha). El ganador o ganadores tienen que ser tarjetahabiente y ellos tienen que haber realizado la compra. Para mayor informaci&oacute;n ingrese a <a href="http://www.lapollaripley.com.pe">www.lapollaripley.com.pe</a> RD N&deg; 1788 - 2015 - ONAGI -DGAE - DA
						</p>'
					. '</div>'
					. '</body></html>';
			
			/*$para = $participante->email;
			$asunto = 'Gracias por participar en La Polla Ripley';
			$cabeceras = 'From: noreply@ripley.com.pe' . "\r\n";
			$cabeceras .= 'Reply-To: noreply@ripley.com.pe' . "\r\n";
			$cabeceras .= 'X-Mailer: PHP/' . phpversion();
			$cabeceras .= "MIME-Version: 1.0\r\n";
			$cabeceras .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($para, $asunto, $mensaje, $cabeceras);*/
			
			require public_path() . '/PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'lapollaripley.com.pe';
			$mail->SMTPAuth = true;
			$mail->Username = 'info@lapollaripley.com.pe';
			$mail->Password = '3bD>uH?;CG:c_kMm;#';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 25;
			
			$mail->From = 'info@lapollaripley.com.pe';
			$mail->FromName = 'La Polla Ripley';
			$mail->addReplyTo('info@lapollaripley.com.pe', 'La Polla Ripley');
			$mail->addAddress($participante->email, $participante->nombres);
			$mail->isHTML(true);

			$mail->Subject = 'Gracias por participar en La Polla Ripley';
			$mail->Body = $mensaje;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			$mail->send();

/*			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}*/
			
			
			$respuesta = array('success' => 'ok');
			return Response::json($respuesta, 200);

		}
	}

}
