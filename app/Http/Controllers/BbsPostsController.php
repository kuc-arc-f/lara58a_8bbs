<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use App\BbsCategory;
use App\BbsPost;
use App\BbsAnswer;

//
class BbsPostsController extends Controller
{
	/**************************************
	 *
	 **************************************/
	public function __construct()
	{
		$this->middleware('auth');
		$this->TBL_LIMIT = 20;
		$this->SEARCH_TBL_LIMIT = 100;
	}    
	/**************************************
	 *
	 **************************************/
	public function index()
	{
		$bbs_posts = BbsPost::orderBy('id', 'desc')->paginate( $this->TBL_LIMIT );
		return view('bbs_posts/index')->with(compact('bbs_posts' ) );		
	}
    /**************************************
     *
     **************************************/
    public function search_index(Request $request){
        $data = $request->all();  
        $params = $data;   
        $bbs_posts = BbsPost::orderBy('id', 'desc')
        ->where("title", "like", "%" . $data["title"] . "%" )
        ->paginate($this->SEARCH_TBL_LIMIT);
//debug_dump( $data );        
        return view('bbs_posts/index')->with(compact('bbs_posts' ,'params') );
    }	
	/**************************************
	 *
	 **************************************/
	public function create()
	{
		/*
        $bbs_categories= BbsCategory::orderBy('id', 'asc')
        ->get();
        $bbs_categories = array_pluck($bbs_categories, 'name', 'id');
		*/
//debug_dump($bbs_categories );
//exit();
		$bbs_post = new BbsPost();
		return view('bbs_posts/create')->with( compact('bbs_post' ) );
	}	
	/**************************************
	 *
	 **************************************/    
	public function store(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$inputs["user_id"] = $user_id;
		$inputs["display"] = 1;
//debug_dump($inputs );
//exit();
		$bbs_post = new BbsPost();
		$bbs_post->fill($inputs);
		$bbs_post->save();
		session()->flash('flash_message', 'Completed, new post');
		return redirect()->route('bbs.index');
	}  
	/**************************************
	 *
	 **************************************/   
	public function confirm(Request $request){
		$data = $request->all();
//debug_dump($data );
//exit();
		$bbs_post = new BbsPost();
		$bbs_post->fill($data);
		return view('bbs_posts/confirm')->with( compact('bbs_post' ) );
	} 


    /**************************************
     *
     **************************************/
    public function show($id)
    {
		$user_id = Auth::id();
		$bbs_post = BbsPost::find($id);
		$bbs_answer = new BbsAnswer();

		$bbs_answers = BbsAnswer::select([
			'bbs_answers.id',
			'bbs_answers.user_id',
			'bbs_answers.content',
			'bbs_answers.created_at',
			'users.name as user_name',
			])
			->join('users','users.id','=','bbs_answers.user_id')
			->where('bbs_answers.bbs_post_id', $id )
			->orderBy('id', 'desc')
			->skip(0)->take($this->TBL_LIMIT)
			->get();
//debug_dump($bbs_answers);
//exit();
		return view('bbs_posts/show')->with(
			 compact('bbs_post', 'bbs_answer' ,'bbs_answers',
			 'user_id')
		);
    }	  	    
	/**************************************
	 *
	 **************************************/
	public function edit($id)
	{
		$bbs_post = BbsPost::find($id);
		return view('bbs_posts/edit')->with('bbs_post', $bbs_post );
	}
	/**************************************
	 *
	 **************************************/
    public function update(Request $request, $id)
    {
        $bbs_post = BbsPost::find($id);
        $bbs_post->fill($request->all());
        $bbs_post->save();
        return redirect()->route('bbs.index');
    }

}
