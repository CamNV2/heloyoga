<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Wellco
 */ 
$back_totop_on = wellco_get_opt('back_totop_on', true);
?>
	</div><!-- #content inner -->
</div><!-- #content -->

<?php wellco_footer(); ?>
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
    <a href="#" class="scroll-top"><i class="bravisicon-long-arrow-right-three"></i></a>
<?php endif; ?>

</div><!-- #page -->
<?php wellco_search_popup(); ?>
<?php wellco_sidebar_hidden(); ?>
<?php wellco_cart_sidebar(); ?>
<?php wellco_mouse_move_animation(); ?>
<?php wp_footer(); ?>

</body>
</html>
