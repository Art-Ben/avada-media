<?php
/*
Template name: About
*/
get_header('inner');
$frontpage_id = get_option( 'page_on_front' );
?>
<main>
    <h1 class="d-none"><?php string_translate('International IT company', 'Международная IT компания'); ?></h1>
    
    <section class="about section bgDark bgFixed" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/video/posterAbout.png');">
        <?php if (get_field('видео_файл', $frontpage_id)) { ?>
            <video class="bgVideo noAutoPlay" poster="<?php bloginfo('template_url'); ?>/assets/img/video/posterAbout.png">
                <source src="<?php the_field('видео_файл', $frontpage_id); ?>" type="video/mp4">
            </video>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="innerBlock">
                        <span><?php string_translate('IT product development company', 'Компания-разработчик ІТ продуктов'); ?></span>
                        <svg class="svgIcon bigLogo">
                            <use xlink:href="#bigLogo"></use>
                        </svg>
                        <p>Presents</p>
                        <?php if (get_field('видео_файл', $frontpage_id)) { ?>
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
    <?php get_template_part( 'partials/pt', 'company' ); ?>
    <?php get_template_part( 'partials/pt-team' ); ?>
    <?php get_template_part( 'partials/pt', 'technology' ); ?>
    <?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>
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
<?php get_footer('inner'); ?>
