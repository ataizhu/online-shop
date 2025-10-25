


<!-- Mini Cart -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            <?php echo e(__('site.your_cart')); ?>

            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">


            
            <?php $total_price = 0 ?>

            <?php
                $getCartItems = getCartItems(); // getCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file --}} 
            ?>

            <?php $__currentLoopData = $getCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                    // dd($getDiscountAttributePrice);
                ?>
                <li class="clearfix">
                    <a href="<?php echo e(url('product/' . $item['product_id'])); ?>">
                        <img src="<?php echo e(asset('front/images/product_images/small/' . $item['product']['product_image'])); ?>"
                            alt="Product">
                        <span class="mini-item-name"><?php echo e($item['product']['product_name']); ?></span>
                        <span class="mini-item-price">EGP<?php echo e($getDiscountAttributePrice['final_price']); ?></span>
                        <span class="mini-item-quantity"> x <?php echo e($item['quantity']); ?> </span>
                    </a>
                </li>
                
                <?php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left"><?php echo e(__('site.total')); ?>:</span>
            <span class="mini-total-price float-right">EGP<?php echo e($total_price); ?></span>
        </div>
        <div class="mini-action-anchors">
            <a href="<?php echo e(url('cart')); ?>" class="cart-anchor"><?php echo e(__('site.view_cart')); ?></a>
            <a href="<?php echo e(url('checkout')); ?>" class="checkout-anchor"><?php echo e(__('site.checkout')); ?></a>
        </div>
    </div>
</div>
<!-- Mini Cart /- -->




<?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/layout/header_cart_items.blade.php ENDPATH**/ ?>