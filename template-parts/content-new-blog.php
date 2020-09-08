<?php
/**
 * template for diplaying single blog item on /blog page with new design
 */

$post_id = get_the_id();
$post_link = get_the_permalink();

$post_title = get_the_title();
$post_title_blog = get_field('blog_title');

if( $post_title_blog ) {
    $show_title = $post_title_blog;
} else {
    $show_title = $post_title;
}

$post_thumb = get_the_post_thumbnail_url( $post_id, 'full' );
$post_thumb_custom = get_field('blog_image');

if( $post_thumb_custom ) {
    $post_thumb_show = $post_thumb_custom;
} else {
    $post_thumb_show = $post_thumb;
}

$post_date = get_the_time('d.m.Y');

?>

<div class="col-12 col-sm-6 col-lg-4">
    <div class="blogItem">
        <a href="<?=$post_link;?>">
            <div class="media">
                <img src="<?=$post_thumb_show;?>" alt="<?=$show_title;?>">
            </div>
            <span class="title"><?=$show_title;?></span>
            <span class="date"><?=$post_date;?></span>
        </a>
    </div>
</div>

