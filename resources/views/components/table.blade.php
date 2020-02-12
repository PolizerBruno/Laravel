@section('content')
<tr class="table-success">
    <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} / {{count($tarefas)}}</span></th>
    <td>{{$tarefa->prioridades->prioridade}}</td>
    <td>{{$tarefa->name}}</td>
    <td>{{$tarefa->text }}</td>
    <td>{{$tarefa->tipos->tipo }}</td>
    <td>
        <span class="d-flex justify-content-center">
            <form method="post" action="/home/minhasTarefas/{{$tarefa->id}}">
                @csrf
                <input type="hidden" name="_method" value="delete" />
                <button class="btn btn-sm" role="button" type="submit"><i
                        class="material-icons md-18">delete</i></button>
            </form>
            <a class="btn btn-sm" href="/home/{{$tarefa->id}}/edit" role="button" type="submit"><i
                    class="material-icons md-18">edit</i></a>
        </span>
    </td>
</tr>
@endsection
