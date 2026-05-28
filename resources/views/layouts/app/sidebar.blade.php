<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
    <head>
        <!-- ... -->

        @fluxAppearance
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
    <flux:header container class="h-20 bg-zinc-50 dark:bg-pink-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="#" logo="{{asset('storage/logo/kirbylogo.png')}}" name="Kiby's Library." class="max-lg:hidden dark:hidden" />
        <flux:brand href="#" logo="{{asset('storage/logo/kirbylogo.png')}}" name="Kirby's Library." class="max-lg:hidden! hidden dark:flex" />

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item wire:navigate icon="home" href="{{route('dashboard')}}">Books</flux:navbar.item>
            <flux:navbar.item wire:navigate icon="document-text" href="{{route('documents')}}">Documents</flux:navbar.item>
            <flux:navbar.item wire:navigate icon="calendar" href="#">Calendar</flux:navbar.item>

            <flux:separator vertical variant="subtle" class="my-2"/>

            <flux:dropdown class="max-lg:hidden">
                <flux:navbar.item icon:trailing="chevron-down">Favorites</flux:navbar.item>

                <flux:navmenu>
                    <flux:navmenu.item href="#">I</flux:navmenu.item>
                    <flux:navmenu.item href="#">Love</flux:navmenu.item>
                    <flux:navmenu.item href="#">Kirby</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>
        </flux:navbar>

        <flux:spacer />

        <flux:navbar class="me-4">
            <flux:navbar.item wire:navigate class="max-lg:hidden" icon="cog-6-tooth" href="{{route('profile.edit')}}" label="Settings" />
        </flux:navbar>

        <div class="hidden lg:block">
            <x-desktop-user-menu />
        </div>

    </flux:header>

    <flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-pink-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="{{ route('dashboard') }}"
                logo="{{asset('storage/logo/kirbylogo.png')}}"
                logo:dark="{{asset('storage/logo/kirbylogo.png')}}"
                name="Kirby's Library."
            />

            <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:navbar.item icon="home" href="{{route('dashboard')}}">Books</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="{{route('documents')}}">Documents</flux:navbar.item>
            <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>

            <flux:sidebar.group expandable heading="Open me !" class="grid">
                <flux:navmenu.item href="#">I</flux:navmenu.item>
                <flux:navmenu.item href="#">Love</flux:navmenu.item>
                <flux:navmenu.item href="#">Kirby</flux:navmenu.item>
            </flux:sidebar.group>
        </flux:sidebar.nav>

        <flux:sidebar.spacer />

        <flux:sidebar.nav>
            <flux:sidebar.item icon="cog-6-tooth" href="{{route('profile.edit')}}">Settings</flux:sidebar.item>
            <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
            <x-desktop-user-menu/>
        </flux:sidebar.nav>
    </flux:sidebar>

    <flux:main container>

    </flux:main>

    @fluxScripts
    </body>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
