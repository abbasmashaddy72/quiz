<div>
    @foreach ($images as $item)
        <div class="flex flex-wrap justify-center">
            <img src="{{ asset('storage' . str_replace('public', '', $item->image)) }}"
                class="h-auto max-w-full p-1 bg-white border rounded-lg shadow-inner" />
        </div>
    @endforeach

    {{ $images->links() }}

    <div class="flex flex-wrap justify-center">
        <x-admin.a-button href="{{ route('quiz.show', ['quiz' => '1']) }}">
            {{ __('Start Quiz') }}
        </x-admin.a-button>
    </div>
</div>
