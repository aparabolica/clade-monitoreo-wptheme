<?php
global $terms, $has_chart;
/*
 * **FIX**
 *
 * - Should also be able to download data from this links
 *   If no chart or tree nav is available
 *
 * - Should be class `full` in case of no chart
 */
?>
<ul class="term-list <?php if(!$has_chart) echo 'full'; ?>">
  <?php
  foreach($terms as $term) :
    $thumb = get_field('thumbnail', $term->taxonomy . '_' . $term->term_id);
    ?>
    <li style="background-image: url(<?php echo $thumb; ?>);" title="<?php echo $term->term_title; ?>" data-termid="<?php echo $term->term_id; ?>">
    </li>
    <?php
  endforeach;
  ?>
</ul>
