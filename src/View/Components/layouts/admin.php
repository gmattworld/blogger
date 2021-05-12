<?php

namespace Gmattworld\Blogger\View\Components\layouts;

use Illuminate\View\Component;

class Admin extends Component
{
  public function __construct()
  {

  }


  /**
   * Get the view / contents that represents the component.
   *
   * @return \Illuminate\View\View
   */
  public function render()
  {
      return view('blogger::layouts.admin');
  }
}
