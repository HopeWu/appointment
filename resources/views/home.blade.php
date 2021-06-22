<x-master>
    <div class="container mx-auto h-screen justify-center flex flex-col max-w-xs"
    style="background-image: url({!! asset('images/u=304344891,2514493180&fm=26&gp=0.jpeg') !!});">
        <div class>
            <a class="" href="/game/create">
                <div class="bg-blue-500 rounded-full hover:shadow hover:bg-blue-600
                text-white text-xl mb-5 py-2 flex justify-center items-center" style="height:40px;">
                    建房
                </div>
            </a>
            <form class="flex flex-row justify-between bg-gray-200 rounded-full"
                  method="post"
                  action="/game/enter">
                @csrf
                <input class="w-full bg-transparent focus-within:outline-none px-4"
                       type="number" name="roomId" placeholder="请输入房间号"
                       required>
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    进入房间
                </button >
            </form>
        </div>
    </div>
</x-master>