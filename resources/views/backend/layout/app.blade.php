<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Smart ERP</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {{-- summernote --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css"
        integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/ace.min.css') }}" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
   <link rel="stylesheet" href="{{ asset('backend/assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
  <![endif]-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/ace-rtl.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote.min.css') }}" /> --}}

    <!--[if lte IE 9]>
  <link rel="stylesheet" href="{{ asset('backend/assets/css/ace-ie.min.css') }}" />
  <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('backend/assets/js/ace-extra.min.js') }}"></script>


    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
  <script src="{{ asset('backend/assets/js/html5shiv.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/respond.min.js') }}"></script>
  <![endif]-->
</head>



<body class="no-skin">
    @include('backend.layout.header')

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        @include('backend.layout.sidebar')

        @yield('content')
        @include('backend.layout.footer')



        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset('backend/assets/js/jquery-2.1.4.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/js/summernote.min.js') }}"></script> --}}
    <!-- <![endif]-->

    <!--[if IE]>
<script src="{{ asset('backend/assets/js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
                "<script src='{{ asset('backend/assets/js/jquery.mobile.custom.min.js') }}" > "+" < "+" / script > ");
    </script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
  <script src="{{ asset('backend/assets/js/excanvas.min.js') }}"></script>
  <![endif]-->
    <script src="{{ asset('backend/assets/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.sparkline.index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.flot.resize.min.js') }}"></script>
    //

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
        integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function() {
            // if (window.location.href.indexOf("admin/product-config/products") === -1) {

            preventIncDecOnMouseWheel();

            $('.summernote').summernote({
                placeholder: 'Write Here .....',
                height: 200
            });

            // }
        });

        function preventIncDecOnMouseWheel() {
            $('input[type="number"]').on('wheel', function(e) {
                e.preventDefault();
            });
        }
    </script>



    <!-- ace scripts -->
    <script src="{{ asset('backend/assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/ace.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $('.easy-pie-chart.percentage').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css(
                    'color') : 'rgba(255,255,255,0.95)');
                var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' :
                    '#E2E2E2';
                var size = parseInt($(this).data('size')) || 50;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size / 10),
                    animate: ace.vars['old_ie'] ? false : 1000,
                    size: size
                });
            })

            $('.sparkline').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                $(this).sparkline('html', {
                    tagValuesAttribute: 'data-values',
                    type: 'bar',
                    barColor: barColor,
                    chartRangeMin: $(this).data('min') || 0
                });
            });


            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
            //but sometimes it brings up errors with normal resize event handlers
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({
                'width': '90%',
                'min-height': '150px'
            });
            var data = [{
                label: "social networks",
                data: 38.7,
                color: "#68BC31"
            }, {
                label: "search engines",
                data: 24.5,
                color: "#2091CF"
            }, {
                label: "ad campaigns",
                data: 8.2,
                color: "#AF4E96"
            }, {
                label: "direct traffic",
                data: 18.6,
                color: "#DA5430"
            }, {
                label: "other",
                data: 10,
                color: "#FEE074"
            }]

            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt: 0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin: [-30, 15]
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            /**
            we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
            so that's not needed actually.
            */
            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            //pie chart tooltip example
            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo(
                'body');
            var previousPoint = null;

            placeholder.on('plothover', function(event, pos, item) {
                if (item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({
                        top: pos.pageY + 10,
                        left: pos.pageX + 10
                    });
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            /////////////////////////////////////
            $(document).one('ajaxloadstart.page', function(e) {
                $tooltip.remove();
            });




            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }

            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }

            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }


            var sales_charts = $('#sales-charts').css({
                'width': '100%',
                'height': '220px'
            });
            $.plot("#sales-charts", [{
                label: "Domains",
                data: d1
            }, {
                label: "Hosting",
                data: d2
            }, {
                label: "Services",
                data: d3
            }], {
                hoverable: true,
                shadowSize: 0,
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                },
                xaxis: {
                    tickLength: 0
                },
                yaxis: {
                    ticks: 10,
                    min: -2,
                    max: 2,
                    tickDecimals: 3
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: '#555'
                }
            });


            $('#recent-box [data-rel="tooltip"]').tooltip({
                placement: tooltip_placement
            });

            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('.tab-content')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                return 'left';
            }


            $('.dialogs,.comments').ace_scroll({
                size: 300
            });


            //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
            //so disable dragging when clicking on label
            var agent = navigator.userAgent.toLowerCase();
            if (ace.vars['touch'] && ace.vars['android']) {
                $('#tasks').on('touchstart', function(e) {
                    var li = $(e.target).closest('#tasks li');
                    if (li.length == 0) return;
                    var label = li.find('label.inline').get(0);
                    if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
                });
            }

            $('#tasks').sortable({
                opacity: 0.8,
                revert: true,
                forceHelperSize: true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                stop: function(event, ui) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            });
            $('#tasks').disableSelection();
            $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
                if (this.checked) $(this).closest('li').addClass('selected');
                else $(this).closest('li').removeClass('selected');
            });


            //show the dropdowns on top or bottom depending on window height and menu position
            $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
                var offset = $(this).offset();

                var $w = $(window)
                if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                    $(this).addClass('dropup');
                else $(this).removeClass('dropup');
            });

        })
    </script>
</body>

</html>
