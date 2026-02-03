<!-- ==================== Loader =================== -->
<div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white/60">
    <div class="relative flex flex-col items-center gap-8">

        <!--=== Animated Dots ===-->
        <div class="flex flex-col items-center gap-3">
            <div class="flex gap-2">
                <span class="h-2 w-2 rounded-full bg-indigo-600 animate-bounce [animation-delay:oms]"></span>
                <span class="h-2 w-2 rounded-full bg-indigo-600 animate-bounce [animation-delay:150ms]"></span>
                <span class="h-2 w-2 rounded-full bg-indigo-600 animate-bounce [animation-delay:300ms]"></span>
            </div>
        </div>

        <!--===== Progress Bar ====-->
        <div class="w-64 h-1 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full bg-linear-to-r from-indigo-600 to-indigo-400"
                style="animation: slide-in-right 1.5s ease-in-out infinite;"></div>
        </div>
    </div>
</div>
