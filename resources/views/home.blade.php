<x-app-layout>
    <h1 class="text-2xl pb-3">あなたの予定</h1>
    <section>
        <h2 class="text-xl pt-3 pb-3">イベント一覧</h2>
        <ul class='pb-6'>
            @foreach ($events as $event)
                <li class='p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $event->title }}</h2>
                    <h3 class='date'>日程：{{ $event->date }}</h2>
                    <p class='capacity'>定員：{{ $event->capacity }}</p>
                    <p class='content'>{{ $event->content }}</p>
                </li>
            @endforeach
        </ul>
        <h2 class="text-xl pt-3 pb-3">ニュース一覧</h2>
        <ul class='pb-6'>
            @foreach ($news as $news_item)
                <li class='p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $news_item->title }}</h2>
                    <h3 class='date'>日程：{{ $news_item->date }}</h2>
                    <p class='content'>{{ $news_item->content }}</p>
                </li>
            @endforeach
        </ul>
    </section>
</x-app-layout>