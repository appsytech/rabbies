@extends('admin.layouts.main')
@section('title', 'Homepage Slider')


@section('breadcrumb')
    <div class="p-4 bg-gray-50">
        <nav class="text-sm text-gray-500">
            <ol class="list-reset flex">
                <li>
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
                </li>
                <li><span class="mx-2">/</span></li>
                <li>
                    <a href="{{ route('homepage-slider.index') }}"
                        class="text-blue-600 hover:text-blue-700 font-medium">Homepage Slider</a>
                </li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-700">Edit Homepage Slider</li>
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

    <!-- =================== Edit Content =======================-->
    <div>
        <div class="w-full lg:w-1/2 flex flex-col max-h-[90%] mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">
            <!-- ======== Modal Body ======== -->
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form id="dataForm" action="{{ route('homepage-slider.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
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
                                <input type="text" value="{{ $data['slider']->title ?? '' }}"
                                    placeholder="Enter Title..." name="title" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Type  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Type
                            </label>
                            <div class="relative">
                                <input type="text" value="{{ $data['slider']->type ?? '' }}" placeholder="Enter Type..."
                                    name="type" required
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
                                    <option value="1" {{ ($data['slider']->status ?? null) == '1' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ ($data['slider']->status ?? null) == '0' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Device Type ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/layers.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Device Type
                            </label>
                            <div class="relative">
                                <select name="device_type" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="0"
                                        {{ ($data['slider']->device_type ?? null) == '0' ? 'selected' : '' }}>Web</option>
                                    <option value="1"
                                        {{ ($data['slider']->device_type ?? null) == '1' ? 'selected' : '' }}>Android
                                    </option>
                                    <option value="2"
                                        {{ ($data['slider']->device_type ?? null) == '2' ? 'selected' : '' }}>H5</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Jump Type ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/layout-grid.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Jump Type
                            </label>
                            <div class="relative">
                                <select name="jump_type"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="ABOUT"
                                        {{ ($data['slider']->jump_type ?? null) == 'ABOUT' ? 'selected' : '' }}>About
                                    </option>
                                    <option value="ACTIVITY"
                                        {{ ($data['slider']->jump_type ?? null) == 'ACTIVITY' ? 'selected' : '' }}>Activity
                                    </option>
                                    <option value="ADMISSION"
                                        {{ ($data['slider']->jump_type ?? null) == 'ADMISSION' ? 'selected' : '' }}>
                                        Admission</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Image Field ======-->
                        <div class="lg:col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                                Upload Image
                            </label>
                            <div class="relative">
                                <input type="file" id="imageUpload" name="images"
                                    data-previewSectionId="image-preview-container" accept="image/*"
                                    class="hidden image-upload&preview" />
                                <label for="imageUpload"
                                    class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                    <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                        alt="">
                                    <span class="font-medium">Click to upload image</span>
                                    <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                                </label>
                            </div>
                        </div>

                        <!--=== Image Preview Section ====-->
                        <div id="image-preview-container"
                            class="{{ isset($data['slider']->images) ? '' : 'hidden' }} lg:col-span-2">
                            @if (isset($data['slider']->images))
                                <div class="relative inline-flex gap-2">
                                    <img src="{{ asset('storage/' . $data['slider']->images) }}"
                                        class="w-24 h-24 object-cover rounded border">
                                </div>
                            @endif
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
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">{{ $data['slider']->description ?? '' }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="hidden">
                        <input type="hidden" name="id" value="{{ $data['slider']->id }}">
                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 pt-2">
                        <a href="{{ route('admin.index') }}"
                            class="relative cursor-pointer flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ asset('assets/svg/corner-up-left.svg') }}" class="w-4 h-4 pointer-events-none"
                                alt="">
                            <span class="pointer-events-none">Cancel</span>
                        </a>

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
@endsection
