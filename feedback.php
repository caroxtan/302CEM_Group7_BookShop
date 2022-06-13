
                
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

        if (isset($_POST['submitted'])) {

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $service = $_POST['service'];
                $suggestion = $_POST['suggestion'];


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

                        (fname, lname, email, service, suggestion ) VALUES
                        ('$fname', '$lname', '$email ', '$service', '$suggestion')");
                        if ($query)
                        {
                            echo "<script>alert('Thanks for your feedback!');

                        }
                }

        }
     ?>
        
        
    </body>
</html>
