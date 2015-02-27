<?php

require_once('module/db_driver.php');

//view class
class Page{
    public function __construct() {

    }

    public function getBlog($intPageNum, $intPageCount) {
        //$objDb = new Db('localhost', '3306', 'root', '', 'diary_content');
        //var_dump($objDb->getDb());

        $intOffset = $intPageNum-1;
        $strSql = "SELECT * FROM myblog_title ORDER BY create_time LIMIT $intOffset, $intPageCount";
        //query
    
    }

    public function buildContent() {
        $arrData = array();
        $arrData[0]['title']    = 'title1';
        $arrData[0]['content']  = 'testtest';
        $arrData[1]['title']    = 'title1';
        $arrData[1]['content']  = 'testtest';


        $intContentCount = count($arrData);
        $strContent = '';
        for($i=0; $i<$intContentCount; $i++) {
            $strContent .= "<div class='panel panel-default'>";
            $strContent .= "<div class='panel-heading'><h4>" . $arrData[$i]['title'] . "</h4></div>";
            $strContent .= "<div class='panel-body'><h5>" . $arrData[$i]['content'] . "</h5></div>";
            $strContent .= '</div>';
        }
        echo $strContent;
    }

    public function buildPageNumNav($intTotalCount, $intTotalPage, $intPageNum) {
        $strHtml = "<nav><ul class='pagination'>";
        $strHtml .= "<li><a href='#' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
        for ($i=1; $i<=$intTotalPage; $i++) {
            $strHtml .= "<li";
            if ($i === $intPageNum) {
                $strHtml .= " class='active'";
            }
            $strHtml .= "><a href='#'>$i</a>";
        }
        $strHtml .= "<li><a href='#' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";

        $strHtml .= "</ul></nav>";
        echo $strHtml;
    }
}


?>
