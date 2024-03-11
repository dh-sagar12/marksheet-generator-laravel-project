<x-app-layout>
    <div x-app-template class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-8">
            <div class="mb-6">
                <a href="{{route('student.new')}}">
                    <x-primary-button>
                        {{ __('New Student') }} 
                        <i class="fa-solid fa-plus ms-2 text-lg"></i>
                    </x-primary-button>
                </a>
            </div>
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden rounded-lg border-b border-gray-500">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Class Name</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Section</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roll Number</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date of Joined</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-inherit">
                            @foreach($students as $student)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->full_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->grade }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->section }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->roll_number }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ \Carbon\Carbon::parse($student->date_of_joined)->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $student->createdBy->name }}</td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{route('student.update', $student -> id ) }}">
                                        Edit
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>