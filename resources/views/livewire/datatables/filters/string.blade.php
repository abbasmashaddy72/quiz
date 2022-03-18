<div x-data class="flex flex-col m-1">
    <input x-ref="input" type="text"
        class="block w-full px-2 py-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow"
        wire:change="doTextFilter('{{ $index }}', $event.target.value)" x-on:change="$refs.input.value = ''" />
    <div class="flex flex-wrap space-x-1 max-w-48">
        @foreach ($this->activeTextFilters[$index] ?? [] as $key => $value)
            <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')"
                class="flex items-center pl-1 m-1 space-x-1 text-xs tracking-wide text-white uppercase bg-gray-500 rounded-full hover:bg-red-600 focus:outline-none">
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle />
            </button>
        @endforeach
    </div>
</div>
