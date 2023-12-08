<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin 
        </h2>

        
        <x-primary-button class="ms-3 mb-5">
                <a href="{{ route('company.create') }}">{{ __('create') }}</a>
            </x-primary-button>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Companies
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
                                    <th style="padding: 8px; text-align: left;">Actions</th>
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
                                        <td style="padding: 8px;">
                                            <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary" style = "color:blue">view</a>
                                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary" style = "color:blue">Edit</a>
                                            <form action="{{ route('company.destroy', $company->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style = "color:red" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                            </form>
                                        </td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Display Pagination Links -->
                    {{ $companies->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
