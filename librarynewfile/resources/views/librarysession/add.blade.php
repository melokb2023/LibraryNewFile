<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Library Session Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-indigo-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                   <h6 style="text-align:center">Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form method = "POST" action="{{ route('librarysession-store') }}">
                        @csrf
                      <div class="flex-items-center" style="text-align:center"><label for="Student Number">Student Number</label>
                     <div>  
                       <select name="xsno">
                            @foreach($student as $stuinfo)
                            <option value="{{$stuinfo->sno }}"> {{$stuinfo->idNo}} - {{$stuinfo->lastName}}, {{$stuinfo->firstName}} {{$stuinfo->middleName}} {{$stuinfo->suffix}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
                       <div class="flex-items-center" style="text-align:center"><label for="Student Purpose">Student Purpose</label>
                    <div>
                    <input type="text"  name="xstudentpurpose" value="{{old('xstudentpurpose')}}"/>
                    </div>
</div>
                    <div class="flex-items-center" style="text-align:center"><label for="Student Session">Student Session</label>
                    <div>
                    <input type="text"  name="xstudentsession" value="{{old('xstudentsession')}}"/>
                    </div>
</div>
           
             <button type ="submit" style="text-align:center" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded"> Submit Info </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>