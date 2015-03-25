<?
$tab = "settings";
if(isset($_GET['tab'])) {
    $tab = $_GET['tab'];
}
?>
<div class="tabarea">
    <a href="?page=ge-settings&tab=settings"><span class="tab <? if($tab == "settings") { echo "active"; } ?>">Settings</span></a>
    <a href="?page=ge-settings&tab=products"><span class="tab <? if($tab == "products") { echo "active"; } ?>">Products</span></a>
    <a href="?page=ge-settings&tab=orders"><span class="tab <? if($tab == "orders") { echo "active"; } ?>">Orders</span></a>
    <a href="?page=ge-settings&tab=about"><span class="tab <? if($tab == "about") { echo "active"; } ?>">About</span></a>
</div>

<div class='tabcontent'>
<?
if($tab == "settings" || $tab != "products" || $tab != "orders" || $tab != "about") {
    include_once("getshopadminpage_$tab.php");
}
?>
</div>

<style>
    .tabcontent { background-color:#FFF; border: solid 1px #bbb;  padding: 10px; margin-right: 20px; }
    .tabarea { margin-top: 20px; }
    .tabarea .tab { border: solid 1px #bbb; border-bottom: 0px; padding: 10px; cursor:pointer; display:inline-block; margin-bottom: -1px;  }
    .tabarea .tab.active { background-color:#fff; }
</style>