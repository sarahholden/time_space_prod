<? /* Template Name: Gallery */ ?>

<? get_header(); ?>
<main class="site-content page-gallery">

  <!-- ==============================
  Gallery Section
  =================================== -->
  <div class="">
    <?
    $properties = get_field('properties');
    $galleryIndex = 0;
    if( $properties ) { ?>
      <div>
        <? foreach( $properties as $property) { // variable must be called $property (IMPORTANT) ?>
          <?
            $featuredImg = get_field('landing_image', $property->ID);
            $comingSoon = get_field('disable_detail_page', $property->ID);
            $inProgress = get_field('in_progress', $property->ID);
            $inProgressText = get_field('in_progress_text', $property->ID);
          ?>
            <? setup_postdata($property); ?>
            <?
            $images = get_field('images', $property->ID);
            if( $images ) { ?>
              <div class="gallery-row js-gallery-row" data-gallery-index="<?= $galleryIndex ?>">
                <h1>
                  <a href="<?= get_permalink( $property->ID ); ?>" class="<? if ($comingSoon) { ?>coming-soon<? } ?> property">
                    <?= get_the_title( $property->ID ); ?>
                  </a>
                </h1>
                <div class="swiper-container swiper-container-gallery">
                  <div class="swiper-wrapper">
                    <? foreach( $images as $image ) { ?>
                      <div class="swiper-slide">
                        <img
                          <?php acf_responsive_image( $image['id']); ?>
                          sizes="max-width(768px) 100vw, max-width(1050px) 80vw, max-width(1440px) 70vw, 65vw"
                          class="lazyload lazy-fade"
                          alt="<?= $image['alt'] ?>"
                          />
                      </div>
                    <? } ?>
                  </div>
                  <?
                    $imagesCount = count($images);
                  ?>
                  <div class="range-pagination">
                    <div class="range-slider" data-slide-count="<?= $imagesCount ?>"></div>
                    <!-- <input type="range" class="range-input" name="volume" min="1" value="1" max="<?= $imagesCount ?>"> -->
                  </div>
                </div>
              </div>
            <? } ?>
          <? $galleryIndex++ ?>
        <? } ?>
      </div>
      <? wp_reset_postdata(); // IMPORTANT - reset the $property object so the rest of the page works correctly ?>
    <? } ?>
  </div>
</main>

<? get_footer(); ?>
