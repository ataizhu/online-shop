
<?php
    
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Get all the (enabled/active) Filters
    // dd($productFilters);
?>



<!-- Shop-Left-Side-Bar-Wrapper -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Fetch-Categories-from-Root-Category  -->
    <div class="fetch-categories">
        <h3 class="title-name">Browse Categories</h3>
        <!-- Level 1 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">T-Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual T-Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal T-Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- //end Level 1 -->
        <!-- Level 2 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- //end Level 2 -->
    </div>
    <!-- Fetch-Categories-from-Root-Category  /- -->



     
    <?php if(!isset($_REQUEST['search'])): ?>

        <!-- Filters -->
        <!-- Filter-Size -->

        
        
        
        <?php
            $getSizes = \App\Models\ProductsFilter::getSizes($url); // get product sizes depending on the URL (to show the proper relevant 'size' filter values (whether small, medium, ... OR 64GB-4GB, 128GB-6GB, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getSizes);
        ?>


        <div class="facet-filter-associates">
            <h3 class="title-name">Size</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    
                    
                    <?php $__currentLoopData = $getSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <input type="checkbox" class="check-box size" id="size<?php echo e($key); ?>" name="size[]" value="<?php echo e($size); ?>">   
                        <label class="label-text" for="size<?php echo e($key); ?>"><?php echo e($size); ?>

                            
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </form>
        </div>
        <!-- Filter-Size -->




        <!-- Filter-Color -->

        
        
        
        <?php
            $getColors = \App\Models\ProductsFilter::getColors($url); // get product colors depending on the URL (to show the proper relevant 'color' filter values (whether small, medium, ... OR 64GB-4GB, 128GB-6GB, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getColors);
        ?>
        <div class="facet-filter-associates">
            <h3 class="title-name">Color</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    
                    
                    <?php $__currentLoopData = $getColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <input type="checkbox" class="check-box color" id="color<?php echo e($key); ?>" name="color[]" value="<?php echo e($color); ?>">   
                        <label class="label-text" for="color<?php echo e($key); ?>"><?php echo e($color); ?>

                            
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </form>
        </div>
        <!-- Filter-Color /- -->


        <!-- Filter-Brand -->

        
        
        
        <?php
            $getBrands = \App\Models\ProductsFilter::getBrands($url); // get product brands depending on the URL (to show the proper relevant 'brand' filter values (whether LC Waikiki, Concrete, ... OR iPhone, Xiaomi, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getColors);
        ?>
        <div class="facet-filter-associates">
            <h3 class="title-name">Brand</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    
                    
                    <?php $__currentLoopData = $getBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <input type="checkbox" class="check-box brand" id="brand<?php echo e($key); ?>" name="brand[]" value="<?php echo e($brand['id']); ?>">   
                            <label class="label-text" for="brand<?php echo e($key); ?>"><?php echo e($brand['name']); ?>

                                
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </form>
        </div>
        <!-- Filter-Brand /- -->



        <!-- Filter-Price -->

        
        
        
        <div class="facet-filter-associates">
            <h3 class="title-name">Price</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">


                     
                    <?php
                        // our desired array of price ranges
                        $prices = array('0-1000', '1000-2000', '2000-5000', '5000-10000', '10000-100000');
                    ?>

                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="checkbox" class="check-box price" id="price<?php echo e($key); ?>" name="price[]" value="<?php echo e($price); ?>">   
                        <label class="label-text" for="price<?php echo e($key); ?>">EGP <?php echo e($price); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </form>
        </div>
        <!-- Filter-Price /- -->



        
        
        <!-- Filter -->
        <?php $__currentLoopData = $productFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <?php
                // dd($filter);

                // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $categoryDetails variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $categoryDetails['categoryDetails']['id']); // $categoryDetails was passed from the listing() method in the Front/ProductsController
            ?>

            <?php if($filterAvailable == 'Yes'): ?> 
                <?php if(count($filter['filter_values']) > 0): ?> 
                    <div class="facet-filter-associates">
                        <h3 class="title-name"><?php echo e($filter['filter_name']); ?></h3> 
                        
                        <form class="facet-form" action="#" method="post"> 
                            <div class="associate-wrapper">
                                <?php $__currentLoopData = $filter['filter_values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    

                                    
                                    
                                    <input type="checkbox" class="check-box <?php echo e($filter['filter_column']); ?>" id="<?php echo e($value['filter_value']); ?>" name="<?php echo e($filter['filter_column']); ?>[]" value="<?php echo e($value['filter_value']); ?>">      
                                    <label class="label-text" for="<?php echo e($value['filter_value']); ?>"><?php echo e(ucwords($value['filter_value'])); ?>

                                        
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Filter -->

    <?php endif; ?>


</div>
<!-- Shop-Left-Side-Bar-Wrapper /- --><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/filters.blade.php ENDPATH**/ ?>