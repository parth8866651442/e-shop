<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-85{
        width:85%;   
    }
    .w-50{
        width:50%;   
    }
    .w-33{
        width:33.33%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }

    table .center .item-desc-1 {
        text-align: left;
    }

    table .center .item-desc-1 span {
        display: block;
    }

    table .center .item-desc-1 small {
        display: block;
    }

    table .center .item-desc-1 small {
        font-size: 13px;
        color: #535353;
    }

    table .center .item-desc-1 span {
        font-size: 14px;
        font-weight: 600;
        color: #535353;
    }
    .box-text p{
        line-height:10px;
    }
    .box-text p.text-over{
        line-height:20px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <!-- <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#{{$orders->invoice_number}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$orders->order_number}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{$orders->created_at->format('d-m-Y')}}</span></p> -->
    </div>
    <div class="w-50 float-left logo mt-10">
        <span></span>     
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-33">Order Info</th>
            <th class="w-33">Bill To</th>
            <th class="w-33">Ship To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p><strong>Order ID:</strong> {{$orders->order_number}}</p>
                    <p><strong>Order Date:</strong> {{$orders->created_at->format('d-m-Y')}}</p>
                    <p><strong>Invoice Date:</strong> {{date('d-m-Y')}}</p>
                    <p class="text-over"><strong>Original Invoice Number::</strong> {{$orders->invoice_number}}</p>
                    @if(isset($orders->cancel_date))
                        <p><strong>Cancel Date:</strong> {{date('d-m-Y h:i A', strtotime($orders->cancel_date))}}</p>
                    @endif
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{ucfirst($orders->userInfo->name)}}</p>
                    <p class="text-over">{!! $orders->shippingAddress->addressLine1 .', '. $orders->shippingAddress->addressLine2 .', '. $orders->shippingAddress->city .', '. $orders->shippingAddress->getIDByStateDetail->name .' - <b>'. $orders->shippingAddress->pincode .'</b>' !!}</p>
                    <p><strong>Phone: </strong> {{$orders->shippingAddress->phone}}</p>
                    <p><strong>Email:</strong> {{$orders->shippingAddress->email}}</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{ucfirst($orders->userInfo->name)}}</p>
                    <p class="text-over">{!! $orders->shippingAddress->addressLine1 .', '. $orders->shippingAddress->addressLine2 .', '. $orders->shippingAddress->city .', '. $orders->shippingAddress->getIDByStateDetail->name .' - <b>'. $orders->shippingAddress->pincode .'</b>' !!}</p>
                    <p><strong>Phone: </strong> {{$orders->shippingAddress->phone}}</p>
                    <p><strong>Email:</strong> {{$orders->shippingAddress->email}}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-85">Item Item</th>
            <th class="w-15">Price <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></th>
            <th class="w-15">Quantity</th>
            <th class="w-15">Totals <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></th>
        </tr>
        @php $price = 0; $quantity = 0; $totle = 0; @endphp
        @foreach($orders->orderItems as $item)
        <tr class="center" align="center">
            <td>
                <div class="item-desc-1">
                    <span>{{$item->product->title}}</span>
                    <small>{{short_string($item->product->summary,70)}}</small>
                </div>
            </td>
            <td>{{number_format($item->price,2)}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format(($item->price * $item->quantity),2)}}</td>
            @php $price += $item->price; $quantity +=$item->quantity; $totle += ($item->price * $item->quantity);  @endphp
        </tr>
        @endforeach
        <tr align="center">
            <td class="text-bold">Total</td>
            <td class="text-bold">{{number_format($price,2)}}</td>
            <td class="text-bold">{{$quantity}}</td>
            <td class="text-bold">{{number_format($totle,2)}}</td>
        </tr>
        <tr>
            <td>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sequi fugit deleniti aut quidem totam provident error reiciendis, numquam corrupti sint maxime facilis eum illo dolorum beatae qui. Quidem, commodi.</p>
            </td>
            <td colspan="3">
                <div class="total-part">
                    <div class="total-right w-100 float-left" align="right">
                        <div style="display:flex; flex-direction: row; align-items: center; flex-wrap: nowrap; justify-content: flex-end; margin-bottom: 10px;">Sub Total<span class="text-bold" style="font-family: DejaVu Sans; sans-serif; margin-left: 15px;">&#8377; {{number_format($orders->sub_total,2)}}</span></div>
                        <div style="display:flex; flex-direction: row; align-items: center; flex-wrap: nowrap; justify-content: flex-end; margin-bottom: 10px;">Shipping<span class="text-bold" style="font-family: DejaVu Sans; sans-serif; margin-left: 22px;">&#8377; {{number_format($orders->shipping_amount,2)}}</span></div>
                        <div style="display:flex; flex-direction: row; align-items: center; flex-wrap: nowrap; justify-content: flex-end; margin-bottom: 10px;">Grand Total<span class="text-bold" style="font-family: DejaVu Sans; sans-serif; margin-left: 15px;">&#8377; {{number_format($orders->total_amount,2)}}</span></div>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height: 35px;">
                <div style="float: right;">
                    <div style="font-size:15px;"><b>sss</b></div>
                    <span>Authorized Signatory</span>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>