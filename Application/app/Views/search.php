<div id="wrapper">
    <!-- CONTENT -->
    <!-- Search Area Start Here -->
    <section class="search-layout1 bg-body full-width-border-bottom fixed-menu-mt">
            <div class="container">
                <form name="search" accept-charset="utf-8" id="cp-search-form" method="POST">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-keywords">
                                <input placeholder="Enter Keywords here ..." value="" name="term" id="term" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                            <button type="submit" href="#" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Search Area End Here -->
        <!-- Category Grid View Start Here -->
        <section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <?php
                            $displayMessage="Results";
                            if (isset($adresults)) {
                                if ($term != "") {
                                    $displayMessage = $displayMessage.' for "'.$term.'"';
                                }
                            } else {
                                $displayMessage="All Ads";
                            }

                            if (isset($selectedDistrict)) {
                                $displayMessage = $displayMessage . " | ".ucwords($selectedDistrict);
                                if (isset($selectedCity)) {
                                    $displayMessage = $displayMessage . " &rarr; " . ucwords($selectedCity);
                                }
                            }

                            if (isset($selectedCategory)) {
                                $displayMessage = $displayMessage . " | " . $selectedCategory['category_name'];
                                if (isset($selectedSubcategory)) {
                                    $displayMessage = $displayMessage . " &rarr; " . $selectedSubcategory['sub_category_name'];
                                }
                            }

                            echo '<li class="active">'.$displayMessage.'</li>';
                        ?>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <?php
                                            if (isset($searchresults)) {
                                                echo '<h2>Results</h2>';
                                            } else {
                                                echo '<h2>All Ads</h2>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-8">
                                        <div class="layout-switcher">
                                            <ul>
                                                <li>
                                                    <div class="page-controls-sorting">
                                                        <button class="sorting-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Sort By<i class="fa fa-sort" aria-hidden="true"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Date</a>
                                                            <a class="dropdown-item" href="#">Best Sale</a>
                                                            <a class="dropdown-item" href="#">Rating</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                                //<li><a class="product-view-trigger" href="#" data-type="category-grid-layout2"><i class="fa fa-th-large"></i></a></li>
                                                //<li class="active"><a href="#" data-type="category-list-layout2" class="product-view-trigger"><i class="fa fa-list"></i></a></li>
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout2 gradient-padding zoom-gallery">
                                <div class="row">
                                    <?php
                                        if (isset($adresults)) {
                                            if ($adresults) {
                                                foreach ($adresults as $ad) {
                                                    echo '<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">';
                                                        echo '<div class="product-box item-mb zoom-gallery">';
                                                            echo '<div class="item-mask-wrapper">';
                                                                foreach ($media as $md) {
                                                                    if ($ad['id'] == $md['ad_id'] && $md['featured'] == 1) {
                                                                        echo '<div class="item-mask secondary-bg-box"><img src="'.base_url().'/assets/uploads/'.$md['path'].'" alt="'.$md['alt'].'" class="img-fluid">';
                                                                            echo '<div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>';
                                                                            echo '<div class="title-ctg">'.$md['title'].'</div>';
                                                                            echo '<ul class="info-link">';
                                                                                echo '<li><a href="'.base_url().'/assets/uploads/'.$md['path'].'" class="elv-zoom" data-fancybox-group="gallery" title="'.$md['title'].'"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>';
                                                                                echo '<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
                                                                            echo '</ul>';
                                                                            echo '<div class="symbol-featured"><img src="img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>';
                                                                        echo '</div>';
                                                                    }
                                                                }
                                                            echo '</div>';

                                                            echo '<div class="item-content">';
                                                                foreach ($category as $cat) {
                                                                    if ($ad['cat_id'] == $cat['id']) {
                                                                        $adCat = $cat;
                                                                    }
                                                                }

                                                                echo '<div class="title-ctg">'.$adCat['category_name'].'</div>';
                                                                echo '<h3 class="short-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                                                echo '<h3 class="long-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                                                echo '<ul class="upload-info">';
                                                                    echo '<li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date_format(new DateTime($ad['post_date']),"d M, Y").'</li>';
                                                                    foreach ($location as $loc) {
                                                                        if ($ad['location'] == $loc['id']) {
                                                                            echo '<li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$loc['city'].', '.$loc['district'].'</li>';
                                                                        }
                                                                    }
                                                                    echo '<li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>'.$adCat['category_name'].'</li>';
                                                                echo '</ul>';
                                                                //echo '<p>Eimply dummy text of the printing and typesetting industrym has been the industry\'s standard dummy.</p>';
                                                                echo '<div class="price"><small>රු</small>.'.number_format($ad['price'],2).'</div>';
                                                                echo '<a href="'.base_url().'/ad/'.$ad['slug'].'" class="product-details-btn">Details</a>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">';
                                                    echo '<center>';
                                                        echo '<img src="'.base_url().'/assets/images/empty.png" alt="No Results Found" class="img-fluid" style="width: 128px;">';
                                                        echo '<h3 style="font-weight: 700;">No Results Found!</h3>';
                                                        echo '<a href="'.base_url().'/search" class="cp-default-btn">Browse All</a>';
                                                    echo '</center>';
                                                echo '</div>';
                                            }
                                        } else {
                                            if ($advertisement) {
                                                foreach ($advertisement as $ad) {
                                                    echo '<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">';
                                                        echo '<div class="product-box item-mb zoom-gallery">';
                                                            echo '<div class="item-mask-wrapper">';
                                                                foreach ($media as $md) {
                                                                    if ($ad['id'] == $md['ad_id'] && $md['featured'] == 1) {
                                                                        echo '<div class="item-mask secondary-bg-box"><img src="'.base_url().'/assets/uploads/'.$md['path'].'" alt="'.$md['alt'].'" class="img-fluid">';
                                                                            echo '<div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>';
                                                                            echo '<div class="title-ctg">'.$md['title'].'</div>';
                                                                            echo '<ul class="info-link">';
                                                                                echo '<li><a href="'.base_url().'/assets/uploads/'.$md['path'].'" class="elv-zoom" data-fancybox-group="gallery" title="'.$md['title'].'"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>';
                                                                                echo '<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
                                                                            echo '</ul>';
                                                                            echo '<div class="symbol-featured"><img src="img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>';
                                                                        echo '</div>';
                                                                    }
                                                                }
                                                            echo '</div>';

                                                            echo '<div class="item-content">';
                                                                foreach ($category as $cat) {
                                                                    if ($ad['cat_id'] == $cat['id']) {
                                                                        $adCat = $cat;
                                                                    }
                                                                }

                                                                echo '<div class="title-ctg">'.$adCat['category_name'].'</div>';
                                                                echo '<h3 class="short-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                                                echo '<h3 class="long-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                                                echo '<ul class="upload-info">';
                                                                    echo '<li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date_format(new DateTime($ad['post_date']),"d M, Y").'</li>';
                                                                    foreach ($location as $loc) {
                                                                        if ($ad['location'] == $loc['id']) {
                                                                            echo '<li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$loc['city'].', '.$loc['district'].'</li>';
                                                                        }
                                                                    }
                                                                    echo '<li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>'.$adCat['category_name'].'</li>';
                                                                echo '</ul>';
                                                                //echo '<p>Eimply dummy text of the printing and typesetting industrym has been the industry\'s standard dummy.</p>';
                                                                echo '<div class="price"><small>රු</small> '.number_format($ad['price'],2).'</div>';
                                                                echo '<a href="'.base_url().'/ad/'.$ad['slug'].'" class="product-details-btn">Details</a>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">';
                                                    echo '<center>';
                                                        echo '<img src="'.base_url().'/assets/images/empty.png" alt="No Results Found" class="img-fluid" style="width: 128px;">';
                                                        echo '<h3 style="font-weight: 700;">No Results Found!</h3>';
                                                        echo '<a href="'.base_url().'/search" class="cp-default-btn">Browse All</a>';
                                                    echo '</center>';
                                                echo '</div>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="gradient-wrapper mb-60">
                            <ul class="cp-pagination">
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">Next<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Do you Have Something To Sell?</h2>
                                        <h3>Post your ad on Beluxa</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                    <a href="#" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--- Categories and Subcategories Filter -->
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">

                        <!-- Sort By Filter -->
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title" id="header-all-sort">
                                    <h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Sort By</h3>
                                </div>
                                <ul class="sidebar-category-list" id="content-all-sort">
                                    <li>
                                        <a href="#">Best Match</a>
                                    </li>
                                    <li>
                                        <a href="#">Date: New to Old</a>
                                    </li>
                                    <li>
                                        <a href="#">Date: Old to New</a>
                                    </li>
                                    <li>
                                        <a href="#">Price: High to Low</a>
                                    </li>
                                    <li>
                                        <a href="#">Price: Low to High</a>
                                    </li>
                                    </ul>
                            </div>
                        </div>
                        <!-- End of Sort By Filter -->

                        <!--- Categories and Subcategories Filter -->
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title" id="header-all-cat" style="background-color: rgba(248, 100, 14, 1.0);color: rgba(255,255,255,1.0);">
                                    <h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Categories</h3>
                                </div>
                                <ul class="sidebar-category-list" id="content-all-cat">
                                    <?php
                                        if (isset($selectedCategory)) {
                                            // Include Category in URL
                                            if (isset($selectedSubcategory)) {
                                                // Include Subcategory in URL
                                                if (isset($selectedDistrict)) {
                                                    // Include District in URL
                                                    if (isset($selectedCity)) {
                                                        // Include City in URL
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                        echo '</b></li>';
                                                    
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$selectedSubcategory['sub_category_name'].'</a>';
                                                        echo '</b></li>';
                                                    } else {
                                                        // Do not Include City in URL
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                        echo '</b></li>';
                                                        
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$selectedSubcategory['sub_category_name'].'</a>';
                                                        echo '</b></li>';
                                                    }
                                                } else {
                                                    // Do not Include District in URL
                                                    echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                        echo '</b></li>';

                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                    echo '</b></li>';
                                            
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$selectedSubcategory['sub_category_name'].'</a>';
                                                    echo '</b></li>';
                                                }
                                            } else {
                                                if (isset($selectedDistrict)) {
                                                    // Include Category in URL
                                                    // Do not Include Subcategory in URL
                                                    // Do not Include District in URL
                                                    if (isset($selectedCity)) {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                        echo '</b></li>';
                                                        
                                                        foreach ($subcategory as $subcat) {
                                                            echo '<li><b>';
                                                                echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$selectedCategory['category_slug'].'/'.$subcat['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$subcat['sub_category_name'].'</a>';
                                                            echo '</b></li>';
                                                        }
                                                    } else {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                        echo '</b></li>';
                                                        
                                                        foreach ($subcategory as $subcat) {
                                                            echo '<li><b>';
                                                                echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'/'.$subcat['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$subcat['sub_category_name'].'</a>';
                                                            echo '</b></li>';
                                                        }
                                                    }
                                                } else {
                                                    // Do not Include District in URL
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka" style="background-color: rgba(248,100,14,0.9); color: rgba(255,255,255,1.0);">All Categories</a>';
                                                    echo '</b></li>';

                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'" style="background-color: rgba(248, 100, 14, 0.5); color: rgba(255,255,255,1.0);"><img src="'.base_url().'/assets/uploads/'.$selectedCategory['category_icon'].'" alt="'.$selectedCategory['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$selectedCategory['category_name'].'</a>';
                                                    echo '</b></li>';
                                            
                                                    foreach ($subcategory as $subcat) {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'/'.$subcat['sub_category_slug'].'"><i class="fas fa-chevron-right" style="margin-right: 15px;"></i> '.$subcat['sub_category_name'].'</a>';
                                                        echo '</b></li>';
                                                    }
                                                }
                                            }
                                            
                                        } else {
                                            if (isset($selectedDistrict)) {
                                                if (isset($selectedCity)) {
                                                    foreach ($category as $cat) {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$cat['category_slug'].'"><img src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="'.$cat['category_name'].' category service" class="img-fluid" style="width:24px;"/>'.$cat['category_name'].'</a>';
                                                        echo '</b></li>';
                                                    }
                                                } else {
                                                    foreach ($category as $cat) {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$cat['category_slug'].'"><img src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="'.$cat['category_name'].' category service" class="img-fluid" style="width: 24px;"/>'.$cat['category_name'].'</a>';
                                                        echo '</b></li>';
                                                    }
                                                }
                                            } else {
                                                foreach ($category as $cat) {
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$cat['category_slug'].'"><img src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="'.$cat['category_name'].' category service" class="img-fluid" style="width: 24px;"/>'.$cat['category_name'].'</a>';
                                                    echo '</b></li>';
                                                }
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!--- End of Categories and Subcategories Filter -->

                        <!-- Location Filter -->
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title" id="header-all-loc">
                                    <h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Locations</h3>
                                </div>
                                <ul class="sidebar-loacation-list" id="content-all-loc">
                                    <?php
                                        if (isset($selectedDistrict)) {
                                            if (isset($selectedCity)) {
                                                // District Selected
                                                // City Selected
                                                if (isset($selectedCategory)) {
                                                    if (isset($selectedSubcategory)) {
                                                        // Category Selected
                                                        // Subcategory Selected
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">All Districts</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">'.ucwords($selectedDistrict).'</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCity.'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">'.ucwords($selectedCity).'</a>';
                                                        echo '</b></li>';
                                                    } else {
                                                        // Category Selected
                                                        // Subcategory not Selected
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'">All Districts</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'">'.ucwords($selectedDistrict).'</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a hreg="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'/'.$selectedCategory['category_slug'].'">'.ucwords($selectedCity).'</a>';
                                                        echo '</b></li>';
                                                    }
                                                } else {
                                                    // Category Not Selected
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka">All Districts</a>';
                                                    echo '</b></li>';

                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'">'.ucwords($selectedDistrict).'</a>';
                                                    echo '</b></li>';

                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($selectedCity).'">'.ucwords($selectedCity).'</a>';
                                                    echo '</b></li>';
                                                }
                                            } else {
                                                // District Selected
                                                // City not Selected
                                                if (isset($selectedCategory)) {
                                                    if (isset($selectedSubcategory)) {
                                                        // Category Selected
                                                        // Subcategory Selected
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">All Districts</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">'.ucwords($selectedDistrict).'</a>';
                                                        echo '</b></li>';

                                                        foreach ($city as $c) {
                                                            echo '<li><b>';
                                                                echo '<a href="'.base_url().'/search/index/'.strtowlower($selectedDistrict).'/'.strtolower($c['city']).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">'.ucwords($c['city']).'</a>';
                                                            echo '</b></li>';
                                                        }

                                                    } else {
                                                        // Category Selected
                                                        // Subcategory not Selected
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'">All Districts</a>';
                                                        echo '</b></li>';

                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.$selectedCategory['category_slug'].'">'.ucwords($selectedDistrict).'</a>';
                                                        echo '</b></li>';

                                                        foreach ($city as $c) {
                                                            echo '<li><b>';
                                                                echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($c['city']).'/'.$selectedCategory['category_slug'].'">'.ucwords($c['city']).'</a>';
                                                            echo '</b></li>';
                                                        }
                                                    }
                                                } else {
                                                    // Category not Selected
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka">All Districts</a>';
                                                    echo '</b></li>';

                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'">'.ucwords($selectedDistrict).'</a>';
                                                    echo '</b></li>';

                                                    foreach ($city as $c) {
                                                        echo '<li><b>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($selectedDistrict).'/'.strtolower($c['city']).'">'.ucwords($c['city']).'</a>';
                                                        echo '</b></li>';
                                                    }
                                                }
                                            }
                                        } else {
                                            // District not Selected
                                            // Therefore, no City
                                            if (isset($selectedCategory)) {
                                                if (isset($selectedSubcategory)) {
                                                    // Category Selected
                                                    // Subcategory Selected
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">All Districts</a>';
                                                    echo '</b></li>';

                                                    foreach ($district as $dist) {
                                                        echo '<li>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($dist).'/'.$selectedCategory['category_slug'].'/'.$selectedSubcategory['sub_category_slug'].'">'.ucwords($dist).'</a>';
                                                        echo '</li>';
                                                    }
                                                } else {
                                                    // Category Selected
                                                    // Subcategory not Selected
                                                    echo '<li><b>';
                                                        echo '<a href="'.base_url().'/search/index/sri-lanka/'.$selectedCategory['category_slug'].'">All Districts</a>';
                                                    echo '</b></li>';

                                                    foreach ($district as $dist) {
                                                        echo '<li>';
                                                            echo '<a href="'.base_url().'/search/index/'.strtolower($dist).'/'.$selectedCategory['category_slug'].'">'.ucwords($dist).'</a>';
                                                        echo '</li>';
                                                    }
                                                }
                                            } else {
                                                // Category not Selected
                                                // Subcategory not Selected
                                                echo '<li><b>';
                                                    echo '<a href="'.base_url().'/search/index/sri-lanka">All Districts</a>';
                                                echo '</b></li>';

                                                foreach ($district as $dist) {
                                                    echo '<li>';
                                                        echo '<a href="'.base_url().'/search/index/'.$dist.'">'.ucwords($dist).'</a>';
                                                    echo '</li>';
                                                }
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Location Filter -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Category Grid View End Here -->

    <!-- Subscribe Area Start Here -->
    <section class="bg-primary s-space full-width-border-top">
        <div class="container">
            <div class="section-title-light">
                <h2 class="size-lg">Subscribe to Newsletter</h2>
                <p>Stay in touch with us to receive the latest news about our services</p>
            </div>
            <div class="input-group subscribe-area">
                <input type="email" placeholder="Type your e-mail address" class="form-control" name="email" id="email">
                <span class="input-group-addon">
                    <button type="submit" class="cp-default-btn-xl">Subscribe</button>                        
                </span>
            </div>
        </div>
    </section>
    <!-- Subscribe Area End Here -->

    <!-- Footer Area Start Here -->
    <footer>
        <div class="footer-area-top s-space-equal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">About us</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="about.html">About us</a>
                                </li>
                                <li>
                                    <a href="#">Career</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Sitemap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">How to sell fast</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="#">How to sell fast</a>
                                </li>
                                <li>
                                    <a href="#">Buy Now on Classipost</a>
                                </li>
                                <li>
                                    <a href="#">Membership</a>
                                </li>
                                <li>
                                    <a href="#">Banner Advertising</a>
                                </li>
                                <li>
                                    <a href="#">Promote your ad</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">Help &amp; Support</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="#">Live Chat</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Stay safe on classipost</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">Follow Us On</h3>
                            <ul class="social-link">
                                <li class="fa-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/facebook.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="tw-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/twitter.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="yo-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/youtube.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="pi-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/pinterest.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="li-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/linkedin.jpg" alt="social">
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <ul class="useful-link">
                                <li><a>+94 77 101 8743</a></li>
                                <li><a>sales@beluxa.lk</a></li>
                                <li><a>info@beluxa.lk</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
                        <p>Copyright © <?php echo date('Y'); ?> Beluxa. Designed and Developed By <a href="http://zenolk.com" alt="Zeno Innovations (Pvt) Ltd">Zeno Innovations<a/>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End Here -->
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<!-- Font Awesome-->
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<!-- Data Tables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<!-- Swiper -->
<script src="https://unpkg.com/swiper/js/swiper.js"></script>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.meanmenu.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.scrollUp.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Custom JS -->
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
<script>
    $("#header-all-cat").click(function () {
        $header = $(this);
        //getting the next element
        $content = $header.next();
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function () {
            //execute this after slideToggle is done
            //change text of header based on visibility of content div
            $header.html(function () {
                //change text based on condition
                return $content.is(":visible") ? '<h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Categories</h3>' : '<h3><i class="fas fa-chevron-up fa-xs" style="margin-right: 15px;"></i> Categories</h3>';
            });
        });
    });

    $("#header-all-loc").click(function() {
        $header = $(this);
        // getting the next element
        $content = $header.next();
        // open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function() {
            // execute this after slideToggle is done
            // change text of header based on visibility of content div
            $header.html(function () {
                // change text based on condition
                return $content.is(":visible") ? '<h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Locations</h3>' : '<h3><i class="fas fa-chevron-up fa-xs" style="margin-right: 15px;"></i> Locations</h3>'
            });
        });
    });

    $("#header-all-sort").click(function() {
        $header = $(this);
        // getting the next element
        $content = $header.next();
        // open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function() {
            // execute this after slideToggle is done
            // change text of header based on visibility of content div
            $header.html(function () {
                // change text based on condition
                return $content.is(":visible") ? '<h3><i class="fas fa-chevron-down fa-xs" style="margin-right: 15px;"></i> Sort By</h3>' : '<h3><i class="fas fa-chevron-up fa-xs" style="margin-right: 15px;"></i> Sort By</h3>'
            });
        });
    });

    $('#cp-search-form').on('submit', function(event){
        $('[name=term]').prop('disabled', true);
        // Read Old Url
        var old_url = $(location).attr("href");
        // Remove '?term' part to add new term
        var new_url = old_url.substring(0, old_url.indexOf('?'));
        $(this).attr('action', new_url+ '?term=' + $('[name=term]').val());
    });
</script>
</body>
</html>
