@extends('admin.layouts.main')
@section('title', 'Navigation Menu')


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
            <li class="text-gray-700">Navigation Menu</li>
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
            <form action="{{ route('navigation-menu.index') }}" method="GET" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        {{-- ====== Type ====== --}}
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/hamburger-menu.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Type
                            </label>
                            <div class="relative">
                                <select name="type"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="" selected>All</option>
                                    <option value="HOME" {{ ($data['oldInputs']['type'] ?? null) == 'HOME' ? 'selected' : '' }}>Home</option>
                                    <option value="ABOUT" {{ ($data['oldInputs']['type'] ?? null) == 'ABOUT' ? 'selected' : '' }}>About</option>
                                    <option value="ACTIVITY" {{ ($data['oldInputs']['type'] ?? null) == 'ACTIVITY' ? 'selected' : '' }}>Activity</option>
                                    <option value="CONTACT" {{ ($data['oldInputs']['type'] ?? null) == 'CONTACT' ? 'selected' : '' }}>Contact</option>
                                    <option value="BLOG" {{ ($data['oldInputs']['type'] ?? null) == 'BLOG' ? 'selected' : '' }}>Blog</option>
                                    <option value="NEWS" {{ ($data['oldInputs']['type'] ?? null) == 'NEWS' ? 'selected' : '' }}>News</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>



                        <!--==== Search Button ====-->
                        <div class="flex items-end">
                            <button
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
                            Type
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Sort
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Status
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['navigations'] as $navigation)
                    <tr class="border-b border-gray-200">
                        <td class="p-4 text-sm text-gray-700">
                            {{ $data['navigations']->firstItem() + $loop->index }}
                        </td>
                        <td class="p-4 text-sm text-gray-700">
                            {{ $navigation->title ?? '' }}
                        </td>
                        <td class="p-4 text-sm text-gray-700">
                            @if (isset($navigation->type))
                            <span class="capitalize">{{ $navigation->type }}</span>
                            @else
                            --no type--
                            @endif
                        </td>

                        <td class="p-4 text-sm text-gray-700">
                            {{ $navigation->sort ?? '' }}
                        </td>

                        <td class="p-4 text-sm text-gray-700">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input data-targetUrl="{{ route('navigation-menu.status.update') }}"
                                    data-targetId="{{ $navigation->id }}" data-csrf="{{ csrf_token() }}" type="checkbox"
                                    class="sr-only peer status-toggle" data-id="{{ $navigation->id }}"
                                    {{ $navigation->status ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-red-200 peer-focus:outline-none rounded-full peer  peer-checked:bg-green-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5  after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full">
                                </div>
                            </label>
                        </td>


                        <td class="p-4 text-sm text-gray-700">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('navigation-menu.edit', $navigation->id) }}">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}"
                                        class="w-4 h-4 cursor-pointer">
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="table-tr">
                        <td colspan="10" class="p-4 text-sm text-gray-700">
                            No Navigation Menu Found.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!--============= Pagination ==============-->
        {{ $data['navigations']->links() }}
    </div>
</main>



@endsection