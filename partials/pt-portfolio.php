<?php
    $pfArgs = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 6
    );
    $pfItems = new WP_Query($pfArgs);
    if ( have_posts() ) :
?>
    <section class="portfolio section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('We create the most useful <br> IT products', 'Создаем максимально полезные<br> IT продукты'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Portfolio', 'Портфолио'); ?>
                            <span class="shadowText"><?php string_translate('Portfolio', 'Портфолио'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-5 offset-xl-6">
                    <p class="slogan"><?php string_translate('The best <b> confirmation </b> of our <b> qualifications and professionalism </b> are the <b> stories </b> of the success of our <b> clients </b> and the differences in their business before and after working with us .', 'Лучшим <b>подтверждением</b> нашей <b>квалификации и профессионализма</b> являются <b>истории</b> успеха наших <b>клиентов</b> и различия в их бизнесе до и после сотрудничества с нами.'); ?></p>
                </div>
            </div>
            <div class="row">
                <?php while ($pfItems->have_posts()) : $pfItems->the_post(); ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="portfolioItem">
                            <a href="<?php the_permalink(); ?>">
                                <div class="media">
                                    <?php if (get_field('video')) : ?>
                                        <video class="noAutoPlay" poster="<?=webPMagic(get_the_post_thumbnail_url());?>" loop muted>
                                            <source src="<?php the_field('video'); ?>" type="video/mp4">
                                        </video>
                                    <?php else : ?>
                                        <img src="<?= webPMagic(get_the_post_thumbnail_url()) ?>" alt="poster">
                                    <?php endif; ?>
                                </div>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="title"><?php string_translate('Project ', 'Проект '); ?><b><?php the_title(); ?></b></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="link">
                        <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="mainBtn"><?php string_translate('View all projects', 'Посмотреть все проекты'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
