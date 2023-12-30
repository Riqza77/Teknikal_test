<!DOCTYPE html>
<html lang="en">

    <head>
        <title>{{ $judul }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v18/images/icons/favicon.ico" />

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/vendor/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v18/vendor/animate/animate.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/vendor/css-hamburgers/hamburgers.min.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/vendor/animsition/css/animsition.min.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/vendor/select2/select2.min.css">

        <link rel="stylesheet" type="text/css"
            href="https://colorlib.com/etc/lf/Login_v18/vendor/daterangepicker/daterangepicker.css">

        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v18/css/util.css">
        <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v18/css/main.css">

        {{-- sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <meta name="robots" content="noindex, follow">
        <script nonce="09909767-502e-436f-9dd9-5c469a8c0d12">
            (function(w, d) {
                ! function(dp, dq, dr, ds) {
                    dp[dr] = dp[dr] || {};
                    dp[dr].executed = [];
                    dp.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    dp.zaraz.q = [];
                    dp.zaraz._f = function(dt) {
                        return async function() {
                            var du = Array.prototype.slice.call(arguments);
                            dp.zaraz.q.push({
                                m: dt,
                                a: du
                            })
                        }
                    };
                    for (const dv of ["track", "set", "debug"]) dp.zaraz[dv] = dp.zaraz._f(dv);
                    dp.zaraz.init = () => {
                        var dw = dq.getElementsByTagName(ds)[0],
                            dx = dq.createElement(ds),
                            dy = dq.getElementsByTagName("title")[0];
                        dy && (dp[dr].t = dq.getElementsByTagName("title")[0].text);
                        dp[dr].x = Math.random();
                        dp[dr].w = dp.screen.width;
                        dp[dr].h = dp.screen.height;
                        dp[dr].j = dp.innerHeight;
                        dp[dr].e = dp.innerWidth;
                        dp[dr].l = dp.location.href;
                        dp[dr].r = dq.referrer;
                        dp[dr].k = dp.screen.colorDepth;
                        dp[dr].n = dq.characterSet;
                        dp[dr].o = (new Date).getTimezoneOffset();
                        if (dp.dataLayer)
                            for (const dC of Object.entries(Object.entries(dataLayer).reduce(((dD, dE) => ({
                                    ...dD[1],
                                    ...dE[1]
                                })), {}))) zaraz.set(dC[0], dC[1], {
                                scope: "page"
                            });
                        dp[dr].q = [];
                        for (; dp.zaraz.q.length;) {
                            const dF = dp.zaraz.q.shift();
                            dp[dr].q.push(dF)
                        }
                        dx.defer = !0;
                        for (const dG of [localStorage, sessionStorage]) Object.keys(dG || {}).filter((dI => dI
                            .startsWith("_zaraz_"))).forEach((dH => {
                            try {
                                dp[dr]["z_" + dH.slice(7)] = JSON.parse(dG.getItem(dH))
                            } catch {
                                dp[dr]["z_" + dH.slice(7)] = dG.getItem(dH)
                            }
                        }));
                        dx.referrerPolicy = "origin";
                        dx.src = "https://colorlib.com/etc/lf/Login_v18//cdn-cgi/zaraz/s.js?z=" + btoa(
                            encodeURIComponent(JSON.stringify(dp[dr])));
                        dw.parentNode.insertBefore(dx, dw)
                    };
                    ["complete", "interactive"].includes(dq.readyState) ? zaraz.init() : dp.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document);
        </script>
    </head>

    <body style="background-color: #666666;">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="post" action="/login">
                        @csrf
                        <span class="login100-form-title p-b-43">
                            Teknikal Test Fanetech
                        </span>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="name">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Name</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>

                    </form>
                    <div class="login100-more"
                        style="background-image: url('https://colorlib.com/etc/lf/Login_v18/images/bg-01.jpg');">
                    </div>
                </div>
            </div>
        </div>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/jquery/jquery-3.2.1.min.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/animsition/js/animsition.min.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/bootstrap/js/popper.js"></script>
        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/select2/select2.min.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/daterangepicker/moment.min.js"></script>
        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/vendor/countdowntime/countdowntime.js"></script>

        <script src="https://colorlib.com/etc/lf/Login_v18/js/main.js"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
        </script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
            integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
            data-cf-beacon='{"rayId":"83d614477d34211d","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
            crossorigin="anonymous"></script>
        @if (session()->has('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ session('success') }}"
                });
            </script>
        @endif
    </body>

</html>
