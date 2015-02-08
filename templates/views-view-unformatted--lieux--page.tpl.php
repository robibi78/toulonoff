<?php
/**
 * Created by PhpStorm.
 * User: robbiano
 * Date: 22/01/2015
 * Time: 17:51
 */
?>

<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php if (($id % 2) == 0): ?>
    <div class="row">
  <?php endif; ?>
  <?php print $row; ?>
  <?php if ((($id % 2) == 1) or ($id + 1 == sizeof($view->result))): ?>
    </div>
  <?php endif; ?>

<?php endforeach; ?>