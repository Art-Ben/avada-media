<?php $frontpage_id = get_option( 'page_on_front' ); if (have_rows('список_технологий', $frontpage_id)) { ?>
    <section class="technologies section" id="technologies">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="mainTitle">
                        <span class="sectionTitle"><?php the_field('subtitle_tech', $frontpage_id); ?></span>
                        <p class="sectionSubTitle"><?php the_field('title_tech', $frontpage_id); ?>
                            <span class="shadowText"><?php the_field('subtitle_tech', $frontpage_id); ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="logosBlock">
                        <?php while ( have_rows('список_технологий', $frontpage_id) ) : the_row(); ?>
                            <div class="logo">
                                <a href="<?php the_sub_field('ссылка_технологии', $frontpage_id); ?>">
                                    <img data-src="<?=webPMagic(get_sub_field('логотип_технологии', $frontpage_id))?>" alt="Logo">
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
    </section>
<?php } ?>
