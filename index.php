<?php 
        $title = 'Index';
        require_once 'includes/header.php';
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
    -->
    <h1 class="text-center">Registration for IT Conference</h1>
    
    <br/>
    <br/>
<!-- <form method="get" action="success.php"> -->
    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input required type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input required type="text" class="form-control" id="lastName"  name="lastName">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                    <option value=<?php echo $r['specialty_id']?>><?php echo $r['name']?></option>
                <?php }?>
            
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" name="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
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
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
<!--  
    <button type="button" class="btn btn-dark">CLICK ME!</button>
    <button type="button" class="btn btn-primary">CLICK ME!</button>
    <button type="button" class="btn btn-success">CLICK ME!</button>
    <a href="https://www.heroku.com" target="_blank" class="btn btn-danger">Heroku.com</a>
-->
<br/>
<br/>

<?php
    require_once 'includes/footer.php'; ?>