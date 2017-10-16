<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
				<input type="hidden" name="Ds_Merchant_Amount" value="<?php echo $Amount; ?>" />
				<input type="hidden" name="Ds_Merchant_Currency" value="<?php echo $Moneda; ?>" />
				<input type="hidden" name="Ds_Merchant_Order" value="<?php echo $Id; ?>" />
				<input type="hidden" name="Ds_Merchant_MerchantCode" value="<?php echo $Fuc; ?>" />
				<input type="hidden" name="Ds_Merchant_Terminal" value="<?php echo $Terminal; ?>" />
				<input type="hidden" name="Ds_Merchant_TransactionType" value="<?php echo $Trans; ?>" />
				<input type="hidden" name="Ds_Merchant_Titular" value="<?php echo $Titular; ?>" />
				<input type="hidden" name="Ds_Merchant_MerchantName" value="<?php echo $Nombre; ?>" />
				<input type="hidden" name="Ds_Merchant_MerchantData" value="<?php echo sha1($Notify_url); ?>" />
				<input type="hidden" name="Ds_Merchant_MerchantURL" value="<?php echo $Notify_url; ?>" />
				<input type="hidden" name="Ds_Merchant_ProductDescription" value="<?php echo $Productos; ?>" />
				<input type="hidden" name="Ds_Merchant_UrlOK" value="<?php echo $Notify_url; ?>" />
				<input type="hidden" name="Ds_Merchant_UrlKO" value="<?php echo $Notify_url; ?>" />
				<input type="hidden" name="Ds_Merchant_MerchantSignature" value="<?php echo $Firmafinal; ?>" /> 
				<input type="hidden" name="Ds_Merchant_ConsumerLanguage" value="<?php echo $Idiomas; ?>" />
				<input type="hidden" name="Ds_Merchant_PayMethods" value="<?php echo $Tipopago; ?>" />


	<div class="buttons">
  <div class="pull-right">
    <input type="submit" value="<?php echo $button_confirm; ?>" id="button-confirm" class="btn btn-primary" />
  </div>
</div>
</form>