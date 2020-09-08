<?php
get_header('inner');
?>
<main>
    <section class="portfolioHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('We create the most useful <br> IT products', 'Создаем максимально полезные<br> IT продукты'); ?></span>
                        <h1 class="sectionSubTitle"><?php string_translate('Portfolio', 'Портфолио'); ?>
                            <span class="shadowText"><?php string_translate('Portfolio', 'Портфолио'); ?></span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-5 offset-xl-6">
                    <p class="slogan"><?php string_translate('The best <b> confirmation </b> of our <b> qualifications and professionalism </b> are the <b> stories </b> of the success of our <b> clients </b> and the differences in their business before and after working with us.', 'Лучшим <b>подтверждением</b> нашей <b>квалификации и профессионализма</b> являются <b>истории</b> успеха наших <b>клиентов</b> и различия в их бизнесе до и после сотрудничества с нами.'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="portfolioFilter">
                        <?php
                            $args = array(
                                'post_type' => 'portfolio',
                                'posts_per_page' => -1
                            );
                            $pf_cats = get_terms(
                                array(
                                    'taxonomy' => 'portfolio_category',
                                    'hide_empty' => false,
                                )
                            );
                            $catDot = 0;
                            foreach ($pf_cats as $pf_cat) {
                                $posts = get_posts($args);
                                if ($catDot++ > 0) {
                                    $catDotPlus = '.category-';
                                }
                                echo '<li>';
                                    echo '<button type="button" class="itemFilter" data-filter="'.$catDotPlus.$pf_cat->slug.'">'.$pf_cat->name.'<span></span></button>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row targetFilterPortfolio">
                <?php foreach($posts as $post) : ?>
                    <?php
                        $pf_cats_posts = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                        $cats = "";
                        foreach ($pf_cats_posts as $pf_cats_post) {
                            $cats .= " category-".$pf_cats_post->slug;
                        }
//                        if($post->post_title == 'Mobi Way') var_dump($pf_cats_posts);
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4 mixIt <?php echo $cats; ?>">
                        <div class="portfolioItem">
                            <a href="<?php the_permalink(); ?>">
                                <!-- <div class="media">
                                    <video class="noAutoPlay" poster="<?php the_post_thumbnail_url(); ?>" loop muted>
                                        <source src="<?php the_field('video'); ?>" type="video/mp4">
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
                <?php endforeach; ?>
            </div>
            <!-- <div class="row">
                <div class="col-12">
                    <div class="link">
                        <a href="#" class="mainBtn"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div> -->
        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
    <?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>

<!-- Popup CV -->
<?php get_template_part( 'partials/pt-cv-form' ); ?>
<!-- END Popup CV -->
<?php get_footer('inner'); ?>
