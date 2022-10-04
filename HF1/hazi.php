<h3 style="margin:0;">Feladat 1</h3>
<?php
    $date = date('N');
    echo "A mai nap: ";
    switch ($date){
        case 1: echo "Hetfo";
            break;
        case 2: echo "Kedd";
            break;
        case 3: echo "Szerda";
            break;
        case 4: echo "Csütörtök";
            break;
        case 5: echo "Péntek";
            break;
        case 6: echo "Szombat";
            break;
        case 7: echo "Vasárnap";
            break;
    }
?>
<h3 style="margin:0; margin-top:10px;">Feladat 2</h3>
<form name="form" method="get" action="hazi.php">
    <input type="number" placeholder="szam1" id="szam1" name="szam1">
    <input type="text" placeholder="muvelet" id="muvelet" name="muvelet">
    <input type="number" placeholder="szam2" id="szam2" name="szam2">
    <input type="submit">
</form>

<?php
if($_GET){
        echo "Eredmeny: ";
        switch($_GET['muvelet']){
            case '+': 
                echo $_GET['szam1'] + $_GET['szam2'];
            break;
            case '-': 
                echo $_GET['szam1'] - $_GET['szam2'];
            break;
            case '*': 
                echo $_GET['szam1'] * $_GET['szam2'];
            break;
            case '/': 
                echo $_GET['szam1'] / $_GET['szam2'];
            break;
        }
    }


?>


<h3 style="margin:0; margin-top:10px;">Feladat 3</h3>
<?php

    for($i = 1; $i<=10;$i++){
        for($y = 1; $y<=10; $y++){
            echo $i / $y;
            echo "<br>";
        }
    }

?>
<h3 style="margin:0; margin-top:10px;">Feladat 4</h3>
<div style="padding: 10px; background-color: saddlebrown; display: inline-block">
<?php
        for($i=0;$i<9;$i++){
            echo "<div style='height: 50px;'>";
            for($j=0;$j<9;$j++){

                if($i%2==0 && $j%2==1){
                    echo "<div style=\"width: 50px; height: 50px; background-color: black; display: inline-block\"></div>";
                }
                if ($i%2==0 && $j%2==0){
                    echo "<div style=\"width: 50px; height: 50px; background-color: white; display: inline-block\"></div>";
                }
                if($i%2==1 && $j%2==1){
                    echo "<div style=\"width: 50px; height: 50px; background-color: white; display: inline-block\"></div>";
                }
                if($i%2==1 && $j%2==0){
                    echo "<div style=\"width: 50px; height: 50px; background-color: black; display: inline-block\"></div>";
                }

            }
            echo "</div>";
        };

    ?>
    </div>

    <?php   


