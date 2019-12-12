<?php /* Template Name: Home */ ?>

<? get_header(); ?>
<main class="site-content page-home">

  <!-- ==============================
  Header
  =================================== -->
  <header class="smooth-load scale-bg-trigger scroll-wrapper mobile-flex-reverse">
    <? if(get_field('header_text')) { ?>
      <div class="container-md">
        <div class="desc fade-in">
          <?= the_field('header_text') ?>
        </div>
      </div>
    <? } ?>
    <? if(get_field('hero_image')) { ?>
      <div class="scaling-image-wrapper">
        <div class="scale-image bg-image"
          data-bg="<?= get_field('hero_image')['sizes']['xl'] ?>"
          data-mobile-bg="<?= get_field('hero_image')['sizes']['medium-small'] ?>"
          data-monitor-bg="<?= get_field('hero_image')['sizes']['full_size'] ?>">
        </div>
      </div>
      <!-- <div class="scaling-image-wrapper">
        <img
            <?php acf_responsive_image( get_field('hero_image')['id']); ?>
            sizes="100vw"
            class="lazyload lazy-fade scale-image"
            alt="<?= $featuredImg['alt'] ?>"
            />
      </div> -->
    <? } ?>
  </header>

  <!-- ==============================
  OUR PROPERTIES
  =================================== -->
  <section class="properties-list-home">
    <div class="container">
      <div class="inner">
        <? if(get_field('properties_heading')) { ?>
          <h1><?= the_field('properties_heading') ?></h1>
        <? } ?>

        <div>
          <?
          $properties = get_field('properties');
          if( $properties ) { ?>
            <div >
              <? foreach( $properties as $property) { // variable must be called $property (IMPORTANT) ?>
                <?
                  $featuredImg = get_field('home_thumb', $property->ID);
                  $comingSoon = get_field('disable_detail_page', $property->ID);
                  $inProgress = get_field('in_progress', $property->ID);
                  $inProgressText = get_field('in_progress_text', $property->ID);
                ?>
                  <? setup_postdata($property); ?>
                  <div class="scroll-wrapper property-item-home">
                    <a href="<?= get_permalink( $property->ID ); ?>" class="<? if ($comingSoon) { ?>coming-soon<? } ?> ">
                        <? if($featuredImg) { ?>
                          <div class="img-wrapper slide-in">
                            <img class="lazyload lazy-fade" src="<?= $featuredImg['url'] ?>" alt="<?= $featuredImg['alt'] ?>" >
                          </div>
                          <h2 class="caption text-slide-in"><?= get_the_title( $property->ID ); ?></h2>
                        <? } ?>

                    </a>
                </div>
              <? } ?>
            </div>
            <? wp_reset_postdata(); // IMPORTANT - reset the $property object so the rest of the page works correctly ?>
          <? } ?>
        </div>
      </div>
    </div>
  </section>


</main>
<? get_footer(); ?>
