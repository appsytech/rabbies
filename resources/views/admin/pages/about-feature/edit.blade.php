@extends('admin.layouts.main')
@section('title', 'About Us Feature')


@section('breadcrumb')
<div class="p-4 bg-gray-50">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li>
                <a href="{{ route('about-feature.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Features</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700">Edit About Us Feature</li>
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
            <form id="dataForm" action="{{ route('about-feature.update') }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

                    <!--====== Title ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/hash.svg') }}"
                                class="w-3.5 h-3.5 pointer-events-none" alt="">
                            Title
                        </label>
                        <div class="relative">
                            <input type="text" placeholder="Enter Title..." value="{{ $data['feature']->title ?? '' }}" name="title" required
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                        </div>
                    </div>


                    <!--====== Icon Field ======-->
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                            Upload Icon
                        </label>
                        <div class="relative">
                            <input type="file" id="iconUpload" name="icon"
                                data-previewSectionId="iconPreviewContainer" accept=".ico,.svg,.png"
                                class="hidden image-upload&preview" />
                            <label for="iconUpload"
                                class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                    alt="">
                                <span class="font-medium">Click to upload icon</span>
                                <span class="text-gray-400 ml-1">(svg, png)</span>
                            </label>
                        </div>
                    </div>

                    <!--=== Image Preview Section ====-->
                    <div id="iconPreviewContainer" class="{{ isset($data['feature']->icon) ? '' : 'hidden' }} lg:col-span-2">
                        @if (isset($data['feature']->icon))
                        <div class="relative inline-flex gap-2">
                            <img src="{{ asset('storage/' . $data['feature']->icon) }}"
                                class="w-24 h-24 object-cover rounded border">
                        </div>
                        @endif
                    </div>


                    <!--====== Description Field ======-->
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/file-text.svg') }}"
                                class="w-3.5 h-3.5 pointer-events-none" alt="">
                            Description
                        </label>
                        <div class="relative">
                            <textarea type="text" name="description" placeholder="Enter description..."
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">{{ $data['feature']->description ?? '' }}</textarea>
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
                            <input type="number" placeholder="Enter Sort..." value="{{ $data['feature']->sort ?? '' }}" name="sort" required
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
                                <option value="ACTIVE" {{ $data['feature']->status == 'ACTIVE' ? 'selected' : '' }}>Active
                                </option>
                                <option value="INACTIVE" {{ $data['feature']->status == 'INACTIVE' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                    class="w-4 h-4 pointer-events-none" alt="">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="hidden">
                    <input type="hidden" name="id" value="{{ $data['feature']->id }}">
                </div>

                <!--=== Action Buttons ===-->
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('about-feature.index') }}"
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