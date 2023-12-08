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

                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table style="border-collapse: collapse; width: 100%; border: 1px solid #ddd;">
                            <!-- Table Header -->
                            <thead>
                                <tr style="border: 1px solid #ddd; background-color: #f2f2f2;">
                                    <th style="padding: 8px; text-align: left;">ID</th>
                                    <th style="padding: 8px; text-align: left;">Name</th>
                                    <th style="padding: 8px; text-align: left;">Email</th>
                                    <th style="padding: 8px; text-align: left;">Website</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach($companies as $company)
                                    <tr style="border: 1px solid #ddd;">
                                        <td style="padding: 8px;">{{ $company->id }}</td>
                                        <td style="padding: 8px;">{{ $company->name }}</td>
                                        <td style="padding: 8px;">{{ $company->email }}</td>
                                        <td style="padding: 8px;">
                                            <a href="{{ $company->website_link }}" target="_blank">{{ $company->website_link }}</a>
                                        </td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Display Pagination Links -->
                    {{ $companies->links() }}

                    {{ __("Welcome page!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
