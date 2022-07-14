<?php
    function signParams($params, $secretKey){
        $dataToSign = array();
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as &$field) {
            $dataToSign[] = $field . "=" . $params[$field];
        }
        $joinedData = implode(",",$dataToSign);
        return base64_encode(hash_hmac('sha256', $joinedData, $secretKey, true));
    }

    $sid = sprintf("%06d", rand(0,999999));
    $access_key = "7913fc9357fe3c36a725c424c3257f83";
    $profile_id = "758D92EC-6896-43AD-A2F5-B352804EEEA0";
    $secret_key = "d025a48d377d4114b6eac4d0f3c78823ad9ff0b62ac14f13b22a6a849242936f25202c4399cd4a4aa4abea925691c5c972cb89431f334ea1b57d512a2af6ab5f4104e38ad23e4ef4b63fae48724d22728fb225b64a38415da4ab4256429898112bcbe3334cac465ab2c4a789148db9ea705c408e037c4b5caaf48f4555ede5e1";
    $merchant_id = "bcel_test_account";

    $params = array();
    $params['access_key'] = $access_key;
    $params['profile_id'] = $profile_id;
    $params['transaction_uuid'] = uniqid();
    $params['signed_date_time'] = gmdate("Y-m-d\TH:i:s\Z");
    $params['locale'] = 'en';
    $params['transaction_type'] = 'authorization';
    $params['reference_number'] = $_GET['orderid'] . "," .$_GET['ordertypeid']; //(int)(rand(0, 999999));
    $params['currency'] = $_GET['currency'];

    $params['device_fingerprint_id'] = $sid;

    $params['amount'] = $_GET['amount'];
    $params['bill_to_address_country'] = $_GET['country'];
    $params['bill_to_forename'] = $_GET['firstname'];
    $params['bill_to_surname'] = $_GET['lastname'];
    $params['bill_to_email'] = $_GET['email'];
    $params['bill_to_phone'] = $_GET['tel'];
    $params['bill_to_address_city'] = "";
    $params['bill_to_address_line1'] = "";
    $params['bill_to_address_postal_code'] = "";
    $params['merchant_secure_data1'] = "special message 1";
    $params['merchant_secure_data2'] = "special data 2";
    $params['merchant_secure_data3'] = "special data 3";

    //setcookie("orderid", $_GET['orderid'], time() + (86400 * 30));
    //setcookie("ordertypeid", $_GET['ordertypeid'], time() + (86400 * 30));

    $params['signed_field_names'] = '';
    $params['signed_field_names'] = implode(',', array_keys($params));

    $params['signature'] = signParams($params, $secret_key);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="vendor/jquery/jquery.min.js"></script>

	<title>Payment Bill</title>
	<style>
        *{
            font-family: "Consolas", monospace;
        }
		body{
			width: 100%;
			height: 100%;
			padding: 0;
			margin: 0;
            background-color: #eee;
		}
		.container{
			width: 100%;
			height: 100%;
			margin: auto;
			background-color: #fff;
            border: 1px solid #ddd;
            border-top: 8px solid #c6332a;
            top: 0px;
            position: relative;
            box-shadow: 0 3px 5px #ccc;
            text-align: center;
            padding-bottom: 20px;
		}
        h2, h3{
            padding: 0;
            margin: 0;
            color: #333;
        }
        .title{
            padding: 20px 0;
            color: #333;
        }
        .border{
            border-bottom: 2px solid #c6332a;
            width: 40%;
            margin: auto;
        }
        .btn-payment{
            border: none;
            outline: none;
            padding: 14px 40px;
            color: #fff;
            background-color: #c6332a;
            border-radius: 3px;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 3px 3px #ccc;
            margin-top: 20px;
        }
        .btn-payment:hover{
            background-color: #b12d27;
        }
        .details{
            padding: 20px;
        }
        p {
            padding: 1px 0;
            line-height: 0.4rem;
        }
        .amount{
            padding-top: 30px;
        }
	</style>
</head>

<body>

    <div class="container">
        <div class="title">
            <h1>Payment Bill</h1>
            <div class="border"></div>
        </div>
        <div class="content">
            <form action='https://testsecureacceptance.cybersource.com/oneclick/pay' method='post'>
                <!-- display payment details -->
                <div class="details">
                    <div>
                        <h3>Billing Information</h3>
                        <div>
                            <p>Full name: <?=$params['bill_to_forename']?> <?=$params['bill_to_surname']?></p>
                            <p>Tel: <?=$params['bill_to_phone']?></p>
                        </div>
                    </div>
                    <div class="amount">
                        <h3>Amount: <?=number_format($params['amount'])?> <span style="text-transform: uppercase;"><?=$params['currency']?></span></h3>
                    </div>
                </div>
                <!-- end display payment details -->
                <!-- data required for submit form -->
                <?php
                    foreach ($params as $key => $val){
                        echo "<input type='hidden' name='$key' value='$val' />\t\n";
                    }
                ?>
                <!-- end data required for submit form -->
                <input class='btn-payment' type='submit' value='Make Payment'/>
            </form>
        </div>
        <p style="background:url(https://h.online-metrix.net/fp/clear.png?org_id=k8vif92e&amp;session_id=<?=$merchant_id . $sid?>&amp;m=1)"></p>
        <img src="https://h.online-metrix.net/fp/clear.png?org_id=k8vif92e&amp;session_id=<?=$merchant_id . $sid?>&amp;m=2" alt="">
        <object type="application/x-shockwave-flash" data="https://h.onlinemetrix.net/fp/fp.swf?org_id=k8vif92e&amp;session_id=<?=$merchant_id . $sid?>" width="1" height="1" id="thm_fp">
            <param name="movie" value="https://h.online-metrix.net/fp/fp.swf?org_id=k8vif92e&amp;session_id=<?=$merchant_id . $sid?>"/>
            <div></div>
        </object>
         <script src="https://h.online-metrix.net/fp/check.js?org_id=k8vif92e&amp;session_id=<?=$merchant_id . $sid?>" type="text/javascript"></script>
    </div>

    <!-- <script>
        $(document).ready(function () { 
            var getorderid = "<?php echo $_GET['orderid']; ?>";
            //alert("user id : " + getorderid);       
            setCookie(getorderid, 1);
        });

        function setCookie(orderid, ordertypeid) {
            //var cookie = "orderid" + "=" + orderid + ";" + "ordertypeid" + "=" + ordertypeid;
            document.cookie = "orderid = " + orderid;
            document.cookie = "ordertypeid = " + ordertypeid;
            //alert("seted");   
        }

	</script> -->

</body>
</html>