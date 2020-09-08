<?php
// Template name: Services
get_header('inner');
the_post();

$primary_bg = get_field('main_banner_bg');
?>

<main>
    <?php
        $primary_bg = get_field('main_banner_bg');
        if( $primary_bg && $primary_bg['type'] == 'image' ) {
    ?>
    <section class="serviceHome cst-mobile-image section bgDark bgFixed" style="background-image: url('<?php echo $primary_bg['url']; ?>');">
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

    <?php
        } elseif( $primary_bg && $primary_bg['type'] == 'video' ) {
    ?>
    <section class="serviceHome cst-mobile-video section bgDark bgFixed" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
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
            <source src="<?php echo $primary_bg['url']; ?>" type="video/mp4">
        </video>
    </section>
    <?php
        } else {
    ?>
    <section class="serviceHome section bgDark bgFixed" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
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
    <?php
        }
    ?>

    <?php if (have_rows('section_loop')) : ?>
        <section class="serviceAbout section">
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
                <div class="row">
                    <?php while(have_rows('sl_content')) : the_row(); ?>
                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                            <div class="serviceText">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
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
                    <img src="<?php //the_sub_field('sl_banner'); ?>" alt="<?php //the_title(); ?>">
                </div> -->
            <?php //endif; ?>


            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    <?php if (have_rows('videos')) : ?>
        <section class="serviceVideo section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('video_section_subtitle'); ?></span>
                            <p class="sectionSubTitle"><?php the_field('video_section_title'); ?>
                                <span class="shadowText"><?php the_field('video_section_subtitle'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row videoReviews">
                    <?php while(have_rows('videos')) : the_row(); ?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="video">
                                <iframe src="<?php the_sub_field('video_yt_url'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="link">
                            <a href="#" class="mainBtn darkBtn"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    <?php endif; ?>
    <?php if (have_rows('steps')) : ?>
        <section class="serviceSteps section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('steps_subtitle'); ?></span>
                            <p class="sectionSubTitle"><?php the_field('steps_title'); ?>
                                <span class="shadowText"><?php the_field('steps_subtitle'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php while(have_rows('steps')) : the_row(); ?>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="step">
                                <span class="title"><?php the_sub_field('step_title'); ?></span>
                                <p class="text"><?php the_sub_field('step_description'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section>
    <?php endif; ?>
    <section class="servicePortfolio section bgDark bgFixed">
        <svg class="svgIcon iconScrollPrev scroll-prev d-none d-xl-inline-block">
            <use xlink:href="#iconScrollPrev"></use>
        </svg>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('We create space projects', 'Создаем космические проекты'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Fresh works', 'Свежие работы'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-5 offset-xl-6">
                    <p class="slogan"><?php string_translate('The best <b> confirmation </b> of our <b> qualifications and professionalism </b> are the <b> stories </b> of the success of our <b> clients </b> and the differences in their business before and after working with us.', 'Лучшим <b>подтверждением</b> нашей <b>квалификации и профессионализма</b> являются <b>истории</b> успеха наших <b>клиентов</b> и различия в их бизнесе до и после сотрудничества с нами.'); ?></p>
                </div>
            </div>
            <div class="row">
                <?php
                    $pfArgs = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => 6
                    );
                    $pf_query = new WP_Query($pfArgs);
                    while ($pf_query->have_posts()) : $pf_query->the_post();
                ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="portfolioItem">
                            <a href="<?php the_permalink(); ?>">
                                <!-- <div class="media">
                                    <video class="noAutoPlay" poster="<?php the_post_thumbnail_url(); ?>" loop muted>
                                        <?php if (get_field('video')) : ?>
                                            <source src="<?php the_field('video'); ?>" type="video/mp4">
                                        <?php endif; ?>
                                    </video>
                                </div> -->
                                <div class="media">
                                    <?php if (get_field('video')) : ?>
                                        <video class="noAutoPlay" poster="<?php the_post_thumbnail_url(); ?>" loop muted>
                                            <source src="<?php the_field('video'); ?>" type="video/mp4">
                                        </video>
                                    <?php else : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="poster">
                                    <?php endif; ?>
                                </div>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="title"><?php string_translate('Project ', 'Проект '); ?><b><?php the_title(); ?></b></a>
                        </div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="link">
                        <a href="<?php echo home_url('/portfolio/'); ?>" class="mainBtn"><?php string_translate('View all projects', 'Посмотреть все проекты'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt', 'black-reviews' ); ?>
    <?php if (have_rows('clients')) : ?>
        <section class="serviceIndustry section bgDark bgFixed">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle lightTitle">
                            <span class="sectionTitle"><?php the_field('clients_subtitle'); ?></span>
                            <p class="sectionSubTitle"><?php the_field('clients_title'); ?>
                                <span class="shadowText"><?php the_field('clients_subtitle'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php while (have_rows('clients')) : the_row(); ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="industryItem">
                                <div class="logo">
                                    <?php the_sub_field('client_ico_code'); ?>
                                </div>

                                <a href="<?php the_sub_field('link'); ?>">
                                    <div class="text"><?php the_sub_field('client_name'); ?></div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section>
    <?php endif; ?>
    <?php
        get_template_part( 'partials/pt-team' );
        get_template_part( 'partials/pt-inner-contacts' );
    ?>
</main>

<!-- Popup CV -->
<div class="popupCV" id="popupCV">
    <svg class="svgIcon iconClose closePopup">
        <use xlink:href="#iconClose"></use>
    </svg>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mainTitle lightTitle">
                    <span class="sectionTitle"><?php string_translate('Join us', 'Присоединяйся к нам'); ?></span>
                    <p class="sectionSubTitle"><?php string_translate('Send CV', 'Отправить резюме'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6 offset-xl-1">
                <?php echo do_shortcode( '[contact-form-7 id="385" title="Send CV"]' ); ?>
            </div>
        </div>
    </div>
</div>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
