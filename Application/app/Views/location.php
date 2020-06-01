    <!-- Main Content -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="welcome-message">Welcome to Ad Portal</h1>
                    <hr>
                    <h6>You are logged in as <b><?php echo session()->get('firstname').' '.session()->get('lastname'); ?></b></h6>
                </div>
            </div>
            <br />

            <!-- All Categories -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="location/create" class="btn btn-primary" alt="Create Location">Add New</a>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-12">
                            <h3><i class="fas fa-list-alt"></i> All Locations</h3>
                            <br />
                            <?php
                                if ($location) {
                                    echo '<table class="table table-striped table-bordered" id="locationTable">';
                                        echo '<thead>';
                                            echo '<tr>';
                                                echo '<th>Country</th>';
                                                echo '<th>District</th>';
                                                echo '<th>City</th>';
                                                echo '<th>Edit</th>';
                                                echo '<th>Delete</th>';
                                            echo '</tr>';
                                        echo '</thead>';

                                        echo '<tbody>';
                                            foreach ($location as $loc) {
                                                echo '<tr>';
                                                    echo '<td>'.$loc['country'].'</td>';
                                                    echo '<td>'.$loc['district'].'</td>';
                                                    echo '<td>'.$loc['city'].'</td>';
                                                    echo '<td><a class="a-orange" href="'.base_url().'/location/edit/'.$loc['id'].'" alt="Edit Location - '.$loc['city'].'"><i class="far fa-edit"></i></a></td>';
                                                    echo '<td><a class="a-orange" href="'.base_url().'/location/delete/'.$loc['id'].'" alt="Delete Location - '.$loc['city'].'"><i class="far fa-trash-alt"></i></a></td>';
                                                echo '</tr>';
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div class="col-md-12">';
                                        echo '<div class="alert alert-warning" role="alert">';
                                            echo 'No Location Found!';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br /><br /><br />
        </div>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <footer class="bg-dark">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#locationTable').DataTable();
        } );
    </script>
</body>
</html>