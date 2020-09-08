<?php
// Template name: Inspiration
get_header('inner');
the_post();
?>

<main>
    <section class="inspirationHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php the_field('inspiration_title', 'option'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Timeline', 'Лента'); ?></p>
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php the_field('inspiration_title', 'option'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Timeline', 'Лента'); ?></p>
                    </div>
                </div>
            </div>
            <div class="masonry">
                <div class="masonry-sizer col-6 col-lg-4"></div>
                <?php
                    $inspArgs = array(
                        'post_type' => 'inspiration',
                        //'orderby' => 'rand',
                        'posts_per_page' => -1
                    );
                    $insp_query = new WP_Query($inspArgs);
                    while ($insp_query->have_posts()) : $insp_query->the_post();
                ?>

                    <div class="masonry-item col-6 col-lg-4 item-id-<?php the_ID(); ?>">
                        <div class="masonry-item-content masonry-item-height-<?php echo rand(300, 700); ?>" data-aos="fade-up">
                            <a href="javascript:;" data-src="#popupPost-<?php the_ID(); ?>" data-fancybox="post" class="popupTrigger">
                                <img class="inspirationThumbnail" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </a>
                            <div class="popupPost" id="popupPost-<?php the_ID(); ?>">
                                <div class="wrapper">
                                    <div class="textBlock">
                                  Ограничить ввод символов не более 200!
                                        <?php the_content(); ?>
                                        <?php get_template_part( 'partials/pt', 'inspiration-socials' ); ?>
                                    </div>
                                    <div class="mediaBlock">
                                        <?php if (get_field('inspiration_video')) : ?>
                                            <video class="postVideo" controls playsinline poster="<?php the_post_thumbnail_url(); ?>">
                                                <source src="<?php the_field('inspiration_video'); ?>" type="video/mp4">
                                            </video>
                                        <?php else : ?>
                                            <img src="<?php the_post_thumbnail_url(); ?>" class="postImg" alt="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
        </div>
    </section>

    <?php get_template_part( 'partials/pt', 'inner-contacts' ); ?>
</main>

<!-- Popup CV -->
<?php get_template_part( 'partials/pt', 'cv-form' ); ?>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
