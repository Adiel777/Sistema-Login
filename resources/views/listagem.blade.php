<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Listagem de Usuarios</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }
        td {
            border: 2px solid black;
        }
        th {
            border: 2px solid black;
        }
        h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>
        <table width="800" border="1px" bgcolor="#CCC" align="center">
            <h1 align="center" >Lista de Usuarios</h1>
            <tr >
                <th width="101" height="50">Id</th>
                <th width="101" height="50">Nome</th>
                <th width="101" height="50">Email</th>
                <th width="101" height="50">Status</th>
                <th></th>
                <th></th>
            </tr>
            
            @foreach($users as $user)
            <tbody>
            <tr>
                <td width="4%" height="50" align="center">{{$user->id}}</td>
                <td width="101" height="50" align="center">{{$user->name}}</td>
                <td width="200" height="50" align="center">{{$user->email}}</td>
                <td width="150" height="50" align="center">{{$user->status}}</td>
                <td>
            
                    <form action="{{route('destroy', ['user' => $user->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <x-primary-button class="ml-4">
                         {{ __('Remover') }}
                        </x-primary-button>
                    </form>
                </td>
                <td>
                    <form action="{{route('editar', ['user' => $user->id])}}" method="post">
                        @method('get')
                        <x-primary-button class="ml-4">
                         {{ __('Editar Usuário') }}
                        </x-primary-button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

</body>

</html>
</x-app-layout>


