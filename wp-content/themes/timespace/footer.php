<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sh_template
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="container-full">
			<div class="split-aligner">
				<!--   LOGO   -->
				<div class="logo-wrapper">
		      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<? if (get_field('logo_icon', 'option')) { ?>
							<img src="<?= get_field('logo_icon', 'option')['url'] ?>" alt="Logo" class="logo_icon">
						<? } else {?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo_icon.svg" alt="Logo" class="logo">
						<? } ?>
					</a>
		    </div>

				<!--   NAV   -->
				<? if (get_field('address', 'option') || get_field('email_address', 'option')) { ?>
					<div class="address">
						<? if (get_field('address', 'option')) { ?>
							<?= get_field('address', 'option') ?>
						<? } ?>
						<? if(get_field('email_address', 'option')) { ?>
						  <p class="email"><?= the_field('email_address', 'option') ?></p>
						<? } ?>

					</div>
				<? } ?>

			</div>


		</div>
		<? if (get_field('address', 'option')) { ?>
			<div class="copyright">
				<div class="container-full">
					<!--   COPYRIGHT   -->
					<p>&copy; <?php echo date("Y"); ?> <?= get_field('copyright_name', 'option') ?></p>
				</div>
			</div>
		<? } ?>


	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
