<x-app-layout>
    @if(Auth::user()->is_admin === 0 )
        管理者専用の画面です。
    @else
        <h2 class="text-xl py-3">お知らせ詳細</h2>
        <p>{{ $news->title }}</p>
        <p>{{ $news->content }}</p>    
        <a href="/home">戻る</a>
    @endif
</x-app-layout>