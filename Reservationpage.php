<!DOCTYPE html>
<html>
<head>
    <title>Reservation Page</title>
    <link href="Reservationpage.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- form 1 -->
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

    if(empty($_POST['firstName']))
    {
        $errorMessage = "<li>You forgot to enter your first name.</li>";
    }
    if(empty($_POST['lastName']))
    {
        $errorMessage = "<li>You forgot to enter your last name.</li>";
    }
    if(empty($_POST['phoneNumber']))
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
    if(empty($_POST['password']))
    {
        $errorMessage = "<li>You forgot to enter your password.</li>";
    }

    $stmt = $dbh->prepare("INSERT INTO contact (firstName, lastName, phoneNumber, title, age, email, password ) VALUES (:firstName, :lastName, :phoneNumber, :title, :age, :email, :password)");

    $result = $stmt->execute(array
    (
        'firstName'=>$_POST['firstName'],
        'lastName'=>$_POST['lastName'],
        'phoneNumber'=>$_POST['phoneNumber'],
        'title'=>$_POST['title'],
        'age'=>$_POST['age'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ));


    if(!$result){
        print_r($stmt->errorInfo());
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }


}?>

<div id="header">
    <h1>Dovia</h1>
</div>
<div id="form">

    <form id="msform" method="post">

        <fieldset>
            <h2 class="fs-title">How Will We Contact You</h2>
            <h3 class="fs-subtitle">Step 1</h3>
            <input type="text" name="firstName" placeholder="First Name" />
            <input type="text" name="lastName" placeholder="Last Name" />
            <input type="number" name="phoneNumber" placeholder="Phone Number" />
            <input type="text" name="title" placeholder="Title" />
            <input type="number" name="age" placeholder="Age" />
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" name="formSubmit" value="Submit" >
        </fieldset>






        <fieldset>
            <h2 class="fs-title">Destination</h2>
            <h3 class="fs-subtitle">Step 2</h3>
            <input type="text" name="streetAddress" placeholder="Street Address" />
            <input type="text" name="city" placeholder="City" />
            <input type="text" name="state" placeholder="State" />
            <input type="number" name="zipCode" placeholder="Zipcode" />
            <input type="number" name="timeNeededForCharger " placeholder="Reservation Time" />
            <input type="number" name="hoour" placeholder="Hours Needed To Charger" />
            <input type="number" name="miinutes" placeholder="Minutes Needed To Charger" />

        </fieldset>




        <fieldset>
            <h2 class="fs-title">Area Of The Charger Preferences</h2>
            <h3 class="fs-subtitle">Step 3</h3>
            <input type="text" name="seection" placeholder="Section In Place You Want To Be " />
            <input type="number" name="taable" placeholder="Table Number" />
            <input type="number" name="booth" placeholder="Booth Number" />
            <input type="text" name="station" placeholder="Station Of Charger" />
            <input type="text" name="typeOfPhone" placeholder="Type Of Phone" />

        </fieldset>

    </form>
</div>

</body>
</html>