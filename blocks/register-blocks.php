<?php 

// ** ACF REGISTER BLOCK TYPE
function pjt_register_blocks() {
    // Check ACF installed, activated, and version 5.8 or higher
    if ( function_exists( 'acf_register_block_type' ) ) {
        // Register an accordion block
        acf_register_block_type(
            array(
                'name'              => 'date-picker',
                'title'             => __( 'Date Picker' ),
                'description'       => __( 'A custom date picker block.' ),
                'category'          => 'formatting',
                'icon'              => 'editor-justify',
                'keywords'          => array( 'date-picker' ),
                'render_template'   => 'blocks/date-picker/date-picker.php',
            )
        );
    }
}
add_action( 'acf/init', 'pjt_register_blocks' );