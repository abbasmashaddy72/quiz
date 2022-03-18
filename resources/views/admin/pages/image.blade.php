<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('Images') }}
        </x-slot>
        @livewire('forms.admin.images')
    </x-admin.table-card>
</x-app-layout>
