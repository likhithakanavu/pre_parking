<nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                            <?php $stmth = $admin->ret("SELECT * FROM `admin` ");
                          $rowh = $stmth->fetch(PDO::FETCH_ASSOC); ?>
                                <div class="main-menu-header">
                                    <img class="img-40 img-radius" src="user.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <h4><b><?php echo $rowh['a_name'] ; ?></b></h4>
                                        <!-- <span id="more-details">UX Designer<i class="ti-angle-down"></i></span> -->
                                    </div>
                                </div>


                            </div>
                           
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="user.php">
                                        <span class="pcoded-micon"><i class="fas fa-user"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> User Details</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mall.php">
                                        <span class="pcoded-micon"><i class="fas fa-user"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Owner Details</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="category.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Category</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="location.php">
                                        <span class="pcoded-micon"><i class="fas fa-map-marker-alt"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Location</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="resort.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Resort</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="blog.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Blog </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="booking.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Booking</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="payment.php">
                                        <span class="pcoded-micon"><i class="fas fa-money-check"></i>
<b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Payment</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="feedback.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main"> Feedback</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                               

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>