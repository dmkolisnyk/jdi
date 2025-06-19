<?php

function register_acf_blocks() {

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'services',
            'title'             => __('Services Section'),
            'description'       => __('A custom block created with ACF.'),
            'render_template'   => 'template-parts/blocks/services-block/services-block.php',
            'category'          => 'formatting',
            'icon'              => 'smiley',
            'keywords'          => array('service', 'services', 'custom'),
            'supports'          => array('align' => false),
        ));

        acf_register_block_type(array(
            'name'              => 'reviews',
            'title'             => __('Reviews Section'),
            'description'       => __('A custom block created with ACF.'),
            'render_template'   => 'template-parts/blocks/reviews-block/reviews-block.php',
            'category'          => 'formatting',
            'icon'              => 'smiley',
            'keywords'          => array('service', 'services', 'custom'),
            'supports'          => array('align' => false),
        ));

        acf_register_block_type(array(
            'name'              => 'cform',
            'title'             => __('Contact Section'),
            'description'       => __('A custom block created with ACF.'),
            'render_template'   => 'template-parts/blocks/cform-block/cform-block.php',
            'category'          => 'formatting',
            'icon'              => 'smiley',
            'keywords'          => array('service', 'services', 'custom'),
            'supports'          => array('align' => false),
        ));

    }

}

add_action('acf/init', 'register_acf_blocks');

