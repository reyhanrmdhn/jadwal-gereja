<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <h5>ABOUT THE CHURCH</h5>
                    <p>For the word of God is living and active. Sharper than any double-edged sword, it penetrates even to dividing soul and spirit, joints and marrow; it judges the thoughts and attitudes.</p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h5>QUICK LINKS</h5>
                    <ul class="footer-links">
                        <li><a href="#">Upcoming events</a></li>
                        <li><a href="#">Ministries</a></li>
                        <li><a href="#">Recent Sermons</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h5>OUR ADDRESS</h5>
                    <p> Catholic Church<br>
                        121 King Street, Melbourne <br>
                        Victoria 3000 Australia<br>
                        <br>
                        Phone: +61 3 8376 6284<br>
                        Email: <a href="#"><span class="__cf_email__" data-cfemail="c7aaa6aeab87a4a6b3afa8abaea4b0a2a5b4aeb3a2e9a4a8aa">[email&#160;protected]</span></a>
                    </p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h5>CONNECT</h5>
                    <div class="social-icons"><a href="#"><img src="<?= base_url('assets/') ?>img/fb-icon.png" alt="social"></a> <a href="#"><img src="<?= base_url('assets/') ?>img/tw-icon.png" alt="social"></a> <a href="#"><img src="<?= base_url('assets/') ?>img/in-icon.png" alt="social"></a></div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p class="text-center">Copyright © 2014 All rights reserved</p>
            </div>
        </div>
    </footer>




    <script src="<?= base_url('assets/') ?>js/jquery.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/ketchup.all.js"></script>
    <script src="<?= base_url('assets/') ?>js/fancybox.js"></script>
    <script src="<?= base_url('assets/') ?>js/flexslider.js"></script>
    <script src="<?= base_url('assets/') ?>js/script.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <?php if($this->router->fetch_class('Home') && $this->router->fetch_method('event_calendar')){ ?>
        <script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
        <script src="<?= base_url('assets/') ?>js/fullcalendar.js"></script>
        <script src="<?= base_url('assets/') ?>js/gcal.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#event-calendar').fullCalendar({
                    googleCalendarApiKey: 'AIzaSyCJ5AqFvTnQ5kUZvYgTMAMjXW5dfpV4qew',
                    events: {
                        googleCalendarId: '6au3emlgjfair5hjhiegs48tcg@group.calendar.google.com'
                    },
                    eventClick: function(event) {
                        // opens events in a popup window
                        window.open(event.url, 'gcalevent', 'width=700,height=600');
                        return false;
                    },

                    loading: function(bool) {
                        $('#loading').toggle(bool);
                    }
                });
            });
        </script>
    <?php } ?>
    </body>

    </html>