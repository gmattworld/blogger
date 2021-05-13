{{-- @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="text-center alert alert-danger">
            <button class="close" data-close="alert"></button>
            {!! $error !!}
        </div>
    @endforeach
@endif --}}
<div  x-data="{toggle: true}">
@if(session('success'))
  <div class="relative px-6 py-4 mb-4 text-white bg-gray-500 border-0 rounded" @click.away="toggle = false" x-show="toggle">
    <span class="inline-block mr-5 text-xl align-middle">
      <i class="fa fa-bell"></i>
    </span>
    <span class="inline-block mr-8 align-middle">
      <b class="capitalize">Success!</b> {!! session('success') !!}
    </span>
    <button @click="toggle = false" class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endif

@if(session('error'))
  <div class="relative px-6 py-4 mb-4 text-white bg-red-500 border-0 rounded" x-show="toggle" @click.away="toggle = false">
    <span class="inline-block mr-5 text-xl align-middle">
      <i class="fa fa-bell"></i>
    </span>
    <span class="inline-block mr-8 align-middle">
      <b class="capitalize">Error!</b> {!! session('error') !!}
    </span>
    <button @click="toggle = false" class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endif
</div>
