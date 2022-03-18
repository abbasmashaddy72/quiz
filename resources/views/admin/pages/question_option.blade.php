<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Question Options') }}
        </x-slot>
        @livewire('forms.admin.questions-option-cru')
    </x-admin.table-card>
</x-app-layout>
