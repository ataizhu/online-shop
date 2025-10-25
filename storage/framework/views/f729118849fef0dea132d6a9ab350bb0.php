<?php $__env->startSection('content'); ?>
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2><?php echo e(__('site.cart')); ?></h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html"><?php echo e(__('site.home')); ?></a>
                    </li>
                    <li class="is-marked">
                        <a href="cart.html"><?php echo e(__('site.cart')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">



            
            
            
            
            <?php if(Session::has('success_message')): ?> <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if(Session::has('error_message')): ?> <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> <?php echo e(Session::get('error_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if($errors->any()): ?> <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>



            <div class="row">
                <div class="col-lg-12">




                    <div id="appendCartItems"> 
                        <?php echo $__env->make('front.products.cart_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>





                     
                    <!-- Coupon -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6><?php echo e(__('site.enter_coupon')); ?></h6>
                            <div class="coupon-field">



                                

                                <form id="applyCoupon" method="post" action="javascript:void(0)" <?php if(\Illuminate\Support\Facades\Auth::check()): ?> user=1 <?php endif; ?>>   
                                        <label class="sr-only" for="coupon-code"><?php echo e(__('site.apply_coupon')); ?></label>
                                        <input type="text" class="text-field" placeholder="<?php echo e(__('site.coupon_code')); ?>" id="code"
                                            name="code">
                                        <button type="submit" class="button"><?php echo e(__('site.apply_coupon')); ?></button>
                                    </form>



                            </div>
                        </div>
                        <div class="button-area">
                            <a href="<?php echo e(url('/')); ?>" class="continue"><?php echo e(__('site.continue_shopping')); ?></a>
                            <a href="<?php echo e(url('/checkout')); ?>" class="checkout"><?php echo e(__('site.proceed_to_checkout')); ?></a>
                        </div>
                    </div>
                    <!-- Coupon /- -->





                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/cart.blade.php ENDPATH**/ ?>