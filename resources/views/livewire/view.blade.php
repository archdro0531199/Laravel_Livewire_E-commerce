<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 text-4xl">
            {{ $user->company }}
			
			<p class="text-2xl">Evaluate: {{ $user->evaluate }}</p>
			<p class="text-2xl">Atention: {{ $user->atention }}</p>
			<p class="text-2xl">Respodtime: {{ $user->respondtime }}</p>
        </div>
		
		<div class="flex">
			<div class="flex flex-wrap  w-1/5">
				Setting
			</div>
			<div class="flex flex-wrap  w-4/5">
				@foreach(App\Models\Product::all() as $product)
					@if($user->id == $product->user_id)
					<livewire:product-component :product='$product' />
					@endif
				@endforeach
			</div>
			<livewire:cart-component />
		</div>
    </div>
	
	
</x-user-layout>

