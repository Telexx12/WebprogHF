<?php
    
    $ch = curl_init("https://fakestoreapi.com/carts/user/1");


    curl_setopt($ch,CURLOPT_HTTPGET,true);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $resp = curl_exec($ch);

    curl_close($ch);

    if($e = curl_error($ch)){
        echo $e;
    }else{
        $decoded = json_decode($resp,true);
        
       foreach ($decoded as $line){
            //var_dump($line);
            $userId = $line['userId'];
            break;
       }
       

       $ch2 = curl_init("https://fakestoreapi.com/users/" . $userId);

       curl_setopt($ch2,CURLOPT_HTTPGET,true);
       curl_setopt($ch2,CURLOPT_RETURNTRANSFER,true);

       $resp2 = curl_exec($ch2);

       curl_close($ch2);

       if($e2 = curl_error($ch2)){
            echo $e2;
       }
       else{
            $decoded2 = json_decode($resp2);
            $firstName = $decoded2->name->firstname;
            $lastName = $decoded2->name->lastname;
       }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Név: <label style="margin-bottom: 10px;"><b><?php echo $firstName . " ".$lastName?></b></label>
    <br>
   <?php foreach ($decoded as $line) : ?>
    <?php $index = 1;
            $sum = 0;
    ?>
        <table style="border-collapse: collapse;">
            <tr style="border:1px solid black">
                <th style="border:1px solid black">Sorszam</th>
                <th style="border:1px solid black">Termek neve</th>
                <th style="border:1px solid black">Termek ar</th>
                <th style="border:1px solid black">Termek mennyiseg</th>
            </tr>
            <?php foreach ($line['products'] as $product) :?>
                <?php

                    $quantity = $product['quantity'];

                    $ch3 = curl_init("https://fakestoreapi.com/products/".$product['productId']);

                    curl_setopt($ch3,CURLOPT_HTTPGET,true);
                    curl_setopt($ch3,CURLOPT_RETURNTRANSFER,true);
             
                    $resp3 = curl_exec($ch3);
             
                    curl_close($ch3);
             
                    if($e3 = curl_error($ch3)){
                        echo $e3;
                    }else{
                        $decoded3 = json_decode($resp3);
                        $title=($decoded3->title);
                        $price = $decoded3->price;

                        $sum += $price*$quantity;
                    }
                    ?>

                <tr style="border:1px solid black">
                    <td style="text-align: center; border:1px solid black;"><?php echo $index ?></td>
                    <td style="text-align: center; border:1px solid black;"><?php echo $title ?></td>
                    <td style="text-align: center; border:1px solid black;"><?php echo $price?></td>
                    <td style="text-align: center; border:1px solid black;"><?php echo $quantity ?></td>
                </tr>

                <?php
                $index++;
                ?>
            <?php endforeach ?>
        </table>
        <br>
         <label style=""><b>Ar osszesen: <?php echo $sum ?></b></label>
         <br>
         <br>

        
    <?php endforeach ?>

</body>
</html>