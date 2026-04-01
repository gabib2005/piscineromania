@extends('layouts.app')
@section('title', 'Plată comandă ' . $order->order_number)

@section('content')
<div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-2" style="font-family:'Outfit',sans-serif">💳 Plată securizată</h1>
    <p class="text-gray-500 mb-8">Comanda #{{ $order->order_number }} — Total: <strong>{{ number_format($order->total, 2, ',', '.') }} Lei</strong></p>

    <div class="bg-white rounded-xl border border-gray-100 p-8">
        <div id="payment-element" class="mb-6"></div>
        <div id="payment-message" class="hidden text-red-600 text-sm mb-4"></div>
        <button id="submit-btn"
                class="w-full bg-[#0a2540] text-white py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors disabled:opacity-50 flex items-center justify-center gap-2">
            <span id="btn-text">🔒 Plătește {{ number_format($order->total, 2, ',', '.') }} Lei</span>
            <svg id="btn-spinner" class="hidden w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
        </button>
        <p class="text-xs text-gray-400 text-center mt-4">🔒 Plată procesată securizat prin Stripe. Datele cardului nu sunt stocate.</p>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
(async () => {
    const stripe = Stripe('{{ $stripeKey }}');
    const response = await fetch('{{ route("order.payment.intent", $order->order_number) }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content }
    });
    const { clientSecret } = await response.json();

    const elements = stripe.elements({ clientSecret });
    const paymentElement = elements.create('payment');
    paymentElement.mount('#payment-element');

    document.getElementById('submit-btn').addEventListener('click', async () => {
        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        document.getElementById('btn-text').textContent = 'Se procesează...';
        document.getElementById('btn-spinner').classList.remove('hidden');

        const { error } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                return_url: '{{ route("order.confirmation", $order->order_number) }}',
                receipt_email: '{{ $order->shipping_email }}'
            }
        });

        if (error) {
            document.getElementById('payment-message').textContent = error.message;
            document.getElementById('payment-message').classList.remove('hidden');
            btn.disabled = false;
            document.getElementById('btn-text').textContent = '🔒 Plătește {{ number_format($order->total, 2, ",", ".") }} Lei';
            document.getElementById('btn-spinner').classList.add('hidden');
        }
    });
})();
</script>
@endsection
