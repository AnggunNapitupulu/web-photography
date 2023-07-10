<?php

namespace App\Http\Controllers;

use App\Models\CatGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatGalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=camera&client_id=' . env('UNSPLASH_ACCESS_KEY');
    // $object = Http::get($url)->object();
    // dd($object);

    $categories = new CatGallery();

    return view(
      'admin.catgallery',
      [
        'categories' =>  $categories->all(),
        'title' => "Category Gallery",
      ],
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\CatGallery  $catGallery
   * @return \Illuminate\Http\Response
   */
  public function show(CatGallery $catGallery)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\CatGallery  $catGallery
   * @return \Illuminate\Http\Response
   */
  public function edit(CatGallery $catGallery)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\CatGallery  $catGallery
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CatGallery $catGallery)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\CatGallery  $catGallery
   * @return \Illuminate\Http\Response
   */
  public function destroy(CatGallery $catGallery)
  {
    //
  }
}
