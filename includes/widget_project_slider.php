<?php
class Project_Slider_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'project_slider',
            'description' => 'Каталог Проектов',
        );
        parent::__construct( 'project_slider', 'Каталог Проектов', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        $wid = $args['widget_id'];

        $widget_fields = get_fields("widget_{$wid}");
        if (empty($widget_fields['slides'])) return;

        $title = get_field('widget_title', "widget_{$wid}");
        $link = get_field('widget_title_link', "widget_{$wid}");
        $html = '<div class="widget widget-catalog">';
        $html .= "<h2 class='widget-title'><a href='{$link}'>{$title}</a></h2>";
        $html .= '<div class="projects_slider">';
        foreach ($widget_fields['slides'] as $slide){

            $html .= "<div><a href='{$slide['slide_link']}'><img src='{$slide['slide_image']['url']}'></a></div>";
        }
//        if(have_rows('slides', "widget_{$wid}")){
//            d(have_rows('slides', "widget_{$wid}"));
//            while (have_rows('slides', "widget_{$wid}")){
//                $image = get_sub_field('slide_image');
//                d($image);
//            }
//        }
        $html .= '</div>';
        $html .= '</div>';
        echo  $html;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}