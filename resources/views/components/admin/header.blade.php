 <!--====================== Header ================================-->
 <header class="h-20 border-b border-gray-200 px-4 md:px-8 grid grid-cols-2 shadow-sm shrink-0">

     <div class="col-span-1 max-w-2xl items-center flex ">
         <button
             class="lg:hidden toggle-sidebar p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors mr-4 cursor-pointer">
             <img src="{{ asset('assets/svg/menu.svg') }}" class="w-8 h-8 pointer-events-none">
         </button>
     </div>

     <div class="col-span-1 flex items-center justify-end gap-2 md:gap-4 ml-4 md:ml-6">
         <a href="{{ route('profile.index') }}"
             class="flex items-center justify-center gap-2 text-sm font-medium h-9 rounded-md px-3 cursor-pointer">
             <img src="{{ asset('assets/svg/user.svg') }}" class="w-4 h-4 mr-2 pointer-events-none">
         </a>

         <div class="flex items-center  border-l border-gray-300  cursor-pointer">
             <div class="relative group flex items-center space-x-2 pl-4  h-12">
                 @if (isset(Auth::user()->profile_image))
                     <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile"
                         class="h-8 w-8 rounded-full object-cover">
                 @endif


                 <div class="hidden md:block">
                     <div class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? '' }}</div>
                     <div class="text-xs text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                 </div>

                 <div
                     class="absolute right-4 top-7.75 z-50 mt-3 w-56 rounded-2xl bg-white/95 shadow-2xl border border-gray-200/50 hidden group-hover:block overflow-hidden">

                     <div class="p-2">
                         <a href="{{ route('profile.index') }}"
                             class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-linear-to-r hover:from-blue-50 hover:to-purple-50 transition-all {{ Route::currentRouteName() == 'profile.index' ? 'bg-linear-to-r from-blue-50 to-purple-50' : '' }} duration-200 group/item">
                             <div
                                 class="flex items-center justify-center w-9 h-9 rounded-lg bg-green-500 text-white group-hover/item:scale-110 transition-transform">
                                 <img src="{{ asset('assets/svg/user-white.svg') }}" class="w-5 h-5">
                             </div>
                             <span class="font-medium text-sm">Profile</span>
                         </a>

                         <a href="{{ route('profile.edit') }}"
                             class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-linear-to-r hover:from-blue-50 hover:to-purple-50  {{ Route::currentRouteName() == 'profile.edit' ? 'bg-linear-to-r from-blue-50 to-purple-50' : '' }} transition-all duration-200 group/item">
                             <div
                                 class="flex items-center justify-center w-9 h-9 rounded-lg bg-green-500 text-white group-hover/item:scale-110 transition-transform">
                                 <img src="{{ asset('assets/svg/setting-white.svg') }}" class="w-5 h-5">

                             </div>
                             <span class="font-medium text-sm">Settings</span>
                         </a>
                     </div>

                     <div class="h-px bg-linear-to-r from-transparent via-gray-300 to-transparent mx-4"></div>

                     <form method="POST" action="{{ route('logout') }}" class="p-2">
                         @csrf
                         <button type="submit"
                             class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-600 hover:bg-linear-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-200 group/item cursor-pointer">
                             <div
                                 class="flex items-center justify-center w-9 h-9 pointer-events-none rounded-lg bg-linear-to-br from-red-100 to-red-200 text-red-600 group-hover/item:scale-110 transition-transform">
                                 <img src="{{ asset('assets/svg/exit-red.svg') }}" class="w-5 h-5 pointer-events-none">
                             </div>
                             <span class="font-semibold text-sm pointer-events-none">Logout</span>
                         </button>
                     </form>
                 </div>
             </div>

             <form action="{{ route('logout') }}" method="POST" class="ml-2 hidden md:block">
                 @csrf
                 <button type="submit"
                     class="relative  flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 cursor-pointer hover:border-gray-300 hover:shadow-md transition-all duration-200">
                     <img src="{{ asset('assets/svg/exit.svg') }}" class="w-4 h-4 pointer-events-none">
                     <span>Logout</span>
                 </button>
             </form>
         </div>
     </div>
 </header>
