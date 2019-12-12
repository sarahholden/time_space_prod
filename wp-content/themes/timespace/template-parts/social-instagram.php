<?php
// use this instagram access token generator http://instagram.pixelunion.net/
$access_token = get_field('instagram_access_token', 'option');
$photo_count = 8;

$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
$json_link.="access_token={$access_token}&count={$photo_count}";

$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

$posts = $obj['data'];
?>


<section class="instagram-section insta-cols scroll-wrapper">
  <div class="cols-2-sm hide-mobile">
    <? if (empty($obj)) { ?>
      <? for ($i = 1; $i <= 4; $i++) { ?>
        <a href="#" target="_blank" title="" class="insta-img no-events" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/instagram/insta_<?= $i ?>.png');"></a>
      <? } ?>
    <? } else { ?>
      <? for ($i = 0; $i < 4; $i++) {
        $post = $posts[$i];
        $pic_text = $post['caption']['text'];
        $pic_link = $post['link'];
        $pic_src = str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      ?>
        <a href="<?= $pic_link ?>" class="insta-img" target="_blank" alt="<?= $pic_text ?>" style="background-image: url('<?= $pic_src ?>');"></a>
      <? } ?>
    <? } ?>

  </div>

  <div class="text-content v-h-aligner">
    <?php if (!empty(get_field('instagram_handle', 'option'))): ?>
      <a href="<?  the_field('instagram_link', 'option') ?>" target="_blank" class="instagram-link layer-1 subtle">
        <img src="<?php echo get_template_directory_uri(); ?>/images/instagram/lashes.svg" class="lashes">
        <?= get_field('instagram_handle', 'option') ?>
      </a>
    <?php endif; ?>

      <a href="<?  the_field('instagram_link', 'option') ?>" target="_blank" class="social-icon layer-2 subtle">
        <h2><?= get_field('instagram_heading', 'option') ?></h2>
      </a>

    <?php if (!empty(get_field('instagram_link', 'option'))): ?>
      <a href="<?  the_field('instagram_link', 'option') ?>" target="_blank" class="btn m-top layer-3 subtle">
        <?= get_field('instagram_button_text', 'option') ?>
        <? get_template_part( 'template-parts/vector', 'arrow' ); ?>
      </a>

    <?php endif; ?>
  </div>


  <div class="cols-2-sm">
    <? if (empty($obj)) { ?>
      <? for ($i = 5; $i <= 8; $i++) { ?>
        <a href="#" target="_blank" title="" class="insta-img no-events" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/instagram/insta_<?= $i ?>.png');"></a>
      <? } ?>
    <? } else { ?>
      <? for ($i = 4; $i < 8; $i++) {
        $post = $posts[$i];
        $pic_text = $post['caption']['text'];
        $pic_link = $post['link'];
        $pic_src = str_replace("http://", "https://", $post['images']['low_resolution']['url']);
      ?>
        <a href="<?= $pic_link ?>" class="insta-img" target="_blank" alt="<?= $pic_text ?>" style="background-image: url('<?= $pic_src ?>');"></a>
      <? } ?>
    <? } ?>
  </div>
</section>
<div class="divider-bar xl" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/patterns/marble_bar.png');"></div>
