<!DOCTYPE html>
<html>
<head>
    <title>Список</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    </style>
</head>
<body>
    <div style="margin-top:5%; margin-left:5%;">
        <h1>моя корзина</h1>
        <div style="display:flex; margin-left:5%" >
            <div style="margin-top:5%">
                @foreach($cartDishes as $cartDish)
                    <div style="font-family: Whereas recognition of the inherent dignity ;font-size: 25px ; margin-top: 20px ;display: flex; justify-content: space-between; width:13%" >
                        <div>{{ $cartDish->name_of_dish }}</div>
                        <div>{{ $cartDish->price }}</div>
                    </div>
                @endforeach
            </div>
            <div>
                <form method="GET" action="">
                    <label for="discount">промокоды</label>
                    <div><input name="discount" type="text" ></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
