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

            $orig_file = $_FILES['avatar']['tmp_name'];
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            //$destination = $target_dir . basename($_FILES['avatar']['name']);
            $destination = "$target_dir$contact.$ext";

            //print_r($_FILES);
            //echo "%%%%%%%%%%%%%%%%%%%<br />";
            //while (list($var,$value) = each ($_FILES['avatar'])) {
            //    echo "$var => $value <br />";
            //}
            //echo "orig_file => $orig_file <br />";
            //echo "target_dir => $target_dir <br />";
            //echo "destination => $destination <br />";
            //echo "%%%%%%%%%%%%%%%%%%%<br />";
            //exit();
            
            // before calling next line insert the checks from YouTube video 'File upload in PHP'
            move_uploaded_file($orig_file,$destination);
            //echo "After call to move_uploaded_file<br />";
            //echo "%%%%%%%%%%%%%%%%%%%<br />";

            // Call function to insert and track if success or not
            // echo "<p>From success.php: dob = $dob<br></p>";
            $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty,$destination);
            $specialtyName = $crud->getSpecialtyById($specialty);
            
            if($isSuccess){
                //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
                // The SendMail call works only on localhost, it is NOT enabled on Heroku
                // as they ask to submit your Credit Card (DO NOT do it for obvious reasons)
                //SendEmail::SendMail($crud, $email, 'Welcome to IT Conference 2020', 'You have successfully registered to this year\'s IT Conference');
                include 'includes/successmessage.php';
            }
            else{
                include 'includes/errormessage.php';
            }
        }
?>

<h1 class="text-center text-success">You Have Successfully Been Registered!</h1>

<!-- This prints out values that were passed to the action page using method = "post" -->
    <img src="<?php echo $destination ?>" class="rounded-circle" style="width: 20%; height: 20%" />
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

<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>