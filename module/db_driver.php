<?php

class Db {
    //private
    private $_db = false;
    
    public function __construct($strHost, $strPort, $strUser, $strPass, $strDb='') {
        if ('' === $strDb) {
            return false;
        }

        $this->_db = mysql_connect($strHost.":".$strPort, $strUser, $strPass);
        mysql_select_db($strDb, $this->_db);
    }


    public function isConnected() {
        if(false === $this->_db) {
            return false;
        } else {
            return true;
        }
    }


    public function insert($arrData, $strTable) {
        //get field and data
        $arrField   = array();
        $arrVal     = array();
        foreach ($arrData as $key => $val) {
            $arrField[] = $key;
            $arrVal[]   = "'$val'";
        }
        $strField   = implode(',', $arrField);
        $strVal     = implode(',', $arrVal);
        $strSql = "INSERT INTO $strTable ($strField) VALUES ($strVal)";
        mysql_query($strSql, $this->_db);
        $intLastInsertId = (int)mysql_insert_id($this->_db);
        return $intLastInsertId;
    }


    public function select($arrField, $arrCond, $strTable) {
        $strField = implode(',', $arrField);
        $arrTempCond = array();
        foreach ($arrCond as $key => $val) {
            $strSubCond = implode(',', $val);
            $arrTempCond[] = "$key IN ($strSubCond)";
        }
        $strCond = implode(' AND ', $arrTempCond);
        $strSql = "SELECT $strField FROM $strTable WHERE $strCond";
        
        $arrRes = mysql_query($strSql, $this->_db);
        $arrRet = array();
        while($row = mysql_fetch_array($arrRes, MYSQL_ASSOC)) {
            $arrRet[] = $row;
        }

        return $arrRet;
    }

    public function query($strSql) {
        $arrRes = mysql_query($strSql, $this->_db);
        $arrRet = array();
        while($row = mysql_fetch_array($arrRes, MYSQL_ASSOC)) {
            $arrRet[] = $row;
        }
        return $arrRet;
    }

}

?>
