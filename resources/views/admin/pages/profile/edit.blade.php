@extends('admin.layouts.main')
@section('title', 'Profile')


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
                <li>
                    <a href="{{ route('profile.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Profile</a>
                </li>
                <li>
                    <span class="mx-2">/</span>
                </li>
                <li class="text-gray-700">Edit Profile</li>
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

    @if (isset($data['admin']))
        @php
            $admin = $data['admin'];
            $profileImageExists =
                !empty($admin->profile_image) && Storage::disk('public')->exists($admin->profile_image);

            $firstLetter = strtoupper(substr($admin->name, 0, 1));
        @endphp

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">

            {{-- -========  PROFILE HEADER BANNER ======== --}}
            <div class="px-6 py-6 flex items-center gap-5">
                {{-- === profile image ==== --}}
                <div
                    class="w-20 h-20 rounded-full border-4 border-white border-opacity-30 bg-blue-500 flex items-center justify-center shrink-0 shadow-md">
                    @if ($profileImageExists)
                        <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Profile Image"
                            class="w-full h-full object-cover rounded-full">
                    @else
                        <span class="text-white text-2xl font-bold">
                            {{ $firstLetter }}
                        </span>
                    @endif
                </div>

                {{-- === Info ==== --}}
                <div>
                    <h1 class="text-xl font-bold leading-tight">{{ $admin->name ?? '' }}</h1>
                    <p class="text-sm mt-0.5">{{ $admin->email ?? '' }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span
                            class="{{ $admin->status ? 'bg-green-200 text-green-700 ' : 'bg-red-200 text-red-700' }} text-xs font-semibold px-2.5 py-0.5 rounded-full flex items-center gap-1.5">
                            <span
                                class="w-1.5 h-1.5  {{ $admin->status ? 'bg-green-500' : 'bg-red-500' }} rounded-full inline-block"></span>
                            {{ $admin->status ? 'Active' : 'Inactive' }}
                        </span>
                        @php
                            $roles = [
                                1 => 'SUPER ADMIN',
                                2 => 'ADMIN',
                                3 => 'EDITOR',
                            ];

                            $roleLabel = $roles[$admin->admin_role] ?? 'UNKNOWN';
                        @endphp

                        <span
                            class="bg-blue-200 bg-opacity-15 text-blue-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            {{ $roleLabel }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- -======== Form ======== --}}
            <div class="px-8 py-6 overflow-y-auto h-[90%]">
                <form id="dataForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 mb-5">

                        <!--====== Name ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/user-check.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Name
                            </label>
                            <div class="relative">
                                <input type="text" value="{{ $data['admin']->name }}" placeholder="Enter Name..."
                                    name="name" required
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
                                <input type="text" value="{{ $data['admin']->username }}"
                                    placeholder="Enter username..." name="username"
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
                                <input type="email" value="{{ $data['admin']->email }}" placeholder="Enter email..."
                                    name="email" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== Phone  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/phone.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Phone
                            </label>
                            <div class="relative">
                                <input type="text" value="{{ $data['admin']->phone }}" placeholder="Enter email..."
                                    name="phone"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== password ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/lock.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" minlength="8" placeholder="enter password" name="password"
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md placeholder-gray-400">
                            </div>
                        </div>

                        <!--====== password confirmation  ======-->
                        <div>
                            <label class="text-xs font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                                <img src="{{ asset('assets/svg/lock.svg') }}" class="w-3.5 h-3.5 pointer-events-none"
                                    alt="">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password" minlength="8" placeholder="enter confirm password"
                                    name="password_confirmation"
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
                                <select name="admin_role" required
                                    class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md appearance-none cursor-pointer">
                                    <option value="1" {{ $data['admin']->admin_role == '1' ? 'selected' : '' }}>Super
                                        Admin</option>
                                    <option value="2" {{ $data['admin']->admin_role == '2' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="3" {{ $data['admin']->admin_role == '3' ? 'selected' : '' }}>
                                        Editor
                                    </option>

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
                                    <option value="1" {{ $data['admin']->status == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ $data['admin']->status == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <img src="{{ asset('assets/svg/cheveron-down.svg') }}"
                                        class="w-4 h-4 pointer-events-none" alt="">
                                </div>
                            </div>
                        </div>

                        <!--====== Profile Field ======-->
                        <div class="lg:col-span-2 xl:col-span-1">
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
                        <div id="profileimagePreviewContainer"
                            class="{{ isset($data['admin']->profile_image) ? '' : 'hidden' }} lg:col-span-2">
                            @if (isset($data['admin']->profile_image))
                                <div class="relative inline-flex gap-2">
                                    <img src="{{ asset('storage/' . $data['admin']->profile_image) }}"
                                        class="w-24 h-24 object-cover rounded border">
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="hidden">
                        <input type="hidden" name="id" value="{{ $data['admin']->id }}">
                    </div>

                    <!--=== Action Buttons ===-->
                    <div class="flex gap-3 justify-end pt-2">
                        <a href="{{ route('profile.index') }}"
                            class="relative cursor-pointer flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-300 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ asset('assets/svg/corner-up-left.svg') }}" class="w-4 h-4 pointer-events-none"
                                alt="">
                            <span class="pointer-events-none">Cancel</span>
                        </a>

                        <button type="submit"
                            class=" cursor-pointer group relative flex items-center gap-2 px-5 py-2.5 text-md font-medium text-white bg-blue-500 border border-gray-200 rounded-lg shadow-sm hover:bg-blue-700 hover:border-gray-300 hover:shadow-md hover:-translate-y-1  transition-all duration-200">
                            <img src="{{ asset('assets/svg/white-save.svg') }}" class="w-4 h-4 pointer-events-none"
                                alt="">
                            <span class="pointer-events-none">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif


@endsection
