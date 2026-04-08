@extends('admin.layouts.main')
@section('title', '2fa')


@section('content')

<div id="popup-container" class="fixed top-5 right-5 space-y-2 z-50 flex flex-col gap-2">
    @if (session('success'))
    <x-alert-box type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <x-alert-box type="error" :message="$error" />
    @endforeach
    @endif
</div>

<div class="min-h-screen flex items-start justify-center ">

    <div class="w-full max-w-3xl">


        <!--======= Verify Card ======-->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 divide-x divide-gray-100">

                <!--=========== RIGHT: Verify ===========-->
                <div class="p-8 flex flex-col justify-center">

                    <div class="mb-6">
                        <h3 class="text-base font-semibold text-gray-900">Enter verification code</h3>
                        <p class="text-sm text-gray-500 mt-1">Open your authenticator app and enter the 6-digit code shown for this account.</p>
                    </div>

                    <form action="{{ route('google.2fa.disable', ['id' => $data['id'], 'role' => $data['role'] ?? '']) }}" method="POST">

                        @csrf
                        <!--======= OTP Input =========-->
                        <div class="mb-2">
                            <input
                                type="text"
                                maxlength="6"
                                placeholder="· · · · · ·"
                                name="otp"
                                required
                                class="otp-input w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all" />
                        </div>

                        <!--======= Timer =========-->
                        <div class="flex items-center gap-1.5 mb-6">
                            <span class="blink w-1.5 h-1.5 rounded-full bg-green-500 shrink-0"></span>
                            <p class="text-xs text-gray-400">Code refreshes every <span class="font-medium text-gray-600">30 seconds</span></p>
                        </div>

                        <!--======= Enable Button =========-->
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-semibold text-sm rounded-xl py-3 transition-all flex items-center justify-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Disable 2FA
                        </button>
                        <!-- <button class="w-full text-gray-400 hover:text-gray-600 text-sm py-2 font-medium transition-colors">
                            Cancel
                        </button> -->
                    </form>

                    <!-- Warning -->
                    <div class="mt-6 flex gap-2.5 bg-amber-50 border border-amber-100 rounded-xl p-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <p class="text-xs text-amber-700">Save your secret key somewhere safe. You'll need it to recover access if you lose your device.</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection