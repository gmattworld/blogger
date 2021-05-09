<div class="flex items-stretch gap-5">
  <div class="flex-auto w-full h-full py-5">
    <div class="w-full px-3 py-2 mb-3 text-lg font-bold">
      {!! $model->topic !!}
    </div>
    <article class="px-4 py-5 text-base text-gray-500 bg-white rounded shadow">
      {!! $model->body !!}
    </article>
  </div>
  <div class="flex-auto w-2/5 h-full mt-5 bg-white">
    <div class="px-3 py-4">
      <div class="mb-3 text-center">
        <figure class="relative w-full mx-auto mb-4 bg-gray-100 border shadow-inset">
          <img class="card-img-top" src="{{ URL::asset('/storage/banners/'. $model->banner) }}" alt="{{ $model->topic }}">
        </figure>
      </div>
    </div>
    <div class="px-3 py-4">
      <strong class="mb-1 text-base text-gray-600 underline">Summary</strong>
      <summary class="text-gray-500 list-none"> {{ $model->brief }} </summary>
    </div>
    <div class="px-3 py-4">
      <strong class="mb-1 text-base text-gray-600 underline">Category</strong>
      <p class="text-gray-600"> {{ $model->category }} </p>
    </div>
    <div class="px-3 py-4 text-center">
      {!! Form::open(['action' => ['Gmattworld\Blogger\Http\Controllers\BloggerAdminController@destroy', $model->id]]) !!}
        <a href="{{ url('/admin/blogger/'. $model->id .'/edit') }}" class="text-sm py-1.5 px-4 rounded text-white bg-gray-500">Edit</a>
        @csrf
        @method('DELETE')
        {!! Form::submit('Delete', ['class'=>'text-red-500 py-1.5 px-4 rounded ring-1 ring-red-500 hover:text-white hover:bg-red-600 text-sm']) !!}
      {!! Form::close() !!}
    </div>
  </div>
</div>