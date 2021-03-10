<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log_Commands
 *
 * @author Asus
 */
class Log_Commands {

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

    function getHistoryID() {
        try {
            $sql = "Select Disaster.DisasterID as disasterid from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID) Group By Disaster.DisasterID";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return $result;
    }

    function returnHistoryCount() {
        try {
            $sql = "Select Count(distinct Disaster.DisasterID) from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID )";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Count(distinct Disaster.DisasterID)'];
                }
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnRegionCityBarangay($DisasterID) {
        try {
            $sql = "Select Region.RegionName as region ,City.CityName as city ,Barangay.BarangayName as barangay
            from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
            inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID
            inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID ) 
            where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnSubd_HouseNo_St($DisasterID) {
        try {
            $sql = "Select HistoryLog.Subdivision as subdivision ,HistoryLog.HouseNo as houseno,HistoryLog.StreetName as streetname
                    from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
                    inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID
                    inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID ) 
                    where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function getDisasterType($DisasterID) {
        try {
            $sql = "Select DisasterType from Disaster where DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['DisasterType'];
                }
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnVictims($DisasterID) {
        try {
            $sql = "Select Person.FirstName,Person.LastName,Person.MiddleName,Person.Suffix "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID "
                    . "inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "' Group by Person.PersonID";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnNeedsInfo($DisasterID) {
        try {
            $sql = "Select Needs.NeedsType as type ,Needs.Quantity as quantity "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID "
                    . "inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID ) "
                    . "where Disaster.DisasterID='" . $DisasterID . "' group by Needs.NeedsID";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function returnDisasterDate($DisasterID) {
        try {
            $sql = "Select Disaster.DateOfOccurence	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID "
                    . "inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['DateOfOccurence'];
                }
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    function returnDisasterTime($DisasterID) {
        try {
            $sql = "Select HistoryLog.TimeOfResolution	"
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on Disaster.DisasterID=HistoryLog.DisasterID "
                    . "inner join Needs on HistoryLog.NeedsID=Needs.NeedsID inner join Person on HistoryLog.PersonID=Person.PersonID )"
                    . "where Disaster.DisasterID='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['TimeOfResolution'];
                }
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }
    
    

}