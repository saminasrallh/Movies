<?php

namespace App\Http\Controllers;

use App\movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = movie::get();
        return view('home')->with('moviedata', $data);
    }

    public function deletemovie($id)
    {
        movie::find($id)->delete();
        return redirect('home');
    }

    public function create()
    {

        return view('create');
    }

    public function save(Request $request)
    {


        $valid = Validator::make($request->all(), movie::GetValidationRulesForMovie(null,true,true), movie::GetValidationMessagesForMovies());

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        }

        $Thumbnail = $request->file('thumpnail');
        $thumpnailName = time() . "_" . $Thumbnail->getClientOriginalName();
        $Thumbnail->move('Uploads', $thumpnailName);


        $Video = $request->file('video');
        $VideoName = time() . "_" . $Video->getClientOriginalName();
        $Video->move('Uploads', $VideoName);

        movie::create([
            'title' => $request->title,
            'Release_date' => $request->Release_date,
            'genre' => $request->genre,
            'price' => $request->price,
            'rating' => $request->rating,
            'thumpnail' => $thumpnailName,
            'video' => $VideoName

        ]);
        return redirect('home');
    }

    public function update($id)
    {
        $mov = movie::find($id);
        if ($mov == null) {
            return redirect('home');
        }

        return view('update')->with('mov', $mov);
    }

    public function mov(Request $request, $id)
    {
        if ($request->hasFile("thumpnail")) {
            $v_thumpnail = true;
        } else {
            $v_thumpnail = false;
        }


        if ($request->hasFile("video")) {
            $v_video = true;
        } else {
            $v_video = false;
        }


        $valid = Validator::make($request->all(), movie::GetValidationRulesForMovie($id, $v_video, $v_thumpnail), movie::GetValidationMessagesForMovies());

        if ($valid->fails()) {
            return redirect()->route('update', ['id' => $id])->withErrors($valid)->withInput();
        }


        $VideoName = $request->Hidden_vid;
        if ($request->hasFile("video")) {
            $Video = $request->file('video');
            $VideoName = time() . "_" . $Video->getClientOriginalName();
            $Video->move('Uploads', $VideoName);
        }

        $thumpnailName = $request->Hidden_img;
        if ($request->hasFile("thumpnail")) {
            $Thumbnail = $request->file('thumpnail');
            $thumpnailName = time() . "_" . $Thumbnail->getClientOriginalName();
            $Thumbnail->move('Uploads', $thumpnailName);
        }

        movie::find($id)->update(
            [
                'title' => $request->title,
                'Release_date' => $request->Release_date,
                'genre' => $request->genre,
                'price' => $request->price,
                'rating' => $request->rating,
                'thumpnail' => $thumpnailName,
                'video' => $VideoName

            ]);


        return redirect('home');

    }




    /*
     *
     * */




    public function show($id)
    {
        $show = movie::find($id);
        if ($show == null) {
            return redirect('home');
        }


        return view('show')->with('show', $show);

    }
}
