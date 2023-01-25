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

        .document-type-info-container {
            outline: 1px solid blue;
        }

        .document-type {
            display: inline-block;
            width: 30%;
            min-width: 30%;
            max-width: 30%;
            text-align: start;
        }

        .document-between {
            display: inline-block;
            width: 30%;
            min-width: 30%;
            max-width: 30%;
        }

        .document-info {
            display: inline-block;
            width: 30%;
            min-width: 30%;
            max-width: 30%;
            text-align: end;
            
        }
        
        .from-to-container {
            padding: 10px;
            outline: 1px solid green;
            height: 30%;
        }

        .from-to-container:after {
            content: '';
            display: inline-block;
            width: 0px;
            height: 100%;
            vertical-align: middle;
        }

        .from {
            outline: 1px solid red;
            width: 30%;
            min-width: 30%;
            max-width: 30%;
            height: 80%;
            
            display: inline-block;
            vertical-align: middle;
            
        }

        .between {
            outline: 1px solid red;
            width: 38%;
            min-width: 38%;
            max-width: 38%;
            height: 80%;
            
            display: inline-block;
            vertical-align: middle;
            

        }

        .to {
            outline: 1px solid red;
            width: 30%;
            min-width: 30%;
            max-width: 30%;
            height: 80%;
            
            display: inline-block;
            vertical-align: middle;
            

        }

        .break-word {
            word-wrap: break-word;
        }

    </style>
</head>
<body>

    <div class="document-type-info-container">
        <div class="document-type">
            <p>{{$document_type}}</p>
            <p> </p>
        </div>
        <div class="document-between">

        </div>
        <div class="document-info">
            <p>{{$document_no}}</p>
            <p>{{$document_date}}</p> 
        </div>
    </div>
    
    <div style="clear:both;"></div>

    <div class="from-to-container">
        <div class="from">
            <h3 style="text-align: center;" >from</h3>
            <p style="" class="break-word">name: <span>{{$from_name}}</span></p>
            <p style="" class="break-word">address: <span>{{$from_address}}</span></p>
            <p style="" class="break-word">fiscal code: <span>{{$from_fiscal_code}}</span></p>
        </div>
        <div class="between">

        </div>
        <div class="to">
            <h3 style="text-align: center;">to</h3>
            <p style="" class="break-word">name: <span>{{$to_name}}</span></p>
            <p style="" class="break-word">address: <span>{{$to_address}}</span></p>
            <p style="" class="break-word">fiscal code: <span>{{$to_fiscal_code}}</span></p>
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