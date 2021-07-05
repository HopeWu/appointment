<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="height: 100vh;background-image: url({!! asset('images/u=304344891,2514493180&fm=26&gp=0.jpeg') !!});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        display: grid;
        grid-template-rows: repeat(10, 1fr);
        grid-template-columns: repeat(10, 1fr);
        ">

    <div class="container lg:mx-auto justify-center flex flex-col lg:max-w-xs"
         style="grid-row: 6/7; grid-column: 3/9; border: solid; border: #9561e2"
         >
        <div>
            <a class="" href="/game/create">
                <div class="rounded-full hover:shadow hover:bg-blue-600
                mb-5 py-2 flex justify-center items-center"
                     style="height:100%; width: 100%; background: rgba(159, 247, 111, 0.5);">
                    <span style="color: white; font-size: 1.25rem; line-height: 1.75rem;">建房</span>
                </div>
            </a>
            <form class="flex flex-row justify-between bg-gray-200 rounded-full"
                  method="post"
                  action="/game/enter"
                  style="height:100%; width: 100%">
                @csrf
                <input class="w-full bg-transparent focus-within:outline-none px-4"
                       type="number" name="roomId" placeholder="请输入房间号"
                       required>
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    <span style="opacity: 1;">进入房间</span>
                </button>
            </form>
        </div>
    </div>
    </body>
    </html>