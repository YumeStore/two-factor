@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                <div class="card-body">
                    @if (session('status') == "two-factor-authentication-disabled")
                        <div class="alert alert-danger">
                            Código de verificação desativado.
                        </div>
                    @endif 

                    @if (session('status') == "two-factor-authentication-enabled")
                        <div class="alert alert-success">
                            Código de verificação ativado.
                        </div>
                    @endif 

                    <form method="POST" action="user/two-factor-authentication">
                        @csrf 
                        @if (auth()->user()->two_factor_secret)
                            @method('DELETE')

                            <div class="p-5">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            <button class="btn btn-danger">Desativar código de verificação</button>
                        @else
                            <button class="btn btn-warning">Ativar código de verificação</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
