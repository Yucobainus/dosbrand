<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/css/main.css') }}">
    <link rel="stylesheet" href="{{asset ('public/css/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/slick/slick-theme.css')}}">
    <link rel="shortcut icon" href="{{asset('public/img/favicon.ico')}}" type="image/x-icon">
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(69490102, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
            ecommerce: "dataLayer"
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/69490102" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7H5R05QTFE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-7H5R05QTFE');
    </script>
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1339843513074623');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1339843513074623&ev=PageView&noscript=1"
        /></noscript>
    <title>@yield('title-of-site')</title>
</head>

<body>

@yield('content')


@include('inc.footer')

@include('inc.modal')

<script src="{{asset('public/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('public/js/slick.min.js')}} "></script>
<script src="{{asset('public/js/script.js')}} "></script>
@yield('script')
</body>

</html>
