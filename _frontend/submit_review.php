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
							
							// Right, we have their data, so we check it and clean it up
							$habbo   = $core->clean( $_POST['habbo'] );
							$dj      = $core->clean( $_POST['dj'] );
							$review = $core->clean( $_POST['review'] );
							$ip      = $_SERVER['REMOTE_ADDR'];
							$time    = time();

							// Check for blank fields
							if ( !$habbo or !is_numeric( $dj) or !$review ) {

								// They have a problem
								throw new Exception( "All fields are required!" );
							}
							else {

								// Everything is fine, so now to add our cleaned data to the database!
								$db->query( "INSERT INTO reviews VALUES (NULL, '{$habbo}', '{$dj}', '{$review}', '{$ip}', '{$time}');" );

								echo "<div class=\"good\">";
								echo "<strong>Success</strong>";
								echo "<br />";
								echo "Your review has been successfully submitted!";
								echo "</div>";
							}
						}
						catch( Exception $e ) {
					
							echo "<div class=\"bad\">";
							echo "<strong>Error</strong>";
							echo "<br />";
							echo $e->getMessage();
							echo "</div>";
					
						}
					}
				?>

				<p><strong>Feel like commenting on our presenting team here? Want to vent your frustration?</strong> Use the form below to submit your own review of any one of our DJ's!</p>

				<form action="" method="post">
			
				<label for="habbo">Habbo Name:</label>
				<input type="text" name="habbo" id="habbo" maxlength="255" />
				
				<br /><br />
					
				<label for="dj">DJ:</label>
				<select name="dj" id="dj">

					<?php

						$users = $db->query( "SELECT * FROM users" );

						while( $array = $db->assoc( $users ) ) {

					?>

					<option value="<?php echo $array['id']; ?>">
						DJ <?php echo $array['username']; ?>
					</option>


					<?php

						}

					?>

				</select>
				
				<br /><br />
				
				<label for="review">Review:</label>
				<textarea name="review" id="review" rows="10"></textarea>
				
				<br /><br />
				
				<input class="button" type="submit" name="submit" value="Submit" />
				
			</form>

			</div>

		</div>

	</body>
</html>
