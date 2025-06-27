@extends('layouts.app')

@section('titulo', '')

@section('conteudo')
    <div class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 200px);">
        <div class="text-center">
            <div class="mb-5">
                <div class="mb-4 position-relative">
                    <i class="bi bi-check2-square display-1 text-primary mb-3" style="font-size: 8rem; filter: drop-shadow(0 0 25px rgba(155, 78, 221, 0.8));"></i>
                    <div class="position-absolute top-50 start-50 translate-middle" style="width: 250px; height: 250px; background: radial-gradient(circle, rgba(155, 78, 221, 0.4) 0%, transparent 70%); border-radius: 50%; z-index: -1;"></div>
                </div>
                <h1 class="display-2 fw-bold text-white mb-3" style="text-shadow: 0 0 40px rgba(155, 78, 221, 0.6);">
                    To-Do List
                </h1>
                <p class="lead text-white mb-4 fs-4" style="opacity: 0.9;">
                    Organize suas tarefas de forma simples e eficiente
                </p>
            </div>

            <div class="d-flex justify-content-center">
                <a href="{{ route('listas.index') }}" class="btn btn-primary btn-lg px-5 py-3">
                    <i class="bi bi-rocket-takeoff me-2"></i>Começar
                </a>
            </div>
        </div>
    </div>
@endsection
