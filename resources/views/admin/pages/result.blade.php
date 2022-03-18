<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Results') }}
        </x-slot>
        @livewire('forms.admin.result-cru')
    </x-admin.table-card>
</x-app-layout>
