<div>
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
                    <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="item-vat-percent">
                        VAT %
                    </label>
                    <input value="{{$item_vat_percent}}" wire:keyup="updatePriceAndAmount" wire:model="item_vat_percent" id="item-vat-percent" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    @error('item_vat_percent') <span class="error text-red-500 text-base font-bold">{{$message}}</span> @enderror
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
</div>
