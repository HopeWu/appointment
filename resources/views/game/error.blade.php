<x-master>
    <div style="height: calc(100vh - 1.75rem);">
        <div style="height: 35vh;
                background-image: url({!! asset('images/error-wolf.jpg') !!});
                background-size:cover;
                background-position: center;
                ">
        </div>
        <div style="display: flex; justify-content: space-around; margin-top:1em; margin-bottom: 1em;"
        >
            <div>
                <div style="font-size: 2em;
                        color: red;">
                    @isset($error)
                        <h2 class="main-font">{{$error}}</h2>
                    @else
                        <h2>您没有输入房间编号！</h2>
                    @endisset
                </div>
                <div style="display: flex; justify-content: space-between;">
                    @if(session("room_id"))
                        <a href="/room">
                            <div class='bg-blue-500 py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none mr-2
                    flex justify-center rounded-md'
                                 style="min-width:100px;"
                            >
                                返回房间
                            </div>
                        </a>
                    @endif
                    <a href="/">
                        <div class='bg-blue-500 py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none
                    flex justify-center rounded-md'
                             style="min-width:100px;"
                        >
                            返回首页
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>
</x-master>
