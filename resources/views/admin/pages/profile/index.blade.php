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
                <li class="text-gray-700">Profile</li>
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
            <div class="px-6 py-6 flex items-center gap-2 lg:gap-5">
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
                            class="bg-blue-200 bg-opacity-15 text-blue-500 whitespace-nowrap text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            {{ $roleLabel }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- ========DETAILS ======= --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-10">
                                #
                            </th>
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-48">
                                Field
                            </th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Value
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- ===== Name ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">1</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/user.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Name</span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-sm text-gray-700 font-medium">{{ $admin->name ?? '--' }}</td>
                        </tr>

                        {{-- ===== Email ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">2</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/mail.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Email</span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-sm text-gray-700 font-medium">{{ $admin->email ?? '--' }}</td>
                        </tr>

                        {{-- ===== Username ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">3</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/user-check.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Username</span>
                                </div>
                            </td>
                            <td class="px-5 py-3">
                                <span class="text-sm text-gray-500 italic">{{ $admin->username ?? '--' }}</span>
                            </td>
                        </tr>

                        {{-- ===== Phone ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">4</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/phone.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Phone</span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-sm text-gray-700 font-medium">{{ $admin->phone ?? '--' }}</td>
                        </tr>

                        {{-- ===== Admin Role ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">5</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/star.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Admin Role</span>
                                </div>
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <span class="bg-blue-50 text-primary text-xs font-bold px-2.5 py-0.5 rounded-full">
                                        {{ $roleLabel ?? '--' }}
                                    </span>
                                </div>
                            </td>
                        </tr>

                        {{-- ===== Status ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">6</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/tag.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Status</span>
                                </div>
                            </td>
                            <td class="px-5 py-3">
                                <span
                                    class="text-xs font-semibold px-2.5 py-0.5 rounded-full flex items-center gap-1.5 w-fit">
                                    <span
                                        class="w-1.5 h-1.5 {{ $admin->status ? 'bg-green-500' : 'bg-red-500' }}  rounded-full inline-block"></span>
                                    {{ $admin->status ? 'Active' : 'InActive' }}
                                </span>
                            </td>
                        </tr>

                        {{-- ===== Last Login At ==== --}}
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-5 py-3 text-sm text-gray-400">7</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/svg/clock.svg') }}" class="w-4 h-4">
                                    <span class="text-sm font-medium text-gray-600">Last Login At</span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-sm text-gray-700 font-medium">{{ $admin->last_login_at }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- ====== FOOTER ====== --}}
            <div class="border-t border-gray-200 bg-gray-50 px-5 py-3 flex items-center justify-between">
                <span class="text-xs text-gray-400">Read-only view</span>

                <div class="flex items-center gap-2">
                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center justify-center w-7 h-7 rounded-md border border-gray-300 text-gray-500 hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition"
                        title="Edit">
                        <img src="{{ asset('assets/svg/pencil.svg') }}" class="w-4 h-4 pointer-events-none">
                    </a>

                    @if (isset($admin->updated_at))
                        <span class="text-xs text-gray-400">
                            Last updated: {{ $admin->updated_at }}
                        </span>
                    @endif
                </div>
            </div>

        </div>
    @endif


@endsection
