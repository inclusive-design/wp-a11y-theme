<?php
/*
Add a configuration page for the a11y theme.
*/
add_action ('admin_menu', 'a11y_theme_menu');
function a11y_theme_menu() {
    add_options_page ('a11y Theme Options', 'a11y Theme Options', 'edit_themes', 'a11y-theme', 'a11y_theme_options_page' );
}
add_action ('admin_init', 'a11y_theme_menu_init');

/*
Specify what fields appear in the theme admin page.
*/
function a11y_theme_menu_init() {
    register_setting ('a11y-theme-settings-group', 'a11y-theme-settings', 'a11y_theme_settings_validate');

    // Section for front page tagline. Can be HTML.
    add_settings_section ('a11y-site-text', 'Front Page Tagline and Footer', 'site_text_section_callback', 'a11y-theme');
    add_settings_field ('site-tagline', 'Front Page Tagline', function() {site_text_field_callback('tagline');}, 'a11y-theme', 'a11y-site-text');
    add_settings_field ('site-footer', 'Footer Text', function() {site_text_field_callback('footer');}, 'a11y-theme', 'a11y-site-text');

    // Section for footer content. Can be HTML.

    // Section for entering Panel IDs
    add_settings_section ('a11y-panel-content', 'Front Panel Content', 'panel_content_section_callback', 'a11y-theme');
    add_settings_field ('panel-1-id', 'Panel 1 Content ID', function() {panel_id_field_callback('1');}, 'a11y-theme', 'a11y-panel-content');
    add_settings_field ('panel-2-id', 'Panel 2 Content ID', function() {panel_id_field_callback('2');}, 'a11y-theme', 'a11y-panel-content');
    add_settings_field ('panel-3-id', 'Panel 3 Content ID', function() {panel_id_field_callback('3');}, 'a11y-theme', 'a11y-panel-content');

    // Section for entering Panel Links
    add_settings_section ('a11y-panel-link', 'Front Panel Links', 'panel_id_section_callback', 'a11y-theme');
    add_settings_field ('panel-1-link', 'Panel 1 URL', function() {panel_link_field_callback('1');}, 'a11y-theme', 'a11y-panel-link');
    add_settings_field ('panel-2-link', 'Panel 2 URL', function() {panel_link_field_callback('2');}, 'a11y-theme', 'a11y-panel-link');
    add_settings_field ('panel-3-link', 'Panel 3 URL', function() {panel_link_field_callback('3');}, 'a11y-theme', 'a11y-panel-link');
}

/*
The form and actions to perform.
*/
function a11y_theme_options_page () {
    ?>
    <section class="a11y-admin">
        <h1>a11y Theme Options</h1>

        <!-- <h2>Front Page Descriptive Text</h2>
        <p>To change this text, go to Dashboard > "Settings" > "General".</p>
        <blockquote> -->
        <?php
        //echo get_bloginfo ('description');
        ?>
        <!-- </blockquote> -->

        <form action="options.php" method="POST">
            <?php
            settings_fields('a11y-theme-settings-group');
            do_settings_sections('a11y-theme');
            submit_button();
            ?>
        </form>
    </section>
    <?php
}

function site_text_section_callback() {
    ?>
    The tagline text that appears on the front page, and the text that appears in the footer of each page. HTML allowed.
    <?php
}

/*
Instructions for the panel content section.
*/
function panel_content_section_callback() {
    ?>
    The post IDs for the contents of the three front page panels.
    <?php
}

/*
Instructions for the panel links section.
*/
function panel_id_section_callback() {
    ?>
    The URL to link to for the panel's title and image. Link must start with:
    <?php
    echo get_bloginfo ('url');
}

function site_text_field_callback($text_field) {
    $settings = (array) get_option ('a11y-theme-settings');
    $field = "site_text_".$text_field;
    $value = $settings[$field];

    // echo $value;
    //
    // wp_editor($value, $field);

    echo "<textarea name='a11y-theme-settings[$field]' rows='5' cols='40' />".$value."</textarea>";
}

/*
The input for the panel content ids.
*/
function panel_id_field_callback($panel_number) {
    $settings = (array) get_option ('a11y-theme-settings');
    $field = "panel_".$panel_number."_id";
    $value = esc_attr($settings[$field]);

    echo "<input type='text' name='a11y-theme-settings[$field]' value='$value' size='5' />";
}

/*
The input for the panel links.
*/
function panel_link_field_callback($panel_number) {
    $settings = (array) get_option ('a11y-theme-settings');
    $field = "panel_".$panel_number."_link";
    $value = esc_attr($settings[$field]);

    echo "<input type='text' name='a11y-theme-settings[$field]' value='$value' size='45'/>";
}


function a11y_theme_settings_validate ($input) {
    $output = null;
    //$settings = (array) get_option ('a11y-theme-settings');

    // Sanitize the Tagline and Footer text areas for allowed HTML.
    $output['site_text_tagline'] = wp_kses_post($input['site_text_tagline']);
    $output['site_text_footer'] = wp_kses_post($input['site_text_footer']);

//
// if(isset($_POST['settings_wpeditor']) && isset($_POST['nonce_field']) && wp_verify_nonce($_POST['nonce_field'], 'nonce_action') ){
//     update_option('my_content', wp_kses_post($_POST['settings_wpeditor']));
//     }
// }
    // check_admin_referer( 'site_text_tagline' );
    // check_admin_referer( 'site_text_footer' );

    //
    // if (isset($input['site_text_tagline'])){
        // $output['site_text_tagline'] = wp_kses_post($input['site_text_tagline']);
        //$output['site_text_tagline'] = $input['site_text_tagline'];
    // }

    // Validate the other fields.
    for ($panel_number = 1; $panel_number <= 3; $panel_number++) {
        if (a11y_theme_validate_panel_id ($input, $panel_number) == true) {
            $output['panel_'.$panel_number.'_id'] = $input['panel_'.$panel_number.'_id'];
        }

        if (a11y_theme_validate_panel_link ($input, $panel_number) == true ) {
            $output['panel_'.$panel_number.'_link'] = $input['panel_'.$panel_number.'_link'];
        }
    }

    return ($output);
}

function a11y_theme_validate_panel_id ($input, $panel_number) {
    $bool = null;
    $the_id = $input['panel_'.$panel_number.'_id'];
    if (is_numeric ($the_id)) {
        if (get_post_status($the_id) == false) {
            add_settings_error ('a11y-theme-settings', 'invalid-panel-'.$panel_number.'-id', 'Panel '.$panel_number.' does not match a valid post.');
            $bool = false;
        } else {
            $bool = true;
        }
    }
    else {
        add_settings_error ('a11y-theme-settings', 'invalid-number', 'Panel '.$panel_number.' should be a number.');
        $bool = false;
    }
    return $bool;
}

function a11y_theme_validate_panel_link ($input, $panel_number) {
    $bool = null;
    $blog_url = get_bloginfo ('url');
    $the_url = esc_url ($input['panel_'.$panel_number.'_link']);

    if (strlen($the_url) > 0) {
        $length = strlen($blog_url);
        if (substr($the_url, 0, $length) === $blog_url) {
            $bool = true;
        } else {
            add_settings_error ('a11y-theme-settings', 'invalid-panel-'.$panel_number.'-link', 'Panel '.$panel_number.' link does not belong to this website. It should start with "'.$blog_url.'".');
            $bool = false;
        }
    } else {
        add_settings_error ('a11y-theme-settings', 'invalid-panel-'.$panel_number.'-link', 'Panel '.$panel_number.' link is not a valid URL.');
        $bool = false;
    }
    return $bool;
}
?>
