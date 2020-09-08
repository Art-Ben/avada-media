<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-64276279-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-64276279-1');
</script>
	<?php
        $qO = get_queried_object();
        $post_type = '';
        if($qO instanceof WP_Post_Type){
            $post_type = $qO->name;
        }
        if($post_type == 'portfolio'):
    ?>
    <meta name="description" content="<?=string_translate('Our best works: examples of corporate sites, online stores, mobile applications, web systems - more than 300 customers and 10 years of experience.', 'Наши лучшие работы: примеры корпоративных сайтов, интернет-магазины, мобильные приложения, веб-системы - более 300 клиентов и 10 лет опыта.')?>">
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/safari-pinned-tab.svg" color="#555555">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Avada Media">
    <meta name="application-name" content="Avada Media">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Opengraph -->
    <!-- <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php the_post_thumbnail_url('medium'); ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?php the_content(); ?>" /> -->
    <!-- END Opengraph -->
    <?php if($post_type == 'portfolio'): ?>
        <title>
            <?=string_translate('The best sites and mobile apps in Ukraine - Portfolio AVADA-MEDIA','Самые лучшие сайты и мобильные приложения в Украине - Портфолио AVADA-MEDIA')?>
        </title>
    <?php endif; ?>
    <?php wp_head(); ?>


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WFDMZR6');</script>
    <!-- End Google Tag Manager -->
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1219035201624365');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1219035201624365&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

	</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFDMZR6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Preloader -->
<!-- <div id="preloader">
    <div class="wrap">
        <div class="preloaderImg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rocket.svg" alt="Preloader">
        </div>
        <p class="preloaderText">Готовы к старту ?..</p>
    </div>
</div> -->
<!-- END Preloader -->

<header class="mainHeader bgDarkTrue">
    <div class="menu">
        <div class="triggerMenu">
            <span class="el line-1"></span>
            <span class="el line-2"></span>
            <span class="el line-3"></span>
            <span class="el dot"></span>
        </div>
        <div class="lang">
            <?php qtranxf_generateLanguageSelectCode('name'); ?>
        </div>
        <div class="logo">
            <a href="<?php bloginfo('url'); ?>"><span>Avada</span> Media<i>&trade;</i></a>
        </div>
    </div>
    <?php get_template_part('partials/pt', 'socials'); ?>
    <!-- <div class="mainMenu" style="background: url('<?=webPMagic(get_template_directory_uri().'/assets/img/bgMainMenu.png')?>') no-repeat left center/cover;"> -->
    <div class="mainMenu">
        <div class="container">
            <div class="row d-none d-xl-block">
                <div class="col-md-8 offset-md-3">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="logo">
                        <a href="<?php bloginfo('url'); ?>"><span>Avada</span> Media<i>&trade;</i></a>
                    </div>
                    <a href="tel:<?php $strSrc = array('(', ')', ' '); echo str_replace($strSrc, '', get_field('phone_number', 'option')); ?>" class="phoneMenu">
                        <?php the_field('phone_number', 'option'); ?>
                    </a>
                    <!-- <div>
                        <a href="<?php echo get_page_link(864); ?>" class="mainBtn calculateBtn">
                            <?php string_translate('Calculate cost', 'Рассчитать стоимость'); ?><span class="decorUnderline"></span>
                        </a>
                    </div> -->
                    <style>
                        <?php $pCount = wp_count_posts('portfolio')->publish; ?>
                        span.counter span.count::after{
                            content: '<?php echo $pCount; ?>' !important;
                        }
                    </style>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class' => 'listMenu'
                            )
                        );
                    ?>
                </div>
                <?php if (have_rows('menu_section', 'option')) : ?>
                    <?php while(have_rows('menu_section', 'option')) : the_row(); $menuLoc = mb_strtolower(get_sub_field('menu_name', 'option')); ?>
                        <?php if ($menuLoc) : ?>
                            <div class="col-sm-6 col-lg-3 col-xl-2">
                                <ul class="listMenu dropDown">
                                    <li><span class="toggle"><?php the_sub_field('menu_title', 'option'); ?></span>
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => $menuLoc,
                                                    'container' => false,
                                                    'menu_class' => 'toggleMenu'
                                                )
                                            );
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12 insertSocial"></div>
            </div>
        </div>
    </div>
    <!-- <?php get_template_part('partials/pt', 'socials'); ?> -->
<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('117' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'form-futer',
        'event_action': 'submit'
      });
      console.log('работает');
    }
    if ('385' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'form-cv',
        'event_action': 'submit'
      });
     console.log('работает');
    }
  }, false);
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" defer>
   // (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   // m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   // (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
   //
   // ym(30974586, "init", {
   //      clickmap:true,
   //      trackLinks:true,
   //      accurateTrackBounce:true,
   //      webvisor:true,
   //      ecommerce:"dataLayer"
   // });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/30974586" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</header>