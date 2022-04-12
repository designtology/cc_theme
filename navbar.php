

  <div id="navbar">


    <div class="navbar_left">

      <?php

      wp_nav_menu( array(
              'menu'                 => 'main-menus',
              'container'            => 'div',
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
              'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'item_spacing'         => 'preserve',
              'depth'                => 0,
              'walker'               => '',
              'theme_location'       => 'main-menus',) );

      ?>
    </div>

    <div class="navbar_right">

      <?php

      wp_nav_menu( array(
              'menu'                 => 'sub-menus',
              'container'            => 'div',
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
              'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'item_spacing'         => 'preserve',
              'depth'                => 0,
              'walker'               => '',
              'theme_location'       => 'sub-menus',) );

      ?>
    </div>

    

  </div>  