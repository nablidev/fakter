<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="flex flex-col p-2">
            <div class="flex">
                <div class="basis-1/3">
                    <label for="type" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Type</label>
                </div>
                <div class="basis-2/3">
                    <select class="form-select block w-full py-3 px-4 text-gray-700 bg-white border border-gray-400 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-2">
                        <option selected value="Invoice">Invoice</option>
                        <option value="Credit Note">Credit Note</option>
                        <option value="Quote">Quote</option>
                        <option value="Purchase Order">Purchase Order</option>
                        <option value="Receipt">Receipt</option>    
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-col p-2">
            <div class="flex">
                <div class="basis-1/3">
                    <label for="invoice-no" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">No</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="invoice-no" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-2" placeholder="123456">
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="invoice-date" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Date</label>
                </div>
                <div class="basis-2/3">
                    <input type="date" id="invoice-date" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-2" placeholder="01/02/1234">
                </div>
            </div>
        </div>
        
        <div class="md:col-span-2">
            <hr class="h-px my-1 mx-10 md:mx-64 bg-gray-300 border-0 dark:bg-gray-700">
        </div>

        <div class="flex flex-col p-2">
            <div class="flex justify-center">
                <p class="text-xl font-bold block uppercase tracking-wide text-gray-900 mb-4">bill from</p>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Name</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="John Doe">
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Address</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="California Street 1234">
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="fiscal-code" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Fiscal Code</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="fiscal-code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="abcde12345">
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
                    <input type="text" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="John Doe">
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Address</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="California Street 1234">
                </div>
            </div>
            <div class="flex">
                <div class="basis-1/3">
                    <label for="fiscal-code" class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2 mx-4">Fiscal Code</label>
                </div>
                <div class="basis-2/3">
                    <input type="text" id="fiscal-code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2" placeholder="abcde12345">
                </div>
            </div>
        </div>
    </div>

    <hr class="h-px my-1 mx-10 md:mx-64 bg-gray-300 border-0 dark:bg-gray-700">
    
    <form wire:submit.prevent="submit">
        <div class="flex flex-wrap mx-3 my-8">
            <div class="w-full md:w-2/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="item-name">
                        Item Name
                    </label>
                    <input type="text" id="item-name" wire:model="item_name"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="item name">
                    @error('item_name') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="price">
                        Price
                    </label>
                    <input value="{{$price}}" wire:keyup="updatePriceEVAndAmount" wire:model="price" id="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('price') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="vat">
                        VAT %
                    </label>
                    <input value="{{$vat}}" wire:keyup="updatePriceAndAmount" wire:model="vat" id="vat" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('vat') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="price_ev">
                        Price .exc VAT
                    </label>
                    <input value="{{$price_ev}}" wire:keyup="updatePriceAndAmount" wire:model="price_ev" id="price_ev" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('price_ev') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="quantity">
                        Quantity
                    </label>
                    <input value="{{$quantity}}" wire:keyup="updateAmount" wire:model="quantity" id="quantity" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="1">
                    @error('quantity') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
            
        <div class="flex flex-wrap mx-3 my-0">
            <div class="md:basis-1/3 px-3">
                <div class="flex justify-start">

                </div>
            </div>
            <div class="w-full px-3 md:basis-1/3 md:order-3">
                <div class="flex justify-center md:justify-end">
                    <p class="break-all font-sans text-3xl font-bold">
                        {{$amount}}
                    </p>
                </div>
            </div>
            <div class="w-full px-3 py-3 md:basis-1/3 md:order-2 md:py-0">
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </form>
    
    
    <hr class="h-px my-4 mx-10 md:mx-64 bg-gray-300 border-0 dark:bg-gray-700">

    
    <div class="relative overflow-x-auto shadow-md rounded-lg hidden lg:block">
        <table class="table-fixed w-full border-separate border-black text-base text-center text-black dark:text-gray-400">
            <thead class="text-lg text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Item Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        VAT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price excluding VAT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($items as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="break-all px-6 py-4">
                            <button wire:click="deleteItem({{$item['num']}})" class="text-red-600 font-bold text-center">x</button>
                        </td>

                        <th class="break-all px-6 py-4">
                            {{$item['item_name']}}
                        </th>
                        
                        <td class="break-all px-6 py-4">
                            {{$item['price']}}
                        </td>
                        <td class="break-all px-6 py-4">
                            {{$item['vat']}}%
                        </td>
                        <td class="break-all px-6 py-4">
                            {{$item['price_ev']}}
                        </td>
                        <td class="breal-all px-6 py-4">
                            {{$item['quantity']}}
                        </td>
                        <td class="break-all px-6 py-4">
                            {{$item['amount']}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- show only on small screens--}}

    <div class="flex flex-col items-center mx-4 space-y-3 md:hidden">
        @foreach($items as $item)
        <div class="block w-full p-6 bg-gray-200 border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <div class="flex justify-between">
                <div class="basis-2/6 flex flex-col justify-center items-start">
                    <p class="break-all mb-2 text-sm font-bold tracking-tight text-gray-900">{{$item['item_name']}}</p>
                    <p class="break-all font-normal text-gray-700">{{$item['price']}}</p>
                </div>
                <div class="basis-2/6 flex flex-col justify-center items-center">
                    <p class="mb-2 font-normal text-gray-700">{{$item['vat']}}%</p>
                    <p class="break-all font-normal text-gray-700">{{$item['price_ev']}}</p>
                </div>
                <div class="basis-1/6 flex flex-col justify-center items-center">
                    <p class="break-all font-medium text-gray-700"><span class="font-normal">x </span>{{$item['quantity']}}</p>
                </div>
                <div class="basis-1/6 flex flex-col justify-center items-end">
                    <p class="break-all font-bold text-black">{{$item['amount']}}</p>
                </div>
            </div>
            
        </div>
        @endforeach
    </div>

    {{-- --------------------------- --}}

    <div class="flex flex-wrap mx-3 my-3">
        <div class="px-3 md:basis-1/3">
            <div class="flex justify-start">

            </div>
        </div>
        <div class="w-full px-3 md:basis-1/3 md:order-3">
            <div class="flex justify-center md:justify-end">
                <div class="divide-y-2 divide-black">
                    <div>
                        <div class="flex items-center">
                            <div class="basis-1/2">
                                <label for="revenue-stamp" class="block uppercase tracking-wide text-gray-900 text-lg font-bold mb-2 mx-4">revenue stamp</label>
                            </div>
                            <div class="basis-1/2">
                                <input value="{{$revenue_stamp}}" wire:keyup="updateTotal" wire:model="revenue_stamp" type="text" id="revenue-stamp" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-2" placeholder="1.000">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <div class="basis-1/2">
                                <label for="discount" class="block uppercase tracking-wide text-gray-900 text-lg font-bold mb-2 mx-4">discount</label>
                            </div>
                            <div class="basis-1/2">
                                <input value="{{$discount}}" wire:keyup="updateTotal" wire:model="discount" type="text" id="discount" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-2" placeholder="0.000">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <div class="basis-1/2">
                                <label for="shipping" class="block uppercase tracking-wide text-gray-900 text-lg font-bold mb-2 mx-4">shipping</label>
                            </div>
                            <div class="basis-1/2">
                                <input value="{{$shipping}}" wire:keyup="updateTotal" wire:model="shipping" type="text" id="shipping" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-2" placeholder="0.000">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center mb-2">
                            <div class="basis-1/2">
                                <p class="font-sans text-3xl font-bold mx-4">
                                    Total =
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
        <div class="w-full px-3 py-3 md:basis-1/3 md:order-2">
            <div class="flex justify-center">
                <button wire:click="generatePDF" class="p-4 rounded-lg bg-red-500 hover:bg-red-600 font-bold text-white shadow-lg shadow-red-300 transition ease-in-out duration-200 translate-10">
                    Generate
                </button>
            </div>
        </div>
    </div>

</div>