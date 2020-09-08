<?php
// Template name: Services
get_header('inner');
the_post();
?>

<main>
    <section class="serviceHome section bgDark bgFixed" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <section class="serviceAbout section">
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
            <?php if (have_rows('content')) : ?>
                <div class="row">
                    <?php while(have_rows('content')) : the_row(); ?>
                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                            <div class="serviceText">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
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
            <?php if (have_rows('videos')) : ?>
                <div class="row videoReviews">
                    <?php while(have_rows('videos')) : the_row(); ?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="video">
                                <iframe src="<?php the_sub_field('video_yt_url'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="link">
                        <a href="#" class="mainBtn darkBtn"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <?php if (have_rows('steps')) : ?>
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
            <?php endif; ?>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
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
                                <div class="media">
                                    <video class="noAutoPlay" poster="<?php the_post_thumbnail_url(); ?>" loop muted>
                                        <source src="" type="video/mp4">
                                    </video>
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
                        <a href="/portfolio.html" class="mainBtn"><?php string_translate('View all projects', 'Посмотреть все проекты'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt', 'black-reviews' ); ?>
    <section class="serviceIndustry section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('Who are our clients?', 'Кто наши клиенты'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('We create applications <br> for such industries', 'Создаем приложения<br> для таких отраслей'); ?>
                            <span class="shadowText"><?php string_translate('Who are our clients?', 'Кто наши клиенты'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php if (have_rows('clients')) : ?>
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
            <?php endif; ?>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
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
                <form action="#" class="cvForm" autocomplete="off">
                    <div class="controlWrapper">
                        <input type="text" class="controlForm" id="cvName" required>
                        <label for="cvName" class="placeholder">ФИО</label>
                    </div>
                    <div class="controlWrapper">
                        <input type="number" class="controlForm" id="cvPhone" required>
                        <label for="cvPhone" class="placeholder">Телефон</label>
                    </div>
                    <div class="controlWrapper">
                        <input type="email" class="controlForm" id="cvEmail" required>
                        <label for="cvEmail" class="placeholder">Email</label>
                    </div>
                    <div class="controlWrapper">
                        <textarea class="controlForm" id="cvComment"></textarea>
                        <label for="cvComment" class="placeholder">Комментарий</label>
                    </div>
                    <div class="formFooter">
                        <div class="controlWrapper">
                            <input type="file" id="cvFile" class="cvFile" required>
                            <label for="cvFile" class="mainBtn">Загрузить CV<span class="decorUnderline"></span></label>
                        </div>
                        <button type="submit" class="mainBtn">Отправить<span class="decorUnderline"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
