<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products List') }}
        </h2>
    </x-slot>

	

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            Accessible only for sellers.
        </div>
			<div class="flex" x-data="{ open1:false, open2:false, open3:false, open4:false, open5:false, open6:false}">
				<div class="bg-blue-100 h-screen p-5 pt-8 w-72">
					<form>   
						<label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
							<div class="relative">
								<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
									<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
								</div>
								<input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ..." required>
								<!--<button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>-->
							</div>
					</form>
					
					<div class="pt-8">
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open1 = ! open1">訂單管理</button>
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open2 = ! open2">商品管理</button>
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open3 = ! open3">財務管理</button>
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open4 = ! open4">賣場管理</button>
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open5 = ! open5">數據分析</button>
						<button class="text-lg flex items-center gap-x-4 cursor-pointer p-2" x-on:click="open6 = ! open6">設定</button>
					    						
					</div>
				</div>
				
				<div x-show="open1">
					訂單管理
				</div>
				<div x-show="open3">財務管理</div>
				<div x-show="open4">賣場管理</div>
				<div x-show="open5">數據分析</div>
				<div x-show="open6">設定</div>
				<div class="py-12 flex-auto" x-show="open2">
					<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
						<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

							{{-- Table for products --}}
							<table class="min-w-full border-collapse block md:table">
								<thead class="block md:table-header-group">
									<tr
										class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('ID') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Image') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Name') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Description') }}</th>	
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Price') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Quantity') }}</th>	
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
											{{ __('Status') }}</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
										</th>
										<th
											class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
										</th>
									</tr>
								</thead>
								<tbody class="block md:table-row-group">
									@if (count($products) > 0)
										@foreach ($products as $key => $product)
											@if(Auth::user()->id == $product->user_id)
											<tr onclick="window.location='{{ route('product.view', $product->id) }}';"
												class="bg-gray-300 border border-grey-500 md:border-none block md:table-row cursor-pointer">
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span
														class="inline-block w-1/3 md:hidden font-bold">name</span>{{ $product->id }}
												</td>
												{{-- Show image --}}
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
														class="object-cover h-24 w-48 shadow-xl rounded-md">
												</td>


												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<span class="inline-block w-1/3 md:hidden font-bold">name</span>
													<a class="underline"
														href="{{ route('product.view', $product->id) }}">{{ $product->name }}
													</a>
												</td>
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<span class="inline-block w-1/3 md:hidden font-bold">description</span>
													<a class="underline"
														href="{{ route('product.view', $product->id) }}">{{ $product->description }}
													</a>
												</td>
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span
														class="inline-block w-1/3 md:hidden font-bold">price</span>{{ $product->price }}
												</td>
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span
														class="inline-block w-1/3 md:hidden font-bold">quantity</span>{{ $product->quantity }}
												</td>
												@if ($product->status == 'inactive')
													<td
														class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-red-700 font-bold">
														<a href="{{ route('product.setActive', $product->id) }}"
															class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">
															{{ $product->status }}
														</a>

													</td>
												@else
													<td
														class="p-2 md:border md:border-grey-500 text-center block md:table-cell text-green-700 font-bold">
														<a href="{{ route('product.setInactive', $product->id) }}"
															class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
															{{ $product->status }}
														</a>
													</td>
												@endif
												{{-- Edit button --}}
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<a href="{{ route('product.edit', $product->id) }}"
														class="inline-block text-sm px-4 py-2 leading-none border rounded-full bg-blue-500 text-white hover:bg-blue-700">
														{{ __('Edit') }}
													</a>
												</td>
												{{-- Delete button --}}
												<td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
													<form action="{{ route('product.delete', $product->id) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="submit"
															class="inline-block text-sm px-4 py-2 leading-none border rounded-full bg-red-500 text-white hover:bg-red-700">
															{{ __('Delete') }}
														</button>
													</form>
												</td>
											</tr>
											@endif
										@endforeach
									@else
										<tr class="text-center">
											<td colspan="7">
												<h1 class="text-center m-10 font-bold text-xl">{{ __('No products found') }}</h1>
											</td>
										</tr>
									@endif
								</tbody>
							</table>

							{{-- Add new product button --}}
							<div class="p-8 flex justify-center">
								<a href="{{ route('product.create') }}"
									class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
									{{ __('Add New Product') }}
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
</x-seller-layout>
