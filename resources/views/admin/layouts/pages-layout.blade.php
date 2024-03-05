<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('build/assets/images/fav-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/assets/images/fav-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/assets/images/fav-icon.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('build/admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('build/admin/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('build/admin/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/admin/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('build/admin/vendors/styles/style.css') }}" />



    @stack('stylesheets')
</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="{{ asset('build/assets/images/logo.png') }}" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
        </div>
    </div> --}}
    @php
        $isAdmin = Auth::user()->is_admin;
    @endphp
    @if ($isAdmin === 1)
        <div class="header">
            <div class="header-left">
                <div class="menu-icon bi bi-list"></div>
                <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            </div>
            <div class="header-right ">
                <div class="dashboard-setting user-notification">
                    <div class="dropdown d-none">
                        <a class="dropdown-toggle no-arrow" href="javascript:;" data-option=""
                            data-toggle="right-sidebar">
                            <i class="dw dw-settings2"></i>
                        </a>
                    </div>
                </div>
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-name">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('admin.dashboard.change.password') }}">
                                <i class="bi bi-gear-fill"></i>
                                Change Password
                            </a>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="dw dw-logout"></i>
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-sidebar ">
            <div class="sidebar-title">
                <h3 class="weight-600 font-16 text-blue">
                    Layout Settings
                    <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
                </h3>
                <div class="close-sidebar" data-toggle="right-sidebar-close">
                    <i class="icon-copy ion-close-round"></i>
                </div>
            </div>
            <div class="right-sidebar-body customscroll">
                <div class="right-sidebar-body-content">
                    <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-side-bar">
            <div class="brand-logo">
                <a href="{{ url('admin/dashboard/') }}">
                    <img src="{{ asset('build/assets/images/dashboard-area.png') }}" alt=""
                        class="dark-logo" />
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll ">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li>
                            <a href="{{ route('admin.dashboard.items.create') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-plus-circle"></span><span class="mtext">ADD ITEM</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" data-option="" class="dropdown-toggle">
                                <span class="micon bi bi-filter"></span></i><span class="mtext"
                                    style="font-size: 90%">Categories
                                    Manger</span>
                            </a>
                            <ul class="submenu">
                                <li> <a href="{{ url('admin/dashboard/categories/create') }}">ADD CATEGORY <i
                                            class="icon-copy bi bi-plus-circle"></i></i></i></a></li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('items.categories_items', ['id' => $category->id]) }}"">{{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.shipping') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-truck"></span><span class="mtext">Shipping Cost</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.orders') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-list-check"></span><span class="mtext">Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.users') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-people"></span><span class="mtext">Registered Users</span>
                            </a>
                        <li>
                            <a href="{{ route('admin.dashboard.contact') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-chat"></span><span class="mtext">Contact Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.coupons') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-ticket-perforated"></span><span class="mtext">Coupons</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.admins') }}" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-shield-lock"></span><span class="mtext">Roles Manger</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px ">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
                {{-- <div class="footer-wrap pd-20 mb-20 card-box">
                Made By
                <a style="text-decoration: none; color:brown" href="https://www.speed-advertising.com/"
                    target="_blank">Speed Advertising Agency</a>
            </div> --}}
            </div>
        </div>
    @else
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('home.page') }}";
            }, 0); // Redirect after 3 seconds
        </script>
    @endif
    <!-- js -->
    <script>
        const fileInputs = document.querySelectorAll('.file-input');
        const fileNames = document.querySelectorAll('.file-name');

        fileInputs.forEach((fileInput, i) => {
            fileInput.addEventListener('change', function() {
                const file = fileInputs[i].files[0];
                fileNames[i].textContent = file.name;
            });
        });
    </script>

    <!-- js -->

    <script src="{{ asset('build/admin/vendors/scripts/dashboard3.js') }}"></script>
    <script src="{{ asset('build/admin/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('build/admin/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('build/admin/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('build/admin/vendors/scripts/layout-settings.js') }}"></script>

    <script src="{{ asset('build/admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/admin/vendors/scripts/datatable-setting.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- buttons for Export datatable -->
    <script src="{{ asset('build/admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Get the current URL
            var currentUrl = window.location.href;

            // Iterate through each anchor tag in the menu
            $('#accordion-menu a').each(function() {
                // Check if the anchor's href matches the current URL
                if ($(this).attr('href') === currentUrl) {
                    // Add the 'active' class to the anchor tag
                    $(this).addClass('active');

                    // Add the 'show' class to the parent li
                    $(this).closest('li').addClass('show');

                    // Change the data-option attribute value to "off"
                    $(this).attr('data-option', 'off');

                    // Trigger the click event on the parent li to keep the dropdown open
                    $(this).closest('li.dropdown').find('> a').click();
                } else {
                    // Change the data-option attribute value to "on" for other elements
                    $(this).attr('data-option', 'on');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
