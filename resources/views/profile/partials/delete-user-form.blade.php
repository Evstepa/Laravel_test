<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Удаление учётной записи') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Как только ваша учётная запись будет удалена, все её ресурсы и данные будут удалены безвозвратно. Перед удалением вашей учётной записи, пожалуйста, загрузите любые данные или информацию, которые вы хотите сохранить.') }}
        </p>
    </header>

    <button class="btn btn-danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Удалить учётную запись') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Вы уверены, что хотите удалить свою учетную запись?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Как только ваша учетная запись будет удалена, все её ресурсы и данные будут удалены безвозвратно. Пожалуйста, введите свой пароль, чтобы подтвердить, что вы хотите удалить свою учётную запись безвозвратно.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Пароль') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button class="btn btn-outline-dark"
                    x-on:click="$dispatch('close')">
                    {{ __('Отменить') }}
                </button>

                <button class="btn btn-danger ms-3">
                    {{ __('Удалить') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
