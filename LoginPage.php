<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dovia</title>
    <link href="LoginPage.css" rel="stylesheet" type="text/css">
</head>
<body>
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
<div id="Header">
    <h1>Dovia</h1>
</div>

<div id="form">
    <form>

        <fieldset>
            <h2 class="fs-title">Login</h2>
            <input type="text" name="E-mail" placeholder="Username or E-mail"/>
            <input type="text" name="Password" placeholder="Password"/>

        </fieldset>

    </form>
</div>

<div id="button">
    <button style="height: 50px; width: 200px; font-size: 30px; background-color: rgba(0, 255, 255, 0.65); font-family: serif; color: white; align-content:center ; "><a href="Loactionmap.html">Submit</a></button>
</div>







<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="Scripts.js"></script>
</body>
</html>