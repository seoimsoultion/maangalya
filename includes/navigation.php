<div class="header-row">
    <div class="header-nav pt-1">
        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
               <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li>
                                                    <a class="nav-link <?php if($page=='home') {echo ' active ';} ?>" href="index1.php">
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" <?php if($page=='about-us') {echo ' active ';} ?> href="about.php">
                                                        About Us
                                                    </a>
                                                </li >
                                                <li class="dropdown">
                                                    <a class="nav-link dropdown-toggle <?php if($page=='page-name' ||$page=='page-name') {echo ' active ';} ?>" href="projects.php">
                                                        Projects
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Maangalya Signature</a></li>
                                                        <li><a class="dropdown-item" href="#">Maangalya Park-Avenue</a></li>

                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="nav-link <?php if($page=='why-maangalya' ) {echo ' active ';} ?>" href="#">
                                                        Why Maangalya
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link  <?php if($page=='joint-development' ) {echo ' active ';} ?>" href="joint-development.php">
                                                        Joint Development
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link <?php if($page=='channel-partner' ) {echo ' active ';} ?>" href="channel-partner.php">
                                                        Channel Partners
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link <?php if($page=='contact' ) {echo ' active ';} ?>" href="contact.php">
                                                        Contact
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
        </div>
        <ul class="header-social-icons social-icons d-none d-sm-block">
            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</div>