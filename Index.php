<?php session_start(); ?>
<?php
$credentials = file_get_contents("credentials.config");

$credentials = str_replace(',', "\n", $credentials);

$credContent = explode("\n", $credentials);

$_SESSION['email1'] = ($credContent[0]);
$_SESSION['pw1'] = trim($credContent[1]);
$_SESSION['email2'] = $credContent[2];
$_SESSION['pw2'] = trim($credContent[3]);

$msg = 'Invalid credentials';

if (!isset($_SESSION['email'])) {
    if (!isset($_POST['email'])) {
        header("Location:Login.php");
        die();
    }
}

if (isset($_POST['email'])) {
$_SESSION['email'] = $_POST['email'];
}
if (isset($_POST['pw'])) {
$_SESSION['pw'] = $_POST['pw'];
}

if (($_SESSION['email'] == $_SESSION['email1'] && $_SESSION['pw'] == $_SESSION['pw1']) ||($_SESSION['email'] == $_SESSION['email2'] && $_SESSION['pw'] == $_SESSION['pw2'])) { 
} else {
    header("Location:Login.php?error=$msg");
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <head> 
        <title>Math Game</title> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head> 
    </head>
<body>
    <div class="container text-center col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
    <table class="table col-lg-2">
        <h2>Math Game</h2>
        <form action="" method="post">  
<?php
    $num1 = mt_rand(0,50);
    $num2 = mt_rand(0,50);
    $operator = mt_rand(0,1);
    $num3;
    
    if ($operator == 1 ) {
        $operator = "+";
        $num3 = $num1 + $num2;
        
        
    } else {
        $operator = "-";
        $num3 = $num1 - $num2;
    }
    
    $errormsg;
    if (is_numeric($_POST['answer'])) {       
        if ($_POST['answer'] == $_POST['answervalue']) {
            $_SESSION['correct']++;
            $_SESSION['total']++;
            $correct = "Correct";
        } else {
            $_SESSION['total']++;
            $wrong = "Incorrect";
        }       
    } else {
        $errormsg = "Invalid Input";
    }
    if (!isset($_POST['answer'])) {
            $_SESSION['correct'] = 0;
            $_SESSION['total'] = 0;
            $errormsg= "";
            $correct= "";
            $wrong = "";
    }
            
    
    echo "<tr><td colspan='2'>$num1 &nbsp; $operator &nbsp; $num2</td></tr>";
    echo "<tr><td colspan='2'><input type='text' name='answer' class='form-control' size='10' placeholder='Enter Answer'></td></tr>";
    echo "<input type='hidden' name='answervalue' value='$num3'";
    echo "<tr><td><input class='btn btn-primary' action='$_SERVER('$PHP_SELF')' type='submit' value='Submit' /></td>";
    echo "<td><a href='logout.php' class='btn btn-danger'>Logout</a></td></tr>";
    echo "<input type='hidden' name='answervalue' value='$num3'";
        
    
    
?>
       </form>
    </table>
<?php
    echo "<tr><td colspan='2'>" . "Score: " . $_SESSION['correct'] . "/" . $_SESSION['total'];
    echo "<br />";
    if ($_SESSION['total'] > 0) {
        echo "Answer was: ". $_POST['answervalue'] . "</td></tr>";
    }
    if ($_POST['answer'] == $_POST['answervalue']) {
        echo "<tr><td colspan='2'><p id='correct'>$correct</p></td></tr>";
    } else {
        echo "<tr><td colspan='2'><p>$wrong</p></td></tr>";
    }
    echo "<tr><td colspan='2'><p>$errormsg</p></td></tr>";
?>
        
        
    </div>
</body>
</html>
