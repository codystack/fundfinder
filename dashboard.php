<?php
include './components/dashboardheader.php';
require_once './auth/account.php';
?>

    <div class="offcanvas-wrap">

        <section class="py-8" style="background: url('assets/images/bg.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 mx-auto">

                        <div class="row g-2 g-xl-5 align-items-center">
                            <div class="col-md-6">
                                <h4 class="mb-3">Welcome, <?php echo $_SESSION['firstName']; ?>!</h4>
                            </div>
                            <?php

                                $select_query = "SELECT * FROM upload WHERE userID ='".$_SESSION['id']."'";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $status = $row['status'];
                                    }
                                }
                            ?>
                            <div class="col-md-6 text-md-end">
                                <?php if($status=='Filled'){echo '<span class="badge rounded-pill bg-warning text-dark">Loan Review Pending</span>';}?>
                                
                            </div>
                        </div>

                        <section>
                            <div class="col-xl-12">
                                <div class="tab-content" id="component-1-content">
                                    <div class="tab-pane fade show active" id="component-1-1" role="tabpanel"
                                        aria-labelledby="component-1-1-tab">
                                        <div class="row g-3 g-xl-5">
                                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                <a href="intake-form" class="card equal-md-4-3 card-hover-border bg-white">
                                                    <div class="card-wrap text-center">
                                                        <div class="card-header pb-0">
                                                            <img src="assets/images/apply.svg" alt="Logo" class="mb-2 w-40">
                                                        </div>
                                                        <div class="card-footer pt-0 mt-auto">
                                                            <h4 class="card-title fw-light">Application</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                <a href="account" class="card equal-md-4-3 card-hover-border bg-white">
                                                    <div class="card-wrap text-center">
                                                        <div class="card-header pb-0">
                                                            <img src="assets/images/user.svg" alt="Logo" class="mb-2 w-40">
                                                        </div>
                                                        <div class="card-footer pt-0 mt-auto">
                                                            <h4 class="card-title fw-light">Account</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                <a href="security" class="card equal-md-4-3 card-hover-border bg-white">
                                                    <div class="card-wrap text-center">
                                                        <div class="card-header pb-0">
                                                            <img src="assets/images/security.svg" alt="Logo" class="mb-2 w-40">
                                                        </div>
                                                        <div class="card-footer pt-0 mt-auto">
                                                            <h4 class="card-title fw-light">Security</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                <a href="logout" class="card equal-md-4-3 card-hover-border bg-white">
                                                    <div class="card-wrap text-center">
                                                        <div class="card-header pb-0">
                                                            <img src="assets/images/power.svg" alt="Logo" class="mb-2 w-40">
                                                        </div>
                                                        <div class="card-footer pt-0 mt-auto">
                                                            <h4 class="card-title fw-light">Log Out</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="card-wrap text-center equal-md-16-9 bg-white">
                                                    <div class="card-body">
                                                        <p class="text-dark fw-light fs-6">Connect with a customer care Representative. <br> <a href="mailto:info@nascocanada.ca"><b>Mail</b></a> or <a href="https://wa.me/message/PGASK7RR2QX3D1"><b>WhatsApp</b></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                </div>
            </div>
        </section>

    </div>


  <script src="https://cube.webuildthemes.com/assets/js/vendor.bundle.js"></script>
  <script src="https://cube.webuildthemes.com/assets/js/index.bundle.js"></script>
  <script src="//code.tidio.co/8xtfxxzxdhc6h2gg58onasl3cgtqy7g2.js" async></script>

</body>

</html>