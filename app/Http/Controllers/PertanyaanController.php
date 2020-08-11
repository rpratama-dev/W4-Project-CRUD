<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PertanyaanController extends Controller
{

    private $current_timestamp;

    public function __construct()
    {
        $this->current_timestamp = Carbon::now()->toDateTimeString(); //get timestamp;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *menampilkan list data pertanyaan-pertanyaan (boleh menggunakan table html atau bootstrap card)
     */
    public function index(){  
        $questions = Question::all()->sortByDesc("id");
        return view('questions.index', ['questions' => $questions]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * menampilkan form untuk membuat pertanyaan baru
     */
    public function create(){
        //
        return view('questions.create', [
            'action' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *  menyimpan data baru ke tabel pertanyaan
     */
    public function store(Request $request)
    {
        //
        $this->validasi($request);

        Question::create([
            'judul' => $request->judul,
            'isi' => $request->pertanyaan,
            'profile_id' => 1,
            'created_at' => $this->current_timestamp,
            'updated_at' => $this->current_timestamp
        ]);
 
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     *
     * menampilkan detail question dengan id tertentu
     */
    public function show($id)
    {
        //
        $question = Question::find($id);
        //print_r($question);
        return view('questions.show', ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     *
     * menampilkan form untuk edit pertanyaan dengan id tertentu
     */
    public function edit($id)
    {
        //
        $question = Question::find($id);
        //print_r($question);
        return view('questions.create', [
            'action' => 'edit', 
            'question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     *
     * menyimpan perubahan data pertanyaan (update) untuk id tertentu
     */
    public function update(Request $request, $id)
    {
        //
        $this->validasi($request);

        $question = Question::find($id);
        $question->judul = $request->judul;
        $question->isi = $request->pertanyaan;
        $question->updated_at = $this->current_timestamp;
        $question->save();
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     * 
     *  menghapus pertanyaand dengan id tertentu
     */
    public function destroy($id)
    {
        //
        $question = Question::find($id);
        $question->delete();
        return redirect('/pertanyaan');
    }

    private function validasi($request){
        $rules = [
            'judul' => 'required|max:100',
            'pertanyaan' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field is max: 100'
        ];

        $request->validate($rules, $customMessages);
    }
}
