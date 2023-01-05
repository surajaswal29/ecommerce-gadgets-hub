<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4236fbf78a804368f666cea8398",
                  "X-Auth-Token:test_19d1cdebfc36e3bf8aaee9d620f"));
$payload = Array(
    'purpose' => 'To Buy Product',
    'amount' => $_SESSION['tot_price'],
    'phone' => $_SESSION['mob_no'],
    'buyer_name' => $_SESSION['fname'].$_SESSION['lname'],
    'redirect_url' => 'http://localhost/mb-enterprise/thank.php',
    'send_email' => true,
    // 'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => $_SESSION['email_id'],
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response=json_decode($response);
$_SESSION['payment_id'] = $response->payment_request->id;
$pay_url=$response->payment_request->longurl;
// function pay($p_rd){
    ?>
        <script>
          window.location.href='<?php echo $pay_url?>';
        </script>
    <!-- //   die(); -->
    <!-- //   } -->
    <!-- //   pay($pay_url); -->
<!-- // header("location:".$response->payment_request->longurl) -->
<!-- // echo"<pre>"; -->
<!-- // print_r($response); -->

<!-- ?> -->

