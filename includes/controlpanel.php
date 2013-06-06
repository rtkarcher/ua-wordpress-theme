<?php
//Original Framework http://theundersigned.net/2006/06/wordpress-how-to-theme-options/ 
//Updated and added additional options by Jeremy Clark
//http://clark-technet.com
//Updated and added additional options by Mike Pippin -9/11/2009
//http://split-visionz.net/2009/wordpress-theme-options-framework-updated/
//Updated CSS and HTML to better match existing WordPress Options panels by Matthew Muro -6/16/2010

$themename = "UA Theme";
$shortname = "ua";
$options = array (
    array(
		"name" => "Search in header",
	    "desc" => "This option controls whether or not a search box will appear in the header.",
        "id" => $shortname."_header_search",
        "type" => "radio",
        "std" => "Normal",
        "options" => array("Normal", "Search")
	),  
    array(
		"name" => "Navigation Type",
	    "desc" => "Select the type of horizontal navigation you want to use.  Please refer to the <a href='http://webguide.ua.edu'>UA Webguide documentation</a> for more information.",
        "id" => $shortname."_nav_type",
        "type" => "radio",
        "std" => "One Level",
        "options" => array("One Level", "Two Level", "None")
	),	
/*	array(
		"name" => "Content Layout",
	    "desc" => "This option will control the layout of your content.  Please note that if you choose 'No Sidebar', Widgets will not be active.",
        "id" => $shortname."_layout",
        "type" => "radio",
        "std" => "Small Sidebar on Left",
        "options" => array("Small Sidebar on Left", "Small Sidebar on Right", "No Sidebar", "Large Sidebar on Left", "Large Sidebar on Right", "Two Small Sidebars")
	),
*/
);

function mytheme_add_options() {
global $themename, $shortname, $options;
foreach ($options as $value) {
	$key = $value['id'];
	$val = $value['std'];
		if( $existing = get_option($key)){ 	//This is useful if you've used a previous version that added seperate values to wp_options
			$new_options[$key] = $existing; //This will add the value to the array
			delete_option($key); 		//This deletes the old entry and cleans up the wp_option table
		} else {
			$new_options[$key] = $val; 
			delete_option($key);
		}
}
add_option($shortname.'_options', $new_options );
}

function first_run_options() {				//This is for theme init
global $shortname;
$check = get_option($shortname.'_activation_check');
	if ( $check != "set" ) {
		mytheme_add_options();			//This runs the theme init fuction specified eariler
   		add_option($shortname.'_activation_check', "set");	// Add marker so it doesn't run in future
  	}
}
add_action('wp_head', 'first_run_options');
add_action('admin_head', 'first_run_options');

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	$settings = get_option($shortname.'_options');
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
			if(($value['type'] === "checkbox" or $value['type'] === "multiselect" ) and is_array($_REQUEST[ $value['id'] ]))
				{ $_REQUEST[ $value['id'] ]=implode(',',$_REQUEST[ $value['id'] ]); //This will take from the array and make one string
				}
			$key = $value['id']; 
			$val = $_REQUEST[$key];
			$settings[$key] = $val;
		}
update_option($shortname.'_options', $settings);                   
header("Location: themes.php?page=controlpanel.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
			$key = $value['id'];
			$std = $value['std'];
			$new_options[$key] = $std;
		}
update_option($shortname.'_options', $new_options );
            header("Location: themes.php?page=controlpanel.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "UA Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';   
?>

<div class="wrap">
<div class="icon32" id="icon-options-general"><br></div>
<h2><?php echo $themename; ?> settings</h2>

<form method="post">
<table class="form-table">
<tbody>
<?php 
$settings = get_option($shortname.'_options');
foreach ($options as $value) { 
	$id = $value['id'];
	$std = $value['std'];
	if ($value['type'] == "text") { ?>
		<tr valign="top">
            <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
            <td>
                <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( $settings[$id] != "") { echo $settings[$id]; } else { echo $value['std']; } ?>" />
                <span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span>
            </td>
		</tr>
        
<?php } elseif ($value['type'] == "select") { ?>
    <tr valign="top"> 
        <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
		<td>
        	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( $settings[$id] == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select><br />
            
			<span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span>
        </td>
	</tr>

<?php } elseif ($value['type'] == "multiselect") { ?>
    <tr valign="top"> 
        <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
        	<select  multiple="multiple" size="3" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>" style="height:100px; width:20%;">
                <?php $ch_values=explode(',',$settings[$id] ); foreach ($value['options'] as $option) { ?>
                <option<?php if ( in_array($option,$ch_values)) { echo ' selected="selected"'; }?> value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php } ?>
            </select><br />
            
            <span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span>
       </td>
    </tr>

<?php } elseif ($value['type'] == "radio") { ?>
    <tr valign="top"> 
        <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <fieldset>
            <?php foreach ($value['options'] as $option) { ?>
            <p><label title="<?php echo $option; ?>"><input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( $settings[$id] == $option) { echo 'checked'; } ?>/> <?php echo $option; ?></label></p>
            <?php } ?>
            </fieldset>
			<span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span>
        </td>
   </tr>
       
<?php } elseif ($value['type'] == "textarea") { ?>
    <tr valign="top"> 
        <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="40" rows="5"/><?php if ( $settings[$id] != "") { echo $settings[$id]; } else { echo $value['std']; } ?></textarea><br />
            <span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span>
        </td>
    </tr>
<?php } elseif ($value['type'] == "checkbox") { ?>
    <tr valign="top"> 
        <th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
        	<fieldset>
				<?php 
                $ch_values=explode(',',$settings[$id]);
                foreach ($value['options'] as $option) {
				?>
                <label for="<?php echo $value['id']; ?>"><input name="<?php echo $value['id']; ?>[]" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( in_array($option,$ch_values)) { echo 'checked'; } ?>/> <?php echo $option; ?></label><br />
                <?php } ?>
              	<span class="description"><?php if(isset($value['desc'])){ echo $value['desc']; }?></span> 
			</fieldset>
        </td>
	</tr>
        
<?php } 
}//End of foreach loop
?>
</tbody>
</table>
<p class="submit">
<input class="button-primary" name="save" type="submit" value="Save Changes" />    
<input type="hidden" name="action" value="save" />
</form>
</p>
<h3>Revert to Default Settings</h3>
<p>This option will reset all changes you have made to your site's navigation and content layout settings.
<br />Default configuration settings include normal header (no search field) and one-level header navigation.</p>
<form method="post">
<input class="button-secondary" name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</form>
<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<h4>Theme Option page for <?php echo $themename; ?>&nbsp; | &nbsp; Framework by <a href="http://clark-technet.com/" title="Jeremy Clark">Jeremy Clark</a></h4>
<?php
} 	//End Tag for mytheme_admin()
add_action('admin_menu', 'mytheme_add_admin'); 
?>