<header class="fixed top-0 z-50 hidden w-full bg-white md:block" style="width: calc(100% - 13rem)">
  <div class="flex items-center justify-between w-full p-4 pb-4 border-b shadow-lg">
    <div class="w-full">
      <div class="z-50 flex content-between">
        <nav class="flex-1 w-1/3 text-right md:w-2/3">
          <div class="">
            <ul class="inline-flex gap-2 list-none">
              <li class="">
                <a class="px-3 py-2 text-2xl font-semibold text-gray-700 hover:text-gray-200 focus:outline-none" href="{{ URL('/admin/notifications') }}">
                  <i class="fa fa-bell-o"></i>
                </a>
              </li>
              <li class="">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="px-3 py-2 font-semibold text-gray-700 border border-gray-700 rounded focus:outline-none hover:text-gray-200 hover:border-gray-200">
                    Log out
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<header class="fixed top-0 z-50 w-full bg-white md:hidden" x-data="{navigationOpen: false}">
  <div class="flex items-center justify-between w-full p-4 pb-4 border-b shadow-lg">
    <div class="w-full">
      <div class="z-50 flex content-between">
        <div class="flex-auto w-full h-full my-auto md:w-1/3">
          BLOGGER
        </div>
        <nav class="flex-1 w-1/3 text-right md:w-2/3">
          <div class="block text-right md:hidden">
            <button class="flex flex-col flex-wrap justify-center w-6 h-8 space-y-1 focus:outline-none" @click="navigationOpen = !navigationOpen">
              <span class="w-6 h-1 bg-gray-600 rounded" x-show.transition="!navigationOpen"></span>
              <span class="w-6 h-1 bg-gray-600 rounded"></span>
              <span class="w-6 h-1 bg-gray-600 rounded" x-show.transition="!navigationOpen"></span>
            </button>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <div class="absolute left-0 z-30 w-full h-full md:hidden top-16" @click.away="navigationOpen = false" x-show="navigationOpen" x-transition:enter-start="opacity-0 lg:scale-75" x-transition:enter-end="opacity-100 lg:scale-100" x-transition:leave-start="opacity-100 lg:scale-100" x-transition:leave-end="opacity-0 lg:scale-75">
    <div class="py-5 text-center bg-white">
      <ul class="block list-none ">
        <li class="mb-5">
          <a class="{{ (request()->is('admin/blogger*')) ? 'border-b-2 border-gray-900' : '' }} px-3 py-2 pb-1 hover:bg-gray-50 hover:font-semibold hover:border-b-2 hover:border-gray-900" href="{{ URL('/admin/blogger') }}">
            Posts
          </a>
        </li>
        {{-- <li class="mb-5">
          <a class="{{ (request()->is('admin/clients*')) ? 'border-b-2 border-gray-900' : '' }} px-3 py-2 pb-1 hover:bg-gray-50 hover:font-semibold hover:border-b-2 hover:border-gray-900" href="{{ URL('/admin/clients') }}">
            Category
          </a>
        </li> --}}
        <li>
          <div class="my-5 border-t border-gray-200"></div>
        </li>
        <li class="my-5">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-3 py-2 font-semibold text-white bg-gray-700 rounded focus:outline-none">
              Log out
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</header>
