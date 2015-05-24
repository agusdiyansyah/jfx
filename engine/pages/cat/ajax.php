<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     ajax-wms
*/

@include ("../../../l0t/render.php");
require_once("../pages-function.php");

//Form add cat
if(trim(strip_tags($_GET['ac'])) == "add_cat") {
	if (!empty($_POST['t_name'])) {
		$rw = createSlugDB($_POST['t_name'], "taxonomy");
		$sql -> db_Insert("taxonomy", "'', '2', '".$rw."', '".$_POST['t_name']."', '".$_POST['t_parent_ID']."', '' ");
		$sql -> db_Select("taxonomy", "*", "WHERE `t_parent_ID`='0' AND `type`='2'");
		while ($row = $sql-> db_Fetch()) {
		    echo "
		    <tr>
		        <td>".$row['TID']."</td>
		        <td><a href='#edit' class='text-bold'>".$row['t_name']."</a>
		        	<p class=\"actions-hover actions-fade\"><a href='#'>Edit</a> <a href='#'>Quick Edit</a> <a href='#'>View</a> <a href='#modalAnim' data-id=\"".$row['TID']."\" class=\"delete-row modal-with-move-anim\">Delete</a></p>
		        </td>
		        <td>".$row['t_slug']."</td>
		        <td class='text-center'>".$row['t_count']."</td>
		    </tr>
		    ";
		    VIEW_CHILD($row['TID'], 1);
		}
	}
}
//Form del cat
if(trim(strip_tags($_GET['ac'])) == "del_cat") {
	if (!empty($_GET['id'])) {
		$sql -> db_Delete("taxonomy", "TID='".$_GET['id']."'");
		$sql -> db_Select("taxonomy", "*", "WHERE ```='0' AND `type`='2'");
		while ($row = $sql-> db_Fetch()) {
		    echo "`
		    <tr>
		        <td>".$row['TID']."</td>
		        <td><a href='#edit' class='text-bold'>".$row['t_name']."</a>
		        	<p class=\"actions-hover actions-fade\"><a href='#'>Edit</a> <a href='#'>Quick Edit</a> <a href='#'>View</a> <a href='#modalAnim' data-id=\"".$row['TID']."\" class=\"delete-row modal-with-move-anim\">Delete</a></p>
		        </td>
		        <td>".$row['t_slug']."</td>
		        <td class='text-center'>".$row['t_count']."</td>
		    </tr>
		    ";
		    VIEW_CHILD($row['TID'], 1);
		}
	}
}
?>