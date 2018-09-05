<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    //
	public function show($id){
		$userid = session('user')['id'];
		$qst = DB::select('select mod(id,20)+1 as number_soal ,concat(mod(id,20)+1, ". ", question) as question ,first_opt,second_opt,third_opt,forth_opt,answer_user, soal_id ,time_close 
		from tr_question where mod(id,20)+1 = ? 
		order by number_soal',[$id]);
		$showresult = DB::select('select mod(id,20)+1 as number_soal ,concat(mod(id,20)+1, ". ", question) as question,answer_user 
		from tr_question 
		where user_id = ? order by number_soal',[$userid]);
		return view('test_page',['quest'=>$qst, 'showresult'=>$showresult]);
	}
	public function editQst(Request $request, $soal_id){
		$ans = $request->input('optradio');
		$userId = session('user')['id'];
		DB::update('UPDATE tr_question set answer_user = ? where soal_id = ? and user_id = ?',[$ans,$soal_id,$userId]);
		return redirect('edit/1');
	}
	public function randSoal(){
		$userId = session('user')['id'];
		DB::update('delete from tr_question where user_id = ?',[$userId]);
		DB::update('insert into tr_question(soal_id,user_id,question,first_opt,second_opt,third_opt,forth_opt,answer,mod_soal,answer_user,time_close) select id, ? ,question,first_option, second_option,third_option, fourth_option,answer, 10,0,DATE_ADD(now(), INTERVAL +2 HOUR) from questions order by rand() limit 20',[$userId]);
		return redirect('edit/1');
	}
	public function score(){
		$scr = DB::select("select sum(hasil) as total_score from(
							select case
							when answer = answer_user then 4
							when answer != answer_user then -1
							end as hasil
							from tr_question where user_id = ? and answer_user != '0') asd",[session('user')['id']]);
		return view('score_page',['scores'=>$scr]);
	}
}
