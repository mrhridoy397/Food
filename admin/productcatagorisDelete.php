<?php require_once('./controller/productCatagorisController.php'); ?>
<?php
$productcatagoris = new productcatagorisController();
$Response = [];
$active = $productcatagoris->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $productcatagoris->productcatagorisDelete($_REQUEST['id']);

?>