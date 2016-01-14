<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Signinpage.css">
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body background="http://hebus.org/files/Space/Space%20HD%20wallpaper%201920x1080%20(7).jpg"  >
<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=dovia', 'root', 'root');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
if(@$_POST['formSubmit'] == "Submit")
{
    $errorMessage = "";

    if(empty($_POST['firstname']))
    {
        $errorMessage = "<li>You forgot to enter your first name.</li>";
    }
    if(empty($_POST['lastname']))
    {
        $errorMessage = "<li>You forgot to enter your last name.</li>";
    }
    if(empty($_POST['phonenumber']))
    {
        $errorMessage = "<li>You forgot to enter a phone number.</li>";
    }
    if(empty($_POST['title']))
    {
        $errorMessage = "<li>You forgot to enter a title.</li>";
    }
    if(empty($_POST['age']))
    {
        $errorMessage = "<li>You forgot to enter your age.</li>";
    }
    if(empty($_POST['email']))
    {
        $errorMessage = "<li>You forgot to enter your email.</li>";
    }
    if(empty($_POST['phonenumber2']))
    {
        $errorMessage = "<li>You forgot to enter your phone number.</li>";
    }
    if(empty($_POST['phonetype']))
    {
        $errorMessage = "<li>You forgot to enter your phone type.</li>";
    }


    $stmt = $dbh->prepare("INSERT INTO personalinfo (firstname, lastname, phonenumber, title, age, email, phonenumber2, phonetype ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $result = $stmt->execute(array($_POST['firstname'], $_POST['lastname'], $_POST['phonenumber'], $_POST['title'], $_POST['age'], $_POST['email'], $_POST['phonenumber2'], $_POST['phonetype']));

    if(!$result){
        print_r($stmt->errorInfo());
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }

}?>

<h1>Sign Up</h1>
<div id="form">
    <form id="msform" method="post">

        <fieldset>
            <h2 class="fs-title">Personal Info</h2>
            <h3 class="fs-subtitle">Step 1</h3>
            <input type="text" name="firstname" placeholder="First Name" />
            <input type="text" name="lastname" placeholder="Last Name" />
            <input type="number" name="phonenumber" placeholder="Phone Number" />
            <input type="text" name="title" placeholder="Title" />
            <input type="number" name="age" placeholder="Age" />
            <input type="text" name="email" placeholder="Email"/>
            <input type="number" name="phonenumber2" placeholder="Phone Number"/>
            <input type="text" name="phonetype" placeholder="Phone Type"/>
            <input type="submit" name="formSubmit" value="Submit" >
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Payment and Location</h2>
            <h3 class="fs-subtitle">Step 2</h3>
            <input type="text" name="streetAddress" placeholder="Street Address" />
            <input type="text" name="city" placeholder="City" />
            <input type="text" name="state" placeholder="State" />
            <input type="number" name="zipCode" placeholder="Zipcode" />
            <input type="text" name="poBox" placeholder="PO Box" />
            <input type="text" name="payment" placeholder="Payment Method"/>
            <input type="text" name="nameOfCC" placeholder="Name of Credit Card"/>
            <input type="number" name="#onCC" placeholder="Number on Credit Card"/>
            <input type="number" name="securityCode" placeholder="Security Code"/>

        </fieldset>

 

        <fieldset>
            <h2 class="fs-title">Account</h2>
            <h3 class="fs-subtitle">Step 3</h3>
            <input type="text" name="user" placeholder="Username" />
            <input type="text" name="typeOfPhone" placeholder="Type Of Phone" />
            <input type="text" name="email" placeholder="Email" />
            <input type="text" name="cemail" placeholder="Confirm Email"/>
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="cpass" placeholder="Confirm Password" />
        </fieldset>

    </form>

</div>



</body>
</html>