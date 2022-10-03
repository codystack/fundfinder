
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
                                                    <h3 class="fs-6">Senior Management Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                            $select_query = "SELECT * FROM management WHERE userID ='".$_SESSION['id']."'";
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

                                            <form class="row g-2 g-lg-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                            
                                                <div class="col-md-12" style="display: none;">
                                                    <label for="inputZip" class="form-label">User ID</label>
                                                    <input type="text" class="form-control" required name="userID" value="<? echo $_SESSION['id']; ?>" readonly>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="firstNameDesignation" placeholder="First Name Designation">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Second Name</label>
                                                    <input type="text" class="form-control" name="secondName" placeholder="Second Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="secondNameDesignation" placeholder="Second Name Designation">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Third Name</label>
                                                    <input type="text" class="form-control" name="thirdName" placeholder="Third Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="thirdNameDesignation" placeholder="Third Name Designation">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Fourth Name</label>
                                                    <input type="text" class="form-control" name="fourthName" placeholder="Fourth Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="fourthNameDesignation" placeholder="Fourth Name Designation">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Fifth Name</label>
                                                    <input type="text" class="form-control" name="fifthName" placeholder="Fifth Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="fifthNameDesignation" placeholder="Fifth Name Designation">
                                                </div>

                                                <div class="row g-2 align-items-center">
                                                    <div class="col-md-6">
                                                        <button name="management_btn" type="submit" class="btn btn-lg btn-with-icon btn-dark">Submit <i class="bi bi-arrow-right-circle"></i></button>
                                                    </div>
                                                    <div class="col-md-6 text-md-end">
                                                        <a href="application-finance" type="button" class="btn btn-lg btn-with-icon btn-dark">Next <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>

                                        <div class="card-body bg-white text-center <?php if($status==''){echo 'd-none';}else{ echo'd-unset';}?>">
                                            <div class="checkmark mt-2">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                                    <path class="path" fill="none" stroke="#0f9372" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                                        c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                                        c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                                                    <circle class="path" fill="none" stroke="#0f9372" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                                                    <polyline class="path" fill="none" stroke="#0f9372" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
                                                        74.1,108.4 48.2,86.4 "/>

                                                    <circle class="spin" fill="none" stroke="#0f9372" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
                                                </svg>
                                            </div>
                                            <h5 class="fs-6 mt-2">Senior Management Information Uploaded Successfully</h5>
                                            <p class="text-dark fw-light fs-6 mb-5">Hello! <span class="fw-bold"><?php echo $_SESSION['firstName']; ?>,</span> your Senior Management Information was uploaded successfully, <br>click on the button below to proceed to the next form.</p>
                                            <a href="application-finance" type="button" class="btn btn-lg btn-with-icon btn-dark mb-3">Next <i class="bi bi-arrow-right"></i></a>
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


    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/main.js"></script>
                                                                
</body>

</html>