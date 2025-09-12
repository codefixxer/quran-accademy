<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Link</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Page Background */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        /* Card Styling */
        .meeting-card {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: white;
            text-align: center;
            transition: 0.3s;
        }

        .meeting-card:hover {
            transform: scale(1.02);
        }

        /* Button Styling */
        .btn-meeting {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-meeting:hover {
            background-color: #0056b3;
        }

        /* Alert Message */
        .alert {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mt-4">Meeting Link</h2>

        @php
            // Logged-in user ka data
            $user = Auth::user(); 
            // Meet link find karna for logged-in user
            $meetLink = \App\Models\MeetLink::where('user_id', $user->id)->first();
        @endphp

        @if($meetLink)
            <!-- Agar user ka meeting link hai to show kare -->
            <div class="meeting-card">
                <p><strong>Meet Link:</strong></p> 
                <a href="{{ $meetLink->link }}" target="_blank" class="btn-meeting">
                    Open Meeting
                </a>
                <p class="mt-3"><strong>Last Updated:</strong> {{ $meetLink->updated_at->format('d M Y, h:i A') }}</p>
            </div>
        @else
            <!-- Agar user ka meeting link nahi hai to show kare -->
            <div class="alert alert-warning">
                <p>No meet link assigned yet.</p>
            </div>
        @endif
    </div>

</body>
</html>
