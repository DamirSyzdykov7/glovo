<!DOCTYPE html>
<html>
<head>
    <title>Список</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 105px;
            margin: 40px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div>
    <div class="">
        <ul style="display: flex; justify-content: space-between; width: 100%; list-style-type: none; align-items: center;">
            <li style="flex-grow: 1; text-align: center;"><h1>Заведения</h1></li>
            @if(isset($isUser))
                <a href="{{ route('ProfileShow') }}"> <img src="{{ asset('storage/polz.png') }}" width="65px" height="65px"></a>
            @else
        
                <a href="/AuthShow"><li style="text-align: right; margin-right:20px"><h1>войти</h1></li></a>
            @endif
        </ul>
    </div>
        <div class="grid-container m-30">
            @foreach ($isRestoraunts as $restoraunt)
                <div class="card" style="width: 350px; margin:20px ">
                    <a href="/DishesShow?name={{ $restoraunt->Название }}">
                        <h1 class="card-header text-center">{{ $restoraunt->Название }}</h1>
                        <img class="card-img-top" src="{{ asset('storage/' . $restoraunt->фото) }}" width="250px" height="300px">
                    </a>
                </div>
            @endforeach
            <div>{{ $currentUrl }}</div>
        </div>
    </div>
</body>
</html>
