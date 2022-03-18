<div class="w-full pb-8">
    <div class="grid grid-flow-col gap-3">
        @livewire('tables.admin.questions-options-table')
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
            <x-form-select name="question_id" label="Question Title" placeholder="Please Select"
                :options="Helper::getKeyValues('Question', 'question_text', 'id')" />
            <x-form-input name="option" label="Option Text" type="text" />
            <x-form-checkbox name="correct" label="True(Check if Only True)" />
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
