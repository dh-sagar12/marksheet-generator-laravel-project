<div class="flex ">
    <aside class="w-60 h-screen bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 text-gray-900 dark:text-gray-100">

        <ul class=" py-5">

            <a href="/">
                <li class="text-xl p-3 my-2 w-full  space-x-2 font-semibold hover:bg-gray-700 ">
                    <i class="fa-solid fa-gauge"></i>
                    <span> Dashboard </span>
                </li>
            </a>

            <a href="{{ route('student.all') }}">

                <li class="text-xl p-3 my-2 w-full space-x-2 font-semibold hover:bg-gray-700">
                    <i class="fa-solid fa-users"></i>
                    <span>Student</span>
                </li>
            </a>



            <a href="{{ route('marksheet.all') }}">

                <li class="text-xl p-3 my-2 w-full space-x-2 font-semibold hover:bg-gray-700">
                    <i class="fa-solid fa-sheet-plastic"></i>
                    <span>Marksheets</span>
                </li>
            </a>

        </ul>

    </aside>
</div>