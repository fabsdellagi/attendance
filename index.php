<?php 
        $title = 'Index';
        require_once 'includes/header.php';
        //require_once 'includes/home_header.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties();    
?>
    <!-- 
        - First Name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (DB Admin, SW Developer, Web Admin, Other)
        - Email Address
        - Contact Number
        - Picture
    -->
    <br/>
    <br/>
    <br/>
    <h1 class="text-center">Welcome To The Registration Site Of The IT Conference</h1>
    
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="list-group">
        <a href="custom_log_reg.php" class="list-group-item list-group-item-primary list-group-item-action active" style="font:bold" aria-current="true">
            Click here to register as a New Attendee
        </a>
        <a href="guest_log_view.php" class="list-group-item list-group-item-light list-group-item-action" aria-current="true">
            Click here to list all registered Attendees
        </a>      
    </div>

<!--    <h2 class="text-center" style="color:red;">To proceed please Login <br/> (Username: custom; Password: No Password is required)</h2> -->

    <br/>

<?php
    require_once 'includes/footer.php'; ?>