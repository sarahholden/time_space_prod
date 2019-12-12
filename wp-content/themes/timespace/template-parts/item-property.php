<?
$properties = get_field('properties_list');
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
