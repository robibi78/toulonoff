<?php
/**
 * Created by PhpStorm.
 * User: robbiano
 * Date: 17/01/2015
 * Time: 14:50
 */
?>

<?php if (($view->row_index % 3) == 0): ?>
  <div class="row">
<?php endif; ?>
  <div class="article col-md-4">
    <div class="article__image">
      <?php	print $fields['field_image_article'] -> content; ?>
    </div>
    <div class="article__content">
      <div class="articl__title">
        <?php	print $fields['title'] -> content; ?>
      </div>
      <div class="article__body">
        <?php	print $fields['body'] -> content; ?>
      </div>
      <div class="article__rubrique article__rubrique--edito">
        <?php	print $fields['field_rubrique_article'] -> content; ?>
      </div>
    </div>

  </div>

<?php if ((($view->row_index % 3) == 2) or ($view->row_index + 1 == sizeof($view->result))): ?>
  </div>
<?php endif; ?>