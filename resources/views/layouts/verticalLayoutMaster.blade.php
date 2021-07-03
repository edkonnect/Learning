<body
    class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif"
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        @include('panels.navbar')
    </header>
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    @include('panels.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            @if ($configData["navbarLarge"] === true)
            @if(($configData["mainLayoutType"]) === 'vertical-modern-menu')
            {{-- navabar large  --}}
            <div
                class="content-wrapper-before @if(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData["navbarLargeColor"]}} @endif">
            </div>
            @else
            {{-- navabar large  --}}
            <div class="content-wrapper-before {{$configData["navbarLargeColor"]}}">
            </div>
            @endif
            @endif


            @if($configData["pageHeader"] === true && isset($breadcrumbs))
            {{--  breadcrumb --}}
            @include('panels.breadcrumb')
            @endif
            <div class="col s12">
                <div class="container">
                    {{-- main page content --}}
                    @yield('content')
                    {{-- right sidebar --}}
                    @include('pages.sidebar.right-sidebar')
                    @if($configData["isFabButton"] === true)
                    @include('pages.sidebar.fab-menu')
                    @endif
                </div>
                {{-- overlay --}}
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->


    @if($configData['isCustomizer'] === true)
    <!-- Theme Customizer -->
    @include('pages.partials.customizer')
    <!--/ Theme Customizer -->
    {{-- buy now button --}}
    @include('pages.partials.buy-now')
    @endif


    {{-- footer  --}}
    @include('panels.footer')
    {{-- vendor and page scripts --}}
    @include('panels.scripts')
</body>

<?php
$urlSeg1 = Request::segment(1);
$urlSeg2 = Request::segment(2);
$isAdmin = Auth::user()->is_admin;
?>

<script>
    $(document).ready(function () {
        $('.timepicker').timepicker();
    });
</script>
<script>
    var is_admin = '<?php echo $isAdmin; ?>';
    if (is_admin == 1) {
        $(".customAdminClass").css('display', 'block');
    } else {
        $(".customAdminClass").css('display', 'none');
    }
    var urlValue = "{{$urlSeg1}}";
    var urlValueSeg2 = "{{$urlSeg2}}";
    if (urlValue == "view-tutor-sessions") {
        $(".customAdminClass").addClass('open');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "homework-list") {
//                               $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "homework-upload") {
//                               $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValue == "getHomework") {
        $('.customClass').addClass('active');
        $(".customHomework").addClass('active open');
    }
    if (urlValueSeg2 == "getHomework") {
        $(".customClass").addClass('active open');
    }
//alert("am in");
</script>