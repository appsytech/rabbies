@extends('admin.layouts.main')
@section('title', 'About us')


@section('breadcrumb')
<div class="p-4 bg-gray-50">
    <nav class="text-sm text-gray-500">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700 font-medium">Home</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li>
                <a href="{{ route('about-us.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">About us</a>
            </li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700">Edit About us</li>
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
            <form id="dataForm" action="{{ route('about-us.update') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" placeholder="Enter Title..." value="{{ $data['aboutus']->title ?? '' }}" name="title" required
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                        </div>
                    </div>

                    <!--====== Author ======-->
                    <div>
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/user.svg') }}"
                                class="w-3.5 h-3.5 pointer-events-none" alt="">
                            Author
                        </label>
                        <div class="relative">
                            <input type="text" value="{{ $data['aboutus']->author ?? '' }}" placeholder="Enter author..." name="author"
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
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
                            <div id="descriptionEditor" style="height: 300px;">{!! $data['aboutus']->description ?? '' !!}</div>
                            <input type="hidden" value="{{ $data['aboutus']->description ?? '' }}" name="description" id="description">
                        </div>
                    </div>


                    <!--====== Image 1 ======-->
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                            Image1
                        </label>
                        <div class="relative">
                            <input type="file" id="image1Upload" name="images1"
                                data-previewSectionId="image1PreviewContainer" accept="image/*"
                                class="hidden image-upload&preview" />
                            <label for="image1Upload"
                                class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                    alt="">
                                <span class="font-medium">Click to upload image</span>
                                <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                            </label>
                        </div>
                    </div>

                    <!--=== Image 1 Preview Section ====-->
                    <div id="image1PreviewContainer" class="{{ isset($data['aboutus']->images1) ? '' : 'hidden' }} lg:col-span-2">
                        @if (isset($data['aboutus']->images1))
                        <div class="relative inline-flex gap-2">
                            <img src="{{ asset('storage/' . $data['aboutus']->images1) }}"
                                class="w-24 h-24 object-cover rounded border">
                        </div>
                        @endif
                    </div>

                    <!--====== Image 2 ======-->
                    <div class="col-span-2">
                        <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                            Image2
                        </label>
                        <div class="relative">
                            <input type="file" id="image2Upload" name="images2"
                                data-previewSectionId="image2PreviewContainer" accept="image/*"
                                class="hidden image-upload&preview" />
                            <label for="image2Upload"
                                class="flex items-center justify-center w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer transition-all shadow-sm hover:shadow-md hover:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 group">
                                <img src="{{ asset('assets/svg/upload-cloud.svg') }}" class="w-5 h-5 mr-2"
                                    alt="">
                                <span class="font-medium">Click to upload image</span>
                                <span class="text-gray-400 ml-1">(PNG, JPG, GIF)</span>
                            </label>
                        </div>
                    </div>

                    <!--=== Image 2 Preview Section ====-->
                    <div id="image2PreviewContainer" class="{{ isset($data['aboutus']->images2) ? '' : 'hidden' }} lg:col-span-2">
                        @if (isset($data['aboutus']->images2))
                        <div class="relative inline-flex gap-2">
                            <img src="{{ asset('storage/' . $data['aboutus']->images2) }}"
                                class="w-24 h-24 object-cover rounded border">
                        </div>
                        @endif
                    </div>

                </div>

                <div class="hidden">
                    <input type="hidden" name="id" value="{{ $data['aboutus']->id }}">
                </div>

                <!--=== Action Buttons ===-->
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('about-us.index') }}"
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