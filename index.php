<?php

/*
  Plugin Name: Newsletter - WP Recipe Maker Integration
  Plugin URI: https://www.satollo.net
  Description: Provides a composer block to add recipes to newsletters
  Version: 1.0.0
  Author: Stefano Lissa
  Author URI: https://www.satollo.net
  Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
  License: GPLv2 or later
 */

// Please, register this action not limited to the admin side, since the block needs to be available even
// on frontend. 
// The action is fired only when Newsletter needs the blocks so there is no overhead.

add_action('newsletter_register_blocks', function () {

    // The registration function needs a folder where the block.php, the options.php the icon.png are located.
    //     
    // Warning! The block folder name is used as internal unique identification, choose it with care!
    //
    TNP_Composer::register_block(__DIR__ . '/wprm');

    // You can regiter other blocks here
    // ...
});


