<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class NewsSection{
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
    function AddNews($NewsContent, $NewsAuthorFName, $NewsAuthorMName, $NewsAuthorLName, $NewsAuthorSuffix){
        try{
            $sql = "INSERT INTO News(NewsContent, NewsAuthorFName, NewsAuthorMName, NewsAuthorLName, NewsAuthorSuffix, NewsDate,  NewsTime)  "
                    . "VALUES('".$NewsContent."','".$NewsAuthorFName."','".$NewsAuthorMName."','".$NewsAuthorLName."','".$NewsAuthorSuffix."', curdate(), curtime())";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo ('Pumasok');
                return TRUE;
            } else {
                echo ('Hindi Pumasok');
                return FALSE;
            }
        } catch (Exception $ex) {
            echo $exc->getTraceAsString();
        }
    }
    function getNews(){
         try {
            $sql = "Select * from News";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>wala apasok;</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }
    function editNews($NewsID,$NewsContent, $NewsAuthorFName, $NewsAuthorMName, $NewsAuthorLName, $NewsAuthorSuffix){
        try {
            $sql= "Update News Set NewsContent= '".$NewsContent."', NewsAuthorFName='".$NewsAuthorFName."',NewsAuthorMName= '".$NewsAuthorMName."', NewsAuthorLName= '".$NewsAuthorLName."', NewsAuthorSuffix= '".$NewsAuthorSuffix."', NewsDate= curdate(),  NewsTime= curtime()"
                    . " Where NewsID='".$NewsID."'";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo ('<script>alert("Edit Succesful!");</script>');
                return TRUE;
            } else {
                echo ('<script>alert("Error: " ' . $sql . ' "<br>" ' . $this->conn->error . '");</script>');
            }
        } catch (Exception $exc) {
            echo ('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return FALSE;
    }
     function deleteNews($NewsID) {
        try {
            $sql = "Delete from News where NewsID= '" . $NewsID . "'";
            $result = mysqli_query($this->conn, $sql);
            if ($result == TRUE) {
                echo('<script>alert("Success!");</script>');
            } else {
                echo('<script>alert("unsuccessful!");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
    }
}
