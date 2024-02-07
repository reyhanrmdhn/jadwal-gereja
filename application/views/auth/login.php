<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>Login Admin</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="<?= base_url(); ?>assets/admin/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="shortcut icon" href="<?= $page_setting->favicon ?>" type="image/x-icon"> -->


</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(<?= base_url(); ?>assets/admin/app/media/img//bg/bg.jpg);background-size:cover">
            <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__logo">
                        <a href="#">
                            <img src="<?= base_url(); ?>assets/admin/app/media/img/logos/firstpagelogo.png" style="max-width: 100px;">
                        </a>
                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Sign In To Admin</h3>
                        </div>
                        <?= form_open('gotoadminpage', 'class="m-login__form m-form"'); ?>
                        <?php if (validation_errors()) : ?>
                            <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> <span> <?= validation_errors('<li>', '</li>') ?></span>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="on">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="m-login__form-action">
                            <input type="submit" value="Sign In" name="submit" id="m_login_signin_submit" class="btn  m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Page -->
    <!--begin::Base Scripts -->
    <script src="<?= base_url(); ?>assets/admin/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Snippets -->
    <!--     <script src="<?= base_url(); ?>assets/admin/snippets/custom/pages/user/login.js" type="text/javascript"></script> -->
    <!--end::Page Snippets -->
    <script type="text/javascript">
        // Set the date and time to count down to (500 seconds from current date and time)
        var timeleft = document.getElementById("count_login").getAttribute("data-time").trim();
        const countDownDate = new Date().getTime() + (timeleft * 1000);

        // Update the count down every 1 second
        const countdownTimer = setInterval(function() {

            // Get the current date and time
            const now = new Date().getTime();

            // Calculate the remaining time in milliseconds
            const remainingTime = countDownDate - now;

            // Calculate remaining seconds
            const seconds = Math.floor(remainingTime / 1000);

            // Calculate remaining minutes
            const minutes = Math.floor(seconds / 60);

            // Format remaining time in minutes and seconds
            const formattedTime = ("0" + minutes).slice(-2) + ":" + ("0" + (seconds % 60)).slice(-2);

            // Display the remaining time in the countdown element
            document.getElementById("count_login").innerHTML = formattedTime;

            // If the countdown is finished, display "EXPIRED" and clear the interval
            if (remainingTime < 0) {
                clearInterval(countdownTimer);
                location.reload();
            }
        }, 1000);
    </script>
</body>
<!-- end::Body -->

</html>