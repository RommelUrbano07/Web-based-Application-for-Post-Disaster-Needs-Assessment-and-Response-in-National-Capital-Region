<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client_Commands
 *
 * @author Asus
 */
class Client_Commands {

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

    function checkHeadStatus($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select HeadStatus from Person where FirstName='" . $FirstName . "'AND MiddleName='" . $MiddleName . "'AND LastName='" . $LastName . "'AND Suffix='" . $Suffix . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['HeadStatus'];
                }
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function checkIfAddressMatch($personid, $region, $city, $barangay, $streetname, $houseno, $subdivision, $contactno, $birthdate) {
        try {
            $sql = "Select * from Person inner join Barangay on Barangay.BarangayID=Person.BarangayID "
                    . "inner join City on Barangay.CityID=City.CityID inner join Region on "
                    . "Region.RegionID=City.RegionID "
                    . "where Person.PersonID='$personid' and Region.RegionName='$region' "
                    . "and Barangay.BarangayName='$barangay' and City.CityName='$city' "
                    . "and Person.HouseNo='$houseno' and Person.StreetName='$streetname' "
                    . "and Person.Subdivision='$subdivision' and Person.ContactNo='$contactno' "
                    . "and Person.BirthDate='$birthdate' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function checkPersonID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select PersonID as id from Person where FirstName='" . $FirstName . "'AND MiddleName='" . $MiddleName . "'AND LastName='" . $LastName . "'AND Suffix='" . $Suffix . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['id'];
                }
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function checkClientLogIn($username, $password) {
        try {
            $sql = "Select AccountPassword as password from Customer where Username = '$username'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo $rows['password'];
                    if (password_verify($password, $rows['password']) == TRUE) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function registerRegion($Region) {
        try {
            $sql = "Insert into Region(RegionName) values('" . $Region . "');";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New region record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function RegionChecker($Region) {
        try {
            $sql = "SELECT RegionID FROM Region WHERE RegionName='" . $Region . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['RegionID'];
                }
            } else {
                $this->registerRegion($Region);
                sleep(3);
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $this->RegionChecker($Region);
    }

    function registerCity($Region, $City) {
        try {
            $sql = "Insert Into City(RegionID,CityName) Values('" . $this->RegionChecker($Region) . "','" . $City . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New city record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function CityChecker($City, $Region) {
        try {
            $sql = "SELECT * FROM City WHERE CityName='" . $City . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['CityID'];
                }
            } else {
                $this->registerCity($Region, $City);
                sleep(3);
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $this->CityChecker($City, $Region);
    }

    function registerBarangay($Region, $City, $Barangay) {
        try {
            $sql = "Insert Into Barangay(CityID,BarangayName) Values('" . $this->CityChecker($City, $Region) . "','" . $Barangay . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New barangay record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function registerFamily($LastName) {
        try {
            $sql = "Insert into Family(FamilyName) values('" . $LastName . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New family record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function getFamilyID() {
        try {
            $sql = "Select Max(FamilyID) from Family";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['Max(FamilyID)'];
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function registerPerson($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetNo, $Subdivision, $HeadStatus) {
        try {
            $sql = "Insert into Person(BarangayID,FirstName,MiddleName,LastName,BirthDate,ContactNo,Suffix,Gender,HouseNo,StreetName,Subdivision,HeadStatus,FamilyID)
            Values('" . $this->BarangayChecker($Region, $City, $Barangay) . "','" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $BirthDate . "','" . $ContactNo . "','" . $Suffix . "','" . $Gender . "','" . $HouseNo . "','" . $StreetNo . "','" . $Subdivision . "','" . $HeadStatus . "','" . $this->getFamilyID() . "');";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New person record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function AddPerson($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetNo, $Subdivision, $HeadStatus, $FamilyID) {
        try {
            $sql = "Insert into Person(BarangayID,FirstName,MiddleName,LastName,BirthDate,ContactNo,Suffix,Gender,HouseNo,StreetName,Subdivision,HeadStatus,FamilyID)
            Values('" . $this->BarangayChecker($Region, $City, $Barangay) . "','" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $BirthDate . "','" . $ContactNo . "','" . $Suffix . "','" . $Gender . "','" . $HouseNo . "','" . $StreetNo . "','" . $Subdivision . "','" . $HeadStatus . "','" . $FamilyID . "');";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New person record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function BarangayChecker($Region, $City, $Barangay) {
        try {
            $sql = "SELECT * FROM Barangay WHERE BarangayName='" . $Barangay . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['BarangayID'];
                }
            } else {
                $this->registerBarangay($Region, $City, $Barangay);
                sleep(3);
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $this->BarangayChecker($Region, $City, $Barangay);
    }

    function PersonChecker($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetNo, $Subdivision, $HeadStatus) {
        try {
            $sql = " Select PersonID,FirstName,MiddleName,LastName from Person where FirstName='" . $FirstName . "'AND MiddleName='" . $MiddleName . "'AND LastName='" . $LastName . "'AND Suffix='" . $Suffix . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo('<script>alert("Check");</script>');
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row['PersonID'];
                }
            } else {
                $this->registerPerson($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetNo, $Subdivision, $HeadStatus);
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $this->PersonChecker($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetNo, $Subdivision, $HeadStatus);
    }

    function CheckPersonExist($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select * from Person where FirstName='" . $FirstName . "'AND MiddleName='" . $MiddleName . "'AND LastName='" . $LastName . "'AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo('<script>alert("Person exists eligible for sign-up");</script>');
                return TRUE;
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function AccountExist($PersonID) {
        try {
            $sql = "Select Username,AccountPassword from Customer where PersonID='" . $PersonID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if ($rows['Username'] == "" && $rows['AccountPassword'] == "") {
                        echo('<script>alert("Account for this Person already exists");</script>');
                        return TRUE;
                    }
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function CheckUsernameExist($Username) {
        try {
            $sql = "Select * from Customer where Username='" . $Username . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo('<script>alert("Username has already been taken, please input another username.");</script>');
                return TRUE;
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function signUpClient($PersonID, $Username, $Password) {
        try {
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "Insert into Customer(PersonID,Username,AccountPassword)" . " Values('" . $PersonID . "','" . $Username . "','" . $Password . "') ";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo('<script>alert("New record created successfully");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

}
