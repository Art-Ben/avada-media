<?php
add_action('init', function(){
    register_taxonomy_for_object_type( 'category', 'page' );
    register_taxonomy_for_object_type( 'category', 'services' );
});
function kubster_get_blog($category = '', $page = 1){
    $cats = [];
    if(empty($category)){
        $cats_all = kubster_get_cats();
        foreach ($cats_all as $cat){
            $cats[] = $cat->term_id;
        }
    }else{
        $cats[] = $category;
    }
    $posts = get_posts(
        [
            'post_type'=>['page', 'post', 'services'],
            'posts_per_page'=>12,
            'paged'=>$page,
            'tax_query'=>[
                [
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $cats,
                    'operator' => 'IN'
                ]
            ],
            'post_status'=>'publish',
        ]
    );

    return $posts;
}
function kubster_get_cats(){
    $terms = get_terms('category');
    return $terms;
}
function kubster_is_active_cat($cat){
    $current = get_queried_object();
    return $current->term_id == $cat->term_id;
}
function kubster_enable_load_more($category = '', $page = 1){
    $posts = kubster_get_blog($category, $page+1);
    return !empty($posts);
}
function kubster_load_more(){
    $category = (isset($_GET['category']))?$_GET['category']:'';
    $page = (isset($_GET['page']))?$_GET['page']:1;
    $data = [];
    $data['load_more'] = kubster_enable_load_more($category, $page);
    $data['html'] = '';
    $posts = kubster_get_blog($category, $page);
    ob_start();
    ?>
    <?php foreach ($posts as $key => $p): ?>
        <div class="col-12 col-lg-6 col-xl-5 <?php if($key+1%2==0): ?> offset-xl-2 <?php endif; ?>">
            <div class="blogItem shortPost">
                <a href="<?=get_the_permalink($p->ID)?>">
                    <div class="media">
                        <img src="<?=get_the_post_thumbnail_url($p->ID)?>" alt="">
                    </div>
                    <div class="text">
                        <span class="title"><?=kubster_blog_title($p->ID)?></span>
                        <p><?php the_excerpt($p->ID) ?></p>
                        <span class="date"><?=get_the_date('d.m.Y', $p->ID); ?></span>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php
    $data['html'] = ob_get_clean();
    echo json_encode($data);
    exit();
}
add_action('wp_ajax_klm', 'kubster_load_more');
add_action('wp_ajax_nopriv_klm', 'kubster_load_more');


if( !function_exists('blogLoadMoreNew') ) {
    function blogLoadMoreNew() {
        $currentPaginationPage = $_POST['currentPage'];
        $maxPaginationPage = $_POST['maxPaginationNumber'];

        $nextPaginationPage = $currentPaginationPage + 1;
        
        $loadMoreQueryArgs = array(
            'posts_per_page' => 15,
            'post_status' => 'publish',
            'post_type' => array('post', 'services'),
            'ignore_sticky_posts' => 1, 
            'paged' => $nextPaginationPage,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => array(
                 array(
                    'key'	  	=> 'show_in_blog',
                    'value'	  	=> '1',
                )
            )
        );

        $response = array();
        
        $loadMoreQuery = new WP_Query($loadMoreQueryArgs);

        if( $loadMoreQuery->have_posts() ) {
            while( $loadMoreQuery->have_posts() ) {
                $loadMoreQuery->the_post();
                
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

                $response['output'] .= '<div class="col-12 col-sm-6 col-lg-4">
                <div class="blogItem">
                    <a href="'.$post_link.'">
                        <div class="media">
                            <img src="'.$post_thumb_show.'" alt="'.$show_title.'">
                        </div>
                        <span class="title">'.$show_title.'</span>
                        <span class="date">'.$post_date.'</span>
                    </a>
                </div>
            </div>'; 
            }
        } else {
            $response['error'] = 'Ошибка при загрузке новостей, проверьте работу обработчика php / ajax';
        }
        echo json_encode($response);
        exit();
    }
}
add_action('wp_ajax_blogloadmorenew', 'blogLoadMoreNew');
add_action('wp_ajax_nopriv_blogloadmorenew', 'blogLoadMoreNew');

function kubster_blog_title($post){
    $field = get_field('blog_title', $post);
    return (empty($field))?get_the_title($post):$field;
}
function kubster_blog_image($post){
    $field = get_field('blog_image', $post);
    return (empty($field))?get_the_post_thumbnail_url($post):$field;
}
function kubster_blog_excerpt($post){
    $field = get_field('blog_excerpt', $post);
    if(empty($field))
        the_excerpt($post);
    else
        echo $field;
}
add_action('wp_footer', function(){
    get_template_part('kubster/gdpr', 'content');
});