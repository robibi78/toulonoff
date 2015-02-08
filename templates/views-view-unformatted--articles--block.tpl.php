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

    <?php print $row; ?>

<?php endforeach; ?>