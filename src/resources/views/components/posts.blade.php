@if(count($model) > 0)
<!--{!! $count = 0 !!}-->
<div class="grid justify-around grid-cols-1 gap-8 md:grid-cols-3">
  @foreach($model as $item)
    <div class="flex flex-col justify-between leading-normal bg-white rounded-b shadow-lg lg:rounded-b-none lg:rounded-r">
      <div class="overflow-hidden h-52">
        <img src="{{ asset('/storage/banners/'. $item->banner) }}" class="w-full mb-3">
      </div>
      <div class="p-4 pt-2">
        <a href="{{ url('/blog/'.$item->id) }}" class="inline-block mb-2 text-lg font-bold text-gray-900 hover:text-primary-600">{!! $item->topic !!}</a>
        <div class="mb-5">
          <p class="text-sm text-justify text-gray-700">{!! $item->brief !!}</p>
        </div>
        <div class="flex items-center pt-3 border-t border-gray-200">
          <div class="text-sm">
            <div class="font-bold uppercase text-md">{!! $item->user->name !!}</div>
            <p class="text-sm text-gray-600">Published on <span class="font-semibold">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span></p>
            <div class="">{!! $item->category !!}</div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="mt-7">{{ $model->links() }}</div>
@else
  <div class="w-full h-full mt-0">
    <img src="{!! asset('assets/images/no_content.svg') !!}" alt="" class="object-contain object-center m-auto h-60" />
    <p class="text-center">No content found!</p>
  </div>
@endif
