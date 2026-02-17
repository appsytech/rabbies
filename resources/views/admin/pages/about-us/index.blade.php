@extends('admin.layouts.main')
@section('title', 'About us')


@section('breadcrumb')
<!--================= Breadcrumb ==================-->
<div class="p-4 bg-gray-50 ">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li>
                <span class="mx-2">/</span>
            </li>
            <li class="text-gray-700">About us</li>
        </ol>
    </nav>
</div>
@endsection


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

<!--================= Main content=== ===============-->
<main class="flex-1 overflow-y-auto bg-gray-50 p-2">

    <!--============= Table ==============-->
    <div class="rounded-sm shadow-md border border-gray-200">
        <div class="border-b border-gray-200">
            <!--=========== Filter Form ============-->
            <form method="GET" action="{{ route('activity.index') }}" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        <!--==== Title Filter ====-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/hash.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Title
                            </label>
                            <div class="relative">
                                <input type="text" name="title"
                                    value="{{ isset($data['oldInputs']['title']) ? $data['oldInputs']['title'] : '' }}"
                                    placeholder="Title Filter"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>




                        <!--==== Search Button ====-->
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full cursor-pointer px-6 py-2.5 text-sm font-semibold text-white bg-linear-to-r from-blue-600 to-blue-700 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:scale-105 transform">
                                <img src="{{ asset('assets/svg/white-magnifier.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                                Search
                            </button>
                        </div>
                    </div>

                    <!--======== Action Buttons =========-->
                    <div class="col-span-4 xl:col-span-1  flex items-end justify-end">
                        <div class="flex gap-2">
                            <button type="reset"
                                class="text-sm cursor-pointer text-gray-600 hover:text-gray-700 font-medium flex items-center gap-1.5 px-3 py-2 hover:bg-gray-200 rounded-lg transition-colors">
                                <img src="{{ asset('assets/svg/setting-vertical.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                                Clear Filters
                            </button>

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-auto">
            <table class="w-full caption-bottom text-sm ">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="h-12 px-4 text-left font-semibold">
                            S.N
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Title
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Images 1
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Images 2
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Author
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Description
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Created At
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($data['aboutUs']->isNotEmpty())
                    @php
                    $sno = 1;
                    @endphp
                    @foreach ($data['aboutUs'] as $about)
                    <tr class="border-b border-gray-200">
                        <td class="p-4 text-xs">{{ $sno }}</td>

                        <td class="p-4 font-medium">
                            {{ $about->title }}
                        </td>

                        <td class="p-4">
                            @isset($about->images1)
                            <div class="flex space-x-1">
                                <img src="{{ asset('storage/' . $about->images1) }}" alt="Image"
                                    class="w-8 h-8 rounded">
                            </div>
                            @endisset
                        </td>


                        <td class="p-4">
                            @isset($about->images2)
                            <div class="flex space-x-1">
                                <img src="{{ asset('storage/' . $about->images2) }}" alt="Image"
                                    class="w-8 h-8 rounded">
                            </div>
                            @endisset
                        </td>


                        <td class="p-4">
                            {{ $about->author }}
                        </td>

                        <td class="p-4">
                            <p class="max-w-xs line-clamp-2 wrap-break-word overflow-hidden">
                                {{ \Illuminate\Support\Str::words($about->description, 30, '...') }}
                            </p>

                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-1">
                                <img src="{{ asset('assets/svg/calendar.svg') }}" class="w-3 h-3">
                                <span class="text-sm">{{ $about->created_at }}</span>
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <form action="{{ route('about-us.edit', ['id' => $about->id]) }}"
                                    method="GET">
                                    <button type="submit" class="h-4 w-4 cursor-pointer">
                                        <img src="{{ asset('assets/svg/pencil.svg') }}"
                                            class="pointer-events-none">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @php
                    $sno++;
                    @endphp
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>


    </div>
</main>


@endsection