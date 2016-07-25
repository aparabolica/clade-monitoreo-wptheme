<?php
/*
 * Template name: Country
 */
?>
<?php get_header(); ?>
<article id="country-page" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="eight columns">
        <div class="flag" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/flags/br.png);"></div>
        <p class="header-label">Análisis de</p><br/>
        <h1>Brasil</h1>
      </div>
      <div class="four columns">
        <aside class="files">
          <p>
            <a class="button">
              <span class="fa fa-download"></span>
              Download análisis
            </a>
          </p>
        </aside>
      </div>
    </div>
  </header>
  <section class="page-welcome">
    <div class="container">
      <div class="nine columns">
        <p>Ut eiusmod in nostrud duis reprehenderit mollit sint mollit est id commodo quis ex exercitation sit enim anim. Ex excepteur Lorem consequat voluptate ea nulla voluptate ut nulla consequat. Ut ut laborum ex dolor ea dolor duis laborum occaecat qui nostrud.</p>
      </div>
    </div>
  </section>
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
        <div class="section-content">
          <div class="theme-item">
            <div class="container">
              <div class="four columns">
                <h3>Gasto público en educación como % del PIB</h3>
                <p>
                  <a class="button button-small">
                    <span class="fa fa-download"></span>
                    Download PDF
                  </a>
                  <a class="button button-small">
                    <span class="fa fa-download"></span>
                    Download CSV
                  </a>
                </p>
                <p>Id commodo velit proident cupidatat ullamco nulla minim elit dolore pariatur. Nostrud sit sint et anim excepteur eu pariatur mollit exercitation occaecat adipisicing velit excepteur in amet qui cillum.</p>
              </div>
              <div class="eight columns">
                <div class="theme-content">
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
            </div>
          </div>
          <div class="theme-item">
            <div class="container">
              <div class="four columns">
                <h3>Gasto público en educación como % del gasto total</h3>
                <p>Id commodo velit proident cupidatat ullamco nulla minim elit dolore pariatur. Nostrud sit sint et anim excepteur eu pariatur mollit exercitation occaecat adipisicing velit excepteur in amet qui cillum.</p>
              </div>
              <div class="eight columns">
                <div id="chart_01"></div>
                <script type="text/javascript">
                  (function($) {
                    $('#chart_01').highcharts({
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
                          text: 'Gasto público en educación com % del gasto total',
                          style: {
                            color: 'rgba(255,255,255,0.5)'
                          }
                        },
                        labels: {
                          style: {
                            color: '#fff'
                          }
                        },
                        minRange: 20,
                        min: 0,
                        plotLines: [{
                          value: 20,
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
                          y: 13.06
                        }, {
                          name: '1999',
                          y: 10.56
                        }, {
                          name: '2000',
                          y: 11.15
                        }, {
                          name: '2001',
                          y: 10.26
                        }, {
                          name: '2002',
                          y: 9.44
                        }, {
                          name: '2003',
                          y: null
                        }, {
                          name: '2004',
                          y: 10.41
                        }, {
                          name: '2005',
                          y: 11.33
                        }, {
                          name: '2006',
                          y: 12.90
                        }, {
                          name: '2007',
                          y: 13.57
                        }, {
                          name: '2008',
                          y: 14.37
                        }, {
                          name: '2009',
                          y: 14.73
                        }, {
                          name: '2010',
                          y: 14.78
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
    <div class="theme-group">
      <div class="page-section">
        <div class="container">
          <div class="twelve columns">
            <div class="section-title">
              <h2 class="h"><span>Dimensión</span> de disponibilidad</h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="theme-item">
            <div class="container">
              <div class="four columns">
                <h3>Disponibilidad de recursos por persona en edad escolar</h3>
                <p>Id commodo velit proident cupidatat ullamco nulla minim elit dolore pariatur. Nostrud sit sint et anim excepteur eu pariatur mollit exercitation occaecat adipisicing velit excepteur in amet qui cillum.</p>
              </div>
              <div class="eight columns">
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
                          text: 'Disponibilidad de recursos por persona en edad escolar',
                          style: {
                            color: 'rgba(255,255,255,0.5)'
                          }
                        },
                        labels: {
                          style: {
                            color: '#fff'
                          }
                        },
                        minRange: 5563,
                        min: 0,
                        plotLines: [{
                          value: 5563,
                          color: '#E8431E',
                          dashStyle: 'shortdash',
                          width: 3,
                          label: {
                            text: '5563: Promedio de la mitad de países de menores ingresos de la OCDE',
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
                          y: 579
                        }, {
                          name: '1999',
                          y: 466.6
                        }, {
                          name: '2000',
                          y: 499.1
                        }, {
                          name: '2001',
                          y: 494.9
                        }, {
                          name: '2002',
                          y: 485.1
                        }, {
                          name: '2003',
                          y: null
                        }, {
                          name: '2004',
                          y: 587.7
                        }, {
                          name: '2005',
                          y: 684.9
                        }, {
                          name: '2006',
                          y: 800.7
                        }, {
                          name: '2007',
                          y: 877.6
                        }, {
                          name: '2008',
                          y: 984.4
                        }, {
                          name: '2009',
                          y: 1020.2
                        }, {
                          name: '2010',
                          y: 1131.5
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
    <div class="theme-group">
      <div class="page-section">
        <div class="container">
          <div class="twelve columns">
            <div class="section-title">
              <h2 class="h"><span>Análisis</span> agregado</h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="theme-item">
            <div class="container">
              <div class="four columns">
                <h3>Índice compuesto</h3>
                <p>Id commodo velit proident cupidatat ullamco nulla minim elit dolore pariatur. Nostrud sit sint et anim excepteur eu pariatur mollit exercitation occaecat adipisicing velit excepteur in amet qui cillum.</p>
              </div>
              <div class="eight columns">
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
                          text: 'Índice Compuesto',
                          style: {
                            color: 'rgba(255,255,255,0.5)'
                          }
                        },
                        labels: {
                          style: {
                            color: '#fff'
                          }
                        },
                        minRange: 100,
                        min: 0,
                        plotLines: [{
                          value: 100,
                          color: '#E8431E',
                          dashStyle: 'shortdash',
                          width: 3,
                          label: {
                            text: 'Valor ideal inicial',
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
                          y: null
                        }, {
                          name: '1999',
                          y: 45.56
                        }, {
                          name: '2000',
                          y: null
                        }, {
                          name: '2001',
                          y: 46.38
                        }, {
                          name: '2002',
                          y: 46.29
                        }, {
                          name: '2003',
                          y: null
                        }, {
                          name: '2004',
                          y: 47.88
                        }, {
                          name: '2005',
                          y: 51.00
                        }, {
                          name: '2006',
                          y: 54.34
                        }, {
                          name: '2007',
                          y: 56.01
                        }, {
                          name: '2008',
                          y: 59.16
                        }, {
                          name: '2009',
                          y: 61.08
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
  </section>
</article>
<?php get_footer(); ?>
