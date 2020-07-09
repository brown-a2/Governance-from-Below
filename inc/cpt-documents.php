<?php

/**
 * GovFromBelow custom post type 'Document'
 *
 * @package govfrombelow
 */

/**
*
* Register the Document custom post type
*
* */
add_action('init', 'gfb_ctp_document_init');

function gfb_ctp_document_init()
{
    global $documentTaxonomies;

    $labels = [
        'name' => 'Documents',
        'singular_name' => 'Document',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit Document Entry',
        'new_item' => 'New Entry',
        'all_items' => 'View All Documents',
        'view_item' => 'View Entries',
        'search_items' => 'Search Document',
        'not_found' => 'No entries found',
        'not_found_in_trash' => 'No Document entries found in Bin',
        'parent_item_colon' => '',
        'menu_name' => 'Documents'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'documents'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-media-document',
        'supports' => array('title'),
        'taxonomies' => $documentTaxonomies

    ];

    register_post_type('documents', $args);
}

/**
*
* Remove side meta boxes on Document entry admin page - these have been replaced in ACF with ACF fields
*
* */
add_action('do_meta_boxes', 'gfb_remove_plugin_metaboxes_documents');

function gfb_remove_plugin_metaboxes_documents()
{
    global $documentTaxonomies;

    if (count($documentTaxonomies) > 0) {
        remove_meta_box('booksdiv', 'Documents', 'side');
        remove_meta_box('articlesdiv', 'Documents', 'side');
        remove_meta_box('journalismdiv', 'Documents', 'side');
        remove_meta_box('datadiv', 'Documents', 'side');
    }
}
