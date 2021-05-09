<div class="items-stretch gap-5">
  <div class="w-full h-full py-5">
    <figure class="block w-full mx-auto mb-4">
      <img class="object-contain object-center mx-auto" src="{{ asset('/storage/banners/'. $model->banner) }}" alt="{{ $model->topic }}">
    </figure>
    <h1 class="w-full py-2 mb-3 text-4xl font-bold">
      {!! $model->topic !!}
    </h1>
    <div class="my-5 border-t border-b border-gray-200">
      <div class="py-4 pl-12">
        <div class="text-lg font-bold uppercase">{!! $model->user->name !!}</div>
        <div class="">Published on <span class="font-semibold">{{ \Carbon\Carbon::parse($model->created_at)->format('M d, Y') }}</span></div>
        <div class="">{!! $model->category !!}</div>
      </div>
    </div>
    <article class="py-5 text-lg leading-relaxed text-justify">
      {!! $model->body !!}
    </article>
  </div>
</div>
