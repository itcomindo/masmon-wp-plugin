<?php

/**
 *=========================
 *Plugin Name: Masmon
 *Description: A plugin to monitor the status of your website
 *Version: 3.0
 *Author: Masmon
 *Author URI: https://budiharyono.com/
 *License: GPLv2 or later
 *License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *=========================
 */


// include paket-tiktok.php from plugin folder
include_once('paket-tiktok.php');
include_once('testimonials.php');
include_once('featured-card.php');


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'the_option_page_by_masmon');
function the_option_page_by_masmon()
{
    Container::make('theme_options', 'Website Options')
        ->add_fields([
            Field::make('text', 'nomorhp', 'Nomor Hp')
                ->set_help_text('Masukkan nomor hp anda contoh: 0813-9891-2341'),
            Field::make('complex', 'paket_titktok', 'Paket Tiktok')
                ->add_fields('paket_tiktok', [
                    Field::make('checkbox', 'stok_paket', 'Paket Available')
                        ->set_option_value('yes')
                        ->set_default_value('yes')
                        ->set_help_text('Uncheck jika paket tidak tersedia'),
                    Field::make('text', 'nama_paket', 'Nama Paket'),
                    Field::make('text', 'harga_paket', 'Harga Paket'),
                    Field::make('rich_text', 'deskripsi_paket', 'Deskripsi Paket'),
                ]),
            Field::make('complex', 'testimonials', 'Testimonials')
                ->add_fields('testimonial', [
                    Field::make('image', 'photo_testimonial', 'Testimonial Photo')
                        ->set_value_type('url'),
                ]),
            Field::make('complex', 'fiturcard', 'Features Card')
                ->add_fields('fiturcard', [
                    Field::make('text', 'fiturcardhead', 'Fitur Card Head'),
                    Field::make('rich_text', 'fiturcardcontent', 'Fitur Card content'),
                ]),
        ]);
}

function masmon_load_scripts()
{
    wp_enqueue_style('masmon-style', plugin_dir_url(__FILE__) . 'masmon.css');
    wp_enqueue_style('testimonials-style', plugin_dir_url(__FILE__) . 'testimonials.css');
    wp_enqueue_style('featured-card-style', plugin_dir_url(__FILE__) . 'featured-card.css');
    // call flickity css from cdn
    wp_enqueue_style('flickity-css', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css', array(), '2.2.2', 'all');
    // call flickity js from cdn
    wp_enqueue_script('flickity-js', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js', array('jq'), '2.2.2', true);

    wp_enqueue_script('masmon-script', plugin_dir_url(__FILE__) . 'masmon.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'masmon_load_scripts');


/**
 *=========================
 *NAME: NomorHp
 *=========================
 */

function masmon_nomorhp()
{
    $nomorhp = carbon_get_theme_option('nomorhp');
    return $nomorhp;
}

/**
 *=========================
 *NAME: Nomor Whatsapp
 * replace first 0 with 62 and remove dash
 *=========================
 */
function masmon_nomorwa()
{
    $nomorhp = masmon_nomorhp();
    $nomorwa = str_replace('-', '', $nomorhp);
    // replace the first 0 with 62
    $nomorwa = preg_replace('/^0/', '62', $nomorwa);
    return $nomorwa;
}




/**
 *=========================
 *NAME: tombol paket tiktok
 *=========================
 */
function masmon_paket_btn_call()
{
    $nomorwa = masmon_nomorwa();
    $btncall = '<div data-phone="' . $nomorwa . '" class="callbg paketbtn paketcallbtn globalbtn">Call</div>';
    return $btncall;
}


function masmon_paket_btn_wa()
{
    $nomorwa = masmon_nomorwa();
    $btncall = '<div data-wa="' . $nomorwa . '" class="wabg paketbtn paketwabtn globalbtn">Chat</div>';
    return $btncall;
}
