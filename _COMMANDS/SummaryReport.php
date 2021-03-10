<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SummaryReport
 *
 * @author Asus
 */
class SummaryReport {

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

    /**
     * Returns the number of Disaster Occurence
     * @return int
     */
    function NoOfDisasters() {
        try {
            $sql = "Select Count(distinct DisasterID) as total from Disaster";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return (int) $rows["total"];
                }
            }
        } catch (Exception $exc) {
            return 0;
        }
        return 0;
    }
    
    function NoOfDisastersCurrentDay() {
        try {
            $sql = "Select Count(distinct DisasterID) as total from Disaster where DateOfOccurence=curdate()";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return (int) $rows["total"];
                }
            }
        } catch (Exception $exc) {
            return 0;
        }
        return 0;
    }
    
    function NoOfDisastersCurrentWeek() {
        try {
            $sql = "Select Count(DisasterID) as total from Disaster group by yearweek(curdate())";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return (int) $rows["total"];
                }
            }
        } catch (Exception $exc) {
            return 0;
        }
        return 0;
    }
    
    function NoOfDisastersResolved() {
        try {
            $sql = "Select Count(distinct DisasterID) as total from HistoryLog";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return (int) $rows["total"];
                }
            }
        } catch (Exception $exc) {
            return 0;
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function RegionsAffected() {
        try {
            $sql = "Select distinct Region.RegionName as region 
            from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
            inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on 
            HistoryLog.DisasterID=Disaster.DisasterID)";
            $result = mysqli_query($this->conn, $sql);
            if ($result != null) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function CitiesAffected() {
        try {
            $sql = "Select distinct CityName as City 
            from (Region inner join City on Region.RegionID=City.RegionID 
            inner join Barangay on City.CityID=Barangay.CityID 
            inner join Disaster on Disaster.BarangayID=Barangay.BarangayID)
            ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function BarangayAffected() {
        try {
            $sql = "Select distinct Barangay.BarangayName from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
            inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join HistoryLog on 
            HistoryLog.DisasterID=Disaster.DisasterID)";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function NeedsPerQuantity() {
        try {
            $sql = "Select distinct Needs.NeedsType as needs, Sum(Needs.Quantity) as sum 
                    from Needs 
                    Group By NeedsType";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * Returns the number of Victim
     * @return int
     */
    function NoOfVictims() {
        try {
            $sql = "Select Count(distinct HistoryLog.PersonID) total from Person inner join HistoryLog "
                    . "on HistoryLog.PersonID=Person.PersonID;";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["total"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * Returns the number of Families Affected
     * @return int
     */
    function NoOfFamiliesAffected() {
        try {
            $sql = "Select Count(distinct Family.FamilyID) as total from 
                Person inner join HistoryLog on HistoryLog.PersonID=Person.PersonID 
                inner join Family on Person.FamilyID=Family.FamilyID;";
            $result = mysqli_query($this->conn, $sql);
            if ($result != null) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["total"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function getDisasterID() {
        try {
            $sql = "Select distinct DisasterType from Disaster";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * Returns the number of Families Affected
     * @return int
     */
    function getDisasterType($DisasterID) {
        try {
            $sql = "Select distinct (Disaster.DisasterType) as disaster
                    from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
                    inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID 
                    inner join Needs on Victim.NeedsID=Needs.NeedsID inner join person on Victim.PersonID=person.PersonID) 
                    where Disaster.DisasterType='".$DisasterID."' ";
            $result = $this->conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    return $row["disaster"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    /**
     * Returns the number of Families Affected
     * @return int
     */
    function getDisasterDate($DisasterID) {
        try {
            $sql = "Select Disaster.DateOfOccurence as date
                    from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID 
                    inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID 
                    inner join Needs on Victim.NeedsID=Needs.NeedsID inner join person on Victim.PersonID=person.PersonID) 
                    Group by Victim.DisasterType";
            $result = mysqli_query($this->conn, $sql);
            if ($result != null) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["date"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return "";
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function RegionsAffectedOnDisaster($DisasterID) {
        try {
            $sql = "Select distinct Region.RegionName "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join person on Victim.PersonID=person.PersonID)"
                    . "where Disaster.DisasterType='" . $DisasterID . "' "
                    . "Group by Victim.PersonID";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function CityAffectedOnDisaster($DisasterID) {
        try {
            $sql = "Select distinct City.CityName "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID "
                    . "inner join Needs on Victim.NeedsID=Needs.NeedsID inner join person on Victim.PersonID=person.PersonID)"
                    . "where Disaster.DisasterType='" . $DisasterID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function BarangayAffectedOnDisaster($DisasterID) {
        try {
            $sql = "Select distinct Barangay.BarangayName "
                    . "from (Region inner join City on Region.RegionID=City.RegionID inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Disaster.BarangayID=Barangay.BarangayID inner join Victim on Disaster.DisasterID=Victim.DisasterID)"
                    . "where Disaster.DisasterType='" . $DisasterID . "' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * returns 0 when query has no match
     * return $result array when query has a matched record
     */
    function NeedsPerQuantityOnDisaster($DisasterID) {
        try {
            $sql = "Select Needs.NeedsType as needs
                    from (Needs inner join Victim on Needs.NeedsID=Victim.NeedsID 
                    inner join Disaster on Disaster.DisasterID=Victim.DisasterID) 
                    where Disaster.DisasterType='" . $DisasterID . "' 
                    Group By Needs.NeedsType";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return $result;
    }
    
    function NeedsQuantity($DisasterID,$Type) {
        try {
            $sql = "Select Quantity as quantity
                    from (Needs inner join Victim on Needs.NeedsID=Victim.NeedsID 
                    inner join Disaster on Disaster.DisasterID=Victim.DisasterID) 
                    where Disaster.DisasterType='" . $DisasterID . "' and Needs.NeedsType='$Type'
                    Group By Disaster.DisasterID";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return $result;
    }

    /**
     * Returns the number of Victim
     * @return int
     */
    function NoOfVictimsOnDisaster($DisasterID) {
        try {
            $sql = "Select Count(distinct HistoryLog.PersonID) total "
                    . "from Person inner join HistoryLog "
                    . "on HistoryLog.PersonID=Person.PersonID "
                    . "inner join Victim on Victim.PersonID=Person.PersonID "
                    . "inner join Disaster on Disaster.DisasterID=Victim.DisasterID "
                    . "where Disaster.DisasterType='".$DisasterID."'";
            $result = mysqli_query($this->conn, $sql);
            if ($result != null) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["total"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    /**
     * Returns the number of Families Affected
     * @return int
     */
    function NoOfFamiliesAffectedOnDisaster($DisasterID) {
        try {
            $sql = "Select Count(distinct Family.FamilyID) as total from 
                    (Victim inner join person on person.personid=Victim.personid inner join Disaster on
                    Disaster.DisasterID=Victim.DisasterID inner join family on
                    family.FamilyID=Person.FamilyID ) where Disaster.DisasterType='".$DisasterID."' 
                    Group by Victim.PersonID;";
            $result = mysqli_query($this->conn, $sql);
            if (($result) != null) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["total"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

}
