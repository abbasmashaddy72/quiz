<div x-data class="flex flex-col">
    <div class="relative flex w-full">
        <input x-ref="start"
            class="block w-full px-2 py-1 m-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow"
            type="date" wire:change="doDateFilterStart('{{ $index }}', $event.target.value)"
            style="padding-bottom: 5px" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.start.value=''" wire:click="doDateFilterStart('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>
    <div class="relative flex items-center w-full">
        <input x-ref="end"
            class="block w-full px-2 py-1 m-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow"
            type="date" wire:change="doDateFilterEnd('{{ $index }}', $event.target.value)"
            style="padding-bottom: 5px" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button x-on:click="$refs.end.value=''" wire:click="doDateFilterEnd('{{ $index }}', '')"
                class="-mb-0.5 pr-1 flex text-gray-400 hover:text-red-600 focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="w-5 h-5 stroke-current" />
            </button>
        </div>
    </div>
</div>
