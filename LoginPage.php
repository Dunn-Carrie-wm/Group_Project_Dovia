<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dovia</title>
    <link href="LoginPage.css" rel="stylesheet" type="text/css">
</head>
<body>
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

    if(empty($_POST['username']))
    {
        $errorMessage = "<li>You forgot to enter your username.</li>";
    }
    if(empty($_POST['password']))
    {
        $errorMessage = "<li>You forgot to enter your last password.</li>";
    }


    $stmt = $dbh->prepare("INSERT INTO login (username, password ) VALUES (?, ?)");

    $result = $stmt->execute(array($_POST['username'], $_POST['password']));

    if(!$result){
        print_r($stmt->errorInfo());
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }

}?>
<div id="Header">
    <h1>Dovia</h1>
</div>

<div id="form">
    <form method="post">

        <fieldset>
            <h2 class="fs-title">Login</h2>
            <input type="text" name="username" placeholder="Username or E-mail"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" name="formSubmit" value="Submit" >
        </fieldset>

    </form>
</div>


</body>
</html>