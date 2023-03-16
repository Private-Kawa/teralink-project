<x-app-layout>
    @if( Auth::user()->is_admin === 0 )
        <h1 class="text-2xl pb-3">不正な画面です。</h1>
    @else
        <h1 class="text-2xl pb-3">記事追加画面 -管理者画面-</h1>
        <section>
          <form action="/posts/events" method="POST" id="formElem">
            @csrf
            <div class="mb-6">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">記事の種類</label>
              <select id="typeElem" class="w-64 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="event" selected>イベント</option>
                <option value="news">ニュース</option>
              </select>
            </div>
            <div class="mb-6">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">タイトル</label>
              <input id="message" name="events[title]" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
            </div>
            <div id="dateElem" class="mb-6">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催日時</label>
              <div class="relative w-64">
                <div class="absolute inset-y-1 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                  <input datepicker datepicker-autohide datepicker-format="yyyy/mm/dd" type="text" name="events[date]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="開催日時を設定してください" required>
              </div>
            </div>
            <div id="capacityElem" class="mb-6">
              <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">定員</label>
              <input type="number" id="capacity" name="events[capacity]" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">内容</label>
              <textarea id="message" name="events[content]" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">投稿</button>
          </form>
        </section>
        <script>
          const select_elem = document.getElementById('typeElem');
          const date_elem = document.getElementById('dateElem');
          const capacity_elem = document.getElementById('capacityElem');
          const capacity_input_elem = document.getElementById('capacity');
          
          console.log(select_elem.value);
        
          select_elem.addEventListener('click', () => {
              if(select_elem.value == 'news') {
                capacity_input_elem.value = null;
                capacity_elem.remove();
              } else {
                date_elem.after(capacity_elem);
              }
          });
        </script>
    @endif
</x-app-layout>

