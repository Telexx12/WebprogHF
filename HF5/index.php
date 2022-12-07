<h3>Online conference registration</h3>


<?php
if($_POST){

    $valid = true;

    if(isset($_POST['resetPost'])){
        $_POST = array();
       
    }

    if(isset($_POST['firstName']) && $_POST['firstName'] != ""){
        $firstName = $_POST['firstName'];
    }else{
        $firstNameError = "First name field is required";
        $valid = false;
    }

    if(isset($_POST['lastName']) && $_POST['lastName'] != ""){
        $lastName = $_POST['lastName'];
    }else{
        $lastNameError = "Last name field is required";
        $valid = false;
    }

    if(isset($_POST['email']) && $_POST['email'] != ""){
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if(preg_match($pattern,$_POST['email'])){
            $email = $_POST['email'];
        }else{
            $emailError = "Email is not valid";
            $valid = false;
        }
    }else{
        $emailError = "Email fiedl is required";
        $valid = false;
    }

    if(isset($_POST['attend'])){
        if(in_array("Event1",$_POST['attend'])){
           $event1 = true;
        }
        if(in_array("Event2",$_POST['attend'])){
            $event2 = true;
         }
         if(in_array("Event3",$_POST['attend'])){
            $event3 = true;
         }
         if(in_array("Event4",$_POST['attend'])){
            $event4 = true;
         }
    }else{
        $attendError = "At least one event is required";
        $valid = false;
    }


    if($_FILES['abstract']['size'] >= 3145728){
        $fileError = "File is to big";
        $valid = false;
    }

    if(!isset($_POST['terms'])){
        $termsError = "Terms is required";
        $valid = false;
    }
}
?>

<style>
    .error{
        color: red;
    }
</style>


<form method="post" action="index.php" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" <?php echo isset($firstName) ?  "value=" . $firstName : ""?>>
    </label>
    <label class="error"> <?php echo isset($firstNameError) ? $firstNameError : " "?></label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" <?php echo isset($lastName) ? "value=" . $lastName : ""?>>
    </label>
    <label class="error"> <?php echo isset($lastNameError) ? $lastNameError : " "?></label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" <?php  echo isset($email)? "value=" . $email : ""?>>
    </label>
    <label class="error"> <?php echo isset($emailError) ? $emailError : ""?></label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" <?php echo isset($event1) ? "checked": ""?> value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" <?php echo isset($event2) ? "checked": ""?> value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" <?php echo isset($event3) ? "checked": ""?> value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" <?php echo isset($event4) ? "checked": ""?> value="Event4">Event3<br>
    </label>
    <label class="error"> <?php echo isset($attendError) ? $attendError : ""?></label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract" accept="application/pdf"/>
    </label>
    <label class="error"> <?php echo isset($fileError) ? $fileError : ""?></label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <label class="error"> <?php echo isset($termsError) ? $termsError : ""?></label>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
    <input type="submit" name="resetPost" value="Reset POST array"/>
</form>

<?php
    if($valid){
        echo "First name: " . $firstName;
        echo "<br>";
        echo "Last name: " . $lastName;
        echo "<br>";
        echo "Email: " . $email;
    }
?>


