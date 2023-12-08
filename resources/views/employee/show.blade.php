<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{$employee->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <h1>employee info</h1>
                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table style="border-collapse: collapse; width: 100%; border: 1px solid #ddd;">
                            <!-- Table Header -->
                            <thead>
                                <tr style="border: 1px solid #ddd; background-color: #f2f2f2;">
                                    <th style="padding: 8px; text-align: left;">ID</th>
                                    <th style="padding: 8px; text-align: left;">Name</th>
                                    <th style="padding: 8px; text-align: left;">Email</th>
                                    <th style="padding: 8px; text-align: left;">Phone</th>
                                    <th style="padding: 8px; text-align: left;">Actions</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                    <tr style="border: 1px solid #ddd;">
                                        <td style="padding: 8px;">{{ $employee->id }}</td>
                                        <td style="padding: 8px;">{{ $employee->first_name }}  {{ $employee->last_name }}</td>

                                        <td style="padding: 8px;">{{ $employee->user->email }}</td>
                                        <td style="padding: 8px;">{{ $employee->phone }}</td>

                                        <td style="padding: 8px;">
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary" style = "color:blue">Edit</a>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style = "color:red" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                            </form>
                                        </td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                            </tbody>
                        </table>
                    </div>

 

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
