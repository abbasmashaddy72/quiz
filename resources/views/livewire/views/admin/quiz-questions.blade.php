<div class="mx-2 bg-white rounded-lg shadow-lg">
    @if ($quizInProgress)
        <div class="px-4 -py-3 sm:px-6 ">
            <div class="flex justify-end max-w-auto">
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    <span class="p-1 font-extrabold text-gray-400">Quiz Progress</span>
                    <span
                        class="p-3 font-bold leading-loose text-white bg-blue-500 rounded-full">{{ $count . '/' . $quizSize }}</span>
                </p>
            </div>
        </div>
        <div class="mt-6 overflow-hidden bg-white shadow sm:rounded-lg">
            <form wire:submit.prevent>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900">
                        <span class="mr-2 font-extrabold"> {{ $count }}</span>
                        {{ $currentQuestion->question_text }}
                    </h3>
                    @foreach ($currentQuestion->options as $answer)
                        <label for="question-{{ $answer->id }}">
                            <div
                                class="px-3 py-3 m-3 text-sm text-gray-800 border-2 border-gray-300 rounded-lg max-w-auto ">
                                <span class="mr-2 font-extrabold">
                                    <input id="question-{{ $answer->id }}"
                                        value="{{ $answer->id . ',' . $answer->correct }}" wire:model="userAnswered"
                                        type="checkbox"> </span> {{ $answer->option }}
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if ($count < $quizSize)
                        <button wire:click="nextQuestion" type="submit"
                            @if ($isDisabled) disabled='disabled' @endif
                            class="inline-flex items-center px-4 py-2 m-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                            {{ __('Next Question') }}
                        </button>
                    @else
                        <button wire:click="nextQuestion" type="submit"
                            @if ($isDisabled) disabled='disabled' @endif
                            class="inline-flex items-center px-4 py-2 m-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                            {{ __('Show Results') }}
                        </button>
                    @endif
                </div>
            </form>
        </div>
    @endif
    @if ($showResult)
        <section class="text-gray-600 body-font">
            <div class="overflow-hidden bg-white border-2 border-gray-300 shadow sm:rounded-lg">
                <div class="container px-5 py-5 mx-auto">
                    <div class="justify-center mb-5 text-center">
                        <h1 class="mb-4 text-2xl font-medium text-center text-gray-900 sm:text-3xl title-font">Quiz
                            Result</h1>
                        <p class="mt-10 text-md"> Dear <span class="mr-2 font-extrabold text-blue-600">
                                {{ Auth::user()->name . '!' }} </span> You have secured</p>
                        <progress class="mx-auto text-base leading-relaxed xl:w-2/4 lg:w-3/4"
                            id="quiz-{{ $quizid }}" value="{{ $quizPecentage }}" max="100">
                            {{ $quizPecentage }} </progress> <span> {{ $quizPecentage }}% </span>
                    </div>
                    <div class="flex flex-wrap -mx-2 lg:w-4/5 sm:mx-auto sm:mb-2">
                        <div class="w-full p-2 sm:w-1/2">
                            <div class="flex items-center h-full p-4 bg-gray-100 rounded">
                                <svg fill=" none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="mr-5 font-medium text-purple-700 title-font">Correct Answers</span><span
                                    class="font-medium title-font">{{ $currectQuizAnswers }}</span>
                            </div>
                        </div>
                        <div class="w-full p-2 sm:w-1/2">
                            <div class="flex items-center h-full p-4 bg-gray-100 rounded">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="mr-5 font-medium text-purple-700 title-font">Total Questions</span><span
                                    class="font-medium title-font">{{ $totalQuizQuestions }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-center">
                        {{ __('Thanks for attempting the Quiz, Please Collect Your Gift.') }}
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
