<?php


add_action( 'init', 'manufacturer_post_type' );

function manufacturer_post_type() {

    $labels = array(
        'name'               => 'Brand Logos',
        'singular_name'      => 'Brand Logo',
        'add_new_item'       => 'Add New Logo',
        'edit_item'          => 'Edit Logo',
        'new_item'           => 'New Logo',
        'all_items'          => 'All Brand Logos',
        'view_item'          => 'View Brand Logos',
        'search_items'       => 'Search Logos',
        'not_found'          => 'No Logos found',
        'not_found_in_trash' => 'No Logos found in trash',
        'menu_name'          => 'Brand Logos'
    );

    $args = array(
        'labels'             => $labels,
        'capability_type'    => 'post',
        'public'             => true,
        'menu_position'      => 20,
        'show_ui'            => true,
        'publicly_queryable' => false,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'has_archive'        => false,
        'supports'           => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'can_export'         => true,
    );

    register_post_type( 'brand_logos', $args );
}

add_theme_support( 'post-thumbnails', array( 'post', 'brand_logos' ) );
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 43,
        'width'                => 190,
        'flex-height'          => false,
        'flex-width'           => false,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'init', 'portfolio_post_type' );

function portfolio_post_type() {

    $labels = array(
        'name'               => 'Portfolio Videos',
        'singular_name'      => 'Portfolio Video',
        'add_new_item'       => 'Add New Video',
        'edit_item'          => 'Edit Video',
        'new_item'           => 'New Video',
        'all_items'          => 'All Portfolio Videos',
        'view_item'          => 'View Portfolio Video',
        'search_items'       => 'Search Videos',
        'not_found'          => 'No Videos found',
        'not_found_in_trash' => 'No Videos found in trash',
        'menu_name'          => 'Portfolio Videos'
    );

    $args = array(
        'labels'             => $labels,
        'capability_type'    => 'post',
        'public'             => true,
        'menu_position'      => 20,
        'show_ui'            => true,
        'publicly_queryable' => false,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'has_archive'        => false,
        'supports'           => array(
            'title'
        ),
        'can_export'         => true,
    );

    register_post_type( 'portfolio_videos', $args );
}

add_action( 'init', 'members_post_type' );

function members_post_type() {

    $labels = array(
        'name'               => 'Crew Members',
        'singular_name'      => 'Crew Member',
        'add_new_item'       => 'Add New Member',
        'edit_item'          => 'Edit Member',
        'new_item'           => 'New Member',
        'all_items'          => 'All Crew Members',
        'view_item'          => 'View Crew Members',
        'search_items'       => 'Search Member',
        'not_found'          => 'No Members found',
        'not_found_in_trash' => 'No Members found in trash',
        'menu_name'          => 'Crew Member'
    );

    $args = array(
        'labels'             => $labels,
        'capability_type'    => 'post',
        'public'             => true,
        'menu_position'      => 20,
        'show_ui'            => true,
        'publicly_queryable' => false,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'has_archive'        => false,
        'taxonomies'         => array('category'),
        'supports'           => array(
            'title'
        ),
        'can_export'         => true,
    );

    register_post_type( 'movinapes_members', $args );
}


function register_menus() {
  $locations = array(
      'main-menus' => 'Main Menus' ,
      'footer-menus' => 'Footer Menus',
      'sub-menus' => 'Sub Menus'
  );

  register_nav_menus($locations);
}
 
add_action( 'init', 'register_menus' );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

class Services_Walker extends Walker_Nav_Menu{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
    {

        $image = get_field('background_image', $item->ID);


        $output .= sprintf(
            "<div>
                <div class='bg_image' style='background-image: url(%s);'></div>
                <div class='black_gradient'></div>
                <div class='title'>%s</div>
                <div class='description'>%s</div>
                <div>
                    <a href='%s'><btn>Go to %s</btn></a>
                </div>      
            </div>", 

            esc_html($image), $item->title, esc_html( $item->description ), $item->url, $item->title
        );
    }
}

class Bottom_Menu_Walker extends Walker_Nav_Menu{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
    {



        $output .= sprintf( 
            "<div class='nav_li'><a href='%s'>%s</a></div>", 

            $item->url, $item->title
        );
    }
}

class Footer_Menu_Walker extends Walker_Nav_Menu{
static $x = 1;
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
    {

        $output .= sprintf( 
            "<a href='%s'>%s</a>", 

            $item->url, $item->title
        );

        self::$x++;
 
        if(self::$x  % 2 == 0){
            $output .= " | ";
        }

    }
}

class Mobile_Footer_Menu_Walker extends Walker_Nav_Menu{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
    {
        $output .= sprintf( 
            "<div class='mobile_submenu'><a href='%s'>%s</a></div>", 

            $item->url, $item->title
        );
    }
}


function add_theme_menu_item()
{
    add_menu_page("Kontaktdaten", "Kontaktdaten", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page()
{
    ?>
        <div class="wrap">
        <h1>Kontaktdaten</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        </div>
    <?php
}

function display_name_element()
{
    ?>
        <input type="text" name="contact_name" id="contact_name" value="<?php echo get_option('contact_name'); ?>" />
    <?php
}

function display_title_element()
{
    ?>
        <input type="text" name="contact_title" id="contact_title" value="<?php echo get_option('contact_title'); ?>" />
    <?php
}

function display_street_element()
{
    ?>
        <input type="text" name="contact_street" id="contact_street" value="<?php echo get_option('contact_street'); ?>" />
    <?php
}

function display_additional_element()
{
    ?>
        <input type="text" name="contact_additional" id="contact_additional" value="<?php echo get_option('contact_additional'); ?>" />
    <?php
}

function display_city_element()
{
    ?>
        <input type="text" name="contact_city" id="contact_city" value="<?php echo get_option('contact_city'); ?>" />
    <?php
}

function display_phone_element()
{
    ?>
        <input type="text" name="contact_phone" id="contact_phone" value="<?php echo get_option('contact_phone'); ?>" />
    <?php
}

function display_email_element()
{
    ?>
        <input type="text" name="contact_email" id="contact_email" value="<?php echo get_option('contact_email'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
    add_settings_section("section", "Settings", null, "theme-options");
    
    add_settings_field("contact_name", "Name Surname", "display_name_element", "theme-options", "section");
    add_settings_field("contact_title", "Title", "display_title_element", "theme-options", "section");
    add_settings_field("contact_street", "Street and Nr.", "display_street_element", "theme-options", "section");
    add_settings_field("contact_additional", "Additional Address", "display_additional_element", "theme-options", "section");
    add_settings_field("contact_city", "Zip and City", "display_city_element", "theme-options", "section");
    add_settings_field("contact_phone", "Phone Number", "display_phone_element", "theme-options", "section");
    add_settings_field("contact_email", "Email", "display_email_element", "theme-options", "section");

    register_setting("section", "contact_name");
    register_setting("section", "contact_title");
    register_setting("section", "contact_street");
    register_setting("section", "contact_additional");
    register_setting("section", "contact_city");
    register_setting("section", "contact_phone");
    register_setting("section", "contact_email");
}

add_action("admin_init", "display_theme_panel_fields");


?>
