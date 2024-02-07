              </div>
              </div>
              <!-- Body -->
              <!-- Footer -->
              <footer class="m-grid__item m-footer ">
                  <div class="m-container m-container--fluid m-container--full-height m-page__container">
                      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                          <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                              <span class="m-footer__copyright">
                                  2023 &copy; Website by
                                  <a href="https://reyhanrmdhn.my.id" class="m-link">Raihan Ramadhan</a>
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

              </html>