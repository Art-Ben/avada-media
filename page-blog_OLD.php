<?php
/*
Template name: Blog
*/
get_header( 'inner' );
$cats = kubster_get_cats();
$firstBlogPart = kubster_get_blog(null, 1);
$secondBlogPart = kubster_get_blog(null, 2);
$blog_videos = get_field('blog_videos', 'option');
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
        </div>
        <div class="blogNav">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-10 offset-xl-1">
                        <div class="blogNavWrap dragscroll">
                            <ul>
                                <li><a href="#" class="active">Все<span></span></a></li>
                                <?php foreach($cats as $cat): if($cat->term_id == 1) continue;?>
                                    <li><a href="<?=get_term_link($cat)?>" class=""><?=$cat->name?><span></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blogTop">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <?php if(count($firstBlogPart) > 0): ?>
                        <div class="blogItem mainPost">
                            <a href="<?=get_the_permalink($firstBlogPart[0]->ID)?>">
                                <div class="media">
                                    <img src="<?=kubster_blog_image($firstBlogPart[0]->ID)?>" alt="">
                                </div>
                                <div class="text">
                                    <span class="title"><?=kubster_blog_title($firstBlogPart[0]->ID)?></span>
                                    <p><?php kubster_blog_excerpt($firstBlogPart[0]->ID) ?></p>
                                    <span class="date"><?=get_the_date('d.m.Y', $firstBlogPart[0]->ID); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if(count($firstBlogPart)>8): ?>
                        <div class="blogBlockTitle">
                            <span><?php string_translate('Latest articles', 'Последние статьи'); ?></span>
                        </div>
                        <ul>
                            <?php for($i = 8; $i <= 10; $i++): $p = $firstBlogPart[$i];?>
                            <li class="blogItem">
                                <a href="<?=get_the_permalink($p->ID)?>">
                                    <div class="media">
                                        <img src="<?=kubster_blog_image($p->ID)?>" alt="">
                                    </div>
                                    <div class="text">
                                        <span class="title"><?=kubster_blog_title($p->ID)?></span>
                                        <p><?php kubster_blog_excerpt($p->ID); ?></p>
                                        <span class="date"><?=get_the_date('d.m.Y', $p->ID); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-lg-5 col-xl-4 offset-lg-1 d-flex flex-column d-lg-block">
                        <?php if(count($firstBlogPart) > 1): ?>
                            <div class="blogBlockTitle order-1">
                                <span><?php string_translate('Latest articles', 'Последние статьи'); ?></span>
                            </div>
                            <ul class="order-1">
                                <?php for($i=1; $i <= 7; $i++): $p = $firstBlogPart[$i];?>
                                    <li class="blogItem shortPost">
                                        <a href="<?=get_the_permalink($p->ID)?>">
                                            <div class="media">
                                                <img src="<?=kubster_blog_image($p->ID)?>" alt="">
                                            </div>
                                            <div class="text">
                                                <span class="title"><?=kubster_blog_title($p->ID)?></span>
                                                <p><?php kubster_blog_excerpt($p->ID); ?></p>
                                                <span class="date"><?=get_the_date('d.m.Y', $p->ID); ?></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if(count($firstBlogPart) > 8): $p = $firstBlogPart[11];?>
                            <div class="blogItem minorPost order-0 order-lg-1">
                                <a href="<?=get_the_permalink($p->ID)?>">
                                    <div class="media">
                                        <img src="<?=kubster_blog_image($p->ID)?>" alt="">
                                    </div>
                                    <div class="text">
                                        <span class="title"><?=kubster_blog_title($p->ID)?></span>
                                        <p><?php kubster_blog_excerpt($p->ID); ?></p>
                                        <span class="date"><?=get_the_date('d.m.Y', $p->ID); ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($blog_videos)): ?>
            <div class="blogVideoDivider">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mainTitle">
                                <span class="sectionTitle"><?php string_translate('Find interesting videos from<br> world-class experts', 'Найдите интересные видео от<br> експертов мирового уровня'); ?></span>
                                <p class="sectionSubTitle">Видео-материалы
                                    <span class="shadowText">Видео-материалы</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-10 offset-xl-1">
                            <div class="videoSlider">
                                <?php foreach($blog_videos as $d => $video): ?>
                                    <div class="video" d="<?=$d?>">
                                        <?=$video['iframe']?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($secondBlogPart)): ?>
            <div class="blogBottom">
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
                    <div class="row">
                        <div class="col-12 col-xl-10 offset-xl-1">
                            <div class="row load_more_wrapper" data-nextPage="3" data-cat="">
                                <?php foreach ($secondBlogPart as $key => $p): ?>
                                    <div class="col-12 col-lg-6 col-xl-5 <?php if($key+1%2==0): ?> offset-xl-2 <?php endif; ?>">
                                        <div class="blogItem shortPost">
                                            <a href="<?=get_the_permalink($p->ID)?>">
                                                <div class="media">
                                                    <img src="<?=kubster_blog_image($p->ID)?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <span class="title"><?=kubster_blog_title($p->ID)?></span>
                                                    <p><?php kubster_blog_excerpt($p->ID) ?></p>
                                                    <span class="date"><?=get_the_date('d.m.Y', $p->ID); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="link">
                                <a href="#" class="mainBtn load_more_btn"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- OLD -->
        <!-- <div class="row">
            <div class="col-12 col-md-5 offset-md-1">
                <div class="blogBlockTitle">
                    <span><?php string_translate('Latest articles', 'Последние статьи'); ?></span>
                </div>
                <ul>
                    <li class="blogItem">
                        <a href="#">
                            <div class="media">
                                <img src="https://avada-media.ua/wp-content/uploads/2019/11/imgSample-3.png" alt="">
                            </div>
                            <div class="text">
                                <span class="date"><?php the_time('d.m.Y'); ?></span>
                                <span class="title">Как быстро пройти модерацию в APPSTORE и PLAYMARKET?</span>
                                <p>После того как вы создали приложение и протестировали его работу, его необходимо разместить в App Store и Google Play (либо в одном из этих сервисов, в зависимости от вашей целевой аудитории).</p>
                            </div>
                        </a>
                    </li>
                    <li class="blogItem">
                        <a href="#">
                            <div class="media">
                                <img src="https://avada-media.ua/wp-content/uploads/2019/11/imgSample-3.png" alt="">
                            </div>
                            <div class="text">
                                <span class="date"><?php the_time('d.m.Y'); ?></span>
                                <span class="title">Как быстро пройти модерацию в APPSTORE и PLAYMARKET?</span>
                                <p>После того как вы создали приложение и протестировали его работу, его необходимо разместить в App Store и Google Play (либо в одном из этих сервисов, в зависимости от вашей целевой аудитории).</p>
                            </div>
                        </a>
                    </li>
                    <li class="blogItem">
                        <a href="#">
                            <div class="media">
                                <img src="https://avada-media.ua/wp-content/uploads/2019/11/imgSample-3.png" alt="">
                            </div>
                            <div class="text">
                                <span class="date"><?php the_time('d.m.Y'); ?></span>
                                <span class="title">Как быстро пройти модерацию в APPSTORE и PLAYMARKET?</span>
                                <p>После того как вы создали приложение и протестировали его работу, его необходимо разместить в App Store и Google Play (либо в одном из этих сервисов, в зависимости от вашей целевой аудитории).</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-4 offset-md-1">
                <div class="blogItem minorPost">
                    <a href="#">
                        <div class="media">
                            <img src="https://avada-media.ua/wp-content/uploads/2019/11/imgSample-3.png" alt="">
                        </div>
                        <div class="text">
                            <span class="date"><?php the_time('d.m.Y'); ?></span>
                            <span class="title">Как быстро пройти модерацию в APPSTORE и PLAYMARKET?</span>
                            <p>После того как вы создали приложение и протестировали его работу, его необходимо разместить в App Store и Google Play (либо в одном из этих сервисов, в зависимости от вашей целевой аудитории).</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="blogFilter">
                    <?php
                        $bcArgs = array(
                            'post_type' => 'post',
                            'orderby' => 'name',
                            'parent' => 0
                        );
                        $args = array(
                            'posts_per_page' => -1
                        );
                        $categories = get_categories( $bcArgs );
                        foreach ( $categories as $category ) {
                            $catName = $category->cat_name;
            				$catSlug = $category->category_nicename;
                            $posts   = get_posts($args);

            				if ($catDot++ > 0) {
            					$catDotPlus = '.category-';
            				}
            				echo '<li>';
            					echo '<button type="button" class="itemFilter" data-filter="'.$catDotPlus.$catSlug.'">';
            						echo $catName . '<span></span>';
            					echo '</button>';
            				echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row targetFilterBlog">
        	<?php $pcount = 1; foreach($posts as $post) : ?>
                <?php
                    $itemCats = get_the_category($post->ID);
                    foreach ($itemCats as $itemCat) {
                        $postCat = $itemCat->slug;
                    }
                    $pcountValue = $pcount++;
                ?>
                <div class="col-12 col-sm-6 col-lg-4 mixIt category-<?php echo $postCat; ?>">
                    <div class="blogItem">
                        <a href="<?php the_permalink(); ?>">
                            <div class="media">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <span class="title"><?php the_title(); ?></span>
                            <p><?php the_field('preview_excerpt'); ?></p>
                            <span class="date"><?php the_time('d.m.Y'); ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($pcountValue > 6) : ?>
        <div class="row">
            <div class="col-12">
                <div class="link">
                    <a href="#" class="mainBtn"><?php string_translate('Load more', 'Загрузить еще'); ?><span class="decorUnderline"></span></a>
                </div>
            </div>
        </div>
        <?php endif; ?> -->
        <!-- OLD -->
        
        <svg class="svgIcon iconScrollNext scroll-next d-none d-xl-inline-block">
            <use xlink:href="#iconScrollNext"></use>
        </svg>
    </section>
<?php get_template_part( 'partials/pt-inner-contacts' ); ?>
</main>

<?php get_footer('inner'); ?>

<script>
	$(document).ready(function() {
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
	    });
    });
</script>