<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback Form</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <style>
        *{box-sizing:border-box;}
        body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:100px;}
        .form_box{height:80%; width:100%; padding:10px; background-color:white;}
        input{padding:5px;  margin-bottom:5px;}
        input[type="submit"]{border:none; outlin:black; background-color:#679f1b; color:white;}
        .heading{background-color:#0D98BA; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
        .shadow{
            -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
            -moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
            box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
        .pic{text-align:left; width:33%; float:left;}
        
        input[type=text], select, textarea {    
            width: 100%;    
            padding: 10px;    
            border: 1px solid rgb(70, 68, 68);    
            border-radius: 4px;    
            resize: vertical;    
          }  
        </style>
    </head>
    
    <body>
        <div class="form_box shadow">
            <form method="post" action="feedback.php">
        <div class="heading">
            Book's shop Feedback Form
        </div>
                
        <br/><br/>
        <div>
            <label for="fname">First Name: </label>
            <input type="text" id="fname" name="fname" placeholder="Enter your First Name">
        </div>
        
        <br/><br/>
        <div>
            <label for="lname">Last Name: </label>
            <input type="text" id="lname" name="lname" placeholder="Enter your Last Name">
        </div>
                
        <br/><br/>
        <div>
            <label for="email">Email Address: </label>
            <input type="text" id="email" name="email" placeholder="Enter your Email Address">
        </div>
        
        <br/>
        <p>What do you think about the service of our book's shop?</p>
        <div>
            
            <div class="pic">
                <img src="image/bad.jpg" alt="" width="120px" height="110px" value="bad"> <br/>
                <input type="radio" name="service" value="Bad"> Bad
            </div>
            <div class="pic">
                <img src="image/neutral.jpg" alt="" width="110px" height="110px" value="neutral"> <br/>
                <input type="radio" name="service" value="Okay"> Okay
            </div>
            <div class="pic">
                <img src="image/good.jpg" alt="" width="110px" height="100px" value="good"> <br/>
                <input type="radio" name="service" value="Good"> Good
            </div>
        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <p><b>Do you have any suggestion for us?</b> </p>
        <textarea name=" suggestion" rows="8" cols="40" placeholder="Enter your suggestion here!"></textarea>

        <br/><br/>
         <input type="submit" name="submit" value="Submit Form">
         <input type="hidden" name="submitted" value="true"/>
         
       </form>
     </div>
        
        
    <?php
    include("bookstore_database.php");
        if (isset($_POST['submitted'])) {

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $service = $_POST['service'];
                $suggestion = $_POST['suggestion'];

                $fname = mysqli_real_escape_string($store, $fname);
                $lname = mysqli_real_escape_string($store, $lname);
                $email = mysqli_real_escape_string($store, $email);
                $service = mysqli_real_escape_string($store, $service);
                $suggestion = mysqli_real_escape_string($store, $suggestion);

                if(empty($fname)) {
                    echo "<script>alert('First name required!')</script>";
                }

                else if(!(preg_match('/^[a-zA-Z\s]+$/', $fname))) {
                    echo "<script>alert('First name must be in alphabets!')</script>";
                }

                else if(empty($lname)) {
                    echo "<script>alert('Last name required!')</script>";
                }

                else if(!(preg_match('/^[a-zA-Z\s]+$/', $lname))) {
                    echo "<script>alert('Last name must be in alphabets!')</script>";
                }

                else if(empty($email)) {
                    echo "<script>alert('E-mail required!')</script>";
                }

                else if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    echo "<script>alert('Invalid e-mail!')</script>";
                }
                
                else if(empty($service)) {
                        echo "<script>alert('Please select the service.')</script>";
                }
                
                else{
                    //success store data and display message
                    $query = mysqli_query($store, "INSERT INTO feedback
                        (fname, lname, email, service, suggestion ) VALUES
                        ('$fname', '$lname', '$email ', '$service', '$suggestion')");
                        if ($query)
                        {
                            echo "<script>alert('Thanks for your feedback!');
                                window.location='feedback.php'</script>";
                        }
                }

        }
     ?>
        
        
    </body>
</html>
