<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DamageReport
 *
 * @author Asus
 */
class DamageReport {

    public $servername = "";
    public $username = "";
    public $password = "";
    public $database = "";
    public $conn = "";

    function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "rootPass123";
        $this->database = "postdisastermgmt";
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function createDisasterReport($NeedsID, $PersonID, $DisasterID, $Subdivision, $HouseNo, $StreetName) {
        try {
            foreach ($PersonID as $ID1) {
                foreach ($NeedsID as $ID2) {
                    $sql = "Insert Into Victim(NeedsID,PersonID,DisasterID,TimeOfReport,Subdivision,HouseNo,StreetName) Values"
                            . "('" . $ID2 . "','" . $ID1 . "','" . $DisasterID . "',curtime(),'" . $Subdivision . "',"
                            . "'" . $HouseNo . "','" . $StreetName . "')";
                    $result = mysqli_query($this->conn, $sql);
                    if ($result == TRUE) {
                        echo('<script>alert("Report registered!");</script>');
                    }
                }
            }
            return TRUE;
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function checkDisasterReportID($NeedsID, $PersonID) {
        try {
            $sql = "Select DisasterReportID from Disaster "
                    . "where PersonID='" . $PersonID . "'"
                    . "AND NeedsID='" . $NeedsID . "')";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["DisasterReportID"];
                }
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

    function registerDisaster($DisasterType, $Region, $City, $Barangay) {
        try {
            require_once 'Client_Commands.php';
            $BarangayID = new Client_Commands();
            $sql = "Insert Into Disaster(DisasterType,BarangayID,DateOfOccurence) Values('" . $DisasterType . "','" . $BarangayID->BarangayChecker($Region, $City, $Barangay) . "', curdate())";
            if ($this->conn->query($sql) === TRUE) {
                $sql = "Select MAX(DisasterID) from Disaster";
                $result = mysqli_query($this->conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["MAX(DisasterID)"];
                }
            } else {
                echo('<script>alert("Registry Fail!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

    function registerNeeds($Need, $Quantity, $Message) {
        try {
            $sql = "Insert into Needs(NeedsType,Quantity,Message) Values('" . $Need . "','" . $Quantity . "',"
                    . "'" . $Message . "')";
            if ($this->conn->query($sql) === TRUE) {
                $sql = "Select MAX(NeedsID) as max from Needs";
                $result = mysqli_query($this->conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["max"];
                }
            } else {
                echo('<script>alert("Registry Fail!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

    function returnVictimCredentials($VictimID) {
        try {
            $sql = "Select NeedsID ,PersonID, DisasterID, curdate() as date, curtime() as time,Subdivision,HouseNo,StreetName from Victim where VictimID= '" . $VictimID . "' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("Error Saving!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function registerHistoryLog($VictimID) {
        try {
            $DamageReport = new DamageReport();
            $result = $DamageReport->returnVictimCredentials($VictimID);
            while ($rows = mysqli_fetch_assoc($result)) {
                $sql = "Insert Into HistoryLog(NeedsID,PersonID,DisasterID,DateOfResolution,TimeOfResolution,Subdivision,HouseNo,StreetName)"
                        . " VALUES ('" . $rows['NeedsID'] . "','" . $rows['PersonID'] . "','" . $rows['DisasterID'] . "','" . $rows['date'] . "','" . $rows['time'] . "','" . $rows['Subdivision'] . "','" . $rows['HouseNo'] . "','" . $rows['StreetName'] . "')";
                $result = mysqli_query($this->conn, $sql);
                if ($result == TRUE) {
                    return TRUE;
                } else {
                    echo('<script>alert("Error Saving");</script>');
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function PersonChecker($firstName, $lastName, $middleName, $Suffix) {
        try {
            $sql = "Select PersonID from Person where FirstName='" . $firstName . "' AND "
                    . "LastName='" . $lastName . "' AND MiddleName='" . $middleName . "' AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['PersonID'];
                }
            } else {
                echo('<script>alert("No person found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function getDisasterID($CalamityType, $BarangayID, $DateOfOccurence, $TimeOfOccurence) {
        try {
            $sql = "Select Disaster.DisasterID "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID)"
                    . "where Disaster.DisasterType='" . $CalamityType . "'AND Disaster.BarangayID='" . $BarangayID . "'AND Disaster.DateOfOccurence='" . $DateOfOccurence . "'"
                    . "AND Victim.TimeOfReport='" . $TimeOfOccurence . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Disaster.DisasterID'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

    function returnDisasterDate($DisasterID) {
        try {
            $sql = "Select Disaster.DateOfOccurence as date "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID ) "
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['date'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnDisasterTime($DisasterID) {
        try {
            $sql = "Select Victim.TimeOfReport as time "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID ) "
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['time'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnRCB($DisasterID) {
        try {
            $sql = "Select Region.RegionName as region , City.CityName as city , Barangay.BarangayName as barangay "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID ) "
                    . "where Disaster.DisasterID='" . $DisasterID . "' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("No credentials found!");</script>');
            }
            return null;
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnNeedsInfo($DisasterID) {
        try {
            $sql = "Select distinct Needs.NeedsType as type, Needs.Quantity as quantity "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("No credentials found!");</script>');
            }
            return null;
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnVictims($DisasterID) {
        try {
            $sql = "Select distinct Person.FirstName as fname ,Person.LastName as lname ,Person.MiddleName as mname,Person.Suffix as suffix	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID ) "
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("No credentials found!");</script>');
            }
            return null;
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnSubd_HouseNo_St($DisasterID) {
        try {
            $sql = "Select Victim.Subdivision as subdivision ,Victim.HouseNo as houseno,Victim.StreetName as streetname	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("No credentials found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function DeleteReport($VictimID) {
        try {
            $sql = "Delete from Victim where VictimID='" . $VictimID . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("Record deleted successfully!");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " '. $sql .' "<br>" '. $this->conn->error.'");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function returnVictimID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select Victim.VictimID as victim from (Victim inner join Person on Victim.PersonID=Person.PersonID)"
                    ." where Person.FirstName='" . $FirstName . "' "
                    . "AND Person.MiddleName='" . $MiddleName . "' "
                    . "AND Person.LastName='" . $LastName . "' "
                    . "AND Person.Suffix='" . $Suffix . "' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else { 
                echo('<script>alert("'.$FirstName.' '.$LastName.' '.$MiddleName.' '.$Suffix.'");</script>');
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return $result;
    }

    function VictimCount($DisasterID) {
        try {
            $sql = "Select Count(Victim.VictimID)	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Count(Victim.VictimID)'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function NeedsCount($DisasterID) {
        try {
            $sql = "Select Count(Needs.NeedsID)	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Count(Needs.NeedsID)'];
                }
            } else {
                echo('<script>alert("No disaster found");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnVictimCount() {
        $DamageReport = new DamageReport();
        $condition = $DamageReport->checkDisasterTableContent();
        if ($condition == FALSE) {
            try {
                $sql = "Select Count(distinct VictimID) as total "
                        . "from Victim inner join disaster on Victim.disasterID=disaster.disasterID where Disaster.DisasterID == 
                        (SELECT Disaster.DisasterID as disaster FROM DISASTER
                        WHERE DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)

                        UNION

                        SELECT HistoryLog.DisasterID as disaster FROM HistoryLog
                        WHERE DisasterID NOT IN (SELECT DisasterID FROM Disaster)) ";

                $result = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            return $row['total'];
                        }
                    }
                }
            } catch (Exception $exc) {
                echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
                return 0;
            }
            return 0;
        } else {
            try {
                $sql = "Select Count(distinct VictimID) as total "
                        . "from Victim inner join disaster on Victim.disasterID=disaster.disasterID where Disaster.DisasterID > 0";

                $result = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            return $row['total'];
                        }
                    }
                }
            } catch (Exception $exc) {
                echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
                return 0;
            }
            return 0;
        }
    }

    function checkDisasterTableContent() {
        try {
            $sql = "Select Count(DisasterID) as count from Disaster where DisasterID>0";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    if($row['count'] == "1"){
                        return TRUE;
                    }
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function getAllDisasterID() {
        $DamageReport = new DamageReport();
        $condition = $DamageReport->checkDisasterTableContent();
        if ($condition == FALSE) {
            try {
                $sql = "SELECT Disaster.DisasterID as disaster FROM Disaster
                        WHERE DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)

                        UNION

                        SELECT HistoryLog.DisasterID as disaster FROM HistoryLog
                        WHERE DisasterID NOT IN (SELECT DisasterID FROM Disaster)";
                $result = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return $result;
                } else {
                    echo('<script>alert("No disaster found!");</script>');
                }
            } catch (Exception $exc) {
                echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
            }
            return $result;
        } else {
            try {
                $sql = "Select DisasterID as disaster from Disaster where DisasterID>0 AND DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)";
                $result = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return $result;
                } else {
                    echo('<script>alert("No disaster found!");</script>');
                }
            } catch (Exception $exc) {
                echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
            }
            return $result;
        }
    }

    public static function getDisasterType($DisasterID) {
        try {
            $sql = "Select DisasterType from Disaster where DisasterID='" . $DisasterID . "'";
            $connection = new mysqli('localhost', 'root', 'rootPass123', 'postdisastermgmt');
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['DisasterType'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnDisasterVictimID($DisasterID) {
        try {
            $sql = "Select DisasterType from Disaster where DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['DisasterType'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnBarangayID($BarangayName) {
        try {
            $sql = "Select Disaster.BarangayID	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join Person on Victim.PersonID=Person.PersonID )"
                    . "where Barangay.BarangayName='" . $BarangayName . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Disaster.BarangayID'];
                }
            } else {
                echo('<script>alert("No disaster found!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

}
