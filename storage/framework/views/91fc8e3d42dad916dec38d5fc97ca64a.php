<!-- Row-of-Product-Container -->

<div class="row product-container grid-style">

    <?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-item col-lg-4 col-md-6 col-sm-6">
            <div class="item">
                <div class="image-container">
                    <a class="item-img-wrapper-link" href="<?php echo e(url('product/' . $product['id'])); ?>">


                        <?php
                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                        ?>

                        <?php if(!empty($product['product_image']) && file_exists($product_image_path)): ?> 
                            <img class="img-fluid" src="<?php echo e(asset($product_image_path)); ?>" alt="Product">
                        <?php else: ?> 
                            <img class="img-fluid" src="<?php echo e(asset('front/images/product_images/small/no-image.png')); ?>" alt="Product">
                        <?php endif; ?>


                    </a>
                    <div class="item-action-behaviors">
                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                        <a class="item-mail" href="javascript:void(0)">Mail</a>
                        <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                        <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                    </div>
                </div>
                <div class="item-content">
                    <div class="what-product-is">
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="shop-v1-root-category.html"><?php echo e($product['product_code']); ?></a>
                            </li>
                            <li class="has-separator">



                                <a href="listing.html"><?php echo e($product['product_color']); ?></a>
                            </li>
                            <li>
                                <a href="listing.html"><?php echo e($product['brand']['name']); ?></a>
                            </li>
                        </ul>
                        <h6 class="item-title">
                            <a href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_name']); ?></a>
                        </h6>
                        <div class="item-description">
                            <p><?php echo e($product['description']); ?></p>



                        </div>
                    </div>



                    
                    <?php
                        $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                    ?>


                    <?php if($getDiscountPrice > 0): ?> 
                        <div class="price-template">
                            <div class="item-new-price">
                                EGP<?php echo e($getDiscountPrice); ?>

                            </div>
                            <div class="item-old-price">
                                EGP<?php echo e($product['product_price']); ?>

                            </div>
                        </div>
                    <?php else: ?> 
                        <div class="price-template">
                            <div class="item-new-price">
                                EGP<?php echo e($product['product_price']); ?>

                            </div>
                        </div>
                    <?php endif; ?>



                </div>



                
                <?php
                    $isProductNew = \App\Models\Product::isProductNew($product['id'])
                ?>
                <?php if($isProductNew == 'Yes'): ?>
                    <div class="tag new">
                        <span>NEW</span>
                    </div>
                <?php endif; ?>


                
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
<!-- Row-of-Product-Container /- --><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/ajax_products_listing.blade.php ENDPATH**/ ?>