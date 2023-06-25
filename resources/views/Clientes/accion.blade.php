<div class="form-check form-switch">
    <form id="estadoForm" method="POST" action="{{ route('bloquear.update', $cliente->idcliente) }}">
        @method('PATCH')
        @csrf
        <input class="form-check-input toggle-estado" type="checkbox" role="switch"
            id="toggleEstado{{ $cliente->idcliente }}" data-id="{{ $cliente->idcliente }}"
            data-estado="{{ $cliente->estado }}" {{ $cliente->estado === 'a' ? 'checked' : '' }}
            onchange="changeStatus(this)">
    </form>
</div>
