<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>invoice</title>

    <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            th {
                height: 30px;
                text-align: center;
            }

            td {
                text-align: center;
                vertical-align: middle;
            }

            th, td {
                padding: 15px;
            }

			table, th, td {
                border: 1px solid;
            }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>item name</th>
                <th>price</th>
                <th>vat</th>
                <th>price exc vat</th>
                <th>quantity</th>
                <th>amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item['item_name']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['item_vat_percent']}} %</td>
                <td>{{$item['price_ev']}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$item['amount']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>