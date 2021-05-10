<?php

namespace Gmattworld\Blogger\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmattworld\Blogger\Models\Posts;

class BloggerController extends Controller
{
  public function posts()
  {
    $posts = Posts::where('status', true)->orderBy('created_at', 'desc')->paginate(9);
    return view('blogger::posts', ['model' => $posts]);
  }

  public function post(string $id)
  {
    $entity = Posts::findOrFail($id);
    return view('blogger::post', ['model'=>$entity]);
  }
}
