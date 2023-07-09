<?php

namespace App\Http\Controllers;

use App\Models\Listener;
use App\Models\Surah;
use Illuminate\Http\Request;

class ListenerController extends Controller
{

    public function index($surah_name)
    {
        // $surah = Surah::take('surah_name')->get();
        $listeners = Listener::where('surah' , $surah_name)->get();
        return view('home.sound',compact('listeners'));
    }   


    // show page add listener
    public function listeners()
    {
        // $listener = Listener::all();
        $surahs = Surah::all();
        return view('dashboard.listener.listeners' , compact('surahs'));
    }

    // store listener
    public function add_listener(Request $request)
    {
        $listener = new Listener();
        $listener->text_arabic=$request->arabic;
        $listener->text_english=$request->english;
        $listener->number=$request->number;
        $listener->surah=$request->surah;

        $audio=$request->audio;
        $audioname=time().'.'.$audio->getClientOriginalExtension();
        $request->audio->move('audios',$audioname);
        $listener->audio=$audioname;
        
        $listener->save();


        return redirect()->back()->with('message','تمت إضافة الآيه بنجاح');
    }

    // show all listeners
    public function all_listeners()
    {

        $listeners = Listener::get();

        return view('dashboard.listener.all_listeners' , compact('listeners'));
    }

    // delete listener
    public function listener_destroy($id)
    {
        Listener::destroy($id);

        return redirect()->back()->with('message','تمت حذف الايه بنجاح');
    }

    // edit listener
    public function listener_edit($id)
    {
        $listener = Listener::findorFail($id);
        $surahs = Surah::all();


        return view('dashboard.listener.edit_listeners',compact('listener','surahs'));

        // return $id;
    }

    //update listener
    public function listener_update(Request $request, $id)
    {
        $listener=Listener::findOrFail($id);
    
        $listener->text_arabic=$request->arabic;
        $listener->text_english=$request->english;
        $listener->number=$request->number;
        $listener->surah=$request->surah;

        $audio=$request->audio;
        $audioname=time().'.'.$audio->getClientOriginalExtension();
        $request->audio->move('audios',$audioname);
        $listener->audio=$audioname;

        $listener->save();

        return redirect()->route('all_listeners')->with('message','تم تعديل الايه بنجاح');
    }







    // search for ayat
    public function search_ayat(Request $request)
    {
        
        $searchText = $request->search;
        // $books = Book::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"%$searchText%")->paginate(9);
        $listeners = Listener::where('text_arabic','LIKE',"%$searchText%")->orWhere('text_english','LIKE',"%$searchText%")->get();
        // $wisdom = Wisdom::orderByRaw('RAND()')->take(1)->get();

        // $categories = category::all();
        // dd($listeners);
        return view('home.sound',compact('listeners'));
    }

    // download pdf
    // public function download_pdf($id)
    // {
    //     $book = Book::findorFail($id);
        
    //     $path = public_path('pdfs/' . $book->pdf);

    //     return response()->download($path);
    // }
}
