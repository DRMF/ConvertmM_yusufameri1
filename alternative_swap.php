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


if ( $letter == "All Letters" ) {
    swapAllCases( $original_file );
}
else {
    swapSingleCase( $original_file , $letter );
}

function swapAllCases( $string_file )
{
    // ASCII values of capital and lowercase letters
    $capitalA = 65;
    $capitalZ = 90;
    $lowercaseA = 97;
    $lowercaseZ = 122;
    foreach( $string_file as $value ) {
        $ASCII_of_char = ord( $value );
        if ( $ASCII_of_char >= $capitalA && $ASCII_of_char <= $capitalZ ) {
            echo chr( $ASCII_of_char + 32 );
        }
        elseif ( $ASCII_of_char >= $lowercaseA && $ASCII_of_char <= $lowercaseZ ) {
            echo chr( $ASCII_of_char - 32 );
        }
        else {
            echo $value;
        }
    }
}

function swapSingleCase( $string_file , $the_letter ) {
    $Capv_letter = $the_letter;
    $Lowv_letter = chr( ord( $the_letter ) + 32 );
    foreach ( $string_file as $value ) {
        $ASCII_of_char = ord( $value );
        if ( $value == $Capv_letter ) {
            echo chr( $ASCII_of_char + 32 );
        }
        elseif ( $value == $Lowv_letter ) {
            echo chr( $ASCII_of_char - 32 );
        }
        else {
            echo $value;
        }
    }
}