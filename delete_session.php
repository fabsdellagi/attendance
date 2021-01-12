<?php 
        //$title = 'Delete Record';
        //require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        if(!$_GET['id']){
            include 'includes/errormessage.php';
            header("Location: custom_view_allrec.php");
        }
        else {
            $id = $_GET['id'];

            // Call Delete function
            $result  = $crud->deleteAttendee($id);
            
            // Redirect to list
            if($result){
                header("Location: custom_view_allrec.php");
            }
            else {
                include 'includes/errormessage.php';
            }
        }     
?>