<body style="background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%)!important;">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="login-form mx-auto">
                <div class="jumbotron bg-white from-wrapper" style="box-shadow: -20px 30px 116px 0 rgba(92, 15, 15, 0.54);">
                    <h3><i class="fas fa-key" style="color: #fda085; margin-right: 10px;"></i> Login</h3>
                    <hr>
                    <form action="<?php echo base_url('login/');?>" name="login" id="login" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
                        </div>
          
                        <?php if (isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                            if (session('error')) {
                                echo '<div class="col-12">';
                                    echo '<div class="alert alert-danger" role="alert">';
                                        echo session('error');
                                    echo '</div>';
                                echo '</div>';
                            }
                        ?>
                        
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-orange btn-login">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
</body>
</html>