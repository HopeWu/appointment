<x-master>
    <div class="flex flex-col justify-between">
        <div><h2>你的身份是：<span class="text-red-600">{{$role->chinese_name}}</span>。</h2>
        </div>
        <div class="bg-blue-500 rounded-lg hover:shadow hover:bg-blue-600
                    text-white text-xl mb-5 py-2 flex justify-center items-center">
            <a href="/game/role"><h2>刷新身份</h2></a>
        </div>
    </div>
</x-master>