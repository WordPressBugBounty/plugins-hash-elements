<?php

namespace HashElements\Modules\NewsModuleTwelve\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use HashElements\Group_Control_Query;
use HashElements\Group_Control_Header;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class NewsModuleTwelve extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'he-news-module-twelve';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('News Module 12', 'hash-elements');
    }

    /** Icon */
    public function get_icon() {
        return 'he-news-module-twelve he-news-modules';
    }

    /** Category */
    public function get_categories() {
        return ['he-magazine-elements'];
    }

    /** Controls */
    protected function register_controls() {

        $this->start_controls_section(
            'header', [
                'label' => esc_html__('Header', 'hash-elements'),
            ]
        );

        $this->add_group_control(
            Group_Control_Header::get_type(), [
                'name' => 'header',
                'label' => esc_html__('Header', 'hash-elements'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_query', [
                'label' => esc_html__('Content Filter', 'hash-elements'),
            ]
        );

        $this->add_group_control(
            Group_Control_Query::get_type(), [
                'name' => 'posts',
                'label' => esc_html__('Posts', 'hash-elements'),
            ]
        );

        $this->add_control(
            'post_number', [
                'label' => esc_html__('No of Posts', 'hash-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 4,
                        'max' => 16,
                        'step' => 2
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 8,
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_post_block', [
                'label' => esc_html__('Post Block', 'hash-elements'),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(), [
                'name' => 'post_image',
                'exclude' => ['custom'],
                'include' => [],
                'default' => 'large',
            ]
        );

        $this->add_control(
            'post_thumb_width', [
                'label' => esc_html__('Image Width(px)', 'hash-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 300,
                        'step' => 1
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .he-double-small-block .he-post-thumb' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}' => '--he-image-width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'post_thumb_height', [
                'label' => esc_html__('Image Height(%)', 'hash-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 30,
                        'max' => 150,
                        'step' => 1
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .he-double-small-block .he-thumb-container' => 'padding-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'post_author', [
                'label' => esc_html__('Show Post Author', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'hash-elements'),
                'label_off' => esc_html__('No', 'hash-elements'),
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'post_date', [
                'label' => esc_html__('Show Post Date', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__('Yes', 'hash-elements'),
                'label_off' => esc_html__('No', 'hash-elements'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'post_comment', [
                'label' => esc_html__('Show Post Comments', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'hash-elements'),
                'label_off' => esc_html__('No', 'hash-elements'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'post_category', [
                'label' => esc_html__('Show Category', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'hash-elements'),
                'label_off' => esc_html__('No', 'hash-elements'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'additional_settings', [
                'label' => esc_html__('Additional Settings', 'hash-elements'),
            ]
        );

        $this->add_control(
            'image_border_radius', [
                'label' => esc_html__('Image Border Radius(px)', 'hash-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .he-post-thumb' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'date_format', [
                'label' => esc_html__('Date Format', 'hash-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'relative_format' => esc_html__('Relative Format (Ago)', 'hash-elements'),
                    'default' => esc_html__('WordPress Default Format', 'hash-elements'),
                    'custom' => esc_html__('Custom Format', 'hash-elements'),
                ],
                'default' => 'default',
                'separator' => 'before',
                'label_block' => true
            ]
        );

        $this->add_control(
            'custom_date_format', [
                'label' => esc_html__('Custom Date Format', 'hash-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'F j, Y',
                'placeholder' => esc_html__('F j, Y', 'hash-elements'),
                'condition' => [
                    'date_format' => 'custom'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'header_title_style', [
                'label' => esc_html__('Header Title', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'header_color', [
                'label' => esc_html__('Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-block-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'header_short_border_color', [
                'label' => esc_html__('Short Border Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-title-style3.he-block-title' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .he-title-style2.he-block-title span:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'header_long_border_color', [
                'label' => esc_html__('Long Border Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-title-style3.he-block-title:after, {{WRAPPER}} .he-title-style4.he-block-title:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .he-title-style2.he-block-title' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'header_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .he-block-title'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'category_style', [
                'label' => esc_html__('Category', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'category_normal_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .he-primary-cat,
                            {{WRAPPER}} .he-post-categories li a',
            ]
        );

        $this->start_controls_tabs(
            'category_style_tabs'
        );

        $this->start_controls_tab(
            'category_normal_tab', [
                'label' => esc_html__('Normal', 'hash-elements'),
            ]
        );

        $this->add_control(
            'category_background_color', [
                'label' => esc_html__('Background Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-primary-cat,
                {{WRAPPER}} .he-post-categories li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'category_text_color', [
                'label' => esc_html__('Text Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-primary-cat,
                {{WRAPPER}} .he-post-categories li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'category_hover_tab', [
                'label' => esc_html__('Hover', 'hash-elements'),
            ]
        );

        $this->add_control(
            'category_background_hover_color', [
                'label' => esc_html__('Background Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-primary-cat:hover,
                {{WRAPPER}} .he-post-categories li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'category_text_hover_color', [
                'label' => esc_html__('Text Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-primary-cat:hover,
                {{WRAPPER}} .he-post-categories li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'post_title_style', [
                'label' => esc_html__('Title', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => esc_html__('Title Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-post-content h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color', [
                'label' => esc_html__('Title Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-post-content h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .he-post-content h3',
            ]
        );

        $this->add_control(
            'title_margin', [
                'label' => esc_html__('Margin', 'hash-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => 'vertical',
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .he-post-content h3' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_metas', [
                'label' => esc_html__('Metas', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'post_metas_color', [
                'label' => esc_html__('Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .he-post-meta' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'post_metas_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .he-post-meta'
            ]
        );

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $image_size = $settings['post_image_size'];
        $display_cat = $settings['post_category'];
        ?>
        <div class="he-news-module-twelve">
            <?php $this->render_header(); ?>
            <div class="he-double-small-block">
                <?php
                $args = $this->query_args();
                $query = new \WP_Query($args);
                while ($query->have_posts()):
                    $query->the_post();
                    $index = $query->current_post + 1;
                    ?>
                    <div class="he-post-item he-clearfix">
                        <div class="he-post-thumb he-aligned-block">
                            <a href="<?php the_permalink(); ?>">
                                <div class="he-thumb-container">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                                        ?>
                                        <img alt="<?php echo the_title_attribute() ?>" src="<?php echo esc_url($image[0]) ?>">
                                    <?php }
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class="he-post-content">
                            <?php
                            if ($display_cat == 'yes') {
                                he_get_the_primary_category();
                            }
                            ?>
                            <h3 class="he-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php $this->get_post_meta($index) ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

    /** Render Header */
    protected function render_header() {
        $settings = $this->get_settings();

        $this->add_render_attribute(
            'header_attr', 'class', [
                'he-block-title',
                $settings['header_style']
            ]
        );

        $link_open = $link_close = "";
        $target = $settings['header_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['header_link']['nofollow'] ? ' rel="nofollow"' : '';

        if ($settings['header_link']['url']) {
            $link_open = '<a href="' . esc_url($settings['header_link']['url']) . '"' . $target . $nofollow . '>';
            $link_close = '</a>';
        }

        if ($settings['header_title']) {
            ?>
            <h2 <?php echo $this->get_render_attribute_string('header_attr'); ?>>
                <?php
                echo $link_open;
                echo '<span>';
                echo wp_kses_post($settings['header_title']);
                echo '</span>';
                echo $link_close;
                ?>
            </h2>
            <?php
        }
    }

    /** Query Args */
    protected function query_args() {
        $settings = $this->get_settings();

        $post_type = $args['post_type'] = $settings['posts_post_type'];
        $args['orderby'] = $settings['posts_orderby'];
        $args['order'] = $settings['posts_order'];
        $args['ignore_sticky_posts'] = 1;
        $args['post_status'] = 'publish';
        $args['offset'] = $settings['posts_offset'];
        $args['posts_per_page'] = $settings['post_number']['size'];
        $args['post__not_in'] = $post_type == 'post' ? $settings['posts_exclude_posts'] : [];

        $args['tax_query'] = [];

        $taxonomies = get_object_taxonomies($post_type, 'objects');

        foreach ($taxonomies as $object) {
            $setting_key = 'posts_' . $object->name . '_ids';

            if (!empty($settings[$setting_key])) {
                $args['tax_query'][] = [
                    'taxonomy' => $object->name,
                    'field' => 'term_id',
                    'terms' => $settings[$setting_key],
                ];
            }
        }

        return $args;
    }

    /** Get Post Metas */
    protected function get_post_meta($count) {
        $settings = $this->get_settings_for_display();
        $post_author = $settings['post_author'];
        $post_date = $settings['post_date'];
        $post_comment = $settings['post_comment'];

        if ($post_author == 'yes' || $post_date == 'yes' || $post_comment == 'yes') {
            ?>
            <div class="he-post-meta">
                <?php
                if ($post_author == 'yes') {
                    hash_elements_author_name();
                }

                if ($post_date == 'yes') {
                    $date_format = $settings['date_format'];

                    if ($date_format == 'relative_format') {
                        hash_elements_time_ago();
                    } else if ($date_format == 'default') {
                        hash_elements_post_date();
                    } else if ($date_format == 'custom') {
                        $format = $settings['custom_date_format'];
                        hash_elements_post_date($format);
                    }
                }

                if ($post_comment == 'yes') {
                    hash_elements_comment_count();
                }
                ?>
            </div>
            <?php
        }
    }

}
