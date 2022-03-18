<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionsOptionRequest;
use App\Http\Requests\UpdateQuestionsOptionRequest;
use App\Models\QuestionsOption;

class QuestionsOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.question_option');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.questions-option-cru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionsOption $questionsOption)
    {
        return view('admin.forms.questions-option-cru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionsOption $questionsOption)
    {
        return view('admin.forms.questions-option-cru');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionRequest  $request
     * @param  \App\Models\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionRequest $request, QuestionsOption $questionsOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionsOption $questionsOption)
    {
        //
    }
}
