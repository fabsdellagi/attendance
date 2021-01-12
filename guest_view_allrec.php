<?php 
    $title = 'View Records';
    require_once 'includes/header.php';
    //require_once 'includes/guest_header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    require_once 'db/user.php';

    $role = $user->getUserRolebyUserId($_SESSION['userid']);
    //if( $role == 'admin')  { 
        //$isDeleteDisabled = 'false';
        //echo 'role = '. $role . ',  flag = ' .$isDeleteDisabled . '</br>';
    //} 
    //else {
        //$isDeleteDisabled = 'true';
        //echo 'role = '. $role . ', flag = ' .$isDeleteDisabled . '</br>';
    //}

    // Get all attendees
    $results = $crud->getAttendees();
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Nickname</th>
            <th>First Name</th>
            <th>Last Name</th>
<!--  
            <th>Date Of Birth</th>
            <th>Email Address</th>
            <th>Contact Number</th>
-->
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <td><?php echo $r['attendee_id'] ?></td>
                <td><?php echo $r['nickname'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
<!-- 
                <td><?php echo $r['dateofbirth'] ?></td>
                <td><?php echo $r['emailaddress'] ?></td>
                <td><?php echo $r['contactnumber'] ?></td>
-->
                <td><?php echo $r['name'] ?></td>             
                <td>
<!--                    <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>  -->
                
                <?php
                     if( $role !== 'readOnly')  { 
                ?> 
                        <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a> 
                        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>  
                <?php }
                    else {
                ?>
                        <a href="guest_view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a> 
                        <button href="edit.php?id=<?php echo $r['attendee_id'] ?>" 
                                class="btn btn-warning" role="button" disabled>Edit</button>
                <?php } ?>
   
                <?php
                     if( $role == 'admin')  { 
                ?>
                        <a onclick="return confirm('Are you sure you want to delete this record?')"                          
                            href="delete.php?id=<?php echo $r['attendee_id'] ?>" 
                            class="btn btn-danger"  role="button">Delete</a>
                <?php }
                else {
                ?>
                <!-- Next MUST be <button !! because if replaced by <a it DOESN'T WORK !!!!   --> 
                        <button onclick="return confirm('Are you sure you want to delete this record?')"                          
                            href="delete.php?id=<?php echo $r['attendee_id'] ?>" 
                            class="btn btn-danger"  role="button" disabled>Delete</button>       
                <?php } ?>
                
<!--
                    <?php                         
                        //$role = $user->getUserRolebyUserId($_SESSION['userid']);
                        //echo "Session UserId, role:" . $_SESSION['userid'].",". $role[0] . "</br>";
                        //if( $role[0] == 'admin')  { 
                        if( $role == 'admin')  { 
                            //echo "if statement true User is admin </br>";
                    ?>
                   <?php } ?>  
-->
<!--
                    <a onclick="return confirm('Are you sure you want to delete this record?')"                          
                        href="delete.php?id=<?php echo $r['attendee_id']; ?>" 
                        class="btn btn-danger" tabindex="-1" role="button" 
                        aria-disabled="<?php echo $isDeleteDisabled ?'true':''; ?>">Delete</a> 
-->
                                        
                </td>
            </tr>
    <?php }   ?>  
        
    </table>

<br/>
<br/>

<?php
    require_once 'includes/footer.php'; ?>