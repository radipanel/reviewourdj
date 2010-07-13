<?php
	// Include the required glob.php file
	require_once( "../_inc/glob.php" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>

		<title>radiPanel: Review Our DJ</title>

		<style type="text/css" media="screen">

			body {

				background: #ddeef6;
				padding: 0;
				margin: 0;

			}

			body, a, input, select, textarea {

				font-family: Verdana, Tahoma, Arial;
				font-size: 11px;
				color: #333;
				text-decoration: none;

			}

			a:hover {
			
				text-decoration: underline;
			
			}

			form {

				padding: 0;
				margin: 0;

			}

			.wrapper {

				background-color: #fcfcfc;
				width: 350px;
				margin: auto;
				padding: 5px;
				margin-top: 15px;

			}

			.title {

				padding: 5px;	
				margin-bottom: 5px;
				font-size: 14px;
				font-weight: bold;
				background-color: #eee;
				color: #444;

			}

			.content {

				padding: 5px;

			}

			.good, .bad {

				padding: 5px;	
				margin-bottom: 5px;

			}

			.good strong, .bad strong {

				font-size: 12px;
				font-weight: bold;

			}

			.good {

				background-color: #d9ffcf;
				border-color: #ade5a3;
				color: #1b801b;

			}

			.bad {

				background-color: #ffcfcf;
				border-color: #e5a3a3;
				color: #801b1b;

			}

			input, select, textarea {

				border: 1px #e0e0e0 solid;
				border-bottom-width: 2px;
				padding: 3px;

			}

			input {

				width: 170px;

			}

			input.button {

				width: auto;
				cursor: pointer;
				background: #eee;

			}

			select {

				width: 176px;

			}

			textarea {

				width: 288px;

			}

			label {

				display: block;
				padding: 3px;

			}

		</style>

	</head>

	<body>

		<div class="wrapper">

			<div class="title">

				Review Our DJ
			
			</div>

			<div class="content">
				<?php
					// Check if the form has been submitted
					if( $_POST['submit'] ) {

						// The form has been submitted
						try {
							
							// Do my stuff once I've figured out a database schema
						}
					}
				?>

				<p><strong>Feel like commenting on our presenting team here? Want to vent your frustration?</strong> Use the form below to submit your own review of any one of our DJ's!</p>

			</div>

		</div>

	</body>
</html>