<x-app-layout>
    <!-- ユーザー -->
    @if(Auth::user()->id !==  1)
        <section>
            <h1 class="text-2xl mb-3">寺院の予定</h1>
            <p class="mb-3 text-gray-800 dark:text-gray-300">お寺の行事やニュースを一覧で表示しています。</p>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">仏事・行事の予定</h2>
            <ul class='pb-6 flex flex-row flex-wrap gap-2'>
            @foreach ($events as $event)
                <li class="w-full md:flex-auto md:max-w-md md:w-1/6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg w-full h-64 object-cover" src="https://placehold.jp/1600x900.png?text=画像準備中" alt="" />
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h3>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->date }}</p>
                        <p class="mb-3 font-normal">{{ $event->content }}</p>
                        <a href='/posts/events/{{ $event->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            詳細
                        </a>
                    </div>
                </li>
            @endforeach
            </ul>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">ニュース</h2>
            <ul class='pb-6 flex flex-row flex-wrap gap-2'>
            @foreach ($news as $news_item)
                <li class="w-full md:flex-auto md:max-w-md md:w-1/6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg w-full h-64 object-cover" src="https://placehold.jp/1600x900.png?text=画像準備中" alt="" />
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $news_item->title }}</h3>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $news_item->date }}</p>
                        <p class="mb-3 font-normal">{{ $news_item->content }}</p>
                        <a href='/posts/news/{{ $news_item->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            詳細
                        </a>
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
    <!-- 管理者 -->
    @else
        <section>
            <h1 class="text-2xl mb-3">寺院の予定 -管理者画面-</h1>
            <a class="block mb-3" href='/posts/create'>
                <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">記事新規追加</button>
            </a>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">仏事・行事の予定</h2>
            <ul class='pb-6 flex flex-row flex-wrap gap-2'>
            @foreach ($events as $event)
                 <li class="w-full md:flex-auto md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg w-full h-54 object-cover" src="https://placehold.jp/1600x900.png?text=画像準備中" alt="" />
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h3>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->date }}</p>
                        <p class="mb-3 font-normal">{{ $event->content }}</p>
                        <div class="flex gap-3">
                            <a href='/posts/events/{{ $event->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                詳細
                            </a>
                            <form action="/posts/events/{{ $event->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">ニュース</h2>
            <ul class='pb-6 flex flex-row flex-wrap gap-2'>
            @foreach ($news as $news_item)
                <li class="w-full md:flex-auto md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg w-full h-54 object-cover" src="https://placehold.jp/1600x900.png?text=画像準備中" alt="" />
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $news_item->title }}</h3>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $news_item->date }}</p>
                        <p class="mb-3 font-normal">{{ $news_item->content }}</p>
                        <div class="flex gap-3">
                            <a href='/posts/news/{{ $news_item->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                詳細
                            </a>
                            <form action="/posts/news/{{ $news_item->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
    @endif
</x-app-layout>