<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">
            {{ __('Students Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-black-200 p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-student')}}">Add Student Infromation</a>
                    </div>
                    <br><br>
                    <div class="flex justify-center">
                        <h1>LIST OF STUDENTS</h1>
                    </div>
                    <br><br>
                    <table class="border-separate border-spacing-5">
                        <tr>
                            <th class="border border-gray-500 bg-blue-200 text-black font-bold py-2 px-4 rounded">ID No.</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Full Name</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Course</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Birth Date</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Gender</th>
                            <td></td>
                            <td class="bg-red-200 text-black font-bold py-2 px-4 rounded">SETTINGS</td>
                            <td></td>
                        </tr>
                        <tbody>
                                @foreach($student as $stuinfo)
                            <tr>
                                <td>{{$stuinfo->idNo}}</td>
                                <td>{{$stuinfo->firstName }} {{$stuinfo->middleName }} {{$stuinfo->lastName }}, {{$stuinfo->suffix }}</td>
                                <td>{{$stuinfo->course }} - {{$stuinfo->year }}</td>
                                <td>{{date("F j, Y" ,strtotime($stuinfo->birthDate))}}</td>
                                <td>{{$stuinfo->gender}}</td>                             
                                <td class="px-4 py-2">
                                    <a class="mt-4 bg-pink-200 bg-teal-500 hover:bg-teal-700 text-black font-bold py-2 px-4 rounded mr-2" href= "{{route('student-show', ['stuno' => $stuinfo->sno]) }}">{{ __('View') }}</a>
                                </td>
                                <td class="px-4 py-2">
                                    <a class="mt-4 bg-blue-200 bg-violet-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2"href= "{{route('student-edit', ['stuno' => $stuinfo->sno]) }}">{{ __('Edit') }}</a>
                                </td>
                                <td class="px-4 py-2">
                                    <form method="POST" action = "{{ route('student-delete', ['stuno' => $stuinfo->sno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">@csrf
                                        @method('delete')
                                        <button class="bg-red-200 hover:bg-red-300 text-black font-bold py-2 px-4 rounded mr-2" type="submit" >{{ __('Delete') }}</button>
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
