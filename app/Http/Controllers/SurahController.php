<?php

namespace App\Http\Controllers;

use App\Models\Listener;
use App\Models\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function index()
    {
        $ayats = Listener::orderByRaw('RAND()')->take(1)->get();
        $surahs = Surah::all();
        return view('home.home',compact('surahs','ayats'));
    }
    
    public function show_add_surah()
    {
        
        return view('dashboard.surah.surah');
    }

    // store surah
    public function add_surah(Request $request)
    {
        $surah = new Surah();
        $surah->surah_number=$request->number;
        $surah->surah_name=$request->name;
        
        $surah->save();

        return redirect()->back()->with('message','تمت إضافة السورة بنجاح');
    }


    // show all surahs
    public function surahs()
    {
        $surahs = Surah::all();

        return view('dashboard.surah.all',compact('surahs'));
    }


    //delete surah
    public function surah_destroy($id)
    {
        Surah::destroy($id);

        return redirect()->back()->with('message','تمت الحذف بنجاح');
    }

    // edit surah
    public function surah_edit($id)
    {
        $surah = Surah::findorFail($id);

        return view('dashboard.surah.edit',compact('surah'));

        // return $id;
    }

    // update surah
    public function surah_update(Request $request, $id)
    {
        $surah = Surah::findOrFail($id);
        $surah->surah_number=$request->number;
        $surah->surah_name=$request->name;

        $surah->save();

        return redirect()->route('all_surahs')->with('message','تم التعديل بنجاح');
    }


    // search for surah
    public function search_surahs(Request $request)
    {
        $ayats = Listener::orderByRaw('RAND()')->take(1)->get();
        
        $searchText = $request->search;

        $surahs = Surah::where('surah_name','LIKE',"%$searchText%")->get();

        return view('home.home',compact('surahs','ayats'));
    }


}
