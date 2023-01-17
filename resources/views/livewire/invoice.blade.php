<div>
    <h2 class="text-4xl font-bold text-center py-8">
        Grid
    </h2>
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-red-500 text-white h-full">
            <p>
                This is my first grid item
            </p>
        </div>
        <div class="bg-blue-500 text-white h-24">
            <p>
                This is my second grid item
            </p>
        </div>
        <div class="bg-yellow-500 text-white h-24">
            <p>
                This is my third grid item
            </p>
        </div>
    </div>
    
    <form wire:submit.prevent="submit">
        <div class="flex flex-wrap mx-3 my-8">
            <div class="w-full md:w-2/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="item-name">
                        Item Name
                    </label>
                    <input wire:model="item_name" id="item-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="item name">
                    @error('item_name') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="price">
                        Price
                    </label>
                    <input value="{{$price}}" wire:keyup="$emit('priceUpdated')" wire:model="price" id="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('price') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="vat">
                        VAT %
                    </label>
                    <input value="{{$vat}}" wire:keyup="$emit('vatUpdated')" wire:model="vat" id="vat" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('vat') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="price_ev">
                        Price .exc VAT
                    </label>
                    <input value="{{$price_ev}}" wire:keyup="$emit('priceEVUpdated')" wire:model="price_ev" id="price_ev" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('price_ev') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <div class="flex flex-col items-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="quantity">
                        Quantity
                    </label>
                    <input value="{{$quantity}}" wire:keyup="$emit('quantityUpdated')" wire:model="quantity" id="quantity" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="1">
                    @error('quantity') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
            
        <div class="flex flex-row mx-3 my-0">
            <div class="basis-1/3 px-3">
                <div class="flex justify-start">

                </div>
            </div>
            <div class="basis-1/3 px-3">
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                        Add
                    </button>
                </div>
            </div>
            <div class="basis-1/3 px-3">
                <div class="flex justify-end">
                    <p class="break-all font-sans text-3xl font-bold">
                        {{$amount}}
                    </p>
                </div>
            </div>
        </div>
    </form>
    
    
    <h2 class="text-4xl font-bold text-center py-8">
        Items
    </h2>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table-fixed w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id
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
            <tbody>
                @foreach ($items as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="break-all px-6 py-4">
                            <button wire:click="deleteItem({{$item['num']}})" class="text-red-600 font-bold text-center">x</button>
                        </td>
                        <th class="break-all px-6 py-4">
                            {{$item['num']}}                            
                        </th>
                         
                        <td class="break-all px-6 py-4">
                            {{$item['item_name']}}
                        </td>
                        
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

    <div class="flex flex-row mx-3 my-3">
        <div class="basis-1/3 px-3">
            <div class="flex justify-start">

            </div>
        </div>
        <div class="basis-1/3 px-3">
            
        </div>
        <div class="basis-1/3 px-3">
            <div class="flex justify-end">
                <p class="break-all font-sans text-3xl font-bold">
                    Total = {{$total}}
                </p>
            </div>
        </div>
    </div>

</div>