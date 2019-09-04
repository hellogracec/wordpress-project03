<?php
/**
 * Date Picker Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// ** Show birthday_date_picker ACF
if (function_exists('get_field')) :
    if (get_field('birthday_date_picker')) :
        echo "<p><strong>Birthday: </strong>";
        the_field('birthday_date_picker');
        echo "</p>";
    endif;
endif;
?>