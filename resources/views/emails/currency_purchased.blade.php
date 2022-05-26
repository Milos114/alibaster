<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Order created</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">

<div align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <div bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
        <div style="color: #100a0b; font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 20px;"
             width="100%">
            <h2>Thank you for using our service</h2>
            <div>
                Currency purchased: {{$order->rate->currency}} {{$order->amount_purchased}}
            </div>
            <div>
                Exchange rate: {{$order->rate->exchange_rate}}
            </div>
            <div>
                Surcharge percent: {{$order->rate->surchargePercent()}}%
            </div>
            <div>
                Surchange amount: ${{$order->surchange_amount}}
            </div>
            <div>
                Amount paid in USD: {{$order->amount_in_usd}}
            </div>
            <div>
                Date: {{$order->created_at->toDateTimeString()}}
            </div>
        </div>
        <div style="color: #130808; font-family: Arial, sans-serif; font-size: 10px; text-align: center; margin-top: 20px">
            This message was automatically generated. Please do not reply to this email.
        </div>
    </div>
</div>
</body>
</html>
