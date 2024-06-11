              </div>
              </div>
              <!-- Body -->
              <!-- Footer -->
              <footer class="m-grid__item m-footer ">
                  <div class="m-container m-container--fluid m-container--full-height m-page__container">
                      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                          <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                              <span class="m-footer__copyright">
                                  Copyright &copy; 2023</a>
                              </span>
                          </div>
                      </div>
                  </div>
              </footer>
              <!--Footer -->
              </div>
              <!-- Page -->
              <!-- Scroll Top -->
              <div id="m_scroll_top" class="m-scroll-top">
                  <i class="la la-arrow-up"></i>
              </div>
              <!--Scroll Top -->

              <!--begin::Base Scripts -->
              <script src="<?= base_url() ?>assets/admin/vendors/base/vendors.bundle.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/vendors/custom/tinymce/js/tinymce/tinymce.min.js"></script>
              <script src="<?= base_url() ?>assets/admin/vendors/custom/print/jQuery.print.js"></script>
              <script src="<?= base_url() ?>assets/admin/vendors/custom/table/jquery.table2excel.js"></script>
              <script src="<?= base_url() ?>assets/admin/vendors/custom/fancybox/jquery.fancybox.min.js"></script>
              <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
              <script src="<?= base_url() ?>assets/admin/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.js"> </script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js"> </script>
              <script src="<?= base_url() ?>assets/admin/app/js/dashboard.js" type="text/javascript"></script>
              <!-- calendar -->
              <script src="<?= base_url() ?>assets/admin/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
              <script src="<?= base_url() ?>assets/admin/demo/default/custom/components/calendar/basic.js" type="text/javascript"></script>
              <!-- chart -->
              <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

              <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
              <script src="https://www.amcharts.com/lib/3/serial.js"></script>
              <script src="https://www.amcharts.com/lib/3/gantt.js"></script>
              <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
              <script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>

              <!-- custom script js -->
              <script src="<?= base_url(); ?>assets/admin/app/js/script.js" type="text/javascript"></script>
              <script>
                  var base_url = window.location.protocol + "//" + window.location.host + "/";
                  var type = $(".resources-type").data('resources_type');
                  var link = $(".resources-type").data('resources_link');
                  $('.add-resources').attr('href', base_url + 'admin-page/add-' + link + '/' + type);
                  $(".resources-type").click(function() {
                      var type = $(this).data('resources_type');
                      $('.add-resources').attr('href', base_url + 'admin-page/add-' + link + '/' + type);

                      // maintain current tab
                      var id = $(this).attr("href").substr(1);
                      window.location.hash = id;
                  });

                  // on load of the page: switch to the currently selected tab
                  var hash = window.location.hash;
                  $('#myTab a[href="' + hash + '"]').tab('show');
              </script>
              <script>
                  function toggleFeature(elmnt, database) {
                      var inputStatus = elmnt.checked;
                      if (inputStatus) {
                          $.ajax({
                                  url: base_url + 'admin-page/page-status-on',
                                  type: 'POST',
                                  data: {
                                      database: database
                                  },
                                  success: function(str) {

                                  }

                              })
                              .done(function() {
                                  console.log("success live");
                              })
                              .fail(function(xhr, status, error) {
                                  console.log(xhr);
                              });
                      } else {
                          $.ajax({
                                  url: base_url + 'admin-page/page-status-off',
                                  type: 'POST',
                                  data: {
                                      database: database
                                  },
                                  success: function(str) {

                                  }

                              })
                              .done(function() {
                                  console.log("success live");
                              })
                              .fail(function(xhr, status, error) {
                                  console.log(xhr);
                              });
                      }
                  }
              </script>

              <?php if ($this->router->fetch_class() == 'AdminPage' && $this->router->fetch_method() == 'index') : ?>
                  <script>
                      <?php foreach ($pelayan_category as $c) : ?>
                          var chart = AmCharts.makeChart("chart<?= str_replace(' ', '_', $c->category) ?>", {
                              "type": "gantt",
                              "theme": "light",
                              "marginRight": 70,
                              "period": "DD",
                              "dataDateFormat": "YYYY-MM-DD",
                              "columnWidth": 0.5,
                              "valueAxis": {
                                  "type": "date"
                              },
                              "brightnessStep": 7,
                              "graph": {
                                  "fillAlphas": 1,
                                  "lineAlpha": 1,
                                  "lineColor": "#000",
                                  "fillAlphas": 0.85,
                                  "balloonText": "<b>[[task]]</b>:<br />[[open]] -- [[value]]",
                                  "columnWidth": 0.8 // Thicken the bars
                              },
                              "rotate": true,
                              "categoryField": "category",
                              "segmentsField": "segments",
                              "colorField": "color",
                              "startDateField": "start",
                              "endDateField": "end",
                              "dataProvider": [
                                  <?php $pelayan = $this->db->get_where('pelayan', ['id_pelayan_category' => $c->id])->result(); ?>
                                  <?php foreach ($pelayan as $p) : ?> {
                                          "category": "<?= $p->nama ?>",
                                          "segments": [
                                              <?php $jadwal = explode(',', $p->list_jadwal); ?>
                                              <?php foreach ($jadwal as $j) : ?> {
                                                      <?php $date = date('Y') . '-' . date('m') . '-' . $j ?>
                                                      <?php $tomorrow = DateTime::createFromFormat('Y-m-d', $date); ?>
                                                      <?php $tomorrow->modify('+1 day'); ?>
                                                          "start": "<?= date('Y') . '-' . date('m') . '-' . $j ?>",
                                                          "end": "<?= $tomorrow->format('Y-m-d') ?>",
                                                          "color": "#b9783f",
                                                          "task": "test"
                                                  },
                                              <?php endforeach; ?>
                                          ],
                                      },
                                  <?php endforeach; ?>
                              ],
                              "valueScrollbar": {
                                  "autoGridCount": true
                              },
                              "chartCursor": {
                                  "cursorColor": "#55bb76",
                                  "valueBalloonsEnabled": false,
                                  "cursorAlpha": 0,
                                  "valueLineAlpha": 0.5,
                                  "valueLineBalloonEnabled": true,
                                  "valueLineEnabled": true,
                                  "zoomable": false,
                                  "valueZoomable": true
                              },
                              "export": {
                                  "enabled": true
                              }
                          });
                      <?php endforeach; ?>
                  </script>

              <?php endif; ?>

              </html>