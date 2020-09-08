<?php
// Template name: Inspiration
get_header('inner');
the_post();
?>

<main>
    <section class="inspirationHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php the_field('inspiration_title', 'option'); ?></span>
                        <p class="sectionSubTitle"><?php string_translate('Timeline', 'Лента'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?=do_shortcode('[instagram-feed]');?>
            </div>
        </div>
    </section>


    <?php get_template_part( 'partials/pt', 'inner-contacts' ); ?>
</main>
<style>
    .inspirationHome{
        height: auto !important;
    }
    .sb_instagram_header{
        display: none;
    }
    .sbi_caption{
        display: none;
    }
</style>
<!-- Popup CV -->
<?php get_template_part( 'partials/pt', 'cv-form' ); ?>
<!-- END Popup CV -->

<?php get_footer('inner'); ?>
