<?php 
    $title = 'View Record Details';
    
    require_once 'includes/header.php';
    //require_once 'includes/guest_header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $role = $user->getUserRolebyUserId($_SESSION['userid']);


    // Get attendee by id
    if(!isset($_GET['id'])){
        //echo "<h1 class='text-danger'>Please check details and try again</h1>";
        include 'includes/errormessage.php';
        
    } else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>   
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.PNG" : $result['avatar_path']; ?>" class="rounded-circle" style="width: 20%; height: 20%" />

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . " " . $result['lastname'] . " (" . $result['nickname'] .")"; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name']; ?>
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $result['dateofbirth']; ?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $result['emailaddress']; ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $result['contactnumber']; ?>
            </p>
                
        </div>
    </div>
    <br/>
    
    <?php
        if( $role !== 'readOnly')  { 
    ?>
                <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
    <?php }
        else {        
    ?> 
                <a href="guest_view_allrec.php" class="btn btn-info">Back to List</a>
                <button href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning" role="button" disabled>Edit</button>
        <?php } ?>


    <?php
        if( $role == 'admin')  { 
    ?>
            <a onclick="return confirm('Are you sure you want to delete this record?')"                          
                        href="delete.php?id=<?php echo $result['attendee_id'] ?>" 
                        class="btn btn-danger"  role="button">Delete</a>
    <?php   }
            else {
    ?>
            <!-- Next MUST be <button !! because if replaced by <a it DOESN'T WORK !!!!   --> 
            <button onclick="return confirm('Are you sure you want to delete this record?')"                          
                        href="delete.php?id=<?php echo $result['attendee_id'] ?>" 
                        class="btn btn-danger"  role="button" disabled>Delete</button>       
            <?php } ?>

    
<?php } ?>

<br/>
<br/>
<br/>
<?php
    require_once 'includes/footer.php'; ?>