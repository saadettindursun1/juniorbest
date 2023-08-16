<?php

class jbEncrypt{ 
// Şifrelenecek mesaj

public static function code_encrypt($content) : string {
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = '8234567891011121'; 
   $encryption_key = "sifrelerim"; 
    return  $encryption = openssl_encrypt($content, $ciphering, $encryption_key, $options, $encryption_iv); 
}
 

public static function decode_encrypt($content) : string {
    $ciphering = "AES-128-CTR"; 
    //$iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = '8234567891011121'; 
   $encryption_key = "sifrelerim"; 
    return  $decryption=openssl_decrypt ($content, $ciphering, $encryption_key, $options, $encryption_iv); 

}

}


?>