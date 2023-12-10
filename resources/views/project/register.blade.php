<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">プロジェクト登録</h2>
    </x-slot>
    <form method="POST" action="{{ route('project.store') }}">
        @csrf

        <!-- プロジェクト名 -->
        <div class="mt-4 mx-40">
            <x-input-label for="projectName">プロジェクト名</x-input-label>
            <x-text-input id="projectName" class="block mt-1 w-9/12" type="text" name="projectName" :value="old('projectName')" required autofocus autocomplete="projectName" />
            <x-input-error :messages="$errors->get('projectName')" class="mt-2" />
        </div>

        <!-- 見積もり工数（人日） -->
        <div class="mt-4 mx-40">
            <x-input-label for="estimation">見積もり工数（人日）</x-input-label>
            <x-number-input id="estimation" class="block mt-1 w-9/12" name="estimation" min='1' :value="old('estimation')" required />
            <x-input-error :messages="$errors->get('estimation')" class="mt-2" />
        </div>

        <!-- リリース予定日 -->
        <div class="mt-4 mx-40">
            <x-input-label for="releaseDate">リリース予定日</x-input-label>
            <input id="releaseDate" class="block mt-1 w-9/12" type="date" name="releaseDate" required/>
            <x-input-error :messages="$errors->get('releaseDate')" class="mt-2" />
        </div>

        <!-- 稼働予定月 -->
        <div class="mt-4 mx-40">
            <x-input-label for="workDate">稼働予定月</x-input-label>
            <input id="workDate" class="block mt-1 w-9/12" type="month" name="workDate" required />
            <x-input-error :messages="$errors->get('workDate')" class="mt-2" />
        </div>

        <!-- メンバ登録 -->
        <div class="mt-4 mx-40">
            <x-input-label>メンバー</x-input-label>
            @foreach($users as $user)
            <input class='ml-1' id="member" type="checkbox" name="member" value="{{ $user->id }}"> {{ $user->name }}
            @endforeach
            <x-input-error :messages="$errors->get('member')" class="mt-2" />
        </div>
        <div class="flex items-center mt-4 mx-40">
            <x-primary-button class="ml-4">登録</x-primary-button>
        </div>
    </form>
</x-guest-layout>