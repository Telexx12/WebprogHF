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
    Név: <label><?php echo $firstName . " ".$lastName?></label>
    <?php $index = 0;?>
   <?php foreach ($decoded as $line) : ?>

        <table>
            <tr>
                <th>Sorszam</th>
                <th>Termek neve</th>
                <th>Termek ar</th>
                <th>Termek mennyiseg</th>
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
                    }
                    ?>

                <tr>
                    <td><?php echo $index ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $price?></td>
                    <td><?php echo $quantity ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        

        
    <?php endforeach ?>

</body>
</html>