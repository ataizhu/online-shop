


<!-- Products-List-Wrapper -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th><?php echo e(__('site.product')); ?></th>
                <th><?php echo e(__('site.price')); ?></th>
                <th><?php echo e(__('site.quantity')); ?></th>
                <th><?php echo e(__('site.subtotal')); ?></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


            
            <?php $total_price = 0 ?>

            <?php $__currentLoopData = $getCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                    // dd($getDiscountAttributePrice);
                ?>

                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="<?php echo e(url('product/' . $item['product_id'])); ?>">
                                <img src="<?php echo e(asset('front/images/product_images/small/' . $item['product']['product_image'])); ?>"
                                    alt="Product">
                                <h6>
                                    <?php echo e($item['product']['product_name']); ?> (<?php echo e($item['product']['product_code']); ?>) -
                                    <?php echo e($item['size']); ?>

                                    <br>
                                    Color: <?php echo e($item['product']['product_color']); ?>

                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">



                            <?php if($getDiscountAttributePrice['discount'] > 0): ?> 
                                <div class="price-template">
                                    <div class="item-new-price">
                                        EGP<?php echo e($getDiscountAttributePrice['final_price']); ?>

                                    </div>
                                    <div class="item-old-price" style="margin-left: -40px">
                                        EGP<?php echo e($getDiscountAttributePrice['product_price']); ?>

                                    </div>
                                </div>
                            <?php else: ?> 
                                <div class="price-template">
                                    <div class="item-new-price">
                                        EGP<?php echo e($getDiscountAttributePrice['final_price']); ?>

                                    </div>
                                </div>
                            <?php endif; ?>



                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="<?php echo e($item['quantity']); ?>">
                                <a data-max="1000" class="plus-a  updateCartItem" data-cartid="<?php echo e($item['id']); ?>"
                                    data-qty="<?php echo e($item['quantity']); ?>">&#43;</a>  
                                <a data-min="1" class="minus-a updateCartItem" data-cartid="<?php echo e($item['id']); ?>"
                                    data-qty="<?php echo e($item['quantity']); ?>">&#45;</a>  
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            EGP<?php echo e($getDiscountAttributePrice['final_price'] * $item['quantity']); ?> 
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem"
                                data-cartid="<?php echo e($item['id']); ?>"></button>
                        </div>
                    </td>
                </tr>


                
                <?php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </tbody>
    </table>
</div>
<!-- Products-List-Wrapper /- -->





 





<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2"><?php echo e(__('site.cart_totals')); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0"><?php echo e(__('site.subtotal')); ?></h3> 
                    </td>
                    <td>
                        <span class="calc-text">EGP<?php echo e($total_price); ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0"><?php echo e(__('site.coupon_discount')); ?></h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount"> 

                            <?php if(\Illuminate\Support\Facades\Session::has('couponAmount')): ?> 
                                EGP<?php echo e(\Illuminate\Support\Facades\Session::get('couponAmount')); ?>

                            <?php else: ?>
                                EGP0
                            <?php endif; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0"><?php echo e(__('site.grand_total')); ?></h3> 
                    </td>
                    <td>
                        <span
                            class="calc-text grand_total">EGP<?php echo e($total_price - \Illuminate\Support\Facades\Session::get('couponAmount')); ?></span>
                         
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Billing /- --><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/cart_items.blade.php ENDPATH**/ ?>