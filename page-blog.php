<?php
/*
Template name: Blog
*/
get_header( 'inner' );
$cats = kubster_get_cats();
$firstBlogPart = kubster_get_blog(null, 1);
$secondBlogPart = kubster_get_blog(null, 2);
$blog_videos = get_field('blog_videos', 'option');
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$blogQueryArgs = array(
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'post_type' => array('post', 'services'),
	'ignore_sticky_posts' => 1, 
    //'paged' => 1,
    'orderby' => 'date',
	'order' => 'DESC',
	'meta_query' => array(
		 array(
			'key'	  	=> 'show_in_blog',
			'value'	  	=> '1',
		)
	)
);
$blogQuery = new WP_Query($blogQueryArgs);

?>

<main>
    <section class="blogHome section bgDark bgFixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mainTitle lightTitle">
                        <span class="sectionTitle"><?php string_translate('Find interesting articles from<br> world-class experts', 'Найдите интересные статьи от<br> експертов мирового уровня'); ?></span>
                            <h1 class="sectionSubTitle"><?php the_title(); ?>
                            <span class="shadowText"><?php the_title(); ?></span>
                        </h1>
                    </div>
                </div>
            </div>
			<?php
				if( $blogQuery->have_posts()) {
			?>
            <div class="row blog-wrapper">
            	<div class="col-12 col-xl-10 offset-xl-1">
            		<div class="row blog-posts">
						<?php 
							while( $blogQuery->have_posts() ) {
							$blogQuery->the_post();

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
						<?php 
							} 
						?>
            		</div>
            	</div>
            </div>
			<?php
				if($blogQuery->max_num_pages > 1) {
			?>
            <div class="row">
                <div class="col-12">
                    <div class="link">
                        <a href="javascript:void(0);" class="mainBtn load_more_btn_new" data-page="<?=$paged;?>" data-max_pages="<?=$blogQuery->max_num_pages;?>"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                    </div>
                </div>
            </div>
			<?php 
					}
				}
				wp_reset_postdata();
			?>

        </div>
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
<?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>

<?php get_footer('inner'); ?>

<script>
	$(document).ready(function() {
	    /**
			old blog design functionality
		 */

		/*
		let category = $('[data-cat]').attr('data-cat');
	    let page = $('[data-nextPage]').attr('data-nextPage');
	    
	    $('.load_more_btn').on('click', function(e) {
	        e.preventDefault();
	        $(this).html('<?php string_translate('Loading..', 'Загрузка...')?><span class="decorUnderline"></span>');
	        $.get('/wp-admin/admin-ajax.php?action=klm&category='+category+'&page='+page, {}, function (data) {
	            let obj = JSON.parse(data);
	            $('.load_more_wrapper').append(obj.html);

	            $.scrollify.update();

	            if(!Number(obj.load_more)){
	                $('.load_more_btn').hide();
	            }
	            else{
	                page++;
	            }
	            $('.load_more_btn').html('<?php string_translate('Load more', 'Загрузить еще');?><span class="decorUnderline"></span>');
	        });
	        return false;
	    });*/

		$('body').on( 'click', '.load_more_btn_new', function(){
			const _this = $(this);
			let currentPage = _this.data('page');
			let maxNumberPages = _this.data('max_pages');
			let ajaxUrl = '<?php echo get_home_url().'/wp-admin/admin-ajax.php'; ?>';
			let nextPage = ++currentPage;

			console.log(currentPage + '\n\r' + maxNumberPages);

			let data = new FormData();
			data.append('action', 'blogloadmorenew');
			data.append('currentPage', currentPage);
			data.append('maxPaginationNumber', maxNumberPages);

			$.ajax({
				url : ajaxUrl,
				type: 'POST',
				data: data,
				dataType: 'json',
				contentType: false,
				processData: false,
				beforeSend: function( ){
					_this.html('<?php string_translate('Loading..', 'Загрузка...')?><span class="decorUnderline"></span>'); 
				},
				success:function( response ){
					if( response ) {
						let response_obj = JSON.parse(JSON.stringify(response));
						$('.blog-wrapper').find('.blog-posts').append( response_obj.output );
						_this.data('page', nextPage);
						$.scrollify.update();
						if( (nextPage + 1) < maxNumberPages ) {
							_this.html('<?php string_translate('Load more', 'Загрузить еще');?><span class="decorUnderline"></span>');
						} else {
							_this.fadeOut(300);
						}
					}
				},
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
        			}
					console.log(msg);
				}
			});
			
		} ) 

    });
</script>