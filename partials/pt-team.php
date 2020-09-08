<?php
    $teamArgs = array(
        'post_type' => 'team',
        'posts_per_page' => 12
    );
    $tm_query = new WP_Query($teamArgs);
?>
<section class="aboutTeam section">
    <svg class="svgIcon iconScrollPrev scroll-prev d-none d-xl-inline-block">
        <use xlink:href="#iconScrollPrev"></use>
    </svg>
    <div class="container<?php if (is_singular('career')) { echo ' rocketDownArea'; } ?>">
        <div class="row">
            <div class="col-12">
                <div class="mainTitle">
                    <span class="sectionTitle"><?php string_translate('Our team', 'Наша команда'); ?></span>
                    <p class="sectionSubTitle"><?php string_translate('Successful projects <br> are created only by the team', 'Успешные проекты<br> создаются только командой'); ?>
                        <span class="shadowText"><?php string_translate('Our team', 'Наша команда'); ?></span>
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
    <?php if (is_singular('career')) : ?>
        <div class="rocketDown">
            <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
                <use xlink:href="#iconScrollNext"></use>
            </svg>
        </div>
    <?php endif; ?>
</section>
