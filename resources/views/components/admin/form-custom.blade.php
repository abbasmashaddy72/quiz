<div class="w-full pb-8">
    <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-lg ">
        <div class="flex flex-wrap justify-between p-6 pb-0">
            <div class="header-title">
                <h4 class="mb-2 text-2xl font-medium card-title">
                    {{ $title }}
                </h4>
            </div>
            @if (!empty($back))
                <div class="card-action">
                    <x-admin.a-button href="{{ url()->previous() }}">Back</x-admin.a-button>
                </div>
            @endif
        </div>
        <div class="flex-auto p-6">
            {{ $slot }}
        </div>
    </div>
</div>
@if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'show')
    @push('scripts')
        <script>
            var form = document.getElementById("form");
            var allElements = form.elements;
            for (var i = 0, l = allElements.length; i < l; ++i) {
                // allElements[i].readOnly = true;
                allElements[i].disabled = true;
            }
        </script>
    @endpush
@endif
