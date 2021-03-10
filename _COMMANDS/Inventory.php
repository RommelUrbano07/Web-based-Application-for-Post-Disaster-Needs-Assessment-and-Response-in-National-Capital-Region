<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inventory {

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

    //ADMIN PART

    /**
     * Admin Donation View
     */
    function ViewDonations() {
        try {
            $sql = "Select DonationItem, DonationQuantity from DonationItemTable";
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

    /**
     * Admin Donation Request Approval
     */
    function ApproveDonation($DonationID) {
        try {
            $sql = "Insert Into DonationLog (DonationPendingID,DonationAcceptedDate) Values( $DonationID , curdate() )";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                return TRUE;
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function AppendItemRequest($DonationID) {
        try {
            $sql = "Select * from donationitemrequests where DonationPendingID='" . $DonationID . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $sql1 = "Select * from donationitemtable where DonationItem='" . $rows['DonationItem'] . "';";
                    $result1 = mysqli_query($this->conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($rows1 = mysqli_fetch_assoc($result1)) {
                            $sql2 = "Update donationitemtable set DonationQuantity=(" . $rows['DonationQuantity'] . "+" . $rows1['DonationQuantity'] . ") where DonationItem='" . $rows['DonationItem'] . "';";
                            $result2 = mysqli_query($this->conn, $sql2);
                            if ($result2 == TRUE) {
                                echo('<script>alert("Update successfully!");</script>');
                            } else {
                                echo('<script>alert("Update failed!");</script>');
                            }
                        }
                    } else {
                        $sql3 = "Insert into donationitemtable(DonationItem, DonationQuantity) values ('" . $rows['DonationItem'] . "','" . $rows['DonationQuantity'] . "');";
                        $result3 = mysqli_query($this->conn, $sql3);
                        if ($result3 == TRUE) {
                            echo('<script>alert("Insert successfully!");</script>');
                        } else {
                            echo('<script>alert("Insert failed!");</script>');
                        }
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    /**
     * Admin Add Item Function
     */
    function AddDonation($Donation, $DonationQuantity) {
        try {
            $sql = "Select DonationQuantity from DonationItemTable where DonationItem= '" . $Donation . "'; ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $sql = "Update DonationItemTable Set DonationQuantity=('" . $rows['DonationQuantity'] . "'+'" . $DonationQuantity . "')"
                            . " Where DonationItem='$Donation';";
                    $result1 = mysqli_query($this->conn, $sql);
                    if ($result1 == TRUE) {
                        echo('<script>alert("Item Updated");</script>');
                        return TRUE;
                    }
                }
            } else {
                echo('<script>alert("Item not yet added");</script>');
                $sql = "Insert Into DonationItemTable(DonationItem,DonationQuantity) Values ('" . $Donation . "','" . $DonationQuantity . "')";
                $result1 = mysqli_query($this->conn, $sql);
                if ($result1 == TRUE) {
                    echo('<script>alert("Insert Donation Item Quantity Error");</script>');
                    return TRUE;
                } else {
                    echo('<script>alert("Insert Donation Item Quantity Error");</script>');
                }
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    /**
     * Admin Edit Donation Records
     */
    function EditDonationQuantity($DonationID, $DonationQuantity) {
        try {
            echo $DonationID;
            echo $DonationQuantity;
            $sql = "Update DonationItemTable Set DonationQuantity=$DonationQuantity where DonationItem='$DonationID'";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Update success!");</script>');
                return TRUE;
            } else {
                echo('<script>alert("Update failed!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function getDonationID($Donation) {
        try {
            $sql = "Select DonationID from DonationItemTable where DonationItem='" . $Donation . "'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['DonationID'];
                }
            } else {
                echo('<script>alert("Update failed!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    /**
     * Getting DonationLogID for Donation Log table view
     */
    function getDonationLogID() {
        try {
            $sql = "Select DonationLogID from DonationLog";
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

    /**
     * Getting DonationPendingID for Donation Pending Table View
     */
    function getDonationPendingID() {
        try {
            $sql = "Select DonationPendingID from DonationLog";
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

    /**
     * Getting Donation ID Donation Items
     * @return type
     */
    function getAllDonationID() {
        try {
            $sql = "Select DonationID form DonationItemTable";
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

    /**
     * Admin Delete Donation Record Function
     * @param type $DonationID
     * @return type
     */
    function DeleteDonationEntry($DonationID) {
        try {
            $sql = "Delete from DonationItemTable where DonationID= '" . $DonationID . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Deletion of Donation Item Success!");</script>');
            } else {
                echo('<script>alert("Deletion of Donation Item Error!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
    }

    /**
     * Adding Logs for every function executed by the Admin
     * @return boolean
     */
    function AddProcessLog($Fname, $MName, $Lname, $Suffix, $Log) {
        try {
            $sql = "Insert Into AdminTransactionHistoryLog(AdminFname,AdminMName,AdminLName,AdminSuffix,AdminTransactionLog, TransactionDate) "
                    . "Values('" . $Fname . "','" . $MName . "','" . $Lname . "','" . $Suffix . "','" . $Log . "',curdate())";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                return TRUE;
            } else {
                echo('<script>alert("0 results");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    /**
     * Printing all transaction logs made by every admin
     * @return type
     */
    function PrintProcessLog() {
        try {
            $sql = "Select * from admintransactionhistorylog inner join adminaccount on admintransactionhistorylog.AdminUsername = adminaccount.Username;";
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

    function getDonationHistoryDonors($DonationID) {
        try {
            $sql = "Select Donor.DonorFName, Donor.DonorMName, Donor.DonorLName, Donor.DonorSuffix "
                    . "from DonationLog inner join DonationPending on "
                    . "DonationLog.DonationPendingID=DonationPending.DonationPendingID "
                    . "inner join Donor on Donor.DonationPendingID=DonationPending.DonationPendingID "
                    . "where DonationLog.DonationPendingID=" . $DonationID . "";
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

    function getDonationHistoryItems($DonationID) {
        try {
            $sql = "Select Distinct DonationItemRequests.DonationItem, DonationItemRequests.DonationQuantity "
                    . "from DonationLog inner join Donationitemrequests "
                    . "on DonationLog.DonationPendingID= DonationItemRequests.DonationPendingID "
                    . "where DonationLog.DonationPendingID='" . $DonationID . "'";
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

    function getDonationHistoryDateRequest($DonationID) {
        try {
            $sql = "Select DonationDate from DonationPending where DonationPendingID= '" . $DonationID . "'";
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

    function getDonationHistoryDateAccept($DonationID) {
        try {
            $sql = "Select DonationAcceptedDate from DonationLog where DonationPendingID='" . $DonationID . "'";
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

    function checkInventoryQuantity($ItemID, $Quantity) {
        try {
            $sql="Select * from DonationItemTable where DonationItem='$ItemID'";
            $result=mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($rows= mysqli_fetch_assoc($result)){
                    if($rows['DonationQuantity'] > $Quantity){
                        echo ($rows['DonationQuantity']);
                        return True;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return False;
    }

    function withdrawItem($ItemID, $Quantity) {
        try {
            $sql = "Update DonationItemTable Set DonationQuantity =((Select DonationQuantity from DonationItemTable where DonationItem = '$ItemID') - $Quantity ) 
            where DonationItem='$ItemID'";
            echo $ItemID;
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                return TRUE;
            } else {
                echo('<script>alert("Update failed!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function getItemName() {
        try {
            $sql = "Select distinct DonationItem from DonationItemTable";
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

    function getDonationRequestID() {
        try {
            $sql = "SELECT DonationPendingID
                    FROM DonationPending where DonationPendingID NOT IN (Select DonationPendingID from DonationLog)";
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

    function getDonationPendingDonors($DonationID) {
        try {
            $sql = "Select Donor.DonorFName as fname, Donor.DonorMName as mname, Donor.DonorLname as lname, Donor.DonorSuffix as suffix "
                    . "from DonationPending inner join Donor on Donor.DonationPendingID=DonationPending.DonationPendingID "
                    . "where DonationPending.DonationPendingID='" . $DonationID . "'";
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

    function getDonationPendingItems($DonationID) {
        try {
            $sql = "Select distinct DonationItemRequests.DonationItem as item, DonationItemRequests.DonationQuantity as quantity "
                    . "from DonationPending inner join DonationItemRequests "
                    . "where DonationItemRequests.DonationPendingID='" . $DonationID . "'";
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

    function getDonationPendingQuantity($DonationID) {
        try {
            $sql = "Select Donor.DonorFName, Donor.DonorMName, Donor.DonorLname, Donor.DonorSuffix "
                    . "from DonationPending inner join Donor "
                    . "where DonationItemRequests.DonationPendingID='" . $DonationID . "'";
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

    function createTransactionLog($AdminUsername, $Message) {
        try {
            $sql = "Insert Into AdminTransactionHistoryLog"
                    . "(AdminUsername,AdminTransactionLog,TransactionDate) "
                    . "Values('" . $AdminUsername . "','" . $Message . "', curdate())";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Log complete!");</script>');
            } else {
                echo('<script>alert("Log error!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
    }

    //CLIENT PART
    function AddDonationPendingID($Details) {
        try {
            $sql = "INSERT INTO donationpending(DonationDate,DonationDetails) VALUES(CURDATE(),'" . $Details . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                $sql = "Select Max(DonationPendingID) as ID from DonationPending";
                $result = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        return $rows['ID'];
                    }
                }
            } else {
                echo('<script>alert("Pending ID Creation Failed");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return -1;
    }

    function AddDonor($FName, $MName, $LName, $Suffix, $DonationID) {
        try {
            $sql = "Insert Into Donor(DonorFname,DonorMname,DonorLname,DonorSuffix,DonationPendingID) "
                    . "Values ('" . $FName . "','" . $MName . "','" . $LName . "','" . $Suffix . "','" . $DonationID . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                return TRUE;
            } else {
                echo('<script>alert("Adding Donor Error");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

    function AddDonationItem($ItemName, $ItemQuantity, $DonationID) {
        try {
            $sql = "Insert Into DonationItemRequests(DonationItem,DonationQuantity,DonationPendingID) "
                    . "Values('" . $ItemName . "','" . $ItemQuantity . "','" . $DonationID . "')";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                return TRUE;
            } else {
                echo('<script>alert("Adding Item Error");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }

}
