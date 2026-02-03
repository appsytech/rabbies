@extends('admin.layouts.auth')
@section('title', 'Login')

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

    <div class="min-h-screen w-full flex justify-center items-center">
        <div class="w-full max-w-md">
            <!--======= Login Card =====-->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <div class="flex justify-center items-center mb-3">
                    <div class="w-18 h-18 rounded-lg flex items-center justify-center shadow-lg">
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2022/04/14/A-Symbol-Company-Logo-Design-Vector-Graphics-28995233-3-580x387.jpg"
                            alt="Logo" class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                    <p class="text-gray-600">Sign in to your account to continue</p>
                </div>
                <form action="{{ route('login.proceed') }}" method="POST" class="space-y-5">
                    @csrf
                    <!--===== Email Field =====-->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <img src="{{ asset('assets/svg/mail-light-gray.svg') }}"
                                    class="w-5 h-5 pointer-events-none">
                            </div>
                            <input type="email" placeholder="Enter your email" name="credential" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!--===== Password Field ======-->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <img src="{{ asset('assets/svg/lock-light-gray.svg') }}"
                                    class="w-5 h-5 pointer-events-none">
                            </div>
                            <input id="password-field" type="password" placeholder="Enter your password" name="password"
                                required
                                class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="button" data-targetId="password-field"
                                data-eye="{{ asset('assets/svg/eye-light-gray.svg') }}"
                                data-eyeoff="{{ asset('assets/svg/eye-off-light-gray.svg') }}"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer toggle-password-field">
                                <img src="{{ asset('assets/svg/eye-light-gray.svg') }}"
                                    class="w-5 h-5 pointer-events-none toggle-password-icon">
                            </button>
                        </div>
                    </div>

                    <!--======= Remember me & Forgot password ======-->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Remember me</span>
                        </label>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">Forgot
                            password?</a>
                    </div>

                    <!--======== Sign In Button ===========-->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium cursor-pointer hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center gap-2 transform hover:scale-105 hover:shadow-lg group/signin">
                        Sign In
                        <img src="{{ asset('assets/svg/arrow-right-white.svg') }}"
                            class="w-5 h-5 pointer-events-none transition-all duration-300 group-hover/signin:translate-x-2">
                    </button>

                    <!--========== Sign Up Link ========-->
                    {{-- <p class="text-center text-sm text-gray-600 mt-6">
                        Don't have an account?
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-700">Sign up</a>
                    </p> --}}
                </form>
            </div>

            <!--======= Footer =======-->
            <p class="text-center text-sm text-gray-500 mt-6">
                © 2025 Buddha School. All rights reserved.
            </p>
        </div>
    </div>
@endsection
