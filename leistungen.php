
<div class="container">
  <div class="wrapper">
		<div class="section_title">Services we offer</div>
		<div class="leistungen_quadro">

      <?php wp_nav_menu( array( 'theme_location' => 'main-menus', 'walker' => new Services_Walker,     'items_wrap' => '%3$s', 'container' => false )); ?>

		</div>
  </div>
</div>