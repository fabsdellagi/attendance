<?php 
        $title = 'Edit Session\'s Record';
        require_once 'includes/header.php';
        //require_once 'includes/custom_header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties();

        if(!isset($_GET['id'])){
            // echo Error Msg
            include 'includes/errormessage.php';
            header("Location: viewsessionrecords.php");
        } 
        else {
            $id = $_GET['id'];
            $attendee  = $crud->getAttendeeDetails($id);       
?>

    <h1 class="text-center">Edit Session's Record</h1>
    
    <br/>
    <br/>

    <form method="post" action="edit_session_post.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />
        <div class="form-group">
            <label for="nickName">Nickname</label>
            <input type="text" class="form-control" readonly value="<?php echo $attendee['nickname']?>" name="nickName">
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>"  name="lastName">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>" 
                        <?php if( $r['specialty_id'] == $attendee['specialty_id']) echo 'selected'  ?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php }?>
            
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" name="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" name="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" name="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
    <!-- 
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
     -->
        <a href="custom_view_allrec.php" class="btn btn-dark">Back To List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>

    <?php } ?>

<br/>
<br/>
<br/>
<br/>

<?php
    require_once 'includes/footer.php'; ?>