<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">プロジェクト詳細</h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">進捗ステータス</h1>
                    <hr>
                    <p>開発中</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">状況概要</h1>
                    <hr>
                    <p>開発中</p>
                </div>
            </div>
        </div>
    </div>

    @foreach($projectDetailInfo as $projectDetailInfo)
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $projectDetailInfo->name }}</h1>
                        <hr>
                        <p>開発中</p>
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">消費工数</h1>
                        <hr>
                        <p>{{ $projectDetailInfo->result_man_hour }}</p>
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">状況詳細</h1>
                        <hr>
                        <p>{{ $projectDetailInfo->overview }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-guest-layout>