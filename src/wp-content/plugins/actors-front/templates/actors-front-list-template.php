<?php if (!empty($actorsData)): ?>
  <div class="person-list">
    <div class="person-list--title">
      <?= $categoryLabel ?>
    </div>
    <div class="person-list-items">
      <?php foreach ($actorsData as $actorData): ?>
        <?= $actorData; ?>
      <?php endforeach; ?>
    </div>
  </div>
<?php else: ?>
  <!-- нет ни одного актера -->
<?php endif; ?>