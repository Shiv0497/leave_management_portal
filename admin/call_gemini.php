<?php

function geminiquiklrn(){
    
    $json = '';

    // $api_key = "AIzaSyCgcwLhlD40o7TU-r5G-L8zIi-zK6iDnnQ"; 
    $api_key = "AIzaSyA4im-nJGK0kMfW6sVI9oyGOJse_oSakhQ"; 
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=$api_key";

    $data = array(
        'contents' => array(
            array(
                'parts' => array(
                    array(
                        'text' => $input . ' ' . $json
                    )
                )
            )
        )
    );

    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );

    $response = curl_exec($ch);
    curl_close($ch);

    // return $response;

    $decoded_response = json_decode($response, true);
    if (isset($decoded_response['candidates']) && !empty($decoded_response['candidates'])) {
    $content = $decoded_response['candidates'][0]['content'];
    $text = $content['parts'][0]['text'];
    // return $text; 
    echo $text;
    } else {
    // return "No content found."; 
    echo "xyz";
    }

}

// geminiquiklrn1();


function geminiquiklrn1(){

    $input = 'Hello Guys i am back with the new video, today i am with priti , not kabir singh wali priti, she is priti mam (a PROFESSOR). i m worried for her nowadays. she wanted to buy a ipad however life isnt stable.Thats sad to hear, isnt it so??.Anyways I suggested her to go for a part time job/tution so that extra earning can be done. with the help of that she could able to buy a ipad and fulfill her dream to make image on ipads....

    given is my statement i want to find out  reason based on given statement
    like marriage, accident, xyz or any other
    response should be in maximum two words only';
    $api_key = "AIzaSyA4im-nJGK0kMfW6sVI9oyGOJse_oSakhQ"; 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' .  $api_key );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n      \"contents\": [{\n        \"parts\":[{\n          \"text\": \"Write a story about a magic backpack.\"}]}]}");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n      \"contents\": [{\n        \"parts\":[{\n          \"text\": ".$input."}]}]}");
    $response = curl_exec($ch);

    curl_close($ch);
    $decoded_response = json_decode($response, true);
    if (isset($decoded_response['candidates']) && !empty($decoded_response['candidates'])) {
    $content = $decoded_response['candidates'][0]['content'];
    $text = $content['parts'][0]['text'];
    // return $text; 
    echo $text;
    } else {
    // return "No content found."; 
    echo "xyz";
    }
}



function abc(){
    $ch = curl_init();
    echo "in";
    // $dynamicText = 'Hello Guys i am back with the new video, today i am with priti , not kabir singh wali priti, she is priti mam (a PROFESSOR). i m worried for her nowadays. she wanted to buy a ipad however life isnt stable.Thats sad to hear, isnt it so??.Anyways I suggested her to go for a part time job/tution so that extra earning can be done. with the help of that she could able to buy a ipad and fulfill her dream to make image on ipads....
    // given is my statement i want to find out  reason based on given statement
    // like marriage, accident, xyz or any other
    // response should be in maximum two words only';
    $dynamicText = 'Hi,I need a day off on 22nd April due to some personal work. Kindly approve my leave.Regards,Amjad Sayed  ';
    $dynamicText.="given is my statement i want to find out  reason based on given statement
    like marriage, accident, xyz or any other
    response should be in maximum two words only";

    $api_key = "AIzaSyDTdjProAkdaEBOtvErujuqQgr5c11OR5g"; 
    // JSON payload with the dynamicText variable
    $jsonPayload = json_encode([
        "contents" => [
            [
                "parts" => [
                    [
                        "text" => $dynamicText
                    ]
                ]
            ]
        ]
    ]);

    curl_setopt($ch, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' .  $api_key );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);

    $response = curl_exec($ch);
    curl_close($ch);
    $decoded_response = json_decode($response, true);
    if (isset($decoded_response['candidates']) && !empty($decoded_response['candidates'])) {
        $content = $decoded_response['candidates'][0]['content'];
        $text = $content['parts'][0]['text'];
        echo $text;
    } else {
        echo "No content found.";
    }
}

abc();
?>


