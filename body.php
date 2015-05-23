<?php
    require_once('module/content_loader.php');
    $page = new Page();
?>
<div class="container-fluid">
<div class='row'>
    <div class="col-xs-2 col-sm-1"></div>
    <div class="col-xs-12 col-sm-8">

<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
New
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
            <div class="form-group">
                <input id="my_text_title"></input>
            </div>
        </h4>

      </div>
      <div class="modal-body">
<textarea type="textarea" id='my_text_content' cols='45' rows='10' style='font-size:24px'></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit_diray_button' data-dismiss"modal">Submit it!</button>
      </div>
    </div>
  </div>
</div>
<br><br>

<?php

    $intPageNum     = (int)$_GET['pn'];
    $intPageCount   = (int)$_GET['rn'];
    if (0 === $intPageCount) {
        $intPageCount = 10;
    }
    if (0 === $intPageNum) {
        $intPageNum = 1;
    }

    $strQuery = $_GET['query'];
    $intTotalCount = $page->buildContent($intPageNum, $intPageCount, $strQuery);
    $page->buildPageNumNav($intTotalCount, $intPageCount, $intPageNum);
?>

    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-4 col-sm-3">Friend link</div>
</div>
</div>
