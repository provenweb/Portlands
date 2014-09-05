<?php

$themename="Navigation Bar";

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );

//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

function getHexLower() {

	$barcolour=get_background_color();
	$redhex=substr($barcolour,0,2);
	$greenhex=substr($barcolour,2,2);
	$bluehex=substr($barcolour,4,2);

	$reddec=hexdec($redhex);
	$greendec=hexdec($greenhex);
	$bluedec=hexdec($bluehex);

	$redlowerdec = $reddec-40;
	$greenlowerdec = $greendec-40;
	$bluelowerdec = $bluedec-40;

	if ($redlowerdec<0) { $redlowerdec = 0 ; }
	if ($greenlowerdec<0) { $greenlowerdec = 0 ; }
	if ($bluelowerdec<0) { $bluelowerdec = 0 ; }

	// echo "\n\nLOWER--------".$redlowerdec."--".$greenlowerdec."--".$bluelowerdec."--------" ;


	$redlower = dechex($redlowerdec);
	$greenlower = dechex($greenlowerdec);
	$bluelower = dechex($bluelowerdec);

	if (strlen("".$redlower)<2) { $redlower = "0".$redlower ; }
	if (strlen("".$greenlower)<2) { $greenlower = "0".$greenlower ; }
	if (strlen("".$bluelower)<2) { $bluelower = "0".$bluelower ; }

	// echo "\n\nLOWER--------".$redlower."--".$greenlower."--".$bluelower."--------" ;


	$hexlower = "#".$redlower.$greenlower.$bluelower;
	return $hexlower;
}

function getHexUpper() {

	$barcolour=get_background_color();
	$redhex=substr($barcolour,0,2);
	$greenhex=substr($barcolour,2,2);
	$bluehex=substr($barcolour,4,2);

	$reddec=hexdec($redhex);
	$greendec=hexdec($greenhex);
	$bluedec=hexdec($bluehex);

	$redupperdec = $reddec+40;
	$greenupperdec = $greendec+40;
	$blueupperdec = $bluedec+40;

	if ($redupperdec>255) { $redupperdec = 255 ; }
	if ($greenupperdec>255) { $greenupperdec = 255 ; }
	if ($blueupperdec>255) { $blueupperdec = 255 ; }

	// echo "\n\nUPPER--------".$redupperdec."--".$greenupperdec."--".$blueupperdec."--------" ;


 	$redupper = dechex($redupperdec);
	$greenupper = dechex($greenupperdec);
	$blueupper = dechex($blueupperdec);

	// echo "\n\nUPPER--------".$redupper."--".$greenupper."--".$blueupper."--------" ;

	if (strlen("".$redupper)<2) { $redupper = "0".$redupper ; }
	if (strlen("".$greenupper)<2) { $greenupper = "0".$greenupper ; }
	if (strlen("".$blueupper)<2) { $blueupper = "0".$blueupper ; }

	$hexupper = "#".$redupper.$greenupper.$blueupper;
	return $hexupper;
}

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);

//Code for custom background support
add_custom_background();

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

//Enable multisite feature (WordPress 3.0)
define('WP_ALLOW_MULTISITE', true);





$options = array (

array( "name" => $themename." Options",
	"type" => "title"),


array( "name" => "Tab 1",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Title",
	"desc" => "Enter the text to display as the name for the first tab",
	"id" => $shortname."_title_1",
	"type" => "text",
	"std" => ""),

array( "name" => "Icon",
	"desc" => "Select the icon for the first tab",
	"id" => $shortname."_icon_1",
	"type" => "select",
	"options" => array("Choose an icon...","Newspaper", "Info", "Telephone", "Learning", "Photos", "Email", "Food", "Drink", "Money"),
	"std" => ""),


array( "name" => "Category",
	"desc" => "Select the category of the items for this screen",
	"id" => $shortname."_category_1",
	"type" => "categories",
	"options" => array(),
	"std" => ""),

array( "name" => "Or App Screen",
	"desc" => "Alternatively choose a specific app screen to show when the icon is pressed",
	"id" => $shortname."_app_page_1",
	"type" => "pages",
	"options" => array(),
	"std" => ""),

array( "type" => "close"),

array( "name" => "Tab 2",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Title",
	"desc" => "Enter the text to display as the name for the second tab",
	"id" => $shortname."_title_2",
	"type" => "text",
	"std" => ""),

array( "name" => "Icon",
	"desc" => "Select the icon for the second tab",
	"id" => $shortname."_icon_2",
	"type" => "select",
	"options" => array("Choose an icon...","Newspaper", "Info", "Telephone", "Learning", "Photos", "Email", "Food", "Drink", "Money"),
	"std" => ""),


array( "name" => "Category",
	"desc" => "Select the category of the items for this screen",
	"id" => $shortname."_category_2",
	"type" => "categories",
	"options" => array(),
	"std" => ""),

array( "name" => "Or App Screen",
	"desc" => "Alternatively choose a specific app screen to show when the icon is pressed",
	"id" => $shortname."_app_page_2",
	"type" => "pages",
	"options" => array(),
	"std" => ""),

array( "type" => "close"),


array( "name" => "Tab 3",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Title",
	"desc" => "Enter the text to display as the name for the third tab",
	"id" => $shortname."_title_3",
	"type" => "text",
	"std" => ""),

array( "name" => "Icon",
	"desc" => "Select the icon for the third tab",
	"id" => $shortname."_icon_3",
	"type" => "select",
	"options" => array("Choose an icon...","Newspaper", "Info", "Telephone", "Learning", "Photos", "Email", "Food", "Drink", "Money"),
	"std" => ""),


array( "name" => "Category",
	"desc" => "Select the category of the items for this screen",
	"id" => $shortname."_category_3",
	"type" => "categories",
	"options" => array(),
	"std" => ""),

array( "name" => "Or App Screen",
	"desc" => "Alternatively choose a specific app screen to show when the icon is pressed",
	"id" => $shortname."_app_page_3",
	"type" => "pages",
	"options" => array(),
	"std" => ""),

array( "type" => "close"),


array( "name" => "Tab 4",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Title",
	"desc" => "Enter the text to display as the name for the fourth tab",
	"id" => $shortname."_title_4",
	"type" => "text",
	"std" => ""),

array( "name" => "Icon",
	"desc" => "Select the icon for the fourth tab",
	"id" => $shortname."_icon_4",
	"type" => "select",
	"options" => array("Choose an icon...","Newspaper", "Info", "Telephone", "Learning", "Photos", "Email", "Food", "Drink", "Money"),
	"std" => ""),


array( "name" => "Category",
	"desc" => "Select the category of the items for this screen",
	"id" => $shortname."_category_4",
	"type" => "categories",
	"options" => array(),
	"std" => ""),

array( "name" => "Or App Screen",
	"desc" => "Alternatively choose a specific app screen to show when the icon is pressed",
	"id" => $shortname."_app_page_4",
	"type" => "pages",
	"options" => array(),
	"std" => ""),

array( "type" => "close")


);

function mytheme_add_admin() {

	global $themename, $shortname, $options;


	if ( $_GET['page'] == basename(__FILE__) ) {

		if ( 'save' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] );

		}

		foreach ($options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			header("Location: admin.php?page=functions.php&saved=true");
			die;

		}
	else if( 'reset' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
			delete_option( $value['id'] );
		}

		header("Location: admin.php?page=functions.php&reset=true");
		die;

		}
	}

	add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
	wp_enqueue_style("hide_elements", $file_dir."/hide.css", false, "1.0", "all");
	wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}

function mytheme_admin() {

	global $themename, $shortname, $options;
	$i=0;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

	?>
	<div class="wrap rm_wrap">
	<h2><?php echo $themename; ?> Settings</h2>

	<div class="rm_opts">
	<form method="post">

		<?php foreach ($options as $value) {

		switch ( $value['type'] ) {

		case "open":
		?>

		<?php break;

		case "close":
		?>

		</div>
		</div>
		<br />


		<?php break;

		case "title":
		?>
		<p>To customise the <?php echo $themename;?>, set your preferences for each of the four icons below.</p>


		<?php break;

		case 'text':
		?>

		<div class="rm_input rm_text">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
		 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

		 </div>
		<?php
		break;

		case 'textarea':
		?>

		<div class="rm_input rm_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
		 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

		 </div>

		<?php
		break;

		case 'select':
		?>

		<div class="rm_input rm_select">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>

			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
		break;

		case 'categories':
		?>

		<div class="rm_input rm_select">

			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

			<?php

				$catselect = '<select name="'.$value['id'].'" id="'.$value['id'].'"><option>Choose a Category...</option>';
				$args=array(
				  'public'   => true,
				  '_builtin' => false
				);
				$output = 'names'; // names or objects, note names is the default
				$operator = 'and'; // 'and' or 'or'
				$post_types=get_post_types($args,$output,$operator);
				foreach ($post_types  as $post_type ) {

					$count=0;
					$posttype=get_post_type_object($post_type);
					$optgroup = '<optgroup class="'.$post_type.'" label="'. $posttype->labels->name . '">';
					$taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );

					foreach ($taxonomies  as $taxonomy ) {

						 $terms = get_terms($taxonomy);
						 $count = count($terms);
						 if ( $count > 0 ) {
							 foreach ( $terms as $term ) {

								$option = $post_type.'|' . $term->taxonomy.'|' . $term->slug;
								$optgroup .= '<option class="'.$post_type.'" ';
								if (get_settings( $value['id'] ) == $option) { $optgroup .= ' selected="selected" '; }
								$optgroup .= ' value="'.$option.'">' . $term->name . '</option>' ;
							 }
						 }
					}
					$optgroup .= "</optgroup>";
					if ( $count > 0 ) { $catselect .= $optgroup; }

				}
				$catselect .= "</select>";

				echo $catselect;
			?>
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
		break;

		case 'pages':
		?>

		<div class="rm_input rm_select">

			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

			<?php

				$pageselect = '<select name="'.$value['id'].'" id="'.$value['id'].'"><option>Choose an App Screen...</option>';


				$args = array('post_type' => 'app_page', 'post_status' => 'publish' );
				$pagearray = get_posts( $args );

				 foreach ( $pagearray as $thepage ) {

					$pageselect .= '<option ';
					if (get_settings( $value['id'] ) == $thepage->post_name) { $pageselect .= ' selected="selected" '; }
					$pageselect .= ' value="'.$thepage->post_name.'">' . $thepage->post_title . '</option>' ;
				 }


				$pageselect .= "</select>";

				echo $pageselect;
			?>
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
		break;

		case "checkbox":
		?>

		<div class="rm_input rm_checkbox">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 </div>
		<?php break;
		case "section":

		$i++;

		?>

		<div class="rm_section">
		<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
		</span><div class="clearfix"></div></div>
		<div class="rm_options">


		<?php break;

	}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<!--form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form-->
 </div>

<?php

}

?>
<?php

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

?>