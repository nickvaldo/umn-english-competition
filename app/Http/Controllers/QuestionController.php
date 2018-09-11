<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    //
	private $jmlSoal=20;
	public function show($id){
		$num = $this->jmlSoal;
		
		$userid = session('user')['id'];
		$qst = DB::select('select id, mod(id,'.$num.')+1 as number_soal ,concat(mod(id,'.$num.')+1, ". ", question) as question ,first_opt,second_opt,third_opt,forth_opt,answer_user, soal_id ,time_close 
		from tr_question where mod(id,'.$num.')+1 = ? and user_id = ?
		order by number_soal',[$id, $userid]);
		//var_dump($qst);die;
		$showresult = DB::select('select id, mod(id,'.$num.')+1 as number_soal ,concat(mod(id,'.$num.')+1, ". ", question) as question,answer_user 
		from tr_question 
		where user_id = ? order by number_soal',[$userid]);
		
		return view('test_page',['quest'=>$qst, 'showresult'=>$showresult]);
	}
	public function editQst(Request $request, $id){
		$ans = $request->input('optradio');
		$userId = session('user')['id'];
		DB::update('UPDATE tr_question set answer_user = ? where id = ?',[$ans,$id]);
		$idsoal = ($id%$this->jmlSoal)+1;
		if($request->input('isijwb') == 'Next'){
			$page = ++$idsoal;
			if($page > $this->jmlSoal) $page = $this->jmlSoal;
			return redirect('edit/'.$page);
		}
		else if($request->input('isijwb') == 'Prev'){
			$page = --$idsoal;
			if($page < 1) $page = 1;
			return redirect('edit/'.$page);
		}
		else{
			return redirect('edit/'.$request->input('isijwb'));
		}
	}
	public function randSoal(){
		
		$soal = $this->jmlSoal;
		$userId = session('user')['id'];
		$termid = session('user')['term_id'];
		$edustage = session('user')['stage_id'];
		DB::update('delete from tr_question where user_id = ?',[$userId]);
		DB::update('insert into tr_question(soal_id,user_id,question,first_opt,second_opt,third_opt,forth_opt,answer,mod_soal,answer_user,time_close) 
		select id, ? ,question,first_option, second_option,third_option, fourth_option,answer, 10,0,DATE_ADD(now(), INTERVAL +2 HOUR) 
		from questions where term_id = ? and educational_stage_id = ? order by rand() limit '.$soal,[$userId,$termid,$edustage]);
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
