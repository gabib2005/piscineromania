<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Factură {{ $order->order_number }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .company { font-size: 18px; font-weight: bold; color: #0a2540; }
        h2 { color: #0a2540; border-bottom: 2px solid #00b4d8; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background: #0a2540; color: white; padding: 8px; text-align: left; }
        td { padding: 7px 8px; border-bottom: 1px solid #eee; }
        .total-row td { font-weight: bold; background: #f5f5f5; }
        .footer { margin-top: 40px; text-align: center; color: #999; font-size: 10px; }
    </style>
</head>
<body>
<div class="header">
    <div>
        <div class="company">PiscineRomania SRL</div>
        <div>contact@piscineromania.ro</div>
        <div>piscineromania.ro</div>
    </div>
    <div style="text-align:right">
        <div style="font-size:16px;font-weight:bold">FACTURĂ PROFORMĂ</div>
        <div>Nr. {{ $order->order_number }}</div>
        <div>Data: {{ $order->created_at->format('d.m.Y') }}</div>
    </div>
</div>

<h2>Date cumpărător</h2>
<p><strong>{{ $order->shipping_name }}</strong><br>
{{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_county }}<br>
{{ $order->shipping_email }}
@if($order->wants_invoice && $order->company_name)
<br><strong>Firmă:</strong> {{ $order->company_name }} | CUI: {{ $order->company_vat }}
@endif
</p>

<h2>Produse</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Cod</th>
            <th>Denumire</th>
            <th style="text-align:center">Cant.</th>
            <th style="text-align:right">Preț unit.</th>
            <th style="text-align:right">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->product_code }}</td>
            <td>{{ $item->product_name }}</td>
            <td style="text-align:center">{{ $item->quantity }}</td>
            <td style="text-align:right">{{ number_format($item->unit_price, 2, ',', '.') }} Lei</td>
            <td style="text-align:right">{{ number_format($item->subtotal, 2, ',', '.') }} Lei</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" style="text-align:right">Subtotal (fără TVA)</td>
            <td style="text-align:right">{{ number_format($order->subtotal, 2, ',', '.') }} Lei</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">TVA 19%</td>
            <td style="text-align:right">{{ number_format($order->tax, 2, ',', '.') }} Lei</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">Transport</td>
            <td style="text-align:right">{{ $order->shipping == 0 ? 'Gratuit' : number_format($order->shipping, 2, ',', '.') . ' Lei' }}</td>
        </tr>
        <tr class="total-row">
            <td colspan="5" style="text-align:right;font-size:14px">TOTAL DE PLATĂ</td>
            <td style="text-align:right;font-size:14px">{{ number_format($order->total, 2, ',', '.') }} Lei</td>
        </tr>
    </tbody>
</table>

<div class="footer">
    <p>PiscineRomania SRL | piscineromania.ro | Documentul a fost generat automat.</p>
</div>
</body>
</html>
