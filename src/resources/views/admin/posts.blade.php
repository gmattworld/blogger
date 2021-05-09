<x-blogger::layouts.admin>
  <div class="leading-normal tracking-wider">
    <div class="max-w-4xl gap-2 px-5 mx-auto 2xl:max-w-7xl">
      <div class="flex items-center justify-between w-full mb-10">
        <div class="mb-4 text-2xl font-bold">Posts</div>
        <a class="px-3 py-2 text-white bg-gray-500 rounded" href="{{ url('/admin/blogger/create') }}"> <i class="fa fa-plus"></i> Create Post</a>
      </div>

      <x-blogger::admin.posts :model='$model' />

    </div>
  </div>



  @push('styles')

  @endpush

  @push('scripts')

  @endpush
</x-blogger::layouts.admin>
