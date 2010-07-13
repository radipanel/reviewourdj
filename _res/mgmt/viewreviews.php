<?php

	if( !preg_match( "/index.php/i", $_SERVER['PHP_SELF'] ) ) { die(); }

?>
<form action="" method="post" id="viewReviews">

	<div class="box">

		<?php

			// Check if a user has been selected
			if ( $_POST['submit'] ) {

				// First we get their check their ID from the POST submission, but we clean it first (Thanks Yutes)
				$id = $_POST['username'];

				if ( !is_numeric( $id ) {

					echo "<div class=\"square bad\" style=\"margin-bottom: 0px;\">";
					echo "<strong>Sorry</strong>";
					echo "<br />";
					echo "The id submitted is not valid. Please go back and try again.";
					echo "</div>";

					die();
				}

				// Then we turn that into a username!
				$username = $db->query( "SELECT username FROM users WHERE id='{$id}'" );
				$username = mysql_result($username,"username");

			?>
			
				<div class="square title">
					<strong>DJ Reviews for <?php echo $username; ?></strong>
				</div>

				<div class="content">
					<?php
					// Time to get their reviews!
					$reviews = $db->query( "SELECT * FROM reviews WHERE dj='{$id}'" );
					$num = $db->num( $reviews );

					$j = "a";

					// And now to format them ;)
					while( $array = $db->assoc( $reviews ) ) {

						echo "<div class=\"row {$j}\" id=\"review_{$array['id']}\">";
						echo "<strong>From:</strong> " . $array['habbo'];
						echo "<br />";
						echo "<strong>Received:</strong> " . date("d.m.Y", $array['time']);
						echo "<br />";
						echo "<strong>IP:</strong> " . $array['ip'];
						echo "<br />";
						echo "<strong>Review:</strong> " . $array['review'];					
						echo "</div>";

						$j++;

						if( $j == "c" ) {			
							
								$j = "a";
			
						}

					}

					if ($num == "0" ) {

						echo "<div class=\"square bad\" style=\"margin-bottom: 0px;\">";
						echo "<strong>Sorry</strong>";
						echo "<br />";
						echo "No reviews have been submitted for this user.";
						echo "</div>";

					}

					?>
				</div>
			<?php
			}
			else {

		?>
				<div class="square title">
					<strong>View DJ Reviews</strong>
				</div>

				<div class="content">
					<p>Select a user from the drop down list below to view any reviews made for that user.</p>
					
					<table width="100%" cellpadding="3" cellspacing="0">

					<?php
					// First, we grab all the users
					$getUsers = $db->query( "SELECT * FROM users" );

					// Then use a while loop to create the array with it's values
					while( $array = $db->assoc( $getUsers ) ) {
					
							$users[$array['id']] = $array['username'];
						
					}
	
					echo $core->buildField( "select",
													"required",
													"username",
													"Username",
													"Whose reviews shall we look at?",
													$users);
			
					?>
	
					</table>

				<div class="box" align="right">
					<input class="button" type="submit" name="submit" value="Submit" />
				</div>

				<?php
					echo $core->buildFormJS('viewReviews');
				}
		?>
	</div>

