<form method="post" onsubmit="handleFormSubmit(event)" class="mt-6 w-full space-y-6">
    @csrf

    <div class="flex flex-col space-y-2 w-1/2">
        <div>
            <x-input-label for="student_id" :value="__('Search Student')" />
            <x-text-input id="student_id" name="student_id" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('student_id')" />
            <ul id="student_options" class="border hidden border-gray-500  max-h-[250px] overflow-auto">
            </ul>
        </div>
        <div>
            <x-secondary-button id="search_student">{{ __('Search Student') }}</x-secondary-button>
        </div>
        <div id="student_data">

        </div>
    </div>

    <div class="" id="marksheet_detail_form">



    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>

<script>
    const marksheet_detail = [];
    $(document).ready(function() {
        $('#search_student').click(function() {
            var student_input = $('#student_id').val();
            $.ajax({
                url: `/api/students/?name=${student_input}`,
                method: "GET",
                beforeSend: () => {
                    $('#student_options').html('');
                    $('#student_options').toggleClass('hidden')
                },
                success: (response) => {
                    response.forEach(element => {
                        $('#student_options').append(
                            `<li class="px-3 py-2 cursor-pointer hover:bg-gray-600" value=${element.id} onclick="chooseStudent(${element.id})" >${element.full_name}</li>`
                        )
                    });
                },
                error: (error) => {
                    console.log(error);
                }
            })
        });
    });

    function toNormalFormat(inputString, separator = ' ') {
        inputString = inputString.replace(/_/g, separator);
        inputString = inputString.replace(/([a-z])([A-Z])/g, '$1 $2');
        inputString = inputString.replace(/([A-Z])([A-Z][a-z])/g, '$1 $2');
        inputString = inputString.replace(/\b\w/g, match => match.toUpperCase());
        return inputString;
    }


    function chooseStudent(student_id) {
        $.ajax({
            url: `/api/students/${student_id} `,
            beforeSend: () => {
                $('#student_data').html('');

            },
            method: "GET",
            success: (response) => {
                let required_field = ['full_name', 'grade', 'section', 'roll_number']
                for (let key in response) {
                    if (required_field.includes(key)) {
                        let lab = toNormalFormat(key)
                        $('#student_data').append(
                            `   
                            <div>
                                    <label for="${key}"  class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                        ${toNormalFormat(key)}
                                    </label>
                                    <input id="${key}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full disabled:cursor-not-allowed" name="${key}" disabled  type="text" 
                                    value="${response[key]}"
                                    class="mt-1 block w-full" required autofocus />
                            </div>
                            `
                        )
                    }
                };
                $('#student_data').append("<hr class='my-6' />")
                $('#student_id').val(response.id)
                $('#student_options').html('');


                $('#marksheet_detail_form').append(
                    `
                        <form class="flex space-x-5 items-center" onsubmit="maintainMarksheetDetails(event)">
                            <div>
                                <x-input-label for="subject_name" :value="__('Subject Name')" />
                                <x-text-input id="subject_name" name="subject_name" type="text" class="mt-1 block w-full subject_name" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('subject_name')" />
                            </div>
                            <div>
                                <x-input-label for="full_marks" :value="__('Full Marks')" />
                                <x-text-input id="full_marks" value="100" name="full_marks" type="number" class="mt-1 block w-full full_marks" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('full_marks')" />
                            </div>
                        
                            <div>
                                <x-input-label for="pass_marks" :value="__('Pass Marks')" />
                                <x-text-input id="pass_marks" value="35" name="pass_marks" type="number" class="mt-1 block w-full pass_marks" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('pass_marks')" />
                            </div>

                            <div>
                                <x-input-label for="marks_obtained" :value="__('Marks Obtained')" />
                                <x-text-input id="marks_obtained" name="marks_obtained" type="number" class="mt-1 block w-full marks_obtained" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('marks_obtained')" />
                            </div>

                            <div id="add_button">
                                <x-primary-button type="submit" class="mt-[20px]" >{{ __('Add') }}</x-primary-button>
                            </div>
                        </form>
        `)
            }
        })
    }

    function maintainMarksheetDetails(event) {
        event.preventDefault();

        data = {
            'subject_name': event.target.querySelector("#subject_name").value,
            'full_marks': event.target.querySelector("#full_marks").value,
            'pass_marks': event.target.querySelector("#pass_marks").value,
            'marks_obtained': event.target.querySelector("#marks_obtained").value,
        };
        marksheet_detail.push(data);
        // $('#add_button').addClass('hidden');
        event.target.querySelector("#add_button").classList.add('hidden')
        $('#marksheet_detail_form').append(
            `
                    <form class="flex space-x-5 items-center" onsubmit="maintainMarksheetDetails(event)">
                        <div>
                            <x-input-label for="subject_name" :value="__('Subject Name')" />
                            <x-text-input id="subject_name" name="subject_name" type="text" class="mt-1 block w-full subject_name" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('subject_name')" />
                        </div>
                        <div>
                            <x-input-label for="full_marks" :value="__('Full Marks')" />
                            <x-text-input id="full_marks" value="100" name="full_marks" type="number" class="mt-1 block w-full full_marks" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('full_marks')" />
                        </div>
                    
                        <div>
                            <x-input-label for="pass_marks" :value="__('Pass Marks')" />
                            <x-text-input id="pass_marks" value="35" name="pass_marks" type="number" class="mt-1 block w-full pass_marks" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('pass_marks')" />
                        </div>

                        <div>
                            <x-input-label for="marks_obtained" :value="__('Marks Obtained')" />
                            <x-text-input id="marks_obtained" name="marks_obtained" type="number" class="mt-1 block w-full marks_obtained" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('marks_obtained')" />
                        </div>

                        <div id="add_button">
                            <x-primary-button type="submit" class="mt-[20px]">{{ __('Add') }}</x-primary-button>
                        </div>
                    </form>
                    `
        )
        console.log(marksheet_detail);
    }


    function handleFormSubmit(event) {
        event.preventDefault()
        var csrfToken = "{{ csrf_token() }}";
        marksheet_data = {
            _token: csrfToken,
            student_id: $('#student_id').val(),
            grade: $('#grade').val(),
            section: $('#section').val(),
            roll_number: $('#roll_number').val(),
            marksheet_detail: marksheet_detail
        }
        if (marksheet_detail.length === 0) {
            alert('Invalid marksheet data')
            return
        }
        $.ajax({
            url: '/marksheet',
            method: 'POST',
            data: marksheet_data,
            success: (response) => {
                console.log(response);
                window.location = '/marksheet'
            }, 
        })
    }
</script>