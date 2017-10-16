<?php
// Text
$_['text_title']				= 'Factura Klarna - Pago en 14 d�as';
$_['text_terms_fee']			= '<span id="klarna_invoice_toc"></span> (+%s)<script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', country: \'%s\', charge: %s});</script>';
$_['text_terms_no_fee']			= '<span id="klarna_invoice_toc"></span><script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', country: \'%s\'});</script>';
$_['text_additional']			= 'Cuenta Klarna requiere alguna informaci�n adicional antes de poder procesar su pedido.';
$_['text_male']					= 'Maculino';
$_['text_female']				= 'Femenino';
$_['text_year']					= 'A�o';
$_['text_month']				= 'Mes';
$_['text_day']					= 'D�a';
$_['text_comment']				= 'Klarna\'s Invoice ID: %s. ' . "\n" . '%s/%s: %.4f';

// Entry
$_['entry_gender']				= 'G�mero';
$_['entry_pno']					= 'N�mero Personal';
$_['entry_dob']					= 'Fecha de nacimiento';
$_['entry_phone_no']			= 'Tel�fono';
$_['entry_street']				= 'Direcci�n';
$_['entry_house_no']			= 'No.';
$_['entry_house_ext']			= 'Ext.';
$_['entry_company']				= 'Compa��a N�mero de Registro';

// Help
$_['help_pno']					= 'Introduzca su n�mero de Seguro Social aqu�.';
$_['help_phone_no']				= 'Introduzca su n�mero de tel�fono.';
$_['help_street']				= 'Tenga en cuenta que la entrega s�lo puede tener lugar a la direcci�n registrada al pagar con Klarna.';
$_['help_house_no']				= 'Por favor introduzca su n�mero.';
$_['help_house_ext']			= 'Por favor introduzca su extensi�n aqu�. E.g. A, B, C, Red, Blue ect.';
$_['help_company']				= 'Por favor introduzca su empresa\'s n�mero de registro';

// Error
$_['error_deu_terms']			= 'Usted debe aceptar Klarna\'s pol�tica de privacidad (Datenschutz)';
$_['error_address_match']		= 'Direcciones de facturaci�n y env�o deben coincidir si desea utilizar Pagos Klarna';
$_['error_network']				= 'Se produjo un error al conectar con Klarna. Por favor, int�ntelo de nuevo m�s tarde.';