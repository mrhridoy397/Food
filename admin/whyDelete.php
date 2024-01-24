<?php require_once('./controller/whyController.php'); ?>
<?php
$why = new whyController();
$Response = [];
$active = $why->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $why->whyDelete($_REQUEST['id']);

?>