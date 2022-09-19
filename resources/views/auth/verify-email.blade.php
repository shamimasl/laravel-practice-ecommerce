<h1>You are not verified</h1>

<form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit">Resend</button>
</form>
