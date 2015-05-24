<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since Release 1.0
* @category     init_app_config
*/

$ModuleDir = "engine/";
$AdminDir = "landing/";

$SITE_CONF_AUTOLOAD['NAMA_APP'] = "JFX Journal";
$SITE_CONF_AUTOLOAD['timezone'] = "Asia/Jakarta";
$SITE_CONF_AUTOLOAD['ssl'] = "";
$SITE_CONF_AUTOLOAD['tracking'] = "cookie";

define("c_APP", $SITE_CONF_AUTOLOAD['NAMA_APP']);
define("c_APPVER", "Ver.0.1.1-dev");
define("c_CLIENT", $SITE_CONF_AUTOLOAD['NAMA_CLIENT']);
define("c_ALAMAT", $SITE_CONF_AUTOLOAD['ALAMAT_CLIENT']);

define("c_URL", $BASE_URL.$BASE_PATH);
define("c_BASE", $SCRIPTS_PATH.$BASE_PATH);
define("c_STATIC", c_URL.$THEMES);
define("c_THEMES", c_BASE.$THEMES);
define("c_LANDING", c_URL.$AdminDir);
define("c_MODULE", c_BASE.$ModuleDir);
?>