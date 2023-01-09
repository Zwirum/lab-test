<?php

namespace App\Http\Controllers;

use App\News;
use App\Tags;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(Request $request)
    {
        if (!empty($search = $request->input('search') ?? '')) {
            $news = News::where('id', $search)
                ->orWhere('title', 'LIKE', "%$search%")
                ->get();
        } else {
            $news = News::all();
        }
        return view('news.list', compact('news', 'search'));
    }

    public function createPage()
    {
        return view('news.create', ['tags' => Tags::all()]);
    }

    public function getNewsItem($id)
    {
        return view('news.item', ['item' => News::find($id)]);
    }

    public function create(Request $request)
    {
        $new = new News();
        $new->title = $request->input('title');
        $new->anons = $request->input('anons');
        $new->text = $request->input('text');
        $new->publish_date = now();
        $new->save();

        $new->tags()->attach($request->input('tags'));

        return redirect()->route('news-item', ['id' => $new->id]);
    }

    public function delete($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('news');
    }
}
