<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Payment</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
		<link href="vendor/bootstrap/css/sweet-alert.css" rel="stylesheet">
	</head>
	<body class="bg-dark">
		<script>
			//myFunction();
				sweetAlert(
					{
					title: "Payment Cancelled.",
					type: "error",
					showConfirmButton: false
					},
				);
			
				function myFunction() {
					const url = new URL(window.location.href);
					const urlParams = new URLSearchParams(url.search);
					if(urlParams == "" || urlParams == null){
						url.searchParams.set('reason_code', '00');
  						location.replace(url)
					}
				}	
				
		</script>
		
	</body>
</html>