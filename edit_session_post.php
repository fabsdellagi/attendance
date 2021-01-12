<?php 
    $title = 'Edit Session Post';
    require_once 'includes/header.php'; 
    //require_once 'includes/custom_header.php'; 
    require_once 'db/conn.php';

    // Get values from POST operation

    if(isset($_POST['submit'])){
        // extract values from $_POST array
        $id = $_POST['id'];
        $n_name = $_POST['nickName'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        // Call Crud function to update data into db
        //echo "before editAttendee: id,nickName,firstN,latN,dob,email,phone,specialty: </br>";
        //echo "$id | $n_name | $fname | $lname | $dob | $email | $contact | $specialty  </br>";
        $result = $crud->editAttendee($n_name, $fname, $lname, $dob, $email, $contact, $specialty);
        //echo "</br>after editAttendee </br>";
        // Riderect to index.php
        if($result){
            header("Location: custom_view_allrec.php");
        }
        else {
            include 'includes/errormessage.php';
        }
    }
    else {
        include 'includes/errormessage.php';
    }

?>