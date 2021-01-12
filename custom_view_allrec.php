<?php 
    $title = 'View Session Records';
    require_once 'includes/header.php';
    //require_once 'includes/custom_header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    require_once 'db/user.php';

    //echo "%%%%%%%%%%%%%%%%%%%<br />";
    //echo " from custom_view_allrec.php browser_token => " . $_SESSION['browser_token'] . "<br />";
    //echo "%%%%%%%%%%%%%%%%%%%<br />";

    // The following $role is UNNECESSARY here !!! Taken out
    //$role = $user->getUserRolebyUserId($_SESSION['userid']);

    //while (list($key,$value) = each ($r)) {
        //echo "$key => $value <br />";}
    //foreach ($results as $row) {
            //echo "id =  $row";}   
/*
    try{
        //echo " before select stm: </br>";
        $sql = "SELECT count(*) AS num FROM attendee a  WHERE a.session_id = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(':token', $_SESSION['browser_token']);
        //echo " before execute stm: </br>";
        $stmt->execute();
        //echo " after execute stm: </br>";
        $attendee_count = $stmt->fetch(PDO::FETCH_ASSOC);
        // The count(*) is stored in  $attendee_count['num'];
        // Alternative way to get count(*) is to use the fetchColumn() method
        //$result = $stmt->fetchColumn();
        //echo $result;
 
        } catch (PDOException $e) {
                echo $e->getMessage();
        }
*/
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Nickname</th>
            <th>First Name</th>
            <th>Last Name</th>

            <th>Specialty</th>
            <th>Actions</th>
        </tr>

<?php 
                $results = $crud->getAttendeesbySession($_SESSION['browser_token']);         
                while ($r = $results->fetch(PDO::FETCH_ASSOC)) { 

?>
        <tr>
                    <td><?php echo $r['attendee_id'] ?></td>
                    <td><?php echo $r['nickname'] ?></td>
                    <td><?php echo $r['firstname'] ?></td>
                    <td><?php echo $r['lastname'] ?></td> 

                    <!-- The following works ONLY if $sql = "SELECT * FROM ....."
                             it WON'T work if $sql = "SELECT col1, col2, ..... FROM ...."
                    --> 
                    <td><?php echo $r['name'] ?></td>   

                    <td>
                        <a href="view_session.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a> 
                        <a href="edit_session.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this record?')"                          
                                href="delete_session.php?id=<?php echo $r['attendee_id'] ?>" 
                                class="btn btn-danger"  role="button">Delete</a>     
                    </td>
        </tr>
          <?php } ?>
                   
        
    </table>

<br/>
<br/>

<?php
    require_once 'includes/footer.php'; ?>