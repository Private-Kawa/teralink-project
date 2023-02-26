<x-app-layout>
    @if(Auth::user()->is_admin === 0 )
        管理者専用の画面です。
    @else
        <h2 class="text-xl py-3">イベント詳細</h2>
        <p>{{ $events->title }}</p>
        <p>{{ $events->content }}</p>    
        <a href="/home">戻る</a>
    @endif
</x-app-layout>