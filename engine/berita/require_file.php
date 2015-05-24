<?php  
/**
	INCLUDED
*/
@include ("../../l0t/render.php");
/**
	LOAD COMPONENT
*/
$ITEM_HEAD = "bootstrap.css, font-awesome.css, magnific-popup.css, datepicker3.css, 
				jquery-ui.min.css, pnotify.custom.css, select2.css, summernote.css, summernote-bs3.css, codemirror.css, monokai.css, bootstrap-tagsinput.css, 
				bootstrap-timepicker.css,
				theme.css, default.css, modernizr.js";

$ITEM_FOOT = "jquery.js, jquery.browser.mobile.js, bootstrap.js, nanoscroller.js, bootstrap-datepicker.js, magnific-popup.js, jquery.placeholder.js, 
				jquery-ui.min.js, pnotify.custom.js, jquery.appear.js, select2.js, jquery.autosize.js, codemirror.js, active-line.js, matchbrackets.js, 
				javascript.js, xml.js, htmlmixed.js,css.js, summernote.js, bootstrap-tagsinput.js, bootstrap-timepicker.js, 
				theme.js, theme.init.js";

require_once(c_THEMES."auth.php");

$SCRIPT_FOOT = "
	<script>
		$(document).ready(function(){
			$('html').addClass('sidebar-left-collapsed');
			$('nav li.nav-brt').addClass('nav-expanded nav-active');
			$('nav li.bt').addClass('nav-active');
			$(\"#title\").keyup(function(event) {
		      var text = $(this).val();
		      var slug = generate_slug(text);
		      $(\"#slug\").val(slug);
		    });
		    function generate_slug(str) {
		      var slug = '';
		      var trimmed = $.trim(str);
		      slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		      replace(/-+/g, '-').
		      replace(/^-|-$/g, '');
		      return slug.toLowerCase();
		    }
		});
	</script>
	<script src=\"custom.js\"></script>
	";

?>