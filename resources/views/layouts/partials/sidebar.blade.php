<aside
    x-cloak
    class="fixed inset-y-0 left-0 z-50 font-semibold flex w-65 flex-col overflow-hidden border-r border-sidebar-border bg-sidebar transition-all duration-300 ease-in-out max-lg:-translate-x-full"
    :class="{ 'lg:-translate-x-full': collapsed, 'max-lg:translate-x-0': mobileSidebar }"
>

    <div class="flex h-17 items-center gap-3 border-b border-sidebar-border px-4 shrink-0">



        <div
            x-show="!collapsed"
            x-transition.opacity
            class="min-w-0"
        >
            @if (is_null(config('app.name')) || config('app.name') === 'Laravel')

                <img src="{{ asset('logo-siakad.svg') }}" class="w-48" alt="e-SIAKAD">
            @else
            <div class="flex items-center gap-2">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500/10 shrink-0"
                >
                    <span class="material-icons-outlined icon-lg text-brand-600">
                        school
                    </span>

                </div>
                <h1 class="truncate font-display font-bold text-brand-700 dark:text-brand-100"
                >
                    o-SIAKAD
                </h1>
            </div>

            @endif




        </div>

    </div>

    {{-- ========================================= --}}
    {{-- MENU --}}
    {{-- ========================================= --}}
    <div
        class="flex-1 overflow-y-auto overflow-x-hidden scrollbar-thin"
    >

        <nav class="p-2">

            <template
                x-for="(item,index) in menuItems"
                :key="item.id || item.label"
            >

                <div class="mb-1">

                    {{-- MENU TANPA CHILD --}}
                    <template x-if="!item.children">

                        <button
                            @click="navigate(item.route)"
                            class="group flex w-full items-center gap-3 cursor-pointer rounded-lg px-3 py-2 text-sm transition-all duration-200"

                            :class="
                                activePage === item.route
                                ? 'bg-brand-500/10 text-brand-700 dark:text-brand-300'
                                : 'text-sidebar-muted hover:bg-black/5 hover:text-sidebar-text dark:hover:bg-white/5'
                            "
                        >

                            <span
                                class="material-icons-outlined icon-md shrink-0"
                                x-text="item.icon"
                            ></span>

                            <span
                                x-show="!collapsed"
                                x-transition.opacity
                                class="truncate"
                                x-text="item.label"
                            ></span>

                        </button>

                    </template>

                    {{-- MENU DENGAN CHILD --}}
                    <template x-if="item.children">

                        <div>

                            <button
                                @click="toggleSubmenu(index)"
                                class="group flex w-full items-center cursor-pointer gap-3 rounded-lg px-3 py-2 text-sm transition-all duration-200"

                                :class="
                                    isParentActive(item)
                                    ? 'bg-brand-500/10 text-brand-700 dark:text-brand-300'
                                    : 'text-sidebar-muted hover:bg-black/5 hover:text-sidebar-text dark:hover:bg-white/5'
                                "
                            >

                                <span
                                    class="material-icons-outlined icon-md shrink-0"
                                    x-text="item.icon"
                                ></span>

                                <span
                                    x-show="!collapsed"
                                    x-transition.opacity
                                    class="flex-1 truncate text-left"
                                    x-text="item.label"
                                ></span>

                                <span
                                    x-show="!collapsed"
                                    class="material-icons-outlined icon-sm transition-transform duration-200"
                                    :class="{
                                        'rotate-180': openMenus.includes(index)
                                    }"
                                >
                                    expand_more
                                </span>

                            </button>

                            {{-- SUBMENU --}}
                            <div
                                x-show="!collapsed"
                                class="submenu"
                                :class="{
                                    'open': openMenus.includes(index)
                                }"
                            >

                                <div class="mt-1 ml-5 border-l border-sidebar-border">

                                    <template
                                        x-for="child in item.children"
                                        :key="child.route"
                                    >

                                        <button
                                            @click="navigate(child.route)"
                                            class="flex w-full font-semibold cursor-pointer items-center gap-2 pl-5 pr-3 py-2 text-sm transition-all duration-150"

                                            :class="
                                                activePage === child.route
                                                ? 'font-medium text-brand-600 dark:text-brand-400'
                                                : 'text-sidebar-dim hover:text-brand-600'
                                            "
                                        >

                                            <span
                                                class="h-1.5 w-1.5 rounded-full shrink-0"

                                                :class="
                                                    activePage === child.route
                                                    ? 'bg-brand-500'
                                                    : 'bg-sidebar-dim'
                                                "
                                            ></span>

                                            <span
                                                x-text="child.label"
                                            ></span>

                                        </button>

                                    </template>

                                </div>

                            </div>

                        </div>

                    </template>

                </div>

            </template>

        </nav>

    </div>

    {{-- ========================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================= --}}
    <div
        class="border-t border-sidebar-border p-3"
        x-show="!collapsed"
        x-transition.opacity
    >

        <div
            class="rounded-lg bg-brand-500/5 p-3"
        >
            <div class="flex items-center gap-2">

                <span
                    class="material-icons-outlined icon-md text-brand-500"
                >
                    verified
                </span>

                <div>
                    <div
                        class="text-xs text-muted font-semibold"
                    >
                        Version: 0.1.3
                    </div>

                </div>

            </div>
        </div>

    </div>

</aside>
