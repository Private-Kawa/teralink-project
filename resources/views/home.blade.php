<x-app-layout>
    <h1 class="text-2xl pb-3">あなたの予定</h1>
    <section>
        <div class='events'>
            @foreach ($events as $event)
                <div class='event'>
                    <h2 class='title'>{{ $event->title }}</h2>
                    <p class='body'>{{ $event->content }}</p>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>