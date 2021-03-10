<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "rootPass123"; /* Password */
$dbname = "postdisastermgmt"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$return_arr = array();

// PARAMETERS FROM THE AJAX
$paramRegion = htmlspecialchars($_GET['paramRegion']);
$paramCity = htmlspecialchars($_GET['paramCity']);



// SQL STATEMENT
$query = "Select distinct City.CityName as city ,Region.RegionName as region , 
Count(distinct Victim.PersonID) as total from
(Disaster inner join Barangay on Disaster.BarangayID=Barangay.BarangayID 
inner join City on Barangay.CityID=City.CityID 
inner join Region on Region.RegionID=City.RegionID) 
inner join Victim on Disaster.DisasterID=Victim.DisasterID
where City.CityName='".$paramCity."' AND Disaster.DisasterID NOT IN (Select DisasterID from HistoryLog);";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $city = $row['city'];    // CITY
    $province = $row['city'];  // PROVINCE
    $region = $row['region'];   // REGION
    $count = $row['total'];    // COUNT

    $return_arr[] = array(
        "IDcity" => $city,
        "IDprovince" => $province,
        "IDregion" => $region,
        "IDcount" => $count
    );
}

// Encoding array in JSON format
echo json_encode($return_arr);
?>