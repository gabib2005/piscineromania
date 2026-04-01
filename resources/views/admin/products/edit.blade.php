@extends('layouts.admin')
@section('title', 'Editare produs')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-500 hover:text-[#00b4d8] mb-6 inline-block">← Înapoi</a>
    <div class="bg-white rounded-xl border border-gray-100 p-8">
        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.products._form', ['product' => $product])
            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-[#0a2540] text-white px-6 py-2 rounded-lg font-medium hover:bg-[#00b4d8] transition-colors">
                    Actualizează
                </button>
                <a href="{{ route('admin.products.index') }}" class="border border-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                    Anulează
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
