<?php  
	/**
		Form Submit
	*/
	include 'require_file.php';
	/*
		ACTION
		====================
		bd_field	| form_name
		____________________
		ACID		| { inc }
		ac_name		| { 1 = create/draf, 3 = publish }
		ac_date		| publish_date
		ac_time		| publish_time

		$tmp = ACID;

		PAGES
		====================
		bd_field	| form_name
		____________________
		PGID		| { inc }
		ACID		| $tmp
		TID			| T_ID
		UID			| { constant } USER
		type		| 1 { for news/berita }
		p_name		| title
		p_slug		| slug
		p_img		| image
		p_content	| article
		p_mes_count	| { default }

		Require for edit
		=====================
		ac_name
		ac_date
		ac_time
		
		PGID
		UID
		type
		p_name
		p_slug
		p_img
		p_content
		p_mes_count

		FROM
		=====================
		pages
		action
	*/

	if ($_GET['mode'] == 'edit') {
		if (!empty($id = $_GET['id'])) {
			$query = $sql -> db_Select(
				"action, pages", 
				"ac_name, 
					ac_date, 
					ac_time, 
					PGID, 
					UID, 
					type, 
					p_name,
					p_slug,
					p_img,
					p_content,
					p_mes_count",
				"where
					pages.ACID = action.ACID
				and pages.PGID = " . $id
			);
			$default = $query -> db_Fetch();
		} else {
			header("location : ./");
		}
	}

	// get user
	if (!empty($default['UID'])) {
		$query = $sql = db_Select("user","u_nicename");
		$row = $query -> db_Fetch();
	}
		
	if(isset($_POST['form_submit'])) {

		// status post : 1 = draft(created) 2 = publish
		$STATUS_POST = $_POST['form_submit'];

		$PUBLISH_DATETIME = date("Y-m-d H:i:s", strtotime($_POST['publish_date']." ".$_POST['publish_time']));

		if (!empty($_POST['title'])) {
			$rw = createSlugDB($_POST['title'], "PAGES");
			
			$ID = $sql -> db_Insert("PAGES", "'', '".$rw."', '".$_POST['title']."', '".$_POST['T_ID']."', '".U_ID."', '".$STATUS_POST."', '0', '".$STATUS_POST."', NOW(), '".$PUBLISH_DATETIME."' , NOW() ");

			//add article: 1=news 2=pages
			$sql -> db_Insert("ARTICLE", "'', '2', '".$ID."', '".$_POST['article']."'");

			//add count taxonomy
			$sql -> db_Update("taxonomy", "`t_count`=`t_count`+1 WHERE `T_ID`='".$_POST['T_ID']."'");
		}

		return _redirect ( "./edit?s={$STATUS_POST}&landing=".$ID );
	}
?>