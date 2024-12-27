<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" /> 
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> <br>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>


        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="street" :value="('street')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="col-md-6 mt-4">
            <x-input-label for="city" :value="('city')" />
            <select id="city" class="form-control block mt-1 w-full" name="city">
                <option value="" disabled selected>{{ Auth::user()->city ?? 'Select your city' }}</option>
                <option value="Amman">Amman</option>
                <option value="Zarqa">Zarqa</option>
                <option value="Irbid">Irbid</option>
                <option value="Aqaba">Aqaba</option>
                <option value="Madaba">Madaba</option>
                <option value="Jerash">Jerash</option>
                <option value="Ajloun">Ajloun</option>
                <option value="Karak">Karak</option>
                <option value="Tafilah">Tafilah</option>
                <option value="Maan">Maan</option>
                <option value="Balqa">Balqa</option>
                <option value="Mafraq">Mafraq</option>
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <div>
                    <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                    <label for="male">Male</label>
        
                    <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                    <label for="female">Female</label>
                </div>
                @error('gender')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        

        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
