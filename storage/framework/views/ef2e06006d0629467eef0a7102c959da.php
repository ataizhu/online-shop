<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+201255845857">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            <?php echo e(__('site.telephone')); ?>: +201255845857</a>
                    </li>
                    <li>
                        <a href="mailto:info@multi-vendore-commerce.com">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            <?php echo e(__('site.email')); ?>: info@multi-vendore-commerce.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>



                        <a>
                            
                            <?php if(\Illuminate\Support\Facades\Auth::check()): ?> 
                                <?php echo e(__('site.my_account')); ?>

                            <?php else: ?>
                                <?php echo e(__('site.login_register')); ?>

                            <?php endif; ?>

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="<?php echo e(url('cart')); ?>">
                                    <i class="fas fa-cog u-s-m-r-9"></i>
                                    <?php echo e(__('site.view_cart')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('checkout')); ?>">
                                    <i class="far fa-check-circle u-s-m-r-9"></i>
                                    <?php echo e(__('site.checkout')); ?></a>
                            </li>



                            
                            <?php if(\Illuminate\Support\Facades\Auth::check()): ?> 
                                <li>
                                    <a href="<?php echo e(url('user/account')); ?>">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        My Account
                                    </a>
                                </li>


                                <li>
                                    <a href="<?php echo e(url('user/orders')); ?>">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        <?php echo e(__('site.my_orders')); ?>

                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('user/logout')); ?>">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        <?php echo e(__('site.logout')); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(url('user/login-register')); ?>">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        <?php echo e(__('site.customer_login')); ?>

                                    </a>
                                </li>
                                
                                
                            <?php endif; ?>



                        </ul>
                    </li>
                    <li>
                        <a>EGP
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">LE EGP</a>
                            </li>
                            <li>
                                <a href="#">($) USD</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><?php echo e(strtoupper(app()->getLocale())); ?>

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="<?php echo e(route('lang.switch', 'en')); ?>" class="u-c-brand">EN</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('lang.switch', 'fr')); ?>">FR</a>
                            </li>
                        </ul>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">


                        <a href="<?php echo e(url('/')); ?>">


                            <img src="<?php echo e(asset('front/images/main-logo/main-logo.png')); ?>"
                                alt="Multi-vendor E-commerce Application" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">



                    
                    <form class="form-searchbox" action="<?php echo e(url('/search-products')); ?>" method="get">
                        <label class="sr-only" for="search-landscape"><?php echo e(__('site.search')); ?></label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="<?php echo e(__('site.search_everything')); ?>"
                            name="search" <?php if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])): ?>
                            value="<?php echo e($_REQUEST['search']); ?>" <?php endif; ?>>  
                            <div class="select-box-position">
                                <div class="select-box-wrapper select-hide">
                                    <label class="sr-only" for="select-category">Choose category for search</label>
                                    <select class="select-box" id="select-category" name="section_id">

                                        <option selected="selected" value="">All</option>
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section['id']); ?>" <?php if(isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']): ?>
                                            selected <?php endif; ?>><?php echo e($section['name']); ?></option>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>

                    <?php
                        // dd($_GET);
                    ?>



                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="<?php echo e(url('/')); ?>">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter totalCartItems"><?php echo e(totalCartItems()); ?></span>  
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems"> 
        <?php echo $__env->make('front.layout.header_cart_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            <?php echo e(__('site.all_categories')); ?>

                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">



                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($section['categories']) > 0): ?> 
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                    <i class="ion-ios-add-circle"></i>


                                                    <?php echo e($section['name']); ?> 


                                                    <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">



                                                        <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a
                                                                            href="<?php echo e(url($category['url'])); ?>"><?php echo e($category['category_name']); ?></a>
                                                                        <ul>



                                                                            <?php $__currentLoopData = $category['sub_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                                                                <li>
                                                                                    <a
                                                                                        href="<?php echo e(url($subcategory['url'])); ?>"><?php echo e($subcategory['category_name']); ?></a>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="<?php echo e(url('search-products?search=new-arrivals')); ?>"><?php echo e(__('site.new_arrivals')); ?>

                                <span class="superscript-label-new"><?php echo e(__('site.new')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('search-products?search=best-sellers')); ?>"><?php echo e(__('site.best_seller')); ?>

                                <span class="superscript-label-hot"><?php echo e(__('site.hot')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('search-products?search=featured')); ?>"><?php echo e(__('site.featured')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('search-products?search=discounted')); ?>"><?php echo e(__('site.discounted')); ?>

                                <span class="superscript-label-discount">>10%</span>
                            </a>
                        </li>
                        <li class="mega-position">
                            <a><?php echo e(__('site.more')); ?>

                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">COMPANY</li>
                                    <li>
                                        <a href="<?php echo e(url('about-us')); ?>" class="u-c-brand">About Us</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('contact')); ?>">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('faq')); ?>">FAQ</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">COLLECTION</li>
                                    <li>
                                        <a href="<?php echo e(url('men')); ?>">Men Clothing</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('women')); ?>">Women Clothing</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('kids')); ?>">Kids Clothing</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">ACCOUNT</li>
                                    <li>
                                        <a href="<?php echo e(url('user/account')); ?>">My Account</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('user/orders')); ?>">My Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- --><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/layout/header.blade.php ENDPATH**/ ?>