<?php
include './components/dashboardheader.php';
require_once './auth/password.php';
?>

    <div class="offcanvas-wrap">

        <section class="py-8" style="background: url('assets/images/bg.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 mx-auto">

                        <h4 class="mb-3">Welcome, <?php echo $_SESSION['firstName']; ?>!</h4>

                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-opaque-white">
                                        <div class="card-header">
                                            <div class="row g-2 g-xl-5 align-items-center">
                                                <div class="col-md-6">
                                                    <a href="dashboard" class="btn btn-with-icon btn-dark">
                                                        <i class="bi bi-arrow-left"></i> Go Back
                                                    </a>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <h3 class="fs-6">Password</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">
                                            <?php
                                                if (isset($_SESSION['error_message'])) {
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <div class="alert-message text-center">
                                                            <?php
                                                            echo $_SESSION['error_message'];
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    unset($_SESSION['error_message']);
                                                }
                                            ?>
                                            <?php
                                                if (isset($_SESSION['success_message'])) {
                                                    ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <div class="alert-message text-center">
                                                            <?php echo $_SESSION['success_message']; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    unset($_SESSION['success_message']);
                                                }
                                            ?>
                                            <form class="row g-2 g-lg-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                <div class="col-md-12">
                                                    <label for="inputCurrentPass" class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" required id="currentpassword" name="password">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputNewPass" class="form-label">New Password</label>
                                                    <input type="password" name="newPassword" required class="form-control" id="newpassword">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputRepeatNewPass" class="form-label">Repeat New Password</label>
                                                    <input type="password" class="form-control" required name="confirmpassword" id="confirmpassword">
                                                </div>
                                                <div class="d-grid mb-2">
                                                    <button class="btn btn-dark" name="password_change_btn" type="submit">Change password</button>
                                                </div>

                                            </form>
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

    <!-- Password Matching-->
    <script>
        $('#confirmpassword').on('keyup', function () {
            if ($('#newpassword').val() == $('#confirmpassword').val()) {
                $('#message').html('Password matched😜').css('color', 'green');
            } else
                $('#message').html('Password did not match😡').css('color', 'red');
        });
    </script>

</body>

</html>