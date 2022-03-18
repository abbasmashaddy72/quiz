<div class="flex flex-col">
    <div x-data class="relative flex">
        <input x-ref="min" type="number" placeholder="{{ __('MIN') }}"
            wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)"
            class="block w-full px-2 py-1 m-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.min.value=''" wire:click="doNumberFilterStart('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>

    <div x-data class="relative flex">
        <input x-ref="max" type="number" placeholder="{{ __('MAX') }}"
            wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
            class="block w-full px-2 py-1 m-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.max.value=''" wire:click="doNumberFilterEnd('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>
</div>
