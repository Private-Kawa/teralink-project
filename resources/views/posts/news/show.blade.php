<x-app-layout>
    @if(Auth::user()->id !==  1)
        管理者専用の画面です。
    @else
        <h2 class="text-xl mb-2 py-3">{{ $news->title }}<a href="/posts/news/{{ $news->id }}/edit" class="ml-3 text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">編集</a></h2>
        <p class="mb-2">開催日時：{{ $news->date }}</p>    
        <p class="mb-2 border-b-2 border-solid border-gray-300">内容</p>
        <p class="mb-2">{{ $news->content }}</p>
        <a href="/home" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">トップへ戻る</a>
    @endif
</x-app-layout>