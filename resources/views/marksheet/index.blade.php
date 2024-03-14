<x-app-layout>
    <div x-app-template class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-8">
            <div class="mb-6">
                <a href="{{route('marksheet.new')}}">
                    <x-primary-button>
                        {{ __('New Marksheet') }} 
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
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" dark:bg-inherit">
                            @foreach($marksheets as $marksheet)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet -> studentId -> full_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet->grade }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet->section }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet->roll_number }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $marksheet->createdBy->name }}</td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 hover:underline">
                                    <a href="{{route('marksheet.pdf', $marksheet -> id ) }}" target="_blank" class="px-3 py-2 hover:bg-gray-600  rounded-md" >
                                        View
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <form method="post"  action="{{ route('marksheet.delete', $marksheet -> id ) }}"  class="px-3 cursor-pointer py-2 hover:bg-gray-600  rounded-md" >
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            Delete
                                            <i class="fa-regular fa-bin"></i>
                                        </button>
                                    </form>
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