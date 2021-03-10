<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include './_COMMANDS/SummaryReport.php';

$SummaryReport = new SummaryReport();


#--------------------------------Main Dashboard-------------------------------------------------------------------------
#No of Disasters
$NoOfDisasters = $SummaryReport->NoOfDisasters();
echo $NoOfDisasters;

#Regions Affected
$RegionAffected = new ArrayObject();
$result = $SummaryReport->RegionsAffected();
while ($rows = mysqli_fetch_assoc($result)) {
    $RegionAffected->append($rows["Region.RegionName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $RegionAffected->count(); $i++) {
    echo $RegionAffected->offsetGet($i);
}

#Cities Affected
$CitiesAffected = new ArrayObject();
$result = $SummaryReport->CitiesAffected();
while ($rows = mysqli_fetch_assoc($result)) {
    $CitiesAffected->append($rows["City.CityName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $CitiesAffected->count(); $i++) {
    echo $CitiesAffected->offsetGet($i);
}

#Barangay Affected
$BarangayAffected = new ArrayObject();
$result = $SummaryReport->BarangayAffected();
while ($rows = mysqli_fetch_assoc($result)) {
    $BarangayAffected->append($rows["Barangay.BarangayName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $BarangayAffected->count(); $i++) {
    echo $CitiesAffected->offsetGet($i);
}

#Needs Per Quantity
$NeedsType = new ArrayObject();
$NeedsQuantity = new ArrayObject();
$result = $SummaryReport->NeedsPerQuantity();
while ($rows = mysqli_fetch_assoc($result)) {
    $NeedsType->append($rows["Needs.NeedsType"]);
    $NeedsQuantity->append($rows["Needs.Quantity"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $NeedsType->count(); $i++) {
    echo $NeedsType->offsetGet($i).":".$NeedsQuantity->offsetGet($i);
}

#No of Vicitims
$NoOfDisasters = (int)$SummaryReport->NoOfVictims();
echo $NoOfDisasters;

#No of Families
$NoOfDisasters = (int)$SummaryReport->NoOfFamiliesAffected();
echo $NoOfDisasters;
#----------------------------------------------END OF MAIN DASHBOARD----------------------------------------------------


#---------------------------------------------Disaster Table Report Summary---------------------------------------------
$DisasterID=new ArrayObject();
$result=$SummaryReport->getDisasterID();
while($rows= mysqli_fetch_assoc($result)){
    $DisasterID->append($rows["Disaster.DisasterID"]);
}

for ($i = 0; $i < $DisasterID->count(); $i++) {
    echo "Disaster Type: ".$SummaryReport->getDisasterType($DisasterID->offsetGet($i));
    echo "Disater Date Reported".$SummaryReport->getDisasterDate($DisasterID->offsetGet($i));
    
    #Regions Affected
$RegionAffected = new ArrayObject();
$result = $SummaryReport->RegionsAffectedOnDisaster($DisasterID->offsetGet($i));
while ($rows = mysqli_fetch_assoc($result)) {
    $RegionAffected->append($rows["Region.RegionName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $RegionAffected->count(); $i++) {
    echo $RegionAffected->offsetGet($i);
}

#Cities Affected
$CitiesAffected = new ArrayObject();
$result = $SummaryReport->CitiesAffectedOnDisaster($DisasterID->offsetGet($i));
while ($rows = mysqli_fetch_assoc($result)) {
    $CitiesAffected->append($rows["City.CityName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $CitiesAffected->count(); $i++) {
    echo $CitiesAffected->offsetGet($i);
}

#Barangay Affected
$BarangayAffected = new ArrayObject();
$result = $SummaryReport->BarangayAffectedOnDisaster($DisasterID->offsetGet($i));
while ($rows = mysqli_fetch_assoc($result)) {
    $BarangayAffected->append($rows["Barangay.BarangayName"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $BarangayAffected->count(); $i++) {
    echo $CitiesAffected->offsetGet($i);
}

#Needs Per Quantity
$NeedsType = new ArrayObject();
$NeedsQuantity = new ArrayObject();
$result = $SummaryReport->NeedsPerQuantityOnDisaster($DisasterID->offsetGet($i));
while ($rows = mysqli_fetch_assoc($result)) {
    $NeedsType->append($rows["Needs.NeedsType"]);
    $NeedsQuantity->append($rows["Needs.Quantity"]);
}

#getting per value in ArrayObject
for ($i = 0; $i < $NeedsType->count(); $i++) {
    echo $NeedsType->offsetGet($i).":".$NeedsQuantity->offsetGet($i);
}

#No of Vicitims
$NoOfDisasters = (int)$SummaryReport->NoOfVictimsOnDisaster($DisasterID->offsetGet($i));
echo $NoOfDisasters;

#No of Families
$NoOfDisasters = (int)$SummaryReport->NoOfFamiliesAffectedOnDisaster($DisasterID->offsetGet($i));
echo $NoOfDisasters;
            
}

