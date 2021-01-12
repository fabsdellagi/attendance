<?php 
        $title = 'Custom Login & Registration';
        require_once 'includes/header.php';
        //require_once 'includes/guest_header.php';
        require_once 'db/conn.php';

        // Login as 'custom'
        
            $username = 'guest';
            $password = '';
            $new_password = md5($password.$username);

            $result = $user->getUser($username,$new_password);
           
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            
            //$login_id = uniqid();
            //echo "%%%%%%%%%%%%%%%%%%%<br />";
            //echo " from guest_log_view.php unique id => " . $login_id . "<br />";
            //echo "%%%%%%%%%%%%%%%%%%%<br />";

            header("Location: guest_view_allrec.php");
?>


<?php include_once 'includes/footer.php' ?>