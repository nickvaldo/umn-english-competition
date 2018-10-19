<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class QuestionController extends Controller
{
	private $jmlSoal=100;
	public function show($id){
		$num = $this->jmlSoal;
		$edustage = session('user')['stage_id'];
		$termid = session('user')['term_id'];
		$userid = session('user')['id'];
		
		$qst = DB::select('select id, mod(id,'.$num.')+1 as number_soal ,concat(mod(id,'.$num.')+1, ". ", question) as question ,first_opt,second_opt,third_opt,forth_opt,answer_user, soal_id ,time_close 
		from tr_question where mod(id,'.$num.')+1 = ? and user_id = ?
		order by number_soal',[$id, $userid]);
		//var_dump($qst);die;
		$showresult = DB::select('select id, mod(id,'.$num.')+1 as number_soal ,concat(mod(id,'.$num.')+1, ". ", question) as question,answer_user 
		from tr_question 
		where user_id = ? order by number_soal',[$userid]);
		$showtime = DB::select('select test_datetime, tolerance_datetime from terms where id = ? and educational_stage_id = ?',[$termid,$edustage]);
		$countquestion = DB::select("SELECT COUNT(*) AS jml FROM tr_question WHERE user_id = ? AND answer_user != '0' AND answer_user != ''",[$userid]);
		$cekscore = DB::select("SELECT a.test_duration,b.test_datetime,timestampdiff(minute,b.test_datetime,a.test_duration) as abc , points
		FROM institutions as a join terms as b on a.term_id = b.id and a.educational_stage_id = b.educational_stage_id
		where a.id = ? ",[$userid]);
		
		return view('test_page',['quest'=>$qst, 'showresult'=>$showresult, 'showtime'=>$showtime, 'countquestion'=>$countquestion, 'cekscore'=>$cekscore]);
	}
	public function editQst(Request $request, $id){
		//$request->session()->forget('user');
		$ans = $request->input('optradio');
		$userId = session('user')['id'];
		DB::update('UPDATE tr_question set answer_user = ? where id = ?',[$ans,$id]);
		$idsoal = ($id%$this->jmlSoal)+1;
		//Retrieve Current Time
		$current_time = Carbon::now();
		//Update to Login Session
		$success = DB::table('login_sessions')->where('institution_id', $userId)->update([
			'active_at'     => $current_time,
			'active_device' => $request->ip(),
		]);
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
		$seeall = DB::select('select id, term_id, educational_stage_id from institutions');
		foreach($seeall as $s)
		{
			echo $s->id;
			$userId = $s->id;
			$termid = $s->term_id;
			$edustage = $s->educational_stage_id;
			DB::update('delete from tr_question where user_id = ?',[$userId]);
			DB::update('insert into tr_question(soal_id,user_id,question,first_opt,second_opt,third_opt,forth_opt,answer,mod_soal,answer_user,time_close) 
						select id, ? ,question,first_option, second_option,third_option, fourth_option,answer, 10,0,DATE_ADD(now(), INTERVAL +2 HOUR) 
						from questions where term_id = ? and educational_stage_id = ? and deleted != 1  order by rand() limit '.$soal,[$userId,$termid,$edustage]);
		}
	}
	public function score(){
		$userid = session('user')['id'];
		$edustage = session('user')['stage_id'];
		$termid = session('user')['term_id'];
		$current_time = Carbon::now();


		$scr = DB::select("select sum(hasil) as total_score from(
							select case
							when answer = answer_user then 3
							when answer != answer_user then -1
							end as hasil
							from tr_question where user_id = ? and answer_user not in ('0','')) asd",[session('user')['id']]);
		
		foreach($scr as $scoretotal){
			$nilaiscore = $scoretotal->total_score;
			DB::update('UPDATE institutions set test_duration = ? , answered = 1 , points = ? where id = ? and answered = 0',[$current_time,$nilaiscore,$userid]);
		}
		$endquiz = DB::select("SELECT a.test_duration,b.test_datetime,timestampdiff(minute,b.test_datetime,a.test_duration) as abc 
			FROM institutions as a join terms as b on a.term_id = b.id and a.educational_stage_id = b.educational_stage_id
			where a.id = ?",[$userid]);

		return view('score_page',['scores'=>$scr,'timeend'=>$endquiz]);
	}
	public function to(){
		return view('student_page');
	}
}
