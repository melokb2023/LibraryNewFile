<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Information') }}
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
                    @foreach($payment as $p)
                    <form method = "POST" action="{{ route('payment-update',['pno' => $p->paymentno]) }}">
                        @csrf
                        @method('patch')
                    
                       <div class="flex-items-center" style="text-align:center"><label for="Payment">Payment</label>
                    <div>
                    <input type="text"  name="xpayment" value="{{$p->payment}}"/>
                    </div>
</div>
             <div class="flex-items-center" style="text-align:center"><label for="Payment Method"></label>
                    <div>
                    <select name="xpaymentmethod" style="text-align:center">
                        <option value="GCash">Gcash</option>
                        <option value="Direct Payment">Direct Payment</option>
</select>
                    </div>
</div>
                   <div class="flex-items-center" style="text-align:center"><label for="Reasons">Reasons</label>
                    <div>
                    <input type="text"  name="xreasons" value="{{$p->reasons}}"/>
                    </div>
</div>
                  <div class="flex-items-center" style="text-align:center"><label for="Remarks">Remarks</label>
                    <div>
                    <input type="text"  name="xremarks" value="{{$p->remarks}}"/>
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