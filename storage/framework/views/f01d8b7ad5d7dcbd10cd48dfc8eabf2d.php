<?php $__env->startSection('content'); ?>
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2><?php echo e(__('site.account')); ?></h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html"><?php echo e(__('site.home')); ?></a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html"><?php echo e(__('site.account')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">



            
            
            
            
            <?php if(Session::has('success_message')): ?> <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(__('site.success')); ?>:</strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if(Session::has('error_message')): ?> <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo e(__('site.error')); ?>:</strong> <?php echo e(Session::get('error_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if($errors->any()): ?> <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo e(__('site.error')); ?>:</strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>



            <div class="row">
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20"><?php echo e(__('site.login')); ?></h2>
                        <h6 class="account-h6 u-s-m-b-30"><?php echo e(__('site.welcome_back')); ?></h6>




                        
                            
                        <p id="login-error"></p> 
                        <form id="loginForm" action="javascript:;" method="post"> 
                            <?php echo csrf_field(); ?> 


                            <div class="u-s-m-b-30">
                                <label for="user-email"><?php echo e(__('site.email')); ?>

                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field"
                                    placeholder="<?php echo e(__('site.user_email')); ?>" name="email">
                                <p id="login-email"></p>  
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password"><?php echo e(__('site.password')); ?>

                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field"
                                    placeholder="<?php echo e(__('site.user_password')); ?>" name="password">
                                <p id="login-password"></p>  
                            </div>



                            <div class="group-inline u-s-m-b-30">

                                
                                


                                
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="<?php echo e(url('user/forgot-password')); ?>">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i><?php echo e(__('site.lost_password')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>



                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100"><?php echo e(__('site.login')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->



                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20"><?php echo e(__('site.register')); ?></h2>
                        <h6 class="account-h6 u-s-m-b-30"><?php echo e(__('site.register_text')); ?></h6>



                        
                        
                        <p id="register-success"></p>




                        <form id="registerForm" action="javascript:;" method="post"> 
                            <?php echo csrf_field(); ?> 


                            <div class="u-s-m-b-30">
                                <label for="username"><?php echo e(__('site.name')); ?>

                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field"
                                    placeholder="<?php echo e(__('site.user_name')); ?>" name="name">
                                   
                                <p id="register-name"></p>   
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" class="text-field"
                                    placeholder="<?php echo e(__('site.user_mobile')); ?>" name="mobile">
                                  
                                <p id="register-mobile"></p>  
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" class="text-field" placeholder="User Email"
                                    name="email">
                                  
                                <p id="register-email"></p>  
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" class="text-field" placeholder="User Password"
                                    name="password">
                                  
                                <p id="register-password"></p>  
                            </div>
                            <div class="u-s-m-b-30"> 
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept"><?php echo e(__('site.read_accept_terms')); ?>

                                    <a href="terms-and-conditions.html"
                                        class="u-c-brand"><?php echo e(__('site.terms_and_conditions')); ?></a>
                                </label>
                                  
                                <p id="register-accept"></p>  
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100"><?php echo e(__('site.register')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/users/login_register.blade.php ENDPATH**/ ?>