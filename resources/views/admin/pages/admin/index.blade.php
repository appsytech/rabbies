@extends('admin.layouts.main')
@section('title', 'Admins')


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
            <li class="text-gray-700">Admins</li>
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
            <form action="{{ route('admin.index') }}" method="GET" class="p-2 border-b border-gray-200">
                <div
                    class="grid grid-cols-4  gap-3 xl:gap-0 bg-linear-to-br from-gray-50 to-gray-100 rounded-xl p-3 border border-gray-200 shadow-sm">
                    <div
                        class="col-span-4 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">

                        <!--==== Name Filter ====-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user-check.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Name
                            </label>
                            <div class="relative">
                                <input type="text" name="name" placeholder="Search Name"
                                    value="{{ isset($data['oldInputs']['name']) ? $data['oldInputs']['name'] : '' }}"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--==== Username Filter ====-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Username
                            </label>
                            <div class="relative">
                                <input type="text" name="username"
                                    value="{{ isset($data['oldInputs']['username']) ? $data['oldInputs']['username'] : '' }}"
                                    placeholder="Search Username"
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
                            <button type="button" data-targetModalId="admin-add-modal"
                                class="open-modal cursor-pointer text-white font-semibold flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm hover:shadow-md">
                                <img src="{{ asset('assets/svg/plus-white.svg') }}" class="w-4 h-4 pointer-events-none"
                                    alt="">
                                Add Admin
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
                            Name
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Profile
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Username
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Email
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Phone no.
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Role
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Sort
                        </th>

                        <th class="h-12 px-4 text-left font-semibold">
                            Status
                        </th>

                        <th class="h-12 px-4 text-left  font-semibold">
                            Last Login At
                        </th>



                        <th class="h-12 px-4 text-left  font-semibold">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @if ($data['admins']->isNotEmpty())

                    @foreach ($data['admins'] as $admin)
                    <!--====== row 1 =====-->
                    <tr class="border-b border-gray-200">
                        <td class="p-4 text-xs">
                            {{ $data['admins']->firstItem() + $loop->index }}
                        </td>
                        <td class="p-4 font-medium">
                            {{ $admin->name ?? '' }}
                        </td>
                        <td class="p-4">
                            @if (isset($admin->profile_image))
                            <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Profile"
                                class="w-10 h-10 rounded-full object-cover">
                            @else
                            <img src="https://img.freepik.com/premium-vector/vector-flat-illustration-grayscale-avatar-user-profile-person-icon-gender-neutral-silhouette-profile-picture-suitable-social-media-profiles-icons-screensavers-as-templatex9xa_719432-2210.jpg?semt=ais_hybrid&w=740&q=80"
                                alt="Profile" class="w-10 h-10 rounded-full object-cover">
                            @endif
                        </td>

                        <td class="p-4 text-sm text-gray-700">
                            {{ $admin->username ?? '' }}
                        </td>

                        <td class="p-4 text-sm text-gray-700">
                            <a href="{{ $admin->email ? 'mailto:' . $admin->email : '#' }}"
                                class="hover:underline">
                                {{ $admin->email ?? '' }}
                            </a>
                        </td>

                        <td class="p-4 text-sm text-gray-700">
                            <a href="{{ $admin->phone ? 'tel:' . $admin->phone : '#' }}"
                                class="hover:underline">
                                {{ $admin->phone ?? '' }}
                            </a>
                        </td>

                        <td class="p-4 text-sm">
                            @php
                            if ($admin->admin_role == 1) {
                            $roleText = 'Super Admin';
                            } elseif ($admin->admin_role == 2) {
                            $roleText = 'Admin';
                            } elseif ($admin->admin_role == 3) {
                            $roleText = 'Editor';
                            }
                            elseif ($admin->admin_role == 4) {
                            $roleText = 'Teacher';
                            }
                            else {
                            $roleText = 'Member';
                            }
                            @endphp
                            {{ $roleText ?? '' }}
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            {{ $admin->sort ?? '' }}
                        </td>

                        <td class="p-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input data-targetUrl="{{ route('admin.status.update') }}"
                                    data-targetId="{{ $admin->id }}" data-csrf="{{ csrf_token() }}"
                                    type="checkbox" class="sr-only peer status-toggle"
                                    data-id="{{ $admin->id }}" {{ $admin->status ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-red-200 peer-focus:outline-none rounded-full peer  peer-checked:bg-green-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5  after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:after:translate-x-full">
                                </div>
                            </label>
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            {{ $admin->last_login_at  ?? ''}}
                        </td>

                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.edit', $admin->id) }}">
                                    <img src="{{ asset('assets/svg/pencil.svg') }}"
                                        class="w-4 h-4 cursor-pointer">
                                </a>

                                <form action="{{ route('admin.delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $admin->id }}">
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
        {{ $data['admins']->links() }}
    </div>
</main>


<!-- =================== Add Modal =======================-->
<div>
    <div id="admin-add-modal"
        class="hidden fixed top-0 left-0 right-0 z-99 px-4 pt-8 overflow-y-auto h-screen flex  items-center justify-center">
        <div
            class="w-full lg:w-[30%] flex flex-col max-h-[90%] mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- ============ Modal Header =========== -->
            <div class="p-5 border-b border-gray-100 h-[10%]">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add new Admin</h2>
                        <p class="text-sm text-gray-500 mt-1">Fill in the details below</p>
                    </div>
                    <button type="button" data-targetModalId="admin-add-modal"
                        class="close-modal cursor-pointer h-10 flex items-center justify-center rounded-full  text-gray-400 hover:text-black transition-all duration-200">
                        <img src="{{ asset('assets/svg/cross.svg') }}" class="h-5 w-5 pointer-events-none"
                            alt="">
                    </button>
                </div>
            </div>

            <!-- ======== Modal Body ======== -->
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form action="{{ route('admin.store') }}" method="POST" class="ajax-form reload-on-success"
                    id="dataForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

                        <!--====== Name ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user-check.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Name
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter Name..." name="name" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Username  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Username
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter username..." name="username"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Email  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/mail.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Email
                            </label>
                            <div class="relative">
                                <input type="email" placeholder="Enter email..." name="email" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Phone  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/phone.svg') }}"
                                    class="w-3.5 h-3.5 pointer-events-none" alt="">
                                Phone
                            </label>
                            <div class="relative">
                                <input type="text" placeholder="Enter email..." name="phone"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>


                        <!--====== Role ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/shield-user.svg') }}" class="w-3.5 h-3.5">
                                Role
                            </label>
                            <div class="relative">
                                <select id="admin_role" name="admin_role" required
                                    class="toggle-password-section w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Editor</option>
                                    <option value="4">Teacher</option>
                                    <option value="5">Member</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== password ======-->
                        <div class="password-section">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/lock.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" type="password" minlength="8" placeholder="enter password"
                                    name="password" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== password confirmation  ======-->
                        <div class="password-section">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/lock.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input id="password_confirmation" type="password" minlength="8"
                                    placeholder="enter confirm password" name="password_confirmation" required
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

                        <!--====== Description Field ======-->
                        <div class="col-span-2">
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

                        <!--====== Profile Field ======-->
                        <div class="col-span-2">
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/image-plus.svg') }}" class="w-3.5 h-3.5">
                                Upload Profile
                            </label>
                            <div class="relative">
                                <input type="file" id="imageUpload" name="profile_image"
                                    data-previewSectionId="profileimagePreviewContainer" accept="image/*"
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
                        <div id="profileimagePreviewContainer" class="hidden col-span-2">

                        </div>

                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 pt-2">
                        <button type="button" data-targetModalId="admin-add-modal"
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