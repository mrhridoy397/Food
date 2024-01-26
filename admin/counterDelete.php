<?php require_once('./controller/counterController.php'); ?>
<?php
$counter = new counterController();
$Response = [];
$active = $counter->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $counter->counterDelete($_REQUEST['id']);

?>