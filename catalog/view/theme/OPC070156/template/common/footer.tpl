<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2jkfeUVpdlveQ7bTUSu2I7BcOt6LNjw3';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->





<footer class="container">
<div class="content_footercms_top"><?php echo $footertop; ?> </div> 
  <div id="footer">
     <div class="row">
      <?php if ($informations) { ?>
      <div class="col-sm-3 column">
        <h5><?php echo $text_information; ?></h5>
        <ul class="list-unstyled">
          <?php foreach ($informations as $information) { ?>
          <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <?php } ?>    
      <div class="col-sm-3 column">
        <h5><?php echo $text_extra; ?></h5>
        <ul class="list-unstyled">
          <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
          <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
          <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
          <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
        </ul>
      </div>
      <div class="col-sm-3 column">
        <h5><?php echo $text_account; ?></h5>
        <ul class="list-unstyled">
          <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
          <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
          <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
          <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
        </ul>
      </div>
   
	<div class="col-sm-3 column">
		 <div class="content_footercms_right"><?php echo $footerright; ?> </div>
	</div>
  </div>
	<div class="bottomfooter-container">
		<div id="bottomfooter">
			<ul>
				<li class="first"><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
				<li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
				<li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>   
				<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li> 
				<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
				<li class="last"><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
			</ul>
		</div>	
    <div class="footer-copyright"><?php echo $powered; ?></div> 	
	<div class="payment_logo">
		<div class="content_footercms_bottom"><?php echo $footerbottom; ?> </div> 		
	</div>
  </div>
 </div>
</footer>

<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//--> 

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->

</body></html>


