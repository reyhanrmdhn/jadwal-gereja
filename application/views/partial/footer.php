<footer>
    <div class="copyright">
        <div class="container">
            <p class="text-center">Copyright © <?= date('Y');?> All rights reserved</p>
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
<?php if ($this->router->fetch_class('Home') && $this->router->fetch_method('event_calendar')) { ?>
    <script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/fullcalendar.js"></script>
    <script src="<?= base_url('assets/') ?>js/gcal.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#event-calendar').fullCalendar({
                googleCalendarApiKey: 'AIzaSyDnqCGVd6jOHXlJG2HYJ0DRXpXrFS-4o7k',
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