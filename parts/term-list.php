<?php
global $terms;
/*
 * **FIX**
 *
 * - Should also be able to download data from this links
 *   If no chart or tree nav is available
 *
 * - Should be class `full` in case of no chart
 */
?>
<ul class="country-list">
  <?php
  foreach($terms as $term) :
    $thumb = get_field('thumbnail', $term->taxonomy . '_' . $term->term_id);
    ?>
    <li style="background-image: url(<?php echo $thumb; ?>);" title="<?php echo $term->term_title; ?>" class="<?php if($term->name == 'Brasil') echo 'active'; ?>">
    </li>
    <?php
  endforeach;
  ?>
</ul>
