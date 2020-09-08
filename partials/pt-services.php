<?php
    $infoBlock = 1;
    $specs = get_field('specializations');
    if ( have_posts() ) :
?>
    <section class="specializations section">
        <svg class="svgIcon iconScrollPrev scroll-prev d-none d-xl-inline-block">
            <use xlink:href="#iconScrollPrev"></use>
        </svg>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle">
                        <span class="sectionTitle">
                            <?php string_translate('Our specializations', 'Наши специализации'); ?>
                        </span>
                        <p class="sectionSubTitle"><?php string_translate('How can we<br> be of service to you', 'Чем мы можем<br> быть вам полезны'); ?>
                            <span class="shadowText"><?php string_translate('How can we<br> be of service to you', 'Чем мы можем<br> быть вам полезны'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach ($specs as $i => $spec) : $spec = $spec['spec']; if(empty($spec->ID)) continue;
                ?>
                    <div class="col-md-6 col-xl-4">
                        <a href="<?=get_the_permalink($spec->ID)?>">
                            <div class="infoBlock infoBlock-<?php echo $i+1; ?>">
                                <span class="title"><?=get_the_title($spec->ID)?></span>
                                <p class="text">
                                    <?php echo wp_trim_words( $spec->post_content, 50, '' ); ?>
                                </p>
                                <div class="link">
                                    <span>
                                        <svg class="svgIcon iconChevronRight">
                                            <use xlink:href="#iconChevronRight"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
