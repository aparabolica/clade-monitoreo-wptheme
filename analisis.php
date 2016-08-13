<?php
/*
 * Template name: Analisis
 */

$countries = clade_get_countries();
?>
<?php get_header(); ?>
<article id="country-page" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <nav class="page-header-nav">
          <a href="#" class="active">Dimension de esfuerzo</a>
          <a href="#">Dimension de disponibilidad</a>
          <a href="#">Dimension de equidad</a>
          <a href="#">Analisis agregado</a>
        </nav>
        <p class="header-label">Datos de</p><br/>
        <h1>Análisis</h1>
      </div>
      <div class="four columns">
        <!-- <aside class="files">
          <p>
            <a class="button">
              <span class="fa fa-download"></span>
              Download análisis
            </a>
          </p>
        </aside> -->
      </div>
    </div>
  </header>
  <!-- <section class="page-welcome">
    <div class="container">
      <div class="nine columns">
        <p>Ut eiusmod in nostrud duis reprehenderit mollit sint mollit est id commodo quis ex exercitation sit enim anim. Ex excepteur Lorem consequat voluptate ea nulla voluptate ut nulla consequat. Ut ut laborum ex dolor ea dolor duis laborum occaecat qui nostrud.</p>
      </div>
    </div>
  </section> -->
  <section class="page-content theme-group">
    <div class="theme-group">
      <div class="page-section">
        <div class="container">
          <div class="twelve columns">
            <div class="section-title">
              <h2 class="h"><span>Dimension</span> de esfuerzo</h2>
            </div>
          </div>
        </div>
        <div class="section-intro">
          <div class="container">
            <div class="twelve columns">
              <div class="section-intro-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate, eros vitae ornare dapibus, nibh justo feugiat magna, ut mattis velit diam vel nunc. Donec suscipit tempor purus eget hendrerit. Mauris in urna in libero consequat egestas. Mauris eu augue a libero molestie efficitur a eu sem. Suspendisse consequat laoreet condimentum. Pellentesque condimentum dolor non ligula faucibus rutrum. Morbi rhoncus mollis convallis. Etiam consequat nunc nisi, et porta massa pulvinar eget. Ut eget tincidunt eros. Quisque ullamcorper odio et volutpat laoreet. In et molestie magna. Sed dictum eu magna et lobortis.</p>

                <p>Proin tempor tortor ex, pulvinar elementum ligula pulvinar consectetur. Sed et risus tristique, convallis augue dictum, ultricies magna. Proin orci urna, vulputate eget iaculis eget, malesuada rhoncus ante. Proin sit amet placerat lorem. Quisque auctor mi sit amet dictum imperdiet. Aliquam dapibus blandit nulla. Mauris consectetur ligula in lobortis pharetra. Mauris malesuada lacus dui, id tempor magna cursus in. Phasellus posuere, urna non molestie volutpat, ipsum quam egestas augue, tincidunt fringilla tellus augue non metus. Aenean molestie viverra lacus, in vestibulum lorem condimentum a. Sed eget enim sit amet augue faucibus malesuada vel quis velit. Proin non rutrum nisl, eu fringilla massa. Ut vitae facilisis quam. Pellentesque dapibus felis eget mauris dictum pretium.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="theme-item">
            <div class="container">
              <div class="four columns">
                <h3>Gasto público en educación como % del PIB</h3>
              </div>
              <div class="eight columns">
                <div class="child-themes">
                  <ul>
                    <li>
                      <h3>Gasto público en educación</h3>
                    </li>
                    <li>
                      <p class="sign">/</p>
                    </li>
                    <li>
                      <h3>PIB</h3>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="twelve columns">
                <div class="theme-content" style="display: none;">
                  <div class="four columns">
                    <ul class="country-list">
                      <?php foreach($countries as $c_key => $country) : ?>
                        <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/flags/<?php echo $c_key; ?>.png);" title="<?php echo $country; ?>" <?php if($c_key == 'br') echo 'class="active"'; ?>>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                  <div class="eight columns">
                    <h4>Brasil</h4>
                    <div id="chart"></div>
                    <script type="text/javascript">
                      (function($) {
                        $('#chart').highcharts({
                          chart: {
                            type: 'column',
                            backgroundColor: null,
                            style: {
                              fontFamily: 'Ubuntu, sans-serif'
                            }
                          },
                          credits: {
                            enabled: false
                          },
                          title: false,
                          subtitle: false,
                          legend: {
                            enabled: false
                          },
                          xAxis: {
                            type: 'category',
                            labels: {
                              style: {
                                color: '#fff'
                              }
                            }
                          },
                          yAxis: {
                            title: {
                              text: 'Gasto público en educación com % del PIB',
                              style: {
                                color: 'rgba(255,255,255,0.5)'
                              }
                            },
                            labels: {
                              style: {
                                color: '#fff'
                              }
                            },
                            minRange: 6,
                            min: 0,
                            plotLines: [{
                              value: 6,
                              color: '#E8431E',
                              dashStyle: 'shortdash',
                              width: 3,
                              label: {
                                text: 'Referencia para America Latina',
                                style: {
                                  color: '#fff',
                                  fontWeight: 500,
                                  textTransform: 'uppercase'
                                }
                              }
                            }],
                            gridLineColor: 'rgba(0,0,0,0.1)'
                          },
                          plotOptions: {
                            series: {
                              borderWidth: 0,
                              dataLabels: {
                                enabled: true,
                                // format: '{point.y:.2f}',
                                color: '#fff',
                                style: {
                                  textShadow: false
                                }
                              }
                            }
                          },
                          tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
                          },
                          series: [{
                            name: 'Año',
                            color: '#E8431E',
                            // colorByPoint: true,
                            groupPadding: 0,
                            data: [{
                              name: '1998',
                              y: 4.87
                            }, {
                              name: '1999',
                              y: 3.88
                            }, {
                              name: '2000',
                              y: 4.01
                            }, {
                              name: '2001',
                              y: 3.88
                            }, {
                              name: '2002',
                              y: null
                            }, {
                              name: '2003',
                              y: 4.01
                            }, {
                              name: '2004',
                              y: 4.53
                            }, {
                              name: '2005',
                              y: 4.95
                            }, {
                              name: '2006',
                              y: 5.08
                            }, {
                              name: '2007',
                              y: 5.40
                            }, {
                              name: '2008',
                              y: 5.62
                            }, {
                              name: '2009',
                              y: 5.82
                            }, {
                              name: '2010',
                              y: null
                            }, {
                              name: '2011',
                              y: null
                            }, {
                              name: '2012',
                              y: null
                            }, {
                              name: '2013',
                              y: null
                            }]
                          }]
                        })
                      })(jQuery);
                    </script>
                  </div>
                </div>
                <div class="theme-content theme-02" style="display:none;">
                  <h4>Gasto público en educación</h4>
                  <?php get_template_part('parts/table'); ?>
                </div>
                <div class="theme-content theme-02" style="display:none;">
                  <h4>Gasto público en educación</h4>
                  <nav class="tree-nav">
                    <div class="clearfix">
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Millones de dólares (US$)</a>
                        <a href="#">Millones de Unidad Monetaria Nacional (UMN)</a>
                      </div>
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Precios corrientes</a>
                        <a href="#">Precios constantes (de 2005)</a>
                      </div>
                    </div>
                    <div class="general-download">
                      <p>
                        <a class="button button-small">
                          <span class="fa fa-download"></span>
                          Descargar todos los datos
                        </a>
                      </div>
                  </nav>
                  <div>
                    <div class="four columns">
                      <ul class="country-list">
                        <?php foreach($countries as $c_key => $country) : ?>
                          <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/flags/<?php echo $c_key; ?>.png);" title="<?php echo $country; ?>" <?php if($c_key == 'br') echo 'class="active"'; ?>>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <div class="eight columns">
                      <h4>Brasil</h4>
                      <div id="chart_02"></div>
                      <script type="text/javascript">
                        (function($) {
                          $('#chart_02').highcharts({
                            chart: {
                              type: 'column',
                              backgroundColor: null,
                              style: {
                                fontFamily: 'Ubuntu, sans-serif'
                              }
                            },
                            credits: {
                              enabled: false
                            },
                            title: false,
                            subtitle: false,
                            legend: {
                              enabled: false
                            },
                            xAxis: {
                              type: 'category',
                              labels: {
                                style: {
                                  color: '#fff'
                                }
                              }
                            },
                            yAxis: {
                              title: {
                                text: '',
                                style: {
                                  color: 'rgba(255,255,255,0.5)'
                                }
                              },
                              labels: {
                                style: {
                                  color: '#fff'
                                }
                              },
                              gridLineColor: 'rgba(0,0,0,0.1)'
                            },
                            plotOptions: {
                              series: {
                                borderWidth: 0,
                                dataLabels: {
                                  enabled: true,
                                  // format: '{point.y:.2f}',
                                  color: '#fff',
                                  style: {
                                    textShadow: false
                                  }
                                }
                              }
                            },
                            tooltip: {
                              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
                            },
                            series: [{
                              name: 'Año',
                              color: '#E8431E',
                              // colorByPoint: true,
                              groupPadding: 0,
                              data: [{
                                name: '1998',
                                y: 4.87
                              }, {
                                name: '1999',
                                y: 3.88
                              }, {
                                name: '2000',
                                y: 4.01
                              }, {
                                name: '2001',
                                y: 3.88
                              }, {
                                name: '2002',
                                y: null
                              }, {
                                name: '2003',
                                y: 4.01
                              }, {
                                name: '2004',
                                y: 4.53
                              }, {
                                name: '2005',
                                y: 4.95
                              }, {
                                name: '2006',
                                y: 5.08
                              }, {
                                name: '2007',
                                y: 5.40
                              }, {
                                name: '2008',
                                y: 5.62
                              }, {
                                name: '2009',
                                y: 5.82
                              }, {
                                name: '2010',
                                y: null
                              }, {
                                name: '2011',
                                y: null
                              }, {
                                name: '2012',
                                y: null
                              }, {
                                name: '2013',
                                y: null
                              }]
                            }]
                          })
                        })(jQuery);
                      </script>
                    </div>
                  </div>
                </div>
                <div class="theme-content theme-02" style="display: none;">
                  <h4>Gasto público en educación</h4>
                  <nav class="tree-nav">
                    <div class="clearfix">
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Millones de dólares (US$)</a>
                        <a href="#">Millones de Unidad Monetaria Nacional (UMN)</a>
                      </div>
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Precios corrientes</a>
                        <a href="#">Precios constantes (de 2005)</a>
                      </div>
                    </div>
                    <div class="general-download">
                      <p>
                        <a class="button button-small">
                          <span class="fa fa-download"></span>
                          Descargar todos los datos
                        </a>
                      </div>
                  </nav>
                  <div>
                    <ul class="country-list full">
                      <?php foreach($countries as $c_key => $country) : ?>
                        <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/flags/<?php echo $c_key; ?>.png);" title="<?php echo $country; ?>" <?php if($c_key == 'br') echo 'class="active"'; ?>>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                <div class="theme-content theme-02">
                  <h4>Gasto público en educación</h4>
                  <nav class="tree-nav">
                    <div class="clearfix">
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Millones de dólares (US$)</a>
                        <a href="#">Millones de Unidad Monetaria Nacional (UMN)</a>
                      </div>
                      <div class="tree-01 tree-item">
                        <a href="#" class="active">Precios corrientes</a>
                        <a href="#">Precios constantes (de 2005)</a>
                      </div>
                    </div>
                    <div class="general-download">
                      <p>
                        <a class="button button-small">
                          <span class="fa fa-download"></span>
                          Descargar todos los datos
                        </a>
                      </div>
                  </nav>
                  <div>
                    <div id="chart_03"></div>
                    <script type="text/javascript">
                      (function($) {
                        $('#chart_03').highcharts({
                          chart: {
                            type: 'column',
                            backgroundColor: null,
                            style: {
                              fontFamily: 'Ubuntu, sans-serif'
                            }
                          },
                          credits: {
                            enabled: false
                          },
                          title: false,
                          subtitle: false,
                          legend: {
                            enabled: false
                          },
                          xAxis: {
                            type: 'category',
                            labels: {
                              style: {
                                color: '#fff'
                              }
                            }
                          },
                          yAxis: {
                            title: {
                              text: '',
                              style: {
                                color: 'rgba(255,255,255,0.5)'
                              }
                            },
                            labels: {
                              style: {
                                color: '#fff'
                              }
                            },
                            gridLineColor: 'rgba(0,0,0,0.1)'
                          },
                          plotOptions: {
                            series: {
                              borderWidth: 0,
                              dataLabels: {
                                enabled: true,
                                // format: '{point.y:.2f}',
                                color: '#fff',
                                style: {
                                  textShadow: false
                                }
                              }
                            }
                          },
                          tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
                          },
                          series: [{
                            name: 'Año',
                            color: '#E8431E',
                            // colorByPoint: true,
                            groupPadding: 0,
                            data: [{
                              name: '1998',
                              y: 4.87
                            }, {
                              name: '1999',
                              y: 3.88
                            }, {
                              name: '2000',
                              y: 4.01
                            }, {
                              name: '2001',
                              y: 3.88
                            }, {
                              name: '2002',
                              y: null
                            }, {
                              name: '2003',
                              y: 4.01
                            }, {
                              name: '2004',
                              y: 4.53
                            }, {
                              name: '2005',
                              y: 4.95
                            }, {
                              name: '2006',
                              y: 5.08
                            }, {
                              name: '2007',
                              y: 5.40
                            }, {
                              name: '2008',
                              y: 5.62
                            }, {
                              name: '2009',
                              y: 5.82
                            }, {
                              name: '2010',
                              y: null
                            }, {
                              name: '2011',
                              y: null
                            }, {
                              name: '2012',
                              y: null
                            }, {
                              name: '2013',
                              y: null
                            }]
                          }]
                        })
                      })(jQuery);
                    </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</article>
<?php get_footer(); ?>
