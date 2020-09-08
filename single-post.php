<?php get_header( 'inner' );
the_post();
$singlePostThumb = get_field('large_thumbnail');

?>
    <main>
    <?php
        if( $singlePostThumb && $singlePostThumb['type'] == 'image' ) {
    ?>
            <section class="articleHome cst-mobile-image section bgDark bgFixed" style="background-image: url('<?php echo $singlePostThumb['url']; ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
                            <div class="introText">
                                <div class="wrap">
                                    <span><?php the_field('main_banner_subtitle'); ?></span>
                                    <h1><?php the_field('main_banner_title'); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                    <use xlink:href="#iconScrollNext"></use>
                </svg>
            </section>
        <?php } elseif( $singlePostThumb && $singlePostThumb['type'] == 'video' ) { ?>
            <section class="articleHome cst-mobile-video section bgDark bgFixed" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
                            <div class="introText">
                                <div class="wrap">
                                    <span><?php the_field('main_banner_subtitle'); ?></span>
                                    <h1><?php the_field('main_banner_title'); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                    <use xlink:href="#iconScrollNext"></use>
                </svg>
                <video autoplay muted loop class="serviceHome__videoBg">
                    <source src="<?php echo $singlePostThumb['url']; ?>" type="video/mp4">
                </video>
            </section>
        <?php } ?>

         
        <?php if (have_rows('section_loop')) : ?>
                <section class="articleAbout section">
                    <?php while (have_rows('section_loop')) : the_row(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mainTitle">
                                        <span class="sectionTitle"><?php the_sub_field('sl_subtitle'); ?></span>
                                        <p class="sectionSubTitle"><?php the_sub_field('sl_title'); ?>
                                            <span class="shadowText"><?php the_sub_field('sl_subtitle'); ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php if (have_rows('sl_content')) : ?>
                                <div class="row">
                                    <?php while(have_rows('sl_content')) : the_row(); ?>
                                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                            <div class="articleText">
                                                <?php the_sub_field('content'); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (get_sub_field('sl_banner')) { ?>
                            <div class="imgDivider">
                                <?php
                                    $sl_file = get_sub_field('sl_banner');

                                    if ($sl_file['type'] == 'image') {
                                ?>
                                    <img src="<?php echo $sl_file['url']; ?>" alt="<?php the_title(); ?>">
                                <?php
                                    } elseif ( $sl_file['type'] == 'video' ) {
                                ?>
                                    <video src="<?php echo $sl_file['url']; ?>" loop autoplay muted playsinline></video>
                                <?php
                                    } else {
                                        echo '';
                                    }
                                ?>
                            </div>
                        <?php } ?>

                        <?php //if (get_sub_field('sl_banner')) : ?>
                            <!-- <div class="imgDivider">
                                <img src="<?php //the_sub_field('sl_banner'); ?>" alt="Section <?php //the_title(); ?> second background">
                            </div> -->
                        <?php //endif; ?>

                        <?php if (have_rows('sl_content_2')) : ?>
                            <div class="container">
                                <div class="row">
                                    <?php while(have_rows('sl_content_2')) : the_row(); ?>
                                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                            <div class="articleText">
                                                <?php the_sub_field('content_2'); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                        <use xlink:href="#iconScrollNext"></use>
                    </svg>
                </section>
        <?php endif; ?>
        <!-- <section class="articleAbout section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="articleInfo">
                            <span class="articleDate"><?php the_time( 'd.m.Y' ); ?></span>
                            <div class="articleRating">
                                <?php //echo rw_get_post_rating(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('subtitle'); ?></span>
                            <p class="sectionSubTitle"><?php the_title(); ?>
                                <span class="shadowText"><?php the_field('subtitle'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('section_1')) : ?>
                    <div class="row">
                        <?php while ( have_rows( 'section_1' ) ) : the_row(); ?>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                <div class="articleText">
                                    <?php the_sub_field('section_editor'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (get_field('section_background')) : ?>
                <div class="imgDivider">
                    <img src="<?php the_field('section_background'); ?>" alt="Section <?php the_title(); ?> second background">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('subtite_2'); ?></span>
                            <p class="sectionSubTitle"><?php the_field('title_2'); ?>
                                <span class="shadowText"><?php the_field('subtite_2'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('section_2')) : ?>
                    <div class="row">
                        <?php while ( have_rows( 'section_2' ) ) : the_row(); ?>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                <div class="articleText">
                                    <?php the_sub_field('section_editor'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (get_field('footer_section_background')) : ?>
                <div class="imgDivider">
                    <img src="<?php the_field('footer_section_background'); ?>" alt="Footer section <?php the_title(); ?> large background">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('subtitle_3'); ?></span>
                            <p class="sectionSubTitle"><?php the_field('title_3'); ?>
                                <span class="shadowText"><?php the_field('subtitle_3'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('section_3')) : ?>
                    <div class="row">
                        <?php while ( have_rows( 'section_3' ) ) : the_row(); ?>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                <div class="articleText">
                                    <?php the_sub_field('section_editor'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section> -->
        <?php get_template_part( 'partials/pt-inner-contacts' ); ?>
    </main>
<?php get_footer( 'inner' ); ?>
