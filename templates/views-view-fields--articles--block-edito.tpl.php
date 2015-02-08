<?php
/**
 * Created by PhpStorm.
 * User: robbiano
 * Date: 17/01/2015
 * Time: 13:53
 */
?>
<div class="article article--edito">
  <div class="article__image--edito">
    <?php	print $fields['field_image_article'] -> content; ?>
  </div>
  <div class="article__content--edito">
    <div class="article__body--edito">
      <?php	print $fields['body'] -> content; ?>
    </div>
    <div class="article__rubrique article__rubrique--edito">
      <?php	print $fields['field_rubrique_article'] -> content; ?>
    </div>
  </div>

</div>
