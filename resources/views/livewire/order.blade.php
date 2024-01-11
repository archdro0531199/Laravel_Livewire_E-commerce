<div x-data="{ open:true}">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
	<div class="py-12 flex-auto" x-show="open">
					<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
						<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

							{{-- Table for products --}}
							<table class="min-w-full border-collapse block md:table">
								<thead class="block md:table-header-group">
									<tr
										class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
										
										
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Name') }}</th>
											
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Price') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Quantity') }}</th>	
										
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
										</th>
										
									</tr>
								</thead>
								<tbody class="block md:table-row-group">
									@if ($content->count() > 0)
										@foreach ($content as $id => $item)
											
											<tr 
												class="bg-gray-300 border border-grey-500 md:border-none block md:table-row cursor-pointer">
												
												{{-- Show image --}}
												


												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<span class="inline-block w-1/3 md:hidden font-bold">name</span>
													{{ $item->get('name') }}
												</td>
												
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<span class="inline-block w-1/3 md:hidden font-bold">price</span>
													{{ $item->get('price') }}
												</td>
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<span class="inline-block w-1/3 md:hidden font-bold">quantity</span>
													{{ $item->get('quantity') }}
												</td>
												
												
												{{-- Delete button --}}
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<button class="text-sm p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="removeFromCart({{ $id }})">Remove</button>
												</td>
											</tr>
											
										@endforeach
									@else
										<tr class="text-center">
											<td colspan="7">
												<h1 class="text-center m-10 font-bold text-xl">{{ __('No items found') }}</h1>
											</td>
										</tr>
									@endif
								</tbody>
							</table>

							{{-- Add new product button --}}
							<div class="p-8 flex justify-center">
								<button 
									class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" x-on:click="open = !open">
									Checkout
								</button>
							</div>
						</div>
					</div>
				</div>
				
		<div x-show="!open">
			Your Order Number:<p id="demo"></p>
			<script>
				let x = Math.floor((Math.random() * 100000) + 1);
				document.getElementById("demo").innerHTML = x;
			</script>
		</div>
</div>
