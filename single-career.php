<?php
get_header('inner');
the_post();
?>

<main>
    <section class="vacancyHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('Join us', 'Присоединяйся к нам'); ?></span>
                        <h1 class="sectionSubTitle"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-5 offset-xl-1">
                    <div class="vacancyDesc">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php if (have_rows('requirements')) : ?>
                <div class="vacancyInfo">
                    <?php while(have_rows('requirements')) : the_row(); ?>
                        <div class="infoItem">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mainTitle lightTitle">
                                        <span class="sectionTitle"><?php the_sub_field('requirements_title'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-7 offset-lg-1 col-xl-6">
                                    <?php the_sub_field('requirements_content'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="cvLink">
                        <a href="#" class="mainBtn careerPopup"><?php string_translate('Send CV', 'Отправить резюме'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cvLinkFixed">
            <a href="#" class="mainBtn careerPopup"><?php string_translate('Send CV', 'Отправить резюме'); ?><span class="decorUnderline"></span></a>
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php
        get_template_part( 'partials/pt', 'team' );
        get_template_part( 'partials/pt', 'inner-contacts' );
    ?>
</main>

<!-- Popup CV -->
<?php get_template_part( 'partials/pt', 'cv-form' ); ?>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
