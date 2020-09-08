<?php get_header('inner'); the_post(); ?>
<main>
    <section class="sampleHome section bgDark bgFixed" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
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
    <?php if (have_rows('section_loop')) : ?>
    <section class="sampleAbout section">
        <?php while (have_rows('section_loop')) : the_row();?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle">
                        <div class="wrap">
                            <span class="sectionTitle"><?php the_sub_field('sl_subtitle'); ?></span>
                            <p class="sectionSubTitle"><?php the_sub_field('sl_title'); ?>
                                <span class="shadowText"><?php the_sub_field('sl_subtitle'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (have_rows('sl_content')) : ?>
            <div class="row">
            <?php while(have_rows('sl_content')) : the_row(); ?>
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 sl_content">
                    <div class="sampleText">
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

                if ($sl_file['type'] == 'img') {
            ?>
                <img src="<?php echo $sl_file['url']; ?>" alt="<?php the_title(); ?>">
            <?php
                } elseif ( $sl_file['type'] == 'video' ) {
            ?>
                <video src="<?php echo $sl_file['url']; ?>" loop autoplay muted></video>
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
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 sl_content_2">
                    <div class="sampleText">
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
    <?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>
<?php get_footer('inner'); ?>
