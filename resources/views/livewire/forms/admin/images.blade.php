<div class="w-full pb-8">
    <div class="grid grid-flow-col gap-3">
        @livewire('tables.admin.images-table')
        <x-admin.form-custom title='Add/Edit'>
            <form wire:submit.prevent="store">
                @csrf
                @wire('debounce.200ms')
                <x-form-input name='model' type='hidden' />
                <x-form-select name="model_id" label="Topic Title" placeholder="Please Select"
                    :options="Helper::getKeyValues('Topic', 'title', 'id')" />
                <x-admin.form.single-upload name="image" label="Image" />
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
