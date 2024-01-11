<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            Accessible only for users.
        </div>
    </div>
	<div class="menu">
		<div class="title">
			
				
					
					<div class="flex">
						<div class="my-5 flex justify-center w-3/4"><h1 class=" text-5xl">CheckOut</h1></div>
						<div class="my-5 flex justify-center w-1/4"><h1 class=" text-5xl"></h1></div>
					</div>
					
					<div class="flex">
						<div class="flex flex-wrap  w-1/5">
							Setting
						</div>
						<div class="flex-wrap  w-4/5">
							
							<livewire:order-component />	
							
						</div>
						
					</div>
					
				
		</div>
	</div>
	
</x-user-layout>
