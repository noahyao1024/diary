<?php
    require_once('module/content_loader.php');
    $page = new Page();
    $page->getBlog();
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
        <h4 class="modal-title" id="myModalLabel">Diary Content</h4>
      </div>
      <div class="modal-body">
<textarea type="textarea" id='my_text_content' cols='45' rows='10' style='font-size:24px'></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit it!</button>
      </div>
    </div>
  </div>
</div>
<br><br>

<?php
    $page->buildContent();
    $page->buildPageNumNav(45, 5, 1);
?>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-4 col-sm-3">Friend link</div>
</div>
</div>
