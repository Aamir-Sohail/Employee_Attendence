<?php
session_start();
require_once 'config.php';


class auth extends database{
    
  
    // COde FOr Validation For Login and Register
        public function test_input($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
        }


 
     //for hash password insertion
        public function passwordHash($password){
        $salt = ")(*&^%$#(*&^%$#*&^%$#";
        $hPassword = md5($password . $salt);
        return $hPassword;
        } 
       
        // SESSION's
        public function session_user($username)
        {
            $sql="SELECT id,email,address,phone,firstname from users where username=:username";
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(":username",$username);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        }   


      // Registration TO Dashboard

        public function registeruser($name ,$username ,$email ,$address ,$city ,$phone ,$password)
        {     
            $sql = "INSERT INTO users(firstname,username,email,address,city,phone,password) VALUES (:name,:username,:email,:address,:city,:phone,:password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name ,PDO::PARAM_STR);
            $stmt->bindParam(':username', $username ,PDO::PARAM_STR);
            $stmt->bindParam(':email', $email ,PDO::PARAM_STR);
            $stmt->bindParam(':address', $address ,PDO::PARAM_STR);
            $stmt->bindParam(':city', $city ,PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone ,PDO::PARAM_STR);
            $stmt->bindParam(':password', $password ,PDO::PARAM_STR);
            $result = $stmt->execute();
    
            if($result)
            {
              echo "<script>alert('Insert Successfully');</script>";
              header('location:../index.php');
              } 
              
        }


        // LOgin TO Dashboard

        public function login_user($username,$password){
            //join query will be used
              $hPassword = $this->passwordHash($password);
             
              $query = $this->conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
              $query->execute(array($username , $hPassword));
              $control= $query->fetch(PDO::FETCH_ASSOC);
              $control_2 =$query->rowCount();
              if($control_2  > 0)
              {
                  $_SESSION["username"] = $username;
                  $_SESSION["password"] = $hPassword;
                  $_SESSION["role"] = $control['role'];
                  $_SESSION["id"] = $control['id'];
                 if($_SESSION['role'] == 1){
                   header('location: ../dashboard.php');
                 }elseif($_SESSION['role'] == 2){
                  header('location: ../dashboard.php');
                 }else{
                  echo "<center><script>alert('Invalid Username Or Password...!');</script></center>";
                  echo "<script>window.location = '../index.php';</script>";
                 }
              }
       }

            // Select All-Users

            public function select_users()
            {
                $sql = "SELECT * from users ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
                 return $result;
            }


            
            public function select_employee()
            {
              $sql = "SELECT * from users where role = '2'";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
              $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $result;
            }

            public function submit_employee($firstname,$username,$email,$address,$city,$phone,$password,$role)
            {
              $sql = "INSERT INTO users(firstname,username,email,address,city,phone,password,role) VALUES (:firstname,:username,:email,:address,:city,:phone,:password,:role)";
              $stmt = $this->conn->prepare($sql);
              $stmt->bindParam(':firstname', $firstname ,PDO::PARAM_STR);
              $stmt->bindParam(':username', $username ,PDO::PARAM_STR);
              $stmt->bindParam(':email', $email ,PDO::PARAM_STR);
              $stmt->bindParam(':address', $address ,PDO::PARAM_STR);
              $stmt->bindParam(':city', $city ,PDO::PARAM_STR);
              $stmt->bindParam(':phone', $phone ,PDO::PARAM_STR);
              $stmt->bindParam(':password', $password ,PDO::PARAM_STR);
              $stmt->bindParam(':role', $role ,PDO::PARAM_STR);
              $result = $stmt->execute();
      
            }


            public function select_holiday()
            {
              $sql = "SELECT * from holiday";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
              $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $result;
            }

            public function submit_holiday($event_name,$description,$start_date,$end_date,$status)
            {
              $sql = "INSERT INTO holiday(event_name,description,start_date,end_date,status) VALUES (:event_name,:description,:start_date,:end_date,:status)";
              $stmt = $this->conn->prepare($sql);
              $stmt->bindParam(':event_name', $event_name ,PDO::PARAM_STR);
              $stmt->bindParam(':description', $description ,PDO::PARAM_STR);
              $stmt->bindParam(':start_date', $start_date ,PDO::PARAM_STR);
              $stmt->bindParam(':end_date', $end_date ,PDO::PARAM_STR);
              $stmt->bindParam(':status', $status ,PDO::PARAM_STR);
              $result = $stmt->execute();
            }
             
            public function select_holiday_to_calender()
            {
              $sql = "SELECT * from holiday";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
              $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $result;
            }

            public function select_attendence()
            {
              $sql = "SELECT attendence.*, users.firstname,users.username,users.phone FROM attendence INNER JOIN users on attendence.user_id=users.id";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
              $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $result;
            }


            public function user_delete($id)
            {

           $sql ="DELETE FROM users WHERE id =:data";
           $stmt = $this->conn->prepare($sql);
           $stmt ->bindparam(':data',$id,PDO::PARAM_STR);
           $result = $stmt->execute();
           return $result;
         }

           



          public function employee_delete($id)
            {

           $sql ="DELETE FROM users WHERE id =:data";
           $stmt = $this->conn->prepare($sql);
           $stmt ->bindparam(':data',$id,PDO::PARAM_STR);
           $result = $stmt->execute();
           return $result;
         }



            public function holiday_delete($id)
            {

           $sql ="DELETE FROM holiday WHERE id =:data";
           $stmt = $this->conn->prepare($sql);
           $stmt ->bindparam(':data',$id,PDO::PARAM_STR);
           $result = $stmt->execute();
           return $result;
         }



       public function holiday_change($data)
       {
        $sql ="UPDATE holiday set status='1' where id =:data";
        $stmt =$this->conn->prepare($sql);
        $stmt->bindParam(':data',$data,PDO::PARAM_STR);
        $result=$stmt->execute();
        return $result;
       }

       public function totalemployee(){
          $sql = "SELECT * from users where role = 2";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          $result= $stmt->rowCount();
          return $result;
        }


        public function presentemployee(){
          $sql = "SELECT * from attendence where status = 1";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          $result= $stmt->rowCount();
          return $result;
        }


        public function absentemployee(){
          $sql = "SELECT * from attendence where status = 0";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          $result= $stmt->rowCount();
          return $result;
        }

         public function halfleaveemployee(){
          $sql = "SELECT * from attendence where status = 2";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          $result= $stmt->rowCount();
          return $result;
        }





          public function attendence_delete($data)
            {

           $sql ="DELETE FROM attendence WHERE id = :data";
           $stmt = $this->conn->prepare($sql);
           $stmt->bindparam(':data',$data,PDO::PARAM_STR);
           $result = $stmt->execute();
           return $result;
         }
     


     
}
           
   ?>