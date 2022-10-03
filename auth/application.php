<?php
session_start();
// Connect database
include "./config/db.php";

// Intake script
if (isset($_POST['intake_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $projectName = $conn->real_escape_string($_POST['projectName']);
    $amountNeeded = $conn->real_escape_string($_POST['amountNeeded']);
    $location = $conn->real_escape_string($_POST['location']);
    $projectType = $conn->real_escape_string($_POST['projectType']);
    $referralName = $conn->real_escape_string($_POST['referralName']);
    $tangibleAssets = $conn->real_escape_string($_POST['tangibleAssets']);
    $totalInvestment = $conn->real_escape_string($_POST['totalInvestment']);
    $willingToFuther = $conn->real_escape_string($_POST['willingToFuther']);
    $governmentApproved = $conn->real_escape_string($_POST['governmentApproved']);
    $suretyBond = $conn->real_escape_string($_POST['suretyBond']);
    $issues = $conn->real_escape_string($_POST['issues']);
    $alreadyExisting = $conn->real_escape_string($_POST['alreadyExisting']);
    $ifYes = $conn->real_escape_string($_POST['ifYes']);
    $experiences = $conn->real_escape_string($_POST['experiences']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $executiveSummary_path = $conn->real_escape_string('upload/'.$_FILES['executiveSummary']['name']);
    $status = $conn->real_escape_string($_POST['status']);

    if (file_exists($executiveSummary_path)) {
        $executiveSummary_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['executiveSummary']['name']);
    }

    $checker = 0;

    //make sure file type is pdf
    if (preg_match("!pdf!", $_FILES['executiveSummary']['type'])) {
        $checker ++;
    }
    if ($checker < 1) { 
        exit;
    }


    $check_form_query = "SELECT * FROM intake_form WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=intake-form'>";
    }else {
        // Finally, insert intake informations if there are no errors in the form
        $query = "INSERT INTO intake_form (userID, projectName, amountNeeded, location, projectType, referralName, tangibleAssets, totalInvestment, willingToFuther, governmentApproved, suretyBond, issues, alreadyExisting, ifYes, experiences, comment, executiveSummary, status) 
  			        VALUES('$userID', '$projectName', '$amountNeeded', '$location', '$projectType', '$referralName', '$tangibleAssets', '$totalInvestment', '$willingToFuther', '$governmentApproved', '$suretyBond', '$issues', '$alreadyExisting', '$ifYes', '$experiences', '$comment', '$executiveSummary_path', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            //copy image to upload folder
            copy($_FILES['executiveSummary']['tmp_name'], $executiveSummary_path);

            $_SESSION['success_message'] = "Business Infromation Completed!";
            echo "<meta http-equiv='refresh' content='0; URL=application-completed'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=intake-form'>";
        }
    }
}

// Business script
if (isset($_POST['business_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $titleHeld = $conn->real_escape_string($_POST['titleHeld']);
    $companyAddress = $conn->real_escape_string($_POST['companyAddress']);
    $telephone = $conn->real_escape_string($_POST['telephone']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $fax = $conn->real_escape_string($_POST['fax']);
    $companyPrincipalBusiness = $conn->real_escape_string($_POST['companyPrincipalBusiness']);
    $yearsInBusiness = $conn->real_escape_string($_POST['yearsInBusiness']);
    $typeOfCompany = $conn->real_escape_string($_POST['typeOfCompany']);
    $ownershipStructure = $conn->real_escape_string($_POST['ownershipStructure']);
    $numberOfYearsInBusiness = $conn->real_escape_string($_POST['numberOfYearsInBusiness']);
    $companySize = $conn->real_escape_string($_POST['companySize']);
    $stockExchange = $conn->real_escape_string($_POST['stockExchange']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_form_query = "SELECT * FROM business WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application'>";
    }else {
        // Finally, insert business informations if there are no errors in the form
        $query = "INSERT INTO business (userID, companyName, titleHeld, companyAddress, telephone, mobile, fax, companyPrincipalBusiness, yearsInBusiness, typeOfCompany, ownershipStructure, numberOfYearsInBusiness, companySize, stockExchange, status) 
  			        VALUES('$userID', '$companyName', '$titleHeld', '$companyAddress', '$telephone', '$mobile', '$fax', '$companyPrincipalBusiness', '$yearsInBusiness', '$typeOfCompany', '$ownershipStructure', '$numberOfYearsInBusiness', '$companySize', '$stockExchange', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Business Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application'>";
        }
    }
}



// Shareholder script
if (isset($_POST['shareholder_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $shareholderOne = $conn->real_escape_string($_POST['shareholderOne']);
    $shareholderOnePercentage = $conn->real_escape_string($_POST['shareholderOnePercentage']);
    $shareholderTwo = $conn->real_escape_string($_POST['shareholderTwo']);
    $shareholderTwoPercentage = $conn->real_escape_string($_POST['shareholderTwoPercentage']);
    $shareholderThree = $conn->real_escape_string($_POST['shareholderThree']);
    $shareholderThreePercentage = $conn->real_escape_string($_POST['shareholderThreePercentage']);
    $shareholderFour = $conn->real_escape_string($_POST['shareholderFour']);
    $shareholderFourPercentage = $conn->real_escape_string($_POST['shareholderFourPercentage']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_form_query = "SELECT * FROM shareholders WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application-shareholders'>";
    }else {
        // Finally, insert shareholders informations if there are no errors in the form
        $query = "INSERT INTO shareholders (userID, shareholderOne, shareholderOnePercentage, shareholderTwo, shareholderTwoPercentage, shareholderThree, shareholderThreePercentage, shareholderFour, shareholderFourPercentage, status) 
  			        VALUES('$userID', '$shareholderOne', '$shareholderOnePercentage', '$shareholderTwo', '$shareholderTwoPercentage', '$shareholderThree', '$shareholderThreePercentage', '$shareholderFour', '$shareholderFourPercentage', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Shareholders Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application-shareholders'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application-shareholders'>";
        }
    }
}


// Directors script
if (isset($_POST['directors_profile_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $directorOne = $conn->real_escape_string($_POST['directorOne']);
    $directorOneProfessionalQualification = $conn->real_escape_string($_POST['directorOneProfessionalQualification']);
    $directorOneCountryOfOrigin = $conn->real_escape_string($_POST['directorOneCountryOfOrigin']);
    $directorOneYearOfExperience = $conn->real_escape_string($_POST['directorOneYearOfExperience']);
    $directorTwo = $conn->real_escape_string($_POST['directorTwo']);
    $directorTwoProfessionalQualification = $conn->real_escape_string($_POST['directorTwoProfessionalQualification']);
    $directorTwoCountryOfOrigin = $conn->real_escape_string($_POST['directorTwoCountryOfOrigin']);
    $directorTwoYearOfExperience = $conn->real_escape_string($_POST['directorTwoYearOfExperience']);
    $directorThree = $conn->real_escape_string($_POST['directorThree']);
    $directorThreeProfessionalQualification = $conn->real_escape_string($_POST['directorThreeProfessionalQualification']);
    $directorThreeCountryOfOrigin = $conn->real_escape_string($_POST['directorThreeCountryOfOrigin']);
    $directorThreeYearOfExperience = $conn->real_escape_string($_POST['directorThreeYearOfExperience']);
    $directorFour = $conn->real_escape_string($_POST['directorFour']);
    $directorFourProfessionalQualification = $conn->real_escape_string($_POST['directorFourProfessionalQualification']);
    $directorFourCountryOfOrigin = $conn->real_escape_string($_POST['directorFourCountryOfOrigin']);
    $directorFourYearOfExperience = $conn->real_escape_string($_POST['directorFourYearOfExperience']);
    $directorFive = $conn->real_escape_string($_POST['directorFive']);
    $directorFiveProfessionalQualification = $conn->real_escape_string($_POST['directorFiveProfessionalQualification']);
    $directorFiveCountryOfOrigin = $conn->real_escape_string($_POST['directorFiveCountryOfOrigin']);
    $directorFiveYearOfExperience = $conn->real_escape_string($_POST['directorFiveYearOfExperience']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_form_query = "SELECT * FROM directors WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application-directors-profile'>";
    }else {
        // Finally, insert shareholders informations if there are no errors in the form
        $query = "INSERT INTO directors (userID, directorOne, directorOneProfessionalQualification, directorOneCountryOfOrigin, directorOneYearOfExperience, directorTwo, directorTwoProfessionalQualification, directorTwoCountryOfOrigin, directorTwoYearOfExperience, directorThree, directorThreeProfessionalQualification, directorThreeCountryOfOrigin, directorThreeYearOfExperience, directorFour, directorFourProfessionalQualification, directorFourCountryOfOrigin, directorFourYearOfExperience, directorFive, directorFiveProfessionalQualification, directorFiveCountryOfOrigin, directorFiveYearOfExperience, status) 
  			        VALUES('$userID', '$directorOne', '$directorOneProfessionalQualification', '$directorOneCountryOfOrigin', '$directorOneYearOfExperience','$directorTwo', '$directorTwoProfessionalQualification', '$directorTwoCountryOfOrigin', '$directorTwoYearOfExperience','$directorThree', '$directorThreeProfessionalQualification', '$directorThreeCountryOfOrigin', '$directorThreeYearOfExperience','$directorFour', '$directorFourProfessionalQualification', '$directorFourCountryOfOrigin', '$directorFourYearOfExperience','$directorFive', '$directorFiveProfessionalQualification', '$directorFiveCountryOfOrigin', '$directorFiveYearOfExperience', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Directors Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application-directors-profile'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application-directors-profile'>";
        }
    }
}



// Management script
if (isset($_POST['management_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $firstNameDesignation = $conn->real_escape_string($_POST['firstNameDesignation']);
    $secondName = $conn->real_escape_string($_POST['secondName']);
    $secondNameDesignation = $conn->real_escape_string($_POST['secondNameDesignation']);
    $thirdName = $conn->real_escape_string($_POST['thirdName']);
    $thirdNameDesignation = $conn->real_escape_string($_POST['thirdNameDesignation']);
    $fourthName = $conn->real_escape_string($_POST['fourthName']);
    $fourthNameDesignation = $conn->real_escape_string($_POST['fourthNameDesignation']);
    $fifthName = $conn->real_escape_string($_POST['fifthName']);
    $fifthNameDesignation = $conn->real_escape_string($_POST['fifthNameDesignation']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_form_query = "SELECT * FROM management WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application-management'>";
    }else {
        // Finally, insert shareholders informations if there are no errors in the form
        $query = "INSERT INTO management (userID, firstName, firstNameDesignation, secondName, secondNameDesignation, thirdName, thirdNameDesignation, fourthName, fourthNameDesignation, fifthName, fifthNameDesignation, status) 
  			        VALUES('$userID', '$firstName', '$firstNameDesignation', '$secondName', '$secondNameDesignation', '$thirdName', '$thirdNameDesignation', '$fourthName', '$fourthNameDesignation', '$fifthName', '$fifthNameDesignation', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Management Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application-management'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application-management'>";
        }
    }
}


// Finance script
if (isset($_POST['finance_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $companyAuditor = $conn->real_escape_string($_POST['companyAuditor']);
    $auditorPhone = $conn->real_escape_string($_POST['auditorPhone']);
    $auditorAddress = $conn->real_escape_string($_POST['auditorAddress']);
    $firstFinanciersName = $conn->real_escape_string($_POST['firstFinanciersName']);
    $firstFinanciersAddress = $conn->real_escape_string($_POST['firstFinanciersAddress']);
    $firstFinanciersBankCntact = $conn->real_escape_string($_POST['firstFinanciersBankCntact']);
    $firstFinanciersPhone = $conn->real_escape_string($_POST['firstFinanciersPhone']);
    $secondFinanciersName = $conn->real_escape_string($_POST['secondFinanciersName']);
    $secondFinanciersAddress = $conn->real_escape_string($_POST['secondFinanciersAddress']);
    $secondFinanciersBankContact = $conn->real_escape_string($_POST['secondFinanciersBankContact']);
    $secondFinanciersPhone = $conn->real_escape_string($_POST['secondFinanciersPhone']);
    $status = $conn->real_escape_string($_POST['status']);

    

    $check_form_query = "SELECT * FROM finance WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_form_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application-finance'>";
    }else {
        // Finally, insert shareholders informations if there are no errors in the form
        $query = "INSERT INTO finance (userID, companyAuditor, auditorPhone, auditorAddress, firstFinanciersName, firstFinanciersAddress, firstFinanciersBankCntact, firstFinanciersPhone, secondFinanciersName, secondFinanciersAddress, secondFinanciersBankContact, secondFinanciersPhone, status) 
  			        VALUES('$userID', '$companyAuditor', '$auditorPhone', '$auditorAddress', '$firstFinanciersName', '$firstFinanciersAddress', '$firstFinanciersBankCntact', '$firstFinanciersPhone', '$secondFinanciersName', '$secondFinanciersAddress', '$secondFinanciersBankContact', '$secondFinanciersPhone', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Finance Infromation Completed!";
            echo "<meta http-equiv='refresh' content='3; URL=application-finance'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application-finance'>";
        }
    }
}


// Upload script
if (isset($_POST['upload_btn'])) {

    $userID = $conn->real_escape_string($_POST['userID']);
    $executiveSummary_path = $conn->real_escape_string('upload/'.$_FILES['executiveSummary']['name']);
    $totalSources_path  = $conn->real_escape_string('upload/'.$_FILES['totalSources']['name']);
    $usesOfFunds_path  = $conn->real_escape_string('upload/'.$_FILES['usesOfFunds']['name']);
    $proformas_path  = $conn->real_escape_string('upload/'.$_FILES['proformas']['name']);
    $profileOfSponsors_path  = $conn->real_escape_string('upload/'.$_FILES['profileOfSponsors']['name']);
    $profileOfDevelopers_path  = $conn->real_escape_string('upload/'.$_FILES['profileOfDevelopers']['name']);
    $profileOfContractor_path  = $conn->real_escape_string('upload/'.$_FILES['profileOfContractor']['name']);
    $status = $conn->real_escape_string($_POST['status']);

    if (file_exists($executiveSummary_path)) {
        $executiveSummary_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['executiveSummary']['name']);
    }

    if (file_exists($totalSources_path)) {
        $totalSources_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['totalSources']['name']);
    }

    if (file_exists($usesOfFunds_path)) {
        $usesOfFunds = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['usesOfFunds']['name']);
    }

    if (file_exists($proformas_path)) {
        $proformas_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['proformas']['name']);
    }

    if (file_exists($profileOfSponsors_path)) {
        $profileOfSponsors_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['profileOfSponsors']['name']);
    }

    if (file_exists($profileOfDevelopers_path)) {
        $profileOfDevelopers_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['profileOfDevelopers']['name']);
    }

    if (file_exists($profileOfContractor_path)) {
        $profileOfContractor_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['profileOfContractor']['name']);
    }

    $checker = 0;

    //make sure file type is image
    if (preg_match("!pdf!", $_FILES['executiveSummary']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['totalSources']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['usesOfFunds']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['proformas']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['profileOfSponsors']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['profileOfDevelopers']['type'])) {
        $checker ++;
    }
    if (preg_match("!pdf!", $_FILES['profileOfContractor']['type'])) {
        $checker ++;
    }
    if ($checker < 7) { 
        exit;
    }

    $check_user_query = "SELECT * FROM upload WHERE userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<meta http-equiv='refresh' content='5; URL=application-uploads'>";
    }else {
        // Finally, insert the information if there are no errors in the form
        $query = "INSERT INTO upload (userID, executiveSummary, totalSources, usesOfFunds, proformas, profileOfSponsors, profileOfDevelopers, profileOfContractor, status) 
  			        VALUES('$userID', '$executiveSummary_path', '$totalSources_path', '$usesOfFunds_path', '$proformas_path', '$profileOfSponsors_path', '$profileOfDevelopers_path', '$profileOfContractor_path', 'Filled')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            //copy image to upload folder
            copy($_FILES['executiveSummary']['tmp_name'], $executiveSummary_path);
            copy($_FILES['totalSources']['tmp_name'], $totalSources_path);
            copy($_FILES['usesOfFunds']['tmp_name'], $usesOfFunds_path);
            copy($_FILES['proformas']['tmp_name'], $proformas_path);
            copy($_FILES['profileOfSponsors']['tmp_name'], $profileOfSponsors_path);
            copy($_FILES['profileOfDevelopers']['tmp_name'], $profileOfDevelopers_path);
            copy($_FILES['profileOfContractor']['tmp_name'], $profileOfContractor_path);

            $_SESSION['success_message'] = "Upload Infromation Completed!";
            echo "<meta http-equiv='refresh' content='0; URL=application-completed'>";
        }else {
            $_SESSION['error_message'] = "Error processing application".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=application-uploads'>";
        }
    }
}
