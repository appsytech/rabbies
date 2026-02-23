@extends('admin.layouts.main')
@section('title', 'Activity')


@section('breadcrumb')
<div class="p-4 bg-gray-50">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li>
                <a href="{{ route('activity.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Activity</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700">Edit Activity</li>
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
            <form id="dataForm" action="{{ route('activity.update') }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
                    <!--====== Title ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/book-type.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                alt="">
                            Title
                        </label>
                        <div class="relative">
                            <input type="text" name="title" placeholder="Enter title..."
                                value="{{ $data['activity']->title }}"
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400"
                                required>
                        </div>
                    </div>

                    <!--====== Activity Type ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/tag.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                alt="">
                            Activity Type
                        </label>
                        <div class="relative">
                            <select name="type" required
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                <option value="CURRENT" {{ $data['activity']->type == 'CURRENT' ? 'selected' : '' }}>
                                    Current</option>
                                <!-- <option value="UPCOMING" {{ $data['activity']->type == 'UPCOMING' ? 'selected' : '' }}>
                                        Upcoming</option> -->
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                            </div>
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
                                <option value="1" {{ $data['activity']->status ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ $data['activity']->status ? '' : 'selected' }}>Inactive
                                </option>
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
                            <input type="number" name="sort" placeholder="Enter sort number..."
                                value="{{ $data['activity']->sort }}"
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400"
                                required>
                        </div>
                    </div>

                    <!--====== Description Field ======-->
                
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/file-text.svg') }}"
                                class="w-3.5 h-3.5 pointer-events-none" alt="">
                            Description
                        </label>
                        <div class="relative">
                            <div id="descriptionEditor" style="height: 300px;">{!! $data['activity']->description ?? '' !!}</div>
                            <input type="hidden" name="description" value="{{ $data['activity']->description ?? ''  }}" id="description">
                        </div>
                    </div>


                    <!--====== Image Field ======-->
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                            Upload Image
                        </label>
                        <div class="relative">
                            <input type="file" name="images" id="imageUpload"
                                data-previewSectionId="imagePreviewContainer" accept="image/*"
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
                    <div id="imagePreviewContainer" class="col-span-2">

                        <div class="relative inline-flex gap-2">
                            <img src="{{ asset('storage/' . $data['activity']->images) }}"
                                class="w-24 h-24 object-cover rounded border">
                        </div>

                    </div>

                </div>

                <div class="hidden">
                    <input type="hidden" name="id" value="{{ $data['activity']->id }}">
                </div>

                <!--=== Action Buttons ===-->
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('activity.index') }}"
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