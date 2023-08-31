<?php
/**
 * Block template file: template-parts/blocks/slider/slider.php
 *
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-slider';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  <div class="overlay"></div>
  <div class="container-fluid">
    <?php if( have_rows('slideshow') ): ?>
    <div class="row">
        <?php while( have_rows('slideshow') ): the_row();

          //Custom Fields
    			$image = get_sub_field('image');
          $headline = get_sub_field( 'headline' );
          $desc = get_sub_field( 'description' );

    			?>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0"">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="myImg">
              <?php if ( $image ) : ?>
        				<img class="panel-image-preview" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
              <?php else : // fallback image ?>
                <img class="panel-image-preview" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/no-image-1920x1080.jpg" alt="Kein Bild vorhanden">
              <?php endif; ?>
              <div class="caption">
                <div class="content">
                  <h1><?php echo $headline; ?></h1>
                  <p><?php echo $desc; ?></p>
                  <div class="btn-con js-anchor-link">
                    <a class="btn-custom" href="#leistungen">Unsere Leistungen</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p>Bitte fügen Sie zuerst Bilder hinzu</p>
  <?php endif; ?>

  </div>
</section>
