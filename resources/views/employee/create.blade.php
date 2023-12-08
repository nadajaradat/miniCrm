<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MinCRM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- name Address -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- phone Address -->
        <div>
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required  />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <x-primary-button class="ms-3">
                {{ __('Create') }}
            </x-primary-button>

 
            </form>
                </div>
                </div>

    </div>
</x-app-layout>
