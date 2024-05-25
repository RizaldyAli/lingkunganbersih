<form method="{{ $attributes->get('method') }}" action="{{ $attributes->get('action') }}" class="{{ $attributes->get('class') }}">
    @if ($attributes->get('method') === 'PUT')
        @method('PUT')
    @endif
    @csrf
    {{ $slot }}
</form>
