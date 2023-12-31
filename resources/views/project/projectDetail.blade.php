<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">プロジェクト詳細</h2>
    </x-slot>

    <x-input-error :messages="$errors->all()" class="mt-2" />

    <form method="POST" action="{{ route('projectDetail', [$projectDetail[0]->project_id]) }}">
        @csrf
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <input id="targetDate" class="block mt-1 w-32" type="date" name="targetDate" required/>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-1">
                <x-primary-button>日付指定</x-primary-button>
            </div>
        </div>
    </form>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-fuchsia-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                <h1 class="font-bold text-2xl text-white leading-tight">{{ $projectDetail[0]->date }}</h1>
                </div>
            </div>
        </div>
    </div>


    <br>
    <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 font-bold text-2xl text-gray-800 leading-tight">  ▼全体状況</h1>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">進捗ステータス</h1>
                    <hr>
                    <p>{{ $projectDetail[0]->status }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">状況</h1>
                    <hr>
                    <p>{{ $projectDetail[0]->projectOverview }}</p>
                </div>
            </div>
        </div>
    </div>
    <br>

    <h1 class="max-w-7xl mx-auto sm:px-6 lg:px-8 font-bold text-2xl text-gray-800 leading-tight">  ▼メンバー状況</h1>

    @foreach($projectDetail as $projectDetail)
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $projectDetail->name }}</h1>
                        <hr><br>
                        <h1 class="font-semibold text-sm text-gray-800 leading-tight">消費工数</h1>
                        <hr>
                        <p>{{ $projectDetail->result_man_hour }}</p>
                        <br>
                        <h1 class="font-semibold text-sm text-gray-800 leading-tight">状況</h1>
                        <hr>
                        <p>{{ $projectDetail->memberOverview }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-guest-layout>