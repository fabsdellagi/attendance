<?php 
    $title = 'Edit Post';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    // Get values from POST operation

    if(isset($_POST['submit'])){
        // extract values from $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        // Call Crud function to update data into db
        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
        
        // Riderect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
        else {
            include 'includes/errormessage.php';
        }
    }
    else {
        include 'includes/errormessage.php';
    }

?>