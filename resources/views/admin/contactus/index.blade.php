<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All Contacts</title>
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
            margin-bottom: 10px;
        }
        .action a, .action form {
            display: inline-block;
            margin-right: 5px;
        }
        .action button {
            padding: 5px 10px;
            border: none;
            background-color: #eee;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us Submissions</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td class="action">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.contactus.edit', $contact->id) }}">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.contactus.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
