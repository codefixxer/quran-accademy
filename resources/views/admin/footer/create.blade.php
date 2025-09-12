<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ isset($footer) ? 'Update Footer Data' : 'Insert Footer Data' }}</title>
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
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
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
        <h1>{{ isset($footer) ? 'Update Footer Data' : 'Insert Footer Data' }}</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ isset($footer) ? route('admin.footer.update', $footer->id) : route('admin.footer.store') }}" method="POST">
            @csrf
            @if(isset($footer))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" name="whatsapp" placeholder="WhatsApp" value="{{ isset($footer) ? $footer->whatsapp : old('whatsapp') }}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" placeholder="Facebook" value="{{ isset($footer) ? $footer->facebook : old('facebook') }}">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" placeholder="Instagram" value="{{ isset($footer) ? $footer->instagram : old('instagram') }}">
            </div>
            <div class="form-group">
                <label for="tiktok">TikTok</label>
                <input type="text" name="tiktok" placeholder="TikTok" value="{{ isset($footer) ? $footer->tiktok : old('tiktok') }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Address" value="{{ isset($footer) ? $footer->address : old('address') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Phone" value="{{ isset($footer) ? $footer->phone : old('phone') }}">
            </div>
            <div class="form-group">
                <label for="whatsapp_number">WhatsApp Number</label>
                <input type="text" name="whatsapp_number" placeholder="WhatsApp Number" value="{{ isset($footer) ? $footer->whatsapp_number : old('whatsapp_number') }}">
            </div>
            <button type="submit">{{ isset($footer) ? 'Update Footer Data' : 'Insert Footer Data' }}</button>
        </form>
    </div>
</body>
</html>
