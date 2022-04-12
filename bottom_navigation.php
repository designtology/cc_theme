  <div id="bottom_navbar">


    <div class="bottom_navbar_container">

            <?php wp_nav_menu( array( 'theme_location' => 'main-menus', 'walker' => new Bottom_Menu_Walker, 'items_wrap' => '%3$s', 'container' => false )); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'sub-menus', 'walker' => new Bottom_Menu_Walker, 'items_wrap' => '%3$s', 'container' => false )); ?>


    </div>

  </div>  