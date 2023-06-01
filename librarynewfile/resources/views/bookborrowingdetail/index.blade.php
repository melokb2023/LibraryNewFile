<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Borrowing Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center">
                        <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-bookborrowingdetail')}}">Add Book Borrowing</a>
                    </div>
                    <br><br>
                    <div class="flex justify-center">
                        <h1>LIST OF BOOKS</h1>
                    </div>
                    <br><br>
                    <table class="border-separate border-spacing-5">
                        <tr>
                            <th class="border border-gray-500 bg-blue-200 text-black font-bold py-2 px-4 rounded">Student No.</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Book Number</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Book Description</th>
                            <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Book Code</th>
                            <td></td>
                            <td class="bg-red-200 text-black font-bold py-2 px-4 rounded">SETTINGS</td>
                            <td></td>
                        </tr>
                        <tbody>
                            @foreach($bookborrowingdetail as $bookborrowing)
                            <tr>
                                <td>{{$bookborrowing->sno}}</td>
                                <td>{{$bookborrowing->bookno }}</td>
                                <td>{{$bookborrowing->bookdescription }}</td>
                                <td>{{$bookborrowing->bookcode }}</td>                     
                                <td class="px-4 py-2">
                                    <a class="mt-4 bg-pink-200 bg-teal-500 hover:bg-teal-700 text-black font-bold py-2 px-4 rounded mr-2" href= "{{route('bookborrowingdetail-show', ['bbno' => $bookborrowing->bbno]) }}">{{ __('View') }}</a>
                                </td>
                                <td class="px-4 py-2">
                                    <a class="mt-4 bg-blue-200 bg-violet-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2" href= "{{route('bookborrowingdetail-edit', ['bbno' => $bookborrowing->bbno]) }}">{{ __('Edit') }}</a>
                                </td>
                                <td class="px-4 py-2">
                                    <form method="POST" action = "{{ route('bookborrowingdetail-delete', ['bbno' => $bookborrowing->bbno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">@csrf
                                        @csrf    
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
