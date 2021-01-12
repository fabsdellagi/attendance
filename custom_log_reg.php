<?php 
        $title = 'Custom Login & Registration';
        require_once 'includes/header.php';
        //require_once 'includes/custom_header.php';
        require_once 'db/conn.php';

        // Login as 'custom'
        
            $username = 'custom';
            $password = '';
            $new_password = md5($password.$username);

            $result = $user->getUser($username,$new_password);
           
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            
            //echo "%%%%%%%%%%%%%%%%%%%<br />";
            //echo "from custom_log_reg.php token => " . $_SESSION['browser_token'] ."<br />";
            //echo "%%%%%%%%%%%%%%%%%%%<br />";
            header("Location: custom_registration.php");
?>


<?php include_once 'includes/footer.php' ?>