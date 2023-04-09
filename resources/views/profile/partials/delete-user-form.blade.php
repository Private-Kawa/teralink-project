<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            アカウント削除
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            一度アカウントを削除しますと、すべての登録されているデータが失われます。
        </p>
    </header>
    
    <!-- ユーザー -->
    @if(Auth::user()->id !==  1)
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >アカウント削除</x-danger-button>
    @else
    <!-- 管理者 -->
        <p class="text-md font-medium text-gray-900 dark:text-gray-100">
            管理者アカウントは削除できません。
        </p>
    @endif
    


    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('本当にアカウントを削除してもよろしいでしょうか') }}
            </h2>
            
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                一度アカウントを削除しますと、すべての登録されているデータが失われます。
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="パスワード"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('キャンセル') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('アカウント削除') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>