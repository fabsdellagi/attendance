<?php


    class user{
        // private database object
        private $db;

        // constructor to initialize private variable to the db connection
        function __construct($conn) {
            $this->db = $conn;
        }

        public function insertUser($username, $password, $role){
            try {
                    $result = $this->getUserbyUsername($username);
                    if($result['num'] > 0) {
                        return false;
                    }
                    else {   
                        $new_password = md5($password.$username);            
                        $sql = "INSERT INTO users (username,password,role) VALUES (:uname, :pwd, :role)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':uname', $username);
                        $stmt->bindparam(':pwd', $new_password);
                        $stmt->bindparam(':role', $role);
                        $stmt->execute();
                        return true;
                    }           
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
        }

        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           

        }

        public function getUserbyUsername($username){
            try{
                $sql = "SELECT count(*) AS num FROM users WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
               
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }      
        
        }

        public function getUserRolebyUserId($userId){
            try{
                //$sql = "SELECT role FROM users WHERE id = :userId";
                $sql = "SELECT * FROM users WHERE id = :userId";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':userId', $userId);
               
                $stmt->execute();
                $result = $stmt->fetch();

                //echo "from getUserRolebyUserId: " . $result[0] ."<br />";
                //echo "%%%%%%%%%%%%%%%%%%%<br />";
                //while (list($key,$value) = each ($result)) {
                    //echo "$key => $value <br />";
                //}
                //echo "%%%%%%%%%%%%%%%%%%%<br />";
                
                return $result['role'];
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }      
        
        }
            
    }

?>