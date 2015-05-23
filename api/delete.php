<?php
    define("DB_NAME", 'myblog');
    define("TITLE_TABLE", 'myblog_title');
    define("CONTENT_TABLE", 'myblog_content');

    $g_errmsg   = "success";
    $g_errno    = 0;

    require_once("../module/db_driver.php");
    
    $intBlogId      = $_POST['blog_id'];

    $objDb = new Db("localhost", 3306, 'root', '1111', DB_NAME);
    if (!$objDb->isConnected()) {
        $g_errmsg   = 'connect db fail!';
        $g_errno    = -1;
        echo json_encode(array($g_errno, $g_errmsg));
        return false;
    }
    
    $delete_time = time();

	$strSql = sprintf("UPDATE %s SET blog_status=4 WHERE blod_id = %d", TITLE_TABLE, $intBlogId);
	$arrRet = $objDb->query($strSql);
    if (false === $arrRet) {
        $g_errmsg   = 'query failed!';
        $g_errno    = -2;
    }
    echo json_encode(array($g_errno, $g_errmsg));
    return true;

?>
