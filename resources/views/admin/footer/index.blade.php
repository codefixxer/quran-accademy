<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Footer Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .alert {
            color: green;
        }
        .action a, .action form {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Footer Data</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.footer.create') }}">Insert New Footer Data</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>WhatsApp</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>TikTok</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>WhatsApp Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($footers as $footer)
                <tr>
                    <td>{{ $footer->id }}</td>
                    <td>{{ $footer->whatsapp }}</td>
                    <td>{{ $footer->facebook }}</td>
                    <td>{{ $footer->instagram }}</td>
                    <td>{{ $footer->tiktok }}</td>
                    <td>{{ $footer->address }}</td>
                    <td>{{ $footer->phone }}</td>
                    <td>{{ $footer->whatsapp_number }}</td>
                    <td class="action">
                        <a href="{{ route('admin.footer.edit', $footer->id) }}">Edit</a>
                        <form action="{{ route('admin.footer.delete', $footer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this footer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
</body>
</html>
