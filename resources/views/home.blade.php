<x-master>
    <div class="container  max-w-md mx-auto h-screen justify-center flex flex-col">
        <div class>
            <div class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xl">
                <a href="/game/create">建房</a>
            </div>

            <form class="flex flex-row justify-between"
                  method="post" action="/game/enter">
                @csrf
                <input type="string" name="roomId" class="border border-blue-500 shadow">
                <button type='submit' class='bg-blue-500 rounded-full shadow py-2 px-4 text-white'>
                    进入房间
                </button >
            </form>
        </div>
    </div>
</x-master>