<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar</title>
</head>
<body>
    
    <div class="container mt-5">
        <h1>Editar Funcionário</h1>
        <hr>
        <form action="{{ route('employee-update', ['id'=>$employees->id]) }}"" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ $employees->name }}" placeholder="Digite um nome...">
            </div>
            <br>
            <br>
            <div class="form-group">
                <label for="last_name">Sobre-Nome:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $employees->last_name }}"placeholder="Digite um novo Sobre-Nome...">
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" value="{{ $employees->email }}" placeholder="Digite um novo E-mail..." >
            </div>
            <br>
            <div class="form-group">
                <label for="gender">Gênero:</label>
                <input type="text" class="form-control" name="gender" value="{{ $employees->gender }}" placeholder="Digite um novo gênero..." >
            </div>
            <br>
            <div class="form-group">
                <label for="position">Cargo:</label>
                <input type="text" class="form-control" name="position" value="{{ $employees->position }}" placeholder="Digite um novo Cargo..." >
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="atualizar">
            </div>
        </form>
    </div>
</body>
</html>

  
