<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ isset($contact) ? 'Update Contact' : 'Insert Contact' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        .alert {
            color: green;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        button {
            padding: 8px 12px;
            border: 1px solid #000;
            background-color: #eee;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ isset($contact) ? 'Update Contact' : 'Insert Contact' }}</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ isset($contact) ? route('admin.contactus.update', $contact->id) : route('admin.contactus.store') }}" method="POST">
            @csrf
            @if(isset($contact))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Your Email" value="{{ isset($contact) ? $contact->email : old('email') }}">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" placeholder="Your Message">{{ isset($contact) ? $contact->message : old('message') }}</textarea>
            </div>
            <button type="submit">{{ isset($contact) ? 'Update Contact' : 'Send Message' }}</button>
        </form>
    </div>
</body>
</html>
