<?php
/**
 * Displays a single post
 *
 * @package Swatch
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2013 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.3.4
 */
?>
<article id="post-<?php the_ID();?>"  <?php post_class(); ?>>
    <?php the_content( '', false );
    get_template_part( 'partials/social-links' ); ?>
</article>
