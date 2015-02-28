<?php
    define("DB_NAME", 'myblog');
    define("TITLE_TABLE", 'myblog_title');
    define("CONTENT_TABLE", 'myblog_content');

    $g_errmsg   = "";
    $g_errno    = 0;

    require_once("../module/db_driver.php");
    
    $title      = $_POST['title'];
    $content    = $_POST['content'];
    //$uid = 

    $objDb = new Db("localhost", 3306, 'root', '1111', DB_NAME);
    if (!$objDb->isConnected()) {
        $g_errmsg   = 'connect db fail!';
        $g_errno    = -1;
        echo json_encode(array($g_errno, $g_errmsg));
        return false;
    }
    
    $create_time = time();

    $arrTitleData = array(
        'blog_title'    => $title,
        'create_time'   => $create_time,
        'op_time'       => $create_time,
        'status'        => 1,
    );
    $blog_id = $objDb->insert($arrTitleData, TITLE_TABLE);

    if (0 >= $blog_id) {
        $g_errno = -2;
        $g_errmsg = 'add title failed!';
        echo json_encode(array($g_errno, $g_errmsg));
        return false;
    }

    $arrContentData = array(
        'blog_id'       => $blog_id,
        'blog_content'  => $content,
    );

    $content_id = $objDb->insert($arrContentData, CONTENT_TABLE);
    if (0 >= $content_id) {
        return false;
    }
    echo json_encode(array($g_errno, $g_errmsg));
    return true;

?>
