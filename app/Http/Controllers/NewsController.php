<?php

namespace App\Http\Controllers;

use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function ShowNews()
    {
        $page = 'news';
        $News = News::all();
        return view('news', compact('News', 'page'));

    }

    public function ShowNew($id)
    {
        $Newsid = News::where('id', '=', $id)->get();
        $page = 'news';
        $News = News::all();
        return view('newsOn', compact('News', 'page', 'Newsid'));

    }

    public function destroy($id)
    {
        $NewsAll = News::all();
        $News = News::find($id);
        $News->delete();
        return redirect('news');
    }


    public function update(Request $request, $id)
    {
        $News = News::find($id);

        $News->date = $request->date;
        $News->short_description = $request->short_description;
        $News->full_text = $request->full_text;


        //upload new image from edit form
        $fname = $request->file('image');
        if ($fname != null) {
            $originalname = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images', $originalname);
            $News->imagesPath = '/images/' . $originalname;
        }
        $News->save();

        return redirect('news/' . $id);

    }

    public function edit($id)
    {
        $block = News::find($id);
        $Newsid = News::where('id', '=', $id)->get();
        $News = News::all();

        return view('AddNew', [
            'page' => 'Edit New',
            'News' => $News,
            'id' => $id,
            'newsid' => $Newsid,
            'block' => $block,
        ]);
    }

    public function create()
    {
        $id = 0;
        $News = new News;
        // $category = Categories::pluck('name_category', 'id');
        $Page = 'AddNew';
        return view('AddNew', ['News' => $News, 'page' => $Page, 'id' => $id,]);
    }

    public function store(Request $request)
    {
        $News = new News;
        $request->validate(['short_description' => ['required', 'min:3', 'max:150'], 'full_text' => ['required', 'min:3', 'max:500'], 'image' => ['image']]);

        $fname = $request->file('image');

        if ($fname != null) {
            $originalname = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images', $originalname);
            $News->imagesPath = '/images/' . $originalname;
        } else {
            false;
        }

        $News->date = $request->date;
        $News->short_description = $request->short_description;
        $News->full_text = $request->full_text;
       



        if (!$News->save()) {
            $err = $News->getErrors();
            return redirect()->
                action('App\Http\Controllers\NewsController@create')->with('errors', $err)->withInput();
        }



        return redirect()->action('App\Http\Controllers\NewsController@create')->with('message', 'Add News' . $News->short_description. ' has been added with id=' . $News->id . '!');
        //if saving to DB table failed
    }
}