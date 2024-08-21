@if (count($users) === 0)
    <h6 class="title">Данных пока нет</h6>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->surname . ' ' . $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->status_id }}</td>
                <td>
                    Удалить
                    {{-- <a href="{{ route('user.delete', ['user' => $user->id]) }}">Удалить</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
