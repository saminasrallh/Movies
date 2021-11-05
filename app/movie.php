<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $fillable = ['title','Release_date','genre','price','rating','thumpnail','video'];
    protected $dates = ['Release_date'];


    public static function GetValidationMessagesForMovies(): array
    {
        return [

            'title.required' => __('validation.Movierequired'),
            'title.unique' => __('validation.Movieunique'),
            'Release_date.required' => __('validation.Movierequired'),
            'Release_date.date_format' => __('validation.Moviedate_format'),
            'genre.required' => __('validation.Movierequired'),
            'genre.regex' => __('validation.MovieregexLetters'),
            'price.required' => __('validation.Movierequired'),
            'price.numeric' => __('validation.MovierNumber'),
            'rating.required' => __('validation.Movierequired'),
            'thumpnail.required' => __('validation.Movierequired'),
            'thumpnail.mimes' => __('validation.MovieImage'),
            'video.required' => __('validation.Movierequired'),
            'video.mimes' => __('validation.MovieVideo'),

        ];
    }

    public static function GetValidationRulesForMovie($Id, $IsVideoFilled, $IsThumpnailFilled): array
    {
        if ($IsVideoFilled == true && $IsThumpnailFilled == true) {
            return [
                'title' => 'required|unique:movies,title,' . $Id,
                'Release_date' => 'required|date_format:Y-m-d',
                'genre' => 'required|regex:/^[a-zA-Z]+$/u',
                'price' => 'required|numeric',
                'rating' => 'required',
                'thumpnail' => 'required|mimes:jpeg,jpg,png',
                'video' => 'required|mimes:mp4',
            ];

        } elseif ($IsVideoFilled == true && $IsThumpnailFilled == false) {
            return [
                'title' => 'required|unique:movies,title,' . $Id,
                'Release_date' => 'required|date_format:Y-m-d',
                'genre' => 'required|regex:/^[a-zA-Z]+$/u',
                'price' => 'required|numeric',
                'rating' => 'required',
                'video' => 'required|mimes:mp4',
            ];
        } elseif ($IsThumpnailFilled == true && $IsVideoFilled==false) {
            return [
                'title' => 'required|unique:movies,title,' . $Id,
                'Release_date' => 'required|date_format:Y-m-d',
                'genre' => 'required|regex:/^[a-zA-Z]+$/u',
                'price' => 'required|numeric',
                'rating' => 'required',
                'thumpnail' => 'required|mimes:jpeg,jpg,png'
            ];
        } else {
            return [
                'title' => 'required|unique:movies,title,' . $Id,
                'Release_date' => 'required|date_format:Y-m-d',
                'genre' => 'required|regex:/^[a-zA-Z]+$/u',
                'price' => 'required|numeric',
                'rating' => 'required',
            ];
        }
    }
}
