<h3>Feladat 2</h3>
<?php
    $array = ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']);

    foreach($array as $item){
        echo gettype($item);
        echo is_numeric($item) ? ' Igen' : ' Nem';
        echo "<br>";
    }
?>
<h3>Feladat 2</h3>
<?php
$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest",
    "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");


    foreach($orszagok as $key=>$value){

        echo $key . " fővárosa " . $value;
        echo "<br>";

    }
?>
<h3>Feladat 3</h3>

<?php
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);
foreach($napok as $key=>$value){
    echo $key . ": ";
    foreach($value as $a){
        echo $a . ",";
    }
    echo "<br>";
}

?>
<h3>Feladat 4</h3>

<?php
 function atalakit($tomb, $string){
    if($string == "kisbetus"){
        foreach($tomb as $key=>$value){
            $tomb[$key] = strtolower($value);
        }
    }
    if($string == "nagybetus"){
        foreach($tomb as $key=>$value){
            $tomb[$key] = strtoupper($value);
        }
    }

    return $tomb;
 }

 $szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

 $szinek = atalakit($szinek,"nagybetus");

 var_dump($szinek);


?>


