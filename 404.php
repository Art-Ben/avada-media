<?php get_header('inner'); ?>

<main>
	<section class="blogHome section bgDark bgFixed">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="mainTitle lightTitle">
						<span class="sectionTitle"><?php string_translate('Error 404', 'Ошибка 404'); ?></span>
						<p class="sectionSubTitle"><?php string_translate('Page not found', 'Страница не найдена'); ?>
							<span class="shadowText"><?php string_translate('Page not found', 'Страница не найдена'); ?></span>
						</p>
					</div>
				</div>
				<div class="col-md-12">
					<div class="nf_img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/rocket.svg" alt="<?php string_translate('Error 404 - Page not found', 'Ошибка 404 - Страница не найдена'); ?>">
					</div>
					<div class="nf_homelink">
						<a href="<?php echo home_url(); ?>" class="mainBtn">
							<?php string_translate('Back to homepage', 'Вернуться на главную'); ?>
							<span class="decorUnderline"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>

<?php get_footer('inner'); ?>
