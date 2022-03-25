<?php

namespace App\Http\Livewire\Views\Admin;

use App\Models\Question;
use App\Models\Result;
use App\Models\Topic;
use Livewire\Component;

class QuizQuestions extends Component
{
    public $data, $count, $quizSize, $currentQuestion, $quizid;
    public $isDisabled = true;
    public $showResult = false;
    public $quizInProgress = true;
    public $selectedId = 1;
    public $userAnswered = [];
    public $answeredQuestions = [];

    public function mount()
    {
        $this->data = Topic::where('id', $this->selectedId)->get();
        $this->data->transform(function ($category) {
            $category->questions = Question::whereHas('topic', function ($q) use ($category) {
                $q->where('id', $category->id);
            })->inRandomOrder()
                ->take(10)
                ->get();
            return $category;
        });
        $this->quizSize = $this->data->first()->questions->count();

        $this->count = 1;
        $this->currentQuestion = $this->getNextQuestion();
    }

    public function updatedUserAnswered()
    {
        if ((empty($this->userAnswered) || (count($this->userAnswered) > 1))) {
            $this->isDisabled = true;
        } else {
            $this->isDisabled = false;
        }
    }

    public function getNextQuestion()
    {
        $question = Question::where('topic_id', $this->selectedId)
            ->with('options')
            ->whereNotIn('id', $this->answeredQuestions)
            ->inRandomOrder()
            ->first();

        if ($this->count < $this->quizSize) {
            array_push($this->answeredQuestions, $question->id);
        }
        return $question;
    }

    public function nextQuestion()
    {
        // $this->quizid->question_id = serialize($this->answeredQuestions);
        list($answerId, $isChoiceCorrect) = explode(',', $this->userAnswered[0]);

        Result::create([
            'user_id' => auth()->id(),
            'topic_id' => $this->currentQuestion->topic_id,
            'question_id' => $this->currentQuestion->id,
            'option_id' => $answerId,
            'correct' => $isChoiceCorrect,
            'date' => now(),
        ]);

        $this->count++;

        $answerId = '';
        $isChoiceCorrect = '';
        $this->reset('userAnswered');
        $this->isDisabled = true;

        if ($this->count == $this->quizSize + 1) {
            $this->showResults();
        }

        $this->currentQuestion = $this->getNextQuestion();
    }

    public function showResults()
    {
        // Get a count of total number of quiz questions in Quiz table for the just finisned quiz.
        $this->totalQuizQuestions = Result::where('topic_id', $this->selectedId)->where('user_id', auth()->user()->id)->count();

        // Get a count of correctly answered questions for this quiz.
        $this->currectQuizAnswers = Result::where('topic_id', $this->selectedId)
            ->where('correct', '1')
            ->where('user_id', auth()->user()->id)
            ->count();

        // Caclculate score for upding the quiz_header table before finishing the quid.
        $this->quizPecentage = round(($this->currectQuizAnswers / $this->totalQuizQuestions) * 100, 2);

        // Hide quiz div and show result div wrapped in if statements in the blade template.
        $this->quizInProgress = false;
        $this->showResult = true;
    }

    public function render()
    {
        return view('livewire.views.admin.quiz-questions');
    }
}
