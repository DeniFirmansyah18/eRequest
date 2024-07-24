@php
$role = Auth::user()->role; // Asumsikan Anda sudah mengatur role di model User
@endphp

<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar" class="flex lg:!flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-white dark:bg-gray-800 p-4 transition-all duration-200 ease-in-out {{ $variant === 'v2' ? 'border-r border-gray-200 dark:border-gray-700/60' : 'rounded-r-2xl shadow-sm' }}" :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'" @click.outside="sidebarOpen = false" @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="">
                <img src="/images/Logo.png" alt="Logo" width="32" height="32" class="fill-green-500" />
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>

                <!--Dashboard Admin-->
                @if ($role == 'admin')
                <ul class="mt-3">
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 {{ Request::routeIs('admin.dashboard') ? 'bg-green-500/[0.12] dark:bg-green-500/[0.24]' : 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))]' }}">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition" href="{{ route('admin.dashboard') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current {{ Request::routeIs('admin.dashboard') ? 'text-green-500' : 'text-gray-400 dark:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M5.936.278A7.983 7.983 0 0 1 8 0a8 8 0 1 1-8 8c0-.722.104-1.413.278-2.064a1 1 0 1 1 1.932.516A5.99 5.99 0 0 0 2 8a6 6 0 1 0 6-6c-.53 0-1.045.076-1.548.21A1 1 0 1 1 5.936.278Z" />
                                    <path d="M6.068 7.482A2.003 2.003 0 0 0 8 10a2 2 0 1 0-.518-3.932L3.707 2.293a1 1 0 0 0-1.414 1.414l3.775 3.775Z" />
                                </svg>
                                <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <!-- Pengajuan -->
                    <li x-data="{ open: {{ in_array(Request::segment(1), ['pengajuan']) ? 1 : 0 }}, sidebarExpanded: true }" :class="open ? 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-green-500/[0.12] dark:from-green-500/[0.24] to-green-500/[0.04]' : ''" class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0">
                        <a href="#0" @click.prevent="open = !open; sidebarExpanded = true" :class="!open ? 'hover:text-gray-900 dark:hover:text-white' : ''" class="block text-gray-800 dark:text-gray-100 truncate transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg :class="open ? 'text-green-500' : 'text-gray-400 dark:text-gray-500'" class="shrink-0 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M13.95.879a3 3 0 0 0-4.243 0L1.293 9.293a1 1 0 0 0-.274.51l-1 5a1 1 0 0 0 1.177 1.177l5-1a1 1 0 0 0 .511-.273l8.414-8.414a3 3 0 0 0 0-4.242L13.95.879ZM11.12 2.293a1 1 0 0 1 1.414 0l1.172 1.172a1 1 0 0 1 0 1.414l-8.2 8.2-3.232.646.646-3.232 8.2-8.2Z" />
                                        <path d="M10 14a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z" />
                                    </svg>
                                    <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pengajuan</span>
                                </div>
                                <div class="flex items-center">
                                    @if(isset($pendingCount) && $pendingCount > 0)
                                    <span class="inline-block bg-red-500 text-white text-xs rounded-full px-2 py-1 ml-2">
                                        {{ $pendingCount }}
                                    </span>
                                    @endif
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 transition-transform duration-200" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div x-show="open || sidebarExpanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1">
                                <li class="mb-1 last:mb-0">
                                    <a href="{{ route('admin.daftarPengajuan') }}" @click="open = true" :class="{'!text-green-500': '{{ Route::is('admin.daftarPengajuan') }}'}" class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate">
                                        <span class="text-lg font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Daftar Pengajuan</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a href="{{ route('admin.tindakLanjut') }}" @click="open = true" :class="{'!text-green-500': '{{ Route::is('admin.tindakLanjut') }}'}" class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate">
                                        <span class="text-lg font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tindak Lanjut</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- riwayat -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 {{ Request::routeIs('admin.riwayat') ? 'bg-green-500/[0.12] dark:bg-green-500/[0.24]' : 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))]' }}">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['admin.riwayat'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('admin.riwayat') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current shrink-0 fill-current {{ Request::routeIs('admin.riwayat') ? 'text-green-500' : 'text-gray-400 dark:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Riwayat</span>
                            </div>
                        </a>
                    </li>

                    @elseif ($role == 'user_opd')
                    <!-- Dashboard User -->
                    <li class="list-none pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 {{ Request::routeIs('user_opd.dashboard') ? 'bg-green-500/[0.12] dark:bg-green-500/[0.24]' : 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))]' }}">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition" href="{{ route('user_opd.dashboard') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current {{ Request::routeIs('user_opd.dashboard') ? 'text-green-500' : 'text-gray-400 dark:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M5.936.278A7.983 7.983 0 0 1 8 0a8 8 0 1 1-8 8c0-.722.104-1.413.278-2.064a1 1 0 1 1 1.932.516A5.99 5.99 0 0 0 2 8a6 6 0 1 0 6-6c-.53 0-1.045.076-1.548.21A1 1 0 1 1 5.936.278Z" />
                                    <path d="M6.068 7.482A2.003 2.003 0 0 0 8 10a2 2 0 1 0-.518-3.932L3.707 2.293a1 1 0 0 0-1.414 1.414l3.775 3.775Z" />
                                </svg>
                                <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard User</span>
                            </div>
                        </a>
                    </li>
                    <!-- Daftar Pengajuan User-->
                    <li class="list-none pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] {{ Request::routeIs('user_opd.daftarPengajuan') ? 'bg-green-500/[0.12] dark:bg-green-500/[0.24]' : 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))]' }}">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['user_opd.daftarPengajuan'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('user_opd.daftarPengajuan') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current {{ Request::routeIs('user_opd.daftarPengajuan') ? 'text-green-500' : 'text-gray-400 dark:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                    <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" /></svg>
                                </svg>
                                <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Daftar Pengajuan</span>
                            </div>
                        </a>
                    </li>
                    <!-- Tambah Pengajuan User-->
                    <li class="list-none pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] {{ Request::routeIs('user_opd.tambahPengajuan') ? 'bg-green-500/[0.12] dark:bg-green-500/[0.24]' : 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))]' }}">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['user_opd.tambahPengajuan'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('user_opd.tambahPengajuan') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current {{ Request::routeIs('user_opd.tambahPengajuan') ? 'text-green-500' : 'text-gray-400 dark:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                                <span class="text-lg font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tambah Pengajuan</span>
                            </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="w-12 pl-4 pr-3 py-2">
                <button class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 transition-colors" @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500 sidebar-expanded:rotate-180" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
