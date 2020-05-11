<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
             <meta content="welcome" name="description">
        <meta charset="utf-8">
    <title>Booking</title>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    

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


        $name = "";
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
            $posts[0] = $_POST['name'];
            $posts[1] = $_POST['RRN'];
            $posts[2] = $_POST['email'];
            $posts[3] = $_POST['phone'];
            $posts[4] = $_POST['no_ofperson'];
            $posts[5] = $_POST['date'];
            $posts[6] = $_POST['rooms'];
            $posts[7] = $_POST['payment'];
            $posts[8] = $_POST['no_visa'];
            $posts[9] = $_POST['offer'];
            $posts[10] = $_POST['nationality'];
            
            echo $posts[7];

            return $posts;
        }

        try {
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo 'Not connected' . $ex->getMessage();
        }


        //insert data
        if (isset($_POST['save'])) {
            $data = getposts();
            if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) ||
                    empty($data[4]) || empty($data[5]) || empty($data[6]) || empty($data[7]) || empty($data[9])|| empty($data[10])) {
                echo 'enter the traveller data to insert';
            } else {
                $insertstmt = $connect->prepare("insert into traveller( trvl_name,trvl_ssn,trvl_mail,trvl_phone,"
                        . "trvl_numOperson,date,trvl_orderOroom,trvl_visaORcash,trvl_visaNum,trvl_offer,trvl_nationality)"
                        . "values(:name,:RRN,:email,:phone,:no_ofperson,:date,:rooms,:payment,:no_visa,:offer,:nationality)");
                $insertstmt->execute(array(
                    ':name' => $data[0],
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
                if ($insertstmt) {

                    echo 'data inserted';
                }
            }
        }
        ?>
          <header>
              <img src="img/loogo_1.png" class="logo">
            <ul>
                <li> <a href="index.php"> Home </a></li>
            <li> <a href="package.php"> Package </a></li>
            <li> <a href="contactus.php"> Contact Us </a></li>
            </ul>
        </header>
       
        
        <form id="shwhid" action="reservation.php" method="post">
            <label class="label1"> name : </label>
            <input type="text" placeholder="enter your name" required="fm"   id="d1"  name="name" value="<?php echo $name; ?>">
            
            <label class="label2"> nationality :</label>
            <input type="text" placeholder="enter your nationality"  required="fm" maxlength="12" id="d5"  name="nationality" value="<?php echo $nationality; ?>"><br><br>
            
           
        
            <label class="label1"> phone : </label>
            <input type="text" placeholder="enter your phone" required="fm"   id="d2" name="phone" value="<?php echo $phone; ?>">
            
              <label class="label2"> Email :</label>
            <input type="email" placeholder="your email"  required="" id="d4" name="email" value="<?php echo $email; ?>"><br><br>
            
            
            
            
            
            
            <label class="label1"> RRN :</label>
            <input type="text" placeholder="your RRN"  required="fm" maxlength="2" id="d3" name="RRN" value="<?php echo $RRN; ?>">
            
            
            
            <label class="label2"> NO.of person :      </label>
            <input type="number"  placeholder="0"  required="fm" min="1"  maxlength="20" id="d7"  name="no_ofperson" value="<?php echo $no_ofperson; ?>"><br><br>

            
            
            
            <label class="label1" style="margin-left: 110px;"> Day:</label>
            <input type="date" placeholder="start Day"  required="" maxlength="12" id="d5"  name="date" value="<?php echo $date; ?>">
           
             <label class="label2" >rooms:     </label>
            <select id="s1" name="rooms" value="<?php echo $rooms; ?>">
            <option value="3">single</option>
            <option value="4">double</option>
            <option value="5">Suite</option>
            </select><br><br>
           
           
           
           <label class="label1" style="    margin-left: 78px;"> offer   :</label>
           <input type="text" placeholder="offer"  required="" maxlength="12" id="d6" name="offer" value="<?php echo $offer; ?>">
           
        
             <label class="label2"> payment :</label>
             <input type="radio" name="payment"  class="r1"  value="show">
            <label class="l" id="visa"  >Visa Card</label>
            <input type="text" id="hidee" placeholder="No.ofVisa" name="no_visa" value="<?php  echo $no_visa ; ?>"><br>
                
            <input type="radio" name="payment"   class="r1" value="hide" >
            <label class="l"> cach</label><br><br>
             
           
            <button id="btn1" name="save" >save</button>
           
           <button type="reset" id="btn2">cancel</button>
        </form>
        <img src="img/theworld.png" style="width: 100%;height: 200PX;">
        
        
    </body>
</html>
