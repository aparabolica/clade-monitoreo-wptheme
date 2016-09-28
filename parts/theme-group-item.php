<?php
global $wp_the_query, $post, $term;
global $theme_title, $theme_id;
$theme_group_post = $post;
?>
<div class="theme-group">
  <div class="page-section">
    <div class="container">
      <div class="twelve columns">
        <div class="section-title">
          <h2 class="h"><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
    <div class="section-intro">
      <div class="container">
        <div class="twelve columns">
          <div class="section-intro-content">
            <?php
            if($wp_the_query->is_tax('country') && have_rows('countries')) :
              while(have_rows('countries')) :
                the_row();
                $country = get_sub_field('country');
                $details = get_sub_field('country_details');
                if($country == $term->term_id)
                  echo $details;
              endwhile;
            else :
              the_content();
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <?php
      $themes = get_field('themes');
      if($themes) :
        foreach($themes as $theme) :
          $post = $theme['theme'];
          setup_postdata($post);
          $theme_title = get_the_title();
          $theme_id = get_the_ID();
          $color = get_field('color');
          ?>
          <div class="theme-group-item">
            <!-- THEME GROUP ITEM HEADER -->
            <header class="theme-group-header">
              <div class="container">
                <div class="four columns">
                  <h3 class="main" style="background-color: <?php echo $color; ?>" data-theme="<?php the_ID(); ?>">
                    <?php the_title(); ?>
                  </h3>
                </div>
                <?php if($theme['subthemes']) :
                  $relation = explode(',', $theme['subthemes_relation']);
                  $i = 0;
                  ?>
                  <div class="eight columns">
                    <div class="child-themes">
                      <ul>
                        <?php foreach($theme['subthemes'] as $subtheme) :
                          $post = $subtheme;
                          setup_postdata($post);
                          $color = get_field('color');
                          ?>
                          <li>
                            <h3 style="background-color: <?php echo $color; ?>" data-theme="<?php the_ID(); ?>"><?php the_title(); ?></h3>
                          </li>
                          <?php if($i+1 < count($theme['subthemes'])) : ?>
                            <li>
                              <p class="sign"><?php echo $relation[$i]; $i++; ?></p>
                            </li>
                            <?php
                          endif;
                        endforeach;
                        $post = $theme['theme'];
                        setup_postdata($post);
                        ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </header>
            <!-- END THEME GROUP ITEM HEADER -->
            <!-- THEME GROUP ITEM CONTENT -->
            <?php
            get_template_part('parts/theme-item');
            foreach($theme['subthemes'] as $subtheme) :
              $post = $subtheme;
              setup_postdata($post);
              $theme_id = get_the_ID();
              $theme_title = get_the_title();
              get_template_part('parts/theme-item');
            endforeach;
            ?>
            <!-- END THEME GROUP ITEM CONTENT -->
          </div>
          <?php
          wp_reset_postdata();
        endforeach;
      endif;
      ?>
    </div>
  </div>
</div>
<?php
$post = $theme_group_post;
setup_postdata($post);
?>
