<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Results') }}
        </x-slot>
        @livewire('tables.admin.results-table')
    </x-admin.table-card>
</x-app-layout>
