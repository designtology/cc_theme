    <?php include('bottom_navigation.php'); ?>


    <div class="container footer">
        <div class="wrapper">

        
            <div class="address">
                <p>
                <?php echo get_option('contact_name'); ?><br>
                <?php echo get_option('contact_street'); ?><br>
                <?php if(get_option('contact_additional')){echo get_option('contact_additional') . "<br>";} ?>
                <?php echo get_option('contact_city'); ?><br>
                <?php echo get_option('contact_phone'); ?><br><br>
                <a href="mailto:<?php echo get_option('contact_email'); ?>?subject=Kontakt über Webseite"><?php echo get_option('contact_email'); ?></a>
                </p>
            </div>

            <div class="copyright_frame">
                <div><a href="https://www.linkedin.com/in/barissarial/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/linkedin.svg" class="social_icon"></a></div>
                <div><p class="copyright">&copy; <?php echo get_option('contact_name'); ?>, <?php echo date("Y"); ?></p></div>
            </div>

            <div class="footer_links">
                <div>

                  <?php

                  wp_nav_menu( array(
                          'menu'                 => 'footer-menus',
                          'container'            => false,
                          'container_class'      => '',
                          'container_id'         => '',
                          'container_aria_label' => '',
                          'menu_class'           => '',
                          'menu_id'              => '',
                          'echo'                 => true,
                          'fallback_cb'          => 'wp_page_menu',
                          'before'               => '',
                          'after'                => '',
                          'link_before'          => '',
                          'link_after'           => '',
                          'add_li_class'         => 'nav_li',
                          'items_wrap'           => '%3$s',
                          'item_spacing'         => 'preserve',
                          'depth'                => 0,
                          'walker'               => new Footer_Menu_Walker,
                          'theme_location'       => 'footer-menus',) );

                  ?>

                </div>
            </div>


        </div>
    </div>




  </div>

</div>



<div class="cookie_message">
  <p>
    Um das Anfrageformular vor Spambots zu schützen, benutze ich Google reCAPTCHA V2 auf dieser Seite. Mehr über reCAPTCHA erfährst du in meiner 
    <a href="datenschutz.php">Datenschutzvereinbarung</a>. Weitere Informationen zu Google reCAPTCHA sowie die Datenschutzerklärung von Google findest du unter folgenden Links: <a href="https://www.google.com/intl/de/policies/privacy" target="_blank">Google reCaptcha Datenschutzerklärung & Nutzungsbedingungen</a> und <a href="https://www.google.com/recaptcha/intro/android.html?type=98" target="_blank">Google reCaptcha</a>
  </p>

  <button class="btn" id="cookie_btn">
    Verstanden
  </button>
</div>

<script src="https://player.vimeo.com/api/player.js"></script>

<?php
    require_once(dirname( __FILE__ ) . '/js/main.js');
?>


</body>

</html>