<?php
/*
Template Name: Create
*/
?>
<?php get_header();?>
<header>
	<h1>Create a New Project</h1>
</header>
<div class="content-wrap" id="create-content-wrap">
	<section class="tools">
		<div class="primary">
			<a href="<?php bloginfo('url')?>/create/" class="start-over-btn"><span class='iconic spin'></span> Start over</a>
		</div>
		<div class="secondary">
			<a href="http://twitter.com/codekickoff" class="feedback-btn">Tell us what you think! <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://codekickoff.com/" data-text="Want to kick off your new web project? Check out Code Kick Off!" data-count="horizontal" data-via="codekickoff">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></a>
		</div>
	</section>
	<section class="resumen">
		<div class="wrapper">
			<ol class="top-level">
				<li class="setting active" id="general-tab">
					<h3 class="title">General Settings</h3>
					<div class="saved">
						<ul>
							<li id="setting-project-name"><strong class="label">Project Name:</strong> <span class="value">Project Name</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="bp-tab">
					<h3 class="title">HTML5 Boilerplate</h3>
					<div class="saved">
						<ul>
							<li id="setting-bp-platform"><strong class="label">Platform:</strong> <span class="value"></span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="compass-tab">
					<h3 class="title">Compass</h3>
					<div class="saved">
						<ul>
							<li id="setting-compass-libs"><strong class="label">Modules:</strong> <span class="value">1, 2 and 3</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="grid-tab">
					<h3 class="title">CSS Grid</h3>
					<div class="saved">
						<ul>
							<li id="setting-grid-system"><strong class="label">Grid:</strong> <span class="value">Less Framework</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="wp-tab">
					<h3 class="title">Wordpress</h3>
					<div class="saved">
						<ul>
							<li id="setting-wp-custom"><strong class="label">Include Custom Type:</strong> <span class="value">Yes</span></li>
							<li id="setting-wp-admin"><strong class="label">Include Admin Config:</strong> <span class="value">Yes</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="drupal-tab">
					<h3 class="title">Drupal</h3>
				</li>
			</ol>
			<div class="download">
				<a href="#" class="download-btn"><span>Download</span></a>
			</div>
		</div>
	</section>
	<section class="settings-panel">
		<div class="wrapper">
			<form id="code_settings_form" action="<?php bloginfo('url')?>/process/" method="post">
				<ol class="top-level">
					<li class="setting" id="general-settings">
						<header>
							<h2>General Settings</h2>
						</header>
						<div class="content">
							<fieldset class="first">
								<!--<h4 class="legend">Project name:</h4>-->
								<ul class="field-list">
									<li class="field text huge">
										<label for="general_name">Project Name:</label>
										<input type="text" name="general[name]" id="general_name" value="Project Name" title="Project Name" />
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second">
								<h4 class="legend">Directory Names</h4>
								<ul class="field-list">
									<li class="field text medium">
										<label for="general_img_dir">Image directory:</label>
										<input type="text" name="general[img_dir]" id="general_img_dir" value="img" />
										<!--<small class="description">What do you like for your image directory?</small>-->
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">What do you like for your image directory?</span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field text medium">
										<label for="general_js_dir">JavaScript directory:</label>
										<input type="text" name="general[js_dir]" id="general_js_dir" value="js" />
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">What do you like for your JavaScript directory?</span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field text medium">
										<label for="general_css_dir">Stylesheets directory:</label>
										<input type="text" name="general[css_dir]" id="general_css_dir" value="css" />
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">What do you like for your Stylesheets directory?</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<div class="buttons">
								<a href="#" class="next-btn">Next &rarr;</a>
							</div>
						</div>
					</li>
					<li class="setting" id="bp-settings">
						<header>
							<h2>HTML5 Boilerplate</h2>
						</header>
						<div class="content">
							<fieldset class="first activator-set">
								<h4 class="legend">Include HTML5 Boilerplate</h4>
								<ul class="field-list">
									<li class="field checkbox activator">
										<input type="checkbox" name="general[include][bp]" id="general_include_bp" value="1" />
										<label for="general_include_bp">Include HTML5 Boilerplate</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content"><a href="http://html5boilerplate.com/" target="_blank">HTML5 Boilerplate</a> is a base HTML, CSS &amp; JS template for a fast, robust and future-proof site.</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second last details">
								<h4 class="legend">HTML5 Boilerplate Settings</h4>
								<ul class="field-list">
									<li class="field radio-group">
										<label><strong>Server Platform</strong></label>
										<ul class="field radio-buttons inline">
											<li class="field">
												<input type="radio" name="general[bp][platform]" id="general_bp_platform_apache" value="apache" />
												<label for="general_bp_platform_apache">Apache</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Will keep the .htaccess file and get rid of web.config &amp; nginx.conf</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="radio" name="general[bp][platform]" id="general_bp_platform_iis" value="iis" />
												<label for="general_bp_platform_iis">IIS</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Will keep the web.config file and get rid of .htaccess &amp; nginx.conf</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="radio" name="general[bp][platform]" id="general_bp_platform_nginx" value="nginx" />
												<label for="general_bp_platform_nginx">nginx</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Will keep the nginx.conf file and get rid of web.config &amp; .htaccess</span>
												</small>
												<div class="clear"></div>
											</li>
										</ul>
									</li>
									<!--
									<li class="field checkbox">
										<input type="checkbox" name="general[bp][commented]" id="general_bp_commented" value="1" />
										<label for="general_bp_commented">Keep the Developer Comments</label>
									</li>
									-->
								</ul>
							</fieldset>
							<div class="buttons">
								<a href="#" class="prev-btn">Go back</a> | <a href="#" class="next-btn">Next &rarr;</a>
							</div>
						</div>
					</li>
					<li class="setting" id="compass-settings">
						<header>
							<h2>Compass</h2>
						</header>
						<div class="content">
							<fieldset class="first activator-set">
								<h4 class="legend">Include Compass</h4>
								<ul class="field-list">
									<li class="field checkbox activator">
										<input type="checkbox" name="general[include][compass]" id="general_include_compass" value="1" />
										<label for="general_include_compass">Include Compass</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">You must have <a href="http://compass-style.org/docs/" target="_blank">Compass</a> installed to be able to compile the source files</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second last details">
								<h4 class="legend">Compass Settings</h4>
								<ul class="field-list">
									<li class="field radio-group">
										<label>Include these modules</label>
										<ul class="field-list checkbox-buttons checkbox">
											<li class="field">
												<input type="checkbox" name="general[compass][lib][]" id="general_compass_lib_css3" value="css3" />
												<label for="general_compass_lib_css3">CSS3</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">See <a href="http://compass-style.org/docs/reference/compass/css3/" target="_blank">CSS3 module</a> details</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="checkbox" name="general[compass][lib][]" id="general_compass_lib_reset" value="reset" />
												<label for="general_compass_lib_reset">Reset</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">See <a href="<?php bloginfo('url')?>/resources/compass/src/partials/_reset.scss" target="_blank">Reset module</a> details</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="checkbox" name="general[compass][lib][]" id="general_compass_lib_helpers" value="helpers" />
												<label for="general_compass_lib_helpers">Helpers</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">See the <a href="http://compass-style.org/docs/reference/compass/helpers/" target="_blank">Helpers module</a> details</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="checkbox" name="general[compass][lib][]" id="general_compass_lib_utilities" value="utilities" />
												<label for="general_compass_lib_utilities">Utilities</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">See the <a href="http://compass-style.org/docs/reference/compass/utilities/" target="_blank">Utilities module</a> details</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field">
												<input type="checkbox" name="general[compass][lib][]" id="general_compass_lib_blueprint" value="blueprint" />
												<label for="general_compass_lib_blueprint">Blueprint</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">See the <a href="http://compass-style.org/docs/reference/blueprint/" target="_blank">Blueprint module</a> details</span>
												</small>
												<div class="clear"></div>
											</li>
										</ul>
									</li>
								</ul>
							</fieldset>
							<div class="buttons">
								<a href="#" class="prev-btn">Go back</a> | <a href="#" class="next-btn">Next &rarr;</a>
							</div>
						</div>
					</li>
					<li class="setting" id="grid-settings">
						<header>
							<h2>CSS Grid</h2>
						</header>
						<div class="content">
							<fieldset class="first activator-set">
								<h4 class="legend">Include one of these Grids system</h4>
								<ul class="field-list activator-list">
									<li class="field radio">
										<input type="radio" name="general[include][grid]" id="general_include_grid_none" value="none" />
										<label for="general_include_grid_none">Don't include any grid system</label>
										<div class="clear"></div>
									</li>
									<li class="field radio">
										<input type="radio" name="general[include][grid]" id="general_include_grid_tfg" value="tfg" />
										<label for="general_include_grid_tfg">Tiny Fluid Grid</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">Percentage based CSS grid system. Go to <a href="http://www.tinyfluidgrid.com/" target="_blank">Tiny Fluid Grid&rsquo;s site</a> for more details</span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field radio">
										<input type="radio" name="general[include][grid]" id="general_include_grid_less" value="less" />
										<label for="general_include_grid_less">Less Framework</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">Media query based CSS grid system. Go to <a href="http://lessframework.com/" target="_blank">Less Framework&rsquo;s site</a> for more details</span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field radio">
										<input type="radio" name="general[include][grid]" id="general_include_grid_bp" value="bp" />
										<label for="general_include_grid_bp">Blueprint</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">12, 16 &amp; 24 columns fixed width CSS grid system. Go to <a href="http://www.blueprintcss.org/" target="_blank">Blueprint&rsquo;s site</a> for more details</span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field radio">
										<input type="radio" name="general[include][grid]" id="general_include_grid_960" value="960" />
										<label for="general_include_grid_960">960.gs</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">12, &amp; 16 columns fixed width CSS grid system. Go to <a href="http://960.gs/" target="_blank">960.gs site</a> for more details</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second details grid-details" id="tfg-details">
								<h4 class="legend">Tiny Fluid Grid Settings</h4>
								<ul class="field-list">
									<li class="field select small">
										<label for="general_grid_tfg_columns">Number of Columns</label>
										<select name="general[grid][tfg][columns]" id="general_grid_tfg_columns">
											<option>12</option>
											<option>16</option>
											<option>24</option>
										</select>
										<div class="clear"></div>
									</li>
									<li class="field select small">
										<label for="general_grid_tfg_gutter">Gutter Percentage</label>
										<select name="general[grid][tfg][gutter]" id="general_grid_tfg_gutter">
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
										</select>
										<div class="clear"></div>
									</li>
									<li class="field select small">
										<label><strong>Min & Max Width</strong></label>
										<ul class="field-list field select small">
											<li class="field select small">
												<label for="general_grid_tfg_minw">Min Width</label>
												<select name="general[grid][tfg][minw]" id="general_grid_tfg_minw">
													<option>800</option>
													<option>960</option>
													<option>1080</option>
													<option>1200</option>
												</select>
											</li>
											<li class="field select small">
												<label for="general_grid_tfg_maxw">Max Width</label>
												<select name="general[grid][tfg][maxw]" id="general_grid_tfg_maxw">
													<option>800</option>
													<option>960</option>
													<option>1080</option>
													<option>1200</option>
												</select>
											</li>
										</ul>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second details grid-details" id="less-details">
								<h4 class="legend">Less Framework Settings</h4>
								<ul class="field-list">
									<li>
										<label><strong>Options</strong></label>
										<ul class="field-list">
											<li class="field radio">
												<input type="radio" name="general[grid][less][op]" id="general_grid_less_op_15" value="15" />
												<label for="general_grid_less_op_15">Optimize for 1.5 line-height</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Typography presets based on 16 px text. Good for fonts like Georgia.</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field radio">
												<input type="radio" name="general[grid][less][op]" id="general_grid_less_op_14" value="14" />
												<label for="general_grid_less_op_14">Optimize for 1.4 line-height</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Typography presets based on 17 px text. Good for fonts like Palatino.</span>
												</small>
												<div class="clear"></div>
											</li>
											<li class="field radio">
												<input type="radio" name="general[grid][less][op]" id="general_grid_less_op_13" value="13" />
												<label for="general_grid_less_op_13">Optimize for 1.33 line-height</label>
												<small class="help">
													<a href="#">(?)</a>
													<span class="help-content">Typography presets based on 18 px text. Good for fonts like Times.</span>
												</small>
												<div class="clear"></div>
											</li>
										</ul>
									</li>
									<li class="field checkbox">
										<input type="checkbox" name="general[grid][less][retina]" id="general_grid_less_retina" value="1" />
										<label for="general_grid_less_retina">Include retina media query</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">Adds a media query that targets screens with a device-pixel-ratio of 2+.</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<div class="buttons">
								<a href="#" class="prev-btn">Go back</a> | <a href="#" class="next-btn">Next &rarr;</a>
							</div>
						</div>
					</li>
					<li class="setting" id="wp-settings">
						<header>
							<h2>Wordpress</h2>
						</header>
						<div class="content">
							<fieldset class="first activator-set">
								<h4 class="legend">Wordpress Theme</h4>
								<ul class="field-list">
									<li class="field checkbox activator">
										<input type="checkbox" name="general[include][wp]" id="general_include_wp" value="1" />
										<label for="general_include_wp">Make it a Wordpress theme</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">Create all the necessary files for a Wordpress theme, i.e.: style.css, screenshot.png, index.php, etc.</span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<fieldset class="second last details">
								<h4 class="legend">Wordpress Theme Settings</h4>
								<ul class="field-list">
									<li class="field checkbox">
										<input type="checkbox" name="general[wp][custom_post]" id="general_wp_custom_post" value="1" />
										<label for="general_wp_custom_post">Include sample custom post type</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">This will add some sample code that generates a custom post type. <a href="http://codex.wordpress.org/Post_Types" target="_blank">Read more details</a></span>
										</small>
										<div class="clear"></div>
									</li>
									<li class="field checkbox">
										<input type="checkbox" name="general[wp][admin_config]" id="general_wp_admin_config" value="1" />
										<label for="general_wp_admin_config">Include sample admin configuration</label>
										<small class="help">
											<a href="#">(?)</a>
											<span class="help-content">This will add to the functions.php file a sample code that generates a section with settings for your theme. <a href="http://net.tutsplus.com/tutorials/wordpress/how-to-create-a-better-wordpress-options-panel/" target="_blank">It will look like this.</a></span>
										</small>
										<div class="clear"></div>
									</li>
								</ul>
							</fieldset>
							<div class="buttons">
								<a href="#" class="prev-btn">Go back</a> | <a href="#" class="download-btn">Download</a>
							</div>
						</div>
					</li>
					<li class="setting" id="drupal-settings">
						<header>
							<h2>Drupal</h2>
						</header>
						<div class="content">
							<fieldset class="first activator-set">
								<h4 class="legend">Drupal Theme Coming Soon!</h4>
							</fieldset>
							<div class="buttons">
								<a href="#" class="prev-btn">Go back</a> | <a href="#" class="download-btn">Download</a>
							</div>
						</div>
					</li>
				</ol>
			</form>
		</div>
	</section>
	<div class="clear"></div><br />
	<div style="float:left;margin-right:20px;width:468px;">
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-7822138632410714";
		/* Code Kick Off Create */
		google_ad_slot = "7308778239";
		google_ad_width = 468;
		google_ad_height = 60;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
	<div style="float:left;width:468px;">
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-7822138632410714";
		/* Code Kick Off Create */
		google_ad_slot = "7308778239";
		google_ad_width = 468;
		google_ad_height = 60;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
	<div class="clear"></div>
</div>
<?php
function js(){
?>
<script>
$(function(){
	settings_config = [
		'general',
		'bp',
		'compass',
		'grid',
		'wp',
		'drupal'
	];
	var previous = null;
	$.each(settings_config, function(index,value){
		$('#'+value+'-tab a').click(function(e){
			e.preventDefault();
		});
		$('#'+value+'-tab').click(function(){
			hideAllSettings();
			showSetting(value);
			document.location.href = '#'+value;
		});
		if(previous != null){
			var previous_val = previous;
			$('#'+value+'-settings .prev-btn').attr('href','#'+previous+'').click(function(e){
				hideAllSettings();
				showSetting(previous_val);
			});
			$('#'+previous+'-settings .next-btn').attr('href','#'+value+'').click(function(e){
				hideAllSettings();
				showSetting(value);
			});
		}
		previous = value;
	});
	function hideAllSettings(){
		$('.settings-panel .setting.current').removeClass('current');
		
		$('.resumen .current').each(function(){
			$(this).removeClass('current');
		});
	}
	function showSetting(setting){
		setting_id = '#'+setting+'-settings';
		$('#'+setting+'-tab').addClass('current');
		$(setting_id).addClass('current');
	}
	target = window.location.hash.substring(1);
	if(target == ''){
		showSetting('general');
	} else {
		showSetting(target);
	}
	$('.activator input').each(function(){
		var selected_id = $(this).attr('id').replace('general_include_','');
		if($(this).attr('checked')){
			$('#'+selected_id+'-tab').addClass('active');
			$(this).closest('.setting').find('.details').addClass('activate');
		} else {
			$('#'+selected_id+'-tab').removeClass('active');
			$(this).closest('.setting').find('.details').removeClass('activate');
		}
		$(this).change(function(){
			if($(this).attr('checked')){
				$('#'+selected_id+'-tab').addClass('active').fadeOut(100).fadeIn(100);
				$(this).closest('.setting').find('.details').addClass('activate');
			} else {
				$('#'+selected_id+'-tab').removeClass('active').fadeOut(100).fadeIn(100);
				$(this).closest('.setting').find('.details').removeClass('activate');
			}
		});
	});
	$('.activator-list input').each(function(){
		if($(this).attr('checked')){
			var selected_id = $(this).attr('id').replace('general_include_grid_','');
			if(selected_id != 'none'){
				$('#grid-tab').addClass('active').fadeOut(100).fadeIn(100);
			} else {
				$('#grid-tab').removeClass('active').fadeOut(100).fadeIn(100);
			}
			$('.grid-details').removeClass('activate');
			$('#'+selected_id+'-details').addClass('activate');
		}
		$(this).change(function(){
			var selected_id = $(this).attr('id').replace('general_include_grid_','');
			if(selected_id != 'none'){
				$('#grid-tab').addClass('active').fadeOut(100).fadeIn(100);
			} else {
				$('#grid-tab').removeClass('active').fadeOut(100).fadeIn(100);
			}
			$('.grid-details').removeClass('activate');
			$('#'+selected_id+'-details').addClass('activate');
		})
	});
	$('.download-btn').click(function(){
		$('#code_settings_form').submit();
	});
	
	
	
	
	$.fn.clearDefault = function(){
		return this.each(function(){
			var default_value = $(this).attr('title');
			$(this).val(default_value);
			$(this).focus(function(){
				if ($(this).val() == default_value) {
					$(this).select();
					$(this).css('color','#333');
				}
			});
			$(this).click(function(){
				if ($(this).val() == default_value) {
					$(this).select();
				}
			});
			$(this).keydown(function(){
				if ($(this).val() == default_value) {
					$(this).css('color','#444');
					$(this).val("");
				}
			});
			$(this).blur(function(){
				if ($(this).val() == "") {
					$(this).val(default_value);
					$(this).css('color','#CCC');
				}
				if ($(this).val() == default_value) {
					$(this).css('color','#CCC');
				}
			});
		});
	};
	$(':input').each(function(i,element){
		if($(this).attr('title') != ''){
			$(this).clearDefault();
			if($(this).attr('title') == $(this).val()){
				$(this).css('color','#CCC');
			}
		}
	});
	/* When the form is submitted, go through each input field, 
	if their value equals their title, make the value empty */
	$('form').live('submit',function(){
		$(this).find(':input').each(function(i,el){
			if($(this).attr('title') == $(this).val()){
				$(this).val('');
			}
		});
	});
	$('.help').each(function(){
		$(this).find('a[href=#]').live('click',function(e){
			e.preventDefault();
		});
		$(this).find('a').tooltip({
			position: "center right",
			relative: true,
			offset: [0,5]
		});
	});
	
	$('#setting-project-name .value').html($('#general_name').val());
	$('#general_name').bind('keyup click blur focus change paste',function(){
		$('#setting-project-name .value').html($(this).val());
	});
	
	$('#bp-settings input[type=radio]').each(function(){
		if($(this).attr('checked')){
			$('#setting-bp-platform .value').html($('[for='+$(this).attr('id')+']').html());
		}
		$(this).change(function(){
			$('#setting-bp-platform .value').html($('[for='+$(this).attr('id')+']').html());
		});
	});
	
	var compass_libs = function(){
		var array_compass_libs = [];
		$('#compass-settings .second input[type=checkbox]').each(function(){
			if($(this).attr('checked')){
				array_compass_libs.push($('label[for='+$(this).attr('id')+']').html());
			}
		});
		$('#setting-compass-libs .value').html(array_compass_libs.join(', '));
	}
	compass_libs();
	$('#compass-settings .second input[type=checkbox]').change(function(){
		compass_libs();
	})
	
	$('#grid-settings .first input[type=radio]').each(function(){
		if($(this).attr('checked')){
			$('#setting-grid-system .value').html($('label[for='+$(this).attr('id')+']').html());
		}
	});
	$('#grid-settings .first input[type=radio]').change(function(){
		$('#setting-grid-system .value').html($('label[for='+$(this).attr('id')+']').html());
	});
	
	
	if($('#general_wp_custom_post').attr('checked')){
		$('#setting-wp-custom .value').html('Yes');
	} else {
		$('#setting-wp-custom .value').html('No');
	}
	$('#general_wp_custom_post').change(function(){
		if($(this).attr('checked')){
			$('#setting-wp-custom .value').html('Yes');
		} else {
			$('#setting-wp-custom .value').html('No');
		}
	});
	
	if($('#general_wp_admin_config').attr('checked')){
		$('#setting-wp-admin .value').html('Yes');
	} else {
		$('#setting-wp-admin .value').html('No');
	}
	$('#general_wp_admin_config').change(function(){
		if($(this).attr('checked')){
			$('#setting-wp-admin .value').html('Yes');
		} else {
			$('#setting-wp-admin .value').html('No');
		}
	});
	
});
</script>
<?php
}
add_action('wp_footer','js');
?>
<?php get_footer();?>