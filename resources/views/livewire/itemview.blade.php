<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items List') }}
        </h2>
    </x-slot>

    <div>
        
		
		<div class="flex">
			<div class="flex flex-wrap  w-1/5">
				Setting
			</div>
			
			<div class="flex flex-wrap  w-4/5">
				<div class="flex justify-between items-center p-8">
                            <div class="flex-1 min-w-0">
                                {{-- Image --}}
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="object-cover h-full w-full shadow-lg mb-5 rounded-lg">

                                <h2 class="text-lg leading-6 font-medium text-gray-900">
                                    Product name : {{ $product->name }}
                                </h2>
                                <p class="text-lg leading-6 font-medium text-gray-900">
                                    Price : ${{ $product->price }}
                                </p>
								<h2 class="text-lg leading-6 font-medium text-gray-900">
                                    Product description : {{ $product->description }}
                                </h2>
							</div>	
				</div>
			</div class="flex flex-wrap  w-4/5">
			
			<livewire:cart-component />
		</div>
    </div>
	
	
</x-user-layout>

