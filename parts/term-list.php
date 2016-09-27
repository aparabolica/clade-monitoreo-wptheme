<?php
global $theme_id, $terms, $has_chart;
/*
 * **FIX**
 *
 * - Should also be able to download data from this links
 *   If no chart or tree nav is available
 *
 */
?>
<ul class="term-list <?php if(!$has_chart) echo 'full'; ?>">
  <?php
  foreach($terms as $term) :
    $a = '';
    if(!$has_chart) :
      $tax_query = array(
        array(
          'taxonomy' => $term->taxonomy,
          'terms' => $term->term_id
        )
      );
      $data_query = clade_get_data_query($theme_id, $tax_query);
      if($data_query->have_posts()) :
        $file = get_field('pdf', $data_query->posts[0]->ID);
        if($file)
          $a = '<a href="' . $file['url'] . '"></a>';
      endif;
    endif;
    $thumb = get_field('thumbnail', $term->taxonomy . '_' . $term->term_id);
    ?>
    <li style="background-image: url(<?php echo $thumb; ?>);" title="<?php echo $term->term_title; ?>" data-termid="<?php echo $term->term_id; ?>">
      <?php echo $a; ?>
    </li>
    <?php
  endforeach;
  ?>
</ul>
