<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Questions') }}
        </x-slot>
        @livewire('forms.admin.question-cru')
    </x-admin.table-card>
</x-app-layout>
