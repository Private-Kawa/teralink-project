<x-app-layout>
    <h1>Chat app</h1>
    <form method="post" action="" onsubmit="onsubmit_Form(); return false;">
        ニックネーム : <input type="text" id="input_nickname" autocomplete="off" />
        <br />
        メッセージ : <input type="text" id="input_message" autocomplete="off" />
        <button type="submit">送信</button>
    </form>

    <ul id="list_message">
        <li><strong>太郎</strong><div>こんにちは</div></li>
        <li><strong>次郎</strong><div>ハロー</div></li>
        <li><strong>三郎</strong><div>こんばんわ</div></li>
    </ul>

    <script>
        const elementInputNickname = document.getElementById( "input_nickname" );
        const elementInputMessage = document.getElementById( "input_message" );
        
        {{-- formのsubmit処理 --}}
        function onsubmit_Form()
        {
            {{-- 送信用テキストHTML要素からメッセージ文字列の取得 --}}
            let strNickname = elementInputNickname.value;
            let strMessage = elementInputMessage.value;
            if( !strMessage )
            {
                return;
            }

            if( !strNickname )
            {
                strNickname = '(匿名)';
            }
            params = { 'nickname': strNickname,
                       'message': strMessage };

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
    </script>
</x-app-layout>