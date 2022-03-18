<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Users') }}
        </x-slot>
        @livewire('forms.admin.user-cru')
    </x-admin.table-card>
</x-app-layout>
