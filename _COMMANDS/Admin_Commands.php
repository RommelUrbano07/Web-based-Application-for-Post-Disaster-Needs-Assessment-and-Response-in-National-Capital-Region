<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Commands
 *
 * @author Asus
 */
class Admin_Commands {

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

    function GetAdminFirstName($username) {
        try {
            $sql = "Select FirstName from adminAccount where Username='" . $username . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["FirstName"];
                }
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return 0;
    }

    function checkAdminTableContent() {
        $count = 0;
        try {
            $sql = "Select Count(AdminID) as total from adminAccount";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if ($rows["total"] == '0' || $rows['total'] == "null") {
                        $count = (int) $rows['total'];
                        echo ('<script>alert("Welcome to Admin Page, Sign Up your Master Account");</script>');
                        return (int) $rows['total'];
                    } else {
                        $count = (int) $rows['total'];
                    }
                }
            } else {

                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $count;
    }

    function checkMasterLogIn($Username, $Password) {
        try {
            $sql = "Select * from adminAccount where Username = '" . $Username . "' AND MasterStatus = 1 ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if (password_verify($Password, $rows['AccountPassword'])) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {
                echo ('<script>alert("0 results '.$Username.');</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function checkAdminLogIn($Username, $Password) {
        try {
            $sql = "Select * from adminAccount where Username='" . $Username . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if (password_verify($Password, $rows['AccountPassword'])) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {
                echo ('<script>alert("No Account Found<br>");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function registerAdmin($username, $password, $FirstName, $MiddleName, $LastName, $Suffix, $Gender, $MasterStatus) {
        try {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "Insert into adminAccount (Username,AccountPassword,FirstName,MiddleName,LastName,Suffix,Gender,MasterStatus) Values('" . $username . "','" . $hash_password . "','" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $Suffix . "','" . $Gender . "','" . $MasterStatus . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo ('<script>alert("New record created successfully");</script>');
                return TRUE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function returnPersonCredentials($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select * from Person where FirstName='" . $FirstName . "' AND MiddleName ='" . $MiddleName . "' AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return 0;
    }

    function DeleteRecord($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Delete from Person where FirstName='" . $FirstName . "' AND MiddleName='" . $MiddleName . "' AND LastName='" . $LastName . "' AND Suffix ='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo ('<script>alert("New region record created successfully");</script>');
                return FALSE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function CheckExistingPersonRecord($FirstName, $MiddleName, $LastName) {
        try {
            $sql = "SELECT * FROM Person WHERE FirstName='" . $FirstName . "',MiddleName='" . $MiddleName . "',LastName='" . $LastName . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo ('<script>alert("RECORD ALREADY EXISTS");</script>');
                return TRUE;
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
            return FALSE;
        }
    }

    function CheckAdminAccountExists($FirstName, $MiddleName, $LastName) {
        try {
            $sql = "Select * from adminAccount where FirstName='" . $FirstName . "'AND MiddleName='" . $MiddleName . "'AND LastName='" . $LastName . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo ('<script>alert("Account already has an existing account.");</script>');
                return TRUE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function checkAdminUsername($Username) {
        try {
            $sql = "Select * from adminAccount where Username='" . $Username . "' ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo ('<script>alert("Username is already in use, retype a new username");</script>');
                return TRUE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function UpdateRecord($FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $ContactNo, $Gender, $HouseNo, $Subdivision) {
        try {
            $sql = "Update from Person Set FirstName='" . $FirstName . "',MiddleName='" . $MiddleName . "',LastName='" . $LastName . "',Suffix='" . $Suffix . "',BirthDate='" . $BirthDate . "',ContactNo='" . $ContactNo . "',Gender='" . $Gender . "',HouseNo='" . $HouseNo . "',Subdivision='" . $Subdivision . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result === TRUE) {
                echo ('<script>alert("New region record created successfully");</script>');
                return TRUE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function GetFamilyID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $sql = "Select Family.FamilyID,Family.FamilyName from (Family inner join Person on Family.FamilyID=Person.FamilyID)"
                    . "where Person.FirstName= '" . $FirstName . "' AND Person.MiddleName= '" . $MiddleName . "' AND Person.LastName='" . $LastName . "' AND Person.Suffix= '" . $Suffix . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows["FamilyID"];
                }
            } else {
                echo ('<script>alert("0 family results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function DeleteFamilyMember($PersonID) {
        try {
            $sql = "Delete from Family where PersonID='" . $PersonID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function DeletePersonRecord($PersonID) {
        try {
            $sql = "Delete from Person where PersonID='" . $PersonID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            } else {
                echo ('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

}
