@extends('admin.layouts.main')
@section('title', 'About Us Features')


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
            <li class="text-gray-700">About Us Features</li>
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
            <form action="{{ route('about-feature.index') }}" method="GET" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        <!--==== title Filter ====-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/hash.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                title
                            </label>
                            <div class="relative">
                                <input type="text" name="title" placeholder="Search title"
                                    value="{{ isset($data['oldInputs']['title']) ? $data['oldInputs']['title'] : '' }}"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
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
                            <button type="button" data-targetModalId="about-feature-add-modal"
                                class="open-modal cursor-pointer text-white font-semibold flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm hover:shadow-md">
                                <img src="{{ asset('assets/svg/plus-white.svg') }}" class="w-4 h-4 pointer-events-none"
                                    alt="">
                                Add Feature
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
                            Icon
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Description
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

                    @if ($data['features']->isNotEmpty())
                    @php $sno = 1; @endphp

                    @foreach ($data['features'] as $feature)

                    <tr class="border-b border-gray-200">
                        {{-- S.N --}}
                        <td class="p-4 text-xs">{{ $sno }}</td>

                        {{-- Title --}}
                        <td class="p-4 font-medium">
                            {{ $feature->title ?? '' }}
                        </td>

                        {{-- Icon --}}
                        <td class="p-4">
                            @if($feature->icon)
                            <img src="{{ asset('storage/' . $feature->icon) }}"
                                class="w-12 h-12 object-cover rounded">
                            @else
                            -
                            @endif
                        </td>

                        {{-- Description --}}
                        <td class="p-4 text-sm text-gray-700">
                            {{ \Illuminate\Support\Str::limit($feature->description, 50) }}
                        </td>


                        {{-- Status --}}
                        <td class="p-4 text-sm">
                            @if($feature->status == 'ACTIVE')
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                Active
                            </span>
                            @else
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                Inactive
                            </span>
                            @endif
                        </td>

                        {{-- Action --}}
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('about-feature.edit', $feature->id) }}">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}"
                                        class="w-4 h-4 cursor-pointer">
                                </a>

                                <form action="{{ route('about-feature.delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $feature->id }}">
                                    <button class="cursor-pointer" type="submit">
                                        <img src="{{ asset('assets/svg/bin.svg') }}" class="w-4 h-4">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @php $sno++; @endphp
                    @endforeach
                    @endif

                </tbody>

            </table>
        </div>

        <!--============= Pagination ==============-->
        <div class="rounded-xl p-3">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Showing <span class="font-semibold text-gray-900">1-12</span> of <span
                        class="font-semibold text-gray-900">248</span> results
                </div>

                <div class="flex items-center space-x-2">

                    <button type="button"
                        class="group cursor-pointer relative flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md transition-all duration-200">
                        <img src="{{ asset('assets/svg/cheveron-left.svg') }}" class="h-4 w-4 pointer-events-none"
                            alt="">
                        <span>Previous</span>
                    </button>

                    <button
                        class="px-4 py-2 bg-linear-to-r from-blue-400 to-blue-600 text-white rounded-lg text-sm font-medium">1</button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">2</button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">3</button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">4</button>
                    <span class="px-2 text-gray-500">...</span>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">21</button>

                    <button type="button"
                        class="group cursor-pointer relative flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md transition-all duration-200">

                        <span>Next</span>
                        <img src="{{ asset('assets/svg/cheveron-right.svg') }}" class="h-4 w-4 pointer-events-none"
                            alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- =================== Add Modal =======================-->
<div>
    <div id="about-feature-add-modal"
        class="hidden fixed top-0 left-0 right-0 z-99 px-4 pt-8 overflow-y-auto h-screen flex  items-center justify-center">
        <div
            class="w-full lg:w-[30%] flex flex-col max-h-[90%] mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- ============ Modal Header =========== -->
            <div class="p-5 border-b border-gray-100 h-[10%]">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add new About Us Feature</h2>
                        <p class="text-sm text-gray-500 mt-1">Fill in the details below</p>
                    </div>
                    <button type="button" data-targetModalId="about-feature-add-modal"
                        class="close-modal cursor-pointer h-10 flex items-center justify-center rounded-full  text-gray-400 hover:text-black transition-all duration-200">
                        <img src="{{ asset('assets/svg/cross.svg') }}" class="h-5 w-5 pointer-events-none"
                            alt="">
                    </button>
                </div>
            </div>

            <!-- ======== Modal Body ======== -->
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form action="{{ route('about-feature.store') }}" method="POST" class="ajax-form reload-on-success"
                    id="dataForm" enctype="multipart/form-data">
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
                                <input type="text" placeholder="Enter Title..." name="title" required
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
                                <input type="file" id="iconUpload" name="icon" required
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
                        <div id="iconPreviewContainer" class="hidden col-span-2">

                        </div>


                        <!--====== Description Field ======-->
                        <div class="col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/file-text.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Description
                            </label>
                            <div class="relative">
                                <textarea type="text" required name="description" placeholder="Enter description..."
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400"></textarea>
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
                                    <option value="ACTIVE">Active</option>
                                    <option value="INACTIVE">Inactive</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>


                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 pt-2">
                        <button type="button" data-targetModalId="about-feature-add-modal"
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