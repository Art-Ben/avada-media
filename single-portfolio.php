<?php get_header('inner'); the_post(); ?>
<?php
    $pf_cats_posts = wp_get_post_terms(get_the_ID(), 'portfolio_category');
    foreach ($pf_cats_posts as $pf_cats_post) {
        $catName = $pf_cats_post->name;
    }

?>
<main>
    <!-- <style>
        section.projectAbout.section{
            height: auto !important;
        }
        .imgDivider{
            display: flex;
            justify-content: center;
        }
    </style> -->
    <?php
        $mobile = my_wp_is_mobile();
        $banner = "";
        if($mobile) $banner = get_field('page_top_banner_mobile');
        else $banner = get_field('page_top_banner');
        if(empty($banner)) $banner = get_field('page_top_banner');
    ?>
    <section class="projectHome section bgDark bgFixed" style-img="<?=webPMagic($banner)?>">
        <?php if (get_field('video')) : ?>
            <video class="bgVideo noAutoPlay" poster="<?=webPMagic($banner)?>">
                <source src="<?php the_field('video'); ?>" type="video/mp4">
            </video>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="innerBlock">
                        <ul class="termsLists">
                            <?php
                                $tArgs = array(
                                    'exclude' => 7
                                );
                                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category', $tArgs);
                                foreach ($terms as $term) {
                                    echo '<li><span class="termItem">' . $term->name . '<span class="termItemInner">,</span></span></li>';
                                }
                            ?>
                        </ul>
                        <h1><?php the_title(); ?></h1>
                        <?php if (get_field('video')) : ?>
                            <div class="playBtn videoPlay">
                                <svg class="svgIcon iconPlay">
                                    <use xlink:href="#iconPlay"></use>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="projectAbout section">
        <div class="container">
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
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-6 offset-xl-1">
                    <div class="featureList">
                        <ul>
                            <?php if (get_field('location')) : ?>
                                <li><?php string_translate('Location', 'Локация'); ?>:
                                    <svg class="svgIcon iconLocation">
                                        <use xlink:href="#iconLocation"></use>
                                    </svg>
                                    <ul>
                                        <li><?php the_field('location'); ?></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (get_field('team')) : ?>
                                <li><?php string_translate('Team', 'Команда'); ?>:
                                    <svg class="svgIcon iconTeam">
                                        <use xlink:href="#iconTeam"></use>
                                    </svg>
                                    <ul>
                                        <li><?php the_field('team'); ?></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (have_rows('solutions')) : ?>
                                <li><?php string_translate('Solution', 'Решение'); ?>:
                                    <svg class="svgIcon iconDecision">
                                        <use xlink:href="#iconDecision"></use>
                                    </svg>
                                    <ul>
                                        <?php while(have_rows('solutions')) : the_row(); ?>
                                            <li><?php the_sub_field('solution'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <ul>
                            <?php if (have_rows('type')) : ?>
                                <li><?php string_translate('Sector', 'Отрасль'); ?>:
                                    <svg class="svgIcon iconIndustry">
                                        <use xlink:href="#iconIndustry"></use>
                                    </svg>
                                    <ul>
                                        <?php while(have_rows('type')) : the_row(); ?>
                                            <li><?php the_sub_field('type'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (have_rows('instruments')) : ?>
                                <li><?php string_translate('Technologies', 'Технологии'); ?>:
                                    <svg class="svgIcon iconTechnology">
                                        <use xlink:href="#iconTechnology"></use>
                                    </svg>
                                    <ul>
                                        <?php while(have_rows('instruments')) : the_row(); ?>
                                            <li><?php the_sub_field('instrument'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php if (get_field('project_links')) : $links = get_field('project_links');?>
                    <div class="col-12 col-lg-4 col-xl-5">
                        <div class="projectLink">
                            <ul>
                                <?php if(!empty($links['google_play'])): ?>
                                    <li>
                                        <a href="<?=$links['google_play']?>" target="_blank" rel="nofollow">
                                            <div class="title"><span>Available in</span>Google play</div>
                                            <div class="icon">
                                                <svg class="svgIcon iconPlayMarket">
                                                    <use xlink:href="#iconPlayMarket"></use>
                                                </svg>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($links['apple_store'])): ?>
                                <li>
                                    <a href="<?=$links['apple_store']?>" target="_blank" rel="nofollow">
                                        <div class="title"><span>Available in</span>App store</div>
                                        <div class="icon">
                                            <svg class="svgIcon iconAppStore">
                                                <use xlink:href="#iconAppStore"></use>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if(!empty($links['site'])): ?>
                                    <li>
                                        <a href="<?=$links['site']?>" target="_blank" rel="nofollow">
                                            <div class="title"><?=get_string_translate('Website', 'Сайт проекта')?></div>
                                            <div class="icon">
                                                <svg class="svgIcon iconLink">
                                                    <use xlink:href="#iconLink"></use>
                                                </svg>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (get_field('content')) : ?>
                <div class="row">
                    <div class="col-12 col-xl-5 offset-xl-7 projectIntro">
                        <?php the_field('content'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if (get_field('divider_1')) { ?>
            <div class="imgDivider">
                <?php 
                    $divider_1 = get_field('divider_1');

                    if ( $divider_1['type'] == 'image' ) {
                        $img =get_field('divider_1'); 
                        if ($img) { 
                            if(my_wp_is_mobile()) {
                                $img = $img['sizes']['medium_large']; 
                            } else { 
                                $img = $img['sizes']['large'];
                            }
                ?>
                        <picture>
                            <source data-src="<?=webPMagic($img)?>" type="image/webp">
                            <img data-src="<?=$img?>" alt="<?php the_title(); ?>">
                        </picture>
                <?php 
                        }
                    } elseif( $divider_1['type'] == 'video' ) {
                ?>
                    <video src="<?php echo $divider_1['url']; ?>" loop autoplay muted playsinline></video>
                <?php       
                    } else {
                        echo '';
                    }
                ?>
            </div>
            <?php } ?>

        <?php //$img =get_field('divider_1'); if ($img) : if(my_wp_is_mobile()) $img = $img['sizes']['medium_large']; else $img = $img['sizes']['large'];  ?>
            <!-- <div class="imgDivider">
                <picture>
                    <source data-src="<?php //echo webPMagic($img); ?>" type="image/webp">
                    <img data-src="<?php //echo $img; ?>" alt="<?php //the_title(); ?>">
                </picture>
            </div> -->
        <?php //endif; ?>


        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle">
                        <span class="sectionTitle"><?php the_title(); ?></span>
                        <p class="sectionSubTitle"><?php the_field('subtitle_2'); ?>
                            <span class="shadowText"><?php the_title(); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <div class="projectDesc">
                        <?php the_field('content_2'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (get_field('divider_2')) { ?>
            <div class="imgDivider">
                <?php 
                    $divider_2 = get_field('divider_2');

                    if ( $divider_2['type'] == 'image' ) {
                        $img =get_field('divider_2'); 
                        if ($img) { 
                            if(my_wp_is_mobile()) {
                                $img = $img['sizes']['medium_large']; 
                            } else { 
                                $img = $img['sizes']['large'];
                            }
                ?>

                        <picture>
                            <source data-src="<?=webPMagic($img)?>" type="image/webp">
                            <img data-src="<?=$img?>" alt="<?php the_title(); ?>">
                        </picture>
                <?php 
                        }
                    } elseif( $divider_2['type'] == 'video' ) {
                ?>
                    <video src="<?php echo $divider_2['url']; ?>" loop autoplay muted playsinline></video>
                <?php       
                    } else {
                        echo '';
                    }
                ?>
            </div>
            <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle">
                        <span class="sectionTitle"><?php the_title(); ?></span>
                        <p class="sectionSubTitle"><?php the_field('subtitle_3'); ?>
                            <span class="shadowText"><?php the_title(); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <div class="projectDesc">
                        <?php the_field('content_3'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (get_field('divider_3')) { ?>
            <div class="imgDivider">

                <?php //$img =get_field('divider_3'); if ($img) : if(my_wp_is_mobile()) $img = $img['sizes']['medium_large']; else $img = $img['sizes']['large'];  ?>
                    <!-- <div class="imgDivider">
                        <picture>
                            <source data-src="<?php //echo webPMagic($img); ?>" type="image/webp">
                            <img data-src="<?php //echo $img; ?>" alt="<?php //the_title(); ?>">
                        </picture>
                    </div> -->
                <?php //endif; ?>

                <?php 
                    $divider_3 = get_field('divider_3');

                    if ( $divider_3['type'] == 'image' ) {
                        $img = get_field('divider_3'); 
                        if ($img) { 
                            if(my_wp_is_mobile()) {
                                $img = $img['sizes']['medium_large']; 
                            } else { 
                                $img = $img['sizes']['large'];
                            }
                ?>
                        <picture>
                            <source data-src="<?=webPMagic($img)?>" type="image/webp">
                            <img data-src="<?=$img?>" alt="<?php the_title(); ?>">
                        </picture>
                <?php 
                        }
                    } elseif( $divider_3['type'] == 'video' ) {
                ?>
                    <video src="<?php echo $divider_3['url']; ?>" loop autoplay muted playsinline></video>
                <?php       
                    } else {
                        echo '';
                    }
                ?>
            </div>
            <?php } ?>
        <div class="projectPagination">
            <?php $lnkTtl = get_string_translate('Project', 'Проект'); ?>
            <?php if (get_previous_post_link()) : ?>
                <div class="prevPagination">
                    <?php previous_post_link('%link', $lnkTtl.' <span>%title</span>'); ?>
                </div>
            <?php endif; ?>
            <?php if (get_next_post_link()) : ?>
                <div class="nextPagination">
                    <?php echo next_post_link('%link', $lnkTtl.' <span>%title</span>'); ?>
                </div>
            <?php endif; ?>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        let src = "";
        let style_loads =  document.querySelectorAll('[style-img]');
        console.log(style_loads);
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

    })
</script>
<!-- Popup CV -->
<?php get_template_part( 'partials/pt-cv-form' ); ?>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
