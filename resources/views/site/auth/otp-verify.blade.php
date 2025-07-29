<form method="POST" action="{{ route('otp.verify') }}">
    @csrf
    <input type="hidden" name="email" value="{{ session('email') }}">
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify</button>
</form>
