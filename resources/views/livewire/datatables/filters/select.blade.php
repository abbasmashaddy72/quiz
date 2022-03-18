<div x-data class="flex flex-col">
    <div class="flex">
        {{-- <select x-ref="select" name="{{ $name }}"
            class="block w-full m-1 text-sm leading-4 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            wire:input="doSelectFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.select.value=''"> --}}
        <select x-ref="select" name="{{ $name }}"
            class="block w-full px-2 py-1 m-1 text-sm font-normal bg-white border rounded outline-none focus:border-blue-500 focus:shadow"
            wire:input="doSelectFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.select.value=''">
            <option value=""></option>
            @foreach ($options as $value => $label)
                @if (is_object($label))
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                @elseif(is_array($label))
                    <option value="{{ $label['id'] }}">{{ $label['name'] }}</option>
                @elseif(is_numeric($value))
                    <option value="{{ $label }}">{{ $label }}</option>
                @else
                    <option value="{{ $value }}">{{ $label }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="flex flex-wrap space-x-1 max-w-48">
        @foreach ($this->activeSelectFilters[$index] ?? [] as $key => $value)
            <button wire:click="removeSelectFilter('{{ $index }}', '{{ $key }}')"
                x-on:click="$refs.select.value=''"
                class="flex items-center pl-1 m-1 space-x-1 text-xs tracking-wide text-white uppercase bg-gray-500 rounded-full hover:bg-red-600 focus:outline-none">
                <span>{{ $this->getDisplayValue($index, $value) }}</span>
                <x-icons.x-circle />
            </button>
        @endforeach
    </div>
</div>
