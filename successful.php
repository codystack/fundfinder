<?php
session_start();

require_once "config/db.php";

if (!isset($_SESSION['email'])) {
    header('location: register');
}

if (isset($_GET['close'])) {
  session_destroy();
  unset($_SESSION['email']);
  header("location: login");
}

include './components/header.php';
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

  <section class="bg-black overflow-hidden vh-100">
    <div class="d-flex flex-column container level-3 min-vh-100">
      <div class="row align-items-center justify-content-center my-auto">
        <div class="col-md-10 col-lg-8 col-xl-5">
            <div class="card">
                <div class="card-body text-center bg-white">
                    <div class="checkmark">
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

                    <h5 class="fs-4 mt-2">Application Successful</h5>
                    <p class="text-dark fw-light fs-6">Hello! <span class="fw-bold"><?php echo $_SESSION['firstName']; ?>,</span> your submission was successful, one of our agents will contact in regards to your financial funding. </p>
                    <a href="./" type="button" class="btn btn-lg btn-dark">Go Back</a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <figure class="background background-overlay" style="background-image: url('https://i.imgur.com/ttUNFYO.jpg')">
    </figure>
  </section>


  <script src="https://cube.webuildthemes.com/assets/js/vendor.bundle.js"></script>
  <script src="https://cube.webuildthemes.com/assets/js/index.bundle.js"></script></body>

</html>