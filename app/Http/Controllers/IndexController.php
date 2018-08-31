<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article; // Подключаем модель Article

class IndexController extends Controller
{

	protected $message;
	protected $header;

	public function __construct(){
		$this->header = "Hello WORLD!!!!";
		$this->message = 'This is a template for a simple marketing or
						informational website. It includes a large callout
						called a jumbotron and three supporting pieces of content.
						Use it as a starting point to create something more unique.';
	}

	public function index(){

		// $articles = Article::all(); // Возвращает выборку всех записей из таблицы articles; Возвращает тип данных collection

		$articles = Article::select( ['id', 'title', 'description'] )->get(); // Возвращает выборку записей из таблицы articles с отобрадением указанных колонок; Возвращает тип данных collection

		return view( 'page' )->with(['message' => $this->message,
									'header' => $this->header,
									'articles' => $articles
									]);
	}

	public function show( $id )
	{
		// $article = Article::find( $id );
		$article = Article::select( ['id', 'title', 'text'] )->where( 'id', $id )->first();

		return view( 'article-content' )->with(['message' => $this->message,
												'header' => $this->header,
												'article' => $article
												]);
	}

	public function add()
	{
		return view( 'add-content' )->with(['message' => $this->message,
											'header' => $this->header
											]);
	}

	public function store( Request $request )
	{

		$this->validate( $request, [
						"title"	=> "required|max:255",
						"alias"	=> "required|unique:articles,alias",
						"text"	=> "required"
						] );

		$data = $request->all(); // данные после заполнения

		$article = new Article; // "пустая" модель

		$article->fill( $data ); // "заполненая" модель

		$article->save();

		return redirect( '/' );
	}

	// public function delete( $article ){
	public function delete( \App\Article $article ){

		// $article_tmp = \App\Article::where( 'id', $article )->first();
		// $article_tmp->delete();
		$article->delete();
		return redirect( '/' );
	}
}
