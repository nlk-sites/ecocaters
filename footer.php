<?php get_sidebar('bottombar'); ?>
<div id="ftr">
    <?php
wp_nav_menu( array(
                'container' => false,
                'theme_location' => 'ftrlnx',
            ) );
	?>
	</div>
    </div><!--/main-->
    </div><!--/mrap-->
  </div><!--/page-->
<?php /*
<div id="sha"><?php if(function_exists('sharethis_button')) sharethis_button(); ?></div>
*/ ?>
<?php wp_footer(); ?>
</body>
</html>