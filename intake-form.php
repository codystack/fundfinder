
<?php
include './components/dashboardheader.php';
require_once './auth/application.php';
?>
<style>
    .checkmark {
    width: 150px;
    margin: 0 auto;
    }

    .path {
    stroke-dasharray: 1000;
    stroke-dashoffset: 0;
    animation: dash 2s ease-in-out;
    -webkit-animation: dash 2s ease-in-out;
    }

    .spin {
    animation: spin 2s;
    -webkit-animation: spin 2s;
    transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    }

    p {
    font-family: sans-serif;
    color: pink;
    font-size: 30px;
    font-weight: bold;
    margin: 20px auto;
    text-align: center;
    animation: text .5s linear .4s;
    -webkit-animation: text .4s linear .3s;
    }

    @-webkit-keyframes dash {
    0% {
    stroke-dashoffset: 1000;
    }
    100% {
    stroke-dashoffset: 0;
    }
    }

    @keyframes dash {
    0% {
    stroke-dashoffset: 1000;
    }
    100% {
    stroke-dashoffset: 0;
    }
    }

    @-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
    }
    }

    @keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
    }
    }

    @-webkit-keyframes text {
    0% {
        opacity: 0; }
    100% {
        opacity: 1;
    }

    
    @keyframes text {
    0% {
        opacity: 0; }
    100% {
        opacity: 1;
    }
    }
</style>

    <div class="offcanvas-wrap">

        <section class="py-8" style="background: url('assets/images/bg.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 mx-auto">

                        <h4 class="mb-3">Application</h4>

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
                                                    <h3 class="fs-6">Application Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                            $select_query = "SELECT * FROM intake_form WHERE userID ='".$_SESSION['id']."'";
                                            $result = mysqli_query($conn, $select_query);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $status = $row['status'];
                                                }
                                            }
                                        ?>
                                        <div class="card-body bg-white <?php if($status=='Filled'){echo 'd-none';}?>">
                                            
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

                                            <form class="row g-2 g-lg-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

                                            <p class="text-dark fw-light fs-sm"><i class="bi bi-info-circle"></i> <d>Note</d> that only PDF file formats are approved to be uploaded.</p>
                                            
                                                <div class="col-md-12" style="display: none;">
                                                    <label for="inputZip" class="form-label">User ID</label>
                                                    <input type="text" class="form-control" name="userID" value="<? echo $_SESSION['id']; ?>" readonly>
                                                </div>

                                                <div class="col-md-8">
                                                    <label for="inputZip" class="form-label">Project Name</label>
                                                    <input type="text" class="form-control" required name="projectName" placeholder="Project Name">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="inputZip" class="form-label">Amount Needed</label>
                                                    <input type="number" class="form-control" name="amountNeeded" placeholder="Amount Needed">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="inputZip" class="form-label">Location</label>
                                                    <input type="text" class="form-control" name="location" placeholder="Location">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Type of Project</label>
                                                    <input type="text" class="form-control" name="projectType" placeholder="Type of Project">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="inputZip" class="form-label">Referral Name</label>
                                                    <input type="text" class="form-control" name="referralName" placeholder="Referral Name">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputZip" class="form-label">Collateral Tangible Assets That You Currently Own And Willing To Pledge</label>
                                                    <textarea class="form-control" placeholder="Collateral Tangible Assets That You Currently Own And Willing To Pledge" name="tangibleAssets"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="inputZip" class="form-label">Total Investment Injected So Far</label>
                                                    <input type="text" class="form-control" name="totalInvestment" placeholder="Total Investment Injected">
                                                </div>

                                                <div class="col-md-8">
                                                    <label for="inputZip" class="form-label">Maximum You Are Willing To Further Inject Into Your Project</label>
                                                    <input type="text" class="form-control" name="willingToFuther" placeholder="Maximum You Are Willing To Further Inject Into Your Project">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Shovel Ready, Government Approval</label>
                                                    <input type="text" class="form-control" name="governmentApproved" placeholder="Shovel Ready, Government Approval">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Surety Bond Available</label>
                                                    <input type="text" class="form-control" name="suretyBond" placeholder="Surety bond available">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputZip" class="form-label">What issues have you had seeking funding up till now</label>
                                                    <textarea class="form-control" placeholder="What issues have you had seeking funding up till now" name="issues"></textarea>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputCountry" class="form-label">Already Existing</label>
                                                    <select id="inputCountry" class="form-select" name="alreadyExisting">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputZip" class="form-label">If Yes Previous 3 Years Net Income</label>
                                                    <textarea class="form-control" placeholder="If Yes Previous 3 Years Net Income" name="ifYes"></textarea>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputZip" class="form-label">Developers/Promotors/Contractors Experience and Qualifications</label>
                                                    <textarea class="form-control" placeholder="Developers/Promotors/Contractors Experience and Qualifications" name="experiences"></textarea>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="inputZip" class="form-label">Give a short paragraph on funding terms of conditions your seeking</label>
                                                    <textarea class="form-control" placeholder="Give a short paragraph on funding terms of conditions your seeking" name="comment"></textarea>
                                                </div>

                                                <label for="inputZip" class="form-label mb-0">Other supporting document</label>
                                                <div class="col-md-12 input-group mt-0">
                                                    <input type="file" class="form-control" name="executiveSummary">
                                                </div>

                                                <div class="col-md-12 d-grid">
                                                    <button name="intake_btn" type="submit" class="btn btn-lg btn-dark">Submit</button>
                                                </div>

                                                <!-- <div class="row g-2 align-items-center">
                                                    <div class="col-md-6">
                                                        <button name="business_btn" type="submit" class="btn btn-lg btn-with-icon btn-dark">Submit <i class="bi bi-arrow-right-circle"></i></button>
                                                    </div>
                                                    <div class="col-md-6 text-md-end">
                                                        <a href="application-shareholders" type="button" class="btn btn-lg btn-with-icon btn-dark">Next <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div> -->

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

    <?php include "./components/modal.php";?>

    <script src="//code.tidio.co/8xtfxxzxdhc6h2gg58onasl3cgtqy7g2.js" async></script>
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        $(window).load(function(){        
            $('#intakeForm').modal('show');
        });
    </script>

    <script>
        $(function () {
            $('.modal').modal({
            show:true,
            keyboard: false,
            backdrop: 'static'
            });
        });
    </script>
                                                                
</body>

</html>