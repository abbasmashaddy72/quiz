<x-app-layout>
    <x-admin.table-card>
        <x-slot name="title">
            {{ __('15th Shaban Quiz') }}
        </x-slot>
        {{-- <x-slot name="addbutton">
            {{ $count . '/' . $quizSize }}
        </x-slot> --}}
        @livewire('views.admin.quiz-questions')
    </x-admin.table-card>
</x-app-layout>
