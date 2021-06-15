<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="bg-blue-300 flex justify-between">
    <h2 class="flex">Werewolf</h2>
    <a class="flex" href="/"><h2>Home</h2></a>
    @if($user_id = session('current_user'))
        <h2 class="flex pr-2">您的编号是 <span class="text-red-700 font-bold">{{$user_id}}</span></h2>
    @endif
</div>
{{$slot}}
</body>
</html>
