<div class="w-full pb-8">
    <div class="grid grid-flow-col gap-3">
        @livewire('tables.admin.questions-table')
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
            <x-form-select name="topic_id" label="Topic Title" placeholder="Please Select"
                :options="Helper::getKeyValues('Topic', 'title', 'id')" />
            <x-form-input name="question_text" label="Question" type="text" />
            <x-form-textarea name="answer_explanation" label="Explanation" type="text" />
            <x-form-input name="more_info_link" label="Link" type="text" />
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
