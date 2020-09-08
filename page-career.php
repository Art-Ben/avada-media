<?php
// Template name: Career
get_header('inner');
the_post();
$frontpage_id = get_option( 'page_on_front' );
?>

<main>
    <section class="careerHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('We create the most useful <br> sites and applications', 'Создаем максимально полезные<br> сайты и приложения'); ?></span>
                        <h1 class="sectionSubTitle"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-4 offset-xl-6">
                    <div class="slogan">
                        <?php the_content(); ?>
                        <a href="#" class="mainBtn careerPopup"><?php string_translate('Send CV', 'Отправить резюме'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
            <div class="vacancyList">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle lightTitle">
                            <span class="sectionTitle"><?php string_translate('Join us', 'Присоединяйся к нам'); ?></span>
                            <p class="sectionSubTitle"><?php string_translate('Hot jobs', 'Горячие вакансии'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $cArgs = array(
                            'post_type' => 'career',
                            'posts_per_page' => -1
                        );
                        $c_query = new WP_Query($cArgs);
                        while ($c_query->have_posts()) : $c_query->the_post();
                    ?>
                        <div class="col-md-6 col-xl-4">
                            <a href="<?php the_permalink(); ?>">
                                <div class="vacancyBlock">
                                    <div class="title"><span></span><?php the_title(); ?></div>
                                    <p class="text"><?php the_field('preview_title'); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt', 'team' ); ?>
    <?php $frontpage_id = get_option( 'page_on_front' ); if (have_rows('список_технологий', $frontpage_id)) { ?>
        <section class="careerTechnologies section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php the_field('subtitle_tech', $frontpage_id); ?></span>
                            <p class="sectionSubTitle"><?php the_field('title_tech', $frontpage_id); ?>
                                <span class="shadowText"><?php the_field('subtitle_tech', $frontpage_id); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 order-1 order-xl-0 col-xl-4 offset-xl-1">
                        <div class="slogan">
                            <p><?php string_translate('We are always ready to consider a resume of talented developers, experienced sales managers, creative designers and copywriters', 'Всегда готовы рассмотреть резюме талантливых  разработчиков, опытных менеджеров по  продажам, творческих дизайнеров и копирайтеров'); ?></p>
                            <a href="#" class="mainBtn darkBtn careerPopup"><?php string_translate('Send CV', 'Отправить резюме'); ?><span class="decorUnderline"></span></a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 offset-xl-1">
                        <div class="logosBlock">
                            <?php while ( have_rows('список_технологий', $frontpage_id) ) : the_row(); ?>
                                <div class="logo">
                                    <a href="<?php the_sub_field('ссылка_технологии', $frontpage_id); ?>">
                                        <img src="<?php the_sub_field('логотип_технологии', $frontpage_id); ?>" alt="React">
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section>
        <!-- <section class="careerTechnologies section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="mainTitle">
                            <span class="sectionTitle"><?php string_translate('Our variety', 'Наше разнообразие'); ?></span>
                            <p class="sectionSubTitle"><?php string_translate('Technology<br> which we own<br>', 'Технологии<br> которыми<br> мы владеем'); ?>
                                <span class="shadowText"><?php string_translate('Our<br> variety', 'Наше<br> разнообразие'); ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="logosBlock">
                            <?php while ( have_rows('список_технологий', $frontpage_id) ) : the_row(); ?>
                                <div class="logo">
                                    <a href="<?php the_sub_field('ссылка_технологии', $frontpage_id); ?>">
                                        <img src="<?php the_sub_field('логотип_технологии', $frontpage_id); ?>" alt="React">
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <p class="other"><span><?php string_translate('And other', 'И другое'); ?></span></p>
                    </div>
                </div>
            </div>
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </section> -->
    <?php } ?>
    <?php get_template_part( 'partials/pt', 'inner-contacts' ); ?>
</main>

<!-- Popup CV -->
<?php get_template_part( 'partials/pt', 'cv-form' ); ?>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
