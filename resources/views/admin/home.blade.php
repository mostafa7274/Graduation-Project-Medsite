@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header  text-white" style="background-color:  #15616D ;">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="fas fa-users me-2"></i>Registered Users</h3>
                    @if(auth('admin')->check())
                        <span class="badge bg-success">Admin Mode</span>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" style="width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">Name</th>
                                <th width="25%">Email</th>
                                <th width="20%">Registered</th>
                                <!-- <th width="25%">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md me-3">
                                                @if($user->avatar)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="avatar-img"
                                                        alt="{{ $user->name }}">
                                                @else
                                                    <span class="avatar-initial bg-gradient-primary">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div>
                                                <strong>{{ $user->name }}</strong>
                                                <div class="text-muted small">{{ $user->role }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span data-bs-toggle="tooltip" title="{{ $user->created_at->format('M d, Y h:i A') }}">
                                            {{ $user->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <!-- <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('users.profile.show', $user->id) }}"
                                                        class="btn btn-sm btn-outline-primary rounded-pill" title="View Profile">
                                                        <i class="fas fa-eye me-1"></i> View
                                                    </a>
                                                </div>
                                            </td> -->
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-info-circle me-2"></i> No users found
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')
    <style>
        /* Avatar Styles */
        .avatar {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;

        }

        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            font-weight: 600;
            color: blue;
            text-transform: uppercase;
            user-select: none;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
        }

        /* Size Variations */
        .avatar-xs {
            width: 24px;
            height: 24px;
            font-size: 0.65rem;
        }

        .avatar-sm {
            width: 32px;
            height: 32px;
            font-size: 0.75rem;
        }

        .avatar-md {
            width: 48px;
            height: 48px;
            font-size: 1rem;
        }

        .avatar-lg {
            width: 64px;
            height: 64px;
            font-size: 1.25rem;
        }

        .avatar-xl {
            width: 80px;
            height: 80px;
            font-size: 1.5rem;
        }

        /* Table Enhancements */
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #6c757d;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.03);
        }

        /* Button Enhancements */
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.8125rem;
        }

        .rounded-pill {
            border-radius: 50rem !important;
        }

        /* Card Enhancements */
        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }

        body {
            overflow-x: hidden;
            /* Prevent horizontal scrollbar */
        }

        .table-responsive {
            overflow-x: auto;
            /* Enable horizontal scrolling for the table-responsive */
            max-width: 100%;
            /* Ensure the table-responsive doesn't exceed the container width */
        }

        .table {
            width: 100%;
            /* Make the table take up full width of its container */
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .footer {
            margin-top: 3rem;
            /* Add margin to the top of the footer */
            padding: 1rem 0;
            background-color: #f8f9fa;
            /* Light background for the footer */
            border-top: 1px solid #e9ecef;
            /* Subtle border at the top */
        }

        .copyright {
            padding: 0.5rem 0;
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Bootstrap tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (element) {
                return new bootstrap.Tooltip(element);
            });

            // Add hover effect to avatars
            document.querySelectorAll('.avatar').forEach(avatar => {
                avatar.addEventListener('mouseenter', () => {
                    avatar.style.transform = 'scale(1.1)';
                    avatar.style.transition = 'transform 0.2s ease';
                });
                avatar.addEventListener('mouseleave', () => {
                    avatar.style.transform = 'scale(1)';
                });
            });
        });
    </script>
@endsection