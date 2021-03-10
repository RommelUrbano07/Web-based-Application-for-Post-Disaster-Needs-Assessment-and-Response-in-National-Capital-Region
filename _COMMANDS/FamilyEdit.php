<?php

class FamilyEdit {

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

    function getPersonIDfromFamily($FamilyID) {
        try {
            $sql = "Select PersonID from Person where FamilyID='" . $FamilyID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function deleteFamilyMember($PersonID) {
        try {
            $sql = "Delete from Person where PersonID='" . $PersonID . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }

    function getPersonInformation($PersonID) {
        try {
            $sql = "Select FirstName,MiddleName,LastName,Suffix,BirthDate,ContactNo,Gender,Subdivision,StreetName,HouseNo from Person where PersonID='" . $PersonID . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return 0;
    }

    function getPersonID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select PersonID from Person where FirstName='" . $FirstName . "' AND MiddleName ='" . $MiddleName . "' AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["PersonID"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }
    
    function CheckPersonExist($FirstName, $MiddleName, $LastName,$Suffix) {
        try {
            $sql = "Select * from Person where FirstName='" . $FirstName . "',MiddleName='" . $MiddleName . "',LastName='" . $LastName . "',Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo('<script>alert("Entry already exists!");</script>');
                return TRUE;
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }
    
    function UpdateRecord($FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $ContactNo, $Gender,$StreetName, $HouseNo, $Subdivision,$BarangayID,$PersonID) {
        try {
            $sql = "Update Person Set FirstName='" . $FirstName . "',MiddleName='" . $MiddleName . "',LastName='" . $LastName . "',Suffix='" . $Suffix . "',BirthDate='" . $BirthDate . "',ContactNo='" . $ContactNo . "',Gender='" . $Gender . "',HouseNo='" . $HouseNo . "',Subdivision='" . $Subdivision . "',StreetName='".$StreetName."',BarangayID='".$BarangayID."' where PersonID='".$PersonID."'";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New record created successfully!");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " '. $sql .' "<br>" '. $this->conn->error.'");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return FALSE;
    }
    
    function getFamilyID($FirstName,$MiddleName,$LastName,$Suffix) {
        try {
            $sql = "Select Family.FamilyID as FamilyID from Family inner join Person on Family.FamilyID=Person.FamilyID where Person.FirstName='".$FirstName."' AND Person.MiddleName='".$MiddleName."' AND Person.LastName='".$LastName."' AND Person.Suffix='".$Suffix."'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['FamilyID'];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("'.$exc->getTraceAsString().'");</script>');
        }
        return -1;
    }

}
