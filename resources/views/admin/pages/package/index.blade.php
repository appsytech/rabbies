@extends('admin.layouts.main')
@section('title', 'packages')


@section('breadcrumb')
<div class="p-4 bg-gray-50 ">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li>
                <span class="mx-2">/</span>
            </li>
            <li class="text-gray-700">Package</li>
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
            <form action="{{ route('package.index') }}" method="GET" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        <!--==== Title Filter ====-->
                        <div>
                            <label class=" text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/newspaper.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Title
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Search title" name="title"
                                    value="{{ isset($data['oldInputs']['title']) ? $data['oldInputs']['title'] : '' }}"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--==== status Filter ====-->
                        <div>
                            <label class=" text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/tag.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Status
                            </label>
                            <div class="relative">
                                <select name="status"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="">All</option>
                                    <option value="1"
                                        {{ ($data['oldInputs']['status'] ?? null) == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ ($data['oldInputs']['status'] ?? null) == '0' ? 'selected' : '' }}>InActive
                                    </option>
                                    <option value="-1"
                                        {{ ($data['oldInputs']['status'] ?? null) == '-1' ? 'selected' : '' }}>Not
                                        Approved</option>

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
                            <button type="button" data-targetModalId="package-add-modal"
                                class="open-modal cursor-pointer text-white font-semibold flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm hover:shadow-md">
                                <img src="{{ asset('assets/svg/plus-white.svg') }}" class="w-4 h-4 pointer-events-none"
                                    alt="">
                                Add Package
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
                        <th class="h-12 px-4 text-left font-semibold">S.N</th>
                        <th class="h-12 px-4 text-left font-semibold">Title</th>
                        <th class="h-12 px-4 text-left font-semibold">Image</th>
                        <th class="h-12 px-4 text-left font-semibold">Content</th>
                        <th class="h-12 px-4 text-left font-semibold">Author</th>
                        <th class="h-12 px-4 text-left font-semibold">Status</th>
                        <th class="h-12 px-4 text-left font-semibold">Sort</th>
                        <th class="h-12 px-4 text-left font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data['packages']->isNotEmpty())

                    @foreach ($data['packages'] as $package)
                    <tr class="border-b border-gray-200">

                        <!-- S.N -->
                        <td class="p-4 text-xs">
                            {{ $data['packages']->firstItem() + $loop->index }}
                        </td>

                        <!-- Title -->
                        <td class="p-4 font-medium">
                            {{ $package->title }}
                        </td>

                        <td class="p-4">
                            @if (isset($package->image))
                            <img src="{{ asset('storage/' . $package->image) }}"
                                class="w-12 h-12 object-cover">
                            @endif
                        </td>

                        <!-- Content (short preview) -->
                        <td class="p-4 text-sm text-gray-600">
                            {{ Str::limit(strip_tags($package->content), 80) }}
                        </td>

                        <!-- Author -->
                        <td class="p-4">
                            {{ $package->author ?? 'N/A' }}
                        </td>


                        <!-- Status -->
                        <td class="p-4">
                            @php
                            if ($package->status == 1) {
                            $badge = 'bg-green-100 text-green-800';
                            $text = 'Active';
                            } elseif ($package->status == 0) {
                            $badge = 'bg-gray-100 text-gray-800';
                            $text = 'Inactive';
                            } else {
                            $badge = 'bg-red-100 text-red-800';
                            $text = 'Not Approved';
                            }
                            @endphp

                            <span class="px-2 py-1 text-xs rounded {{ $badge }} whitespace-nowrap">
                                {{ $text }}
                            </span>
                        </td>


                        <!-- Author -->
                        <td class="p-4">
                            {{ $package->sort ?? 'N/A' }}
                        </td>

                        <!-- Action -->
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('package.edit', $package->id) }}">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}" class="w-4 h-4">
                                </a>

                                <form action="{{ route('package.delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $package->id }}">
                                    <button class="cursor-pointer" type="submit">
                                        <img src="{{ asset('assets/svg/bin.svg') }}" class="w-4 h-4">
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
        </div>

        <!--============= Pagination ==============-->
        {{ $data['packages']->links() }}
    </div>
</main>

<!-- =================== Add Modal =======================-->
<div>
    <div id="package-add-modal"
        class="hidden fixed top-0 left-0 right-0 z-99 px-4 pt-8 overflow-y-auto h-screen flex  items-center justify-center">
        <div
            class="w-full lg:w-[30%] flex flex-col max-h-[90%] mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- ============ Modal Header =========== -->
            <div class="p-5 border-b border-gray-100 h-[10%]">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add New package</h2>
                        <p class="text-sm text-gray-500 mt-1">Fill in the details below</p>
                    </div>
                    <button type="button" data-targetModalId="package-add-modal"
                        class="close-modal cursor-pointer h-10 flex items-center justify-center rounded-full  text-gray-400 hover:text-black transition-all duration-200">
                        <img src="{{ asset('assets/svg/cross.svg') }}" class="h-5 w-5 pointer-events-none"
                            alt="">
                    </button>
                </div>
            </div>

            <!-- ======== Modal Body ======== -->
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form action="{{ route('package.store') }}" class="ajax-form reload-on-success" method="POST"
                    id="dataForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

                        <!--====== Title ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/newspaper.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Title
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter title..." name="title" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Author ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Author
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter author name..." name="author"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--==== status ====-->
                        <div>
                            <label class=" text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/tag.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Status
                            </label>
                            <div class="relative">
                                <select name="status"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="1">Active </option>
                                    <option value="0">InActive</option>
                                    <option value="-1">Not Approved</option>

                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Sort ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/arrow-up-down.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Sort
                            </label>
                            <div class="relative">
                                <input type="number" placeholder="Enter Sort..." name="sort" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Image  Field ======-->
                        <div class="col-span-2">
                            <label for="image"
                                class=" text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                                Image
                            </label>
                            <div class="relative">
                                <input type="file" name="image" id="image"
                                    data-previewSectionId="image-preview" accept="image/*"
                                    class="hidden image-upload&preview" />
                                <label for="image"
                                    class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                    <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                        alt="">
                                    <span class="font-medium">Click to upload image</span>
                                    <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                                </label>
                            </div>
                        </div>

                        <!--=== Image Preview Section ====-->
                        <div id="image-preview" class="hidden col-span-2">

                        </div>


                        <!--====== Contnet Field ======-->
                        <div class="col-span-2">
                            <label class=" text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/file-text.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Content
                            </label>
                            <div class="relative">
                                <textarea type="text" name="content" required placeholder="Enter content..."
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400"></textarea>
                            </div>
                        </div>

                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 pt-2">
                        <button type="button" data-targetModalId="package-add-modal"
                            class="close-modal cursor-pointer  relative flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ asset('assets/svg/corner-up-left.svg') }}"
                                class="w-4 h-4 pointer-events-none" alt="">
                            <span class="pointer-events-none">Cancel</span>
                        </button>

                        <button type="submit"
                            class="flex-1 cursor-pointer group relative flex items-center gap-2 px-5 py-2.5 text-md font-medium text-white bg-blue-500 border border-gray-200 rounded-lg shadow-sm hover:bg-blue-700 hover:border-gray-300 hover:shadow-md hover:-translate-y-1  transition-all duration-200">
                            <img src="{{ asset('assets/svg/white-save.svg') }}" class="w-4 h-4 pointer-events-none"
                                alt="">
                            <span class="pointer-events-none">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection