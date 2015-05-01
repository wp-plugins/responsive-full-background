<?php
/*
Plugin Name: Responsive Full Background
Plugin URI: http://wp-time.com/responsive-full-background/
Description: Add responsive full background to your website easily, compatible with all browsers and with iPhone, iPad, and all phone and tablets.
Version: 1.0.2
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2015  Qassim Hassan  (email : qassim.pay@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// WP Time Page
if( !function_exists('WP_Time_Ghozylab_Aff') ) {
	function WP_Time_Ghozylab_Aff() {
		add_menu_page( 'WP Time', 'WP Time', 'update_core', 'WP_Time_Ghozylab_Aff', 'WP_Time_Ghozylab_Aff_Page');
		function WP_Time_Ghozylab_Aff_Page() {
			?>
            	<div class="wrap">
                	<h2>WP Time</h2>
					<div class="tool-box">
                		<h3 class="title">Thanks for using our plugins!</h3>
                    	<p>For more plugins, please visit <a href="http://wp-time.com" target="_blank">WP Time Website</a> and <a href="https://profiles.wordpress.org/qassimdev/#content-plugins" target="_blank">WP Time profile on WordPress</a>.</p>
                        <p>For contact or support, please visit <a href="http://wp-time.com/contact/" target="_blank">WP Time Contact Page</a>.</p>
					</div>
					<div class="tool-box">
						<h3 class="title">Great WordPress Plugins</h3>
						<p><a href="http://j.mp/GL_WPTime" target="_blank">Must Have Awesome Plugins.</a></p>
                        <p><a href="http://j.mp/GL_WPTime" target="_blank"><img src="http://content.ghozylab.com/partners/aff/images/global-aff-img.png" width="728" height="90"></a></p>
					</div>
                </div>
			<?php
		}
	}
	add_action( 'admin_menu', 'WP_Time_Ghozylab_Aff' );
}


if ( is_admin() ){


	function responsive_full_background() {
		add_theme_page( 'Responsive Full Background Settings', 'Responsive Full Background', 'edit_theme_options', 'responsive_full_background', 'responsive_full_background_settings' );
	}
	add_action( 'admin_menu', 'responsive_full_background' );


	function rfb_register_setting() {
		register_setting( 'setting_rf_background_link', 'rf_background_link' );
	}
	add_action( 'admin_init', 'rfb_register_setting' );
	
		
	function responsive_full_background_settings(){
		?>
			<div class="wrap">
				<h2>Responsive Full Background Settings</h2>
				<?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ){ ?>
					<div id="setting-error-settings_updated" class="updated settings-error"> 
						<p><strong>Settings saved.</strong></p>
					</div>
				<?php } ?>
                
            	<form method="post" action="options.php">
                	<?php settings_fields( 'setting_rf_background_link' ); ?>
                        <?php
                        	$rf_background_link_filter = wp_filter_kses( get_option('rf_background_link') );
						?>
                	<table class="form-table">
                		<tbody>
                    		<tr>
                        		<th><label for="rf_background_link">Background Link</label></th>
                            	<td>
                                    <input class="regular-text" name="rf_background_link" type="text" id="rf_background_link" placeholder="enter background link" value="<?php echo esc_attr($rf_background_link_filter); ?>">
                                        <?php if ( is_ssl() ) {echo '<p><a href="'.admin_url( 'media-new.php', 'https' ).'" target="_blank">upload media</a></p>';}else{echo '<p><a href="'.admin_url( 'media-new.php', 'http' ).'" target="_blank">upload media</a></p>';}?>
								</td>
                        	</tr>
                    	</tbody>
                    </table>
                    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="Save Changes"></p>
                </form>
        		<div class="tool-box">
					<h3 class="title">Beautiful WordPress Themes</h3>
					<p>Get collection of 87 WordPress themes for $69 only, a lot of features and free support! <a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Get it now</a>.</p>
					<p>See also:</p>
						<ul>
							<li><a href="http://j.mp/GL_WPTime" target="_blank">Must Have Awesome Plugins.</a></li>
							<li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
							<li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
							<li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
							<li><a href="http://j.mp/BH_WPTime" target="_blank">Unlimited web hosting for $3.95 only.</a></li>
						</ul>
					<p><a href="http://j.mp/GL_WPTime" target="_blank"><img src="http://content.ghozylab.com/partners/aff/images/global-aff-img.png" width="728" height="90"></a></p>
					<p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="http://www.elegantthemes.com/affiliates/banners/570x100.jpg"></a></p>
				</div>
            </div>
		<?php 
	}

} // if is_admin END


function responsive_full_background_css(){
	?>

		<?php if( get_option('rf_background_link') )  : ?>
    
			<style type="text/css">
				/* Responsive Full Background Plugin */
				html{
					background-image:none !important;
					background:none !important;
				}
				
				body{
					background-image:none !important;
					background:url(<?php echo esc_attr( wp_filter_kses( get_option('rf_background_link') ) ); ?>) fixed no-repeat !important;
					background-size:100% 100% !important;
					-webkit-background-size:100% 100% !important;
					-moz-background-size:100% 100% !important;
					-ms-background-size:100% 100% !important;
					-o-background-size:100% 100% !important;
				}
			</style>
		<?php endif; ?>
    
	<?php
}
add_action( 'wp_head', 'responsive_full_background_css', 999 );


?>