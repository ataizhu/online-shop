<?php $__env->startSection('content'); ?>
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Shop</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html"><?php echo e(__('site.home')); ?></a>
                    </li>
                    <li class="is-marked">
                        <a href="listing.html"><?php echo e(__('site.shop')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->

    <!-- Shop-Page -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <!-- Shop-Intro -->
            <div class="shop-intro">
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <a href="<?php echo e(url('/')); ?>"><?php echo e(__('site.home')); ?></a>
                    </li>


                    
                    <?php echo $categoryDetails['breadcrumbs']; ?>



                </ul>
            </div>
            <!-- Shop-Intro /- -->
            <div class="row">



                
                <?php echo $__env->make('front.products.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <!-- Shop-Right-Wrapper -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Page-Bar -->
                    <div class="page-bar clearfix">



                        
                        <?php if(!isset($_REQUEST['search'])): ?>


                            <!-- Toolbar Sorter 1  -->
                            
                                
                                        <form name="sortProducts" id="sortProducts"> 

                                                    
                                                    <input type="hidden" name="url" id="url" value="<?php echo e($url); ?>"> 

                                                    <div class="toolbar-sorter">
                                                        <div class="select-box-wrapper">
                                                            <label class="sr-only"
                                                                for="sort-by"><?php echo e(__('site.sort_by')); ?></label>
                                                            <select name="sort" id="sort" class="select-box">
                                                                
                                                                <option value="" selected>Select</option>
                                                                <option value="product_latest" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest'): ?> selected <?php endif; ?>>Sort By:
                                                                    Latest</option>
                                                                <option value="price_lowest" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_lowest'): ?> selected <?php endif; ?>>Sort By:
                                                                    Lowest Price</option>
                                                                <option value="price_highest" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_highest'): ?> selected <?php endif; ?>>Sort By:
                                                                    Highest Price</option>
                                                                <option value="name_a_z" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_a_z'): ?> selected <?php endif; ?>>Sort By: Name A -
                                                                    Z</option>
                                                                <option value="name_z_a" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_z_a'): ?> selected <?php endif; ?>>Sort By: Name Z -
                                                                    A</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- //end Toolbar Sorter 1  -->


                        <?php endif; ?>



                                            <!-- Toolbar Sorter 2  -->
                                            <div class="toolbar-sorter-2">
                                                <div class="select-box-wrapper">
                                                    <label class="sr-only"
                                                        for="show-records"><?php echo e(__('site.show_records')); ?></label>
                                                    <select class="select-box" id="show-records">
                                                        <option selected="selected" value="">Showing:
                                                            <?php echo e(count($categoryProducts)); ?>

                                                        </option>
                                                        <option value=""><?php echo e(__('site.showing')); ?>: All</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- //end Toolbar Sorter 2  -->
                    </div>
                    <!-- Page-Bar /- -->


                    <!-- Row-of-Product-Container -->

                    
                    <div class="filter_products">
                        <?php echo $__env->make('front.products.ajax_products_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Row-of-Product-Container /- -->



                    
                    



                    
                    <?php if(!isset($_REQUEST['search'])): ?>


                        
                        
                        <?php if(isset($_GET['sort'])): ?> 
                            <div>
                                <?php echo e($categoryProducts->appends(['sort' => $_GET['sort']])->links()); ?>  
                            </div>
                        <?php else: ?>
                            <div>
                                <?php echo e($categoryProducts->links()); ?> 
                            </div>
                        <?php endif; ?>


                    <?php endif; ?>


                    <div>&nbsp;</div>

                    
                    <div><?php echo e($categoryDetails['categoryDetails']['description']); ?></div>



                </div>
                <!-- Shop-Right-Wrapper /- -->


                <!-- Shop-Pagination -->


                <!-- Shop-Pagination /- -->


            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/listing.blade.php ENDPATH**/ ?>