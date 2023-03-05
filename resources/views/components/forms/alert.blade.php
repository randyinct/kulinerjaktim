@if (session()->has('success'))
    <div class="alert alert-success text-success">{{ session('success') }}</div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info text-info">{{ session('info') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger text-danger">{{ session('error') }}</div>
@endif