<x-master>
<h2 class="uppercase text-2xl mb-4">Let's create a game:</h2>
<form class="text-xl ml-10" method="post" action="/game/store">
    @csrf
    <div class="mb-8 text-3xl">
        <label for="total">玩家总数:</label>
        <input class="border border-gray-400 w-10 ml-2" type="string" name="total">
        @error('total')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="villager">村名数:</label>
        <input class="border border-gray-400 w-8 ml-2" type="string" name="villager">
        @error('villager')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        女巫<input class="mr-2 ml-1" type="checkbox" name="special" value="witch">
        预言家<input class="mr-2 ml-1" type="checkbox" name="special" value="prophet">
        猎人<input class="mr-2 ml-1" type="checkbox" name="special" value="hunter">
        守卫<input class="mr-2 ml-1" type="checkbox" name="special" value="guardian">
        骑士<input class="mr-2 ml-1" type="checkbox" name="special" value="knight">
        狼王<input class="mr-2 ml-1" type="checkbox" name="special" value="wolf-king">
        白狼王<input class="mr-2 ml-1" type="checkbox" name="special" value="white-wolf-king">
    </div>
    <div class="mb-4">
        <label for="wolf">狼人数:</label>
        <input class="border border-gray-400 w-8 ml-2" type="string" name="wolf">
        @error('wolf')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>

    <button type='submit' class='bg-blue-500 rounded shadow py-2 px-4 text-white'>
        创建
    </button>
</form>
</x-master>