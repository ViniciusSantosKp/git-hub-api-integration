<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" media="screen">
    <title>Dados Usuário</title>
</head>
<body>
    <div>
        <h1>Detalhes do Usuário</h1>

        <br>
        <p><strong>Nome:</strong> {{ Arr::get($user, 'name') }}</p>
        <p><strong>Número de Seguidores:</strong> {{ Arr::get($user, 'followers') }}</p>
        <p><strong>Número de Seguidos:</strong> {{ Arr::get($user, 'following') }}</p>
        <p><strong>Email:</strong> {{ Arr::get($user, 'email') }}</p>
        <p><strong>Bio:</strong> {{ Arr::get($user, 'bio') }}</p>

        <br>
        <br>
        <p><img src="{{ Arr::get($user, 'avatar_url') }}" alt="Avatar"></p>
        <br>

        @if ($repos)
            <div>
                <h1>Repositórios do Usuário</h1>

                <br>

                <form action="{{ url()->current() }}" method="get">
                    @csrf
                    <label for="order">Ordenar por:</label>
                    <select name="order" id="order" onchange="this.form.submit()">
                        <option value="stars"{{ $order === 'stars' ? ' selected' : '' }}>Estrelas</option>
                        <option value="name"{{ $order === 'name' ? ' selected' : '' }}>Nome</option>
                        <option value="language"{{ $order === 'language' ? ' selected' : '' }}>Linguagem</option>
                    </select>

                    <input type="hidden" name="name" value="{{ $user['login'] }}">
                </form>

                <br>
                <br>

                <table width="500" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Estrelas</th>
                            <th>Linguagem</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repos as $repo)
                            <tr></tr>
                            <tr>
                                <td>{{ Arr::get($repo, 'name') }}</td>
                                <td>{{ Arr::get($repo, 'stargazers_count') }}</td>
                                <td>{{ Arr::get($repo, 'language') }}</td>
                                <td><a href="{{ url("/repo/{$user['login']}/{$repo['name']}") }}" target="_blank">Ver detalhes</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>

        @else
            <div>
                <h4>Usuário não possui repositórios</h1>
            </div>

        @endif

    </div>
</body>
</html>