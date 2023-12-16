<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Muhammet Ali Fidan - Blog Sitesi">
    <meta name="author" content="www.muhammetalifidan.com.tr">

    @stack('title')

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="{{asset('assets/frontend/css/fonts.googleapis.com.css')}}"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.compat.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/theme-shop.css')}}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/blog.css')}}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{asset('assets/frontend/css/blog-skin.css')}}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}" type="text/css">

    @stack('customCss')

    <!-- Head Libs -->
    <script src="{{asset('assets/frontend/js/modernizr.min.js')}}"></script>

</head>

<body>

    <div class="body">

        @include('frontend.inc.navigation')

        @yield('content')

        @include('frontend.inc.footer')
    </div>

    @stack('customJs')

    <!-- Vendor -->
    <script src="{{asset('assets/frontend/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/particles.min.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('assets/frontend/js/theme.js')}}"></script>

    <!-- Demo -->
    <script src="{{asset('assets/frontend/js/blog.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('assets/frontend/js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('assets/frontend/js/theme.init.js')}}"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> --}}
    <script>
        /*
    			Map Settings

    				Find the Latitude and Longitude of your address:
    					- https://www.latlong.net/
    					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

    			*/

        // Map Markers
        var mapMarkers = [{
            address: "New York, NY 10017",
            html: "<strong>Porto</strong><br>New York, NY 10017",
            icon: {
                image: "img/demos/business-consulting-4/map-pin.png",
                iconsize: [31, 40],
                iconanchor: [14, 40]
            },
            popup: false
        }, {
            address: "Chicago, IL",
            html: "<strong>Porto</strong><br>Chicago, IL",
            icon: {
                image: "img/demos/business-consulting-4/map-pin.png",
                iconsize: [31, 40],
                iconanchor: [14, 40]
            },
            popup: false
        }, {
            address: "Louisville",
            html: "<strong>Porto</strong><br>Louisville",
            icon: {
                image: "img/demos/business-consulting-4/map-pin.png",
                iconsize: [31, 40],
                iconanchor: [14, 40]
            },
            popup: false
        }];

        // Map Initial Location
        var initLatitude = 40.75198;
        var initLongitude = -73.96978;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: (($.browser.mobile) ? false : true),
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 5
        };

        var map = $('#googlemaps').gMap(mapSettings),
            mapRef = $('#googlemaps').data('gMap.reference');

        var mapRef = $('#googlemaps').data('gMap.reference');

        // Styles from https://snazzymaps.com/
        var styles = [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e9e9e9"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#F4F9FD"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 29
            }, {
                "weight": 0.2
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 18
            }]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 16
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#F4F9FD"
            }, {
                "lightness": 21
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#dedede"
            }, {
                "lightness": 21
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }, {
                "lightness": 16
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
            }, {
                "color": "#333333"
            }, {
                "lightness": 40
            }]
        }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f2f2f2"
            }, {
                "lightness": 19
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#fefefe"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#fefefe"
            }, {
                "lightness": 17
            }, {
                "weight": 1.2
            }]
        }];

        var styledMap = new google.maps.StyledMapType(styles, {
            name: 'Styled Map'
        });

        mapRef.mapTypes.set('map_style', styledMap);
        mapRef.setMapTypeId('map_style');
    </script>

</body>

</html>
