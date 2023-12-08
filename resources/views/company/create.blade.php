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

    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- name Address -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- logo Address -->
        <div>
            <x-input-label for="logo" :value="__('Logo')" />
            <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" required  />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>

        <!-- website Address -->
        <div>
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website_link" :value="old('website_link')" required />
            <x-input-error :messages="$errors->get('website_link')" class="mt-2" />
        </div>


        <x-primary-button class="ms-3">
                {{ __('Create') }}
            </x-primary-button>

 
            </form>
                </div>
                </div>

    </div>
</x-app-layout>
