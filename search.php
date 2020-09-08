<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Avada_Media
 */

get_header('inner');
?>

<!-- <main>
	<section class="blogHome section bgDark bgFixed">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="mainTitle lightTitle">
						<span class="sectionTitle"><?php string_translate('You have used our site search', 'Вы воспользовались нашим поиском по сайту'); ?></span>
						<p class="sectionSubTitle"><?php string_translate('Search results for: ', 'Результаты поиска для: '); echo get_search_query(); ?>
							<span class="shadowText"><?php string_translate('Search results for: ', 'Результаты поиска для: '); echo get_search_query(); ?></span>
						</p>
					</div>
				</div>
			</div>
			<section class="search_query">
				<div class="row">
					<?php
						$args = array(
							's' => get_search_query()
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
						$the_query->the_post();
					?>
						<div class="col-md-3">
							<div class="sq_item">
								<a href="<?php the_permalink(); ?>">
									<?php
										if (has_post_thumbnail()) {
											echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" />';
										} else {
											echo '<img src="'.get_template_directory_uri().'/assets/img/sqThumbnail.png" alt="'.get_the_title().'" />';
										}
									?>
								</a>
								<div class="sq_title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						</div>
					<?php }
						}else{
					?>
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<h2 class="search_query_title">
								<?php string_translate('Sorry, no results were found for your request', 'Извините, по вашему запросу ничего не найдено'); ?>
							</h2>
							<span class="search_query_description">
								<?php
									$sqHomeUrl = get_home_url();
									string_translate('Try again or back to <a href="'.$sqHomeUrl.'">Home page</a>', 'Попробуйте еще раз, или вернитесь на <a href="'.$sqHomeUrl.'">Главную страницу</a>');
								?>
							</span>
						</div>
						<div class="col-md-1"></div>
					<?php } ?>
				</div>
			</section>
		</div>
		<svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
			<use xlink:href="#iconScrollNext"></use>
		</svg>
	</section>
	<?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main> -->
<?php
	$allsearch = new WP_Query("s=$s&showposts=0");
	$searchCount = $allsearch ->found_posts;
?>
<main>
    <section class="searchHome section bgDark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('Here you can find all about space ;)', 'Здесь вы можете найти все что касается космоса ;)'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Search results', 'Результаты поиска'); ?>
                            <span class="shadowText"><?php string_translate('Search results', 'Результаты поиска'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="searchBlock">
                <form action="<?php echo home_url('/'); ?>" method="get" class="search" autocomplete="off">
                    <input type="text" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php string_translate('Search', 'Поиск'); ?> ...">
                    <button type="submit">
                        <svg class="svgIcon iconSearch">
                            <use xlink:href="#iconSearch"></use>
                        </svg>
                    </button>
                </form>
				<div class="searchNavigation">
					<div class="counterResults"><span><?php echo $searchCount; ?></span> <?php string_translate('Search results', 'Результатов поиска'); ?></div>
					<ul class="paginationResults">
						<?php
							$pgArgs = array(
								'screen_reader_text' => '',
								'prev_text' => '<',
								'next_text' => '>'
							);
							the_posts_pagination($pgArgs);
						?>
					</ul>
				</div>
                <div class="searchResults">
					<?php $counter = 0; while(have_posts()) : the_post(); ?>
	                    <a href="<?php the_permalink(); ?>" class="itemResults">
	                        <?php if (has_post_thumbnail() && $counter < 2) : ?>
								<div class="itemImg">
		                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
		                        </div>
							<?php endif; ?>
	                        <div class="itemText">
	                            <span class="title"><?php the_title(); ?></span>
	                            <p><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></p>
	                        </div>
	                    </a>
					<?php $counter++; endwhile; ?>
                </div>
				<div class="searchNavigation">
					<div class="counterResults"><span><?php echo $searchCount; ?></span> <?php string_translate('Search results', 'Результатов поиска'); ?></div>
					<ul class="paginationResults">
						<?php
							$pgArgs = array(
								'screen_reader_text' => '',
								'prev_text' => '<',
								'next_text' => '>'
							);
							the_posts_pagination($pgArgs);
						?>
					</ul>
				</div>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt', 'inner-contacts' ); ?>
</main>

<?php
get_footer('inner');
