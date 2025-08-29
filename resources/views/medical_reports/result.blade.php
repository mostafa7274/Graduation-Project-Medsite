@extends('layouts.app')

@section('content')
    <style>
        :root {
            --medsite-primary: #15616D;
            --medsite-primary-light: #1D7A8C;
            --medsite-primary-lighter: #2A9BB8;
            --medsite-primary-dark: #0D4753;
            --medsite-primary-darker: #08313A;
            --medsite-light: #e5e6eb;
            --medsite-accent: #FF7D00;
        }

        /* Main Card Styling */
        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: var(--medsite-primary) !important;
            border-bottom: 2px solid var(--medsite-primary-dark);
        }

        .card-header h2 {
            color: white;
        }

        .badge {
            background-color: var(--medsite-light) !important;
            color: var(--medsite-primary) !important;
            font-weight: 600;
            padding: 0.5em 0.8em;
        }

        /* Content Areas */
        .original-content,
        .simplified-content {
            background-color: #f5f5f5;
            border-radius: 0.5rem;
            padding: 1.5rem;
            border: 1px solid rgba(21, 97, 109, 0.1);
        }

        pre {
            margin: 0;
            white-space: pre-wrap;
            word-wrap: break-word;
            color: var(--medsite-primary-darker);
        }

        /* Buttons */
        .btn-outline-secondary {
            border-color: var(--medsite-primary);
            color: var(--medsite-primary);
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: var(--medsite-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(21, 97, 109, 0.2);
        }

        .btn-outline-secondary i {
            color: var(--medsite-primary);
        }

        .btn-outline-secondary:hover i {
            color: white;
        }

        /* Simplification Options Section */
        .bg-light {
            background-color: #f5f5f5 !important;
            border: 1px solid rgba(21, 97, 109, 0.1) !important;
        }

        /* Icons */

        .bi {
            color: #e5e6eb !important;
        }


        .card-header .bi {
            color: white;
        }

        /* Spinner */
        .spinner-border {
            color: var(--medsite-primary);
            vertical-align: middle;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }

            .original-content,
            .simplified-content {
                padding: 1rem;
            }
        }
    </style>

    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-file-earmark-medical me-2"></i>
                        Medical Report Explanation
                    </h2>
                    <span class="badge">{{ strtoupper($detail_level) }}</span>
                </div>
                @isset($filename)
                    <p class="mb-0 small text-white-50">File: {{ $filename }}</p>
                @endisset
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Original Report Column -->
                    <div class="col-md-6 mb-4">
                        <div class="h-100">
                            <h4 class="d-flex align-items-center text-primary" style="color: #15616D;">
                                <i class="bi bi-file-earmark-text me-2" style="color: #15616D;"></i>
                                Original Report
                            </h4>
                            <div class="original-content mt-2" style="max-height: 500px; overflow-y: auto;">
                                <pre style="white-space: pre-wrap; font-family: inherit;">{{ $original }}</pre>
                            </div>
                        </div>
                    </div>

                    <!-- Simplified Explanation Column -->
                    <div class="col-md-6 mb-4">
                        <div class="h-100">
                            <h4 class="d-flex align-items-center text-primary" style="color: #15616D;">
                                <i class="bi bi-chat-square-text me-2" style="color: #15616D;"></i>
                                Simplified Explanation
                            </h4>
                            <div class="simplified-content mt-2" style="max-height: 500px; overflow-y: auto;">
                                @if($detail_level === 'visual')
                                    {!! nl2br(e($simplified)) !!}
                                @else
                                    <p style="white-space: pre-wrap;">{{ $simplified }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 p-3 border rounded bg-light">
                    <div class="text-center">
                        <a href="{{ url('/upload') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Upload New Report
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Print button styling
                const printBtn = document.querySelector('[onclick="window.print()"]');
                printBtn.addEventListener('mouseover', function () {
                    this.style.backgroundColor = 'var(--medsite-primary-light)';
                    this.style.color = 'white';
                });
                printBtn.addEventListener('mouseout', function () {
                    this.style.backgroundColor = '';
                    this.style.color = '';
                });
            });
        </script>
    @endpush
@endsection