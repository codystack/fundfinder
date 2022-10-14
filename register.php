<?php
include './components/header.php';
require_once './auth/account.php';
?>

    <section class="bg-black overflow-hidden">
        <div class="d-flex flex-column container level-3 min-vh-100">
            <div class="row align-items-center justify-content-center my-auto">
                <div class="col-md-10 col-lg-8 col-xl-5">
                    <div class="card">
                        <div class="card-header bg-white text-center pb-0">
                            <h5 class="fs-4">Register</h5>
                        </div>
                        
                        <div class="card-body bg-white">
                            <?php
                                if (isset($_SESSION['error_message'])) {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-message text-center">
                                            <?php
                                            echo $_SESSION['error_message'];
                                            session_destroy();
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
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" required name="firstName" placeholder="John">
                                            <label for="floatingInput">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" required name="lastName" placeholder="Doe">
                                            <label for="floatingInput">Last name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" required name="companyName" placeholder="roundupmedia">
                                    <label for="floatingInput">Company name</label>
                                </div>

                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating mb-2">
                                            <input type="email" class="form-control" required name="email" placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-2">
                                            <input type="tel" class="form-control" required name="phone" placeholder="+0156748574">
                                            <label for="floatingInput">Phone number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-2">
                                    <select class="form-select" name="amount" aria-label="Floating label select example">
                                        <option selected>Select Amount</option>
                                        <option value="Over 300k">Over 300k</option>
                                        <option value="100k - 300k">100k - 300k</option>
                                        <option value="50k - 100k">50k - 100k</option>
                                        <option value="25k - 50k">25k - 50k</option>
                                        <option value="10k - 25k">10k - 25k</option>
                                        <option value="5k - 10k">5k - 10k</option>
                                        <option value="Under 5k">Under 5k</option>
                                    </select>
                                    <label for="floatingSelect">How much are you looking for? (CAD)($)</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" required name="date" placeholder="roundupmedia">
                                    <label for="floatingInput">When did you start your business?</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <select class="form-select" name="revenue" aria-label="Floating label select example">
                                        <option selected>Select Amount</option>
                                        <option value="Over 300k">Over 300k</option>
                                        <option value="100k - 300k">100k - 300k</option>
                                        <option value="50k - 100k">50k - 100k</option>
                                        <option value="25k - 50k">25k - 50k</option>
                                        <option value="10k - 25k">10k - 25k</option>
                                        <option value="5k - 10k">5k - 10k</option>
                                        <option value="Under 5k">Under 5k</option>
                                        <option value="Startup / No revenue">Startup / No revenue</option>
                                    </select>
                                    <label for="floatingSelect">How much did you make last month? (CAD)($)</label>
                                </div>

                                <div class="d-grid mb-2">
                                    <button name="register_btn" type="submit" class="btn btn-lg btn-dark">Get Started</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <figure class="background background-overlay" style="background-image: url('https://i.imgur.com/ttUNFYO.jpg')"></figure>
    </section>


    <script src="https://cube.webuildthemes.com/assets/js/vendor.bundle.js"></script>
    <script src="https://cube.webuildthemes.com/assets/js/index.bundle.js"></script>
    <script src="//code.tidio.co/8xtfxxzxdhc6h2gg58onasl3cgtqy7g2.js" async></script>
</body>

</html>