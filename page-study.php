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
                                if( get_field('spacelab_hero-logo') ) {
                            ?>
                            <img src="<?= get_field('spacelab_hero-logo'); ?>" alt="Avada Media SpaceLab" class="spaceLab__hero--image">
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

                            <?php if (get_field('spacelab_hero-use-video')) { ?>
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

            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section>
        
        <section class="section aboutSpaceLab">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle"> 
                            <span class="sectionTitle"><?= get_field('spacelab_about_subtitle');?> </span>
                            <p class="sectionSubTitle">
                                <?= get_field('spacelab_about_title'); ?>
                                <span class="shadowText"><?= get_field('spacelab_about_title'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="aboutSpaceLab__twoColumnText">
                            <div class="aboutSpaceLab__text aboutSpaceLab__textFirst">
                                <?= get_field('spacelab_about_column1'); ?>
                            </div>
                            <div class="aboutSpaceLab__text aboutSpaceLab__textSecond">
                                <?= get_field('spacelab_about_column2'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 flex justify-content-center flex-row d-flex flex-wrap">
                        <button class="mainBtn bgBlack">
                            <?php
                                string_translate('Register', 'Зарегистрироваться')
                            ?>
                            <span class="decorUnderline"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="about section bgFixed spaceLabVideoBlock bgDark" style-img="<?=webPMagic( get_field('spacelab_videoblock_bg') )?>">
            <?php if (get_field('spacelab_videoblock_file')) { ?>
                <video class="bgVideo noAutoPlay" poster-img="<?=webPMagic( get_field('spacelab_videoblock_bg') )?>">
                    <source src="<?= get_field('spacelab_videoblock_file'); ?>" type="video/mp4">
                </video>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="innerBlock">
                            
                            <svg class="svgIcon spaceLabVideoBLockLogo1">
                                <use xlink:href="#spaceLabLogoBig"></use>
                            </svg>

                            <?php if (get_field('spacelab_videoblock_file')) { ?>
                                <div class="playBtn videoPlay">
                                    <svg class="svgIcon iconPlay">
                                        <use xlink:href="#iconPlay"></use>
                                    </svg>
                                </div>
                            <?php } ?>

                            <span class="spaceLabBottomText"><?= get_field('spacelab_videoblock_text'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section spaceLabInfoSection bgDark">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="spaceLabInfoSection__advnts">
                            <?php
                                if( have_rows('spaceLabAdvnts') ) {
                                    while( have_rows('spaceLabAdvnts') ) {
                                        the_row();
                            ?>
                            <div class="item">
                                <div class="icon">
                                    <img src="<?= get_sub_field('icon'); ?>" alt="<?= get_sub_field('txt'); ?>" alt="<?= get_sub_field('txt'); ?>">
                                </div>
                                <div class="txt">
                                    <?= get_sub_field('txt'); ?>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle"> 
                            <span class="sectionTitle"><?= get_field('spacelab_specialization_subtitle');?> </span>
                            <p class="sectionSubTitle">
                                <?= get_field('spacelab_about_title'); ?>
                                <span class="shadowText"><?= get_field('spacelab_specialization_title'); ?></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                            <div class="spaceLabInfoSection__twoColumnText">
                                <div class="spaceLabInfoSection__text spaceLabInfoSection__textFirst">
                                    <?= get_field('spacelab_specialization_column1');?>
                                </div>
                                <div class="spaceLabInfoSection__text spaceLabInfoSection__textSecond">
                                    <?= get_field('spacelab_specialization_column2');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 flex justify-content-center flex-row d-flex flex-wrap">
                            <button class="mainBtn bgBlack">
                                <?php
                                    string_translate('Register', 'Зарегистрироваться')
                                ?>
                                <span class="decorUnderline"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
            if( have_rows('spacelab_cources') ) {
                while( have_rows('spacelab_cources') ) {
                    the_row();
        ?>
        <section class="section spaceLabCources bgDark" style-img="<?= webPMagic( get_sub_field('spacelab_cource_bg') ); ?>">
            <div class="container">
                <div class="spaceLabCources__info <?= get_sub_field('position'); ?>">
                    <div class="line line_title">
                        <div class="mainTitle"> 
                            <span class="sectionTitle"><?= get_sub_field('spacelab_cource_subtitle');?> </span>
                            <p class="sectionSubTitle">
                                <?= get_sub_field('spacelab_cource_title'); ?>
                                <span class="shadowText"><?= get_sub_field('spacelab_cource_title'); ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="line line_text">
                        <div class="spaceLabCource__txt">
                            <?= get_sub_field('cource_txt');?>
                        </div>
                        <div class="line line_btn">
                            <button class="mainBtn">
                                <?php
                                    string_translate('Register', 'Зарегистрироваться')
                                ?>
                                <span class="decorUnderline"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
                }
            }
        ?>

        <section class="section bgDark spaceLabCourcesTypes">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle"> 
                            <span class="sectionTitle"><?= get_field('spacelab_courcestypes_subtitle');?> </span>
                            <p class="sectionSubTitle">
                                <?= get_field('spacelab_about_title'); ?>
                                <span class="shadowText"><?= get_field('spacelab_courcestypes_title'); ?></span>
                            </p>
                        </div>
                        <div class="specialBtnGroup">
                            <button class="mainBtn bgBlack">
                                <?php
                                    string_translate('Register', 'Зарегистрироваться')
                                ?>
                                <span class="decorUnderline"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="spaceLabCourcesTypes__twoColumnText">
                        <div class="spaceLabCourcesTypes__text spaceLabCourcesTypes__textFirst">
                            <?= get_field('spacelab_courcestypes_column1');?>
                        </div>
                        <div class="spaceLabCourcesTypes__text spaceLabCourcesTypes__textSecond">
                            <?= get_field('spacelab_courcestypes_column2');?>
                        </div>
                    </div>
                </div>

                <div class="spaceLabCourcesTypes__items">
                    <?php
                        if( have_rows('courcesTypes') ) {
                            while( have_rows('courcesTypes') ) {
                                the_row();
                    ?>
                    <div class="singleCourceItem">
                        <div class="titleGroup">
                            <?= get_sub_field('courceTypeName'); ?>
                            <span class="shadowText"><?= get_sub_field('courceTypeName'); ?></span>

                            <div class="courceImage">
                                <img src="<?= get_sub_field('cource_image'); ?>" alt="<?= get_sub_field('courceTypeName'); ?>">
                            </div>
                        </div>
                        <?php
                            if( have_rows('course_list_items') ) {
                        ?>
                        <ul class="courceList">
                            <?php
                                while( have_rows('course_list_items') ) {
                                    the_row();
                        ?>
                            <li class="item">
                                <a href="<?= get_sub_field('link'); ?>"><?= get_sub_field('cource_name'); ?></a>
                            </li>
                        <?php
                                }
                            ?>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle"> 
                            <span class="sectionTitle"><?= get_field('spacelab_workmake_subtitle');?> </span>
                            <p class="sectionSubTitle">
                                <?= get_field('spacelab_about_title'); ?>
                                <span class="shadowText"><?= get_field('spacelab_workmake_title'); ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="spaceLabCourcesTypes__twoColumnText">
                            <div class="spaceLabCourcesTypes__text spaceLabCourcesTypes__textFirst">
                                <?= get_field('spacelab_workmake_column1');?>
                            </div>
                            <div class="spaceLabCourcesTypes__text spaceLabCourcesTypes__textSecond">
                                <?= get_field('spacelab_workmake_column2');?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 flex justify-content-center flex-row d-flex flex-wrap">
                        <button class="mainBtn bgBlack">
                            <?php
                                string_translate('Register', 'Зарегистрироваться')
                            ?>
                            <span class="decorUnderline"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="about section bgFixed spaceLabVideoBlock" style-img="<?=webPMagic( get_field('spacelab_videosecondblock_bg') )?>">
            <?php if (get_field('spacelab_videosecondblock_file')) { ?>
                <video class="bgVideo noAutoPlay" poster-img="<?=webPMagic( get_field('spacelab_videosecondblock_bg') )?>">
                    <source src="<?= get_field('spacelab_videosecondblock_file'); ?>" type="video/mp4">
                </video>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="innerBlock">
                            
                            <span class="spaceLabVideoText"><?php string_translate('ABOUT', 'ABOUT'); ?></span>

                            <svg class="svgIcon spaceLabVideoLogo">
                                <use xlink:href="spaceLabVideoLogo"></use>
                            </svg>

                            <?php if (get_field('spacelab_videosecondblock_file')) { ?>
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

        <section class="section spaceLabTeam aboutTeam bgDark">
            
                <?php
                    $teamArgs = array(
                        'post_type' => 'team',
                        'posts_per_page' => 12
                    );
                    $tm_query = new WP_Query($teamArgs);
                ?>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="spaceLabInfoSection__advnts">
                            <?php
                                if( have_rows('spaceLabAdvnts') ) {
                                    while( have_rows('spaceLabAdvnts') ) {
                                        the_row();
                            ?>
                            <div class="item">
                                <div class="icon">
                                    <?= get_sub_field('icon'); ?>
                                </div>
                                <div class="txt">
                                    <?= get_sub_field('txt'); ?>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php get_field('spacelab_team_subtitle') ?></span>
                            <p class="sectionSubTitle"><?php get_field('spacelab_team_title') ?>
                                <span class="shadowText"><?php get_field('spacelab_team_title') ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="teamList">
                    <div class="row">
                        <?php while ($tm_query->have_posts()) : $tm_query->the_post(); ?>
                            <div class="col-6 col-lg-4">
                                <div class="imgTeam">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                let src = "";
                let style_loads =  document.querySelectorAll('[style-img]');

                style_loads.forEach(function(el){
                    src = el.getAttribute('style-img');
                    el.style.backgroundImage = 'url('+src+')';
                });

                let lazy_imgs = document.querySelectorAll('[data-src]');
                lazy_imgs.forEach(function(el){
                    src = el.getAttribute('data-src');
                    el.setAttribute('src', src);
                    el.setAttribute('srcset', src);
                });

                let poster_imgs = document.querySelectorAll('[poster-img]');
                poster_imgs.forEach(function(el){
                    src = el.getAttribute('poster-img');
                    el.setAttribute('poster', src);
                });

            })
        </script>
    
<?php
    get_template_part( 'partials/pt', 'footer' );
?>