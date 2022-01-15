@php
    if (session('success')) {
        $alertType = 'success';
        $message = session('success');
    } else if (session('failed')) {
        $alertType = 'danger';
        $message = session('failed');
    }
@endphp

@if (session('success') || session('failed'))
    <div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
