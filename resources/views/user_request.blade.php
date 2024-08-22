<x-guest-layout>
    <div class="mb-2">
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Форма обращения клиента') }}
        </h4>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div>
            <x-input-label for="sername" :value="__('Фамилия')" />
            <x-text-input id="sername" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Телефон')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Message -->
        <div class="mt-4">
            <x-input-label for="message" :value="__('Обращение')" />
            <textarea name="message" id="message" cols="30" rows="4" class="form-control border-secondary-subtle"></textarea>
        </div>

        <!-- Password -->
        <div class="mt-4 d-none">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            :value="$password" />
        </div>
        <div class="mt-4 d-none">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            :value="$password" />
                             />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-primary ms-4">
                {{ __('Отправить') }}
            </button>
        </div>
    </form>
</x-guest-layout>

