<?php
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    require_once 'vendor/autoload.php';

    class SendEmail {

        public static function SendMail($crud,$to, $subject, $content){
            $id=1;
            $r=$crud->getMailKeyById($id);
            //$emailprovider=$r['provider'];
            $key=$r['apikey'];
            //echo "from SendMail emailprovider, key: $emailprovider, $key";

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("fabsdellagi@gmail.com","Fabio Dellagiacoma");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);
            //$email->addContent("text/html",$content);

            $sendgrid = new \SendGrid($key);

            try{ 
                $response = $sendgrid->send($email);              
                return $response;
            } catch (PDOException $e) {
                echo 'Email Exception Caught: '.$e->getMessage() ."\n";
                return false;
            }
        }
    }


?>