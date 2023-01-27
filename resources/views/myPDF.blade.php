<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>invoice</title>

    <style>

        * {
            font-family: sans-serif;
            font-size: 12px;
        }

        .document-type {
            color: gray;
            font-size: 26px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .invoice-table {
            border: 1px solid;
        }

        .invoice-tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            height: 30px;
            text-align: center;
            padding: 12px;
            font-weight: bold;
        }

        .invoice-th {
        
            border: 1px solid;
            
        }

        td {
            text-align: left;
            vertical-align: middle;
            word-wrap: break-word;
            padding: 12px;
        }

        .total-td-2 {
            padding: 8px;
            text-align: right;
        }

        .total-td-1 {
            padding: 8px;
            text-align: right;
            font-weight: bold;
        }

        .invoice-td {
            text-align: center;
            border: 1px solid;
        }

        .break-word {
            word-wrap: break-word;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
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
                    <td style="text-align: right; font-size: 14px">{{$document_no}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right; font-size: 14px">{{$document_date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div style="height: 10px"></div>

    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="12">FROM</th>
                    <th colspan="12">TO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" style="font-weight: bold; font-size: 14px;">name:</td>
                    <td colspan="8">{{$from_name}}</td>
                    <td colspan="4" style="font-weight: bold;font-size: 14px;">name:</td>
                    <td colspan="8">{{$to_name}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-weight: bold;font-size: 14px;">address:</td>
                    <td colspan="8">{{$from_address}}</td>
                    <td colspan="4" style="font-weight: bold;font-size: 14px;">address:</td>
                    <td colspan="8">{{$to_address}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-weight: bold;font-size: 14px;">fiscal code:</td>
                    <td colspan="8">{{$from_fiscal_code}}</td>
                    <td colspan="4" style="font-weight: bold;font-size: 14px;">fiscal code:</td>
                    <td colspan="8">{{$to_fiscal_code}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="height: 40px">

    </div>

    <div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th class="invoice-th">id</th>
                    <th class="invoice-th" colspan="4">item name</th>
                    <th class="invoice-th" colspan="2">price</th>
                    <th class="invoice-th">vat</th>
                    <th class="invoice-th" colspan="2">price exc vat</th>
                    <th class="invoice-th">quantity</th>
                    <th class="invoice-th" colspan="2">amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $key => $item)
                <tr class="invoice-tr">
                    <td class="invoice-td">{{$key}}</td>
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
    
    <div style="height: 10px"></div>

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
                    <td class="total-td-2">{{$total_vat}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td class="total-td-1">REVENUE STAMP:</td>
                    <td class="total-td-2">{{$revenue_stamp}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="font-size: 14px" class="total-td-1">TOTAL:</td>
                    <td style="font-weight: bold; font-size: 14px" class="total-td-2">{{$total}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <p>Made with: <a>www.fakter.tn</a></p>
    </footer>
</body>
</html>