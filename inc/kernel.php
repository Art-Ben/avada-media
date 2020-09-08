<?php
/*
* Main engine Kernel. Do not modify this code!
*/






    // Styles and scripts
        if (true) {
            function avada_media_scripts() {
                // Styles
                wp_enqueue_style( 'avada-media-google-font-montserrat-roboto-syncopate', '//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Roboto:100,300,400,500,700,900|Syncopate:400,700&display=swap&subset=cyrillic,cyrillic-ext,latin-ext' );
                wp_enqueue_style( 'avada-media-slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' );
                wp_enqueue_style( 'avada-media-scrollbars', '//cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/css/OverlayScrollbars.min.css' );
                wp_enqueue_style( 'avada-media-aos', '//unpkg.com/aos@next/dist/aos.css' );
                wp_enqueue_style( 'avada-media-fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
                wp_enqueue_style( 'avada-media-bootstrap', get_template_directory_uri() . '/assets/css/vendor/bootstrap-grid.css' );
                wp_enqueue_style( 'avada-media-main', get_template_directory_uri() . '/assets/css/main.min.css' );
                wp_enqueue_style( 'avada-media-style', get_template_directory_uri() . '/assets/css/style.css', '', '0.1' );

                wp_enqueue_style( 'avada-media-style', get_stylesheet_uri() );

                // Scripts
                wp_enqueue_script( 'avada-media-jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.4.1.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-scrollify', get_template_directory_uri() . '/assets/js/vendor/jquery.scrollify.js', array(), null, true );
                wp_enqueue_script( 'avada-media-mixitup', get_template_directory_uri() . '/assets/js/vendor/mixitup.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), null, true );
                wp_enqueue_script( 'avada-media-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), null, true );
                wp_enqueue_script( 'avada-media-slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-scrollbars', '//cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/js/jquery.overlayScrollbars.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-masonry', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-aos', '//unpkg.com/aos@next/dist/aos.js', array(), null, true );
                wp_enqueue_script( 'avada-media-fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-current-device', '//unpkg.com/current-device/umd/current-device.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-dragscroll', '//cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js', array(), null, true );
                wp_enqueue_script( 'avada-media-main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );
                wp_enqueue_script( 'avada-media-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, true );
                if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                    wp_enqueue_script( 'comment-reply' );
                }
            }
            add_action( 'wp_enqueue_scripts', 'avada_media_scripts' );
        }

// Usermeta


// Classic editor
    if (true) {
        if( 'disable_gutenberg' ){
            add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
            remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
            add_action( 'admin_init', function(){
                remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
                add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
            } );
        }
    }

// String translate
    if (true) {
        if (function_exists('qtranxf_getLanguage')) {
            function get_string_translate($en = false, $ru = false){
                if (qtranxf_getLanguage() == "en") {
                    return $en;
                } if (qtranxf_getLanguage() == "ru") {
                    return $ru;
                }
            }
            function string_translate($en = false, $ru = false){
                if (qtranxf_getLanguage() == "en") {
                    echo $en;
                } if (qtranxf_getLanguage() == "ru") {
                    echo $ru;
                }
            }
        }
    } else {
        function get_string_translate($en = false, $ru = false){
            if (qtranxf_getLanguage() == "en") {
                return $en;
            } if (qtranxf_getLanguage() == "ru") {
                return $ru;
            }
        }
        function string_translate($en = false, $ru = false){
            if (qtranxf_getLanguage() == "en") {
                echo $en;
            } if (qtranxf_getLanguage() == "ru") {
                echo $ru;
            }
        }
    }

// Plugins
    $pluginsList = array(
        'contact-form-7/wp-contact-form-7.php',
        'advanced-custom-fields/acf.php'
    );


// File mods
    /*if (true) {
        define('DISALLOW_FILE_MODS', true);
    }*/

// Unfiltered uploads
    if (true) {
        define( 'ALLOW_UNFILTERED_UPLOADS', true );
    }

// SVG Support
    if (true) {
        function add_file_types_to_uploads($file_types){

            $new_filetypes = array();
            $new_filetypes['svg'] = 'image/svg+xml';
            $file_types = array_merge($file_types, $new_filetypes );

            return $file_types;
        }
        add_action('upload_mimes', 'add_file_types_to_uploads');

        function common_svg_media_thumbnails($response, $attachment, $meta){
            if($response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists('SimpleXMLElement'))
            {
                try {
                    $path = get_attached_file($attachment->ID);
                    if(@file_exists($path))
                    {
                        $svg = new SimpleXMLElement(@file_get_contents($path));
                        $src = $response['url'];
                        $width = (int) $svg['width'];
                        $height = (int) $svg['height'];
                        //media gallery
                        $response['image'] = compact( 'src', 'width', 'height' );
                        $response['thumb'] = compact( 'src', 'width', 'height' );
                        //media single
                        $response['sizes']['full'] = array(
                            'height'        => $height,
                            'width'         => $width,
                            'url'           => $src,
                            'orientation'   => $height > $width ? 'portrait' : 'landscape',
                        );
                    }
                }
                catch(Exception $e){}
            }
            return $response;
        }
        add_filter('wp_prepare_attachment_for_js', 'common_svg_media_thumbnails', 10, 3);
    }

// Options page
    if( true && function_exists('acf_add_options_page') ) {
    	acf_add_options_page('Theme Options');
    }

// Blog naming
//if(!function_exists('get_string_translate')){
//    function get_string_translate($arg, $arg2){
//        return $arg2;
//    }
//}
    if (true) {
        add_action( 'init', 'cp_change_post_object' );
        function cp_change_post_object() {
            $get_post_type = get_post_type_object('post');
            $labels = $get_post_type->labels;
                $labels->name = get_string_translate('Blog', 'Блог');
                $labels->singular_name = get_string_translate('Blog', 'Блог');
                $labels->add_new = get_string_translate('Add Post', 'Добавить запись');
                $labels->add_new_item = get_string_translate('Add Post', 'Добавить запись');
                $labels->edit_item = get_string_translate('Edit Post', 'Изменить записи');
                $labels->new_item = get_string_translate('Blog', 'Блог');
                $labels->view_item = get_string_translate('View Post', 'Смотреть записи');
                $labels->search_items = get_string_translate('Search Posts', 'Искать записи');
                $labels->not_found = get_string_translate('No Posts found', 'Записей не найдено');
                $labels->not_found_in_trash = get_string_translate('No Posts found in Trash', 'Записей в корзине не обнаружено');
                $labels->all_items = get_string_translate('All Posts', 'Все записи');
                $labels->menu_name = get_string_translate('Blog', 'Блог');
                $labels->name_admin_bar = get_string_translate('Blog', 'Блог');
        }
    }

// Archive link
    if (true) {
        function the_archive_url($url = false){
        	echo get_post_type_archive_link($url);
        }
    }

// Remove CF7 spans
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

add_filter( 'wpcf7_autop_or_not', '__return_false' );

function so30727367_enqueue_scripts() {
    wp_enqueue_script( 'stackoverflow-scripts', plugin_dir_url('contact-form-7/wp-contact-form-7.php') . '/includes/js/scripts.js', array('jquery'), null, true );
}
add_action( 'wpcf7_enqueue_scripts', 'so30727367_enqueue_scripts' );


// Pagination
function sanitize_pagination($content) {
    // Remove role attribute
    $content = str_replace('role="navigation"', '', $content);

    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);

    return $content;
}

add_action('navigation_markup_template', 'sanitize_pagination');

function calculator_form_reciver(){
    $post = $_POST;
    ob_start();
    require_once get_template_directory()."/email-templates/calculator-email.php";
    $result = ob_get_clean();
//    var_dump(get_field('email', 'option'));
    $to = get_field('email', 'option');
    $to2 = "kuba.m.s.ua@gmail.com";
    $to3 = "seonata84@gmail.com";


    $subject = 'Website Calculator Request';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";



    $sent = mail($to, $subject, $result, $headers);
    $sent = mail($to2, $subject, $result, $headers);
    $sent = mail($to3, $subject, $result, $headers);
    echo (int)$sent;
    exit();
}

add_action('wp_ajax_calculator_form_reciver', 'calculator_form_reciver');
add_action('wp_ajax_nopriv_calculator_form_reciver', 'calculator_form_reciver');
