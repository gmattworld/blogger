<x-blogger::layouts.admin>

  {!! Form::open(['action' => ['Gmattworld\Blogger\Http\Controllers\BloggerAdminController@update', $model->id], 'files'=>true, 'class'=>'forms-sample', 'method'=>'POST']) !!}
    @include('blogger::incs.message')
    @csrf
    @method('PUT')

    <div class="max-w-4xl px-5 mx-auto 2xl:max-w-7xl" x-data="app()">
      <div class="flex items-center justify-between w-full mb-5">
        <div class="mb-4 text-2xl font-bold">Posts</div>
        <div>
          <a href="{{ url('/admin') }}" class="mx-1 text-sm text-gray-700 hover:underline"><i class="fa fa-home"></i></a> /
          <a href="{{ url('/admin/blogger') }}" class="mx-1 text-sm text-gray-700 capitalize hover:underline">Posts</a> /
          <span class="mx-1 text-sm text-gray-400 capitalize cursor-pointer">Update Post</span>
        </div>
      </div>
      <div class="flex items-stretch gap-5">
        <div class="flex-auto w-full h-full py-5">
          <div>
            {!!
              Form::text('topic', $model->topic,
              ['class'=>'w-full px-3 py-2 mb-3 text-lg font-bold border-transparent rounded form-input focus:outline-none ring-1 ring-gray-100',
              'required'=>'required', 'placeholder'=>' Title...'])
            !!}
            <span class="text-danger"> {!! $errors->first('topic'); !!} </span>
          </div>
          <div class="bg-white rounded shadow ">
            {!! Form::textarea('body', $model->body, ['class'=>'w-full h-full', 'id'=>'editor', 'placeholder'=>' What is on your mind?']) !!}
            <span class="text-danger"> {!! $errors->first('body'); !!}</span>
          </div>
        </div>
        <div class="flex-auto w-2/5 h-full mt-5 bg-white">
          <div class="px-3 py-4">
            <div class="text-center">
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
          <div class="px-3 py-2">
            {!! Form::label('brief', 'Brief', ['class'=>'']) !!}
            {!! Form::textarea('brief', $model->brief, ['class'=>'w-full h-56 p-3 rounded form-textarea focus:outline-none ring-1 ring-gray-500', 'required'=>'required', 'row'=>'4', 'placeholder'=>' short brief']) !!}
            <span class="text-danger"> {!! $errors->first('brief'); !!} </span>
          </div>
          <div class="px-3 py-2">
            {!! Form::label('category', 'Category', ['class'=>'']) !!}
            {!! Form::text('category', $model->category, ['class'=>'w-full px-3 py-2 border-transparent rounded form-input focus:outline-none ring-1 ring-gray-500', 'required'=>'required', 'placeholder'=>' Category 1, Category 2']) !!}
            <span class="text-danger"> {!! $errors->first('category'); !!} </span>
          </div>
          <div class="px-3 py-4 text-center">
            {!! Form::submit('Save', ['class'=>'text-white py-1.5 px-4 rounded bg-gray-500']) !!}
            <a href="{{ url('/admin/blog') }}" class="px-4 py-1.5 text-gray-500 rounded ring-1 ring-gray-500">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  {!! Form::close() !!}


  @push('styles')
  @endpush

  @push('scripts')
    <!-- Include the Quill library -->
    <script src='//cdn.tiny.cloud/1/jwr7bpwai996ukv47wjdfwjdkrb91atbfo7215ioi6h44ndb/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
      window.onload = function () {
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
          selector: 'textarea#editor',
          plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
          imagetools_cors_hosts: ['picsum.photos'],
          menubar: 'file edit view insert format tools table help',
          toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
          toolbar_sticky: false,
          autosave_ask_before_unload: true,
          autosave_interval: '60s',
          autosave_prefix: '{path}{query}-{id}-',
          autosave_restore_when_empty: false,
          autosave_retention: '2m',
          image_advtab: true,
          link_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
          ],
          image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
          ],
          importcss_append: true,
          file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
              callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
              callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
              callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
          },
          // file_picker_callback: filemanager.tinyMceCallback,
          height: 650,
          image_caption: true,
          quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
          noneditable_noneditable_class: 'mceNonEditable',
          toolbar_mode: 'sliding',
          contextmenu: 'link image imagetools table  | fullscreen',
          // skin: useDarkMode ? 'oxide-dark' : 'oxide',
          // content_css: useDarkMode ? 'dark' : 'default',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
      };


      function app() {
        return {
          hasContent: false,
          image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZMAAADjCAIAAADPK25DAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OEFDM0ZERUUyRDg4MTFFNzgyNDM4OTExMTk5RTQyNkYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OEFDM0ZERUYyRDg4MTFFNzgyNDM4OTExMTk5RTQyNkYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4QUMzRkRFQzJEODgxMUU3ODI0Mzg5MTExOTlFNDI2RiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4QUMzRkRFRDJEODgxMUU3ODI0Mzg5MTExOTlFNDI2RiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PlSIfuwAAAcCSURBVHja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',
        }
      }
    </script>
  @endpush
</x-blogger::layouts.admin>
