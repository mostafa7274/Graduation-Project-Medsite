@extends('admin.layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="container-fluid py-4" style="margin: auto;">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="page-header d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">
                                <i class="fas fa-chart-line me-2"></i>Patient Analytics Dashboard
                            </h2>
                            <button id="exportPdfBtn" class="btn btn-danger">
                                <i class="fas fa-file-pdf me-2"></i>Export High Risk Report
                            </button>
                        </div>
                        <hr class="mt-2" style="border-color: rgba(255,255,255,0.1);">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-dark-blue text-white shadow-sm border-0">
                            <div class="card-body py-3"> {{-- Adjusted padding here --}}
                                <div class="d-flex align-items-center">
                                    <div class="icon-shape bg-primary rounded-circle me-3 p-3">
                                        <i class="fas fa-users fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Total Patients</h6>
                                        <h2 class="mb-0">{{ $totalPatients }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card bg-dark-red text-white shadow-sm border-0">
                            <div class="card-body py-3"> {{-- Adjusted padding here --}}
                                <div class="d-flex align-items-center">
                                    <div class="icon-shape bg-danger rounded-circle me-3 p-3">
                                        <i class="fas fa-exclamation-triangle fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">High Risk Patients</h6>
                                        <h2 class="mb-0">{{ $highRiskPatientsCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card bg-dark-purple text-white shadow-sm border-0">
                            <div class="card-body py-3"> {{-- Adjusted padding here --}}
                                <div class="d-flex align-items-center">
                                    <div class="icon-shape bg-warning rounded-circle me-3 p-3">
                                        <i class="fas fa-chart-bar fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Avg. Risk Score</h6>
                                        <h2 class="mb-0">{{ number_format($averageRiskScore, 2) }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-dark-blue text-white">
                                <h5 class="mb-0"><i class="fas fa-heartbeat me-2"></i>Chronic Conditions</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="chronicChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-dark-red text-white">
                                <h5 class="mb-0"><i class="fas fa-allergies me-2"></i>Allergies</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="allergyChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-dark-purple text-white">
                                <h5 class="mb-0"><i class="fas fa-pills me-2"></i>Medications</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="medicationChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pdfStatus" class="text-center small mt-2 text-muted"></div>
            </div>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6 m-auto text-center">
                <div class="copyright">
                    <p>&copy; MEDSITE. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --dark-blue: #1a365d;
            --dark-red: #63171b;
            --dark-purple: #44337a;
            --primary: #4299e1;
            --danger: #f56565;
            --warning: #f6ad55;
        }

        body {
            overflow-x: hidden;
            /* Prevent horizontal scrollbar */
        }

        .bg-dark-blue {
            background-color: var(--dark-blue);
            background: linear-gradient(135deg, var(--dark-blue) 0%, #2c5282 100%);
        }

        .bg-dark-red {
            background-color: var(--dark-red);
            background: linear-gradient(135deg, var(--dark-red) 0%, #9b2c2c 100%);
        }

        .bg-dark-purple {
            background-color: var(--dark-purple);
            background: linear-gradient(135deg, var(--dark-purple) 0%, #6b46c1 100%);
        }

        .card {
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-bottom: none;
            padding: 1rem 1.5rem;
        }

        .icon-shape {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        hr {
            opacity: 0.15;
        }

        .page-header h2 {
            font-weight: 600;
            color: #2d3748;
        }

        .btn-danger {
            background-color: #e53e3e;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c53030;
            transform: translateY(-2px);
        }
    </style>
    <script>
        // Chart configurations with consistent styling
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        };

        // Chronic Conditions Chart
        new Chart(document.getElementById('chronicChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topChronicConditions->keys()) !!},
                datasets: [{
                    label: 'Patients',
                    data: {!! json_encode($topChronicConditions->values()) !!},
                    backgroundColor: 'rgba(66, 153, 225, 0.8)',
                    borderColor: 'rgba(66, 153, 225, 1)',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: chartOptions
        });

        // Allergies Chart
        new Chart(document.getElementById('allergyChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topAllergies->keys()) !!},
                datasets: [{
                    label: 'Patients',
                    data: {!! json_encode($topAllergies->values()) !!},
                    backgroundColor: 'rgba(245, 101, 101, 0.8)',
                    borderColor: 'rgba(245, 101, 101, 1)',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: chartOptions
        });

        // Medications Chart
        new Chart(document.getElementById('medicationChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topMedications->keys()) !!},
                datasets: [{
                    label: 'Patients',
                    data: {!! json_encode($topMedications->values()) !!},
                    backgroundColor: 'rgba(102, 126, 234, 0.8)',
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: chartOptions
        });

        // Enhanced PDF Export with better UX
        document.getElementById('exportPdfBtn').addEventListener('click', async function () {
            const btn = this;
            const statusDiv = document.getElementById('pdfStatus');
            const originalText = btn.innerHTML;

            // Show loading state
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Generating Report...';
            btn.disabled = true;
            statusDiv.innerHTML = '<i class="fas fa-circle-notch fa-spin me-2"></i>Preparing your PDF document...';

            try {
                // Create a temporary form to trigger the download
                const form = document.createElement('form');
                form.method = 'GET';
                form.action = "{{ route('analytics.export.pdf') }}";
                form.target = '_blank';
                document.body.appendChild(form);
                form.submit();

                // Reset button after delay
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    statusDiv.innerHTML = '<i class="fas fa-check-circle text-success me-2"></i>Report generated successfully!';

                    // Remove status message after 5 seconds
                    setTimeout(() => {
                        statusDiv.innerHTML = '';
                    }, 5000);

                    document.body.removeChild(form);
                }, 3000);

            } catch (error) {
                console.error('Export Error:', error);
                btn.innerHTML = originalText;
                btn.disabled = false;
                statusDiv.innerHTML = '<i class="fas fa-exclamation-triangle text-danger me-2"></i>Error generating report. Please try again.';
            }
        });
    </script>
@endsection