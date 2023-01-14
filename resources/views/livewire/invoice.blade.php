<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Designation
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    VAT
                </th>
                <th scope="col" class="px-6 py-3">
                    All Tax Included Price
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
                    <th class="px-6 py-4">
                        {{$item['id']}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item['name']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['price']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['vat']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['ati_price']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['quantity']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['amount']}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>