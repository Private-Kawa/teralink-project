<x-app-layout>
    <nav class="flex mb-6" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <p>ホーム</p>
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">{{ $news->date }} {{ $news->title }}</a>
          </div>
        </li>
      </ol>
    </nav>
    @if(Auth::user()->id !==  1)
        <h2 class="flex items-end justify-between text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">
            <p>{{ $news->title }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-400">{{ $news->date }}</p>
        </h2>
        @foreach ($news->news_images as $news_image)
            <img class="rounded-t-lg mb-10 w-full h-52 object-cover" src="{{$news_image->path}}" alt="画像準備中" />
        @endforeach
        <p class="mb-6">{{ $news->content }}</p>
    @else
        <h2 class="flex items-end justify-between text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">
            <p>{{ $news->title }}</p>
            <p class="text-sm text-gray-700 dark:text-gray-400">{{ $news->date }}</p>
        </h2>
        <div class="flex justify-end mb-3">
            <a href="/posts/news/{{ $news->id }}/edit" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">編集</a>
        </div>
        @foreach ($news->news_images as $news_image)
            <img class="rounded-t-lg mb-10 w-full h-52 object-cover" src="{{$news_image->path}}" alt="画像準備中" />
        @endforeach
        <p class="mb-6">{{ $news->content }}</p>
    @endif
</x-app-layout>