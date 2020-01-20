<?php

namespace :uc:vendor\:uc:package\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SamplesController extends Controller
{
  /**
  * Sample
  *
  * @param Request $request
  *
  * @return Response
  */
  public function sample(Request $request)
  {
    // random data
    $items = [
      rand(1, 10),
      rand(50, 500),
      rand(100, 150000),
      rand(10, 999),
      rand(100, 9999)
    ];

    // package info
    $vendor = ':lc:vendor';
    $package = ':lc:package';

    return $this->renderUiView('samples/sample', compact('items', 'package', 'vendor'));
  }
}
