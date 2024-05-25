<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Criar Funcionário</h1>
        <hr>
        <form action="{{ route('employee-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" placeholder="Digite um nome..." required>
            </div>
            
            <br>
            <div class="form-group">
                <label for="last_name">Sobre-Nome:</label>
                <input type="text" class="form-control" name="last_name" placeholder="Digite um novo Sobre-Nome..."required>
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email"  placeholder="Digite um novo E-mail..." required>
            </div>
            <br>
            <div class="form-group">
                <label for="gender">Gênero:</label>
                <input type="text" class="form-control" name="gender" placeholder="Digite um novo gênero..." required>
            </div>
            <br>
            <div class="form-group">
                <label for="position">Cargo:</label>
                <input type="text" class="form-control" name="position" placeholder="Digite um novo Cargo..." required>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="salvar">
            </div>
        </form>
    </div>
    
</body>
</html>

  
