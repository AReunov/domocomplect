<?php
include_once('includes/widget_project_slider.php');

$timber = new Timber\Timber();
Timber::$dirname = array('templates');
Timber::$autoescape = false;

class DomoSite extends Timber\Site
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('wp_enqueue_scripts', [$this, 'register_theme_assets']);
        add_filter('timber/context', [$this, 'add_to_context']);
        add_filter('timber/twig', [$this, 'add_to_twig']);
        add_filter('intermediate_image_sizes', [$this, 'tweak_image_sizes']);
        add_filter('acp/storage/file/directory', [$this, 'register_acp_sync_folder']);
        add_filter('acp/storage/file/directory/migrate', '__return_true');
        add_filter('acf/init', [$this,'update_gmas_key']);
        add_action('init', [$this, 'register_post_types']);
        add_action('widgets_init', [$this, 'register_theme_widgets']);
        add_action('customize_register', [$this, 'register_theme_customizations']);
        add_action('customize_preview_init', [$this, 'register_customizer_script']);
        add_action( 'wp_ajax_klever_ajax_load_more', [$this, 'klever_ajax_load_more'] );
        add_action( 'wp_ajax_nopriv_klever_ajax_load_more', [$this, 'klever_ajax_load_more']);
//        add_action('init', [$this, 'register_theme_shortcodes']);
        parent::__construct();
    }

//    public function shortcode_swipe_icon($atts, $content = null){
//        return '<svg class="graph-swipe-icon" width="84px" height="104px" viewBox="0 0 84 104" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
//			<g id="NEW" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
//				<g id="swipe" fill-rule="nonzero">
//					<path d="M81.3979681,39.0966618 C81.3979681,38.7761974 81.3979681,38.4557329 81.3979681,38.2955007 C81.3979681,38.4557329 81.3979681,38.7761974 81.3979681,38.9364296 C81.3979681,39.4171263 81.3979681,40.0580552 81.5582003,40.5387518 C81.3979681,40.0580552 81.3979681,39.5773585 81.3979681,39.0966618 Z" id="Path" fill="#C4D82E"></path>
//					<path d="M74.6682148,40.0580552 C72.9056604,40.0580552 71.3033382,40.5387518 70.0214804,41.3399129 C68.5793904,38.2955007 65.5349782,36.2124819 62.0098694,36.2124819 C60.2473149,36.2124819 58.6449927,36.6931785 57.363135,37.4943396 C55.921045,34.4499274 52.8766328,32.3669086 49.3515239,32.3669086 C48.0696662,32.3669086 46.6275762,32.687373 45.5059507,33.1680697 L45.5059507,9.13323657 C45.5059507,4.16603774 41.5001451,0.320464441 36.6931785,0.320464441 C31.8862119,0.320464441 27.8804064,4.32626996 27.8804064,9.13323657 L27.8804064,49.1912917 L25.1564586,43.583164 C23.8746009,40.2182874 20.5097242,37.8148041 16.8243832,37.8148041 C15.8629898,37.8148041 14.7413643,37.9750363 13.779971,38.2955007 C11.5367199,39.0966618 9.77416546,40.698984 8.81277213,42.9422351 C7.85137881,45.025254 7.69114659,47.4287373 8.49230769,49.6719884 C8.49230769,49.6719884 8.49230769,49.8322206 8.65253991,49.8322206 L27.0792453,88.9288824 C27.0792453,89.0891147 27.2394775,89.0891147 27.2394775,89.2493469 C29.1622642,92.1335269 31.4055152,94.6972424 34.129463,96.9404935 C34.2896952,97.1007257 34.4499274,97.1007257 34.6101597,97.2609579 L34.6101597,97.2609579 C34.7703919,97.4211901 34.7703919,97.4211901 34.9306241,97.5814224 C40.2182874,101.426996 46.467344,103.510015 53.036865,103.510015 C69.3805515,103.510015 82.8400581,90.6914369 83.4809869,74.5079826 C83.4809869,74.5079826 83.4809869,74.3477504 83.4809869,74.1875181 C83.4809869,73.7068215 83.4809869,73.2261248 83.4809869,72.7454282 C83.4809869,72.5851959 83.4809869,72.5851959 83.4809869,72.4249637 L83.4809869,72.1044993 C83.4809869,71.7840348 83.4809869,71.6238026 83.4809869,71.3033382 L83.4809869,48.8708273 C83.6412192,44.0638607 79.6354136,40.0580552 74.6682148,40.0580552 Z M53.036865,98.5428157 C47.5889695,98.5428157 42.4615385,96.9404935 38.1352685,93.7358491 L37.8148041,93.4153846 C37.4943396,93.0949202 37.1738752,92.934688 36.8534107,92.7744557 C34.7703919,91.0119013 33.0078374,89.0891147 31.5657475,86.8458636 L13.2992743,48.0696662 C12.9788099,47.1082729 12.9788099,46.1468795 13.4595065,45.1854862 C13.9402032,44.2240929 14.5811321,43.583164 15.5425254,43.2626996 C17.465312,42.6217707 19.7085631,43.583164 20.349492,45.5059507 C20.349492,45.5059507 20.349492,45.6661829 20.5097242,45.6661829 L28.0406386,61.6894049 C28.5213353,62.8110305 29.803193,63.2917271 30.9248186,63.1314949 C32.0464441,62.8110305 32.8476052,61.8496372 32.8476052,60.7280116 L32.8476052,9.13323657 C32.8476052,7.05021771 34.6101597,5.28766328 36.6931785,5.28766328 C38.7761974,5.28766328 40.5387518,7.05021771 40.5387518,9.13323657 L40.5387518,41.1796807 C40.5387518,42.6217707 41.6603774,43.7433962 43.1024673,43.7433962 C44.5445573,43.7433962 45.6661829,42.6217707 45.6661829,41.1796807 C45.6661829,39.0966618 47.4287373,37.3341074 49.5117562,37.3341074 C51.594775,37.3341074 53.3573295,39.0966618 53.3573295,41.1796807 L53.3573295,45.025254 C53.3573295,46.467344 54.478955,47.5889695 55.921045,47.5889695 C57.363135,47.5889695 58.4847605,46.467344 58.4847605,45.025254 C58.4847605,42.9422351 60.2473149,41.1796807 62.3303338,41.1796807 C64.4133527,41.1796807 66.1759071,42.9422351 66.1759071,45.025254 L66.1759071,48.8708273 C66.1759071,50.3129173 67.2975327,51.4345428 68.7396226,51.4345428 C70.1817126,51.4345428 71.3033382,50.3129173 71.3033382,48.8708273 C71.3033382,46.7878084 73.0658926,45.025254 75.1489115,45.025254 C77.2319303,45.025254 78.9944848,46.7878084 78.9944848,48.8708273 L78.9944848,71.7840348 L78.9944848,72.4249637 C78.9944848,72.7454282 78.9944848,72.9056604 78.9944848,73.2261248 C78.9944848,73.7068215 78.9944848,74.0272859 78.9944848,74.5079826 C77.712627,87.9674891 66.6566038,98.5428157 53.036865,98.5428157 Z" id="Shape" fill="#EA6223"></path>
//					<path d="M21.9518142,10.2548621 L9.2934688,10.2548621 L12.1776488,7.37068215 C13.1390421,6.40928882 13.1390421,4.80696662 12.1776488,3.84557329 C11.2162554,2.88417997 9.61393324,2.88417997 8.65253991,3.84557329 L1.44208999,11.0560232 L1.44208999,11.0560232 C1.12162554,11.3764877 0.961393324,11.5367199 0.961393324,11.8571843 C0.640928882,12.4981132 0.640928882,13.1390421 0.961393324,13.779971 C1.12162554,14.1004354 1.28185776,14.4208999 1.44208999,14.5811321 L1.44208999,14.5811321 L8.65253991,21.791582 C9.13323657,22.2722787 9.77416546,22.5927431 10.4150943,22.5927431 C11.0560232,22.5927431 11.6969521,22.2722787 12.1776488,21.791582 C13.1390421,20.8301887 13.1390421,19.2278665 12.1776488,18.2664731 L9.2934688,15.3822932 L21.9518142,15.3822932 C23.3939042,15.3822932 24.5155298,14.2606676 24.5155298,12.8185776 C24.5155298,11.3764877 23.3939042,10.2548621 21.9518142,10.2548621 Z" id="Path" fill="#EA6223"></path>
//					<path d="M72.5851959,11.8571843 C72.4249637,11.5367199 72.2647315,11.2162554 72.1044993,11.0560232 L72.1044993,11.0560232 C72.2647315,11.2162554 72.4249637,11.5367199 72.5851959,11.8571843 Z" id="Path" fill="#C4D82E"></path>
//					<path d="M71.9442671,14.5811321 C72.1044993,14.4208999 72.4249637,14.1004354 72.4249637,13.779971 C72.4249637,14.1004354 72.2647315,14.2606676 71.9442671,14.5811321 L71.9442671,14.5811321 Z" id="Path" fill="#C4D82E"></path>
//					<path d="M72.5851959,11.8571843 C72.4249637,11.5367199 72.2647315,11.2162554 72.1044993,11.0560232 L72.1044993,11.0560232 L64.8940493,3.84557329 C63.932656,2.88417997 62.3303338,2.88417997 61.3689405,3.84557329 C60.4075472,4.80696662 60.4075472,6.40928882 61.3689405,7.37068215 L64.2531205,10.2548621 L51.594775,10.2548621 C50.1526851,10.2548621 49.0310595,11.3764877 49.0310595,12.8185776 C49.0310595,14.2606676 50.1526851,15.3822932 51.594775,15.3822932 L64.0928882,15.3822932 L61.2087083,18.2664731 C60.2473149,19.2278665 60.2473149,20.8301887 61.2087083,21.791582 C61.6894049,22.2722787 62.3303338,22.5927431 62.9712627,22.5927431 C63.6121916,22.5927431 64.2531205,22.2722787 64.7338171,21.791582 L71.9442671,14.5811321 L71.9442671,14.5811321 C72.2647315,14.2606676 72.4249637,14.1004354 72.4249637,13.779971 C72.7454282,13.1390421 72.7454282,12.4981132 72.5851959,11.8571843 Z" id="Path" fill="#EA6223"></path>
//				</g>
//			</g>
//		</svg>';
//    }
//
//    public function register_theme_shortcodes(){
//        add_shortcode('swipe_icon', 'shortcode_swipe_icon');
//    }

    public function theme_supports()
    {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support( 'widgets' );
        add_theme_support( 'custom-logo', [
            'width' => 101,
            'height' => 133,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        ] );
        register_nav_menu( 'primary', 'Главное меню' );

        add_editor_style( 'css/editor-styles.css' );


    }

    public function update_gmas_key (){
        acf_update_setting('google_api_key', 'AIzaSyAQIRJUNUrEX025DkhbXJB1oQMLaJAhcXQ');
    }

    public function tweak_image_sizes($sizes)
    {
        unset($sizes['thumbnail']);
        unset($sizes['medium']);
        unset($sizes['large']);
        return $sizes;
    }

    public function register_theme_widgets(){
        register_sidebar( array(
            'name'          => 'Footer widgets',
            'id'            => "footer_sidebar",
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => "</h2>\n",
        ) );
        register_sidebar( array(
            'name'          => 'Left column',
            'id'            => "aside_sidebar",
            'description'   => 'Left column',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => "</h2>\n",
        ) );
        register_widget( 'Project_Slider_Widget' );
    }

    public function register_theme_assets()
    {
        global $wp_query;
        wp_enqueue_style('slick', get_template_directory_uri(). '/css/slick.css');
        wp_enqueue_style('slick-theme', get_template_directory_uri(). '/css/slick-theme.css');
        wp_enqueue_style('fancybox', get_template_directory_uri(). '/css/jquery.fancybox.min.css');



        wp_enqueue_script('slick', get_template_directory_uri(). '/js/slick.min.js', ['jquery']);
        wp_enqueue_script('fancybox', get_template_directory_uri(). '/js/jquery.fancybox.min.js', ['jquery']);
        wp_enqueue_script('maskedinput', get_template_directory_uri(). '/js/jquery.maskedinput.min.js', ['jquery']);
        wp_enqueue_script('theme', get_template_directory_uri(). '/js/theme.js', ['jquery', 'maskedinput', 'masonry']);

        wp_localize_script( 'theme', 'app_vars', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'site_url' => home_url(),
            'query' => $wp_query->query,
        ]  );
    }


    public function klever_ajax_load_more(){
        $args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
        $args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
        $args['paged'] = esc_attr( $_POST['page'] );
        $args['post_status'] = 'publish';

        ob_start();
        $posts = Timber::get_posts( $args );
        Timber::render( 'articles.twig', array( 'posts' => $posts ) );
        wp_reset_postdata();
        $data = ob_get_clean();
        wp_send_json_success( $data );
        wp_die();
    }


    public function add_to_twig($twig){
        $twig->addFilter( new Timber\Twig_Filter( 'd', 'd' ) );
        $twig->addFilter(new Timber\Twig_Filter('strip_oembed_url', function ($url) {
            return wp_oembed_get($url);
        }));
        return $twig;
    }

    public function add_to_context($context)
    {
        $bottom_contact_form_id = '';
        if(is_category()){
            $term = get_queried_object();
            $bottom_contact_form_id = get_field('bottom_contact_form', $term);
        }
        if(is_page() || is_single()){
            $bottom_contact_form_id = get_field('bottom_contact_form');
        }

        $context['site']   = $this;
        $context['header_phone_number'] = get_option('header_phone_number');
        $context['header_facebook_link'] = get_option('header_facebook_link');
        $context['footer_sidebar'] = Timber::get_widgets('footer_sidebar');
        $context['left_sidebar'] = Timber::get_widgets('aside_sidebar');
        if($bottom_contact_form_id){
            $context['bottom_contact_form'] = do_shortcode("[contact-form-7 id='{$bottom_contact_form_id}']");
        }
        $context['menu']  = new Timber\Menu('primary');

        return $context;
    }
    public function register_post_types()
    {

    }

    public function register_theme_customizations(WP_Customize_Manager $wp_customize)
    {
        $transport = 'postMessage';

        $wp_customize->add_section('site_header_section', [
            'title'=>'Шапка сайта',
            'priority'=>10,
        ]);

        $wp_customize->add_setting('header_facebook_link',[
            'type' => 'option',
            'default' => 'https://facebook.com/domocomplect',
            'transport' => $transport
        ]);
        $wp_customize->add_control('header_facebook_link',
            [
                'label' => 'Ссылка на FB страницу',
                'type' => 'text',
                'section' => 'site_header_section',
                'description' => 'Ссылка на страницу проекта на FB"'
            ]
        );

        $wp_customize->selective_refresh->add_partial( 'header_facebook_link', [
            'selector' => '#header_facebook_link',
            'render_callback' => 'customize_partial_header_facebook_link',
        ]);
       $wp_customize->add_setting('header_phone_link',[
            'type' => 'option',
            'default' => 'tel://0800336165',
            'transport' => $transport
        ]);
        $wp_customize->add_control('header_phone_link',
            [
                'label' => 'Ссылка на звонок',
                'type' => 'text',
                'section' => 'site_header_section',
                'description' => 'Ссылка на звонок"'
            ]
        );

        $wp_customize->selective_refresh->add_partial( 'header_facebook_link', [
            'selector' => '#header_facebook_link',
            'render_callback' => 'customize_partial_header_facebook_link',
        ]);

        $wp_customize->selective_refresh->add_partial( 'header_phone_link', [
            'selector' => '#header_phone_link',
            'render_callback' => 'customize_partial_header_phone_link',
        ]);


    }

    public function customize_partial_header_phone_link(){
        echo get_option('header_phone_link');
    }
    public function customize_partial_header_facebook_link(){
        echo get_option('header_facebook_link');
    }

    public function customize_partial_header_phones(){
        echo get_option('header_phone_number');
    }

    public function register_customizer_script(){
        wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', [ 'jquery', 'customize-preview' ], null, true );
    }

    public function register_acp_sync_folder(){
        return get_stylesheet_directory() . '/admin-columns';
    }

}

new DomoSite();