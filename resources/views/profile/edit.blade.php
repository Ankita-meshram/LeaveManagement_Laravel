<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#2f1b14;">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background:#f4eadb; min-height:calc(100vh - 65px);">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Profile Information --}}
            <div class="p-6 sm:p-8 shadow-sm sm:rounded-xl"
                 style="background:#fbf6ee; border:1px solid #e2d2bf;">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="p-6 sm:p-8 shadow-sm sm:rounded-xl"
                 style="background:#fbf6ee; border:1px solid #e2d2bf;">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="p-6 sm:p-8 shadow-sm sm:rounded-xl"
                 style="background:#fbf6ee; border:1px solid #e2d2bf;">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>