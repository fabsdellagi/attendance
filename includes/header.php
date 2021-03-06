<?php
    // This includes the session file. The file contains code that starts/resumes a session
    // By including it in the header file it will be inserted in every web page,
    // allowing session capability to be used on every page across our website
    include_once 'includes/session.php';
    //echo "%%%%%%%%%%%%%%%%%%%<br />";
    //while (list($key,$value) = each ($_SESSION)) {
            //echo "$key => $value <br />";
    //}
    //echo "%%%%%%%%%%%%%%%%%%%<br />";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <!--//CSS from Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />

    <title>Attendance - <?php echo $title ?></title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">IT Conference</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">

                <div class="navbar-nav mr-auto">
<!--
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="registration.php">Registration <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="viewrecords.php">View Attendees</a>
-->
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <?php
                        //var_dump($_SESSION['userid']);
                        if(isset($_SESSION['userid'])) { 
                            if($_SESSION['username'] == 'guest') {  ?>                                    
                                <a class="nav-link" href="guest_view_allrec.php">View Attendees</a>
                      <?php } elseif($_SESSION['username'] == 'custom') { ?>
                                    <a class="nav-link" href="custom_registration.php">Registration <span class="sr-only">(current)</span></a>
                                    <a class="nav-link" href="custom_view_allrec.php">View Attendees</a>
                                    <?php  } else { ?>
                                        <a class="nav-link" href="registration.php">Registration <span class="sr-only">(current)</span></a>
                                        <a class="nav-link" href="viewrecords.php">View Attendees</a>
                                <?php } ?>                       
                    <?php  } ?>

                </div>
                <div class="navbar-nav ml-auto">
                    <?php
                        if(!isset($_SESSION['userid'])){                     
                    ?>
                            <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span><span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    <?php } ?>
                </div>

            </div>
        </nav>
    <div class="container">
    <!-- 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">IT Conference</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="viewrecords.php">View Attendees</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php
                        if(!isset($_SESSION['userid'])){                     
                    ?>
                            <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span><span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    <?php } ?>
                </div>
            </div>
        </nav>
     -->
        <br/>
<!--  

    <h2>Follow each link to the page example</h2>
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="array.php">Simple Array and Printouts</a></li>
    </ul>
-->
    