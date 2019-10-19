<!-- Web Fonts  -->
<!-- Favicon -->
<link rel="shortcut icon" href="img/new_images/icon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="img/new_images/icon.png">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
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
<link rel="stylesheet" href="vendor/nivo-slider/nivo-slider.css">
<link rel="stylesheet" href="vendor/nivo-slider/themes/default/default.css">
<!-- Demo CSS -->
<link rel="stylesheet" href="css/demos/demo-construction.css">
<!-- Skin CSS -->
<link rel="stylesheet" href="css/skins/skin-construction.css">
<!-- Theme Custom CSS -->
<link rel="stylesheet" href="css/custom.css">
<!-- Head Libs -->
<script src="vendor/modernizr/modernizr.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150364389-1"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
   
   gtag('config', 'UA-150364389-1');
</script>
</head>
<body data-spy="scroll" data-target="#sidebar" data-offset="120">
   <div class="body">
   <header id="header" class="header-narrow header-semi-transparent-light" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}">
      <div class="header-body">
         <div class="header-container container">
            <div class="header-row">
               <div class="header-column">
                  <div class="header-row">
                     <div class="header-logo"> <img class="logo-default" alt="Porto" width="250" height="auto" src="img/new_images/logo.png">
                        <a href="https://www.maangalyaprojects.com/"> <img class="logo-small" alt="Porto" width="250" height="auto" src="img/new_images/logo.png"> </a>
                     </div>
                  </div>
               </div>
               <div class="header-column justify-content-end">
                  <div class="header-row">
                     <div class="header-nav header-nav-stripe order-2 order-lg-1">
                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                           <nav class="collapse">
                              <ul class="nav nav-pills" id="mainNav">
                                 <?php $url= basename($_SERVER['PHP_SELF']); ?>
                                 <li> <a class="nav-link <?php if($url=='index.php') {echo ' active '; } ?>" href="https://www.maangalyaprojects.com/">															Home														</a> </li>
                                 <li> <a class="nav-link <?php if($url=='aboutus.php') {echo ' active '; } ?>"  href="aboutus.php">															About Us														</a> </li>
                                 <li class="dropdown <?php if($url=='maangalya-signature.php' || $url=='maangalya-park-avenue.php') {echo ' active '; } ?>">
                                    <a class="nav-link dropdown-toggle" href="#">															Projects														</a>
                                    <ul class="dropdown-menu">
                                       <li><a class="dropdown-item" href="maangalya-signature-apartments-in-jp-nagar">Maangalya Signature</a></li>
                                    </ul>
                                 </li>
                                 <li> <a class="nav-link <?php if($url=='whyus.php') {echo ' active '; } ?>" href="whyus.php">															Why Maangalya														</a> </li>
                                 <li> <a class="nav-link <?php if($url=='joint-development.php') {echo ' active '; } ?>" href="joint-development.php">															Joint Development														</a> </li>
                                 <li> <a class="nav-link <?php if($url=='channel-partner.php') {echo ' active '; } ?>" href="channel-partner.php">															Channel Partners														</a> </li>
                                 <li> <a class="nav-link<?php if($url=='contact.php') {echo ' active '; } ?> " href="contact.php">															Contact														</a> </li>
                              </ul>
                           </nav>
                        </div>
                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav"> <i class="fas fa-bars"></i> </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>