

<!-- Main Content -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="welcome-message">Welcome to Ad Portal</h2>
                <hr>
                <h6>You are logged in as <b><?php echo session()->get('firstname').' '.session()->get('lastname'); ?></b></h6>
            </div>
        </div>
        <br />

        <!-- All Advertisements -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <a href="advertisement/create" class="btn btn-orange" alt="Create Advertisements">Add New</a>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <h3><i class="fas fa-ad"></i> All Advertisements</h3>
                        <br />
                        <?php
                            if ($advertisement) {
                                echo '<table class="table table-striped table-bordered" id="advertisement">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID</th>';
                                            echo '<th>Title</th>';
                                            echo '<th>End Date</th>';
                                            echo '<th>Status</th>';
                                            echo '<th>Posted By</th>';
                                            echo '<th>Views</th>';
                                            echo '<th>Edit</th>';
                                            echo '<th>Delete</th>';
                                        echo '</tr>';
                                    echo '</thead>';

                                    echo '<tbody>';
                                        foreach ($advertisement as $advert) {
                                            echo '<tr>';
                                                echo '<td>'.$advert['id'].'</td>';
                                                echo '<td><a href="#" alt="View Advertisement - '.$advert['title'].'">'.$advert['title'].'</a></td>';
                                                echo '<td>'.$advert['end_date'].'</td>';
                                                
                                                if ($advert['status'] == 0) {
                                                    echo '<td><i class="fas fa-circle inactive-circle"></i></td>';
                                                } elseif ($advert['status'] == 1) {
                                                    echo '<td><i class="fas fa-circle active-circle"></i></td>';
                                                } else {
                                                    echo '<td><i class="fas fa-circle renew-circle"></i></td>';
                                                }

                                                foreach($admin as $ad) {
                                                    if ($ad['id'] == $advert['user_id']) {
                                                        echo '<td>'.$ad['username'].'</td>';
                                                        break;
                                                    }
                                                }

                                                echo '<td>'.$advert['views'].'</td>';
                                                echo '<td><a class="a-orange" href="advertisement/edit/'.$advert['id'].'" alt="Edit Advertisement - '.$advert['title'].'">Edit</td>';
                                                echo '<td><a class="a-orange" href="advertisement/edit/'.$advert['id'].'" alt="Delete Advertisement - '.$advert['title'].'">Delete</td>';
                                            echo '</tr>';
                                        }
                                    echo '</tbody>';
                                echo '</table>';
                            } else {
                                echo '<div class="col-md-12">';
                                    echo '<div class="alert alert-warning" role="alert">';
                                        echo 'No Advertisements Found!';
                                    echo '</div>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br />
        <!-- End of All Advertismeents -->
    
    </div>
</main>
<!-- End Main Content -->

<!-- Footer -->
<footer class="bg-blue">
    <div class="row">
        <div class="col-md-4">
            <img src="https://w.ikman-st.com/dist/img/ikman/all/logos/header-33e2ba1f.png" alt="Ad Portal"/>
            <p style="font-weight: 400;"><br>125A, Main Street,<br>Colombo,<br>Sri Lanka</p>
            <p style="font-weight: 400; font-size: 0.75em;">&copy; <?php echo date('Y'); ?>. Developed by <a href="http://zenolk.com" alt="Zeno Innovations (Pvt) Ltd">Zeno Innovations</a>.</p>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Learn More</h4>
                <li><a class="text-muted" href="#">Advertising</a></li>
                <li><a class="text-muted" href="#">Terms of Use</a></li>
                <li><a class="text-muted" href="#">Privacy Policy</a></li>
                <li><a class="text-muted" href="#">Membership</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Company</h4>
                <li><a class="text-muted" href="#">Home</a></li>
                <li><a class="text-muted" href="#">About Us</a></li>
                <li><a class="text-muted" href="#">Contact Us</a></li>
                <li><a class="text-muted" href="#">Sitemap</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Scripts - Data Table -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#advertisement').DataTable();
    });
</script>
</body>
</html>