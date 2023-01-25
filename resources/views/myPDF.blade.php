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

        .document-type {
            color: gray;
            font-size: 48px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            border: 1px solid;
        }

        .invoice-tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .invoice-th {
            height: 30px;
            text-align: center;
            padding: 12px;
            font-size: 14px;
            font-weight: bold;
            border: 1px solid;
            
        }

        td {
            text-align: start;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
            font-size: 14px;
        }

        .total-td-2 {
            text-align: right;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
            font-size: 14px;
        }

        .total-td-1 {
            text-align: right;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
            font-size: 14px;
            font-weight: bold;
        }

        .invoice-td {
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
            font-size: 14px;
            border: 1px solid;
        }

        .break-word {
            word-wrap: break-word;
        }

    </style>
</head>
<body>

    <div>
        <table>
            <thead></thead>
            <tbody>
                <tr>
                    <td class="document-type">{{$document_type}}</td>
                    <td style="text-align: right;">{{$document_no}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right;">{{$document_date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div style="height: 20px">

    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="3">FROM</th>
                    <th colspan="3">TO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>name:</td>
                    <td colspan="2">{{$from_name}}</td>
                    <td>name:</td>
                    <td colspan="2">{{$to_name}}</td>
                </tr>
                <tr>
                    <td>address:</td>
                    <td colspan="2">{{$from_address}}</td>
                    <td>address:</td>
                    <td colspan="2">{{$to_address}}</td>
                </tr>
                <tr>
                    <td>fiscal code:</td>
                    <td colspan="2">{{$from_fiscal_code}}</td>
                    <td>fiscal code:</td>
                    <td colspan="2">{{$to_fiscal_code}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="height: 20px">

    </div>

    <div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th class="invoice-th" colspan="4">item name</th>
                    <th class="invoice-th" colspan="2">price</th>
                    <th class="invoice-th">vat</th>
                    <th class="invoice-th" colspan="2">price exc vat</th>
                    <th class="invoice-th">quantity</th>
                    <th class="invoice-th" colspan="2">amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="invoice-tr">
                    <td class="invoice-td" colspan="4">{{$item['item_name']}}</td>
                    <td class="invoice-td" colspan="2">{{$item['price']}}</td>
                    <td class="invoice-td">{{$item['item_vat_percent']}} %</td>
                    <td class="invoice-td" colspan="2">{{$item['price_ev']}}</td>
                    <td class="invoice-td">{{$item['quantity']}}</td>
                    <td class="invoice-td" colspan="2">{{$item['amount']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div style="height: 20px">

    </div>

    <div>
        <table>
            <tbody>
                <tr>
                    <td colspan="2"></td>
                    <td class="total-td-1">SUBTOTAL:</td>
                    <td class="total-td-2">2352.941</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td class="total-td-1">VAT:</td>
                    <td class="total-td-2">447.059</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td class="total-td-1">REVENUE STAMP:</td>
                    <td class="total-td-2">1.000</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td class="total-td-1">TOTAL:</td>
                    <td class="total-td-2">2801.000</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>