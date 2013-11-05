<?php
/**
 * Themes shortcode options go here
 *
 * @package Swatch
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2013 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.3.4
 */


return array(
    'title' => __('Section Background options', 'swatch-admin-td'),
    'fields' => array(
        array(
            'name'    => __('Section Background Image', 'swatch-admin-td'),
            'id'      => 'background',
            'type'    => 'text',
            'default' => '',
            'desc'    => __('Add a background to the section', 'swatch-admin-td'),
        ),
        array(
            'name'      => __('Opacity', 'swatch-admin-td'),
            'desc'      => __('Set the opacity of the image', 'swatch-admin-td'),
            'id'        => 'opacity',
            'type'      => 'slider',
            'default'   => 0.2,
            'attr'      => array(
                'max'       => 0.9,
                'min'       => 0.1,
                'step'      => 0.1,
            )
        ),
        array(
            'name'    => __('Background Size', 'swatch-admin-td'),
            'desc'    => __('Choose the image size', 'swatch-admin-td'),
            'id'      => 'size',
            'type'    => 'radio',
            'options' => array(
                'cover' => __('Cover', 'swatch-admin-td'),
                'auto'  => __('Auto', 'swatch-admin-td'),
            ),
            'default' => 'cover',
        ),
        array(
            'name'    => __('Background Repeat', 'swatch-admin-td'),
            'id'      => 'repeat',
            'type'    => 'select',
            'default' => 'no-repeat',
            'options' => array(
                'no-repeat' => __('No repeat', 'swatch-admin-td'),
                'repeat-x'  => __('Repeat horizontally', 'swatch-admin-td'),
                'repeat-y'  => __('Repeat vertically', 'swatch-admin-td'),
                'repeat'    => __('Repeat horizontally and vertically', 'swatch-admin-td')
            ),
            'desc'    => __('Set if/how the image will be repeated', 'swatch-admin-td'),
        ),
    ),
);