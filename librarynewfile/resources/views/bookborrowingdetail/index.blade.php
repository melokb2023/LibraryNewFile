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
                    
                <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-bookborrowingdetail')}}">Add Book Borrowing</a>
                    <h6>List of Books</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Student No.</th>
                        <th>Book Number</th>
                        <th>Book Description</th>
                        <th>Book Code</th>
</tr>
                    <tbody>
                        @foreach($bookborrowingdetail as $bookborrowing)
                       <tr>
                        <td>{{$bookborrowing->sno}}</td>
                        <td>{{$bookborrowing->bookno }}</td>
                        <td>{{$bookborrowing->bookdescription }}</td>
                        <td>{{$bookborrowing->bookcode }}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('bookborrowingdetail-show', ['bbno' => $bookborrowing->bbno]) }}" >View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('bookborrowingdetail-edit', ['bbno' => $bookborrowing->bbno]) }}" >Edit</a>
                            <form method="POST" action = "{{ route('bookborrowingdetail-delete', ['bbno' => $bookborrowing->bbno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
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
