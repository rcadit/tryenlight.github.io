<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="vp-portfolio__item-img-wrap">
    <div class="vp-portfolio__item-img">
        <?php
        if ( $args['url'] ) {
            ?>
            <a href="<?php echo esc_url( $args['url'] ); ?>"
                <?php
                if ( isset( $args['url_target'] ) && $args['url_target'] ) :
                    ?>
                    target="<?php echo esc_attr( $args['url_target'] ); ?>"
                    <?php
                endif;
                if ( isset( $args['url_rel'] ) && $args['url_rel'] ) :
                    ?>
                    rel="<?php echo esc_attr( $args['url_rel'] ); ?>"
                    <?php
                endif;
                ?>
            >
            <?php
        }
        ?>
            <?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>

            <div class="vp-portfolio__item-img-overlay">
                <?php
                // Show Icon.
                if ( $opts['show_icon'] ) {
                    ?>
                    <div class="vp-portfolio__item-meta-icon">
                        <?php
                        switch ( $args['format'] ) {
                            case 'video':
                                visual_portfolio()->include_template( 'icons/play' );
                                break;
                            case 'audio':
                                visual_portfolio()->include_template( 'icons/music' );
                                break;
                            case 'gallery':
                                visual_portfolio()->include_template( 'icons/gallery' );
                                break;
                            default:
                                if ( isset( $args['vp_opts']['items_click_action'] ) && 'popup_gallery' === $args['vp_opts']['items_click_action'] ) {
                                    visual_portfolio()->include_template( 'icons/search' );
                                } else {
                                    visual_portfolio()->include_template( 'icons/image' );
                                }
                                break;
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php
        if ( $args['url'] ) {
            ?>
            </a>
            <?php
        }
        ?>
    </div>
</div>
