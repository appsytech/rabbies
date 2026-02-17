<!-- ======================= Sidebar =========================================== -->
<aside id="sidebar"
    class="fixed lg:relative w-64 bg-white border-gray-200 shadow-sm transition-all duration-300 h-screen overflow-hidden flex flex-col shrink-0 z-40 -translate-x-full lg:translate-x-0">
    <div class="h-20 flex items-center justify-between px-6 border-b border-gray-200 shrink-0">
        <a id="logo" href="#" class="flex items-center space-x-2  p-2">
            <div class="w-14 h-14 flex items-center justify-center">
                <img src="https://www.creativefabrica.com/wp-content/uploads/2022/04/14/A-Symbol-Company-Logo-Design-Vector-Graphics-28995233-3-580x387.jpg"
                    class="w-14 rounded-sm" />
            </div>
            <span class="text-xl font-bold text-[#344256]">Admin</span>
        </a>

        <button
            class="toggle-sidebar cursor-pointer p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors mr-4">
            <img src="{{ asset('assets/svg/menu.svg') }}" class="min-w-6 min-h-6 pointer-events-none">
        </button>
    </div>

    <!--========== Search Bar ===========-->
    <div id="search-bar" class="p-4">
        <div class="relative">
            <img src="{{ asset('assets/svg/magnifier.svg') }}"
                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4" alt="">
            <input type="text"
                class="w-full pl-9 pr-3 py-2 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                placeholder="Search..." />
        </div>
    </div>

    <!--========== Navigation ===========-->
    <nav class="p-4 space-y-1 flex-1 overflow-y-auto">

        <!--========== Home ===========-->
        <div>
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium  rounded-lg hover:bg-[#EEF2FF] transition-colors {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-100 text-black' : 'text-gray-700' }}">
                <img src="{{ asset('assets/svg/home.svg') }}" class="h-5 w-5 pointer-events-none">
                <span class="sidebar-text">Home</span>
            </a>
        </div>

        <!--========== Service ===========-->
        <div>
            <a href="{{ route('service.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium  rounded-lg hover:bg-[#EEF2FF] transition-colors {{ Route::currentRouteName() == 'service.index' || Route::currentRouteName() == 'service.edit'  ? 'bg-blue-100 text-black' : 'text-gray-700' }}">
                <img src="{{ asset('assets/svg/package.svg') }}" class="h-5 w-5 pointer-events-none">
                <span class="sidebar-text">Service</span>
            </a>
        </div>

        <!--========== Home ===========-->
        <div>
            <a href="{{ route('inquiry.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium  rounded-lg hover:bg-[#EEF2FF] transition-colors {{ Route::currentRouteName() == 'inquiry.index' || Route::currentRouteName() == 'inquiry.edit'  ? 'bg-blue-100 text-black' : 'text-gray-700' }}">
                <img src="{{ asset('assets/svg/message-circle.svg') }}" class="h-5 w-5 pointer-events-none">
                <span class="sidebar-text">Inquiry </span>
            </a>
        </div>

        <!--========== Extra Events ===========-->
        <div>
            <button id="extra-events"
                class="has-submenu w-full flex items-center justify-between px-4 py-3 cursor-pointer text-sm font-medium text-gray-700 rounded-lg hover:bg-[#EEF2FF] transition-all {{ Route::currentRouteName() == 'activity.index' || Route::currentRouteName() == 'activity.edit' || Route::currentRouteName() == 'package.index' || Route::currentRouteName() == 'package.edit' || Route::currentRouteName() == 'publication.index' || Route::currentRouteName() == 'publication.edit' ? 'bg-blue-100 text-black' : 'text-gray-700' }}">
                <div class="flex items-center gap-3 pointer-events-none">
                    <img src="{{ asset('assets/svg/calendar-check.svg') }}" class="w-5 h-5 pointer-events-none">
                    <span class="sidebar-text pointer-events-none">Extra Events</span>
                </div>
                <img id="extra-events-icon" src="{{ asset('assets/svg/cheveron-right.svg') }}"
                    class="sidebar-submenu-icon w-4 h-4 transition-transform duration-200 sidebar-text pointer-events-none {{ Route::currentRouteName() == 'activity.index' || Route::currentRouteName() == 'activity.edit' || Route::currentRouteName() == 'package.index' || Route::currentRouteName() == 'package.edit' || Route::currentRouteName() == 'publication.index' || Route::currentRouteName() == 'publication.edit' ? 'rotate-90' : '' }}">
            </button>

            <div id="extra-events-submenu"
                class="{{ Route::currentRouteName() == 'activity.index' || Route::currentRouteName() == 'activity.edit' || Route::currentRouteName() == 'package.index' || Route::currentRouteName() == 'package.edit' || Route::currentRouteName() == 'publication.index' || Route::currentRouteName() == 'publication.edit' ? '' : 'hidden' }} mt-1 ml-11 space-y-1 sidebar-submenu">
                <a href="{{ route('activity.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'activity.index' || Route::currentRouteName() == 'activity.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Activity
                </a>

                <a href="{{ route('package.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'package.index' || Route::currentRouteName() == 'package.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Package
                </a>

                <a href="{{ route('publication.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'publication.index' || Route::currentRouteName() == 'publication.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Publication
                </a>

            </div>
        </div>


        <!--========== Setting Config ===========-->
        <div>
            <button id="setting"
                class="has-submenu w-full flex items-center justify-between px-4 py-3 cursor-pointer text-sm font-medium text-gray-700 rounded-lg hover:bg-[#EEF2FF] transition-all {{ Route::currentRouteName() == 'admin.index' || Route::currentRouteName() == 'admin.edit' || Route::currentRouteName() == 'homepage-slider.index' || Route::currentRouteName() == 'homepage-slider.edit' || Route::currentRouteName() == 'about-us.index' || Route::currentRouteName() == 'about-us.edit' || Route::currentRouteName() == 'about-feature.index' || Route::currentRouteName() == 'about-feature.edit' || Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit'  ? 'bg-blue-100 text-black' : 'text-gray-700' }}">
                <div class="flex items-center gap-3 pointer-events-none">
                    <img src="{{ asset('assets/svg/setting.svg') }}" class="w-5 h-5 pointer-events-none">
                    <span class="sidebar-text pointer-events-none">Settings</span>
                </div>
                <img id="setting-icon" src="{{ asset('assets/svg/cheveron-right.svg') }}"
                    class="sidebar-submenu-icon w-4 h-4 transition-transform duration-200 sidebar-text pointer-events-none {{ Route::currentRouteName() == 'admin.index' || Route::currentRouteName() == 'admin.edit' || Route::currentRouteName() == 'homepage-slider.index' || Route::currentRouteName() == 'homepage-slider.edit' || Route::currentRouteName() == 'about-us.index' || Route::currentRouteName() == 'about-us.edit' || Route::currentRouteName() == 'about-feature.index' || Route::currentRouteName() == 'about-feature.edit' || Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit'  ? 'rotate-90' : '' }}">
            </button>

            <div id="setting-submenu"
                class="{{ Route::currentRouteName() == 'admin.index' || Route::currentRouteName() == 'admin.edit' || Route::currentRouteName() == 'homepage-slider.index' || Route::currentRouteName() == 'homepage-slider.edit' || Route::currentRouteName() == 'about-us.index' || Route::currentRouteName() == 'about-us.edit' || Route::currentRouteName() == 'about-feature.index' || Route::currentRouteName() == 'about-feature.edit' || Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit'  ? '' : 'hidden' }} mt-1 ml-11 space-y-1 sidebar-submenu">
                <a href="{{ route('admin.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'admin.index' || Route::currentRouteName() == 'admin.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Admin
                </a>

                <a href="{{ route('homepage-slider.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'homepage-slider.index' || Route::currentRouteName() == 'homepage-slider.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Home Slider
                </a>

                <a href="{{ route('about-us.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'about-us.index' || Route::currentRouteName() == 'about-us.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    About us
                </a>
                <a href="{{ route('about-feature.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'about-feature.index' || Route::currentRouteName() == 'about-feature.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    About us Features
                </a>
                <a href="{{ route('gallery.index') }}" data-nav
                    class="block px-4 py-2 text-sm  rounded-lg hover:bg-[#EEF2FF] {{ Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit' ? 'bg-blue-100 text-black is_active' : 'text-gray-700' }} hover:text-gray-900 transition-colors">
                    Gallery
                </a>
            </div>
        </div>
    </nav>

    <!--=== Logout Button at Bottom ===-->
    <form action="{{ route('logout') }}" method="POST"
        class="p-4 border-t border-gray-200  transition-all duration-300 shrink-0" id="logout-container">
        @csrf
        <button type="submit"
            class="w-full cursor-pointer flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md transition-all duration-200">
            <img src="{{ asset('assets/svg/exit.svg') }}" class="w-4 h-4 shrink-0 text-gray-600  pointer-events-none">
            <span class="sidebar-text pointer-events-none">Logout</span>
        </button>
    </form>
</aside>