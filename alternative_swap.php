<?php
header( 'Content-Type: text/plain' );
header( 'Content-Disposition: attachment; filename=' . $_POST["newfilename"] );

$original_file = str_split( file_get_contents( $_POST['url'] ) );

if ( isset( $_POST[ 'lettersDDMenu' ] ) ) {
    $letter = $_POST[ 'lettersDDMenu' ];
}
else {
    $letter = 1;
    die( "Something went wrong! You did not click on any letter from the drop down menu" );
}

// ASCII values of capital and lowercase letters
define( "CAPITALA" , '65' );
define( "CAPITALZ" , '90' );
define( "LOWERCASEA" , '97' );
define( "LOWERCASEZ" , '122' );
define( "ASCIICASEDIF" , '32'); // the difference in ASCII values from one char case to another (e.g. ord( 'a' ) - ord( 'A' ) = 32)

if ( $letter == "All Letters" ) {
    swapAllCases( $original_file );
}
else {
    swapSingleCase( $original_file , $letter );
}

function swapAllCases( $string_file )
{
    foreach( $string_file as $value ) {
        $ASCII_of_char = ord( $value );
        if ( $ASCII_of_char >= CAPITALA && $ASCII_of_char <= LOWERCASEZ ) { // checks to see if the char is a char in the alphabet
            swapCase ( $value );
        }
        else {
            echo $value;
        }
    }
}

function swapSingleCase( $string_file , $the_letter ) {
    $Capv_letter = $the_letter;
    $Lowv_letter = swapCase( $Capv_letter );
    foreach ( $string_file as $value ) {
        if ( $value == $Capv_letter or $value == $Lowv_letter ) {
            swapCase( $value );
        }
        else {
            echo $value;
        }
    }
}

function swapCase( $character )
{
    $ASCII_of_char = ord( $character );
    if ( $ASCII_of_char >= CAPITALA && $ASCII_of_char <= CAPITALZ) {
        echo chr($ASCII_of_char + ASCIICASEDIF);
    }
    elseif ( $ASCII_of_char >= LOWERCASEA && $ASCII_of_char <= LOWERCASEZ ) {
        echo chr( $ASCII_of_char - ASCIICASEDIF );
    }
}