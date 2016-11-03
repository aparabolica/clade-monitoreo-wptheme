<?php
global $data_query, $theme_id, $theme_title, $term;
global $chart_count;
if(!$chart_count)
  $chart_count = 1;
else
  $chart_count++;
// $color = get_field('color', $theme_id);
$color = '#E8431E';
if($data_query->have_posts()) :
  while($data_query->have_posts()) :
    $data_query->the_post();
    $csv = get_field('csv');
    $plotline_number = get_field('plot_line_number');
    $plotline_text = get_field('plot_line_text');
    $stacking = get_field('stacking');
    $type = get_field('chart_type');
    ?>
    <div class="clade-chart-container">
      <div id="chart_<?php echo $chart_count; ?>_<?php the_ID(); ?>" class="clade-chart"></div>
      <div class="chart-legend">
        <?php the_field('chart_legend'); ?>
      </div>
      <script type="text/javascript">
        (function($) {
          $.get('<?php echo $csv['url']; ?>', function(csv) {
            var chartConfig = {
              element: '#chart_<?php echo $chart_count; ?>_<?php the_ID(); ?>',
              color: '<?php echo $color; ?>',
              data: csv,
              title: '<?php echo $theme_title; ?>',
              subtitle: '<?php echo $term->name; ?>',
              type: '<?php echo ($type ? $type : 'column'); ?>',
              stacking: <?php echo ($stacking ? "'" . $stacking . "'" : 'null'); ?>
            };
            <?php if($plotline_number) : ?>
              chartConfig.plotline = <?php echo $plotline_number ?>;
              chartConfig.plotlineText = '<?php echo $plotline_text; ?>';
            <?php endif; ?>
            cladeChart(chartConfig);
          });
        })(jQuery);
      </script>
    </div>
    <?php
    clade_data_download_button();
    wp_reset_postdata();
  endwhile;
endif;
// wp_reset_query();
?>
