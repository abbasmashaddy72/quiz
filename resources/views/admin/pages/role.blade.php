<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Roles') }}
        </x-slot>
        @livewire('forms.admin.role-cru')
    </x-admin.table-card>
</x-app-layout>
