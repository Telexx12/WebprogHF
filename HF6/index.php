

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php

        session_start();

        $szam;
        $visszajelzes = "";

       
            if(!$_SESSION){
                $_SESSION['szam'] = random_int(1,10);
            }
       

         if($_GET){

        
                if($_GET['tipp'] > $_SESSION['szam']){
                    $visszajelzes = "nagy";
                }else if($_GET['tipp'] < $_SESSION['szam']){
                    $visszajelzes = "kicsi";
                }else{
                    $visszajelzes = "talalt";
                    $_SESSION['szam'] = random_int(1,10);
                }


                    echo $_GET['tipp'];
                echo $_SESSION['szam'];

            }
    
    ?>


    <form action="index.php" method="get">

        <h2>Tippelj 1 - 10 között</h2>
        Tipped: <input type="text" name="tipp">
        <label name="visszajelzes"><?php echo $visszajelzes; ?></label>
        <br>
                <br>

        <input type="submit">
    </form>

   


</body>
</html>