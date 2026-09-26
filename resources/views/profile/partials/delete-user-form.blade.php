<section class="space-y-6">

    <header>
        <h2 class="text-xl font-semibold" style="color:#8b2f2f;">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm" style="color:#6d5143;">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>


    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-5 py-2.5 rounded-lg text-sm font-semibold transition hover:opacity-90"
        style="background:#9b3025; color:white;">
        {{ __('Delete Account') }}
    </button>


    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable>

        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6">

            @csrf
            @method('delete')


            <h2 class="text-lg font-semibold" style="color:#8b2f2f;">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>


            <p class="mt-1 text-sm" style="color:#6d5143;">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>


            <div class="mt-6">

                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    style="border-color:#d8c4ad; background:#fffdf9;"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />

            </div>


            <div class="mt-6 flex justify-end">

                <x-secondary-button
                    x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>


                <button
                    type="submit"
                    class="ms-3 px-5 py-2.5 rounded-lg text-sm font-semibold"
                    style="background:#9b3025; color:white;">
                    {{ __('Delete Account') }}
                </button>

            </div>

        </form>

    </x-modal>

</section>