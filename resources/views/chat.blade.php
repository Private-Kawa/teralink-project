<x-app-layout>
    <div class="py-12">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form method="post" action="" onsubmit="onsubmit_Form(); return false;">
                    メッセージ : <input type="text" id="input_message" autocomplete="off" />
                    <button type="submit" class="text-white bg-blue-700 px-5 py-2">送信</button>
                </form>
                <ul id="list_message">
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        const elementInputMessage = document.getElementById( "input_message" );
        
        {{-- formのsubmit処理 --}}
        function onsubmit_Form()
        {
            {{-- 送信用テキストHTML要素からメッセージ文字列の取得 --}}
            let strMessage = elementInputMessage.value;
            if( !strMessage )
            {
                return;
            }

            params = { 'message': strMessage };

            {{-- POSTリクエスト送信処理とレスポンス取得処理 --}}
            axios
                .post( '', params )
                .then( response => {
                    console.log(response);
                } )
                .catch(error => {
                    console.log(error.response)
                } );

            {{-- テキストHTML要素の中身のクリア --}}
            elementInputMessage.value = "";
        }
        
        {{-- ページ読み込み後の処理 --}}
        window.addEventListener( "DOMContentLoaded", ()=>
        {
            const elementListMessage = document.getElementById( "list_message" );
            
            {{-- Listen開始と、イベント発生時の処理の定義 --}}
            window.Echo.private('chat').listen( 'MessageSent', (e) =>
            {
                console.log(e);
                {{-- メッセージの整形 --}}
                let strUsername = e.message.username;
                let strMessage = e.message.body;

                {{-- 拡散されたメッセージをメッセージリストに追加 --}}
                let elementLi = document.createElement( "li" );
                let elementUsername = document.createElement( "strong" );
                let elementMessage = document.createElement( "div" );
                elementUsername.textContent = strUsername;
                elementMessage.textContent = strMessage;
                elementLi.append( elementUsername );
                elementLi.append( elementMessage );
                elementListMessage.prepend( elementLi );  // リストの一番上に追加
                //elementListMessage.append( elementLi ); // リストの一番下に追加
            });
        } );
    </script>
</x-app-layout>