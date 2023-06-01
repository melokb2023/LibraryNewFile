<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('NetZone Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6 style="text-align:center">Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form method = "POST" action="{{ route('netzone-store') }}">
                        @csrf
                      <div class="flex-items-center" style="text-align:center"><label for="Student Number">Student Number</label>
                     <div>  
                       <select class="text-black font-bold" style="text-align:center" name="xsno">
                            @foreach($student as $stuinfo)
                            <option value="{{$stuinfo->sno }}"> {{$stuinfo->idNo}} - {{$stuinfo->lastName}}, {{$stuinfo->firstName}} {{$stuinfo->middleName}} {{$stuinfo->suffix}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
                       <div class="flex-items-center" style="text-align:center"><label for="Purpose">Purpose</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xpurpose" value="{{old('xpurpose')}}"/>
                    </div>
</div>
                    <div class="flex-items-center" style="text-align:center"><label for="Sitting Number">Sitting Number</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xsittingnumber" value="{{old('xsittingnumber')}}"/>
                    </div>
</div>
           
             <button type ="submit" style="text-align:center" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded"> Submit Info </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>