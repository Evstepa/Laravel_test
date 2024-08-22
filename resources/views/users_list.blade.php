<div class="mb-2">
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
                    <td>
                        <form action="{{ route('user.status-change') }}">
                            @csrf
                            <input class="d-none" id="userId" name="userId" type="text" value="{{ $user->id }}">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $status->id ==  $user->status_id ? 'selected' : '' }}>
                                        {{ $status->display_name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('user.delete', ['users' => $user->id]) }}">Удалить</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="mb-2">
    <h4 class="text-lg font-medium text-gray-900">
        {{ __('Общее количество пользователей: '. count($users)) }}
    </h4>
</div>

<div class="mb-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Статус</th>
                <th>Количество</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statusCount as $status)
            <tr>
                <th>{{ $status->id }}</th>
                <td>{{ $status->display_name .' (' . $status->name . ')' }}</td>
                <td>{{ $status->count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
