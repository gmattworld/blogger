<?php

namespace Gmattworld\Blogger\View\Components\layouts;

use Illuminate\View\Component;

class Admin extends Component
{
  public $model;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($model)
  {
    $this->model = $model;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
      return view('blogger::components.layouts.admin');
  }
}
