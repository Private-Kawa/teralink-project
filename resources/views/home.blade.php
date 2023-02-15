<x-app-layout>
    <h1 class="text-2xl pb-3">あなたの予定</h1>
    <section>
        <ul class='events'>
            @foreach ($events as $event)
                <li class='rounded border-2 border-solid border-gray-200'>
                    <h2 class='title'>{{ $event->title }}</h2>
                    <h2 class='date'>{{ $event->date }}</h2>
                    <p class='content'>{{ $event->content }}</p>
                    <p class='capacity'>{{ $event->capacity }}</p>
                    <p class='created_at'>{{ $event->created_at }}</p>
                </li>
            @endforeach
        </ul>
        <ul class='news'>
            @foreach ($news as $news_item)
                <li class='rounded border-2 border-solid border-gray-200'>
                    <h2 class='title'>{{ $news_item->title }}</h2>
                    <h2 class='date'>{{ $news_item->date }}</h2>
                    <p class='content'>{{ $news_item->content }}</p>
                    <p class='created_at'>{{ $news_item->created_at }}</p>
                </li>
            @endforeach
        </ul>
    </section>
</x-app-layout>