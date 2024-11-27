<?php
	include('session.php');
	
	require_once('file_functions.php');
	require_once('blockchain.php');
	require_once('blockchain_functions.php');

	loadBlockchain("blockchain.ini", $simbaBlockchain);
	
	$connection_status = get_ini_value("keywords", "connection_status");
	if($connection_status != 1)
	{		
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<script language="javascript">';
		echo 'alert("Connection to Device - Failed")';
		echo '</script>';
		echo '</html>';
		
	}
?>
<!DOCTYPE html>
<html >

<head>
	<meta charset="UTF-8">
	<title>Blockchain Based Counterfeit Drugs Prevention System</title>	
	
	<link rel="stylesheet" href="css/reset.min.css">
	<link rel="stylesheet" href="css/style.php?theme=green">
	<link rel="stylesheet" href="css/modular.css">
	
	<!-------------------------------------
	//Auto Reload Page using AJAX 
	-------------------------------------->
	<script src="js/jquery.min.js"></script>
	<script src="js/ajax-functions.js"></script>
	
	<script type="text/javascript"> 
	function delay(ms){
	   var start = new Date().getTime();
	   var end = start;
	   while(end < start + ms) {
		 end = new Date().getTime();
	  }
	}
	$(document).ready(function() 
	{
		function functionToLoadFile() 
		{
			jQuery.get('getVariables.php?keywords>refresh=1', function(data) 
			{
				if (data == "1") 
				{
					document.getElementById('buzzer').play();
					delay(1000);
					$(location).attr('href', 'app.php');
					jQuery.get('setVariables.php?keywords>refresh=0');
				}
				setTimeout(functionToLoadFile, 5000);
			});
		}

		setTimeout(functionToLoadFile, 10);
	});

	</script>
	
	<!-------------------------------------
	//Auto Reload Page using AJAX - END
	-------------------------------------->
	
</head>

<body>
	<div class="cta" style="float: right; padding-top: 7px;">
		<span class="button-small">Welcome <?= ucfirst($_SESSION['normal_user']). " "; ?><em><a href="logout.php">Logout</a></em></span>
	</div>
	<div class="pen-title">
		<h1>Blockchain Based Counterfeit Drugs Prevention System</h1>
	</div>
	<audio id="buzzer"><source src="beep.ogg" type="audio/ogg"></audio>
	<div class="form-module form-module-large">
		<ul class="top-menu">
			<li><a class="active" href="app.php">Home</a></li>
			<li><a href="editBlock.php">Tamper DB</a></li>
			<li class="fr"><a class="side-menu" href="diffBlockchain.php"><img src="images/diff.png">Diff DB</a></li>
			<li class="fr"><a class="side-menu" href="viewDB.php" target="_blank"><img src="images/database.png">View DB</a></li>
			<li class="fr"><a class="side-menu" href="checkConnection.php"><img src="images/connection.png">Check Connection</a></li>
		</ul>
		
		<?php if(!checkBlockchainIntegrity($simbaBlockchain)): ?>
			<div class="content">
				<h2 class="headings" style="color: red;">Database corrupted</h2>
				<h2 class="headings">Please load an uncorrupted database</</h2>
				<div style="clear: both;"> </div>
				<br/>
				<form action="uploadBlockchain.php" method="post" enctype="multipart/form-data">
					<input type="file" name="blockchainDatabase" id="blockchainDatabase">
					<input type="submit" value="Upload Database" name="submit" value="Upload">
				</form>
				<div style="clear: both;"> </div>
				<br/>
			</div>
		<?php else: ?>
			<div class="content">
				<div style="clear: both;"> </div>
				<br/>
				
				<h2 class="headings fr">Total Events: <?php echo get_ini_value_in("blockchain.ini", "indexes", "last_block_index"); ?></h2>
				<h2 class="headings">Supply Chain Events <a href="clearDelivery.php">Clear Delivery</a></h2>
				<div style="clear: both;"> </div>
				<table>
					<tr>
						<th>S. No.</th>
						<th>Agent</th>
						<th>Location</th>
						<th>Temperature</th>
						<th>Lid Status</th>
						<th>Date</th>
						<th>Time</th>
					</tr>
					<?php
					
						$last_block_index = get_ini_value_in("blockchain.ini", "indexes", "last_block_index");
						for($block_id = "1"; $block_id <= $last_block_index; $block_id++)
						{
							$block_data = explode("*",get_ini_value_in("blockchain.ini", "block-{$block_id}", "data"));
							
							if($block_data[2] > 35)
							{
								$temperature_css = "red";
								$unsafe_drug = 1;
							}
							else
							{
								$temperature_css = "";
							}
							if($block_data[3] == "Open")
							{
								$lid_status_css = "red";
								$counterfiet_possibility = 1;
							}
							else
							{
								$lid_status_css = "";
							}
							
							echo "<td>" . $block_id . "</td>"; 
							echo "<td>" . $block_data[0] . "</td>"; 
							echo "<td>" . $block_data[1] . "</td>";
							echo "<td class=$temperature_css>" . $block_data[2] . "</td>";
							echo "<td class=$lid_status_css>" . $block_data[3] . "</td>";
							echo "<td>" . $block_data[4] . "</td>";
							echo "<td>" . $block_data[5] . "</td>";
							echo "</tr>";
						}
					?>
				</table>
				<div style="clear: both;"> </div>
				<br/>
				<?php 
					if(get_ini_value_in("blockchain.ini", "indexes", "last_block_index") > 0 && isset($counterfiet_possibility) && $counterfiet_possibility == 1)
					{
						echo "<h2 class='headings'>The lid is opened on the way, there is a great possibility that the drug is swaped for a fake one.</h2>";
					}
					else if(get_ini_value_in("blockchain.ini", "indexes", "last_block_index") > 0 && isset($unsafe_drug) && $unsafe_drug == 1)
					{
						echo "<h2 class='headings'>The drug is original, but there was some temperature fluctuations beyond the permissible limit. Please confirm with the manufacturer for further usage.</h2>";
					}
					else if(get_ini_value_in("blockchain.ini", "indexes", "last_block_index") > 0)
					{
						echo "<h2 class='headings'>The drug is original and in good condition.</h2>";
					}
					
					if(get_default_value('delivered') == "1")
					{
						echo "<h2 class='headings'>Drug delivered.</h2>";
					}
				?>
			</div>
		<?php endif; ?>
		
	<script src='js/jquery.min.js'></script>
	<script src="js/canvasjs.min.js"></script>

</body>
</html>