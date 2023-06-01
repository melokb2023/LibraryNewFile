<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Borrowing Detail Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($bookborrowingdetail as $bookborrowing)
                    <form method = "POST" action="{{ route('bookborrowingdetail-update',['bbno' => $bookborrowing->bbno]) }}">
                        @csrf
                        @method('patch')
                    
                       <div class="flex-items-center" style="text-align:center"><label for="Book Number">Book Number</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xbookno" value="{{$bookborrowing->bookno}}"/>
                    </div>
</div>
<div class="flex-items-center" style="text-align:center"><label for="Book Description"></label>
                    <div>
                    <select class="text-black font-bold" style="text-align:center" name="xbookdescription" style="text-align:center">
                        <option value="Java Basics">Java Basics</option>
                        <option value="Video Gaming Details">Video Gaming Details</option>
                        <option value="Jose Rizal El Filibusterismo">Jose Rizal El Filibusterismo</option>
                        <option value="List of Crimes">List Of Crimes</option>
                        <option value="History of PHP">History of PHP</option>
                        <option value="Business">Business</option>
</select> 
                    </div>
</div>
                   <div class="flex-items-center" style="text-align:center"><label for="Book Code">Book Code</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xbookcode" value="{{$bookborrowing->bookcode}}"/>
                    </div>
</div>
<div class="flex-items-center" style="text-align:center">
             <button type ="submit" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded "> Submit Info </button>
             </div>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>