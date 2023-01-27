<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="flex flex-col px-2">
            <div class="flex">
                <div class="basis-1/3">
                    <label for="type" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Type</label>
                </div>
                <div class="basis-2/3">
                    <select wire:model="document_type" class="form-select block w-full py-3 px-4 text-gray-700 bg-white border border-gray-400 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-2">
                        <option value="invoice">Invoice</option>
                        <option value="credit_note">Credit Note</option>
                        <option value="quote">Quote</option>
                        <option value="purchase_order">Purchase Order</option>
                        <option value="receipt">Receipt</option>    
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-col px-2">
            <div class="flex">
                <div class="basis-1/3">
                    <label for="document-no" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">No</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$document_no}}" wire:model="document_no" type="text" id="document-no" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-2" placeholder="123456">
                    @error('document_no') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="document-date" class="block uppercase tracking-wide text-gray-700 text-base font-bold mx-4">Date</label>
                </div>
                <div class="basis-2/3">
                    <input wire:model="document_date" type="date" id="document-date" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" placeholder="01/02/1234">
                </div>
            </div>
        </div>
        
        <div class="md:col-span-2">
            <hr class="h-px my-1 mx-10 md:mx-64 bg-gray-300 border-0">
        </div>

        <div class="flex flex-col px-2">
            <div class="flex justify-center">
                <p class="text-xl font-bold block uppercase tracking-wide text-gray-900 mb-4">bill from</p>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Name</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$from_name}}" wire:model="from_name" type="text" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="John Doe">
                    @error('from_name') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Address</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$from_address}}" wire:model="from_address" type="text" id="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="California Street 1234">
                    @error('from_address') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="fiscal-code" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Fiscal Code</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$from_fiscal_code}}" wire:model="from_fiscal_code" type="text" id="fiscal-code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="abcde12345">
                    @error('from_fiscal_code') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="flex flex-col p-2">
            <div class="flex justify-center">
                <p class="text-xl font-bold block uppercase tracking-wide text-gray-900 mb-4">bill to</p>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Name</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$to_name}}" wire:model="to_name" type="text" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="John Doe">
                    @error('to_name') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Address</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$to_address}}" wire:model="to_address" type="text" id="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="California Street 1234">
                    @error('to_address') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="fiscal-code" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Fiscal Code</label>
                </div>
                <div class="basis-2/3">
                    <input value="{{$to_fiscal_code}}" wire:model="to_fiscal_code" type="text" id="fiscal-code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="abcde12345">
                    @error('to_fiscal_code') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    <hr class="h-px my-1 mx-10 md:mx-64 bg-gray-300 border-0">
    
    {{-- ItemInput starts here --}}

    <div class="mb-4">
        <livewire:item-input />
    </div>
    
    {{-- ItemInput ends here --}}
    
    <hr class="h-px my-1 mx-10 md:mx-64 bg-gray-300 border-0">

    {{-- the items table and its responsive version --}}
    <div class="mt-4">    
        <div class="relative overflow-x-auto shadow-md rounded-lg hidden lg:block">
            <table class="table-fixed w-full border-separate border-black text-base text-center text-black">
                <thead class="text-sm text-gray-700 uppercase bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-3">
                            
                        </th>
                        <th scope="col" class="py-3">
                            Id
                        </th>
                        <th colspan="4" scope="col" class="py-3">
                            Item Name
                        </th>
                        <th colspan="2" scope="col" class="py-3">
                            Price
                        </th>
                        <th scope="col" class="py-3">
                            VAT
                        </th>
                        <th colspan="2" scope="col" class="py-3">
                            Price excluding VAT
                        </th>
                        <th scope="col" class="py-3">
                            Quantity
                        </th>
                        <th colspan="2" scope="col" class="py-3">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($items as $key => $item)
                        <tr class="bg-white border-b dark:bg-gray-900">
                            <td class="break-all py-4">
                                <button wire:click="deleteItem({{$item['num']}})" class="text-red-600 font-bold text-center">x</button>
                            </td>
                            <td class="break-all py-4">
                                {{$key}}
                            </td>
                            <th colspan="4" class="break-all py-4">
                                {{$item['item_name']}}
                            </th>
                            <td colspan="2" class="break-all py-4">
                                {{$item['price']}}
                            </td>
                            <td class="break-all py-4">
                                {{$item['item_vat_percent']}}%
                            </td>
                            <td colspan="2" class="break-all px-6 py-4">
                                {{$item['price_ev']}}
                            </td>
                            <td class="break-all py-4">
                                {{$item['quantity']}}
                            </td>
                            <td colspan="2" class="break-all py-4">
                                {{$item['amount']}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- show only on small screens--}}

        <div class="flex flex-col items-center mx-4 space-y-3 lg:hidden">
            @foreach($items as $item)
            <div class="block w-full p-6 bg-gray-200 border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <div class="flex justify-between">
                    <div class="basis-1/7 flex flex-col justify-center items-end">
                        <button wire:click="deleteItem({{$item['num']}})" class="text-red-600 font-bold text-center">x</button>
                    </div>
                    <div class="basis-2/7 flex flex-col justify-center items-start">
                        <p class="break-all mb-2 text-sm font-bold tracking-tight text-gray-900">{{$item['item_name']}}</p>
                        <p class="break-all font-normal text-gray-700">{{$item['price']}}</p>
                    </div>
                    <div class="basis-2/7 flex flex-col justify-center items-center">
                        <p class="mb-2 font-normal text-gray-700">{{$item['item_vat_percent']}}%</p>
                        <p class="break-all font-normal text-gray-700">{{$item['price_ev']}}</p>
                    </div>
                    <div class="basis-1/7 flex flex-col justify-center items-center">
                        <p class="break-all font-medium text-gray-700"><span class="font-normal">x </span>{{$item['quantity']}}</p>
                    </div>
                    <div class="basis-1/7 flex flex-col justify-center items-end">
                        <p class="break-all font-bold text-black">{{$item['amount']}}</p>
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        </div>
    </div>    
    {{-- --------------------------- --}}

    <div class="flex flex-wrap mx-3 my-3">
        <div class="px-3 lg:basis-1/3">
            <div class="flex justify-start">

            </div>
        </div>
        <div class="w-full px-3 lg:basis-1/3 lg:order-3">
            <div class="flex justify-center md:justify-end">
                <div class="divide-y-2 divide-black">
                    <div>

                    </div>
                    <div>
                        <div class="flex items-center my-4">
                            <div class="basis-2/3">
                                <p class="block uppercase tracking-wide text-gray-900 text-base font-bold mx-4">subtotal</p>
                            </div>
                            <div class="basis-1/3">
                                <p class="font-bold tracking-wide text-right text-xl ">{{$items_total_ev}}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center my-4">
                            <div class="basis-2/3">
                                <p class="block uppercase tracking-wide text-gray-900 text-base font-bold mx-4">vat</p>
                            </div>
                            <div class="basis-1/3">
                                <p class="font-bold tracking-wide text-right text-xl ">{{$total_vat}}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center my-4">
                            <div class="basis-2/3">
                                <p class="block uppercase tracking-wide text-gray-900 text-base font-bold mx-4">revenue stamp</p>
                            </div>
                            <div class="basis-1/3">
                                <p class="font-bold tracking-wide text-right text-xl ">{{$revenue_stamp}}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center mb-2">
                            <div class="basis-1/2">
                                <p class="font-sans text-3xl font-bold text-gray-500 ml-4">
                                    Total:&nbsp;&nbsp;  
                                </p>
                            </div>
                            <div class="basis-1/2">
                                <p class="font-sans text-3xl font-bold text-right">
                                    {{$total}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full px-3 py-3 lg:basis-1/3 lg:order-2">
            <div class="flex justify-center">
                <button wire:click="generatePDF" class="p-4 rounded-lg bg-red-500 hover:bg-red-600 font-bold text-white shadow-lg shadow-red-300 transition ease-in-out duration-200 translate-10">
                    Generate
                </button>
            </div>
        </div>
    </div>

</div>