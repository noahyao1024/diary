<?php

require_once('module/db_driver.php');

//view class
class Page{
    
    const DB_NAME = 'myblog';
    const TITLE_TABLE       = 'myblog_title';
    const CONTENT_TABLE     = 'myblog_content';

    public function __construct() {

    }


    public function buildContent($intPageNum, $intPageCount, $strQuery = "") {
        $objDb = new Db('localhost', '3306', 'root', '1111', self::DB_NAME);
        $intOffset = $intPageNum-1;
        $intOffset = $intOffset*$intPageCount;

        if (0 >= strlen($strQuery)) {
            $strSql = "select
                t.blog_id, t.blog_title, c.blog_content, t.create_time
                from myblog_title as t , myblog_content as c where t.blog_id = c.blog_id ORDER BY t.blog_id DESC LIMIT $intOffset, $intPageCount";
            $arrData = $objDb->query($strSql);
        } else {
            $strSql = "SELECT 
                t.blog_id, t.blog_title, c.blog_content, t.create_time
                FROM
                myblog_title as t, myblog_content as c
                WHERE t.blog_id = c.blog_id AND t.blog_title LIKE '%$strQuery%'
                ORDER BY t.blog_id DESC";
            $arrData = $objDb->query($strSql);
        }

        $intContentCount = count($arrData);
        $strContent = '';
        for($i=0; $i<$intContentCount; $i++) {
            $strContent .= "<div class='panel panel-default'>";
            $strContent .= "<div class='panel-heading' blog_id='{$arrData[$i]['blog_id']}'>";
            $strTemp = "&nbsp&nbsp&nbsp<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp";
            $strTemp .= "<button type='button' class='btn btn-primary btn-xs'>" . date('Y-m-d H:i:s',$arrData[$i]['create_time']) . "</button>";
			$strTemp .= "&nbsp&nbsp<span class='glyphicon glyphicon-remove' aria-hidden='true' onclick='delete_diary({$arrData[$i]['blog_id']})'></span>";
            $strContent .= "<h4>" . $arrData[$i]['blog_title'] . $strTemp . "</h4>";
            $strContent .= "";
            $strContent .= "</div>";
            $strContent .= "<div class='panel-body'><h5>" . $arrData[$i]['blog_content'] . "</h5></div>";
            $strContent .= '</div>';
        }
        echo $strContent;

        $intTotalCount = 0;
        if (0 >= strlen($strQuery)) {
            $strSql = "SELECT count(blog_id) as total_count from myblog_title";
            $arrData = $objDb->query($strSql);
            $intTotalCount = (int)$arrData[0]['total_count'];
        } else {
            $intTotalCount = count($arrData);
        }

        return $intTotalCount;
    }

    public function buildPageNumNav($intTotalCount, $intPerPage, $intPageNum) {
        $intTotalPage = (int)(ceil((float)$intTotalCount/(float)$intPerPage));
        $strHtml = "<nav><ul class='pagination'>";
        $strHtml .= "<li><a href='#' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
        for ($i=1; $i<=$intTotalPage; $i++) {
            $strHtml .= "<li";
            if ($i === $intPageNum) {
                $strHtml .= " class='active'";
            }
            $strHtml .= "><a href='index.php?pn=$i&rn=$intPerPage'>$i</a>";
        }
        $strHtml .= "<li><a href='#' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";

        $strHtml .= "</ul></nav>";
        echo $strHtml;
    }
}


?>
