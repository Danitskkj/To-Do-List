<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To Do List - @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --amoled-black: #000000;
            --dark-black: #0a0a0a;
            --card-dark: #121212;
            --purple-1: #10002B;
            --purple-2: #240046;
            --purple-3: #3C096C;
            --purple-4: #5A189A;
            --purple-5: #7B2CBF;
            --purple-6: #9D4EDD;
            --purple-7: #C77DFF;
            --purple-8: #E0AAFF;
            --text-white: #ffffff;
            --text-primary: #f5f5f5;
            --text-secondary: #a0a0a0;
            --text-muted: #666666;
            --border-subtle: #1f1f1f;
            --border-accent: #333333;
            --glow-purple: rgba(155, 78, 221, 0.5);
        }
        
        body {
            background: var(--amoled-black);
            min-height: 100vh;
            color: var(--text-primary);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            font-weight: 400;
            line-height: 1.6;
            padding-top: 76px;
        }
        
        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.025em;
        }
        
        .display-3 {
            font-weight: 800 !important;
            text-shadow: 0 0 30px rgba(155, 78, 221, 0.3);
        }
        
        .text-primary {
            color: var(--purple-5) !important;
        }
        
        .text-white {
            color: var(--text-white) !important;
        }
        
        .text-muted {
            color: var(--text-secondary) !important;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--purple-1), var(--purple-2));
            border-bottom: 1px solid var(--border-accent);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--text-white) !important;
            text-shadow: 0 0 10px var(--glow-purple);
        }
        
        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--purple-6) !important;
            text-shadow: 0 0 8px var(--glow-purple);
        }
        
        .card {
            background: linear-gradient(145deg, var(--card-dark), var(--dark-black));
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.6);
        }
        
        .card-clickable {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        
        .card-clickable .card {
            cursor: pointer;
        }
        
        .card-clickable .card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 16px 48px rgba(155, 78, 221, 0.25), 
                        0 0 30px rgba(155, 78, 221, 0.2);
            border-color: var(--purple-5);
        }
        
        .card-clickable:hover {
            color: inherit;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--purple-4), var(--purple-5));
            border: none;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 6px 20px rgba(155, 78, 221, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--purple-5), var(--purple-6));
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(155, 78, 221, 0.6);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-outline-secondary {
            border: 2px solid var(--purple-3);
            color: var(--text-primary);
            border-radius: 12px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-outline-secondary:hover {
            background: linear-gradient(135deg, var(--purple-2), var(--purple-3));
            border-color: var(--purple-5);
            color: var(--text-white);
            box-shadow: 0 4px 15px rgba(155, 78, 221, 0.3);
            transform: translateY(-1px);
        }
        
        .btn-lg {
            padding: 16px 40px;
            font-size: 1.1rem;
        }
        
        .footer {
            background: linear-gradient(135deg, var(--purple-2), var(--purple-1));
            border-top: 1px solid var(--purple-3);
            margin-top: auto;
            backdrop-filter: blur(20px);
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
        }
        
        .container-fluid {
            padding-left: 2rem;
            padding-right: 2rem;
        }
        
        .mt-5 {
            margin-top: 3rem !important;
        }
        
        .mb-5 {
            margin-bottom: 3rem !important;
        }
        
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .mt-5 {
                margin-top: 2rem !important;
            }
            
            .mb-5 {
                margin-bottom: 2rem !important;
            }
        }
        
        .form-check-input {
            background: var(--card-dark);
            border: 2px solid var(--border-accent);
            border-radius: 8px;
            width: 1.2em;
            height: 1.2em;
            position: relative;
        }
        
        .form-check-input:checked {
            background: linear-gradient(135deg, var(--purple-4), var(--purple-5));
            border-color: var(--purple-5);
            box-shadow: 0 0 12px var(--glow-purple);
        }
        
        .form-check-input:checked::before {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 0.9em;
            line-height: 1;
        }
        
        .form-check-input:focus {
            border-color: var(--purple-5);
            box-shadow: 0 0 0 0.2rem rgba(155, 78, 221, 0.25);
        }
        
        .text-completed {
            text-decoration: line-through;
            opacity: 0.4;
            color: var(--text-muted) !important;
            position: relative;
        }
        
        .btn-delete {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: var(--text-muted);
            font-size: 1rem;
            padding: 8px 12px;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .btn-delete:hover {
            color: var(--text-white);
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--border-accent);
            transform: scale(1.05);
        }
        
        .btn-outline-danger {
            border: 1px solid var(--border-subtle);
            color: var(--text-white);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
          .btn-outline-danger:hover {
            background: rgba(220, 53, 69, 0.2);
            border-color: #dc3545;
            color: #dc3545;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
            transform: translateY(-1px);
        }
        
        .btn-outline-primary {
            border: 1px solid var(--purple-4);
            color: var(--text-white);
            border-radius: 8px;
            background: rgba(155, 78, 221, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--purple-4), var(--purple-5));
            border-color: var(--purple-5);
            color: var(--text-white);
            box-shadow: 0 4px 15px rgba(155, 78, 221, 0.4);
            transform: translateY(-1px);
        }
        
        .btn-outline-primary i {
            transition: transform 0.2s ease;
        }
        
        .btn-outline-primary:hover i {
            transform: scale(1.1);
        }
        
        /* Áreas clicáveis */
        .clickable-area {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 8px;
        }

        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, var(--purple-2), var(--purple-3)) !important;
            color: var(--text-white) !important;
            border: 1px solid var(--border-accent);
            border-radius: 8px;
            padding: 6px 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        .list-group-item {
            border-color: var(--border-subtle);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .list-group-item:hover {
            background: rgba(155, 78, 221, 0.1);
        }
        
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .card {
                border-radius: 12px;
            }
            
            .btn-group-mobile {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .navbar-brand {
                font-size: 1.1rem;
            }
            
            .d-flex.gap-2 {
                flex-wrap: wrap;
            }
            
            .badge {
                font-size: 0.8rem;
            }
            
            .display-4 {
                font-size: 2.2rem !important;
            }
            
            .display-3 {
                font-size: 2.8rem !important;
            }
        }
        
        .card-header {
            background: rgba(155, 78, 221, 0.1) !important;
            border-bottom: 1px solid var(--border-accent);
            border-radius: 16px 16px 0 0 !important;
        }
        
        .list-group-item:last-child {
            border-bottom: none;
        }
        
        .shadow-sm {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
        }
        
        .card-title {
            font-weight: 700;
            color: var(--text-white) !important;
            letter-spacing: -0.02em;
        }
        
        .card-clickable .card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-clickable .card:hover {
            transform: translateY(-2px);
        }
        
        /* Hover melhorado para cards de lista */
        .card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(155, 78, 221, 0.2) !important;
        }
        
        .card:hover .clickable-area h5 {
            color: var(--purple-6) !important;
        }
        
        .card:hover .clickable-area p {
            color: var(--purple-7) !important;
        }
        
        .btn {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
        }
        
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
        
        @media (max-width: 576px) {
            .display-3 {
                font-size: 2.2rem !important;
            }
            
            .display-4 {
                font-size: 2rem !important;
            }
            
            .task-item {
                padding: 16px;
            }
            
            .btn-primary {
                padding: 12px 24px;
                font-size: 1rem;
            }
            
            body {
                padding-top: 70px;
            }
            
            .navbar-brand {
                font-size: 1rem;
            }
            
            .container-fluid {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
        
        @media (max-width: 768px) {
            .list-actions-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .list-actions-header .btn {
                width: 100%;
                text-align: center;
            }
        }
        
        * {
            transform-style: preserve-3d;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .task-checkbox {
            transition: all 0.2s ease;
        }
        
        .task-checkbox:checked {
            transition: all 0.2s ease;
        }
        
        .glow-purple {
            filter: drop-shadow(0 0 10px rgba(155, 78, 221, 0.5));
        }
        
        .btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(155, 78, 221, 0.25);
        }
        
        .btn-outline-secondary i {
            transition: transform 0.2s ease;
        }
          .btn-outline-secondary:hover i {
            transform: translateX(-2px);
        }
        
        .task-actions .btn,
        .d-flex.gap-2 .btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .task-actions .btn:hover,
        .d-flex.gap-2 .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }
        
        /* Melhor feedback visual para botões */
        .btn-sm:hover {
            transform: translateY(-2px) scale(1.05);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--amoled-black);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--purple-2), var(--purple-5));
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--purple-5), var(--purple-6));
        }
        
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--border-subtle);
            border-radius: 12px;
            color: var(--text-white);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--purple-5);
            color: var(--text-white);
            box-shadow: 0 0 0 0.2rem rgba(155, 78, 221, 0.25);
        }
        
        .form-label {
            color: var(--text-primary);
            font-weight: 600;
        }
        
        .task-container {
            background: transparent;
            border-radius: 0;
            padding: 0;
        }
        
        .task-item {
            border: none;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 12px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            position: relative;
            cursor: pointer;
        }
        
        .task-item:hover {
            background: rgba(155, 78, 221, 0.08);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(155, 78, 221, 0.15);
        }
        
        .task-item:hover .task-content h6 {
            color: var(--purple-6) !important;
        }
        
        .task-item:hover .task-content small {
            color: var(--purple-7) !important;
        }
        
        .task-item:last-child {
            margin-bottom: 0;
        }
        
        .task-item .d-flex {
            align-items: flex-start;
            gap: 1rem;
        }
        
        .task-content {
            flex-grow: 1;
            min-width: 0;
        }
        
        .task-actions {
            flex-shrink: 0;
            align-self: flex-start;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-check2-square me-2"></i>To-Do List
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('listas.index') }}">
                        <i class="bi bi-list-ul me-1"></i>Listas
                    </a>
                    <a class="nav-link" href="{{ route('listas.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Nova Lista
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container-fluid flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
                @if(trim($__env->yieldContent('titulo')))
                    <div class="mt-4">
                        <h1 class="text-light mb-4">@yield('titulo')</h1>
                    </div>
                @endif
                
                <!-- Mensagens de Sucesso -->
                @if(session('success'))
                    <div class="alert alert-dismissible fade show mb-4" style="
                        background: linear-gradient(135deg, rgba(40, 167, 69, 0.15), rgba(25, 135, 84, 0.15));
                        border: 1px solid rgba(40, 167, 69, 0.3);
                        border-radius: 12px;
                        color: #28a745;
                        backdrop-filter: blur(10px);
                        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
                    ">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: brightness(0) invert(1);"></button>
                    </div>
                @endif
                
                @yield('conteudo')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer py-3 text-center mt-5">
        <div class="container">
            <small class="text-white-50" style="font-weight: 500;">
                Sistema de Listas de Tarefas - Desenvolvido por <span class="text-primary"><a href="https://github.com/Danitskkj">Danits</a></span>
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
