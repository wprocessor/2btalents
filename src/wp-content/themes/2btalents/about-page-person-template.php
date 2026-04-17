
<?php if ($postItemData): ?>
<div class="person">
  <div class="person-legend">
    <div class="info content-activator"
      data-target-class="<?= get_post_meta($postItemData->ID, 'css_class', true); ?>"
        data-main-class="person-list-items--about"></div>
    <a target="_blank" href="<?= get_post_meta($postItemData->ID, 'url', true); ?>">
      <div class="kinopoisk"></div>
    </a>
  </div>
  <a href="#">
    <div class="person-image">
      <?php $imageId = get_post_meta($postItemData->ID, 'main_image', true); ?>
      <?= wp_get_attachment_image($imageId, 'medium') ?>
    </div>
    <div class="person-title"><?= $postItemData->post_title; ?></div>
  </a>
</div>
<?php endif; ?>