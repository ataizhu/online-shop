<?php $__env->startSection('content'); ?>
    <!-- Main-Slider -->
    <div class="default-height ph-item">
        <div class="slider-main owl-carousel">

            
            <?php $__currentLoopData = $sliderBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-image">
                    <div class="slide-content">
                        <h1>
                            <a <?php if(!empty($banner['link'])): ?> href="<?php echo e(url($banner['link'])); ?>" <?php else: ?> href="javascript:;" <?php endif; ?>>
                                <img src="<?php echo e(asset('front/images/banner_images/' . $banner['image'])); ?>"
                                    title="<?php echo e($banner['title']); ?>" alt="<?php echo e($banner['title']); ?>">
                            </a>
                        </h1>
                        <h2><?php echo e($banner['title']); ?></h2>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- Main-Slider /- -->




    <?php if(isset($fixBanners[1]['image'])): ?>
        <!-- Banner-Layer -->
        <div class="banner-layer">
            <div class="container">
                <div class="image-banner">
                    <a target="_blank" rel="nofollow" href="<?php echo e(url($fixBanners[1]['link'])); ?>"
                        class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="<?php echo e(asset('front/images/banner_images/' . $fixBanners[1]['image'])); ?>"
                            alt="<?php echo e($fixBanners[1]['alt']); ?>" title="<?php echo e($fixBanners[1]['title']); ?>">
                    </a>
                </div>
            </div>
        </div>
        <!-- Banner-Layer /- -->
    <?php endif; ?>



    <!-- Top Collection -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3"><?php echo e(__('site.top_collection')); ?></h3>
                <ul class="nav tab-nav-style-1-a justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"
                            href="#men-latest-products"><?php echo e(__('site.new_arrivals')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                            href="#men-best-selling-products"><?php echo e(__('site.best_seller')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#discounted-products"><?php echo e(__('site.discounted')); ?>

                            <?php echo e(__('site.products')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-featured-products"><?php echo e(__('site.featured')); ?>

                            <?php echo e(__('site.products')); ?></a>
                    </li>
                </ul>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">

                                    
                                    <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Yes');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        ?>

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="<?php echo e(url('product/' . $product['id'])); ?>">
                                                    <?php if(!empty($product['product_image']) && file_exists($product_image_path)): ?>
                                                        
                                                        <img class="img-fluid" src="<?php echo e(asset($product_image_path)); ?>" alt="Product">
                                                    <?php else: ?> 
                                                        <img class="img-fluid"
                                                            src="<?php echo e(asset('front/images/product_images/small/no-image.png')); ?>"
                                                            alt="Product">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal"
                                                        href="#quick-view"><?php echo e(__('site.quick_look')); ?></a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist"
                                                        href="javascript:void(0)"><?php echo e(__('site.add_to_wishlist')); ?></a>
                                                    <a class="item-addCart"
                                                        href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e(__('site.add_to_cart')); ?></a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a
                                                                href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_code']); ?></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a
                                                            href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_name']); ?></a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>



                                                
                                                <?php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                ?>


                                                <?php if($getDiscountPrice > 0): ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($getDiscountPrice); ?>

                                                        </div>
                                                        <div class="item-old-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php else: ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>



                                            </div>
                                            <div class="tag new">
                                                <span>NEW</span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show fade" id="men-best-selling-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">


                                    
                                    <?php $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Yes');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        ?>

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="<?php echo e(url('product/' . $product['id'])); ?>">
                                                    <?php if(!empty($product['product_image']) && file_exists($product_image_path)): ?>
                                                        
                                                        <img class="img-fluid" src="<?php echo e(asset($product_image_path)); ?>" alt="Product">
                                                    <?php else: ?> 
                                                        <img class="img-fluid"
                                                            src="<?php echo e(asset('front/images/product_images/small/no-image.png')); ?>"
                                                            alt="Product">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal"
                                                        href="#quick-view"><?php echo e(__('site.quick_look')); ?></a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist"
                                                        href="javascript:void(0)"><?php echo e(__('site.add_to_wishlist')); ?></a>
                                                    <a class="item-addCart"
                                                        href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e(__('site.add_to_cart')); ?></a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a
                                                                href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_code']); ?></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a
                                                            href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_name']); ?></a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                
                                                <?php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                ?>
                                                <?php if($getDiscountPrice > 0): ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($getDiscountPrice); ?>

                                                        </div>
                                                        <div class="item-old-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php else: ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="tag new">
                                                <span>NEW</span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="discounted-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">


                                    
                                    <?php $__currentLoopData = $discountedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Yes');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        ?>

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="<?php echo e(url('product/' . $product['id'])); ?>">
                                                    <?php if(!empty($product['product_image']) && file_exists($product_image_path)): ?>
                                                        
                                                        <img class="img-fluid" src="<?php echo e(asset($product_image_path)); ?>" alt="Product">
                                                    <?php else: ?> 
                                                        <img class="img-fluid"
                                                            src="<?php echo e(asset('front/images/product_images/small/no-image.png')); ?>"
                                                            alt="Product">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal"
                                                        href="#quick-view"><?php echo e(__('site.quick_look')); ?></a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist"
                                                        href="javascript:void(0)"><?php echo e(__('site.add_to_wishlist')); ?></a>
                                                    <a class="item-addCart"
                                                        href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e(__('site.add_to_cart')); ?></a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a
                                                                href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_code']); ?></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a
                                                            href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_name']); ?></a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                
                                                <?php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                ?>
                                                <?php if($getDiscountPrice > 0): ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($getDiscountPrice); ?>

                                                        </div>
                                                        <div class="item-old-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php else: ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="tag new">
                                                <span>NEW</span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="men-featured-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">


                                    
                                    <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Yes');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        ?>

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="<?php echo e(url('product/' . $product['id'])); ?>">
                                                    <?php if(!empty($product['product_image']) && file_exists($product_image_path)): ?>
                                                        
                                                        <img class="img-fluid" src="<?php echo e(asset($product_image_path)); ?>" alt="Product">
                                                    <?php else: ?> 
                                                        <img class="img-fluid"
                                                            src="<?php echo e(asset('front/images/product_images/small/no-image.png')); ?>"
                                                            alt="Product">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal"
                                                        href="#quick-view"><?php echo e(__('site.quick_look')); ?></a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist"
                                                        href="javascript:void(0)"><?php echo e(__('site.add_to_wishlist')); ?></a>
                                                    <a class="item-addCart"
                                                        href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e(__('site.add_to_cart')); ?></a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a
                                                                href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_code']); ?></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a
                                                            href="<?php echo e(url('product/' . $product['id'])); ?>"><?php echo e($product['product_name']); ?></a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                
                                                <?php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                ?>
                                                <?php if($getDiscountPrice > 0): ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($getDiscountPrice); ?>

                                                        </div>
                                                        <div class="item-old-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php else: ?> 
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Rs . <?php echo e($product['product_price']); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="tag new">
                                                <span>NEW</span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Collection /- -->




    <?php if(isset($fixBanners[1]['image'])): ?>
        <!-- Banner-Layer -->
        <div class="banner-layer">
            <div class="container">
                <div class="image-banner">
                    <a target="_blank" rel="nofollow" href="<?php echo e(url($fixBanners[1]['link'])); ?>"
                        class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="<?php echo e(asset('front/images/banner_images/' . $fixBanners[1]['image'])); ?>"
                            alt="<?php echo e($fixBanners[1]['alt']); ?>" title="<?php echo e($fixBanners[1]['title']); ?>">
                    </a>
                </div>
            </div>
        </div>
        <!-- Banner-Layer /- -->
    <?php endif; ?>



    <!-- Site-Priorities -->
    <section class="app-priority">
        <div class="container">
            <div class="priority-wrapper u-s-p-b-80">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-star"></i>
                            </div>
                            <h2>
                                <?php echo e(__('site.great_value')); ?>

                            </h2>
                            <p><?php echo e(__('site.great_value_text')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-cash"></i>
                            </div>
                            <h2>
                                <?php echo e(__('site.shop_with_confidence')); ?>

                            </h2>
                            <p><?php echo e(__('site.shop_confidence_text')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-ios-card"></i>
                            </div>
                            <h2>
                                <?php echo e(__('site.safe_payment')); ?>

                            </h2>
                            <p><?php echo e(__('site.safe_payment_text')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-contacts"></i>
                            </div>
                            <h2>
                                <?php echo e(__('site.help_center')); ?>

                            </h2>
                            <p><?php echo e(__('site.help_center_text')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Site-Priorities /- -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/index.blade.php ENDPATH**/ ?>