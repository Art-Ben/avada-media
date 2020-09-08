<?php
    // Template name: Home page
    get_header();

?>

    <?php get_template_part( 'partials/pt', 'services' ); ?>
    <?php if (get_field('отобразить_видео_блок') == 'true') : ?>
        <section class="about section bgDark bgFixed" style-img="<?=webPMagic(get_template_directory_uri().'/assets/img/video/posterAbout.png')?>">
            <?php if (get_field('видео_файл')) { ?>
                <video class="bgVideo noAutoPlay" poster-img="<?=webPMagic(get_template_directory_uri().'/assets/img/video/posterAbout.png')?>">
                    <source src="<?php the_field('видео_файл'); ?>" type="video/mp4">
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
                            <?php if (get_field('видео_файл')) { ?>
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
    <?php endif; ?>

    <?php
        get_template_part( 'partials/pt', 'technology' );
        get_template_part( 'partials/pt', 'portfolio' );
        get_template_part( 'partials/pt', 'company' );
    ?>
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
    <?php
        get_template_part( 'partials/pt', 'footer' );
    ?>
