<form action="{{ route('registration.send-email-confirmation') }}" method="POST">
    {!! csrf_field() !!}
    <button type="submit" class="btn btn-primary">
        Send Attendance Email
    </button>
</form>
