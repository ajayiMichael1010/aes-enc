<?php

function encryptCard()
{
    $public_key = file_get_contents('key/rsa_public_key.pub');
    // Remove "RSA" from the header
    $public_key = str_replace("RSA", "", $public_key);
    // Remove leading and trailing whitespace
    $public_key = trim($public_key);

     //Card details
//    $cardParams = [
//        'cvv' => '800',
//        'pin' => '5234',
//        'expiryDate' => '0724',
//        'pan' => '5399239057282149'
//    ];

//        $cardParams = [
//        'cvv' => '100',
//        'pin' => '1234',
//        'expiryDate' => '0139',
//        'pan' => '5123450000000008'
//    ];

//        $cardParams = [
//        'cvv' => '013',
//        'pin' => '5234',
//        'expiryDate' => '1224',
//        'pan' => '5198994094735094'
//    ];

//    $cardParams = [
//        'cvv' => '741',
//        'pin' => '9978',
//        'expiryDate' => '0524',
//        'pan' => '5061051124817307500'
//    ];
//    $cardParams = [
//        'cvv' => '888',
//        'pin' => '5234',
//        'expiryDate' => '0724',
//        'pan' => '5399239057282149'
//    ];

//    $cardParams = [
//        'cvv' => '888',
//        'pin' => '8469',
//        'expiryDate' => '1224',
//        'pan' => '4105400017952274'
//    ];

//        $cardParams = [
//        'cvv' => '111',
//        'pin' => '1111',
//        'expiryDate' => '0350',
//        'pan' => '5060990580000217499'
//    ];

//
//        $cardParams = [
//        'cvv' => '111',
//        'pin' => '1111',
//        'expiryDate' => '0350',
//        'pan' => '4000000000002503'
//    ];

//    $cardParams = [
//        'cvv' => '111',
//        'pin' => '1234',
//        'expiryDate' => '0139',
//        'pan' => '5123456789012346'
//    ];

//        $cardParams = [
//        'cvv' => '888',
//        'pin' => '8469',
//        'expiryDate' => '1224',
//        'pan' => '4105400017952274'
//    ];

            $cardParams = [
                'pan' => '5123450000000008',
                'cvv' => '100',
                'pin' => '1234',
                'expiryDate' => '0139',
            ];


    // Convert card details to JSON
    $cardJson = json_encode($cardParams);

    // Encrypt the card details
    if (openssl_public_encrypt($cardJson, $encrypted, $public_key)) {
        // Return the encrypted data as a Base64-encoded string
        return base64_encode($encrypted);
    } else {
        // Encryption failed
        die("Error: Encryption failed - " . openssl_error_string());
    }
}

echo encryptCard();
