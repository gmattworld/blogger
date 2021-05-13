<x-blogger::layouts.admin>
  <div class="leading-normal tracking-wider">
    <div class="max-w-4xl gap-2 px-5 mx-auto 2xl:max-w-7xl">
      <div class="flex items-center justify-between w-full mb-10">
        <div class="mb-4 text-2xl font-bold">Posts</div>
        <div>
          <a href="{{ url('/admin') }}" class="mx-1 text-sm text-gray-700 hover:underline"><i class="fa fa-home"></i></a> /
          <a href="{{ url('/admin/blogger') }}" class="mx-1 text-sm text-gray-700 capitalize hover:underline">Posts</a> /
          <span class="mx-1 text-sm text-gray-400 capitalize cursor-pointer">Post Details</span>
        </div>
      </div>

      <x-blogger::admin.post :model='$model' />

      
    </div>
  </div>

  @push('styles')
    <link rel="stylesheet" href="{!! asset('css/prism.css') !!}">
  @endpush

  @push('scripts')
    <script src="{!! asset('js/prism.js') !!}"></script>
  @endpush
</x-blogger::layouts.admin>
