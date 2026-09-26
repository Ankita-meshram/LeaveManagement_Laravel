<section class="space-y-6">

    <header>
        <h2 class="text-xl font-semibold" style="color:#2f1b14;">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm" style="color:#6d5143;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>


    <form method="post"
          action="{{ route('password.update') }}"
          class="mt-6 space-y-6">

        @csrf
        @method('put')


        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
                style="color:#4b2e22;"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                style="border-color:#d8c4ad; background:#fffdf9;"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>


        <div>
            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
                style="color:#4b2e22;"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                style="border-color:#d8c4ad; background:#fffdf9;"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>


        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
                style="color:#4b2e22;"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                style="border-color:#d8c4ad; background:#fffdf9;"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>


        <div class="flex items-center gap-4">

            <button
                type="submit"
                class="px-5 py-2.5 rounded-lg text-sm font-semibold transition hover:opacity-90"
                style="background:#4b2e22; color:#fffaf3;">
                {{ __('Save Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium"
                    style="color:#28613a;"
                >
                    {{ __('Password updated successfully.') }}
                </p>
            @endif

        </div>

    </form>

</section>