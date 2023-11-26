<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロジェクト一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <tr>
                        <th>プロジェクト名</th>
                        <th>見積もり</th>
                        <th>リリース予定日</th>
                        <th>稼働予定月</th>
                    </tr>
                    <br>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->estimation }}</td>
                            <td>{{ $project->release_date }}</td>
                            <td>{{ $project->work_date }}</td>
                        </tr>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
