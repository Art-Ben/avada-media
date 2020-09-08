<?php
/**
 * Template Name: Страница SpaceLab
 * Template Post Type: page
 */
get_header('inner');
$image_banner = get_field('spacelab_hero-use-video')  ? '' : get_field('spacelab_hero-banner');
?>
        <section class="about section bgDark bgFixed" style-img="<?= $image_banner; ?>">
            <?php if ( get_field('spacelab_hero-use-video') ) { ?>
                <video class="bgVideo noAutoPlay" poster-img="<?= get_field('spacelab_hero-video-poster') ? get_field('spacelab_hero-video-poster') : ''; ?>">
                    <source src="<?php the_field('spacelab_hero-video_file'); ?>" type="video/mp4">
                </video>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="innerBlock spaceLab__hero">
                            <?php
                                if( get_field('spacelab_hero') ) {
                            ?>
                            <img src="<?= get_field('spacelab_hero-logo'); ?>" alt="Avada Media SpaceLab">
                            <?php
                                }
                            ?>

                            <?php
                                if( get_field('spacelab_hero-title') ) {
                            ?>
                                <h1 class="spaceLab__hero--title">
                                    <?= get_field('spacelab_hero-title'); ?>
                                </h1>
                            <?php
                                }
                            ?>

                            <?php
                                if( get_field('spacelab_hero-subtitle') ) {
                            ?>
                                <span class="spaceLab__hero--subtitle">
                                    <?= get_field('spacelab_hero-subtitle'); ?>
                                </span>
                            <?php
                                }
                            ?>

                            <svg class="svgIcon bigLogo">
                                <use xlink:href="#bigLogo"></use>
                            </svg>
                            <?php if (get_field('spacelab_hero-video')) { ?>
                                <div class="playBtn videoPlay">
                                    <svg class="svgIcon iconPlay">
                                        <use xlink:href="#iconPlay"></use>
                                    </svg>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    get_template_part( 'partials/pt', 'footer' );
?>