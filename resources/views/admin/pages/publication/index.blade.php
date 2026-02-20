@extends('admin.layouts.main')
@section('title', 'Publications')


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
            <li class="text-gray-700">Publications</li>
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
            <form action="{{ route('publication.index') }}" method="GET" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        <!--==== Author Filter ====-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user-check.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Author
                            </label>
                            <div class="relative">
                                <input type="text" name="author" placeholder="Search author"
                                    value="{{ isset($data['oldInputs']['author']) ? $data['oldInputs']['author'] : '' }}"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--==== Search Button ====-->
                        <div class="flex items-end">
                            <button
                                class="w-full cursor-pointer px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:scale-105 transform">
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
                            <button type="button" data-targetModalId="publication-add-modal"
                                class="open-modal cursor-pointer text-white whitespace-nowrap font-semibold flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm hover:shadow-md">
                                <img src="{{ asset('assets/svg/plus-white.svg') }}" class="w-4 h-4 pointer-events-none"
                                    alt="">
                                Add Publication
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
                            Document
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Thumbnail
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Type
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Author
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Status
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                <tbody>
                    @if ($data['publications']->isNotEmpty())

                    @foreach ($data['publications'] as $publication)
                    <tr class="border-b border-gray-200">

                        <!-- S.N -->
                        <td class="p-4 text-xs">
                            {{ $data['publications']->firstItem() + $loop->index }}
                        </td>

                        <!-- Title -->
                        <td class="p-4 font-medium">
                            {{ $publication->title }}
                        </td>

                        <!-- Document -->
                        <td class="p-4 text-sm">
                            @if ($publication->document)
                            <a href="{{ asset('storage/' . $publication->document) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                View Document
                            </a>
                            @else
                            <span class="text-gray-400">N/A</span>
                            @endif
                        </td>

                        {{-- Thumbnail Image --}}
                        <td class="p-4 font-medium">
                            @if (!empty($publication->thumbnail))
                            <a href="{{ asset('storage/' . $publication->thumbnail) }}" target="_blank">
                                <img src="{{ asset('storage/' . $publication->thumbnail) }}" alt="publication Image"
                                    class="w-10 h-10 rounded object-cover border">
                            </a>
                            @else
                            -no image-
                            @endif
                        </td>

                        <!-- Type -->
                        <td class="p-4 text-sm text-gray-700">
                            {{ $publication->type }}
                        </td>

                        <!-- Author -->
                        <td class="p-4 text-sm text-gray-700">
                            {{ $publication->author ?? '—' }}
                        </td>

                        <!-- Status -->
                        <td class="p-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer status-toggle"
                                    data-targetUrl="{{ route('publication.status.update') }}"
                                    data-targetId="{{ $publication->id }}" data-csrf="{{ csrf_token() }}"
                                    {{ $publication->status ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-red-200 peer-focus:outline-none rounded-full peer-checked:bg-green-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full">
                                </div>
                            </label>
                        </td>

                        <!-- Action -->
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('publication.edit', $publication->id) }}">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}" class="w-4 h-4">
                                </a>

                                <form action="{{ route('publication.delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $publication->id }}">
                                    <button type="submit">
                                        <img src="{{ asset('assets/svg/bin.svg') }}" class="w-4 h-4">
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
                </tbody>
            </table>
        </div>

        <!--============= Pagination ==============-->
        {{ $data['publications']->links() }}
    </div>
</main>


<!-- =================== Add Modal =======================-->
<div>
    <div id="publication-add-modal"
        class="hidden fixed top-0 left-0 right-0 z-99 px-4 pt-8 overflow-y-auto h-screen flex  items-center justify-center">
        <div
            class="w-full lg:w-[30%] flex flex-col max-h-[90%] mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- ============ Modal Header =========== -->
            <div class="p-5 border-b border-gray-100 h-[10%]">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add new Publication</h2>
                        <p class="text-sm text-gray-500 mt-1">Fill in the details below</p>
                    </div>
                    <button type="button" data-targetModalId="publication-add-modal"
                        class="close-modal cursor-pointer h-10 flex items-center justify-center rounded-full  text-gray-400 hover:text-black transition-all duration-200">
                        <img src="{{ asset('assets/svg/cross.svg') }}" class="h-5 w-5 pointer-events-none"
                            alt="">
                    </button>
                </div>
            </div>

            <!-- ======== Modal Body ======== -->
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form action="{{ route('publication.store') }}" method="POST" class="ajax-form reload-on-success"
                    id="dataForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

                        <!--====== Title ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/hash.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Title
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter Title..." name="title" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Type  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/layers.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Type
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter Type..." name="type" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--====== Author  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user-check.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Author
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter author name..." name="author"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Status ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/tag.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Status
                            </label>
                            <div class="relative">
                                <select name="status" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Thumbnail Field ======-->
                        <div class="lg:col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                                Upload Thumbnail
                            </label>
                            <div class="relative">
                                <input type="file" id="thumbnail-upload" name="thumbnail" accept="image/*" required
                                    data-previewSectionId="thumbnail-preview-container"
                                    class="hidden image-upload&preview" />
                                <label for="thumbnail-upload"
                                    class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                    <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                        alt="">
                                    <span class="font-medium">Click to upload image</span>
                                    <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                                </label>
                            </div>
                        </div>

                        <!--=== Image Preview Section ====-->
                        <div id="thumbnail-preview-container" class="hidden lg:col-span-2">

                        </div>


                        <!--====== Document Field ======-->
                        <div class="lg:col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                                Upload Document
                            </label>
                            <div class="relative">
                                <input type="file" id="document-upload" name="document"
                                    data-previewSectionId="document-preview-container"
                                    class="hidden image-upload&preview" />
                                <label for="document-upload"
                                    class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                    <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                        alt="">
                                    <span class="font-medium">Click to upload image</span>
                                    <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                                </label>
                            </div>
                        </div>

                        <!--=== Image Preview Section ====-->
                        <div id="document-preview-container" class="hidden lg:col-span-2">

                        </div>

                        <!--====== Description Field ======-->
                        <div class="lg:col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/file-text.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Description
                            </label>
                            <div class="relative">
                                <textarea type="text" name="description" placeholder="Enter description..."
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400"></textarea>
                            </div>
                        </div>
                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 pt-2">
                        <button type="button" data-targetModalId="publication-add-modal"
                            class="close-modal cursor-pointer relative flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ asset('assets/svg/corner-up-left.svg') }}"
                                class="w-4 h-4 pointer-events-none" alt="">
                            <span class="pointer-events-none">Cancel</span>
                        </button>

                        <button type="submit"
                            class="flex-1 group cursor-pointer relative flex items-center gap-2 px-5 py-2.5 text-md font-medium text-white bg-blue-500 border border-gray-200 rounded-lg shadow-sm hover:bg-blue-700 hover:border-gray-300 hover:shadow-md hover:-translate-y-1  transition-all duration-200">
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