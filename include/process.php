<?php
 include 'session.php';
     
    $cuser = new auth();

    
    // Register User Code

   if(isset($_POST['register']))
   {

       $name = $cuser->test_input($_POST['firstname']);
       $username = $cuser->test_input($_POST['username']);
       $email = $cuser->test_input($_POST['email']);
       $address = $cuser->test_input($_POST['address']);
       $city = $cuser->test_input($_POST['city']);
       $phone = $cuser->test_input($_POST['phone']);
       $password = $cuser->passwordHash($_POST['password']);

       if($name == "" or $username == "" or $email == "" or $address == "" or $city == "" or $phone == "" or $password == "")
       {
        echo "<center><script>alert('Fields Cannot be Empty...!');</script></center>";
        echo "<script>window.location = '../register.php';</script>";

      }else{
       $result = $cuser->registeruser($name ,$username ,$email ,$address ,$city ,$phone ,$password);
      }
   }


   // Login TO Dashboard
   
   if(isset($_POST['login']) )
   {
       
      if($_POST["username"]=="" or $_POST["password"]==""){
        echo "<center><script>alert('Fields Cannot be Empty...!');</script></center>";
        echo "<script>window.location = '../index.php';</script>";
      }
       else{
            $username =$cuser->test_input($_POST["username"]);
            $password =$cuser->test_input($_POST["password"]);
            $result = $cuser->login_user($username,$password);

       }
   }

    // Employee Insertion
    if (isset($_POST['submit_employee'])) {
      $firstname = $cuser->test_input($_POST['firstname']);
      $username = $cuser->test_input($_POST['username']);
      $email = $cuser->test_input($_POST['email']);
      $address = $cuser->test_input($_POST['address']);
      $city = $cuser->test_input($_POST['city']);
      $phone = $cuser->test_input($_POST['phone']);
      $password = $cuser->passwordHash($_POST['password']); 
      $role = $cuser->test_input($_POST['role']);
      $result = $cuser->submit_employee($firstname,$username,$email,$address,$city,$phone,$password,$role); 
      header('location:../employee.php');
    }


      if (isset($_POST['action']) == "holiday_insertion") {
         $event_name = $cuser->test_input($_POST['event_name']);
         $description = $cuser->test_input($_POST['description']);
         $start_date = $cuser->test_input($_POST['start_date']);
         $end_date = $cuser->test_input($_POST['end_date']);
         $status = $cuser->test_input($_POST['status']);
         $result = $cuser->submit_holiday($event_name,$description,$start_date,$end_date,$status); 
         header('location:../employee.php');

       }

       
     if (isset($_GET['del']))
 {
    $data = $_GET['del'];
    $result = $cuser->employee_delete($data);
    if ($result) {
        header('location:../employee.php');

    }
}



            if (isset($_GET['holiday_del']))
 {
    $data = $_GET['holiday_del'];
    $result = $cuser->holiday_delete($data);
    if ($result) {
        header('location:../holidays.php');

    }
}

         
         if (isset($_GET['h_id'])) {
             $data = $_GET['h_id'];
             $result =$cuser->holiday_change($data);
             if ($result) {
                header('location:../holidays.php');
             }
         }



         if (isset($_GET['attendence_del']))
         {
            $data = $_GET['attendence_del'];
            $result = $cuser->attendence_delete($data);
            if ($result) {
                header('location:../attendence.php');
            }

    }



      
  
?>