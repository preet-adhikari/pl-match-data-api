<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
        .success-message {
            color: green;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Password Reset</h1>
    @if (session('status'))
        <div class="success-message">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @if(isset($errors))
            @if ($errors->has('email'))
                <div class="error-message">{{ $errors->first('email') }}</div>
            @endif
        @endif
        
        <label for="password">New Password</label>
        <input type="password" name="password" required>
        @if(isset($errors))
            @if ($errors->has('password'))
                <div class="error-message">{{ $errors->first('password') }}</div>
            @endif
        @endif
        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation" required>
        @if(isset($errors))
            @if ($errors->has('password_confirmation'))
                <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
            @endif
        @endif
        <button type="submit">Reset Password</button>
    </form>
    <script>
        const form = document.querySelector('form');
        const passwordInput = form.querySelector('input[name="password"]');
        const confirmInput = form.querySelector('input[name="password_confirmation"]');
        const errorMessages = form.querySelectorAll('.error-message');
        form.addEventListener('submit', function(event) {
            if (passwordInput.value !== confirmInput.value) {
                event.preventDefault();
                errorMessages.forEach(function(element) {
                    element.style.display = 'none';
                });
                const errorMessage = form.querySelector('.error-message');
                errorMessage.textContent = 'The password and confirmation do not match.';
                errorMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
