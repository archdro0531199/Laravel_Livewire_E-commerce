<div class="p-2.5 mx-2 my-2 max-w-xs w-1/6 rounded border-2">
    <div class="h-20">
		<h1 class="text-3xl mb-2">{{ $product->name }}</h1>
	</div>
	<div class="h-20">
		<h1 class="text-3xl mb-2">${{ $product->price }}</h1>	
	</div>
	<div class="h-24">
		<a href="{{ route('item.itemview', $product->id) }}"><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="object-cover h-24 w-48 shadow-xl rounded-md"/></a>
    </div>
	
	<div class="h-20">
		@foreach(App\Models\User::all() as $user)
			@if($user->id == $product->user_id)
			<a class="text-lg mb-2" href="{{  route('item.view', $user->id) }}" >{{ $user->company }}</a>
			@endif
		@endforeach
    </div>
	<div class="h-20">
		<input class="mb-2 border-2 rounded w-40" type="number" min="1" wire:model="quantity">
    </div>
	<div class="h-20">
		<button class="p-2 border-2 rounded border-blue-500 hover:border-blue-600 bg-blue-500 hover:bg-blue-600" wire:click="addToCart">Add To Cart</button>
	</div>
</div>
