<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
          <meta charset="utf-8">
    <title>Social Media</title>
    <link rel="stylesheet"  href="css/stylle.css">
    <link rel="stylesheet"  href="css/update.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/jquery-3.3.1.min.js"></script>
    <script>
     $(document).ready(function(){$("input[name=payment]").on("click",function(){
        var selectvalue=$("input[name=payment]:checked").val();
        if(selectvalue=="show")
        $("#hidee").show();
        else if(selectvalue=="hide")
        $("#hidee").hide();
        
        });
   
    
     });
     
    </script>
    </head>
    <body>
        <?php
      
         $dsn = "mysql:host=localhost;dbname=project";
        $host = "localhost";
        $user = "root";
        $password = "";

 $Name = "";
        $phone = "";
        $email = "";
        $RRN = "";
        $no_ofperson = "";
        $date = "";
        $rooms = "";
        $payment ="" ;
        $no_visa = "";
        $offer = "";
       $nationality = "";

        function getposts() {
            $posts = array();
            $posts[0] = $_POST['Name'];
            $posts[1] = $_POST['RRN'];
//            $posts[2] = $_POST['email'];
//            $posts[3] = $_POST['phone'];
//            $posts[4] = $_POST['no_ofperson'];
//            $posts[5] = $_POST['date'];
//            $posts[6] = $_POST['rooms'];
//           $posts[7] = $_POST[' payment'];
//            $posts[8] = $_POST['no_visa'];
//            $posts[9] = $_POST['offer'];
//            $posts[10] = $_POST['nationality'];

            return $posts;
        }

        try {
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo 'Not connected' . $ex->getMessage();
        }

//delete data from reservation form
        
        
        if (isset($_POST['delete'])) {
            $data = getposts();
            if (empty($data[1])) {
                echo 'enter the RRN data to deleted';
            } else {
                $deletestmt = $connect->prepare("delete from  traveller where trvl_ssn=:RRN  ");
                $deletestmt->execute(array(
                    ':RRN' => $data[1]
                ));
                if ($deletestmt) {

                    echo 'data deleted';
                }
            }
        }   
        
        
         //select and display data in reservation form
                function getposts2() {
            $posts = array();
            $posts[0] = $_POST['Name'];
            $posts[1] = $_POST['RRN'];
            $posts[2] = $_POST['email'];
            $posts[3] = $_POST['phone'];
            $posts[4] = $_POST['no_ofperson'];
            $posts[5] = $_POST['date'];
            $posts[6] = $_POST['rooms'];
            $posts[7] ='show';
            $posts[8] = $_POST['no_visa'];
            $posts[9] = $_POST['offer'];
            $posts[10] = $_POST['nationality'];

            return $posts;
        }
        
        
        if (isset($_POST['search'])) {
            
            $data = getposts2();
            if (empty($data[1])) {
                echo 'enter the RRN data to search';
            } else {
                $searchstmt = $connect->prepare("select * from  traveller where trvl_ssn=:RRN ");
                $searchstmt->execute(array(
                    ':RRN' => $data[1]
                ));

                if ($searchstmt) {
                    $traveller = $searchstmt->fetch();

                    $Name = $traveller[0];
                    $RRN = $traveller[1];
                    $email = $traveller[2];
                    $phone = $traveller[3];
                    $no_ofperson =$traveller[4];
                    $date = $traveller[5];
                    $rooms = $traveller[6];
                     $payment = $traveller[7];
                    $no_visa = $traveller[8];
                    $offer = $traveller[9];
                     $nationality= $traveller[10];
                     
                   
                   
                }
            }
        }
               //update data
        if (isset($_POST['update'])) {
            $data = getposts2();
            if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) ||
                    empty($data[4]) || empty($data[5]) || empty($data[6]) || empty($data[7])||  empty($data[9]|| empty($data[10]))) {
                echo 'enter the RRN data to updated';
            } else {
                $updatestmt = $connect->prepare("update  traveller set trvl_name=:Name,trvl_mail=:email,trvl_phone=:phone,"
                        . "trvl_numOperson=:no_ofperson,date=:date,trvl_orderOroom=:rooms,trvl_visaORcash=:payment,"
                        . "trvl_visaNum=:no_visa,trvl_offer=:offer,trvl_nationality=:nationality where trvl_ssn=:RRN"
                );
                $updatestmt->execute(array(
                    ':Name' => $data[0],
                    ':RRN' => $data[1],
                    ':email' => $data[2],
                    ':phone' => $data[3],
                    ':no_ofperson' => $data[4],
                    ':date' => $data[5],
                    ':rooms' => $data[6],
                    ':payment' => $data[7],
                    ':no_visa' => $data[8],
                    ':offer' => $data[9],
                    ':nationality' => $data[10],
                ));
                if ($updatestmt) {

                    echo 'data ubdated';
                }
            }
        }

        
        
      //insert data in contact form   
        $name = "";
        $address = "";
        $subject = "";
        $message = "";

        function getposts1() {
            $posts = array();
            $posts[0] = $_POST['name'];
            $posts[1] = $_POST['address'];
            $posts[2] = $_POST['subject'];
            $posts[3] = $_POST['message'];
            return $posts;
        }

        try {
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo 'Not connected' . $ex->getMessage();
        }
        
        if (isset($_POST['send_message'])) {
            $data = getposts1();
            if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3])) {
                echo 'enter the user data to insert';
            } else {
                $insertstmt = $connect->prepare("insert into contact(name,email,subject,message)values(:name,:address,:subject,:message)");
                $insertstmt->execute(array(
                    ':name' => $data[0],
                    ':address' => $data[1],
                    ':subject' => $data[2],
                    ':message' => $data[3],
                ));



                if ($insertstmt) {

                    echo 'data inserted';
                }
            }
        }
        ?>
          <div class="header">
    
              <img src="img/loogo_1.png" class="logo">
            <ul class="ull">
                <li class="lii"> <a class="aa" href="index.php"> Home </a></li>
                <li  class="lii"> <a class="aa" href="package.php"> Package </a></li>
                <li  class="lii"> <a class="aa" href="contactus.php"> Contact Us </a></li>
            </ul>
</div>
        <form action="contactus.php" method="post">
            <fieldset>
   <div class="container">
       <p class="ppp">Get In Touch</p>
    
    <div class="con">
      <input type="text" placeholder="Your Name" class="input" name="name" >
      <input type="text" placeholder="Your Email Address" class="input" name="address">
    </div>
    
    <div class="subject">
      <input type="text" placeholder="Subject" class="input" name="subject" >
    </div>
    
    <div class="msg">
      <textarea  class="area" placeholder="Leave a Message" name="message" ></textarea>
    </div>
    
     <button  class ="btn" name="send_message" >Send Message</button>
    </div>
       <div class="contact_info"><p class="p-info">Contact </p>
<ul>
				<li class="address" > 198 West 21th Street, <br> Suite 721 New York NY 10016</li>
				<li class="phone"><a href="#">+ 1235 2355 98</a></li>
				<li class="wepsite"><a href="#">info@yoursite.com</a></li>
        <li class="fax"> +44-208-1234567</li>
				          
</ul>
           <!-- code popup1 form to delete traveler data  -->
            </div>
                <button   class="up_de" ><a style="text-decoration: none; color: white" href="#popup1">Delete</a></button>
   <!-- The Pop up code -->
<div id="popup1" class="overlay">
	<div class="popup">
		
		<a class="close" href="#">&times;</a>
		<div class="content">
                    <div class="delet_form">
                    <h2>Enter your RRN:</h2>
                    <input type="text" placeholder="Enter your RRN" class="input" name="RRN" value="<?php echo $RRN ?>">
                     </div>
                     <button  id="but_delete" name="delete" >Delete</button>
                    
		</div>
	</div>
</div>
   
   
   
   
   <!--  code popup2 form to update traveler data -->
                 <button  class="up_de" ><a style="text-decoration: none; color: white" href="#popup2">Update</a></button>
                  <!-- The Pop up code -->
<div id="popup2" class="overlay">
	<div class="popup2">
		
		<a class="close" href="#">&times;</a>
		<div class="content">
                    <div id="shwhid" >
            <p class="label1"> name : </p>
            <input class="res_input" type="text" placeholder="enter your name"    id="d1"  name="Name" value="<?php echo $Name; ?>">
            
            <p class="label2"> nationality :</p>
            <input  class="res_input" type="text" placeholder="enter your nationality"   maxlength="12" id="d5"  name="nationality" value="<?php echo $nationality; ?>"><br><br>
            
           
        
            <p class="label1"> phone : </p>
            <input  class="res_input" type="text" placeholder="enter your phone"   id="d2" name="phone" value="<?php echo $phone; ?>">
            
              <p class="label2"> Email :</p>
              <input  class="res_input" type="text" placeholder="your email"  id="d4" name="email" value="<?php echo $email; ?>"><br><br>
            
            
            
            
            
            
            <p class="label1"> RRN :</p>
            <input class="res_input" type="text" placeholder="your RRN"   maxlength="2" id="d3" name="RRN" value="<?php echo $RRN; ?>">
            
            
            
            <p class="label2"> NO.of person :      </p>
            <input  class="res_input" type="number"  placeholder="0"   min="1"  maxlength="20" id="d7"  name="no_ofperson" value="<?php echo $no_ofperson; ?>"><br><br>

            
            
            
            <p class="label1" style="margin-left: 110px;"> Day:</p>
            <input  class="res_input" type="date" placeholder="start Day"   maxlength="12" id="d5"  name="date" value="<?php echo $date; ?>">
           
             <p class="label2" >rooms:     </p>
            <select id="s1" name="rooms" value="<?php echo $rooms; ?>">
            <option value="3">single</option>
            <option value="4">double</option>
            <option value="5">Suite</option>
            </select><br><br>
           
           
           
           <p class="label1" style="    margin-left: 78px;"> offer   :</p>
           <input  class="res_input" type="text" placeholder="offer"  maxlength="12" id="d6" name="offer" value="<?php echo $offer; ?>">
           
        
             <p class="label2"> payment :</p>
             <input   type="radio" name="payment"  class="r1"  checked value="show"  <?php   if($payment=='show') {
                                                  echo 'checked';} ?>>
            <p class="l" id="visa"  >Visa Card</p>
            <input class="res_input"  type="text" id="hidee" placeholder="No.ofVisa" name="no_visa" value="<?php  echo $no_visa ; ?>"><br>
                
            <input   type="radio" name="payment"   class="r1" value="hide"    <?php   if($payment=='hide') {
                                                  echo 'checked';} ?>>
            <p class="l"> cash</p><br><br>
             
           
            <button id="btn1" name="update" >Update</button>
           
            <button  id="btn2" name="search">Search</button>
                    </div>
	</div>
</div>
               
   
  
            </fieldset>
</form>
 <img src="img/theworld.png" style="width: 100%;height: 200PX;">

  
   
    </body>
</html>
