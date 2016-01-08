<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Signinpage.css">
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body background="http://hebus.org/files/Space/Space%20HD%20wallpaper%201920x1080%20(7).jpg"  >
<!-- connection to data base -->
<?php

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname;dovia", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<?php
if($_POST['formSubmit'] == "Submit")
{
    $varForm = $_POST['firstName'];
}
?>

<h1>Sign Up</h1>
<div id="form">
    <form id="msform">

        <fieldset>
            <h2 class="fs-title">Personal Info</h2>
            <h3 class="fs-subtitle">Step 1</h3>
            <input type="text" name="firstName" placeholder="First Name" />
            <input type="text" name="lastName" placeholder="Last Name" />
            <input type="number" name="phoneNumber" placeholder="Phone Number" />
            <input type="text" name="title" placeholder="Title" />
            <input type="number" name="age" placeholder="Age" />
            <input type="text" name="email" placeholder="Email"/>
            <input type="number" name="phone#" placeholder="Phone Number"/>
            <input type="text" name="phoneType" placeholder="Phone Type"/>
        </fieldset>

    </form>


    <form id="msform1">

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

    </form>


    <form id="msform2">

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
    <button style="height: 50px; width: 200px; font-size: 30px; background-color: rgba(0, 255, 255, 0.65); font-family: serif; color: white; float: right; ">Submit</button>
</div>



</body>
</html>