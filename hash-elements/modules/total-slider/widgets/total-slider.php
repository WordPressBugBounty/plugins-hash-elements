<?php

namespace HashElements\Modules\TotalSlider\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TotalSlider extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'total-slider';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Slider', 'hash-elements');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-post-slider';
    }

    /** Category */
    public function get_categories() {
        return ['he-total-elements'];
    }

    /** Controls */
    protected function register_controls() {

        $this->start_controls_section(
            'slider', [
                'label' => esc_html__('Slider', 'hash-elements'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'slider_image', [
                'label' => esc_html__('Choose Image', 'hash-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'slider_title', [
                'label' => esc_html__('Title', 'hash-elements'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_description', [
                'label' => esc_html__('Description', 'hash-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your description here', 'hash-elements'),
            ]
        );

        $repeater->add_control(
            'button_text', [
                'label' => esc_html__('Button Text', 'hash-elements'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Read More', 'hash-elements'),
            ]
        );

        $repeater->add_control(
            'button_link', [
                'label' => esc_html__('Button Link', 'hash-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter URL', 'hash-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'slider_block', [
                'label' => esc_html__('Sliders', 'hash-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_title' => esc_html__('Slider #1', 'hash-elements'),
                    ]
                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'carousel_section', [
                'label' => esc_html__('Carousel Settings', 'hash-elements'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'autoplay', [
                'label' => esc_html__('Autoplay', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'hash-elements'),
                'label_off' => esc_html__('No', 'hash-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'pause_duration', [
                'label' => esc_html__('Pause Duration', 'hash-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s'],
                'range' => [
                    's' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 5,
                ],
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'nav', [
                'label' => esc_html__('Nav Arrow', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'hash-elements'),
                'label_off' => esc_html__('Hide', 'hash-elements'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'dots', [
                'label' => esc_html__('Nav Dots', 'hash-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'hash-elements'),
                'label_off' => esc_html__('Hide', 'hash-elements'),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style', [
                'label' => esc_html__('Title', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .het-slide-cap-title',
            ]
        );

        $this->add_control(
            'title_bg_color', [
                'label' => esc_html__('Background Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#009dea',
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-title span' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => esc_html__('Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'description_style', [
                'label' => esc_html__('Description', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'description_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .het-slide-cap-desc ',
            ]
        );

        $this->add_control(
            'description_color', [
                'label' => esc_html__('Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-desc ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style', [
                'label' => esc_html__('Button', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'button_typography',
                'label' => esc_html__('Typography', 'hash-elements'),
                'selector' => '{{WRAPPER}} .het-slide-cap-button a',
            ]
        );

        $this->add_control(
            'button_padding', [
                'label' => esc_html__('Padding', 'hash-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'button_style_tabs'
        );

        $this->start_controls_tab(
            'button_normal_tab', [
                'label' => esc_html__('Normal', 'hash-elements'),
            ]
        );

        $this->add_control(
            'button_bg_color', [
                'label' => esc_html__('Background Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-button a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color', [
                'label' => esc_html__('Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-button a' => 'color: {{VALUE}}',
                ],
                'default' => '#333333',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab', [
                'label' => esc_html__('Hover', 'hash-elements'),
            ]
        );

        $this->add_control(
            'button_bg_hover_color', [
                'label' => esc_html__('Background Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-button a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color', [
                'label' => esc_html__('Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-slide-cap-button a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'navigation_style', [
                'label' => esc_html__('Navigation', 'hash-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'nav_style_tabs'
        );

        $this->start_controls_tab(
            'nav_normal_tab', [
                'label' => esc_html__('Normal', 'hash-elements'),
            ]
        );

        $this->add_control(
            'nav_normal_bg_color', [
                'label' => esc_html__('Navigation Background Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider.owl-carousel .owl-nav button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_normal_icon_color', [
                'label' => esc_html__('Navigation Icon Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider .owl-nav [class*=owl-]:before, .het-bx-slider .owl-nav [class*=owl-]:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'dot_color', [
                'label' => esc_html__('Dots Color', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider .owl-dots .owl-dot' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .het-bx-slider .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nav_hover_tab', [
                'label' => esc_html__('Hover', 'hash-elements'),
            ]
        );

        $this->add_control(
            'nav_hover_bg_color', [
                'label' => esc_html__('Navigation Background Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider.owl-carousel .owl-nav button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_icon_color', [
                'label' => esc_html__('Navigation Icon Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider .owl-nav [class*=owl-]:hover:before, .het-bx-slider .owl-nav [class*=owl-]:hover:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'dot_bg_color_hover', [
                'label' => esc_html__('Dots Color (Hover)', 'hash-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .het-bx-slider .owl-dots .owl-dot:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $sliders = $settings['slider_block'];
        $params = array(
            'autoplay' => $settings['autoplay'] == 'yes' ? true : false,
            'pause' => (int) $settings['pause_duration']['size'] * 1000,
            'nav' => $settings['nav'] == 'yes' ? true : false,
            'dots' => $settings['dots'] == 'yes' ? true : false
        );
        $params = json_encode($params);
        ?>
        <div class="het-bx-slider owl-carousel" data-params='<?php echo $params ?>'>
            <?php
            foreach ($sliders as $key => $slider) {
                ?>
                <div class="het-slide">
                    <div class="het-slide-overlay"></div>

                    <img class="no-lazyload" src="<?php echo esc_url($slider['slider_image']['url']); ?>" alt="<?php echo esc_attr($slider['slider_title']); ?>">

                    <div class="het-slide-caption">

                        <?php if (!empty($slider['slider_title'])) { ?>
                            <div class="het-slide-cap-title">
                                <span><?php echo esc_html($slider['slider_title']); ?></span>
                            </div>
                        <?php } ?>

                        <?php if (!empty($slider['slider_description'])) { ?>
                            <div class="het-slide-cap-desc">
                                <?php echo esc_html($slider['slider_description']); ?>
                            </div>
                        <?php } ?>

                        <?php
                        if (!empty($slider['button_link']['url'])) {
                            $target = $slider['button_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $slider['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
                            <div class="het-slide-cap-button">
                                <a href="<?php echo esc_url($slider['button_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($slider['button_text']); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

}
