<!-- Header Navigation -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <!-- Navbar content -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="<?php echo base_url(); ?>/">Ad Portal</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url().'/all_ads'; ?>"><i class="fas fa-tachometer-alt"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            foreach ($category as $cat) {
                                echo '<a class="dropdown-item" href="view-cat/'.$cat['id'].'" alt="Category - '.$cat['category_name'].'">'.$cat['category_name'].'</a>';
                            }
                        ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Districts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            foreach ($district as $dist) {
                                echo '<a class="dropdown-item" href="view-cat/'.$dist.'" alt="Category - '.$dist.'">'.$dist.'</a>';
                            }
                        ?>
                    </div>
                </li>
                
            </ul>
            <span class="navbar-text">
                <a class="nav-link post-ad-btn" href="<?php echo base_url().'/post-ad'; ?>" alt="Post an Advertisement"><i class="far fa-edit" style="margin-right: 10px;"></i> Post an Ad</a>
            </span>
        </div>
    </nav>
</header>
<!-- End Header Navigation -->