<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     category pages
*/

include 'proses.php';

?>

<section role="main" class="content-body">
	<!-- Breadchrume -->
	<header class="page-header">
		<h2>Tambah Berita</h2>
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li><a href="<?php echo c_LANDING;?>"><i class="fa fa-home"></i></a></li>
				<li><a href="./">Berita</a></li>
				<li><span>Add</span></li>
			</ol>
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<form method='post' action='<?php echo c_SELF;?>' class="form-horizontal form-bordered">

		<?php  
			if (!empty($_GET['mode']) && $_GET['mode'] == "edit") {
				$name = "PGID";
				?>
				<input name="id" type="hidden" value="<?php echo !empty($default[$name]) ? $default[$name] : "" ?>">
				<?php
			}
		?>
		
		<div class="row">

			<div class="col-md-8">
				<div class="row">
					<section class="panel panel-transparent">
						<div class="panel-body">

							<div class="form-group">				
								<div class="col-md-12">
									<?php  
										$name = "p_name";
									?>
									<input name="title" id="title" placeholder="Ketik Title Disini" class="form-control input-lg" value="<?php echo !empty($default[$name]) ? $default[$name] : "" ?>">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									<?php  
										$name = "p_content";
									?>
									<textarea class="summernote" id="article" name="article" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "mode": "text/html", "htmlMode": "true", "lineNumbers": "true", "theme": "monokai" } }'>
										<?php echo !empty($default[$name]) ? $default[$name] : "" ?>
									</textarea>
								</div>
							</div>

						</div>
					</section>
				</div>

				<!-- Seo Panel -->
				<!-- Underconstruction for database
				<div class="row">
					<div class="toggle panel" data-plugin-toggle>
						
						<section class="toggle">
							<label>SEO Panel</label>
							<div class="toggle-content panel-body">
								<div class="form-group">
									<label class="col-md-3 control-label" for="seo_title">Meta Title</label>
									<div class="col-md-9">
										<input name="seo_title" id="seo_title" type="text" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="seo_keyword">Meta Keyword</label>
									<div class="col-md-9">
										<input name="seo_keyword" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" />
										<p>Pisahkan dengan tanda <code>, (koma)</code> untuk setiap keyword yang di inputkan.</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="seo_desc">Meta Description</label>
									<div class="col-md-9">
										<textarea rows="6" name="seo_desc" id="seo_desc" data-plugin-textarea-autosize class="form-control" ></textarea>
									</div>
								</div>

							</div>
						</section>
					</div>
				</div> -->

			</div>

			<div class="col-md-4">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<section class="panel panel-featured-primary">
							<header class="panel-heading panel-featured-left">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
								<h2 class="panel-title">Image</h2>
							</header>
							<div class="panel-body">

								<?php  
								$name = 'p_img';
								if (!empty($default[$name])) {
									?>
								<div class="form-group">
									<div class="col-md-9">
										<img src="<?php echo !empty($default[$name]) ? $default[$name] : "" ?>" alt="">
									</div>
								</div>
									<?php
								}
								?>

								<div class="form-group">
									<label class="col-md-3 control-label" for="image">Search</label>
									<div class="col-md-9">
										<input name="image" id="image" type="file" class="form-control">
									</div>
								</div>

							</div>
						</section>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<!-- Atribut -->
						<section class="panel panel-featured-primary">
							<header class="panel-heading panel-featured-left">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
								<h2 class="panel-title">Atribut Berita</h2>
							</header>
							
							<!-- Body Atribut -->
							<div class="panel-body">

								<div class="form-group">
									<label class="col-md-3 control-label" for="slug">Slug</label>
									<?php  
										$name = 'p_slug';
									?>
									<div class="col-md-9">
										<input name="slug" id="slug" type="text" class="form-control" value="<?php echo !empty($default[$name]) ? $default[$name] : "" ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="T_ID">Kategori</label>
									<div class="col-md-9">
										<select name="T_ID" id="T_ID" class="form-control mb-md">
											<?php
											include "pages-function.php";
								            $sql -> db_Select("taxonomy", "T_ID, c_name", "WHERE `c_parent_ID`='0' AND `type`='3' GROUP BY T_ID");
								            while($row = $sql-> db_Fetch()){
								                echo "<option value=\"{$row['T_ID']}\">{$row['c_name']}</option>\n";
								                SELECT_CHILD($row['T_ID'], 1);
								            }
								            ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="publish_date">Tanggal Post</label>
									<div class="col-md-9">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											<?php  
												$name = "ac_date";
											?>
											<input name= "publish_date" type="text" data-plugin-datepicker class="form-control" value="<?php echo !empty($default[$name]) ? $default[$name] : date('m/d/Y')?>"> 
											<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
											<?php  
												$name = "ac_time";
											?>
											<input name="publish_time" type="text" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo !empty($default[$name]) ? $default[$name] : date("H:i:s") ?>">
										</div>
									</div>
								</div>

							</div>

							<footer class="panel-footer">
								<button type="submit" name="form_submit" value="1" class="btn btn-default"><i class="fa fa-save"></i> Draft </button>
								<button type="submit" name="form_submit" value="2" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Publish </button>
							</footer>

						</section>
					</div>
				</div>

			</div>
		</div>
	</form>
	
	<!-- Back To Prev -->
	<div class="row">
		<p></p>
		<section class="panel">
			<a href="./" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
		</section>
	</div>

</section>
</div>
<?php
@include(AdminFooter);
?>