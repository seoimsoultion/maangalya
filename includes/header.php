<!DOCTYPE html>
<html>
    <head>
 
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

        <title><?php echo $title; ?></title>	

        <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="author" content="okler.net">

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="vendor/animate/animate.min.css">
        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/theme.css">
        <link rel="stylesheet" href="css/theme-elements.css">
        <link rel="stylesheet" href="css/theme-blog.css">
        <link rel="stylesheet" href="css/theme-shop.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
        <link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">
        <link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css">

        <!-- Demo CSS -->


        <!-- Skin CSS -->
        <link rel="stylesheet" href="css/skins/default.css"> 

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">

        <!-- Head Libs -->
        <script src="vendor/modernizr/modernizr.min.js"></script>

    </head>
    <body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div class="body">
            <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="index.html">
                                            <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="25" src="img/logo.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row pt-3">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> About Us</a>
                                            </li>
                                            <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Contact Us</a>
                                            </li>
                                            <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
                                                <span class="ws-nowrap"><i class="fas fa-phone"></i> (123) 456-789</span>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header-nav-features">
                                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                            <a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
                                            <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                                <form role="search" action="page-search-results.html" method="get">
                                                    <div class="simple-search input-group">
                                                        <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                                        <span class="input-group-append">
                                                            <button class="btn" type="submit">
                                                                <i class="fa fa-search header-nav-top-icon"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
                                            <a href="#" class="header-nav-features-toggle">
                                                <img src="img/icons/icon-cart.svg" width="14" alt="" class="header-nav-top-icon-img">
                                                <span class="cart-info d-none">
                                                    <span class="cart-qty">1</span>
                                                </span>
                                            </a>
                                            <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                                <ol class="mini-products-list">
                                                    <li class="item">
                                                        <a href="#" title="Camera X1000" class="product-image"><img src="img/products/product-1.jpg" alt="Camera X1000"></a>
                                                        <div class="product-details">
                                                            <p class="product-name">
                                                                <a href="#">Camera X1000 </a>
                                                            </p>
                                                            <p class="qty-price">
                                                                1X <span class="price">$890</span>
                                                            </p>
                                                            <a href="#" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </li>
                                                </ol>
                                                <div class="totals">
                                                    <span class="label">Total:</span>
                                                    <span class="price-total"><span class="price">$890</span></span>
                                                </div>
                                                <div class="actions">
                                                    <a class="btn btn-dark" href="#">View Cart</a>
                                                    <a class="btn btn-primary" href="#">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php include 'navigation.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>