<!-- Header Navigation -->
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-blue">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="<?php echo base_url(); ?>/admin">Ad Portal</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url().'/'; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ad"></i> Advertisements
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/advertisement">View All</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/advertisement/create">Add New</a>
                    </div>
                </li>

                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file"></i> Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/page">View All</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/page/create">Add New</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/faq">FAQ</a>
                        </div>
                    </li>
                <?php endif; ?>
                
                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i> Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/category">View All</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/category/create">Add New</a>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i> Sub Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/subcategories">View All</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/subcategories/create">Add New</a>
                        </div>
                    </li>
                <?php endif; ?>
                
                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/user">View All</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/user/create">Add New</a>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-tie"></i> Customer
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/customer">View All</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/customer/create">Add New</a>
                    </div>
                </li>

                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-map-pin"></i> Location
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/location">View All</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/location/create">Add New</a>
                        </div>
                    </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>/media"><i class="fas fa-images"></i> Media</a>
                </li>
 
                <?php if ($_SESSION['privilege'] == 1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>/setting"><i class="fas fa-cog"></i> Settings</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>/login/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>