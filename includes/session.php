<?php
    session_start();

    //$_SESSION['username'] = 'guest';
    //$_SESSION['userid'] = 14;
    $_SESSION['browser_token'] = session_id();

    //echo "%%%%%%%%%%%%%%%%%%%<br />";
    //while (list($key,$value) = each ($_SESSION)) {
            //echo "$key => $value <br />";
    //}
    //echo "%%%%%%%%%%%%%%%%%%%<br />";
    //echo "session_id => " . session_id() . "<br />";
    //echo "unique id => " . uniqid() . "<br />";
    //echo "%%%%%%%%%%%%%%%%%%%<br />";
?>