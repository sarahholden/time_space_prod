<?php /* Template Name: Properties */ ?>

<? get_header(); ?>
<main class="site-content page-property-detail">

  <!-- ==============================
  Header
  =================================== -->
  <header class="scroll-wrapper mobile-flex-reverse">
    <div class="container-full">
      <div class="cols-3 ">
        <div class="layer-1">
          <h1><?= the_title() ?></h1>
        </div>
        <div class="layer-2">
          <? if(get_field('location_heading')) { ?>
            <h2><?= the_field('location_heading') ?></h2>
          <? } ?>
          <? if(get_field('location_text')) { ?>
            <div class="desc">
              <?= the_field('location_text') ?>
            </div>
          <? } ?>
          <? if(get_field('url')) { ?>
            <a href="<?= get_field('url')['url'] ?>" target="<?= get_field('url')['target'] ?>" class="url small-caps">
              <?= get_field('url')['title'] ?>
            </a>
          <? } ?>
        </div>
        <div class="layer-3">
          <? if(get_field('building_highlights_heading')) { ?>
            <h2><?= the_field('building_highlights_heading') ?></h2>
          <? } ?>
          <? if(get_field('building_highlights_text')) { ?>
            <div class="desc">
              <?= the_field('building_highlights_text') ?>
            </div>
          <? } ?>

        </div>
      </div>
    </div>
    <div class="scale-up-trigger scaling-image-wrapper divider-image">
      <? if(get_field('property_image')) { ?>
        <img
            <?php acf_responsive_image( get_field('property_image')['id']); ?>
            sizes="100vw"
            class="lazyload lazy-fade scale-image"
            alt="<?= $featuredImg['alt'] ?>"
            />
        <!-- <img class="scale-image lazyload lazy-fade" src="<?= get_field('property_image')['url'] ?>" alt="<?= get_field('property_image')['alt'] ?>"> -->
      <? } ?>
    </div>
  </header>
  <section class="intro container scroll-wrapper ">
    <div class="cols-2 mobile-flex-reverse">
      <? if(get_field('intro_text')) { ?>
        <div class=" v-aligner">
          <div class="desc layer-1">
            <?= the_field('intro_text') ?>
          </div>
        </div>
      <? } ?>
      <? if(get_field('intro_image')) { ?>
        <div class="layer-2">
          <img class="lazyload lazy-fade" src="<?= get_field('intro_image')['url'] ?>" alt="<?= get_field('intro_image')['alt'] ?>">
        </div>
      <? } ?>
    </div>
  </section>
  <section class="gallery">
    <? if (have_rows('repeating_image_blocks')) { ?>
      <? while( have_rows('repeating_image_blocks') ): the_row(); ?>
        <div class="gallery-row scale-up-trigger">
          <? if(get_sub_field('image_1')) { ?>
            <div class="scroll-wrapper">
              <div class="scaling-image-wrapper full-image slide-in">
                <img class="lazyload lazy-fade scale-image" src="<?= get_sub_field('image_1')['url'] ?>" alt="<?= get_sub_field('image_1')['alt'] ?>">
              </div>
            </div>
          <? } ?>
          <? if(get_sub_field('image_2')) { ?>
            <div class="scroll-wrapper">
              <div class="scaling-image-wrapper left-image slide-in">
                <img class="lazyload lazy-fade scale-image" src="<?= get_sub_field('image_2')['url'] ?>" alt="<?= get_sub_field('image_2')['alt'] ?>">
              </div>
            </div>
          <? } ?>
          <? if(get_sub_field('image_3')) { ?>
            <div class="scroll-wrapper">
              <div class="scaling-image-wrapper right-image slide-in">
                <img class="lazyload lazy-fade scale-image" src="<?= get_sub_field('image_3')['url'] ?>" alt="<?= get_sub_field('image_3')['alt'] ?>">
              </div>
            </div>
          <? } ?>
        </div>
      <? endwhile; ?>
    <? } ?>

  </section>

  <section class="featured">
    <div class="container-full">
      <? if(get_field('featured_properties_heading', '13')) { ?>
        <h1><?= the_field('featured_properties_heading', '13') ?></h1>
      <? } ?>
      <?
      $properties = get_field('featured_properties', '13');
      if( $properties ) { ?>
        <div class="cols-3 properties-list list-animation-wrapper">
          <? foreach( $properties as $property) { // variable must be called $property (IMPORTANT) ?>
            <?
              $featuredImg = get_field('landing_image', $property->ID);
              $comingSoon = get_field('disable_detail_page', $property->ID);
              $inProgress = get_field('in_progress', $property->ID);
              $inProgressText = get_field('in_progress_text', $property->ID);
            ?>
              <? setup_postdata($property); ?>
              <a href="<?= get_permalink( $property->ID ); ?>" class="<? if ($comingSoon) { ?>coming-soon<? } ?> property-item animate-item">
                <? if($featuredImg) { ?>
                  <div class="img-wrapper">
                    <img
                        <?php acf_responsive_image($featuredImg['id']); ?>
                        sizes="(max-width: 768px) 90vw, 32vw"
                        class="lazyload lazy-fade"
                        alt="<?= $featuredImg['alt'] ?>"
                        />
                  </div>
                <? } ?>
                <h2><?= get_the_title( $property->ID ); ?></h2>
                <p class="in-progress-note">
                  <? if($inProgress && $inProgressText) { ?>
                    <?= $inProgressText ?>
                  <? } else if ($inProgress) { ?>
                    In Progress
                  <? }?>
                </p>
              </a>
          <? } ?>
        </div>
        <? wp_reset_postdata(); // IMPORTANT - reset the $property object so the rest of the page works correctly ?>
      <? } ?>
    </div>
  </section>


</main>
<? get_footer(); ?>
