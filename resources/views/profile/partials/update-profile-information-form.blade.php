<section class="space-y-6">

    <header>
        <h2 class="text-xl font-semibold" style="color:#2f1b14;">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm" style="color:#6d5143;">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">

        @csrf
        @method('patch')

        <div>
            <x-input-label
                for="name"
                :value="__('Name')"
                style="color:#4b2e22;"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                style="border-color:#d8c4ad; background:#fffdf9;"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />
        </div>


        <div>
            <x-input-label
                for="email"
                :value="__('Email')"
                style="color:#4b2e22;"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                style="border-color:#d8c4ad; background:#fffdf9;"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />
        </div>


        <div class="flex items-center gap-4">

            <button
                type="submit"
                class="px-5 py-2.5 rounded-lg text-sm font-semibold transition hover:opacity-90"
                style="background:#4b2e22; color:#fffaf3;">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium"
                    style="color:#28613a;"
                >
                    {{ __('Saved successfully.') }}
                </p>
            @endif

        </div>

    </form>

</section>