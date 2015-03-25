<h1>Your orders</h1>
<?
/* @var $api GetShopApi */

$orders = $api->getOrderManager()->getOrders(null,null,null);
if(sizeof($orders) == 0) {
    echo "You do not have any orders yet.<br>"
    . "Start selling your product. :)";
    echo "<br><br>";
}
?>