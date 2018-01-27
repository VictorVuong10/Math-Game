<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <title>Math Game</title> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head> 
    <body>
        <div class="container text-center col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                <h2>Login to play the math game</h2>
            <form action="index.php" method="post">            
                <table class="table">
                    <tr>
                        <td>Your Email: </td>
                        <td><input type="text" name="email" class="form-control" size="30" placeholder="Enter Email"></td>
                    </tr>
                    <tr>
                        <td>Your Password: </td>    
                        <td><input type="password" name="pw" class="form-control" size="30" placeholder="Enter password"></td>
                    </tr>
                </table>
                <input class="btn btn-primary" type="submit" name="submit" value="Login" /> 
                <?php

                    if (isset ($_GET["error"])) {
                        echo "<p class = 'text-danger'>" . $_GET["error"] . "</p>";
                    }
                ?>
            </form>
        </div>
    </body>
</html>
