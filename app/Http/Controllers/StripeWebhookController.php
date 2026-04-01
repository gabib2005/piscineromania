<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = config('cashier.webhook.secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\Exception $e) {
            return response('Invalid signature', 400);
        }

        if ($event->type === 'payment_intent.succeeded') {
            $intent = $event->data->object;
            $orderNumber = $intent->metadata->order_number ?? null;
            if ($orderNumber) {
                Order::where('order_number', $orderNumber)->update([
                    'stripe_payment_id'     => $intent->id,
                    'stripe_payment_status' => 'paid',
                    'status'                => 'processing',
                ]);
            }
        }

        return response('OK', 200);
    }
}
