<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{getImageUrl(setting('logo'))}}" />
    <title>{{setting('app_name')}}</title>
    <meta name="description" content="">
    <meta name="robots" content="all,follow">
    <style>
        #invoice{
    padding: 30px;
}

.invoice {
    max-width:600px;
    background-color: #FFF;
    min-height: 680px;
    margin-left: auto;
    margin-right: auto;
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #e5511e;
    font-size: 16px;
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #e5511e
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #e5511e;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}
.g
{
    color:white;
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
@media print {
            * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }
            @page { margin: 0; } body { margin: 0.5cm; margin-bottom:1.6cm; } 
        }
    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
    <a  href="{{ url()->previous() }}" class="btn btn-info">
    <i class="fa fa-arrow-circle-o-left"></i>
    <span>{{__('Back')}}</span>
    </a>            
    <button class="btn btn-info"  onclick="auto_print()">{{__('Print')}}</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="{{getImageUrl(setting('logo'))}}" width="120px" height="100px" style="margin:10px 0">
                        </a>
                    </div>
                    <div class="col company-details">
                        <h3 class="name">
                            Rentacs Tours
                        </h3>
                        <div>13, Rue El Kassar, 1er Etage Maarif </div>
                        <div>20100 Casablanca, Maroc</div>
                        <div>{{__('Phone Number')}}: {{setting('home_phone')}}</div>
                        <div>{{__('Email')}}: {{setting('home_email')}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">    
                        <h4 class="to"> {{$customers->name}}</h4>
                        <div class="address">{{$customers->company_name}}</div>
                        <div class="address"> {{$customers->address}}</div>
                        <div class="address"> {{$customers->city}}, {{$customers->postal_code}}</div>
                        <div class="email">{{__('Phone Number')}}: {{$customers->phone_number}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">{{__('reference')}} : {{$sales->reference_no}}</h1>
                        <div class="date">Date d’émission: {{$sales->created_at->toDateString()}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Destination</th>
                            <th class="text-right">{{__('Price')}}</th>
                            <th class="text-right">Qté.</th>
                            <th class="text-right">{{__('Tax')}}</th>
                            <th class="text-right">Total HT</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total_product_tax = 0; $i=1;?>
                    @foreach($saledetails as $saledetail)
                        <tr>
                            <td class="no">0{{$i++}}</td>
                            <td class="text-left">
                            <h3>
                            {{$saledetail->name}}
                                </h3>
                            </td>
                            <td class="total">{{number_format((float) ($saledetail->total / $saledetail->qty), 2, '.', '')}}</td>
                            <td class="total">{{$saledetail->qty}}</td>
                            <td class="total">{{$sales->tax}}%</td>
                            <td class="total">{{number_format((float)$saledetail->total, 2, '.', '')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">Total HT :</td>
                            <td>{{number_format((float)$saledetail->total, 2, '.', '')}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">TVA</td>
                            <td>{{number_format((float)$sales->total_tax, 2, '.', '')}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">TOTAL TTC</td>
                            <td>{{number_format((float)$sales->grand_total, 2, '.', '')}}</td>
                        </tr>
                    </tfoot>
                </table>

            </main>
            <footer style='width:600px; text-align:left; border-left:tomato 2px solid; padding:10px;'>
                                 <p><font color="#E5511E;">RENTACS TOURS </font> - <b>Capital: </b> 300.000DH</p>
                                 <p> <b>Adresse:</b> 13, Rue El Kassar, 1er Etage Maarif 20100 Casablanca, Maroc </p>   
                                <p><b>Code Postal: </b>  20100 - <b>Tél:</b> +212 522 252 386 - <b>Email:</b> info@rentacstours.com</p>
                                 <p><i class="la la-map-marker la-24" ></i> <b>RC: </b> 382573 <b>CNSS:</b> 4284098 <b>Patente:</b> 35781728 <b>IF:</b> 15220706 <b>ICE:</b> 001565693000053 </p>
                                <p><i class="la la-envelope la-24" style="color: black;"></i> Attijariwafabank Agence centre d'affaire YACOUP EL MANSOUR</a> </p>
                                <p><i class="la la-phone la-24" ></i>  <b>Code IBAN:</b> 007 780 000 339 400 000 25 46 93 - <b>Code SWIFT:</b> BCMAMAMC </a></p>
            </footer>
        </div>
    </div>
<script type="text/javascript">
    function auto_print() {     
        window.print()
    }
    setTimeout(auto_print, 1000);

</script>
</body>
</html>