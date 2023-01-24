<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>invoice</title>

    <style>

        * {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            height: 30px;
            text-align: center;
            padding: 12px;
            font-size: 14px;
            font-weight: bold;
            
        }

        td {
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
            font-size: 14px;
        }

        th, td {
            
        }

        table, th, td {
            border: 1px solid;
        }
        .document-type {
            display: block;
            float: left;
            margin-top: 0px;
        }
        .document-info {
            display: block;
            float: right;
        }
        
        .from {
            display: inline-block;
        }

        .to {
            margin-block-end: 300px 
            display: inline-block;
            float: right; 
        }

    </style>
</head>
<body>
    <div class="document-type">
        <h1>{{$document_type}}</h1>
    </div>
    <div class="document-info">
        <h3>{{$document_no}}</h3>
        <h3>{{$document_date}}</h3> 
    </div>
    
    <div style="clear:both;"></div>

    <div class="">
        <div class="from">
            <h3 style="text-align: center;" >from</h3>
            <p style="max-width: 150px; word-wrap: break-word;">name: <span>{{$from_name}}</span></p>
            <p style="max-width: 150px; word-wrap: break-word;">address: <span>{{$from_address}}</span></p>
            <p style="max-width: 150px; word-wrap: break-word;">fiscal code: <span>{{$from_fiscal_code}}</span></p>
        </div>
    
        <div class="to">
            <h3 style="text-align: center;">to</h3>
            <p style="max-width: 150px; word-wrap: break-word;">name: <span>{{$to_name}}</span></p>
            <p style="max-width: 150px; word-wrap: break-word;">address: <span>{{$to_address}}</span></p>
            <p style="max-width: 150px; word-wrap: break-word;">fiscal code: <span>{{$to_fiscal_code}}</span></p>
        </div>
    </div>
    

    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="2">item name</th>
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
                    <td colspan="2">{{$item['item_name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['item_vat_percent']}} %</td>
                    <td>{{$item['price_ev']}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['amount']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>