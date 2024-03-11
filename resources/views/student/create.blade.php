<x-app-layout>
    <div x-app-template class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-8">
            <div class="mb-6">
                <div>New Student</div>
                <form method="post" action="{{ route('student.create') }}" class="mt-6 w-1/2 space-y-6">
                    @csrf
                    @include('student.partials.student-form')
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>