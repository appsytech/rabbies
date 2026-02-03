 @php
     $uniqueId = 'uid_' . uniqid();
 @endphp

 <div id="{{ $uniqueId }}" class="fixed inset-0 z-99 flex items-center justify-center p-4 backdrop-blur-md">
     <div class="relative max-w-4xl w-full">

         <!--===== Close Button ======-->
         <button type="button" data-targetModalId="{{ $uniqueId }}"
             class="close-modal absolute -top-4 -right-4 z-10 w-8 h-8 bg-white cursor-pointer rounded-full flex items-center justify-center shadow-xl hover:bg-red-50  transition-all duration-300 group border-2 border-gray-200">
             <img src="{{ asset('assets/svg/cross.svg') }}" class="w-4 h-4 pointer-events-none">
         </button>

         <!--====== Notice Image =======-->
         <div class="w-full">
             <img src="{{ $imagePath ?? '#' }}" alt="Notice"
                 class="w-full h-auto max-h-[90vh] object-contain shadow-2xl" />
         </div>
     </div>
 </div>
