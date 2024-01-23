<?php require_once('./controller/heroController.php'); ?>
<?php
$hero = new heroController();
$Response = [];
$active = $hero->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $hero->heroDelete($_REQUEST['id']);

?>