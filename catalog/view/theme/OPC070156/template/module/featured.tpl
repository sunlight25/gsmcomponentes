<div class="box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
	<?php 
		$sliderFor = 5;
		$productCount = sizeof($products); 
	?>
	<?php if ($productCount >= $sliderFor): ?>
		<div class="customNavigation">
			<a class="prev">&nbsp;</a>
			<a class="next">&nbsp;</a>
		</div>	
	<?php endif; ?>	
	
	<div class="box-product <?php if ($productCount >= $sliderFor){?>product-carousel<?php }else{?>product-grid<?php }?>" id="<?php if ($productCount >= $sliderFor){?>featured-carousel<?php }else{?>featured-grid<?php }?>">
  <?php foreach ($products as $product) { ?>
  <div class="<?php if ($productCount >= $sliderFor){?>slider-item<?php }else{?>product-items<?php }?>">
    <div class="product-block product-thumb transition">
	  <div class="product-block-inner ">
	  	
		<div class="image">
			<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a>
		<?php if ($product['rating']) { ?>
		<div class="rating">
		  <?php for ($i = 1; $i <= 5; $i++) { ?>
		  <?php if ($product['rating'] < $i) { ?>
		  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
		  <?php } else { ?>
		  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
		  <?php } ?>
		  <?php } ?>
		</div>
		<?php } ?>				
		</div>
		<?php if (!$product['special']) { ?>       
		<?php } else { ?>
		<span class="saleicon sale">Sale</span>         
		<?php } ?>
		<div class="caption product-detail">
 			 <h4><a href="<?php echo $product['href']; ?>" title="<?php echo ($product['name']); ?>">
			 	<?php if (strlen(($product['name'])) > 70)
				{ 
						$maxLength = 70 ; echo substr($product['name'],0,$maxLength)." "; 
				}
				else{
					echo ($product['name']);
				}
				?>
				</a>
			</h4>
					
			<?php /*?> <p><?php echo $product['description']; ?></p><?php */?>			
			<?php if ($product['price']) { ?>
			<p class="price">
			  <?php if (!$product['special']) { ?>
			  <?php echo $product['price']; ?>
			  <?php } else { ?>
			  <span class="price-old"><?php echo $product['price']; ?></span><span class="price-new"><?php echo $product['special']; ?></span>
			  <?php } ?>
			  <?php if ($product['tax']) { ?>
			  <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
			  <?php } ?>
			</p>
			<?php } ?>
        </div>
 	    
		<div class="button-group">
        	<div class="button-container"><button class="addtocart" type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');"><?php echo $button_cart; ?></span></button></div>
        	<button class="wishlist_button" type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
        	<button class="compare_button" type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-exchange"></i></button>
        </div>
	  
  	</div>
	</div>
</div>
  
  <?php } ?>
</div>
  </div>
</div>
<span class="featured_default_width" style="display:none; visibility:hidden"></span>
