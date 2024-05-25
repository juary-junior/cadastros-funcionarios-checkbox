<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Checkbox</title>
</head>
<body>
<div class="container">
    <h1 class="text-center text-danger pt-4">Excluir várias Recomendações <hr></h1>
    <div class="row py-2">
        <div class="col-md-8 pb-2">
            <a href="#" class="btn btn-danger" id="deleteAllSelectedRecord">Excluir todos selecionados</a>
            <a href="{{ route('employee-create') }}" class="btn btn-success">Adicionar novo funcionário</a>
        </div>
        <div class="col-md-4 pb-2">
            <form method="get" action="employee">
                <div class="input-group">
                    <select class="form-select" name="date_filter">
                        <option value="">Todas as Datas</option>
                        <option value="today">hoje</option>
                        <option value="yesterday">ontem</option>
                        <option value="this_week">Essa semana</option>
                    </select>
                    <button type="submit" class="btn btn-primary">filtro</button>
                </div>
            </form>
        </div>
    </div>
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" id="select_all_ids"></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobre-Nome</th>
                <th>Cargo</th>
                <th>Gênero</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr id="employee_ids{{ $employee->id }}">
                    <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $employee->id }}"></td>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <form action="{{ route('employee-destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                        <a href="{{ route('employee-edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        
        $('#select_all_ids').click(function() {
            $('.checkbox_ids').prop('checked', this.checked);
        });

        
        $('.checkbox_ids').change(function() {
            if ($('.checkbox_ids:checked').length === $('.checkbox_ids').length) {
                $('#select_all_ids').prop('checked', true);
            } else {
                $('#select_all_ids').prop('checked', false);
            }
        });

        $('#deleteAllSelectedRecord').click(function(e) {
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function() {
                all_ids.push($(this).val());
            });

            if (all_ids.length > 0) {
                
                $.ajax({
                    url: "{{ route('employee-delete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#employee_ids' + val).remove();
                        });
                    }
                });
            } else {
                alert('Por favor, selecione pelo menos um registro para excluir.');
            }
        });
    });
</script>

</body>
</html>
