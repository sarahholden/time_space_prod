<?php /* Template Name: About */ ?>

<? get_header(); ?>
<main class="site-content page-about">

  <!-- ==============================
  Header
  =================================== -->
  <header class="mobile-flex-reverse scale-up-trigger scroll-wrapper ">
    <div class="container text-content">
      <div class="inner">
        <div class="cols-2-3">
          <div>
            <? if(get_field('heading')) { ?>
              <h1 class="layer-1"><?= the_field('heading') ?></h1>
            <? } ?>
          </div>
          <div class="desc layer-2">
            <? if(get_field('desc')) { ?>
              <?= get_field('desc') ?>
            <? } ?>
          </div>
        </div>
      </div>
    </div>
    <? if(get_field('intro_image')) { ?>
      <div class="scaling-image-wrapper">
        <img
        <?php acf_responsive_image( get_field('intro_image')['id']); ?>
        sizes="100vw"
        class="lazyload lazy-fade scale-image"
        alt="<?= $featuredImg['alt'] ?>"
        />
      </div>
    <? } ?>
  </header>
  <section class="core-values scroll-wrapper">
    <div class="container">
      <? if(get_field('core_values_heading')) { ?>
        <h2 class="layer-1"><?= the_field('core_values_heading') ?></h2>
      <? } ?>
      <? if(get_field('core_values_intro')) { ?>
        <div class="desc layer-2"><?= the_field('core_values_intro') ?></div>
      <? } ?>
      <? if (have_rows('core_values_list')) { ?>
        <?
          $count = 1;
        ?>
        <div class="core-values-list flex-row list-animation-wrapper">
          <? while( have_rows('core_values_list') ): the_row(); ?>
            <? if(get_sub_field('value_text')) { ?>
              <div class="core-values-item animate-item">
                <h3><?= $count ?>.</h3>
                <div class="small-desc">
                  <? the_sub_field('value_text'); ?>
                </div>
              </div>
            <? $count++; ?>
            <? } ?>
          <? endwhile; ?>
        </div>
      <? } ?>
      <hr class="divider layer-6">
      <? if(get_field('core_values_pullout')) { ?>
        <div class="pullout-quote layer-6">
          <?= the_field('core_values_pullout') ?>
        </div>
      <? } ?>
    </div>
  </section>

  <section class="outro">
    <div class="container">
      <div class="inner">
        <? if (have_rows('outro_block')) { ?>
          <? while( have_rows('outro_block') ): the_row(); ?>
            <div class="cols-2-3 outro-row">
              <? if(get_sub_field('heading')) { ?>
                <h2><? the_sub_field('heading'); ?></h2>
              <? } ?>
              <? if(get_sub_field('text')) { ?>
                <div class="desc">
                  <? the_sub_field('text'); ?>
                </div>
              <? } ?>
            </div>
          <? endwhile; ?>
        <? } ?>
      </div>
    </div>
  </section>




</main>
<? get_footer(); ?>
