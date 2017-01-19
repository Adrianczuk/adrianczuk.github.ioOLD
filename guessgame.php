<?php
	session_save_path('./guesscookies');

	session_start();
	if(!isset($_SESSION['arra'])){
		$_SESSION['arra']=array();

	}
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <title>guessGame</title>
        </head>
        <body>
                <center><h2>Welcome to Guess Game</h2></center>
                <p>Guess the number. It is from 0-100.</p>
                <form action="guessGame.php">
                        <label for="guess">Your guess:</label>
                        <input type="text" name="guess" id="guess">
                        <input type="submit" value="check my guess">
                </form>
                <?php
                        echo $_REQUEST['guess'];
                        echo "<br>";
                        if (!isset($_SESSION["sesh"])){
                        $_SESSION["sesh"] = rand(0,100);
                        }
                        array_push($_SESSION['arra'], $_REQUEST['guess']);
                        foreach($_SESSION['arra'] as $key=>$value){
                        if (is_numeric($value)){
                                if ($value > $_SESSION["sesh"]){
                                        echo "your number is higher";
                                }
                                if ($value < $_SESSION["sesh"]){
                                        echo "your number is lower";
                                }
                                if ($value == $_SESSION["sesh"]){
                                        echo "u win bro";
                                        session_destroy();
                                }
                        }
                        echo "<br>";
                        echo $_SESSION["sesh"];
                        }
                ?>
        </body>
</html>