<?php

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename='.$_POST["newfilename"]);

$original_file = str_split(file_get_contents($_POST['url']));
//$modified_file = fopen($file_name, "w");


(isset($_POST["let_select"])) ? $letter = $_POST["let_select"] : $letter=1;

if($letter == "All Letters"){
    foreach($original_file as $value){
        if(ord($value)>=65 && ord($value)<=90){ //capital version of letters
            //fwrite($modified_file, chr(ord($value) + 32));
            echo chr(ord($value) + 32);
        }
        elseif (ord($value)>=97 && ord($value)<=122){ //lowercase version of letters
            //fwrite($modified_file, chr(ord($value) - 32));
            echo chr(ord($value) - 32);
        }
        else{
            //fwrite($modified_file, $value);
            echo $value;
        }
    }
}
else{
    $Capv_letter = $letter;
    $Lowv_letter = chr(ord($letter) + 32);
    foreach($original_file as $value){
        if($value == $Capv_letter){
            //fwrite($modified_file, chr(ord($value) + 32));
            echo chr(ord($value) + 32);
        }
        elseif($value == $Lowv_letter){
            //fwrite($modified_file, chr(ord($value) - 32));
            echo chr(ord($value) - 32);
        }
        else{
            //fwrite($modified_file, $value);
            echo $value;
        }
    }
}
//echo "Success! File was Succesfully Created";
//fclose($modified_file);
?>