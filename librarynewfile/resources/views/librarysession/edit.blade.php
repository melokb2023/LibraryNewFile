<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Library SessionInformation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-red-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($librarysession as $session)
                    <form method = "POST" action="{{ route('librarysession-update',['sessionno' => $session->librarysessionno]) }}">
                        @csrf
                        @method('patch')
                    
                       <div class="flex-items-center" style="text-align:center"><label for="Student Purpose">Purpose</label>
                    <div>
                    <input type="text"  name="xstudentpurpose" value="{{$session->studentpurpose}}"/>
                    </div>
</div>
                       <div class="flex-items-center" style="text-align:center"><label for="Student Session">Midterm</label>
                    <div>
                    <input type="text"  name="xstudentsession" value="{{$session->studentsession}}"/>
                    </div>
</div>
                    
             <button type ="submit" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>