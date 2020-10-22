<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function showNews()
    {
        /*Mark news as read*/
        $news_count = Information::all()->count();
        Auth::user()->update([
            'read_news' => $news_count
        ]);


        $news = Information::all()->sortByDesc('id')->paginate(20);
        return view('news.show-news', compact('news'));
    }

    public function singleNews($news_token)
    {
        $single_news = Information::where('token', $news_token)->first();
        if (!$single_news){
            return redirect()->back()->with('danger', 'News not found');
        }
        return view('news.single-news', compact('single_news'));
    }

    public function createNews()
    {
        return view('admin.news.create-news');
    }

    public function saveNews(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:4000'],
        ]);

        if (Auth::user()->role == 'ceo'){
            Information::create([
                'title' => $request->title,
                'body' => $request->body,
                'is_ceo_news' => true,
                'token' => Str::random(40),
            ]);
        }else{
            Information::create([
                'title' => $request->title,
                'body' => $request->body,
                'is_ceo_news' => false,
                'token' => Str::random(40),
            ]);
        }

        return redirect()->back()->with('success', 'News sent successfully');
    }

    public function adminShowNews()
    {
        /*Mark news as read*/
        $news_count = Information::all()->count();
        Auth::user()->update([
            'read_news' => $news_count
        ]);


        $news = Information::all()->sortByDesc('id')->paginate(20);
        return view('news.show-news-admin', compact('news'));
    }

    public function adminSingleNews($news_token)
    {
        $single_news = Information::where('token', $news_token)->first();
        if (!$single_news){
            return redirect()->back()->with('danger', 'News not found');
        }
        return view('news.single-news-admin', compact('single_news'));
    }

    public function updateNews(Request $request, $news_token)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:4000'],
        ]);
        $news = Information::where('token', $news_token)->first();
        if (!$news){
            return redirect()->back()->with('danger', 'News not found');
        }
        $news->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->back()->with('success', 'News updated successfully');
    }


}
