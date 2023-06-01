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
             <h6 class="text-lg font-bold flex-items-center" style="text-align:center">Errors Encountered</h6><br /><br />
                    @if($errors)
                       <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @foreach($netzone as $nz)
                    <form method="POST" action="{{ route('netzone-update',['n' => $nz->nno]) }}">
                        @csrf
                        @method('patch')
                        <div class="flex-items-center font-bold" style="text-align:center">
                            <label  class="font-bold" for="Purpose">PURPOSE</label>
                            <div class="mt-1">
                                <input class="text-black font-bold" style="text-align:center" type="text"  name="xpurpose" value="{{$nz->purpose}}"/>
                            </div>
                        </div>
                        <div class="flex-items-center font-bold" style="text-align:center">
                            <label class="font-bold" for="Midterm">MIDTERM</label>
                            <div class="mt-1">
                                <input class="text-black font-bold" style="text-align:center" type="text"  name="xsittingnumber" value="{{$nz->sittingnumber}}"/>
                            </div>
                        </div>
                        <div class="flex-items-center" style="text-align:center">
                            <button type ="submit" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded"> Submit Info </button>
                        </div>                      
                    </form>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>