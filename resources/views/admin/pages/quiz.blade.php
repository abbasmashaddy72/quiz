<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('15th Shaban Quiz') }}
        </x-slot>
        @livewire('views.admin.quiz-images')
    </x-admin.table-card>
</x-app-layout>
