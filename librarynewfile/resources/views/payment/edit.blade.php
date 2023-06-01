<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Information') }}
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
                    @foreach($payment as $p)
                    <form method = "POST" action="{{ route('payment-update',['pno' => $p->paymentno]) }}">
                        @csrf
                        @method('patch')
                    
                       <div class="flex-items-center" style="text-align:center"><label for="Payment">Payment</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xpayment" value="{{$p->payment}}"/>
                    </div>
</div>
             <div class="flex-items-center" style="text-align:center"><label for="Payment Method"></label>
                    <div>
                    <select class="text-black font-bold" style="text-align:center" name="xpaymentmethod" style="text-align:center">
                        <option class="text-black font-bold" style="text-align:center" value="GCash">Gcash</option>
                        <option class="text-black font-bold" style="text-align:center" value="Direct Payment">Direct Payment</option>
</select>
                    </div>
</div>
                   <div class="flex-items-center" style="text-align:center"><label for="Reasons">Reasons</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xreasons" value="{{$p->reasons}}"/>
                    </div>
</div>
                  <div class="flex-items-center" style="text-align:center"><label for="Remarks">Remarks</label>
                    <div>
                    <input class="text-black font-bold" style="text-align:center" type="text"  name="xremarks" value="{{$p->remarks}}"/>
                    </div>
        </div>  <div class="flex-items-center" style="text-align:center">
        <button type ="submit" class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" > Submit Info </button>
        </div>
             
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>