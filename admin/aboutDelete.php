<?php require_once('./controller/aboutController.php'); ?>
<?php
$about = new aboutController();
$Response = [];
$active = $about->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $about->aboutDelete($_REQUEST['id']);

?>