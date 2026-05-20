<?php
/*
Plugin Name: ML Camper Power Calculator
Description: Berechnet Stromverbrauch und Batterie-Laufzeit für Camper.
Version: 1.0
Author: Viet Trinh, Arash Dadkhah
Company: ML Freizeitshop
*/

if (!defined('ABSPATH')) exit;

// Script laden
function cpc_enqueue_scripts() {
    wp_enqueue_script(
        'cpc-script',
        plugin_dir_url(__FILE__) . 'assets/script.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'cpc_enqueue_scripts');

// Shortcode
function cpc_render_calculator() {
    ob_start();
    ?>

    <div id="cpc-calculator">
        <h3>Stromverbrauch Rechner</h3>

        <label>Gerät (Watt):</label>
        <input type="number" id="cpc-watts" placeholder="z.B. 50">

        <label>Nutzungsdauer (Stunden/Tag):</label>
        <input type="number" id="cpc-hours" placeholder="z.B. 5">

        <label>Batterie (Ah):</label>
        <input type="number" id="cpc-battery" placeholder="z.B. 100">

        <button onclick="cpcCalculate()">Berechnen</button>

        <div id="cpc-result"></div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('camper_power_calculator', 'cpc_render_calculator');
