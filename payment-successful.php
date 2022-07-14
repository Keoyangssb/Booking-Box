<?php 

if(isset($_POST)){
    /* 
        get transaction details when customer paid
        using this response data to update your payment table or other...you want
    */
    $response = $_POST;
	$result = "";
	//print_r($response);

    /* 
        print example transaction details
    */

	$strorder = $_POST['req_reference_number'];
	
	list($reference_number, $transaction_type) = explode(',',$strorder);

	print_r($reference_number);
	echo '<br/>';
	print_r($transaction_type);
	echo '<br/>';
	//print_r("order id: " . $reference_number . " type : " .$transaction_type);

	//echo $reference_number;

    //file_put_contents('log_'.date("Ymd").'.log', $response, FILE_APPEND);

	$updateUrl = "";

	if($transaction_type == "1" || $transaction_type == 1){ //hotel
		$updateUrl = "http://150.95.81.50:8088/booking/hotel/payment/status";
		print_r("update hotel.......");
	}else if($transaction_type == "2" || $transaction_type == 2){ //rent car
		$updateUrl = "http://150.95.81.50:8088/update/rent/car/payment/status";
		print_r("update car.......");
	}else if($transaction_type == "3" || $transaction_type == 3){ //guest house
		$updateUrl = "http://150.95.81.50:8088/update/rent/room/payment/status";
		print_r("update house.......");
	}

	$body = '{
		"id": "'. $reference_number.'"
	  }';

	$ch = curl_init($updateUrl);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

	//   $ch = curl_init();
	//   curl_setopt($ch, CURLOPT_URL, $updateUrl);
	//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
	//   curl_setopt($ch, CURLOPT_POST, 1);
	//   curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	  $result = curl_exec($ch);
	  curl_close($ch);

	  $obj= json_decode($result, true);
	  $res_message = $obj['message'];
	  echo '<br/>';
      print_r("Payment Msg: " . $res_message);
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Payment</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
	  <link href="vendor/bootstrap/css/sweet-alert.css" rel="stylesheet">
	</head>
	<body class="bg-dark">

		<script>
			//myFunction();
			//let getorderid = getCookie("orderid");
			//let getordertypeid = getCookie("ordertypeid");

			let getresult = "<?php echo $res_message; ?>"; 

			if(getresult == "success"){

				//updateStatus(getorderid, getordertypeid);

				sweetAlert(
					{
					title: "Payment Successful.",
					text: "Thank you.",
					type: "success",
					showConfirmButton: false
					},
				);
			}else{
				sweetAlert(
					{
					title: "Update Payment Status Error.",
					type: "error",
					showConfirmButton: false
					},
				);
			}

				function myFunction() {
					const url = new URL(window.location.href);
					const urlParams = new URLSearchParams(url.search);
					if(urlParams == "" || urlParams == null){
						url.searchParams.set('reason_code', '100');
  						location.replace(url)
					}
				}

				function getCookie(cname) {
					let name = cname + "=";
					let decodedCookie = decodeURIComponent(document.cookie);
					let ca = decodedCookie.split(';');
					for(let i = 0; i <ca.length; i++) {
						let c = ca[i];
						while (c.charAt(0) == ' ') {
						c = c.substring(1);
						}
						if (c.indexOf(name) == 0) {
						return c.substring(name.length, c.length);
						}
					}
					return "";
				}

				function updateStatus(orderid, ordertypeid) {
					
					const data = { id: orderid };

					fetch('http://150.95.81.50:8088/booking/hotel/payment/status', {
					method: 'POST', // or 'PUT'
					headers: {
						'Content-Type': 'application/json',
					},
					body: JSON.stringify(data),
					})
					.then(response => response.json())
					.then(data => {
					console.log('Success:', data);
					})
					.catch((error) => {
					console.error('Error:', error);
					});

					alert("update order id " + getorderid + " complete ");

				}

		</script>
		
	</body>
</html>