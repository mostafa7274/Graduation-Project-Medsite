@extends('layouts.app')

@section('content')



    <style>
        :root {
            --primary: #15616D;
            --primary-light: #1D8999;
            --primary-lighter: #25B1C5;
            --primary-dark: #0F4752;
            --secondary: rgb(143, 225, 244);
            --secondary-light: #FF9E33;
            --secondary-dark: #CC6400;
            --tertiary: #78290F;
            --danger: #D64045;
            --warning: #FF9F1C;
            --info: #2EC4B6;
            --light: #F8F9FA;
            --light-gray: #E9ECEF;
            --dark: #212529;
            --white: #FFFFFF;
            --gray: #6C757D;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F5F9FC !important;
            color: #333;
        }

        .medication-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .medication-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"><path d="M20,20 L80,20 L80,80 L20,80 Z M30,30 L70,30 L70,70 L30,70 Z M40,40 L60,40 L60,60 L40,60 Z"/></svg>');
            opacity: 0.3;
        }

        .medication-header h2 {
            font-weight: 600;
            position: relative;
        }

        .medication-header h2 i {
            margin-right: 0.5rem;
        }

        .medication-card {
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .medication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.1);
        }

        .medication-card .card-header {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            border-bottom: none;
            padding: 1rem 1.5rem;
            position: relative;
        }

        .medication-card .card-header::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--secondary) 0%, var(--primary-light) 100%);
        }

        .medication-card .card-body {
            padding: 1.5rem;
        }

        .medication-item {
            border-left: 4px solid var(--primary);
            padding-left: 1rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            background-color: white;
            border-radius: 0.5rem;
            padding: 1.25rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .medication-item:hover {
            border-left-color: var(--secondary);
            background-color: rgba(21, 97, 109, 0.03);
        }

        .medication-item h5 {
            color: var(--primary-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .medication-item p {
            margin-bottom: 0.3rem;
            color: #555;
        }

        .medication-item .badge {
            background-color: var(--primary-light);
            color: white;
            font-weight: 500;
            padding: 0.35em 0.65em;
            margin-right: 0.5rem;
        }

        .btn-medication {
            background-color: var(--primary);
            color: white;
            border: none;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 0.375rem;
        }

        .btn-medication:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-medication-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-medication-secondary:hover {
            background-color: var(--secondary-dark);
            color: white;
        }

        .btn-drug {
            background-color: var(--tertiary);
            color: white;
            border: none;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 0.375rem;
            margin-left: 0.5rem;
        }

        .btn-drug:hover {
            background-color: #5C1F09;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(21, 97, 109, 0.25);
        }

        .alert-medication {
            background-color: rgba(21, 97, 109, 0.1);
            border-left: 4px solid var(--primary);
            color: #333;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .empty-state h4 {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .empty-state p {
            color: #666;
            max-width: 400px;
            margin: 0 auto 1.5rem;
        }

        .pill-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            margin-right: 0.75rem;
        }

        .time-badge {
            background-color: var(--secondary-light);
            color: var(--secondary-dark);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .time-badge i {
            margin-right: 0.25rem;
            font-size: 0.9em;
        }

        .date-badge {
            background-color: var(--primary-light);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .date-badge i {
            margin-right: 0.25rem;
            font-size: 0.9em;
        }

        .note-section {
            background-color: var(--light-gray);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            border-left: 3px solid var(--warning);
        }

        .note-section p {
            margin-bottom: 0;
            color: #555;
        }

        .note-label {
            font-weight: 500;
            color: var(--warning);
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Calendar Styles */
        .calendar-container {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .calendar-title {
            font-weight: 600;
            color: var(--primary-dark);
            margin: 0;
        }

        .calendar-nav {
            display: flex;
            gap: 0.5rem;
        }

        .calendar-nav-btn {
            background-color: var(--light);
            border: none;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .calendar-nav-btn:hover {
            background-color: var(--light-gray);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: 600;
            color: var(--primary);
            padding: 0.5rem;
            font-size: 0.875rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            background-color: var(--light);
            border-radius: 0.375rem;
            padding: 0.5rem;
            transition: all 0.2s;
            position: relative;
        }

        .calendar-day:hover {
            background-color: var(--light-gray);
        }

        .calendar-day-number {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .calendar-day.today {
            background-color: var(--primary-light);
            color: white;
        }

        .calendar-day.today .calendar-day-number {
            color: white;
        }

        .calendar-medication {
            font-size: 0.7rem;
            background-color: var(--primary);
            color: white;
            padding: 0.1rem 0.3rem;
            border-radius: 0.25rem;
            margin-bottom: 0.1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            transition: all 0.2s;
        }

        .calendar-medication:hover {
            background-color: var(--primary-dark);
        }

        .calendar-day.empty {
            background-color: transparent;
            pointer-events: none;
        }

        .view-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .view-toggle-btn {
            background-color: var(--light);
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .view-toggle-btn:first-child {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .view-toggle-btn:last-child {
            border-radius: 0 0.375rem 0.375rem 0;
        }

        .view-toggle-btn.active {
            background-color: var(--primary);
            color: white;
        }

        @media (max-width: 768px) {
            .medication-header {
                padding: 1.5rem;
            }

            .medication-item {
                padding-left: 0.75rem;
            }

            .calendar-grid {
                gap: 0.25rem;
            }

            .calendar-medication {
                font-size: 0.6rem;
                padding: 0.05rem 0.2rem;
            }
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
            border: none;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            transition: all 0.2s;
            margin-left: 0.5rem;
        }

        .btn-delete:hover {
            background-color: #b52b30;
            transform: translateY(-1px);
        }

        .frequency-options {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background-color: var(--light-gray);
            border-radius: 0.5rem;
        }

        .frequency-options.show {
            display: block;
        }

        .form-check-label {
            margin-left: 0.5rem;
        }

        .date-range {
            display: none;
            margin-top: 1rem;
        }

        .date-range.show {
            display: block;
        }
    </style>





    <body>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="medication-header text-center">
                        <h2>
                            <span class="pill-icon">
                                <i class="bi bi-capsule-pill"></i>
                            </span>
                            My Medication Plan
                        </h2>
                        <p class="mb-0">Manage your medications and stay on track with your treatment</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-medication alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="view-toggle">
                        <button class="view-toggle-btn active" id="list-view-btn">
                            <i class="bi bi-list-ul me-1"></i> List View
                        </button>
                        <button class="view-toggle-btn" id="calendar-view-btn">
                            <i class="bi bi-calendar3 me-1"></i> Calendar View
                        </button>
                    </div>

                    <!-- Calendar View (Initially Hidden) -->
                    <div class="calendar-container d-none" id="calendar-view">
                        <div class="calendar-header">
                            <h3 class="calendar-title" id="calendar-month-year">June 2023</h3>
                            <div class="calendar-nav">
                                <button class="calendar-nav-btn" id="prev-month">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <button class="calendar-nav-btn" id="next-month">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="calendar-grid" id="calendar-days-header">
                            <div class="calendar-day-header">Sun</div>
                            <div class="calendar-day-header">Mon</div>
                            <div class="calendar-day-header">Tue</div>
                            <div class="calendar-day-header">Wed</div>
                            <div class="calendar-day-header">Thu</div>
                            <div class="calendar-day-header">Fri</div>
                            <div class="calendar-day-header">Sat</div>
                        </div>
                        <div class="calendar-grid" id="calendar-days">
                            <!-- Calendar days will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- List View (Initially Visible) -->
                    <div id="list-view">
                        <div class="medication-card" style="box-shadow: 0 4px 20px #15616D;">
                            <div class="card-header">
                                <i class="bi bi-plus-circle me-2"></i> Add New Medication
                            </div>
                            <div class="card-body" style="background-color: white;">
                                <form method="POST" action="{{ route('medication-plan.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="medication_name" class="form-label">Medication Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-capsule text-primary"></i>
                                                </span>
                                                <input type="text" name="medication_name" class="form-control"
                                                    placeholder="e.g., Paracetamol" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="dosage" class="form-label">Dosage</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-droplet text-primary"></i>
                                                </span>
                                                <input type="text" name="dosage" class="form-control"
                                                    placeholder="e.g., 1 tablet">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="time" class="form-label">Time</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-clock text-primary"></i>
                                                </span>
                                                <input type="time" name="time" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Today's Date</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-calendar text-primary"></i>
                                                </span>
                                                <div class="form-control">
                                                    {{ now()->format('F j, Y') }} <!-- Output: "May 15, 2025" -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="repeat-checkbox">
                                        <label class="form-check-label" for="repeat-checkbox">Repeat Daily</label>
                                    </div>

                                    <div class="frequency-options" id="frequency-options">
                                        <div class="mb-3">
                                            <label class="form-label">Frequency</label>
                                            <div class="form-check">

                                                <input class="form-check-input" type="radio" name="frequency" id="daily"
                                                    value="daily" checked>

                                                <label class="form-check-label" for="daily">
                                                    Daily
                                                </label>
                                            </div>
                                        </div>
                                        <div class="date-range" id="date-range">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input type="date" name="start_date" id="start_date"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="end_date" class="form-label">End Date</label>
                                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                                        required>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note (optional)</label>
                                        <textarea name="note" rows="3" class="form-control"
                                            placeholder="Additional information, special instructions..."></textarea>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-medication">
                                            <i class="bi bi-plus-circle me-2"></i> Add Medication
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <h2 class="text-primary mb-4">
                            <i class="bi bi-list-check me-2"></i> Your Scheduled Medications
                        </h2>

                        <!-- @forelse($plans as $plan)
                                                                                                        @php
                                                                                                            $isDaily = $plan->note && str_starts_with($plan->note, 'DAILY SCHEDULE');
                                                                                                            $dates = $isDaily ? [
                                                                                                                'start' => trim(explode("\n", $plan->note)[1] ?? ''),
                                                                                                                'end' => trim(explode("\n", $plan->note)[2] ?? '')
                                                                                                            ] : null;
                                                                                                            $cleanNote = $isDaily ? implode("\n", array_slice(explode("\n", $plan->note), 3)) : $plan->note;
                                                                                                        @endphp

                                                                                                        <div class="medication-item" style="box-shadow: 0 4px 20px #15616D;">
                                                                                                            <div class="d-flex justify-content-between align-items-start">
                                                                                                                <div>
                                                                                                                    <h5>
                                                                                                                        <i class="bi bi-capsule text-primary me-2"></i>
                                                                                                                        {{ $plan->medication_name }}
                                                                                                                        @if($isDaily)
                                                                                                                            <span class="badge bg-success ms-2">
                                                                                                                                <i class="bi bi-arrow-repeat me-1"></i> Daily
                                                                                                                            </span>
                                                                                                                        @endif
                                                                                                                    </h5>
                                                                                                                    <p class="mb-2">
                                                                                                                        <span class="badge">
                                                                                                                            <i class="bi bi-prescription me-1"></i> Dosage:
                                                                                                                            {{ $plan->dosage ?? 'Not specified' }}
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div class="text-end">
                                                                                                                    <span class="time-badge mb-2">
                                                                                                                        <i class="bi bi-clock"></i> {{ $plan->time }}
                                                                                                                    </span>
                                                                                                                    <br>
                                                                                                                    @if($isDaily)
                                                                                                                        <span class="date-badge">
                                                                                                                            <i class="bi bi-calendar-range me-1"></i>
                                                                                                                            {{ str_replace('From: ', '', $dates['start']) }} to
                                                                                                                            {{ str_replace('To: ', '', $dates['end']) }}
                                                                                                                        </span>
                                                                                                                    @else
                                                                                                                        <span class="date-badge">
                                                                                                                            <i class="bi bi-calendar"></i> {{ $plan->date }}
                                                                                                                        </span>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            @if(!empty(trim($cleanNote)))
                                                                                                                <div class="note-section">
                                                                                                                    <span class="note-label">
                                                                                                                        <i class="bi bi-journal-text me-1"></i> Note
                                                                                                                    </span>
                                                                                                                    <p>{{ $cleanNote }}</p>
                                                                                                                </div>
                                                                                                            @endif

                                                                                                            <div class="d-flex justify-content-end mt-2">
                                                                                                                <form action="{{ route('medication-plan.destroy', $plan->id) }}" method="POST" class="d-inline">
                                                                                                                    @csrf
                                                                                                                    @method('DELETE')
                                                                                                                    <button type="submit" class="btn btn-delete">
                                                                                                                        <i class="bi bi-trash me-1"></i> Remove
                                                                                                                    </button>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @empty
                                                                                                        <div class="empty-state">
                                                                                                            <i class="bi bi-capsule"></i>
                                                                                                            <h4>No Medications Scheduled</h4>
                                                                                                            <p>You haven't added any medications to your plan yet. Add your first medication to get started.</p>

                                                                                                        </div>
                                                                                                    @endforelse -->

                        @forelse($plans as $plan)
                            <div class="medication-item" style="box-shadow: 0 4px 20px #15616D;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5>
                                            <i class="bi bi-capsule text-primary me-2"></i>
                                            {{ $plan->medication_name }}
                                            @if($plan->is_daily ?? false)
                                                <span class="badge bg-success ms-2">
                                                    <i class="bi bi-arrow-repeat me-1"></i> Daily
                                                </span>
                                            @endif
                                        </h5>
                                        <p class="mb-2">
                                            <span class="badge">
                                                <i class="bi bi-prescription me-1"></i> Dosage:
                                                {{ $plan->dosage ?? 'Not specified' }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        <span class="time-badge mb-2">
                                            <i class="bi bi-clock"></i> {{ $plan->time }}
                                        </span>
                                        <br>
                                        @if($plan->is_daily ?? false)
                                            <span class="date-badge">
                                                <i class="bi bi-calendar-range me-1"></i>
                                                {{ $plan->start_date }} to {{ $plan->end_date }}
                                            </span>
                                        @else
                                            <span class="date-badge">
                                                <i class="bi bi-calendar"></i> {{ $plan->date }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if(!empty(trim($plan->note)) && !($plan->is_daily ?? false))
                                    <div class="note-section">
                                        <span class="note-label">
                                            <i class="bi bi-journal-text me-1"></i> Note
                                        </span>
                                        <p>{{ $plan->note }}</p>
                                    </div>
                                @elseif(!empty(trim($plan->note)) && count(explode("\n", $plan->note)) > 3)
                                    <div class="note-section">
                                        <span class="note-label">
                                            <i class="bi bi-journal-text me-1"></i> Note
                                        </span>
                                        <p>{{ implode("\n", array_slice(explode("\n", $plan->note), 3)) }}</p>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-end mt-2">
                                    <form action="{{ route('medication-plan.destroy', $plan->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">
                                            <i class="bi bi-trash me-1"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="bi bi-capsule"></i>
                                <h4>No Medications Scheduled</h4>
                                <p>You haven't added any medications to your plan yet. Add your first medication to get started.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Start -->
        <footer class="footer section gray-bg">
            <div class="container">
                <div class="footer-btm py-4 mt-5">
                    <div class="row align-items-center ">
                        <div class="copyright">
                            <div class="container text-center">
                                <div class="copyright">
                                    <p>&copy; MEDSITE. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End -->

        <!--
                                                                                        <script>
                                                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                                                // View toggle functionality
                                                                                                const listViewBtn = document.getElementById('list-view-btn');
                                                                                                const calendarViewBtn = document.getElementById('calendar-view-btn');
                                                                                                const listView = document.getElementById('list-view');
                                                                                                const calendarView = document.getElementById('calendar-view');

                                                                                                listViewBtn.addEventListener('click', function () {
                                                                                                    listView.classList.remove('d-none');
                                                                                                    calendarView.classList.add('d-none');
                                                                                                    listViewBtn.classList.add('active');
                                                                                                    calendarViewBtn.classList.remove('active');
                                                                                                });

                                                                                                calendarViewBtn.addEventListener('click', function () {
                                                                                                    listView.classList.add('d-none');
                                                                                                    calendarView.classList.remove('d-none');
                                                                                                    listViewBtn.classList.remove('active');
                                                                                                    calendarViewBtn.classList.add('active');
                                                                                                    generateCalendar(currentMonth, currentYear);
                                                                                                });

                                                                                                // Calendar functionality
                                                                                                let currentMonth = new Date().getMonth();
                                                                                                let currentYear = new Date().getFullYear();
                                                                                                const monthNames = ["January", "February", "March", "April", "May", "June",
                                                                                                    "July", "August", "September", "October", "November", "December"
                                                                                                ];
                                                                                                const medications = @json($plans);

                                                                                                // Initialize calendar
                                                                                                generateCalendar(currentMonth, currentYear);

                                                                                                // Navigation buttons
                                                                                                document.getElementById('prev-month').addEventListener('click', function () {
                                                                                                    currentMonth--;
                                                                                                    if (currentMonth < 0) {
                                                                                                        currentMonth = 11;
                                                                                                        currentYear--;
                                                                                                    }
                                                                                                    generateCalendar(currentMonth, currentYear);
                                                                                                });

                                                                                                document.getElementById('next-month').addEventListener('click', function () {
                                                                                                    currentMonth++;
                                                                                                    if (currentMonth > 11) {
                                                                                                        currentMonth = 0;
                                                                                                        currentYear++;
                                                                                                    }
                                                                                                    generateCalendar(currentMonth, currentYear);
                                                                                                });

                                                                                                function generateCalendar(month, year) {
                                                                                                    const calendarDays = document.getElementById('calendar-days');
                                                                                                    calendarDays.innerHTML = '';
                                                                                                    document.getElementById('calendar-month-year').textContent = `${monthNames[month]} ${year}`;

                                                                                                    const firstDay = new Date(year, month, 1).getDay();
                                                                                                    const daysInMonth = new Date(year, month + 1, 0).getDate();
                                                                                                    const today = new Date();

                                                                                                    // Create calendar grid with 6 rows to ensure consistent layout
                                                                                                    const totalCells = 42; // 6 rows x 7 days
                                                                                                    let dayCounter = 1;

                                                                                                    for (let i = 0; i < totalCells; i++) {
                                                                                                        const dayElement = document.createElement('div');

                                                                                                        // Empty cells before first day of month
                                                                                                        if (i < firstDay || dayCounter > daysInMonth) {
                                                                                                            dayElement.classList.add('calendar-day', 'empty');
                                                                                                            calendarDays.appendChild(dayElement);
                                                                                                            continue;
                                                                                                        }

                                                                                                        // Cells with actual days
                                                                                                        dayElement.classList.add('calendar-day');

                                                                                                        const dayNumber = document.createElement('div');
                                                                                                        dayNumber.classList.add('calendar-day-number');
                                                                                                        dayNumber.textContent = dayCounter;
                                                                                                        dayElement.appendChild(dayNumber);

                                                                                                        // Highlight today
                                                                                                        if (dayCounter === today.getDate() &&
                                                                                                            month === today.getMonth() &&
                                                                                                            year === today.getFullYear()) {
                                                                                                            dayElement.classList.add('today');
                                                                                                        }

                                                                                                        // Add medications for this day
                                                                                                        const currentDate = new Date(year, month, dayCounter);
                                                                                                        const currentDateString = formatDate(currentDate);

                                                                                                        medications.forEach(med => {
                                                                                                            const medDate = new Date(med.date);
                                                                                                            const medDateString = formatDate(medDate);
                                                                                                            let medEndDate = medDate;

                                                                                                            // Check for daily schedule
                                                                                                            const isDaily = med.note && med.note.startsWith('DAILY SCHEDULE');
                                                                                                            if (isDaily) {
                                                                                                                const lines = med.note.split('\n');
                                                                                                                if (lines.length >= 3) {
                                                                                                                    try {
                                                                                                                        const endDateStr = lines[2].replace('To:', '').trim();
                                                                                                                        medEndDate = new Date(endDateStr);
                                                                                                                    } catch (e) {
                                                                                                                        console.error('Error parsing end date:', e);
                                                                                                                    }
                                                                                                                }
                                                                                                            }

                                                                                                            // Format dates for comparison (YYYY-MM-DD)
                                                                                                            const currentFormatted = formatDate(currentDate);
                                                                                                            const medFormatted = formatDate(medDate);
                                                                                                            const endFormatted = formatDate(medEndDate);

                                                                                                            // Show medication if within date range
                                                                                                            if (currentFormatted >= medFormatted && currentFormatted <= endFormatted) {
                                                                                                                if (isDaily || currentFormatted === medFormatted) {
                                                                                                                    const medication = document.createElement('div');
                                                                                                                    medication.classList.add('calendar-medication');
                                                                                                                    medication.textContent = `${med.medication_name} ${med.time}`;

                                                                                                                    // Tooltip with details
                                                                                                                    let displayNote = med.note || 'None';
                                                                                                                    if (isDaily) {
                                                                                                                        const noteLines = med.note.split('\n');
                                                                                                                        displayNote = noteLines.slice(3).join('\n') || 'None';
                                                                                                                    }
                                                                                                                    medication.title = `Dosage: ${med.dosage}\nNote: ${displayNote}`;

                                                                                                                    dayElement.appendChild(medication);
                                                                                                                }
                                                                                                            }
                                                                                                        });

                                                                                                        calendarDays.appendChild(dayElement);
                                                                                                        dayCounter++;
                                                                                                    }
                                                                                                }

                                                                                                // Helper function to format dates as YYYY-MM-DD for reliable comparison
                                                                                                function formatDate(date) {
                                                                                                    const d = new Date(date);
                                                                                                    let month = '' + (d.getMonth() + 1);
                                                                                                    let day = '' + d.getDate();
                                                                                                    const year = d.getFullYear();

                                                                                                    if (month.length < 2)
                                                                                                        month = '0' + month;
                                                                                                    if (day.length < 2)
                                                                                                        day = '0' + day;

                                                                                                    return [year, month, day].join('-');
                                                                                                }

                                                                                                // Toggle frequency options
                                                                                                const repeatCheckbox = document.getElementById('repeat-checkbox');
                                                                                                if (repeatCheckbox) {
                                                                                                    const frequencyOptions = document.getElementById('frequency-options');
                                                                                                    const dateRange = document.getElementById('date-range');
                                                                                                    const singleDateInput = document.getElementById('single-date');

                                                                                                    repeatCheckbox.addEventListener('change', function () {
                                                                                                        if (this.checked) {
                                                                                                            frequencyOptions.classList.add('show');
                                                                                                            dateRange.classList.add('show');
                                                                                                            singleDateInput.disabled = true;
                                                                                                            singleDateInput.value = '';
                                                                                                        } else {
                                                                                                            frequencyOptions.classList.remove('show');
                                                                                                            dateRange.classList.remove('show');
                                                                                                            singleDateInput.disabled = false;
                                                                                                        }
                                                                                                    });

                                                                                                    // Set today's date as default
                                                                                                    const today = new Date().toISOString().split('T')[0];
                                                                                                    singleDateInput.value = today;
                                                                                                    document.getElementById('start_date').value = today;
                                                                                                }

                                                                                                // Refresh calendar when form is submitted
                                                                                                document.querySelector('form')?.addEventListener('submit', function () {
                                                                                                    setTimeout(() => {
                                                                                                        generateCalendar(currentMonth, currentYear);
                                                                                                    }, 500);
                                                                                                });
                                                                                            });
                                                                                        </script> -->

        <!-- <script>
                                                                                    document.addEventListener('DOMContentLoaded', function () {
                                                                                        // View toggle functionality
                                                                                        const listViewBtn = document.getElementById('list-view-btn');
                                                                                        const calendarViewBtn = document.getElementById('calendar-view-btn');
                                                                                        const listView = document.getElementById('list-view');
                                                                                        const calendarView = document.getElementById('calendar-view');

                                                                                        listViewBtn.addEventListener('click', function () {
                                                                                            listView.classList.remove('d-none');
                                                                                            calendarView.classList.add('d-none');
                                                                                            listViewBtn.classList.add('active');
                                                                                            calendarViewBtn.classList.remove('active');
                                                                                        });

                                                                                        calendarViewBtn.addEventListener('click', function () {
                                                                                            listView.classList.add('d-none');
                                                                                            calendarView.classList.remove('d-none');
                                                                                            listViewBtn.classList.remove('active');
                                                                                            calendarViewBtn.classList.add('active');
                                                                                            generateCalendar(currentMonth, currentYear);
                                                                                        });

                                                                                        // Calendar functionality
                                                                                        let currentMonth = new Date().getMonth();
                                                                                        let currentYear = new Date().getFullYear();
                                                                                        const monthNames = ["January", "February", "March", "April", "May", "June",
                                                                                            "July", "August", "September", "October", "November", "December"
                                                                                        ];
                                                                                        const medications = @json($plans);

                                                                                        // Initialize calendar
                                                                                        generateCalendar(currentMonth, currentYear);

                                                                                        // Navigation buttons
                                                                                        document.getElementById('prev-month').addEventListener('click', function () {
                                                                                            currentMonth--;
                                                                                            if (currentMonth < 0) {
                                                                                                currentMonth = 11;
                                                                                                currentYear--;
                                                                                            }
                                                                                            generateCalendar(currentMonth, currentYear);
                                                                                        });

                                                                                        document.getElementById('next-month').addEventListener('click', function () {
                                                                                            currentMonth++;
                                                                                            if (currentMonth > 11) {
                                                                                                currentMonth = 0;
                                                                                                currentYear++;
                                                                                            }
                                                                                            generateCalendar(currentMonth, currentYear);
                                                                                        });

                                                                                        function generateCalendar(month, year) {
                                                                                            const calendarDays = document.getElementById('calendar-days');
                                                                                            calendarDays.innerHTML = '';
                                                                                            document.getElementById('calendar-month-year').textContent = `${monthNames[month]} ${year}`;

                                                                                            const firstDay = new Date(year, month, 1).getDay();
                                                                                            const daysInMonth = new Date(year, month + 1, 0).getDate();
                                                                                            const today = new Date();

                                                                                            // Add empty cells for days before the first day of the month
                                                                                            for (let i = 0; i < firstDay; i++) {
                                                                                                const emptyDay = document.createElement('div');
                                                                                                emptyDay.classList.add('calendar-day', 'empty');
                                                                                                calendarDays.appendChild(emptyDay);
                                                                                            }

                                                                                            // Add cells for each day of the month
                                                                                            for (let day = 1; day <= daysInMonth; day++) {
                                                                                                const dayElement = document.createElement('div');
                                                                                                dayElement.classList.add('calendar-day');

                                                                                                const dayNumber = document.createElement('div');
                                                                                                dayNumber.classList.add('calendar-day-number');
                                                                                                dayNumber.textContent = day;
                                                                                                dayElement.appendChild(dayNumber);

                                                                                                // Check if today
                                                                                                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                                                                                                    dayElement.classList.add('today');
                                                                                                }

                                                                                                // Format current date as YYYY-MM-DD for comparison
                                                                                                const currentDate = new Date(year, month, day);
                                                                                                const currentDateString = formatDate(currentDate);

                                                                                                // Add medications for this day
                                                                                                medications.forEach(med => {
                                                                                                    const medDate = new Date(med.date);
                                                                                                    const medDateString = med.formatted_date || formatDate(medDate);
                                                                                                    let medEndDateString = medDateString;

                                                                                                    if (med.is_daily) {
                                                                                                        medEndDateString = formatDate(new Date(med.end_date));
                                                                                                    }

                                                                                                    // Show medication if current date is within the medication's date range
                                                                                                    if (currentDateString >= medDateString && currentDateString <= medEndDateString) {
                                                                                                        // For single medications, only show on exact date
                                                                                                        if (!med.is_daily && currentDateString !== medDateString) {
                                                                                                            return;
                                                                                                        }

                                                                                                        const medication = document.createElement('div');
                                                                                                        medication.classList.add('calendar-medication');
                                                                                                        medication.textContent = `${med.medication_name} ${med.time}`;

                                                                                                        // Tooltip with details
                                                                                                        let displayNote = med.note || 'None';
                                                                                                        if (med.is_daily) {
                                                                                                            const noteLines = med.note.split('\n');
                                                                                                            displayNote = noteLines.slice(3).join('\n') || 'None';
                                                                                                        }
                                                                                                        medication.title = `Dosage: ${med.dosage}\nNote: ${displayNote}`;

                                                                                                        dayElement.appendChild(medication);
                                                                                                    }
                                                                                                });

                                                                                                calendarDays.appendChild(dayElement);
                                                                                            }
                                                                                        }

                                                                                        // Helper function to format dates as YYYY-MM-DD
                                                                                        function formatDate(date) {
                                                                                            if (!(date instanceof Date)) {
                                                                                                date = new Date(date);
                                                                                            }
                                                                                            const year = date.getFullYear();
                                                                                            const month = String(date.getMonth() + 1).padStart(2, '0');
                                                                                            const day = String(date.getDate()).padStart(2, '0');
                                                                                            return `${year}-${month}-${day}`;
                                                                                        }

                                                                                        // Toggle frequency options
                                                                                        const repeatCheckbox = document.getElementById('repeat-checkbox');
                                                                                        if (repeatCheckbox) {
                                                                                            const frequencyOptions = document.getElementById('frequency-options');
                                                                                            const dateRange = document.getElementById('date-range');
                                                                                            const singleDateInput = document.getElementById('single-date');

                                                                                            repeatCheckbox.addEventListener('change', function () {
                                                                                                if (this.checked) {
                                                                                                    frequencyOptions.classList.add('show');
                                                                                                    dateRange.classList.add('show');
                                                                                                    singleDateInput.disabled = true;
                                                                                                    singleDateInput.value = '';
                                                                                                } else {
                                                                                                    frequencyOptions.classList.remove('show');
                                                                                                    dateRange.classList.remove('show');
                                                                                                    singleDateInput.disabled = false;
                                                                                                }
                                                                                            });

                                                                                            // Set today's date as default
                                                                                            const today = new Date().toISOString().split('T')[0];
                                                                                            singleDateInput.value = today;
                                                                                            document.getElementById('start_date').value = today;
                                                                                        }

                                                                                        // Form submission
                                                                                        document.querySelector('form')?.addEventListener('submit', function (e) {
                                                                                            // Let the form submit normally
                                                                                            // The page will refresh and show the new medication
                                                                                        });
                                                                                    });
                                                                                </script> -->

        <!--  -->

    <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // View toggle functionality
                    const listViewBtn = document.getElementById('list-view-btn');
                    const calendarViewBtn = document.getElementById('calendar-view-btn');
                    const listView = document.getElementById('list-view');
                    const calendarView = document.getElementById('calendar-view');

                    listViewBtn.addEventListener('click', function () {
                        listView.classList.remove('d-none');
                        calendarView.classList.add('d-none');
                        listViewBtn.classList.add('active');
                        calendarViewBtn.classList.remove('active');
                    });

                    calendarViewBtn.addEventListener('click', function () {
                        listView.classList.add('d-none');
                        calendarView.classList.remove('d-none');
                        listViewBtn.classList.remove('active');
                        calendarViewBtn.classList.add('active');
                        generateCalendar(currentMonth, currentYear);
                    });

                    // Calendar functionality
                    let currentMonth = new Date().getMonth();
                    let currentYear = new Date().getFullYear();
                    const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];
                    const medications = @json($plans);

                    // Initialize calendar
                    generateCalendar(currentMonth, currentYear);

                    // Navigation buttons
                    document.getElementById('prev-month').addEventListener('click', function () {
                        currentMonth--;
                        if (currentMonth < 0) {
                            currentMonth = 11;
                            currentYear--;
                        }
                        generateCalendar(currentMonth, currentYear);
                    });

                    document.getElementById('next-month').addEventListener('click', function () {
                        currentMonth++;
                        if (currentMonth > 11) {
                            currentMonth = 0;
                            currentYear++;
                        }
                        generateCalendar(currentMonth, currentYear);
                    });

                    function generateCalendar(month, year) {
                        const calendarDays = document.getElementById('calendar-days');
                        calendarDays.innerHTML = '';
                        document.getElementById('calendar-month-year').textContent = `${monthNames[month]} ${year}`;

                        const firstDay = new Date(year, month, 1).getDay();
                        const daysInMonth = new Date(year, month + 1, 0).getDate();
                        const today = new Date();

                        // Create calendar grid with 6 rows to ensure consistent layout
                        const totalCells = 42; // 6 rows x 7 days
                        let dayCounter = 1;

                        for (let i = 0; i < totalCells; i++) {
                            const dayElement = document.createElement('div');

                            // Empty cells before first day of month
                            if (i < firstDay || dayCounter > daysInMonth) {
                                dayElement.classList.add('calendar-day', 'empty');
                                calendarDays.appendChild(dayElement);
                                continue;
                            }

                            // Cells with actual days
                            dayElement.classList.add('calendar-day');

                            const dayNumber = document.createElement('div');
                            dayNumber.classList.add('calendar-day-number');
                            dayNumber.textContent = dayCounter;
                            dayElement.appendChild(dayNumber);

                            // Highlight today
                            if (dayCounter === today.getDate() &&
                                month === today.getMonth() &&
                                year === today.getFullYear()) {
                                dayElement.classList.add('today');
                            }

                            // Format current date as YYYY-MM-DD for comparison
                            const currentDate = new Date(year, month, dayCounter);
                            const currentDateString = formatDate(currentDate);

                            // Add medications for this day
                            medications.forEach(med => {
                                const medDateString = med.formatted_date || formatDate(new Date(med.date));
                                let medEndDateString = medDateString;

                                if (med.is_daily) {
                                    medEndDateString = formatDate(new Date(med.end_date));
                                }

                                // Show medication if current date is within the medication's date range
                                if (currentDateString >= medDateString && currentDateString <= medEndDateString) {
                                    // For single medications, only show on exact date
                                    if (!med.is_daily && currentDateString !== medDateString) {
                                        return;
                                    }

                                    const medication = document.createElement('div');
                                    medication.classList.add('calendar-medication');
                                    medication.textContent = `${med.medication_name} ${med.time}`;

                                    // Tooltip with details
                                    let displayNote = med.note || 'None';
                                    if (med.is_daily) {
                                        const noteLines = med.note.split('\n');
                                        displayNote = noteLines.slice(3).join('\n') || 'None';
                                    }
                                    medication.title = `Dosage: ${med.dosage}\nNote: ${displayNote}`;

                                    dayElement.appendChild(medication);
                                }
                            });

                            calendarDays.appendChild(dayElement);
                            dayCounter++;
                        }
                    }

                    // Helper function to format dates as YYYY-MM-DD
                    function formatDate(date) {
                        if (!(date instanceof Date)) {
                            date = new Date(date);
                        }
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    }

                    // Toggle frequency options
                    const repeatCheckbox = document.getElementById('repeat-checkbox');
                    if (repeatCheckbox) {
                        const frequencyOptions = document.getElementById('frequency-options');
                        const dateRange = document.getElementById('date-range');
                        const singleDateInput = document.getElementById('single-date');

                        repeatCheckbox.addEventListener('change', function () {
                            if (this.checked) {
                                frequencyOptions.classList.add('show');
                                dateRange.classList.add('show');
                                singleDateInput.disabled = true;
                                singleDateInput.value = '';
                            } else {
                                frequencyOptions.classList.remove('show');
                                dateRange.classList.remove('show');
                                singleDateInput.disabled = false;
                            }
                        });

                        // Set today's date as default
                        const today = new Date().toISOString().split('T')[0];
                        singleDateInput.value = today;
                        document.getElementById('start_date').value = today;
                    }
                });

                document.addEventListener('DOMContentLoaded', function () {
                    // Set today's date when page loads
                    const today = new Date().toISOString().split('T')[0];
                    const startDateInput = document.getElementById('start_date');
                    const endDateInput = document.getElementById('end_date');
                    const dailyRadio = document.getElementById('daily');
                    const repeatCheckbox = document.getElementById('repeat-checkbox');
                    const frequencyOptions = document.getElementById('frequency-options');
                    const dateRange = document.getElementById('date-range');

                    // Initialize with today's date
                    startDateInput.value = today;

                    // Toggle frequency options when repeat checkbox changes
                    if (repeatCheckbox) {
                        repeatCheckbox.addEventListener('change', function () {
                            if (this.checked) {
                                frequencyOptions.classList.add('show');
                                dateRange.classList.add('show');

                                // Auto-select Daily option if not selected
                                if (!dailyRadio.checked) {
                                    dailyRadio.checked = true;
                                    dailyRadio.dispatchEvent(new Event('change'));
                                }

                                // Set today's date as default
                                startDateInput.value = today;
                            } else {
                                frequencyOptions.classList.remove('show');
                                dateRange.classList.remove('show');
                            }
                        });
                    }

                    // Set today's date when Daily is selected
                    if (dailyRadio) {
                        dailyRadio.addEventListener('change', function () {
                            if (this.checked) {
                                startDateInput.value = today;
                            }
                        });
                    }

                    // Enhanced form validation
                    document.querySelector('form').addEventListener('submit', function (e) {
                        const repeatChecked = repeatCheckbox.checked;
                        const startDate = startDateInput.value;
                        const endDate = endDateInput.value;

                        if (repeatChecked) {
                            // Validate Daily option is selected
                            if (!dailyRadio.checked) {
                                e.preventDefault();
                                alert('Please select "Daily" frequency for repeated medications');
                                dailyRadio.focus();
                                return false;
                            }

                            // Validate dates are filled
                            if (!startDate || !endDate) {
                                e.preventDefault();
                                alert('Please select both start and end dates for daily medication');
                                if (!startDate) startDateInput.focus();
                                else endDateInput.focus();
                                return false;
                            }

                            // Validate date range
                            if (new Date(startDate) > new Date(endDate)) {
                                e.preventDefault();
                                alert('End date must be after start date');
                                endDateInput.focus();
                                return false;
                            }
                        }
                    });

                    // Additional UX improvement: Auto-set end date 7 days from start
                    startDateInput.addEventListener('change', function () {
                        if (repeatCheckbox.checked && dailyRadio.checked && startDateInput.value && !endDateInput.value) {
                            const startDate = new Date(startDateInput.value);
                            const endDate = new Date(startDate);
                            endDate.setDate(startDate.getDate() + 7); // Default 7 day duration
                            endDateInput.value = endDate.toISOString().split('T')[0];
                        }
                    });
                });
            </script>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // View toggle functionality
                const listViewBtn = document.getElementById('list-view-btn');
                const calendarViewBtn = document.getElementById('calendar-view-btn');
                const listView = document.getElementById('list-view');
                const calendarView = document.getElementById('calendar-view');

                listViewBtn.addEventListener('click', function () {
                    listView.classList.remove('d-none');
                    calendarView.classList.add('d-none');
                    listViewBtn.classList.add('active');
                    calendarViewBtn.classList.remove('active');
                });

                calendarViewBtn.addEventListener('click', function () {
                    listView.classList.add('d-none');
                    calendarView.classList.remove('d-none');
                    listViewBtn.classList.remove('active');
                    calendarViewBtn.classList.add('active');
                    generateCalendar(currentMonth, currentYear);
                });

                // Calendar functionality - FIXED DATE INITIALIZATION
                const now = new Date();
                let currentMonth = now.getMonth();
                let currentYear = now.getFullYear();
                const todayDate = now.getDate(); // Get today's day of the month
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const medications = @json($plans);

                // Initialize calendar
                generateCalendar(currentMonth, currentYear);

                // Navigation buttons
                document.getElementById('prev-month').addEventListener('click', function () {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

                document.getElementById('next-month').addEventListener('click', function () {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

                function generateCalendar(month, year) {
                    const calendarDays = document.getElementById('calendar-days');
                    calendarDays.innerHTML = '';
                    document.getElementById('calendar-month-year').textContent = `${monthNames[month]} ${year}`;

                    const firstDay = new Date(year, month, 1).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    // Create calendar grid with 6 rows to ensure consistent layout
                    const totalCells = 42; // 6 rows x 7 days
                    let dayCounter = 1;

                    for (let i = 0; i < totalCells; i++) {
                        const dayElement = document.createElement('div');

                        // Empty cells before first day of month
                        if (i < firstDay || dayCounter > daysInMonth) {
                            dayElement.classList.add('calendar-day', 'empty');
                            calendarDays.appendChild(dayElement);
                            continue;
                        }

                        // Cells with actual days
                        dayElement.classList.add('calendar-day');

                        const dayNumber = document.createElement('div');
                        dayNumber.classList.add('calendar-day-number');
                        dayNumber.textContent = dayCounter;
                        dayElement.appendChild(dayNumber);

                        // Highlight today - FIXED DATE COMPARISON
                        if (dayCounter === todayDate &&
                            month === currentMonth &&
                            year === currentYear) {
                            dayElement.classList.add('today');
                        }

                        // Format current date as YYYY-MM-DD for comparison
                        const currentDate = new Date(year, month, dayCounter);
                        const currentDateString = formatDate(currentDate);

                        // Add medications for this day
                        medications.forEach(med => {
                            const medDateString = med.formatted_date || formatDate(new Date(med.date));
                            let medEndDateString = medDateString;

                            if (med.is_daily) {
                                medEndDateString = formatDate(new Date(med.end_date));
                            }

                            // Show medication if current date is within the medication's date range
                            if (currentDateString >= medDateString && currentDateString <= medEndDateString) {
                                // For single medications, only show on exact date
                                if (!med.is_daily && currentDateString !== medDateString) {
                                    return;
                                }

                                const medication = document.createElement('div');
                                medication.classList.add('calendar-medication');
                                medication.textContent = `${med.medication_name} ${med.time}`;

                                // Tooltip with details
                                let displayNote = med.note || 'None';
                                if (med.is_daily) {
                                    const noteLines = med.note.split('\n');
                                    displayNote = noteLines.slice(3).join('\n') || 'None';
                                }
                                medication.title = `Dosage: ${med.dosage}\nNote: ${displayNote}`;

                                dayElement.appendChild(medication);
                            }
                        });

                        calendarDays.appendChild(dayElement);
                        dayCounter++;
                    }
                }

                // Helper function to format dates as YYYY-MM-DD
                function formatDate(date) {
                    if (!(date instanceof Date)) {
                        date = new Date(date);
                    }
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    return `${year}-${month}-${day}`;
                }

                // Toggle frequency options
                const repeatCheckbox = document.getElementById('repeat-checkbox');
                if (repeatCheckbox) {
                    const frequencyOptions = document.getElementById('frequency-options');
                    const dateRange = document.getElementById('date-range');
                    const singleDateInput = document.getElementById('single-date');

                    repeatCheckbox.addEventListener('change', function () {
                        if (this.checked) {
                            frequencyOptions.classList.add('show');
                            dateRange.classList.add('show');
                            singleDateInput.disabled = true;
                            singleDateInput.value = '';
                        } else {
                            frequencyOptions.classList.remove('show');
                            dateRange.classList.remove('show');
                            singleDateInput.disabled = false;
                        }
                    });

                    // Set today's date as default - FIXED DATE FORMATTING
                    const today = formatDate(now); // Use our formatDate function
                    singleDateInput.value = today;
                    document.getElementById('start_date').value = today;

                    // Set default end date (today + 7 days)
                    const defaultEndDate = new Date(now);
                    defaultEndDate.setDate(defaultEndDate.getDate() + 7);
                    document.getElementById('end_date').value = formatDate(defaultEndDate);
                }
            });

            // Second DOMContentLoaded handler for form initialization
            document.addEventListener('DOMContentLoaded', function () {
                // Set today's date when page loads - FIXED DATE FORMATTING
                const now = new Date();
                const today = formatDate(now);
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const dailyRadio = document.getElementById('daily');
                const repeatCheckbox = document.getElementById('repeat-checkbox');
                const frequencyOptions = document.getElementById('frequency-options');
                const dateRange = document.getElementById('date-range');

                // Initialize with today's date
                startDateInput.value = today;

                // Toggle frequency options when repeat checkbox changes
                if (repeatCheckbox) {
                    repeatCheckbox.addEventListener('change', function () {
                        if (this.checked) {
                            frequencyOptions.classList.add('show');
                            dateRange.classList.add('show');

                            // Auto-select Daily option if not selected
                            if (!dailyRadio.checked) {
                                dailyRadio.checked = true;
                                dailyRadio.dispatchEvent(new Event('change'));
                            }

                            // Set today's date as default
                            startDateInput.value = today;
                        } else {
                            frequencyOptions.classList.remove('show');
                            dateRange.classList.remove('show');
                        }
                    });
                }

                // Set today's date when Daily is selected
                if (dailyRadio) {
                    dailyRadio.addEventListener('change', function () {
                        if (this.checked) {
                            startDateInput.value = today;
                        }
                    });
                }

                // Enhanced form validation
                document.querySelector('form').addEventListener('submit', function (e) {
                    const repeatChecked = repeatCheckbox.checked;
                    const startDate = startDateInput.value;
                    const endDate = endDateInput.value;

                    if (repeatChecked) {
                        // Validate Daily option is selected
                        if (!dailyRadio.checked) {
                            e.preventDefault();
                            alert('Please select "Daily" frequency for repeated medications');
                            dailyRadio.focus();
                            return false;
                        }

                        // Validate dates are filled
                        if (!startDate || !endDate) {
                            e.preventDefault();
                            alert('Please select both start and end dates for daily medication');
                            if (!startDate) startDateInput.focus();
                            else endDateInput.focus();
                            return false;
                        }

                        // Validate date range
                        if (new Date(startDate) > new Date(endDate)) {
                            e.preventDefault();
                            alert('End date must be after start date');
                            endDateInput.focus();
                            return false;
                        }
                    }
                });

                // Additional UX improvement: Auto-set end date 7 days from start
                startDateInput.addEventListener('change', function () {
                    if (repeatCheckbox.checked && dailyRadio.checked && startDateInput.value && !endDateInput.value) {
                        const startDate = new Date(startDateInput.value);
                        const endDate = new Date(startDate);
                        endDate.setDate(startDate.getDate() + 7); // Default 7 day duration
                        endDateInput.value = formatDate(endDate);
                    }
                });

                // Helper function for consistent date formatting
                function formatDate(date) {
                    if (!(date instanceof Date)) {
                        date = new Date(date);
                    }
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    return `${year}-${month}-${day}`;
                }
            });
        </script>

    </body>

@endsection
