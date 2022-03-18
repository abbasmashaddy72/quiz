<div class="w-full pb-8">
    <div class="grid grid-flow-col gap-3">
        @livewire('tables.admin.topics-table')
        <x-admin.form-custom title='Add/Edit Data'>
            @if ($updateMode)
                <form wire:submit.prevent="update">
                @else
                    <form wire:submit.prevent="store">
            @endif
            @csrf
            @wire('debounce.200ms')
            @if ($updateMode)
                <x-form-input name="selected_id" type="hidden" />
            @endif
            <x-form-input name="title" label="Title" type="text" />
            @endwire
            <div class="mt-3">
                <x-admin.submit-button>
                    {{ __('Submit') }}
                </x-admin.submit-button>
            </div>
            </form>
        </x-admin.form-custom>
    </div>
</div>
