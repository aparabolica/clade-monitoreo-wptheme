<?php
global $data_query, $theme_id, $theme_title, $term;
// $color = get_field('color', $theme_id);
$color = '#E8431E';
if($data_query->have_posts()) :
  while($data_query->have_posts()) :
    $data_query->the_post();
    $csv = get_field('csv');
    $plotline_number = get_field('plot_line_number');
    $plotline_text = get_field('plot_line_text');
    ?>
    <div id="chart_<?php the_ID(); ?>" class="clade-chart"></div>
    <script type="text/javascript">
      (function($) {
        $.get('<?php echo $csv['url']; ?>', function(csv) {
          var chartConfig = {
            element: '#chart_<?php the_ID(); ?>',
            color: '<?php echo $color; ?>',
            data: csv,
            title: '<?php echo $theme_title; ?>',
            subtitle: '<?php echo $term->name; ?>',
          };
          <?php if($plotline_number) : ?>
            chartConfig.plotline = <?php echo $plotline_number ?>;
            chartConfig.plotlineText = '<?php echo $plotline_text; ?>';
          <?php endif; ?>
          cladeChart(chartConfig);
        });
      })(jQuery);
    </script>
    <?php
    wp_reset_postdata();
  endwhile;
endif;
// wp_reset_query();
?>
