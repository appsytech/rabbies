@extends('admin.layouts.main')
@section('title', 'Dashboard')

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

    <!--============= Summary Cards ==============-->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">

        <!--======== Card =========-->
        <div
            class="rounded-lg border bg-[#F8FAFC] border-[#e4e4e780] shadow-sm group relative overflow-hidden hover:shadow-md transition-all duration-500 hover:-translate-y-1 p-6">
            <div class="flex items-start justify-between">
                <div class="space-y-2">
                    <p class="text-sm font-medium text-[#65758b]">Total Teachers</p>
                    <p class="text-3xl font-bold tracking-tight">
                        {{  $data['totalTeachers'] ?? 0  }}
                    </p>

                    <div class="flex items-center gap-1">
                        <span class="text-xs text-gray-500">Active Teachers</span>
                    </div>

                </div>
                <div
                    class="rounded-2xl bg-blue-500 text-white p-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-[#6547fa1a]">
                    <img src="{{ asset('assets/svg/graduation-cap-white.svg') }}">
                </div>
            </div>
        </div>

       

        <!--======== Card =========-->
        <div
            class="rounded-lg border bg-[#F8FAFC] border-[#e4e4e780] shadow-sm group relative overflow-hidden  hover:shadow-md transition-all duration-500 hover:-translate-y-1 p-6">
            <div class="flex items-start justify-between">
                <div class="space-y-2">
                    <p class="text-sm font-medium text-[#65758b]">Admins</p>
                    <p class="text-3xl font-bold tracking-tight">
                         {{  $data['totalAdmins'] ?? 0  }}
                    </p>

                    {{-- <div class="flex items-center gap-1">
                        <span
                            class="text-xs font-semibold px-2 py-0.5 rounded-full text-green-600 bg-green-50 border border-green-200">
                            +12
                        </span>
                        <span class="text-xs text-gray-500">active admins</span>
                    </div> --}}

                </div>
                <div
                    class="rounded-2xl bg-blue-500 text-white p-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-[#6547fa1a]">
                    <img src="{{ asset('assets/svg/shield-user-white.svg') }}">
                </div>
            </div>
        </div>

        <!--======== Card =========-->
        <div
            class="rounded-lg border bg-[#F8FAFC] border-[#e4e4e780] shadow-sm group relative overflow-hidden  hover:shadow-md transition-all duration-500 hover:-translate-y-1 p-6">
            <div class="flex items-start justify-between">
                <div class="space-y-2">
                    <p class="text-sm font-medium text-[#65758b]">Total Login Time</p>
                    <p class="text-3xl font-bold tracking-tight">
                        1,284
                    </p>

                    <div class="flex items-center gap-1">
                        <span
                            class="text-xs font-semibold px-2 py-0.5 rounded-full text-green-600 bg-green-50 border border-green-200">
                            +124 hrs
                        </span>
                        <span class="text-xs text-gray-500">this month</span>
                    </div>

                </div>
                <div
                    class="rounded-2xl bg-blue-500 text-white p-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-[#6547fa1a]">
                    <img src="{{ asset('assets/svg/clock-white.svg') }}">
                </div>
            </div>
        </div>

    </div>

    <!--============= Table ==============-->
    {{-- <div class="space-y-6 p-3">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Recent Activities</h2>
            <div class="flex items-center space-x-2">
                <button
                    class="flex  items-center justify-center gap-2 whitespace-nowrap text-sm font-medium h-9 rounded-md px-3 cursor-pointer">
                    View All
                    <img src="{{ asset('assets/svg/arrow-right.svg') }}" class="w-4 h-4 ml-1 pointer-events-none">
                </button>
            </div>
        </div>

        <div class="overflow-auto rounded-lg shadow-md border border-gray-200">
            <table class="w-full caption-bottom text-sm ">
                <thead>
                    <tr class="border-b  border-gray-200">
                        <th class="h-12 px-4 text-left font-semibold">
                            S.N
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Title
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Description
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Location
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Date
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Time
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Status
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Category
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <!--====== row 1 =====-->
                    <tr class="border-b border-gray-200">
                        <td class="p-4 text-xs">1</td>

                        <td class="p-4 font-medium">
                            Student Admission
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            New student admitted to Grade 5
                        </td>

                        <td class="p-4">
                            Main Office
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-1">
                                <img src="{{ asset('assets/svg/calendar.svg') }}" class="w-3 h-3">
                                <span class="text-sm">Jan 1, 2026</span>
                            </div>
                        </td>

                        <td class="p-4 text-sm">
                            10:30 AM
                        </td>

                        <td class="p-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="h-1.5 w-1.5 rounded-full mr-2 bg-green-600"></span>
                                Active
                            </span>
                        </td>

                        <td class="p-4 text-sm">
                            Academic
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}">
                                </button>
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/bin.svg') }}">
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!--====== row 2 =====-->
                    <tr class="border-b  border-gray-200">
                        <td class="p-4 text-xs">2</td>

                        <td class="p-4 font-medium">
                            Student Admission
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            New student admitted to Grade 5
                        </td>

                        <td class="p-4">
                            Main Office
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-1">
                                <img src="{{ asset('assets/svg/calendar.svg') }}" class="w-3 h-3">
                                <span class="text-sm">Jan 1, 2026</span>
                            </div>
                        </td>

                        <td class="p-4 text-sm">
                            10:30 AM
                        </td>

                        <td class="p-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="h-1.5 w-1.5 rounded-full mr-2 bg-green-600"></span>
                                Active
                            </span>
                        </td>

                        <td class="p-4 text-sm">
                            Academic
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}">
                                </button>
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/bin.svg') }}">
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!--====== row 3 =====-->
                    <tr class="border-b  border-gray-200">
                        <td class="p-4 text-xs">3</td>

                        <td class="p-4 font-medium">
                            Student Admission
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            New student admitted to Grade 5
                        </td>

                        <td class="p-4">
                            Main Office
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-1">
                                <img src="{{ asset('assets/svg/calendar.svg') }}" class="w-3 h-3">
                                <span class="text-sm">Jan 1, 2026</span>
                            </div>
                        </td>

                        <td class="p-4 text-sm">
                            10:30 AM
                        </td>

                        <td class="p-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="h-1.5 w-1.5 rounded-full mr-2 bg-green-600"></span>
                                Active
                            </span>
                        </td>

                        <td class="p-4 text-sm">
                            Academic
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}">
                                </button>
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/bin.svg') }}">
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!--====== row 4 =====-->
                    <tr class="border-b  border-gray-200">
                        <td class="p-4 text-xs">4</td>

                        <td class="p-4 font-medium">
                            Student Admission
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            New student admitted to Grade 5
                        </td>

                        <td class="p-4">
                            Main Office
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-1">
                                <img src="{{ asset('assets/svg/calendar.svg') }}" class="w-3 h-3">
                                <span class="text-sm">Jan 1, 2026</span>
                            </div>
                        </td>

                        <td class="p-4 text-sm">
                            10:30 AM
                        </td>

                        <td class="p-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="h-1.5 w-1.5 rounded-full mr-2 bg-green-600"></span>
                                Active
                            </span>
                        </td>

                        <td class="p-4 text-sm">
                            Academic
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}">
                                </button>
                                <button class="h-4 w-4 cursor-pointer">
                                    <img src="{{ asset('assets/svg/bin.svg') }}">
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
