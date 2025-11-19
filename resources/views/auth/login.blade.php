@extends('layouts.guest')

@section('title', 'Login - Inventory System')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .login-wrapper {
        width: 100%;
        padding: 2rem 1rem;
    }

    .login-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 20px;
        padding: 3rem 2.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-width: 440px;
        margin: 0 auto;
    }

    .login-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .logo-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .logo-icon i {
        font-size: 2.5rem;
        color: #ffffff;
    }

    .login-header h3 {
        color: #f8fafc;
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
    }

    .login-header p {
        color: #94a3b8;
        font-size: 0.95rem;
    }

    .form-label {
        color: #cbd5e1;
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .input-group {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(148, 163, 184, 0.2);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .input-group:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .input-group-text {
        background: transparent;
        border: none;
        color: #64748b;
        padding: 0.75rem 1rem;
    }

    .form-control {
        background: transparent;
        border: none;
        color: #f8fafc;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
    }

    .form-control:focus {
        background: transparent;
        color: #f8fafc;
        box-shadow: none;
    }

    .form-control::placeholder {
        color: #64748b;
    }

    .form-check {
        padding-left: 1.75rem;
    }

    .form-check-input {
        width: 1.2rem;
        height: 1.2rem;
        background-color: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(148, 163, 184, 0.3);
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-label {
        color: #cbd5e1;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .btn-login {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        color: #ffffff;
        padding: 0.875rem;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 12px;
        color: #fca5a5;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .alert-danger i {
        color: #ef4444;
    }

    .alert-danger ul {
        padding-left: 1.25rem;
        margin-bottom: 0 !important;
    }

    .alert-danger li {
        color: #fca5a5;
        font-size: 0.9rem;
    }

    .demo-info {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1.5rem;
        text-align: center;
    }

    .demo-info small {
        color: #94a3b8;
        font-size: 0.85rem;
        line-height: 1.6;
    }

    .demo-info .demo-label {
        color: #3b82f6;
        font-weight: 600;
        display: block;
        margin-bottom: 0.25rem;
    }

    @media (max-width: 576px) {
        .login-card {
            padding: 2rem 1.5rem;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
        }

        .logo-icon i {
            font-size: 2rem;
        }

        .login-header h3 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <h3>Dealear Susu RRS</h3>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle"></i>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" 
                           placeholder="Masukkan email Anda"
                           value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="Masukkan password Anda" required>
                </div>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-login w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>
        </form>

        <div class="demo-info">
            <span class="demo-label">Demo Account</span>
            <small>
                Email: admin@inventory.com<br>
                Password: password
            </small>
        </div>
    </div>
</div>
@endsection