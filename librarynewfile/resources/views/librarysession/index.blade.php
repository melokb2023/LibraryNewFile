<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Library Session Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-librarysession')}}">Add Student Infromation</a>
                    <h6>List of Netzone Sessions</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Student No.</th>
                        <th>Student Purpose</th>
                        <th>Student Session</th>
</tr>
                    <tbody>
                        @foreach($librarysession as $session)
                       <tr>
                        <td>{{$session->sno}}</td>
                        <td>{{$session->studentpurpose }}</td>
                        <td>{{$session->studentsession }}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('librarysession-show', ['sessionno' => $session->librarysessionno]) }}" >View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('librarysession-edit', ['sessionno' => $session->librarysessionno]) }}" >Edit</a>
                            <form method="POST" action = "{{ route('librarysession-delete', ['sessionno' => $session->librarysessionno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
                           @csrf
                           @method('delete')
                           <button class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" type="submit" >Delete</a>
                        </form>
                        <td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
