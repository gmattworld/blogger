<aside class="flex-grow-0 flex-shrink-0 hidden min-h-screen md:block w-52">
  <div class="relative h-full bg-gray-700">
    <div class="fixed top-0 z-50 content-between h-screen w-52">
      <nav class="py-3" style="height: calc(100vh - 17rem)">
        <div class="">
          <ul class="block list-none">
            <li class="mb-2">
              <a class="text-gray-50" href="{{ URL('/admin/blogger') }}">
                <div class="w-40 py-2 pl-5 font-semibold rounded-r-full hover:bg-gray-400 hover:text-white">
                  BLOGGER
                </div>
              </a>
            </li>
            <li>
              <div class="my-5 border-t border-gray-200"></div>
            </li>
            <li class="mb-2">
              <a class="text-gray-50" href="{{ URL('/admin/blogger') }}">
                <div class="{{ (request()->is('admin/blogger*')) ? 'bg-gray-400 border-b-2 text-white border-gray-100' : '' }} w-40 py-2 pl-5 font-semibold rounded-r-full hover:bg-gray-400 hover:text-white">
                  Posts
                </div>
              </a>
            </li>
            {{-- <li class="mb-2">
              <a class="text-gray-50" href="{{ URL('/admin/clients') }}">
                <div class="{{ (request()->is('admin/clients*')) ? 'bg-gray-400 border-b-2 text-white border-gray-100' : '' }} w-40 py-2 pl-5 font-semibold rounded-r-full hover:bg-gray-400 hover:text-white">
                  Category
                </div>
              </a>
            </li> --}}
          </ul>
        </div>
      </nav>
    </div>
  </div>
</aside>
