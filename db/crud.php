<?php
    class crud{
        private $db;

        // constructor to initialize private variable to the db connection
        function __construct($conn) {
            $this->db = $conn;
        }

        // function to insert a new record into the attendee db
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $avatar_path){
            try {
                //$dob = "STR_TO_DATE('$dob','%d-%m-%y')"; STR_TO_DATE is a MySQL Function it does not work in PHP
                //Convert $dob from string to DATE 
                $d = new DateTime($dob);
                $timestamp = $d->getTimestamp();
                $dob = $d->format('Y-m-d');
                //echo "<p>From crud.php ->  formatted_dob = $dob<br></p>";
                $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id,avatar_path) 
                VALUES (:fname, :lname, :dob, :email, :contact, :specialty, :avatar_path)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':avatar_path', $avatar_path);

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
            try {
                    $d = new DateTime($dob);
                    $timestamp = $d->getTimestamp();
                    $dob = $d->format('Y-m-d');
                    $sql ="UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
                    `emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE 
                    attendee_id=:id";
                    $stmt = $this->db->prepare($sql);
                    
                    // bind all placeholders to the actual values
                    $stmt->bindparam(':id', $id);
                    $stmt->bindparam(':fname', $fname);
                    $stmt->bindparam(':lname', $lname);
                    $stmt->bindparam(':dob', $dob);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':contact', $contact);
                    $stmt->bindparam(':specialty', $specialty);

                    $stmt->execute();
                    return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee`a INNER JOIN `specialties`s ON a.SPECIALTY_ID = s.SPECIALTY_ID";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }    
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM attendee a INNER JOIN specialties s ON a.SPECIALTY_ID = s.SPECIALTY_ID where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

        public function deleteAttendee($id){
            try{
                $sql ="DELETE FROM `attendee` WHERE attendee_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;               
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

        public function getSpecialtyById($id){
            try{
                $sql = "SELECT * FROM `specialties` WHERE specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

        public function getMailKeyById($id){
            try{
                $sql = "SELECT * FROM `mailserver` WHERE server_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

    }

?>