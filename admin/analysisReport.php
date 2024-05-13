<html lang="en">
<head>

<style>
  .heading {
    font-weight: bold;
    color: blue;
  }
  .subpoint {
    margin-left: 20px;
  }
</style>
</head>
<body>
<?php
    include_once("header.php");
    ?>

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts 
                <!-- ============================================================== -->
              
                
                                  
            <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid -->
            <!-- ==============================================================-->
                
            <div class="container-fluid">
            <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title mb-0">SUGGESTIONS</h3>
                    </div>
                </div>
            </div>
           
<?php

    // $_GET['sentiment']
    $sentiment = ($_GET['sentiment']);
    $sentimentStatus = $_GET['sentimentStatus'];
    $count = $_GET['count'];

    if($sentimentStatus == 'Positive'){
        $dynamicText = "i am working as a principal in a respected university
                my faculty is taking leave for ".$sentiment." ".$count." times.
                So suggest me something so that he/she can come office regularly or 
                we can plan something same so he can enjoy here with us";
         
    }elseif($sentimentStatus == 'Negative'){
        $dynamicText = "i am working as a principal in a respected university
        my faculty is dealing with an ".$sentiment." ".$count." times.
        So suggest me something what i can do for her/him 
        so that he would be doing great and come to office regulary";
    }else{
        $dynamicText = "i am working as a principal in a respected university
        my faculty is taking leave for ".$sentiment." ".$count." times.
        So suggest me something so that he/she can come office regularly or 
        we can plan something same so he can enjoy here with us";
    }

    $ch = curl_init();
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
        $dynamicText = $content['parts'][0]['text'];
        // echo dynamicText;
    } else {
        echo "No content found.";
    }



  
    $lines = explode('*', $dynamicText);
    foreach ($lines as $line) {
      $line = trim($line);
      if (!empty($line)) {
        if (strpos($line, "**") === 0) {
          // Heading
          echo "<div class='heading'>" . substr($line, 2) . "</div>";
        } else {
          // Subpoint
          echo "<div class='subpoint'>* " . $line . "</div>";
        }
      }
    }

?>
<?php
include_once("footer.php");
?>
</body>
</html>