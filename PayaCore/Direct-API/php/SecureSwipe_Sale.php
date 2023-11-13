<?php
    /*----------------------------------------------
    Author: SDK Support Group
    Company: Paya
    Contact: sdksupport@nuvei.com
    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    !!! Samples intended for educational use only!!!
    !!!        Not intended for production       !!!
    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    -----------------------------------------------*/
    
    // your developer credentials
    // client_id may be referred to as "Consumer Key".
    // client_key may be referred to as "Consumer Secret".
    $client_id = "W8yvKQ5XbvAn7dUDJeAnaWCEwA4yXEgd";
    $client_key = "iLzODV5AUsCGWGkr";
	

    // you (or your client's) merchant credentials.
    // grab a test account from us for development!
    $merchant_id = "173859436515";
    $merchant_key = "P1J2V8P2Q3D8";
	
	  // a standard unix timestamp. a request must be received within 60s
    // of its timestamp header.
    $timestamp = (string)time();
	
	 // the nonce can be any unique identifier -- guids and timestamps work well
    $nonce = $timestamp;
    
    // setting up the request data itself
    $verb = "POST";
    $url = "https://api-cert.sagepayments.com/bankcard/v1/charges?type=Sale";
    
	$requestData = [
        // this is a pretty minimalistic example...
        // complete reference material is available on the dev portal.
        "Retail" => [
            "OrderNumber" => "Invoice " . rand(0, 1000),
            "Amounts" => [
                "Total" => "1"
            ],
            "trackData" => [
                "value" => "%B5454000000005454^CHASE PAYMENTECH TEST CARD^21120000000000000000?;5454000000005454=21120000000000000000?|0600|1D1D14114BE08CF57D342297AA6E1BDE4AC6292C2E4A0AEA1648739C84B8CC556AC49141D924DA3ABD522808381DA6A37D60FDF455FFE1C38A91D79B4590D19CD06A7DC0B7DD61C2|D0C1BF8A300BFE3E4D8B0EF0C4DEB2548D684337EE3EACA4BA0289BDFBE17DAD86DD0205F0B76348||61403000|401ACFE022BAD2B940C472ED40C31B18D1EFB765AE4659B4925568F24B491E93207F03766BC9691223D18D4AF389779CF097FCC9CF668C11|B02A41F120910AA|C78A4591B8A32A91|9011880B02A41F0001B0|A214||1000",
				"format" => "MagtekEncrypted"
            ]
        ]
    ];
    // convert to json for transport
    $payload = json_encode($requestData);

    // the request is authorized via an HMAC header that we generate by
    // concatenating certain info, and then hashing it using our client key
    $toBeHashed = $verb . $url . $payload . $merchant_id . $nonce . $timestamp;
    $hmac = hash_hmac(
        "sha512", // use the SHA-512 algorithm...
        $toBeHashed, // ... to hash the combined string...
        $client_key, // .. using your private dev key to sign it.
        true // (php returns hexits by default; override this)
    );
    // convert to base-64 for transport
    $hmac_b64 = base64_encode($hmac);

    // ok, let's make the request! cURL is always an option, of course,
    // but i find that file_get_contents is a bit more intuitive.
    $config = [
        "http" => [
            "header" => [
                "clientId: " . $client_id,
                "merchantId: " . $merchant_id,
                "merchantKey: " . $merchant_key,
                "nonce: " . $nonce,
                "timestamp: " . $timestamp,
                "authorization: " . $hmac_b64,
                "content-type: application/json",
            ],
            "method" => $verb,
            "content" => $payload,
            "ignore_errors" => true // exposes response body on 4XX errors
        ]
    ];
    $context = stream_context_create($config);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    
    echo '<pre>';
    print_r($response);
    echo '</pre>';

?>
