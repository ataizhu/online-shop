 



<?php $__env->startSection('content'); ?>
    
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            /* position:absolute; */
            position:inherit;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>


    
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detail</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="<?php echo e(url('/')); ?>"><?php echo e(__('site.home')); ?></a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">



                    
                    

                    <!-- Product-zoom-area -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> 
                        <a      href="<?php echo e(asset('front/images/product_images/large/' . $productDetails['product_image'])); ?>">
                            <img src="<?php echo e(asset('front/images/product_images/large/' . $productDetails['product_image'])); ?>" alt="" width="500" height="500" />
                        </a>
                    </div>

                    <div class="thumbnails" style="margin-top: 30px"> 
                        <a      href="<?php echo e(asset('front/images/product_images/large/' . $productDetails['product_image'])); ?>" data-standard="<?php echo e(asset('front/images/product_images/small/' . $productDetails['product_image'])); ?>">
                            <img src="<?php echo e(asset('front/images/product_images/small/' . $productDetails['product_image'])); ?>" width="120" height="120" alt="" />
                        </a>



                        
                        <?php $__currentLoopData = $productDetails['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <a      href="<?php echo e(asset('front/images/product_images/large/' . $image['image'])); ?>" data-standard="<?php echo e(asset('front/images/product_images/small/' . $image['image'])); ?>">
                                <img src="<?php echo e(asset('front/images/product_images/small/' . $image['image'])); ?>" width="120" height="120" alt="" />
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">


                        
                        
                        <?php if(Session::has('error_message')): ?> <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> <?php echo e(Session::get('error_message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>


                            
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>


                        
                        
                        
                        <?php if(Session::has('success_message')): ?> <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                
                                <strong>Success:</strong> <?php echo Session::get('success_message') ?>       

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>



                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;"><?php echo e($productDetails['product_name']); ?></a> 
                                </h1>
                            </div>



                            
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="<?php echo e(url('/')); ?>"><?php echo e(__('site.home')); ?></a> 
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;"><?php echo e($productDetails['section']['name']); ?></a> 
                                </li>
                                <?php echo $categoryDetails['breadcrumbs'] ?> 
                            </ul>
                            



                            <div class="product-rating">
                                <div title="<?php echo e($avgRating); ?> out of 5 - based on <?php echo e(count($ratings)); ?> Reviews">

                                    
                                    <?php if($avgStarRating > 0): ?> 
                                        <?php
                                            $star = 1;
                                            while ($star < $avgStarRating):
                                        ?>

                                                <span style="color: gold; font-size: 17px">&#9733;</span>

                                        <?php
                                                $star++;
                                            endwhile;
                                        ?>
                                        (<?php echo e($avgRating); ?>)
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8"><?php echo e(__('site.description')); ?>:/h6>
                            <p><?php echo e($productDetails['description']); ?></p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">

                        

                            <?php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) ?>

                            <span class="getAttributePrice">

                                <?php if($getDiscountPrice > 0): ?> 
                                    <div class="price">
                                        <h4>EGP<?php echo e($getDiscountPrice); ?></h4>
                                    </div>
                                    <div class="original-price">
                                        <span><?php echo e(__('site.original_price')); ?>:/span>
                                        <span>EGP<?php echo e($productDetails['product_price']); ?></span> 
                                    </div>
                                <?php else: ?> 
                                    <div class="price">
                                        <h4>EGP<?php echo e($productDetails['product_price']); ?></h4> 
                                    </div>
                                <?php endif; ?>

                            </span> 



                        </div>
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8"><?php echo e(__('site.sku_information')); ?>:/h6>
                            <div class="left">
                                <span><?php echo e(__('site.product_code')); ?>:/span>
                                <span><?php echo e($productDetails['product_code']); ?></span>
                            </div>
                            <div class="left">
                                <span><?php echo e(__('site.product_color')); ?>:/span>
                                <span><?php echo e($productDetails['product_color']); ?></span>
                            </div>
                            <div class="availability">
                                <span><?php echo e(__('site.availability')); ?>:/span>


                                <?php if($totalStock > 0): ?>
                                    <span><?php echo e(__('site.in_stock')); ?></span>
                                <?php else: ?>
                                    <span style="color: red"><?php echo e(__('site.out_of_stock')); ?></span>
                                <?php endif; ?>



                            </div>



                            <?php if($totalStock > 0): ?>
                                <div class="left">
                                    <span>Only:</span>
                                    <span><?php echo e($totalStock); ?> left</span>
                                </div>
                            <?php endif; ?>



                        </div>



                        
                        <?php if(isset($productDetails['vendor'])): ?>
                            <div>
                                
                                Sold by: <a href="/products/<?php echo e($productDetails['vendor']['id']); ?>">
                                            <?php echo e($productDetails['vendor']['vendorbusinessdetails']['shop_name']); ?>

                                        </a>
                            </div>
                        <?php endif; ?>



                         
                        <form action="<?php echo e(url('cart/add')); ?>" method="Post" class="post-form">
                            <?php echo csrf_field(); ?> 


                            <input type="hidden" name="product_id" value="<?php echo e($productDetails['id']); ?>">  


                            <div class="section-5-product-variants u-s-p-y-14">



                                 
                                <?php if(count($groupProducts) > 0): ?> 
                                    <div>
                                        <div><strong>Product Colors</strong></div>
                                        <div style="margin-top: 10px">
                                            <?php $__currentLoopData = $groupProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(url('product/' . $product['id'])); ?>">
                                                    <img style="width: 80px" src="<?php echo e(asset('front/images/product_images/small/' . $product['product_image'])); ?>">
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>



                                <div class="sizes u-s-m-b-11" style="margin-top: 20px">
                                    <span>Available Size:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="<?php echo e($productDetails['id']); ?>" name="size" required> 



                                            <option value="">Select Size</option>
                                            <?php $__currentLoopData = $productDetails['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($attribute['size']); ?>"><?php echo e($attribute['size']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">

                                
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>



                            </div>
                        </form>


                         
                        <br><br><b>Delivery</b>
                        <input type="text" id="pincode" placeholder="Check Pincode" required>
                        <button type="button" id="checkPincode">Go</button> 


                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-80">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#video">Product Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews <?php echo e(count($ratings)); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">



                                    <?php if($productDetails['product_video']): ?>
                                        <video controls>
                                            <source src="<?php echo e(url('front/videos/product_videos/' . $productDetails['product_video'])); ?>" type="video/mp4">
                                        </video>
                                    <?php else: ?>
                                        Product Video does not exist    
                                    <?php endif; ?>



                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Details-Tab -->
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">Product Details</h4>
                                        <table>



                                            <?php
                                                $productFilters = \App\Models\ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
                                                // dd($productFilters);
                                            ?>

                                            <?php $__currentLoopData = $productFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <?php
                                                    // echo '<pre>', var_dump($product), '</pre>';
                                                    // exit;
                                                    // echo '<pre>', var_dump($filter), '</pre>';
                                                    // exit;
                                                    // dd($filter);
                                                ?>

                                                <?php if(isset($productDetails['category_id'])): ?> 
                                                    <?php
                                                        // dd($filter);

                                                        // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $productDetails['category_id'] variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                                                        $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);
                                                    ?>

                                                    <?php if($filterAvailable == 'Yes'): ?> 

                                                        <tr>
                                                            <td><?php echo e($filter['filter_name']); ?></td>
                                                            <td>
                                                                <?php $__currentLoopData = $filter['filter_values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                    <?php
                                                                        // echo '<pre>', var_dump($value), '</pre>'; exit;
                                                                    ?>
                                                                    <?php if(!empty($productDetails[$filter['filter_column']]) && $productDetails[$filter['filter_column']] == $value['filter_value']): ?>  
                                                                        <?php echo e(ucwords($value['filter_value'])); ?>

                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </td>
                                                        </tr>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Specifications-Tab /- -->
                            <!-- Reviews-Tab -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">Average Rating</h6>
                                                <div class="circle-wrapper">
                                                    <h1><?php echo e($avgRating); ?></h1>
                                                </div>
                                                <h6 class="review-h6">Based on <?php echo e(count($ratings)); ?> Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(<?php echo e($ratingFiveStarCount); ?>)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(<?php echo e($ratingFourStarCount); ?>)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(<?php echo e($ratingThreeStarCount); ?>)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(<?php echo e($ratingTwoStarCount); ?>)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(<?php echo e($ratingOneStarCount); ?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">


                                            
                                            <form method="POST" action="<?php echo e(url('add-rating')); ?>" name="formRating" id="formRating">
                                                <?php echo csrf_field(); ?> 

                                                <input type="hidden" name="product_id" value="<?php echo e($productDetails['id']); ?>">
                                                <div class="your-rating-wrapper">
                                                    <h6 class="review-h6">Your Review matters.</h6>
                                                    <h6 class="review-h6">Have you used this product before?</h6>
                                                    <div class="star-wrapper u-s-m-b-8">


                                                        
                                                        <div class="rate">
                                                            <input style="display: none" type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>

                                                            <input style="display: none" type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>

                                                            <input style="display: none" type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>

                                                            <input style="display: none" type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>

                                                            <input style="display: none" type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>


                                                    </div>
                                                        <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Your Review" name="review" required></textarea>
                                                        <button class="button button-outline-secondary">Submit Review</button>
                                                    
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> (<?php echo e(count($ratings)); ?>) </span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        <div class="reviewers">

                                            
                                            <?php if(count($ratings) > 0): ?> 
                                                <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="review-data">
                                                        <div class="reviewer-name-and-date">
                                                            <h6 class="reviewer-name"><?php echo e($rating['user']['name']); ?></h6>
                                                            <h6 class="review-posted-date"><?php echo e(date('d-m-Y H:i:s', strtotime($rating['created_at']))); ?></h6>
                                                        </div>
                                                        <div class="reviewer-stars-title-body">
                                                            <div class="reviewer-stars">


                                                                
                                                                <?php
                                                                    $count = 0;

                                                                    // Show the stars
                                                                    while ($count < $rating['rating']): // while $count is 0, 1, 2, 3, 4, or 5 Stars
                                                                ?>

                                                                        <span style="color: gold">&#9733;</span>  

                                                                <?php
                                                                        $count++;
                                                                    endwhile;
                                                                ?>


                                                            </div>
                                                            <p class="review-body">
                                                                <?php echo e($rating['review']); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                        <!-- All-Reviews /- -->
                                        <!-- Pagination-Review -->

                                        <!-- Pagination-Review /- -->
                                    </div>
                                    <!-- Get-Reviews /- -->
                                </div>
                            </div>
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Similar Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">



                                    
                                <?php $__currentLoopData = $similarProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Recently Viewed Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">




                                
                                <?php $__currentLoopData = $recentlyViewedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Recently-View-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/atai/Documents/Work projects/Laravel-Multi-Vendor-E-Commerce-Application/resources/views/front/products/detail.blade.php ENDPATH**/ ?>