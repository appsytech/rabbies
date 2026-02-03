@extends('admin.layouts.auth')
@section('title', 'Forgot')

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
            <!--=======  Card =====-->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <div class="flex justify-center items-center mb-3">
                    <div class="w-18 h-18 rounded-lg flex items-center justify-center shadow-lg">
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2022/04/14/A-Symbol-Company-Logo-Design-Vector-Graphics-28995233-3-580x387.jpg"
                            alt="Logo" class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Forgot Password</h1>
                    <p class="text-gray-600">Enter your email to recover your account</p>
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

                    <!--======== Reset link send Button ===========-->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium cursor-pointer hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center gap-2 transform hover:scale-105 hover:shadow-lg group/signin">
                        Send Reset Link
                        <img src="{{ asset('assets/svg/arrow-right-white.svg') }}"
                            class="w-5 h-5 pointer-events-none transition-all duration-300 group-hover/signin:translate-x-2">
                    </button>

                    <!--========== Sign Up Link ========-->
                    <p class="text-center text-sm text-gray-600 mt-6">
                        <a href="{{ route('login') }}"
                            class="flex items-center justify-center gap-1 font-medium text-blue-600 hover:text-blue-700 group">
                            Back to Login
                            <img src="{{ asset('assets/svg/arrow-right-blue.svg') }}"
                                class="w-4 h-4 pointer-events-none transition-all duration-200 group-hover:translate-x-1">
                        </a>
                    </p>
                </form>
            </div>

            <!--======= Footer =======-->
            <p class="text-center text-sm text-gray-500 mt-6">
                © 2025 Buddha School. All rights reserved.
            </p>
        </div>
    </div>
@endsection
