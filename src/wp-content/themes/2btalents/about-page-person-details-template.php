
<?php if ($postItemData): ?>
<div class="content content-about <?= get_post_meta($postItemData->ID, 'css_class', true); ?>">
  <div class="content-close-button"></div>
  <div class="person-about">
    <div class="person">
      <a href="#">
        <div class="person-image">
          <?php $imageId = get_post_meta($postItemData->ID, 'main_image', true); ?>
          <?= wp_get_attachment_image($imageId, 'medium') ?>
        </div>
        <div class="person-title"><?= $postItemData->post_title; ?></div>
      </a>
    </div>
    <?php $descriptions = get_field( "description", $postItemData->ID ); ?>
    <?php if (isset($descriptions['main_description'])): ?>
    <div>
      <?= $descriptions['main_description'] ?>
    </div>
    <?php endif; ?>
    <?php if (isset($descriptions['additional_description'])): ?>
    <div>
      <?= $descriptions['additional_description'] ?>
    </div>
    <?php endif; ?>
    <?php foreach (SCF::get( 'description', $postItemData->ID ) ?? [] as $descr): ?>
      <div>
        <?php echo empty($descr) ? '' : current($descr); ?>
      </div>
    <?php endforeach; ?>            
  </div>
</div>
<?php endif; ?>
