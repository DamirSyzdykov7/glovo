<!DOCTYPE html>
<html>
<head>
    <title>Список</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fixed {
            position:fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <h1>Блюда</h1>
    <div style="display:grid; grid-template-columns: repeat(4, 300px); gap:50px; ">
            @foreach($hadDishes as $dish)
                    <div class="card" style="list-style-type:none;">
                        <div>
                            @if(isset($dish->photo))
                                <img class="card-img-top" src="{{ asset('storage/' . $dish->photo) }}" width="250px" height="300px" >
                            @else
                                <p>такого фото не существует</p>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(isset($dish->name) && isset($dish->description) && isset($dish->price))
                                <h4 class="card-tittle">{{ $dish->name }}</h4>
                                <p class="card-text">{{ $dish->description }}</p>
                        </div>
                        <div class="list-group list-group-flush">
                            <div style="display:flex; ">
                                <p class=" list-group-item mb-0">{{ $dish->price }}</p>
                                    <form action="{{ route('ActionDishesPage') }}" method="POST">
                                        @csrf
                                        @if(isset($isUser))
                                            <input type="hidden" name="dishName" value="{{ $dish->name }}">
                                            <input type="hidden" name="dishPrice" value="{{ $dish->price }}">
                                            <button type="submit" class="btn btn-primary" style="width: 135%; height:100%">добавить в корзину</button>
                                        @else
                                            <p>зарегестрируйтесь</p>
                                        @endif
                                    </form>
                            </div>
                        </div>
                        @else
                            <p>данные отсутствуют</p>
                        @endif
                    </div>
            @endforeach
    </div>
    @if(isset($isUser))
        @if(isset($isCartDishes))
        <div class="fixed">
            <a href="{{ route('CartShow') }}"><img src="{{ asset('storage/cart2.png') }}" width="75px" ></a>
        </div>
        @else
        @endif
    @else
    @endif
</body>
</html>
