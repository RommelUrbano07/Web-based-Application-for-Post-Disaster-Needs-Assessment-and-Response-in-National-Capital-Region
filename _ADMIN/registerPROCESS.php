<?php session_start(); ?>
<html>
    <body>
	<?php
	// Determine how many forms are there in the register page.
	echo "formLength: " . htmlspecialchars($_REQUEST["formLength"]) . "<br>";
	$formLen = (int) htmlspecialchars($_REQUEST["formLength"]);
	// Place holder for the user inputs
	$FirstName = new ArrayObject ();
	$MiddleName = new ArrayObject ();
	$LastName = new ArrayObject ();
	$Suffix = new ArrayObject ();
	$BirthDate = new ArrayObject ();
	$ContactNo = new ArrayObject ();
	$Subdivision = new ArrayObject ();
	$HouseNo = "";
	$StreetName = "";
	$Barangay = "";
	$City = "";
	$Region = "";
	$HeadStatus = 1;
	$Gender = new ArrayObject ();;
	try {
		include '../_COMMANDS/Client_Commands.php';
		$ClientCommands = new Client_Commands();
                include '../_COMMANDS/Notifications.php';
		$Notifications = new Notifications();
		$RegisterFamily = htmlspecialchars($_REQUEST["lastName0"]);
		echo $ClientCommands->registerFamily($RegisterFamily);
		for ($i = 0; $i < $formLen; $i++) {
			if ($i == 0) {
				$FirstName->append((htmlspecialchars($_REQUEST["firstName" . $i])));
				$MiddleName->append((htmlspecialchars($_REQUEST["middleName" . $i])));
				$LastName->append((htmlspecialchars($_REQUEST["lastName" . $i])));
				$Suffix->append((htmlspecialchars($_REQUEST["suffix" . $i])));
				$BirthDate->append((htmlspecialchars($_REQUEST["birthDate" . $i])));
				$ContactNo->append((htmlspecialchars($_REQUEST["contactNo" . $i])));
				$HouseNo = htmlspecialchars($_REQUEST["houseNo" . $i]);
				$StreetName = htmlspecialchars($_REQUEST["streetName" . $i]);
				$Gender->append(htmlspecialchars($_REQUEST["gender" . $i]));
				$Barangay = htmlspecialchars($_REQUEST["barangay"]);
				$City = htmlspecialchars($_REQUEST["city"]);
				$Region = htmlspecialchars($_REQUEST["region"]);
				$Subdivision->append((htmlspecialchars($_REQUEST["subdivision"])));
				$HeadStatus = 1;
				if ($ClientCommands->PersonChecker($Barangay, $Region, $City, $FirstName->offsetGet($i), $MiddleName->offsetGet($i), $LastName->offsetGet($i), $BirthDate->offsetGet($i), $ContactNo->offsetGet($i), $Suffix->offsetGet($i), $Gender->offsetGet($i), $HouseNo, $StreetName, $Subdivision->offsetGet(0), $HeadStatus . "") >= '1') {
					
					
						echo'<script>alert("Register Successful");</script>';
					} else {
						
						echo'<script>alert("Register Error");</script>';
						
					}
				} else {
					$FirstName->append((htmlspecialchars($_REQUEST["firstName" . $i])));
					$MiddleName->append((htmlspecialchars($_REQUEST["middleName" . $i])));
					$LastName->append((htmlspecialchars($_REQUEST["lastName" . $i])));
					$Suffix->append((htmlspecialchars($_REQUEST["suffix" . $i])));
					$BirthDate->append((htmlspecialchars($_REQUEST["birthDate" . $i])));
					$ContactNo->append((htmlspecialchars($_REQUEST["contactNo" . $i])));
					$Gender->append(htmlspecialchars($_REQUEST["gender" . $i]));
					$HeadStatus = 0;
					if ($ClientCommands->PersonChecker($Barangay, $Region, $City, $FirstName->offsetGet($i), $MiddleName->offsetGet($i), $LastName->offsetGet($i), $BirthDate->offsetGet($i), $ContactNo->offsetGet($i), $Suffix->offsetGet($i), $Gender->offsetGet($i), $HouseNo, $StreetName, $Subdivision->offsetGet(0), $HeadStatus . "") >= '1') {						
						echo'<script>alert("Register Successful");</script>';						
					} else {
						
						echo'<script>alert("Register Error");</script>';
						
					}
				}
			}
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
		 for ($i = 0; $i < $formLen; $i++) {
			echo("'" . $FirstName->offsetGet($i) . "','" . $MiddleName->offsetGet($i) . "','" . $LastName->offsetGet($i) . "','" . $Suffix->offsetGet($i) . "','" . $BirthDate->offsetGet($i) . "','" . $ContactNo->offsetGet($i) . "','" . $HouseNo . "','" . $StreetName . "','" . $Barangay . "','" . $City . "','" . $Region . "','" . $Subdivision->offsetGet(0) . "'<br>");
		}
		//  uc.register("'". firstName.get(i] . "','" . middleName.get(i] . "','" . lastName.get(i] . "','" . suffix.get(i] . "','" . birthDate.get(i] . "','" . contactNo.get(i] . "'"); // . "','" . houseNo.get(i] . "','" . streetName.get(i] . "'");
		// response.sendRedirect("register.html");
                header("location: registerfamily.php");
                exit();
		?>
		<form action="registerfamily.php" method="POST">
			<input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
			<input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
			<input type="submit" value="RETURN" />
		</form>
	</body>
</html>