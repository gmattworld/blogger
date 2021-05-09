{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $model->id], 'files'=>true, 'class'=>'forms-sample', 'method'=>'POST']) !!}
  @include('incs.message')
  @csrf
  @method('PUT')

  <div class="max-w-4xl px-5 mx-auto 2xl:max-w-7xl" x-data="app()">
    <div class="flex items-center justify-between w-full mb-5">
      <div class="mb-4 text-2xl font-bold">Blog Posts</div>
      <div>
        <a href="{{ url('/admin') }}" class="mx-1 text-sm text-primary-700 hover:underline"><i class="fa fa-home"></i></a> /
        <a href="{{ url('/admin/blog') }}" class="mx-1 text-sm capitalize text-primary-700 hover:underline">Blog Posts</a> /
        <span class="mx-1 text-sm text-gray-400 capitalize cursor-pointer">Create/Edit Post</span>
      </div>
    </div>
    <div class="flex items-stretch gap-5">
      <div class="flex-auto w-full h-full py-5">
        <div>
          {!!
            Form::text('topic', $model->topic ?? '',
            ['class'=>'w-full px-3 py-2 mb-3 text-lg font-bold border-transparent rounded form-input focus:outline-none ring-1 ring-primary-100',
            'required'=>'required', 'placeholder'=>' Title...'])
          !!}
          <span class="text-danger"> {!! $errors->first('topic'); !!} </span>
        </div>
        <div class="bg-white rounded shadow ">
          {!! Form::textarea('body', $model->body ?? '', ['class'=>'w-full h-full', 'id'=>'editor', 'placeholder'=>' What is on your mind?']) !!}
          <span class="text-danger"> {!! $errors->first('body'); !!} </span>
        </div>
      </div>
      <div class="flex-auto w-2/5 h-full mt-5 bg-white">
        <div class="px-3 py-4">
          <div class="mb-3 text-center">
            <div class="relative w-full mx-auto mb-4 bg-gray-100 border shadow-inset">
              <img id="image" class="object-cover w-full rounded" x-show="hasContent" :src="image" />
              <img id="image" class="object-cover w-full rounded" x-show="!hasContent" src="{{ URL::asset('/storage/banners/'. $model->banner) }}" />
            </div>
            <label
              for="fileInput"
              type="button"
              class="inline-flex items-center justify-center w-full px-4 py-2 font-medium text-left text-gray-600 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none hover:bg-gray-100"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 mr-1 -mt-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                <circle cx="12" cy="13" r="3" />
              </svg>
              Browse Photo
            </label>
            <div class="w-full mx-auto mt-1 text-xs text-center text-gray-500">Click to add logo</div>
            <input name="banner" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
              var reader = new FileReader();
              hasContent = true;
              reader.onload = (e) => image = e.target.result;
              reader.readAsDataURL(file);" />
            <span class="text-xs text-red-600"> {!! $errors->first('banner'); !!} </span>
          </div>
        </div>
        <div class="px-3 py-4">
          {!! Form::label('brief', 'Brief', ['class'=>'control-label']) !!}
          {!! Form::textarea('brief', $model->brief ?? '', ['class'=>'w-full h-56 rounded form-textarea focus:outline-none ring-1 ring-primary-700', 'required'=>'required', 'row'=>'4', 'placeholder'=>' short brief']) !!}
          <span class="text-danger"> {!! $errors->first('brief'); !!} </span>
        </div>
        <div class="px-3 py-4">
          {!! Form::label('category', 'Category', ['class'=>'control-label']) !!}
          {!! Form::text('category', $model->category ?? '', ['class'=>'w-full form-input', 'required'=>'required', 'placeholder'=>' Building, Construction']) !!}
          <span class="text-danger"> {!! $errors->first('category'); !!} </span>
        </div>
        <div class="px-3 py-4 text-center">
          {!! Form::submit('Save', ['class'=>'text-white btn bg-primary-500']) !!}
          <a href="{{ url('/admin/blog') }}" class="text-primary-500 btn ring-1 ring-primary-500">Cancel</a>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
