<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Topics') }}
        </x-slot>
        @livewire('forms.admin.topic-cru')
    </x-admin.table-card>
</x-app-layout>
