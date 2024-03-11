<div>
    <x-input-label for="full_name" :value="__('Name')" />
    <x-text-input id="full_name" name="full_name" type="text" :value="old('full_name', $student->full_name)"  class="mt-1 block w-full" required autofocus autocomplete="full_name" />
    <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
</div>

<div>
    <x-input-label for="grade" :value="__('Grade')" />
    <x-text-input id="grade" name="grade" type="text" :value="old('grade', $student->grade)" class="mt-1 block w-full" required autofocus autocomplete="grade" />
    <x-input-error class="mt-2" :messages="$errors->get('grade')" />
</div>

<div>
    <x-input-label for="section" :value="__('Section')" />
    <x-text-input id="section" name="section" type="text" :value="old('section', $student->section)" class="mt-1 block w-full" required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('section')" />
</div>

<div>
    <x-input-label for="roll_number" :value="__('Roll Number')" />
    <x-text-input id="roll_number" name="roll_number" type="text" :value="old('roll_number', $student->roll_number)" class="mt-1 block w-full" required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('roll_number')" />
</div>

<div>
    <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
    <x-text-input id="date_of_birth" name="date_of_birth" type='date' :value="old('date_of_birth', $student->date_of_birth)" class="mt-1 block w-full" required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
</div>



<div>
    <x-input-label for="date_of_joined" :value="__('Date Of Joined')" />
    <x-text-input id="date_of_joined" name="date_of_joined" type='date'  :value="old('date_of_joined', $student->date_of_joined)" class="mt-1 block w-full" required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('date_of_joined')" />
</div>

