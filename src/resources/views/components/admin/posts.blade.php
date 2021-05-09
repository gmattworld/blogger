{{-- @include('incs.message') --}}
@if(count($model) > 0)
  <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
    <!--{!! $count = 0 !!}-->
    @foreach($model as $item)
      <div class="flex flex-col justify-between leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
        <div class="overflow-hidden h-52">
          <img src="{{ URL::asset('/storage/banners/'. $item->banner) }}" class="w-full mb-3">
        </div>
        <div class="p-4 pt-2">
          <div class="mb-8">
            <p class="flex items-start text-sm text-gray-600">
              <svg class="w-3 h-3 mr-2 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
              </svg>
              {!! $item->category !!} ({{ $item->status ? 'Published' : 'Draft' }})
            </p>
            <a href="{{ url('/admin/blogger/'.$item->id) }}" class="inline-block mb-2 text-lg font-bold text-gray-900 hover:text-indigo-600">{!! $item->topic !!}</a>
            <p class="text-sm text-gray-700">{!! $item->brief !!}</p>
          </div>
          <div class="flex items-center">
            <div class="text-sm">
              <p class="text-gray-600">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@else
  <div class="w-full h-full mt-32">
    <svg class="object-contain object-center m-auto text-gray-300 fill-current h-72" enable-background="new 0 0 56.724 56.724" version="1.1" viewBox="0 0 56.724 56.724" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path d="m7.487 46.862c1.111 1.467 2.865 2.275 4.938 2.275h30.598c3.984 0 7.934-3.009 8.991-6.849l4.446-16.136c0.55-1.997 0.237-3.904-0.88-5.371-1.118-1.467-2.873-2.274-4.945-2.274h-3.044l-0.667-2.65c-0.692-2.759-4.368-4.919-8.367-4.919h-11.24c-2.932 0-4.935-0.6-5.413-0.94-1.259-2.292-6.867-2.41-8-2.41h-7.27c-2.036 0-3.845 0.798-5.093 2.249-1.248 1.45-1.769 3.356-1.448 5.467l6.338 29.047c0.141 0.917 0.495 1.771 1.056 2.511zm45.706-24.263c0.537 0.705 0.669 1.684 0.374 2.756l-4.445 16.137c-0.693 2.518-3.486 4.646-6.099 4.646h-30.598c-1.112 0-2.016-0.386-2.547-1.086-0.531-0.701-0.657-1.676-0.356-2.746l3.057-10.858c0.709-2.518 3.518-4.646 6.133-4.646h9.751c3.51 0 7.461-1.271 8.219-3.695 0.196-0.479 2.256-1.6 5.359-1.6h8.593c1.115 0 2.023 0.388 2.559 1.092zm-49.378-10.807c0.669-0.777 1.671-1.206 2.82-1.206h7.27c2.932 0 4.935 0.6 5.413 0.941 1.26 2.292 6.866 2.41 7.999 2.41h11.241c2.743 0 5.144 1.399 5.458 2.65l0.482 1.919h-2.456c-3.511 0-7.461 1.271-8.219 3.695-0.197 0.479-2.257 1.6-5.359 1.6h-9.751c-3.979 0-7.942 3.001-9.021 6.832l-1.793 6.371-4.857-22.246c-0.171-1.135 0.104-2.189 0.773-2.966z" />
    </svg>

    <p class="text-center">No blog post has been created yet. Click <a class="px-2 py-0.5 rounded text-white bg-gray-700" href="{{ url('/admin/bloger/create') }}">here</a> to create one.</p>
  </div>
@endif
