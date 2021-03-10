<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReliefRequest {

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

    function getDisasterCity() {
        try {
            $sql = "Select Distinct CityName as CityName from Disaster inner join Barangay "
                    . "on Disaster.BarangayID = Barangay.BarangayID inner join City "
                    . "on Barangay.CityID=City.CityID "
                    . "WHERE Disaster.DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)";

            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results of cities with disaster");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function sumOfNeeds($City,$Type) {
        try {
            $sql="Select Quantity as quantity from 
                City inner join Barangay on City.CityID=Barangay.CityID 
                inner join Disaster on Barangay.BarangayID=Disaster.BarangayID 
                inner join Victim on Disaster.DisasterID=Victim.DisasterID inner join 
                Needs on Victim.NeedsID=Needs.NeedsID where City.CityName='$City' and Needs.NeedsType='$Type' 
                and Disaster.DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)
                group by Disaster.DisasterID ";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $result;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    function getDisasterNeeds($CityName) {
        try {
            $sql = "Select Needs.NeedsType as NeedsType from "
                    . "City inner join Barangay on City.CityID=Barangay.CityID "
                    . "inner join Disaster on Barangay.BarangayID=Disaster.BarangayID "
                    . "inner join Victim on Disaster.DisasterID=Victim.DisasterID inner join "
                    . "Needs on Victim.NeedsID=Needs.NeedsID where City.CityName='" . $CityName . "' "
                    . "and Disaster.DisasterID NOT IN (SELECT DisasterID FROM HistoryLog)"
                    . "Group By Needs.NeedsType;";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results of disaster needs");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function getAllDisasterID($CityName) {
        try {
            $sql = "Select DisasterID from City inner join Barangay on City.CityID=Barangay.CityID inner join Disaster on Barangay.BarangayID=Disaster.BarangayID where CityName='" . $CityName . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results of disaster ID");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

    function getVictimID($CityName) {
        try {
            $sql = "Select VictimID from City inner join Barangay "
                    . "on City.CityID=Barangay.CityID inner join Disaster "
                    . "on Barangay.BarangayID=Disaster.BarangayID inner join Victim "
                    . "on Disaster.DisasterID=Victim.DisasterID where CityName='" . $CityName . "';";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                echo('<script>alert("0 results of victim ID");</script>');
            }
        } catch (Exception $exc) {
            echo('<script>alert("' . $exc->getTraceAsString() . '");</script>');
        }
        return $result;
    }

}
