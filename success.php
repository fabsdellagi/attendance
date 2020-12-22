<?php 
        $title = 'Success';

        require_once 'includes/header.php'; 
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';
        require_once 'sendemail.php';

        if(isset($_POST['submit'])){
            // extract values from $_POST array
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $specialty = $_POST['specialty'];
            // Call function to insert and track if success or not
            // echo "<p>From success.php: dob = $dob<br></p>";
            $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
            $specialtyName = $crud->getSpecialtyById($specialty);
            
            if($isSuccess){
                //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
                // The SendMail call works only on localhost, it is NOT enabled on Hiroku
                // as they ask to submit your Credit Card (DO NOT do it for obvious reasons)
                SendEmail::SendMail($crud, $email, 'Welcome to IT Conference 2020', 'You have successfully registered to this year\'s IT Conference');
                include 'includes/successmessage.php';
            }
            else{
                include 'includes/errormessage.php';
            }
        }
?>
<!--  
    <h1 class="text-center text-success">You Have Been Registered!</h1>
-->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstName'] . " " . $_POST['lastName']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name']; ?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['phone']; ?>
            </p>
            
        </div>
    </div>

<!--  This prints out values that were passed to the action page using method "get"
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_GET['firstName'] . " " . $_GET['lastName']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_GET['specialty']; ?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $_GET['dob']; ?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $_GET['email']; ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_GET['phone']; ?>
            </p>
            
        </div>
    </div>
-->
<!--  
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
    <?php
        echo $_GET['firstName'] . " " . $_GET['lastName'];
        echo "<br/>";
        echo $_GET['dob'];
        echo "<br/>";
        echo $_GET['specialty'];
        echo "<br/>";
        echo $_GET['email'];
        echo "<br/>";
        echo $_GET['phone'];

    ?>
-->

<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>