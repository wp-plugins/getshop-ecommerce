<h1>Settings for your page</h1>

<?
/* @var $api GetShopApi */
if(isset($_GET['activateApp'])) {
    $activateApp = $_GET['activateApp'];
    $api->getStoreApplicationPool()->activateApplication($activateApp);
}

if(isset($_POST['save_config'])) {
    foreach($_POST as $index => $val) {
        $split = explode(";-;", $index);
        if(sizeof($split) == 2) {
            $setting = new stdClass();
            $setting->name = $split[1];
            $setting->value = $val;
            $api->getStoreApplicationPool()->setSetting($split[0], $setting);
        }
    }
    echo "<div style='background-color:green; padding: 10px;text-align:center; color:#fff;'><b>Settings has been saved</b></div>";
}

$store = $api->getStoreManager()->getMyStore();
$apps = $api->getStoreApplicationPool()->getApplications();
$appsActivated = array();
$paymentSettings = $api->getStoreApplicationPool()->getPaymentSettingsApplication();
foreach($apps as $app) {
    $appsActivated[$app->id] = $app;
}


?>
<div class="settingsrow">
    <div class="settings_name">
        Shop id
    </div>
    <div class="settingsvalue">
        <? echo $store->id; ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Currency
    </div>
    <div class="settingsvalue">
        <select class="config" gs_model="ecommercesettings" gs_model_attr="currency">
            <option value="">Not specified</option>
            <option value="AED">United Arab Emirates dirham</option>
            <option value="AFN">Afghan afghani</option>
            <option value="ALL">Albanian lek</option>
            <option value="AMD">Armenian dram</option>
            <option value="ANG">Netherlands Antillean guilder</option>
            <option value="AOA">Angolan kwanza</option>
            <option value="ARS">Argentine peso</option>
            <option value="AUD">Australian dollar</option>
            <option value="AWG">Aruban florin</option>
            <option value="AZN">Azerbaijani manat</option>
            <option value="BAM">Bosnia and Herzegovina convertible mark</option>
            <option value="BBD">Barbados dollar</option>
            <option value="BDT">Bangladeshi taka</option>
            <option value="BGN">Bulgarian lev</option>
            <option value="BHD">Bahraini dinar</option>
            <option value="BIF">Burundian franc</option>
            <option value="BMD">Bermudian dollar</option>
            <option value="BND">Brunei dollar</option>
            <option value="BOB">Boliviano</option>
            <option value="BOV">Bolivian Mvdol</option>
            <option value="BRL">Brazilian real</option>
            <option value="BSD">Bahamian dollar</option>
            <option value="BTN">Bhutanese ngultrum</option>
            <option value="BWP">Botswana pula</option>
            <option value="BYR">Belarusian ruble</option>
            <option value="BZD">Belize dollar</option>
            <option value="CAD">Canadian dollar</option>
            <option value="CDF">Congolese franc</option>
            <option value="CHE">WIR Euro (complementary currency)</option>
            <option value="CHF">Swiss franc</option>
            <option value="CHW">WIR Franc (complementary currency)</option>
            <option value="CLF">Unidad de Fomento (funds code)</option>
            <option value="CLP">Chilean peso</option>
            <option value="CNY">Chinese yuan</option>
            <option value="COP">Colombian peso</option>
            <option value="COU">Unidad de Valor Real</option>
            <option value="CRC">Costa Rican colon</option>
            <option value="CUC">Cuban convertible peso</option>
            <option value="CUP">Cuban peso</option>
            <option value="CVE">Cape Verde escudo</option>
            <option value="CZK">Czech koruna</option>
            <option value="DJF">Djiboutian franc</option>
            <option value="DKK">Danish krone</option>
            <option value="DOP">Dominican peso</option>
            <option value="DZD">Algerian dinar</option>
            <option value="EGP">Egyptian pound</option>
            <option value="ERN">Eritrean nakfa</option>
            <option value="ETB">Ethiopian birr</option>
            <option value="EUR">Euro</option>
            <option value="FJD">Fiji dollar</option>
            <option value="FKP">Falkland Islands pound</option>
            <option value="GBP">Pound sterling</option>
            <option value="GEL">Georgian lari</option>
            <option value="GHS">Ghanaian cedi</option>
            <option value="GIP">Gibraltar pound</option>
            <option value="GMD">Gambian dalasi</option>
            <option value="GNF">Guinean franc</option>
            <option value="GTQ">Guatemalan quetzal</option>
            <option value="GYD">Guyanese dollar</option>
            <option value="HKD">Hong Kong dollar</option>
            <option value="HNL">Honduran lempira</option>
            <option value="HRK">Croatian kuna</option>
            <option value="HTG">Haitian gourde</option>
            <option value="HUF">Hungarian forint</option>
            <option value="IDR">Indonesian rupiah</option>
            <option value="ILS">Israeli new sheqel</option>
            <option value="INR">Indian rupee</option>
            <option value="IQD">Iraqi dinar</option>
            <option value="IRR">Iranian rial</option>
            <option value="ISK">Icelandic króna</option>
            <option value="JMD">Jamaican dollar</option>
            <option value="JOD">Jordanian dinar</option>
            <option value="JPY">Japanese yen</option>
            <option value="KES">Kenyan shilling</option>
            <option value="KGS">Kyrgyzstani som</option>
            <option value="KHR">Cambodian riel</option>
            <option value="KMF">Comoro franc</option>
            <option value="KPW">North Korean won</option>
            <option value="KRW">South Korean won</option>
            <option value="KWD">Kuwaiti dinar</option>
            <option value="KYD">Cayman Islands dollar</option>
            <option value="KZT">Kazakhstani tenge</option>
            <option value="LAK">Lao kip</option>
            <option value="LBP">Lebanese pound</option>
            <option value="LKR">Sri Lankan rupee</option>
            <option value="LRD">Liberian dollar</option>
            <option value="LSL">Lesotho loti</option>
            <option value="LTL">Lithuanian litas</option>
            <option value="LVL">Latvian lats</option>
            <option value="LYD">Libyan dinar</option>
            <option value="MAD">Moroccan dirham</option>
            <option value="MDL">Moldovan leu</option>
            <option value="MGA">Malagasy ariary</option>
            <option value="MKD">Macedonian denar</option>
            <option value="MMK">Myanma kyat</option>
            <option value="MNT">Mongolian tugrik</option>
            <option value="MOP">Macanese pataca</option>
            <option value="MRO">Mauritanian ouguiya</option>
            <option value="MUR">Mauritian rupee</option>
            <option value="MVR">Maldivian rufiyaa</option>
            <option value="MWK">Malawian kwacha</option>
            <option value="MXN">Mexican peso</option>
            <option value="MXV">Mexican Unidad de Inversion (UDI) (funds code)</option>
            <option value="MYR">Malaysian ringgit</option>
            <option value="MZN">Mozambican metical</option>
            <option value="NAD">Namibian dollar</option>
            <option value="NGN">Nigerian naira</option>
            <option value="NIO">Nicaraguan córdoba</option>
            <option value="NOK" selected="true">Norwegian krone</option>
            <option value="NPR">Nepalese rupee</option>
            <option value="NZD">New Zealand dollar</option>
            <option value="OMR">Omani rial</option>
            <option value="PAB">Panamanian balboa</option>
            <option value="PEN">Peruvian nuevo sol</option>
            <option value="PGK">Papua New Guinean kina</option>
            <option value="PHP">Philippine peso</option>
            <option value="PKR">Pakistani rupee</option>
            <option value="PLN">Polish złoty</option>
            <option value="PYG">Paraguayan guaraní</option>
            <option value="QAR">Qatari rial</option>
            <option value="RON">Romanian new leu</option>
            <option value="RSD">Serbian dinar</option>
            <option value="RUB">Russian rouble</option>
            <option value="RWF">Rwandan franc</option>
            <option value="SAR">Saudi riyal</option>
            <option value="SBD">Solomon Islands dollar</option>
            <option value="SCR">Seychelles rupee</option>
            <option value="SDG">Sudanese pound</option>
            <option value="SEK">Swedish krona/kronor</option>
            <option value="SGD">Singapore dollar</option>
            <option value="SHP">Saint Helena pound</option>
            <option value="SLL">Sierra Leonean leone</option>
            <option value="SOS">Somali shilling</option>
            <option value="SRD">Surinamese dollar</option>
            <option value="SSP">South Sudanese pound</option>
            <option value="STD">São Tomé and Príncipe dobra</option>
            <option value="SYP">Syrian pound</option>
            <option value="SZL">Swazi lilangeni</option>
            <option value="THB">Thai baht</option>
            <option value="TJS">Tajikistani somoni</option>
            <option value="TMT">Turkmenistani manat</option>
            <option value="TND">Tunisian dinar</option>
            <option value="TOP">Tongan paʻanga</option>
            <option value="TRY">Turkish lira</option>
            <option value="TTD">Trinidad and Tobago dollar</option>
            <option value="TWD">New Taiwan dollar</option>
            <option value="TZS">Tanzanian shilling</option>
            <option value="UAH">Ukrainian hryvnia</option>
            <option value="UGX">Ugandan shilling</option>
            <option value="USD">United States dollar</option>
            <option value="UYI">Uruguay Peso en Unidades Indexadas (URUIURUI) (funds code)</option>
            <option value="UYU">Uruguayan peso</option>
            <option value="UZS">Uzbekistan som</option>
            <option value="VEF">Venezuelan bolívar fuerte</option>
            <option value="VND">Vietnamese đồng</option>
            <option value="VUV">Vanuatu vatu</option>
            <option value="WST">Samoan tala</option>
            <option value="XAF">CFA franc BEAC</option>
            <option value="XAG">Silver (one troy ounce)</option>
            <option value="XAU">Gold (one troy ounce)</option>
            <option value="XBA">European Composite Unit (EURCO) (bond market unit)</option>
            <option value="XBB">European Monetary Unit (E.M.U.-6) (bond market unit)</option>
            <option value="XBC">European Unit of Account 9 (E.U.A.-9) (bond market unit)</option>
            <option value="XBD">European Unit of Account 17 (E.U.A.-17) (bond market unit)</option>
            <option value="XCD">East Caribbean dollar</option>
            <option value="XDR">Special drawing rights</option>
            <option value="XFU">UIC franc (special settlement currency)</option>
            <option value="XOF">CFA Franc BCEAO</option>
            <option value="XPD">Palladium (one troy ounce)</option>
            <option value="XPF">CFP franc</option>
            <option value="XPT">Platinum (one troy ounce)</option>
            <option value="YER">Yemeni rial</option>
            <option value="ZAR">South African rand</option>
            <option value="ZMK">Zambian kwacha</option>
            <option value="ZWL">Zimbabwe dollar</option>
        </select>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Shop name
    </div>
    <div class="settingsvalue">
        <? echo $store->configuration->shopName; ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Shop email
    </div>
    <div class="settingsvalue">
        <? echo $store->configuration->emailAdress; ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        GetShop cloud
    </div>
    <div class="settingsvalue">
        <a href='https://www.getshop.com/cloud.html' target='_new'>Open GetShop cloud for more advanced settings and reports</a>
    </div>
</div>
<br><br>
<h1>Premium options</h1>
<div class="settingsrow">
    <div class="settings_name">
        Mobile administration application
    </div>
    <div class="settingsvalue">
        <? 
        if($store->premium) {
            echo "Download det GetShop eCommerce application from Google play or app store, and your address, username and password.";
        } else {
            echo "not connected";
        }
        ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Your store in app store / google play
    </div>
    <div class="settingsvalue">
        <? 
        if($store->mobileApp) {
            echo "Available in your getshop cloud";
        } else {
            echo "not available";
        }
        ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Facebook store
    </div>
    <div class="settingsvalue">
        <? 
        if($store->premium) {
            echo "Available in your getshop cloud";
        } else {
            echo "not available";
        }
        ?>
    </div>
</div>
<div class="settingsrow">
    <div class="settings_name">
        Product embed widgets
    </div>
    <div class="settingsvalue">
         <? 
        if($store->premium) {
            echo "Available in your getshop cloud";
        } else {
            echo "not available";
        }
        ?>
    </div>
</div>
<br>
<? 
if(!$store->premium) {
    echo "* You are not a premium store member. <br>* Visit <a href='http://www.getshop.com'>www.getshop.com</a> for more information about becoming a premium store member.";
}
?>
<br>
<br>
<form action='' method='POST'>
<h1>Payment gateways</h1>

<?
$allApps = $api->getStoreApplicationPool()->getAvailableApplications();

foreach($allApps as $app) {
    $active = false;
    if($app->type == "PaymentApplication") {
        ?>
        <div class="settingsrow">
            <div class="settings_name">
                <?
                if(isset($appsActivated[$app->id])) {
                    echo "<b>" . $app->appName . " settings</b>";
                } else {
 echo $app->appName;                    
                }
                ?>
                
            </div>
            <div class="settingsvalue">
                <?
                if(isset($appsActivated[$app->id])) {
                    $active=true;
                    echo "";
                } else {
                    echo "<a href='?page=ge-settings&tab=settings&activateApp=".$app->id."'>activate</a>";
                }
                ?>
            </div>
        </div>
        <?
        if($active) {
            echo "<div style='padding-top: 10px; margin-top:10px; padding-left: 10px;background-color:#efefef;'>";
            if(isset($paymentSettings->{$app->id})) {
                echo "<table width='100%'>";
                foreach($paymentSettings->{$app->id} as $settingsRow) {
                    $curValue = "";
                    if(isset($app->settings) && isset($app->settings->{$settingsRow->settingsKey}))
                        $curValue = $app->settings->{$settingsRow->settingsKey}->value;

                    echo "<tr>";
                        echo "<td width='50%'>" . $settingsRow->name . "<br>";
                        echo "<span style='font-size:10px;margin-bottom: 10px;display:inline-block;'>&nbsp;&nbsp;* " . $settingsRow->description . "</span></td>";
                        echo "<td valign='top'>";
                    if($settingsRow->type == "string") {
                        echo "<input type='text' name='".$app->id.";-;".$settingsRow->settingsKey."' value='$curValue'>"; 
                    } else if($settingsRow->type == "boolean") {
                        $checked = "";
                        if($curValue == "on") {
                            $checked = " CHECKED";
                        }
                        echo "<input type='hidden' name='".$app->id.";-;".$settingsRow->settingsKey."'  value='off'>"; 
                        echo "<input type='checkbox' name='".$app->id.";-;".$settingsRow->settingsKey."' $checked>"; 
                    } else {
                        print_r($settingsRow) . "1123123<br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "</div>";
        }
    }
}
?>
<br>


<div style="text-align:right;">
    <input type='submit' class="button" value="Save configuration" name='save_config'>
</div>
</form>


<style>
    .settingsrow { clear:both; padding-bottom: 10px; padding-top: 10px; }
    .settingsrow div { width: 50%; float:left; display:inline-block; }
    .settingsrow .settingsvalue { width:50%; }
</style>