<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notifications {

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

    function getAdminID($Username) {
        try {
            $sql = "Select * from adminAccount where Username='" . $Username . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['AdminID'];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function getCityID($CityName) {
        try {
            $sql = "Select * from City where CityName='" . $CityName . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['CityID'];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return "";
    }

    function GenerateReliefReport($AdminID, $CityID, $Remarks) {
        try {
            $sql = "Insert Into ReportTable(AdminID,CityID,ReportContent) "
                    . "Values('" . $AdminID . "', '" . $CityID . "', '" . $Remarks . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Relief Report complete!");</script>');
            } else {
                echo('<script>alert("Relief Report error!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
    }

    function getPersonICredsfromVictimID($VictimID) {
        try {
            $sql = "Select Person.FirstName as fn, Person.MiddleName as mn,Person.LastName as ln,Person.Suffix as sf "
                    . "from Victim inner join Person on Victim.PersonID=Person.PersonID "
                    . "where Victim.VictimID='" . $VictimID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function getSpecificCustomerID($PersonID) {
        try {
            $sql = "Select User_ID from Customer where PersonID='" . $PersonID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["User_ID"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function returnSpecificCustomerID($Username, $Password) {
        try {
            $sql = "Select User_ID from Customer where Username='" . $Username . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["User_ID"];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function getAllCustomerID() {
        try {
            $sql = "Select User_ID from Customer";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
               return $result;
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function createNotifications($CustomerID, $NotificationMsg) {
        try {
            $sql = "Insert Into Notification(NotificationContent, NotificationDate, NotificationTime, CustomerID) Values('" . $NotificationMsg . "', curdate(), curtime(), '" . $CustomerID . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Notification log complete!");</script>');
            } else {
                echo('<script>alert("Notification log error!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
    }

    function getNotifications($UserID) {
        try {
            $sql = "Select * from Notification inner join customer on notification.CustomerID = customer.User_ID where User_ID='" . $UserID . "' Order by NotificationDate DESC;";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function getDonorName($DonorID) {
        try {
            $sql = "Select DonorFname, DonorMname, DonorLname, DonorSuffix from donor where DonationPendingID='" . $DonorID . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results of donor name");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

}
