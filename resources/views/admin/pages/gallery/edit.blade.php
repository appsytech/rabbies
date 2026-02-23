@extends('admin.layouts.main')
@section('title', 'gallery')


@section('breadcrumb')
<div class="p-4 bg-gray-50">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li>
                <a href="{{ route('gallery.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">gallery</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700">Edit gallery</li>
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
            <form id="dataForm" action="{{ route('gallery.update') }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

                    <!--====== Title ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/newspaper.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                alt="">
                            Title
                        </label>
                        <div class="relative">
                            <input type="text" placeholder="Enter title..." name="title"
                                value="{{ $data['image']->title ?? '' }}"
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
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
                            <input type="number" placeholder="Enter sort..." value="{{ $data['image']->sort ?? '' }}"
                                name="sort" required
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
                                <option value="1" {{ $data['image']->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $data['image']->is_active ? '' : 'selected' }}>In Active
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                            </div>
                        </div>
                    </div>

                    <!--====== Media Type ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/file-image.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                alt="">
                            Media Type
                        </label>
                        <div class="relative">
                            <select name="type" data-targetId="images1"
                                class="change-media-type w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                <option value="images" {{ $data['image']->type == 'images' ? 'selected' : '' }}>Image
                                </option>
                                <option value="video" {{ $data['image']->type == 'video' ? 'selected' : '' }}>Video
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                            </div>
                        </div>
                    </div>

                    <!--====== Image 1 Field ======-->
                    <div class="col-span-2">
                        <label for="images1"
                            class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                            Media
                        </label>
                        <div class="relative">
                            <input type="file" name="media" id="images1"
                                data-previewSectionId="images1-preview"
                                accept="{{ $data['image']->type == 'images' ? 'image/*' : 'video/*' }}"
                                class="hidden image-upload&preview" />
                            <label for="images1" id="images1-media-label"
                                class=" flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                    alt="">
                                <span class="font-medium dynamic-text1">
                                    {{ $data['image']->type == 'images' ? 'Click to upload image' : 'Click to upload video' }}
                                </span>
                                <span
                                    class="text-gray-400 ml-1 dynamic-text2">{{ $data['image']->type == 'images' ? '(PNG, JPG, GIF)' : '(MP4, MOV, AVI)' }}
                                </span>
                            </label>
                        </div>
                    </div>

                    <!--=== Image Preview Section ====-->
                    <div id="images1-preview" class="col-span-2">
                        <div class="relative inline-flex gap-2">
                            @if (!empty($data['image']->image_path))
                            @if ($data['image']->type === 'images')
                            <img src="{{ asset('storage/' . $data['image']->image_path) }}"
                                class="w-24 h-24 object-cover rounded border" alt="Image preview">
                            @elseif ($data['image']->type === 'video')
                            <div class="relative">
                                <video id="video-{{ $data['image']->id }}"
                                    class="w-24 h-24 object-cover rounded border" muted preload="metadata">
                                    <source src="{{ asset('storage/' . $data['image']->image_path) }}"
                                        type="video/mp4">
                                </video>

                                <button type="button" data-targetId="video-{{ $data['image']->id }}"
                                    class="toggle-video cursor-pointer  absolute inset-0 flex items-center justify-center bg-black/40 text-xs rounded">
                                    <img src="{{ asset('assets/svg/play-filled-blue.svg') }}"
                                        class="w-12 h-12 pointer-events-none play-btn">

                                    <img src="{{ asset('assets/svg/paused-filled-blue.svg') }}"
                                        class="w-12 h-12 pointer-events-none pause-btn hidden">
                                </button>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>

                    <!--====== Description Field ======-->
                    <div class="lg:col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/file-text.svg') }}"
                                class="w-3.5 h-3.5 pointer-events-none" alt="">
                            Description
                        </label>
                        <div class="relative">
                            <div id="descriptionEditor" style="height: 300px;">{!! $data['image']->description ?? '' !!}</div>
                            <input type="hidden" value="{{ $data['image']->description ?? '' }}" name="description" id="description">
                        </div>
                    </div>
                </div>

                <div class="hidden">
                    <input type="hidden" name="id" value="{{ $data['image']->id }}">
                </div>

                <!--=== Action Buttons ===-->
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('gallery.index') }}"
                        class="relative flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
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