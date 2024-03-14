<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marksheet</title>

    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>

</head>

<body class="bg-gray-100">

    <div class="container mx-auto text-center mt-8">
        <h1 class="text-3xl font-bold">Pragati Secondary School</h1>
        <p>Kanchan, 01, Rupandehi</p>
        <p>071-440445, 9802653245</p>
    </div>

    <div class="container mx-auto mt-8 ">
        <h2 class="text-2xl font-bold text-center">Student Marksheet</h2>

        <div class="flex justify-center mt-8">
            <div class="w-full">
                <div class="flex  space-x-10">
                    <span class="font-bold mx-11">Name: {{ $marksheet -> studentId -> full_name }}</span>
                    <span class="font-bold mx-11">Class: {{ $marksheet -> grade }}</span>
                </div>
                <div>
                    <span class="font-bold mx-11">Roll Number: {{ $marksheet -> roll_number}}</span>
                    <span class="font-bold mx-32">Section: {{ $marksheet -> section}}</span>
                </div>

                <table class="w-full mt-8 border-collapse border border-black">
                    <thead class="border-black">
                        <tr class="">
                            <th class="border border-black px-4 py-2">Subject</th>
                            <th class="border border-black px-4 py-2">Full Marks</th>
                            <th class="border border-black px-4 py-2">Pass Marks</th>
                            <th class="border border-black px-4 py-2">Obtained</th>
                            <th class="border border-black px-4 py-2">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $marksheet -> marksheetDetails as $marksheet_details)
                            
                            <tr>
                                <td class="border border-black px-4 py-2">{{ $marksheet_details  -> subject_name}}</td>
                                <td class="border border-black px-4 py-2"> {{ $marksheet_details  -> full_marks}} </td>
                                <td class="border border-black px-4 py-2"> {{ $marksheet_details  -> pass_marks}} </td>
                                <td class="border border-black px-4 py-2">{{ $marksheet_details  -> marks_obtained }}</td>
                                <td class="border border-black px-4 py-2">
                                    @if ($marksheet_details  -> marks_obtained < $marksheet_details  -> pass_marks )
                                        *Fail
                                    @else
                                        Pass
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                        <!-- Repeat rows for each subject -->
                    </tbody>
                </table>

                <div class="mt-8">
                    <p class="font-bold">Percentage:</p>
                    <p>
                        {{$percentage }} %
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <p>Guardian Signature: ________________________</p>
            <p>Principal Signature: ________________________</p>
        </div>
    </div>

</body>

</html>