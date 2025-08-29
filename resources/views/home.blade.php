@extends('layouts.app')

@section('content')

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/home/css/main.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        :root {
            --blue: #5e72e4;
            --indigo: #5603ad;
            --purple: #8965e0;
            --pink: #f3a4b5;
            --red: #f5365c;
            --orange: #fb6340;
            --yellow: #ffd600;
            --green: #2dce89;
            --teal: #11cdef;
            --cyan: #2bffc6;
            --white: #fff;
            --gray: #8898aa;
            --gray-dark: #32325d;
            --light: #ced4da;
            --lighter: #e9ecef;
            --primary: #5e72e4;
            --secondary: #f7fafc;
            --success: #2dce89;
            --info: #11cdef;
            --warning: #fb6340;
            --danger: #f5365c;
            --light: #adb5bd;
            --dark: #212529;
            --default: #172b4d;
            --white: #fff;
            --neutral: #fff;
            --darker: black;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: Open Sans, sans-serif;
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -ms-overflow-style: scrollbar;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        @-ms-viewport {
            width: device-width;
        }

        figcaption,
        footer,
        header,
        main,
        nav,
        section {
            display: block;
        }

        body {
            font-family: Open Sans, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            margin: 0;
            text-align: left;
            color: #525f7f;
            background-color: #e5e6eb;
        }

        [tabindex='-1']:focus {
            outline: 0 !important;
        }

        hr {
            overflow: visible;
            box-sizing: content-box;
            height: 0;
        }

        h1,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: .5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        address {
            font-style: normal;
            line-height: inherit;
            margin-bottom: 1rem;
        }

        ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        ul ul {
            margin-bottom: 0;
        }

        dfn {
            font-style: italic;
        }

        strong {
            font-weight: bolder;
        }

        a {
            text-decoration: none;
            color: #5e72e4;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        a:hover {
            text-decoration: none;
            color: #233dd2;
        }

        a:not([href]):not([tabindex]) {
            text-decoration: none;
            color: inherit;
        }

        a:not([href]):not([tabindex]):hover,
        a:not([href]):not([tabindex]):focus {
            text-decoration: none;
            color: inherit;
        }

        a:not([href]):not([tabindex]):focus {
            outline: 0;
        }

        code {
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
            font-size: 1em;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        caption {
            padding-top: 1rem;
            padding-bottom: 1rem;
            caption-side: bottom;
            text-align: left;
            color: #8898aa;
        }

        label {
            display: inline-block;
            margin-bottom: .5rem;
        }

        button {
            border-radius: 0;
        }

        button:focus {
            outline: 1px dotted;
            outline: 5px auto -webkit-focus-ring-color;
        }

        input,
        button,
        textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            margin: 0;
        }

        button,
        input {
            overflow: visible;
        }

        button {
            text-transform: none;
        }

        button,
        html [type='button'],
        [type='reset'],
        [type='submit'] {
            -webkit-appearance: button;
        }

        button::-moz-focus-inner,
        [type='button']::-moz-focus-inner,
        [type='reset']::-moz-focus-inner,
        [type='submit']::-moz-focus-inner {
            padding: 0;
            border-style: none;
        }

        input[type='radio'],
        input[type='checkbox'] {
            box-sizing: border-box;
            padding: 0;
        }

        input[type='date'],
        input[type='time'],
        input[type='datetime-local'],
        input[type='month'] {
            -webkit-appearance: listbox;
        }

        textarea {
            overflow: auto;
            resize: vertical;
        }

        legend {
            font-size: 1.5rem;
            line-height: inherit;
            display: block;
            width: 100%;
            max-width: 100%;
            margin-bottom: .5rem;
            padding: 0;
            white-space: normal;
            color: inherit;
        }

        progress {
            vertical-align: baseline;
        }

        [type='number']::-webkit-inner-spin-button,
        [type='number']::-webkit-outer-spin-button {
            height: auto;
        }

        [type='search'] {
            outline-offset: -2px;
            -webkit-appearance: none;
        }

        [type='search']::-webkit-search-cancel-button,
        [type='search']::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button;
        }

        [hidden] {
            display: none !important;
        }

        h1,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: inherit;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: .5rem;
            color: #white;
        }

        h1,
        .h1 {
            font-size: 1.625rem;
        }

        h3,
        .h3 {
            font-size: 1.0625rem;
        }

        h4,
        .h4 {
            font-size: .9375rem;
        }

        h5,
        .h5 {
            font-size: .8125rem;
        }

        h6,
        .h6 {
            font-size: .625rem;
        }

        .display-2 {
            font-size: 2.75rem;
            font-weight: 600;
            line-height: 1.5;
        }

        hr {
            margin-top: 2rem;
            margin-bottom: 2rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        code {
            font-size: 87.5%;
            word-break: break-word;
            color: #f3a4b5;
        }

        a>code {
            color: inherit;
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        .container-fluid {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        .row {
            display: flex;
            margin-right: -15px;
            margin-left: -15px;
            flex-wrap: wrap;
        }

        .col-4,
        .col-8,
        .col,
        .col-md-10,
        .col-md-12,
        .col-lg-3,
        .col-lg-4,
        .col-lg-6,
        .col-lg-7,
        .col-xl-4,
        .col-xl-6,
        .col-xl-8 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col {
            max-width: 100%;
            flex-basis: 0;
            flex-grow: 1;
        }

        .col-4 {
            max-width: 33.33333%;
            flex: 0 0 33.33333%;
        }

        .col-8 {
            max-width: 66.66667%;
            flex: 0 0 66.66667%;
        }

        @media (min-width: 768px) {

            .col-md-10 {
                max-width: 83.33333%;
                flex: 0 0 83.33333%;
            }

            .col-md-12 {
                max-width: 100%;
                flex: 0 0 100%;
            }
        }

        @media (min-width: 992px) {

            .col-lg-3 {
                max-width: 25%;
                flex: 0 0 25%;
            }

            .col-lg-4 {
                max-width: 33.33333%;
                flex: 0 0 33.33333%;
            }

            .col-lg-6 {
                max-width: 50%;
                flex: 0 0 50%;
            }

            .col-lg-7 {
                max-width: 58.33333%;
                flex: 0 0 58.33333%;
            }

            .order-lg-2 {
                order: 2;
            }
        }

        @media (min-width: 1200px) {

            .col-xl-4 {
                max-width: 33.33333%;
                flex: 0 0 33.33333%;
            }

            .col-xl-6 {
                max-width: 50%;
                flex: 0 0 50%;
            }

            .col-xl-8 {
                max-width: 66.66667%;
                flex: 0 0 66.66667%;
            }

            .order-xl-1 {
                order: 1;
            }

            .order-xl-2 {
                order: 2;
            }
        }

        .form-control {
            font-size: 1rem;
            line-height: 1.5;
            display: block;
            width: 100%;
            height: calc(2.75rem + 2px);
            padding: .625rem .75rem;
            transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
            color: #8898aa;
            border: 1px solid #cad1d7;
            border-radius: .375rem;
            background-color: #fff;
            background-clip: padding-box;
            box-shadow: none;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            .form-control {
                transition: none;
            }
        }

        .form-control::-ms-expand {
            border: 0;
            background-color: transparent;
        }

        .form-control:focus {
            color: #8898aa;
            border-color: rgba(50, 151, 211, .25);
            outline: 0;
            background-color: #fff;
            box-shadow: none, none;
        }

        .form-control:-ms-input-placeholder {
            opacity: 1;
            color: #adb5bd;
        }

        .form-control::-ms-input-placeholder {
            opacity: 1;
            color: #adb5bd;
        }

        .form-control::placeholder {
            opacity: 1;
            color: #adb5bd;
        }

        .form-control:disabled,
        .form-control[readonly] {
            opacity: 1;
            background-color: #e9ecef;
        }

        textarea.form-control {
            height: auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        @media (min-width: 576px) {
            .form-inline label {
                display: flex;
                margin-bottom: 0;
                align-items: center;
                justify-content: center;
            }

            .form-inline .form-group {
                display: flex;
                margin-bottom: 0;
                flex: 0 0 auto;
                flex-flow: row wrap;
                align-items: center;
            }

            .form-inline .form-control {
                display: inline-block;
                width: auto;
                vertical-align: middle;
            }

            .form-inline .input-group {
                width: auto;
            }
        }

        .btn {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5;
            display: inline-block;
            padding: .625rem 1.25rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            border: 1px solid transparent;
            border-radius: .375rem;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }

        .btn:hover,
        .btn:focus {
            text-decoration: none;
        }

        .btn:focus {
            outline: 0;
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .btn:disabled {
            opacity: .65;
            box-shadow: none;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .btn:not(:disabled):not(.disabled):active {
            box-shadow: none;
        }

        .btn:not(:disabled):not(.disabled):active:focus {
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
        }

        .btn-primary {
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn-primary:hover {
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
        }

        .btn-primary:focus {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(94, 114, 228, .5);
        }

        .btn-primary:disabled {
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
        }

        .btn-primary:not(:disabled):not(.disabled):active {
            color: #fff;
            border-color: #5e72e4;
            background-color: #324cdd;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus {
            box-shadow: none, 0 0 0 0 rgba(94, 114, 228, .5);
        }

        .btn-info {
            color: #fff;
            border-color: #11cdef;
            background-color: #11cdef;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn-info:hover {
            color: #fff;
            border-color: #11cdef;
            background-color: #11cdef;
        }

        .btn-info:focus {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
        }

        .btn-info:disabled {
            color: #fff;
            border-color: #11cdef;
            background-color: #11cdef;
        }

        .btn-info:not(:disabled):not(.disabled):active {
            color: #fff;
            border-color: #11cdef;
            background-color: #0da5c0;
        }

        .btn-info:not(:disabled):not(.disabled):active:focus {
            box-shadow: none, 0 0 0 0 rgba(17, 205, 239, .5);
        }

        .btn-default {
            color: #fff;
            border-color: #172b4d;
            background-color: #172b4d;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn-default:hover {
            color: #fff;
            border-color: #172b4d;
            background-color: #172b4d;
        }

        .btn-default:focus {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(23, 43, 77, .5);
        }

        .btn-default:disabled {
            color: #fff;
            border-color: #172b4d;
            background-color: #172b4d;
        }

        .btn-default:not(:disabled):not(.disabled):active {
            color: #fff;
            border-color: #172b4d;
            background-color: #0b1526;
        }

        .btn-default:not(:disabled):not(.disabled):active:focus {
            box-shadow: none, 0 0 0 0 rgba(23, 43, 77, .5);
        }

        .btn-sm {
            font-size: .875rem;
            line-height: 1.5;
            padding: .25rem .5rem;
            border-radius: .375rem;
        }


        .input-group {
            position: relative;
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .input-group>.form-control {
            position: relative;
            width: 1%;
            margin-bottom: 0;
            flex: 1 1 auto;
        }

        .input-group>.form-control+.form-control {
            margin-left: -1px;
        }

        .input-group>.form-control:focus {
            z-index: 3;
        }

        .input-group>.form-control:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group>.form-control:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group-prepend {
            display: flex;
        }

        .input-group-prepend .btn {
            position: relative;
            z-index: 2;
        }

        .input-group-prepend .btn+.btn,
        .input-group-prepend .btn+.input-group-text,
        .input-group-prepend .input-group-text+.input-group-text,
        .input-group-prepend .input-group-text+.btn {
            margin-left: -1px;
        }

        .input-group-prepend {
            margin-right: -1px;
        }

        .input-group-text {
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            display: flex;
            margin-bottom: 0;
            padding: .625rem .75rem;
            text-align: center;
            white-space: nowrap;
            color: #adb5bd;
            border: 1px solid #cad1d7;
            border-radius: .375rem;
            background-color: #fff;
            align-items: center;
        }

        .input-group-text input[type='radio'],
        .input-group-text input[type='checkbox'] {
            margin-top: 0;
        }

        .input-group>.input-group-prepend>.btn,
        .input-group>.input-group-prepend>.input-group-text {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group>.input-group-prepend:not(:first-child)>.btn,
        .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
        .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
        .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .nav {
            display: flex;
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
            flex-wrap: wrap;
        }

        .nav-link {
            display: block;
            padding: .25rem .75rem;
        }

        .nav-link:hover,
        .nav-link:focus {
            text-decoration: none;
        }


        @media (max-width: 767.98px) {}

        @media (min-width: 768px) {


            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                border: 1px solid rgba(0, 0, 0, .05);
                border-radius: .375rem;
                background-color: #fff;
                background-clip: border-box;
            }

            .card>hr {
                margin-right: 0;
                margin-left: 0;
            }

            .card-body {
                padding: 1.5rem;
                flex: 1 1 auto;
            }

            .card-header {
                margin-bottom: 0;
                padding: 1.25rem 1.5rem;
                border-bottom: 1px solid rgba(0, 0, 0, .05);
                background-color: #fff;
            }

            .card-header:first-child {
                border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
            }

            @keyframes progress-bar-stripes {
                from {
                    background-position: 1rem 0;
                }

                to {
                    background-position: 0 0;
                }
            }

            .progress {
                font-size: .75rem;
                display: flex;
                overflow: hidden;
                height: 1rem;
                border-radius: .375rem;
                background-color: #e9ecef;
                box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
            }

            .media {
                display: flex;
                align-items: flex-start;
            }

            .media-body {
                flex: 1 1;
            }

            .bg-secondary {
                background-color: #f7fafc !important;
            }

            a.bg-secondary:hover,
            a.bg-secondary:focus,
            button.bg-secondary:hover,
            button.bg-secondary:focus {
                background-color: #d2e3ee !important;
            }

            .bg-default {
                background-color: #172b4d !important;
            }

            a.bg-default:hover,
            a.bg-default:focus,
            button.bg-default:hover,
            button.bg-default:focus {
                background-color: #0b1526 !important;
            }

            .bg-white {
                background-color: #fff !important;
            }

            a.bg-white:hover,
            a.bg-white:focus,
            button.bg-white:hover,
            button.bg-white:focus {
                background-color: #e6e6e6 !important;
            }

            .bg-white {
                background-color: #fff !important;
            }

            .border-0 {
                border: 0 !important;
            }

            .rounded-circle {
                border-radius: 50% !important;
            }

            .d-none {
                display: none !important;
            }

            .d-flex {
                display: flex !important;
            }

            @media (min-width: 768px) {

                .d-md-flex {
                    display: flex !important;
                }
            }

            @media (min-width: 992px) {

                .d-lg-inline-block {
                    display: inline-block !important;
                }

                .d-lg-block {
                    display: block !important;
                }
            }

            .justify-content-center {
                justify-content: center !important;
            }

            .justify-content-between {
                justify-content: space-between !important;
            }

            .align-items-center {
                align-items: center !important;
            }

            @media (min-width: 1200px) {

                .justify-content-xl-between {
                    justify-content: space-between !important;
                }
            }

            .float-right {
                float: right !important;
            }

            .shadow,
            .card-profile-image img {
                box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
            }

            .m-0 {
                margin: 0 !important;
            }

            .mt-0 {
                margin-top: 0 !important;
            }

            .mb-0 {
                margin-bottom: 0 !important;
            }

            .mr-2 {
                margin-right: .5rem !important;
            }

            .ml-2 {
                margin-left: .5rem !important;
            }

            .mr-3 {
                margin-right: 1rem !important;
            }

            .mt-4,
            .my-4 {
                margin-top: 1.5rem !important;
            }

            .mr-4 {
                margin-right: 1.5rem !important;
            }

            .mb-4,
            .my-4 {
                margin-bottom: 1.5rem !important;
            }

            .mb-5 {
                margin-bottom: 3rem !important;
            }

            .mt--7 {
                margin-top: -6rem !important;
            }

            .pt-0 {
                padding-top: 0 !important;
            }

            .pr-0 {
                padding-right: 0 !important;
            }

            .pb-0 {
                padding-bottom: 0 !important;
            }

            .pt-5 {
                padding-top: 3rem !important;
            }

            .pt-8 {
                padding-top: 8rem !important;
            }

            .pb-8 {
                padding-bottom: 8rem !important;
            }

            .m-auto {
                margin: auto !important;
            }

            @media (min-width: 768px) {

                .mt-md-5 {
                    margin-top: 3rem !important;
                }

                .pt-md-4 {
                    padding-top: 1.5rem !important;
                }

                .pb-md-4 {
                    padding-bottom: 1.5rem !important;
                }
            }

            @media (min-width: 992px) {

                .pl-lg-4 {
                    padding-left: 1.5rem !important;
                }

                .pt-lg-8 {
                    padding-top: 8rem !important;
                }

                .ml-lg-auto {
                    margin-left: auto !important;
                }
            }

            @media (min-width: 1200px) {

                .mb-xl-0 {
                    margin-bottom: 0 !important;
                }
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }

            .font-weight-light {
                font-weight: 300 !important;
            }

            .font-weight-bold {
                font-weight: 600 !important;
            }

            .text-white {
                color: #fff !important;
            }

            .text-white {
                color: #fff !important;
            }

            a.text-white:hover,
            a.text-white:focus {
                color: #e6e6e6 !important;
            }

            .text-muted {
                color: #8898aa !important;
            }

            @media print {

                *,
                *::before,
                *::after {
                    box-shadow: none !important;
                    text-shadow: none !important;
                }

                a:not(.btn) {
                    text-decoration: underline;
                }

                img {
                    page-break-inside: avoid;
                }

                p,
                h3 {
                    orphans: 3;
                    widows: 3;
                }

                h3 {
                    page-break-after: avoid;
                }

                @ page {
                    size: a3;
                }

                body {
                    min-width: 992px !important;
                }

                .container {
                    min-width: 992px !important;
                }

                .navbar {
                    display: none;
                }
            }

            figcaption,
            main {
                display: block;
            }

            main {
                overflow: hidden;
            }

            .bg-white {
                background-color: #fff !important;
            }

            a.bg-white:hover,
            a.bg-white:focus,
            button.bg-white:hover,
            button.bg-white:focus {
                background-color: #e6e6e6 !important;
            }

            .bg-gradient-default {
                background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
            }

            .bg-gradient-default {
                background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
            }

            @keyframes floating-lg {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(15px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            @keyframes floating {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            @keyframes floating-sm {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(5px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .opacity-8 {
                opacity: .8 !important;
            }

            .opacity-8 {
                opacity: .9 !important;
            }

            .center {
                left: 50%;
                transform: translateX(-50%);
            }

            [class*='shadow'] {
                transition: all .15s ease;
            }

            .font-weight-300 {
                font-weight: 300 !important;
            }

            .text-sm {
                font-size: .875rem !important;
            }

            .text-white {
                color: #fff !important;
            }

            a.text-white:hover,
            a.text-white:focus {
                color: #e6e6e6 !important;
            }

            .avatar {
                font-size: 1rem;
                display: inline-flex;
                width: 48px;
                height: 48px;
                color: #fff;
                border-radius: 50%;
                background-color: #adb5bd;
                align-items: center;
                justify-content: center;
            }

            .avatar img {
                width: 100%;
                border-radius: 50%;
            }

            .avatar-sm {
                font-size: .875rem;
                width: 36px;
                height: 36px;
            }

            .btn {
                font-size: .875rem;
                position: relative;
                transition: all .15s ease;
                letter-spacing: .025em;
                text-transform: none;
                will-change: transform;
            }

            .btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
            }

            .btn:not(:last-child) {
                margin-right: .5rem;
            }

            .btn i:not(:first-child) {
                margin-left: .5rem;
            }

            .btn i:not(:last-child) {
                margin-right: .5rem;
            }

            .input-group .btn {
                margin-right: 0;
                transform: translateY(0);
            }

            .btn-sm {
                font-size: .75rem;
            }

            [class*='btn-outline-'] {
                border-width: 1px;
            }

            .card-profile-image {
                position: relative;
            }

            .card-profile-image img {
                position: absolute;
                left: 50%;
                max-width: 180px;
                transition: all .15s ease;
                transform: translate(-50%, -30%);
                border-radius: .375rem;
            }

            .card-profile-image img:hover {
                transform: translate(-50%, -33%);
            }

            .card-profile-stats {
                padding: 1rem 0;
            }

            .card-profile-stats>div {
                margin-right: 1rem;
                padding: .875rem;
                text-align: center;
            }

            .card-profile-stats>div:last-child {
                margin-right: 0;
            }

            .card-profile-stats>div .heading {
                font-size: 1.1rem;
                font-weight: bold;
                display: block;
            }

            .card-profile-stats>div .description {
                font-size: .875rem;
                color: #adb5bd;
            }

            .main-content {
                position: relative;
            }

            .main-content .navbar-top {
                position: absolute;
                z-index: 1;
                top: 0;
                left: 0;
                width: 100%;
                padding-right: 0 !important;
                padding-left: 0 !important;
                background-color: transparent;
            }

            @media (min-width: 768px) {
                .main-content .container-fluid {
                    padding-right: 39px !important;
                    padding-left: 39px !important;
                }
            }


            .footer {
                padding: 2.5rem 0;
                background: #f7fafc;
            }

            .footer .nav .nav-item .nav-link {
                color: #8898aa !important;
            }

            .footer .nav .nav-item .nav-link:hover {
                color: #525f7f !important;
            }

            .footer .copyright {
                font-size: .875rem;
            }

            .form-control-label {
                font-size: .875rem;
                font-weight: 600;
                color: #525f7f;
            }

            .form-control {
                font-size: .875rem;
            }

            .form-control:focus:-ms-input-placeholder {
                color: #adb5bd;
            }

            .form-control:focus::-ms-input-placeholder {
                color: #adb5bd;
            }

            .form-control:focus::placeholder {
                color: #adb5bd;
            }

            textarea[resize='none'] {
                resize: none !important;
            }

            textarea[resize='both'] {
                resize: both !important;
            }

            textarea[resize='vertical'] {
                resize: vertical !important;
            }

            textarea[resize='horizontal'] {
                resize: horizontal !important;
            }

            .form-control-alternative {
                transition: box-shadow .15s ease;
                border: 0;
                box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
            }

            .form-control-alternative:focus {
                box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
            }

            .input-group {
                transition: all .15s ease;
                border-radius: .375rem;
                box-shadow: none;
            }

            .input-group .form-control {
                box-shadow: none;
            }

            .input-group .form-control:not(:first-child) {
                padding-left: 0;
                border-left: 0;
            }

            .input-group .form-control:not(:last-child) {
                padding-right: 0;
                border-right: 0;
            }

            .input-group .form-control:focus {
                box-shadow: none;
            }

            .input-group-text {
                transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
            }

            .input-group-alternative {
                transition: box-shadow .15s ease;
                border: 0;
                box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
            }

            .input-group-alternative .form-control,
            .input-group-alternative .input-group-text {
                border: 0;
                box-shadow: none;
            }

            .focused .input-group-alternative {
                box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
            }

            .focused .input-group {
                box-shadow: none;
            }

            .focused .input-group-text {
                color: #8898aa;
                border-color: rgba(50, 151, 211, .25);
                background-color: #fff;
            }

            .focused .form-control {
                border-color: rgba(50, 151, 211, .25);
            }

            .header {
                position: relative;
            }

            .input-group {
                transition: all .15s ease;
                border-radius: .375rem;
                box-shadow: none;
            }

            .input-group .form-control {
                box-shadow: none;
            }

            .input-group .form-control:not(:first-child) {
                padding-left: 0;
                border-left: 0;
            }

            .input-group .form-control:not(:last-child) {
                padding-right: 0;
                border-right: 0;
            }

            .input-group .form-control:focus {
                box-shadow: none;
            }

            .input-group-text {
                transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
            }

            .input-group-alternative {
                transition: box-shadow .15s ease;
                border: 0;
                box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
            }

            .input-group-alternative .form-control,
            .input-group-alternative .input-group-text {
                border: 0;
                box-shadow: none;
            }

            .focused .input-group-alternative {
                box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
            }

            .focused .input-group {
                box-shadow: none;
            }

            .focused .input-group-text {
                color: #8898aa;
                border-color: rgba(50, 151, 211, .25);
                background-color: #fff;
            }

            .focused .form-control {
                border-color: rgba(50, 151, 211, .25);
            }

            .mask {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transition: all .15s ease;
            }

            @media screen and (prefers-reduced-motion: reduce) {
                .mask {
                    transition: none;
                }
            }



            @media (min-width: 768px) {


                @ keyframes show-navbar-dropdown {
                    0% {
                        transition: visibility .25s, opacity .25s, transform .25s;
                        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
                        opacity: 0;
                    }

                    100% {
                        transform: translate(0, 0);
                        opacity: 1;
                    }
                }

                @keyframes hide-navbar-dropdown {
                    from {
                        opacity: 1;
                    }

                    to {
                        transform: translate(0, 10px);
                        opacity: 0;
                    }
                }
            }

            @media (max-width: 767.98px) {}

            @keyframes show-navbar-collapse {
                0% {
                    transform: scale(.95);
                    transform-origin: 100% 0;
                    opacity: 0;
                }

                100% {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            @keyframes hide-navbar-collapse {
                from {
                    transform: scale(1);
                    transform-origin: 100% 0;
                    opacity: 1;
                }

                to {
                    transform: scale(.95);
                    opacity: 0;
                }
            }

            .progress {
                overflow: hidden;
                height: 8px;
                margin-bottom: 1rem;
                border-radius: .25rem;
                background-color: #e9ecef;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
            }

            p {
                font-size: 1rem;
                font-weight: 300;
                line-height: 1.7;
            }

            .description {
                font-size: .875rem;
            }

            .heading {
                font-size: .95rem;
                font-weight: 600;
                letter-spacing: .025em;
                text-transform: uppercase;
            }

            .heading-small {
                font-size: .75rem;
                padding-top: .25rem;
                padding-bottom: .25rem;
                letter-spacing: .04em;
                text-transform: uppercase;
            }

            .display-2 span {
                font-weight: 300;
                display: block;
            }

            @media (max-width: 768px) {
                .btn {
                    margin-bottom: 10px;
                }
            }

            #navbar .navbar {
                margin-bottom: 20px;
            }

            .header {
                margin-top: -80px !important;
                padding-top: 80px !important;
                position: relative;
                z-index: 1;
            }

            body {
                overflow-x: hidden;
            }

            .header {
                padding-top: 6rem;
                /* Increased from original */
                padding-bottom: 8rem;
                /* Adjust as needed */
                z-index: 1;
            }

            /* Push the content down properly */
            .container-fluid.mt--7 {
                margin-top: -100px !important;
                /* Adjust this value to control overlap */
                position: relative;
                z-index: 2;
            }

            /* Ensure cards have proper spacing */
            .card {
                margin-bottom: 30px;
                position: relative;
                z-index: 3;
            }

            /* Fix for the profile card */
            .card-profile {
                margin-top: -100px;
                /* Pulls the card up into the header */
            }
    </style>

    <body class="index-page">

        <main class="main" style="margin-top: -105px;">

            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Hero Section (Now: MedSite Introduction) -->
            <section id="hero" class="hero section dark-background">
                <img src="{{ asset('assets/home/img/herooo-bg.jpg') }}" alt="" data-aos="fade-in">
                <div class="container">
                    <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-xl-6 col-lg-8">
                            <h2>Your Safe Medication Hub With MedSite</h2>
                            <p>Track interactions, manage prescriptions, and protect your health</p>
                        </div>
                    </div>

                    <!-- Feature Icons (Now: Key Features) -->
                    <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-capsule"></i> <!-- Changed icon -->
                                <h3><a href="">Drug Tracker</a></h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-exclamation-triangle"></i> <!-- Changed icon -->
                                <h3><a href="">Interaction Checker</a></h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-file-medical"></i> <!-- Changed icon -->
                                <h3><a href="">Medical History</a></h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="600">
                            <div class="icon-box">
                                <i class="bi bi-calendar-check"></i> <!-- Changed icon -->
                                <h3><a href="">Dose Reminders</a></h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="700">
                            <div class="icon-box">
                                <i class="bi bi-shield"></i> <!-- Changed icon -->
                                <h3><a href="">Allergy Alerts</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Hero Section -->
            <!-- ======================================================= -->

            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Features Section -->
            <br>
            <br>
            <section id="features" class="features section">

                <div class="container">

                    <div class="row gy-4">
                        <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img
                                src="{{ asset('assets/home/img/featuress-bg.jpg') }}" alt=""></div>
                        <div class="col-lg-6">

                            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up"
                                data-aos-delay="200">
                                <i class="bi bi-shield-check flex-shrink-0"></i>
                                <div>
                                    <h4>Real-time FDA-approved
                                        drug interaction checks.</h4>
                                </div>
                            </div><!-- End Features Item-->

                            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-person-heart flex-shrink-0"></i>
                                <div>
                                    <h4>Personalized alerts
                                        based on your health profile</h4>
                                </div>
                            </div><!-- End Features Item-->

                            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-gender-female flex-shrink-0"></i>
                                <div>
                                    <h4>Pregnancy and
                                        pediatric safety information</h4>
                                </div>
                            </div><!-- End Features Item-->

                            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
                                <i class="bi bi-exclamation-triangle flex-shrink-0"></i>
                                <div>
                                    <h4>Allergy and
                                        condition-specific warnings</h4>
                                </div>
                            </div><!-- End Features Item-->

                        </div>
                    </div>

                </div>

            </section><!-- /Features Section -->
            <!-- ======================================================= -->

            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Services Section (Now: Key Tools) -->
            <section id="services" class="services section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>MedSite Tools</h2>
                    <p>Explore lifesaving features</p>
                </div>
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-capsule"></i>
                                </div>
                                <a href="{{ url('/medication-checker') }}" class="text-decoration-none">
                                    <h3>Medication Safety</h3>
                                </a>
                                <p>Access FDA-approved information on 10,000+ drugs including interactions with your own
                                    medications, side effects,
                                    and proper dosing guidelines.</p>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-heart-pulse"></i>
                                </div>
                                <a href="{{ url('/drug-interaction-checker') }}" class="text-decoration-none">
                                    <h3>Medication Interaction Checker</h3>
                                </a>
                                <p>Check potential interactions between any two medications with our FDA-reviewed database.
                                    Get instant severity ratings and safety recommendations.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <a href="{{ url('/medication-plan') }}" class="text-decoration-none">
                                    <h3>Medication Tracker</h3>
                                </a>
                                <p>Visual calendar tracking with automatic refill alerts and dosage reminders to keep your
                                    treatment on schedule.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section><!-- /Services Section -->



            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Call To Action Section -->
            <section id="call-to-action" class="call-to-action section dark-background">

                <img src="{{ asset('assets/home/img/cta-bg.jpg') }}" alt="">

                <div class="container">
                    <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                        <div class="col-xl-10">
                            <div class="text-center">
                                <h3 class="display-5 mb-4">Your Medication Safety Matters</h3>
                                <p class="lead mb-5">Every year, thousands experience preventable harm from medication
                                    interactions.
                                    With proper management and awareness, these risks can be significantly reduced.
                                    Take control of your health today by understanding your medications.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </section><!-- /Call To Action Section -->
            <!-- ======================================================= -->


            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Portfolio Section -->
            <section id="portfolio" class="portfolio section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>MedSite Features</h2>
                    <p>Powerful tools designed to protect you from medication risks</p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                            <li data-filter="*" class="filter-active">All Features</li>
                            <li data-filter=".filter-safety">Safety Tools</li>
                            <li data-filter=".filter-tracking">Management</li>
                            <li data-filter=".filter-alerts">Alerts</li>
                        </ul><!-- End Portfolio Filters -->
                        <style>
                            .text-content-box {
                                background: #f8f9fa;
                                padding: 20px;
                                height: 100%;
                                border-radius: 5px;
                            }

                            .content-icon {
                                font-size: 2rem;
                                color: #0d6efd;
                                margin-bottom: 15px;
                            }

                            .text-placeholder {
                                padding: 20px;
                                background: #f8f9fa;
                                height: px;
                                width: px;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                            }



                            .content-actions {
                                margin-top: 15px;
                                display: flex;
                                gap: 10px;
                            }
                        </style>
                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-safety">
                                <div class="text-placeholder">
                                    <i class="bi bi-search-heart fs-2" style="color: #15616D;"></i>
                                    <h3>Drug Interaction Checker</h3>
                                    <p>dvanced screening for dangerous medication combinations with color-coded severity
                                        levels and evidence-based recommendations.</p>
                                    <!-- <div class="d-flex flex-wrap gap-2">
                                                                                                                                                                                                                                                                                                                                                                                                <span class="badge bg-danger bg-opacity-10 text-danger">Severe</span>
                                                                                                                                                                                                                                                                                                                                                                                                <span class="badge bg-warning bg-opacity-10 text-warning">Moderate</span>
                                                                                                                                                                                                                                                                                                                                                                                                <span class="badge bg-success bg-opacity-10 text-success">Mild</span>
                                                                                                                                                                                                                                                                                                                                                                                            </div> -->
                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-danger">Try Now <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-tracking">
                                <div class="text-placeholder">
                                    <i class="bi bi-clipboard2-pulse fs-2" style="color: #15616D;"></i>
                                    <h3>Medication Tracker</h3>
                                    <p>Comprehensive log for all prescriptions with customizable reminders and refill
                                        alerts.</p>

                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-outline-primary">Start Tracking <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-alerts">
                                <div class="text-placeholder">
                                    <i class="bi bi-exclamation-octagon fs-2" style="color: #15616D;"></i>
                                    <h3>Allergy Alerts</h3>
                                    <p>Instant alerts for 50+ common allergens including sulfa drugs, penicillin, NSAIDs,
                                        and food-drug interactions. Our system cross-references your profile with every
                                        medication check.</p>

                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-outline-primary">See Examples<i
                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-safety">
                                <div class="text-placeholder">
                                    <i class="bi bi-file-earmark-medical fs-2" style="color: #15616D;"></i>
                                    <h3>Health Profile</h3>
                                    <p>Secure, encrypted storage for your complete medical history including allergies,
                                        chronic conditions, current medications, and vaccination records.</p>

                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-outline-primary">See Your Profile<i
                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-safety">
                                <div class="text-placeholder">
                                    <i class="bi bi-gender-ambiguous  fs-2" style="color: #15616D;"></i>
                                    <h3>Personalized Safety</h3>
                                    <p>Tailored medication recommendations based on your age, pregnancy status, kidney/liver
                                        function, and specific health conditions.</p>
                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-outline-primary">View Features<i
                                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-tracking">
                                <div class="text-placeholder">
                                    <i class="bi bi-bell  fs-2" style="color: #15616D;"></i>
                                    <h3>Smart Reminders</h3>
                                    <p>Customizable alerts for medication doses, refills, and safety checks delivered via
                                        app notifications, email, or SMS.</p>
                                    <br>
                                    <!-- <div class="card-footer bg-transparent border-top-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-info">
                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-sm btn-outline-primary">Set Up<i
                                                                                                                                                                                                                                                                                                                                                                                                                                class="bi bi-arrow-right ms-1"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                            </div><!-- End Portfolio Item -->



                        </div><!-- End Portfolio Container -->

                    </div>

                </div>

            </section><!-- /Portfolio Section -->
            <!-- ======================================================= -->


            <!-- ======================================================= -->
            <!-- DONE -->
            <!-- ======================================================= -->
            <!-- Stats Section -->
            <section id="stats" class="stats section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4 gy-lg-0 align-items-center">
                        <!-- Image Column -->
                        <div class="col-lg-5 order-lg-1 order-2 d-flex"> <!-- Added d-flex -->
                            <img src="{{ asset('assets/home/img/statss-img.jpg') }}"
                                alt="Drug interaction danger illustration"
                                class="img-fluid rounded-3 shadow w-100 align-self-stretch"
                                style="object-fit: cover; object-position: center;">
                        </div>
                        <!-- Stats Content Column -->
                        <div class="col-lg-7 order-lg-2 order-1 d-flex align-items-center">
                            <div class="stats-content ps-lg-5">
                                <h2 class="stats-title mb-4">THE DANGER OF DRUG INTERACTIONS</h2>
                                <p class="stats-subtitle lead mb-5">Understanding the risks can save lives</p>

                                <div class="row g-4 g-lg-5">
                                    <!-- Stat Item 1 -->
                                    <div class="col-md-6">
                                        <div class="stats-item text-center p-4 h-100">
                                            <div class="stats-icon mb-3">
                                                <i class="bi bi-hospital"></i>
                                            </div>
                                            <div class="stats-number mb-2" data-purecounter-start="0"
                                                data-purecounter-end="1300000" data-purecounter-duration="1"
                                                data-purecounter-separator="true">
                                                1,300,000
                                            </div>
                                            <h3 class="stats-label mb-2">ER visits annually</h3>
                                            <p class="stats-description">due to medication interactions</p>
                                        </div>
                                    </div>

                                    <!-- Stat Item 2 -->
                                    <div class="col-md-6">
                                        <div class="stats-item text-center p-4 h-100">
                                            <div class="stats-icon mb-3">
                                                <i class="bi bi-capsule-pill"></i>
                                            </div>
                                            <div class="stats-number mb-2" data-purecounter-start="0"
                                                data-purecounter-end="42" data-purecounter-duration="1">
                                                42
                                            </div>
                                            <h3 class="stats-label mb-2">% of Americans</h3>
                                            <p class="stats-description">take multiple medications daily</p>
                                        </div>
                                    </div>

                                    <!-- Stat Item 3 -->
                                    <div class="col-md-6">
                                        <div class="stats-item text-center p-4 h-100">
                                            <div class="stats-icon mb-3">
                                                <i class="bi bi-file-medical"></i>
                                            </div>
                                            <div class="stats-number mb-2" data-purecounter-start="0"
                                                data-purecounter-end="350000" data-purecounter-duration="1"
                                                data-purecounter-separator="true">
                                                350,000
                                            </div>
                                            <h3 class="stats-label mb-2">Hospitalizations</h3>
                                            <p class="stats-description">from adverse drug reactions</p>
                                        </div>
                                    </div>

                                    <!-- Stat Item 4 -->
                                    <div class="col-md-6">
                                        <div class="stats-item text-center p-4 h-100">
                                            <div class="stats-icon mb-3">
                                                <i class="bi bi-shield-check"></i>
                                            </div>
                                            <div class="stats-number mb-2" data-purecounter-start="0"
                                                data-purecounter-end="90" data-purecounter-duration="1">
                                                90
                                            </div>
                                            <h3 class="stats-label mb-2">% are preventable</h3>
                                            <p class="stats-description">with proper medication management</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <style>
                /* Stats Section Styling */
                .stats {
                    padding: 5rem 0;
                    background-color: #f8f9fa;
                }

                .stats-title {
                    font-size: 2.2rem;
                    font-weight: 700;
                    color: #212529;
                    line-height: 1.2;
                }

                .stats-subtitle {
                    color: #6c757d;
                    font-weight: 400;
                }

                .stats-item {
                    background: white;
                    border-radius: 0.5rem;
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .stats-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.1);
                }

                .stats-icon {
                    font-size: 2rem;
                    color: #0d6efd;
                }

                .stats-number {
                    font-size: 2.5rem;
                    font-weight: 700;
                    color: #15616D;
                    line-height: 1;
                }

                .stats-label {
                    font-size: 1.2rem;
                    font-weight: 600;
                    color: #212529;
                }

                .stats-description {
                    color: #6c757d;
                    margin-bottom: 0;
                }

                /* Responsive adjustments */
                @media (max-width: 992px) {
                    .stats-title {
                        font-size: 1.8rem;
                    }

                    .stats-content {
                        padding-left: 0 !important;
                        margin-top: 2rem;
                    }
                }

                @media (max-width: 768px) {
                    .stats-number {
                        font-size: 2rem;
                    }

                    .stats-label {
                        font-size: 1.1rem;
                    }
                }

                .stats-image-container {
                    min-height: 100%;
                }

                .stats-content {
                    height: 100%;
                }

                /* Optional: Add a max-height if needed */
                @media (min-width: 992px) {
                    .stats-image-container {
                        max-height: 600px;
                        /* Adjust as needed */
                    }
                }
            </style> <!-- /Stats Section -->


            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials section dark-background">
                <img src="{{ asset('assets/home/img/testimonialss-bg.jpg') }}" class="testimonials-bg"
                    alt="Happy patients discussing medication safety">

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                                                                                                                                                        {
                                                                                                                                                            "loop": true,
                                                                                                                                                            "speed": 600,
                                                                                                                                                            "autoplay": {
                                                                                                                                                                "delay": 5000
                                                                                                                                                            },
                                                                                                                                                            "slidesPerView": "auto",
                                                                                                                                                            "pagination": {
                                                                                                                                                                "el": ".swiper-pagination",
                                                                                                                                                                "type": "bullets",
                                                                                                                                                                "clickable": true
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                    </script>
                        <div class="swiper-wrapper">

                            <!-- Testimonial 1 -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <h3>Sarah J.</h3>
                                    <h4>Type 2 Diabetes Patient</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>After being hospitalized for a dangerous interaction between my diabetes
                                            medication and a new antibiotic, I started using MedSite. It caught a similar
                                            risk just last month - potentially saving my life. This should be standard care
                                            for anyone on multiple medications.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <!-- Testimonial 2 -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <h3>Dr. Michael R.</h3>
                                    <h4>Cardiologist</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>In my 20 years of practice, I've seen countless preventable adverse drug
                                            reactions. I now recommend MedSite to all my patients, especially seniors on
                                            multiple cardiac medications. It's reduced emergency visits in my practice by
                                            nearly 30% this year alone.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <!-- Testimonial 3 -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <h3>Lisa T.</h3>
                                    <h4>Mother of asthmatic child</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>When my son was prescribed a new asthma medication, MedSite alerted us it
                                            could interact dangerously with his ADHD medicine. His doctor hadn't caught
                                            this. The pediatric-specific safety features give me peace of mind no other app
                                            provides.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <!-- Testimonial 4 -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <h3>Robert K.</h3>
                                    <h4>Senior on 8 medications</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>At 78 with multiple chronic conditions, keeping track of my medications was
                                            overwhelming. MedSite's interaction checker and dose reminders have simplified
                                            my routine and helped avoid three potentially dangerous combinations my
                                            pharmacist missed.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <!-- Testimonial 5 -->
                            <div class="swiper-slide">
                                <div class="testimonial-item">

                                    <h3>Angela M.</h3>
                                    <h4>Clinical Pharmacist</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>In our busy pharmacy, we've integrated MedSite into our medication
                                            reconciliation process. It catches interactions our software misses, especially
                                            with herbal supplements. The color-coded severity system helps us prioritize
                                            counseling for high-risk patients.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section><!-- /Testimonials Section -->


        </main>

        <footer id="footer" class="footer">

            <div class="copyright">
                <div class="container text-center">
                    <div class="copyright">
                        <p>&copy; MEDSITE. All rights reserved.</p>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/home/vendor/purecounter/purecounter_vanilla.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('assets/home/js/main.js') }}"></script>
    </body>
@endsection




<!-- ======================================================= -->
<!-- DONE -->
<!-- ======================================================= -->
<!-- About Section - More Prominent -->
<!-- <section id="about" class="about section" style="padding: 100px 0;">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">
                        <div class="col-lg-6 order-1 order-lg-2">
                            <img src="{{ asset('assets/home/img/about.jpg') }}" class="img-fluid" alt=""
                                style="border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        </div>
                        <div class="col-lg-6 order-2 order-lg-1 content">
                            <h2 style="font-size: 2.5rem; margin-bottom: 25px;">WHY MEDSITE IS DIFFERENT</h2>
                            <p class="fst-italic" style="font-size: 1.3rem; line-height: 1.6;">
                                Every year, over 1.3 million emergency room visits are caused by preventable drug
                                interactions.
                            </p>
                            <ul style="font-size: 1.1rem;">
                                <li><i class="bi bi-check2-all" style="font-size: 1.5rem;"></i> <span>Real-time FDA-approved
                                        drug interaction checks</span></li>
                                <li><i class="bi bi-check2-all" style="font-size: 1.5rem;"></i> <span>Personalized alerts
                                        based on your health profile</span></li>
                                <li><i class="bi bi-check2-all" style="font-size: 1.5rem;"></i> <span>Pregnancy and
                                        pediatric safety information</span></li>
                                <li><i class="bi bi-check2-all" style="font-size: 1.5rem;"></i> <span>Allergy and
                                        condition-specific warnings</span></li>
                            </ul>
                            <p style="font-size: 1.1rem;">
                                Our comprehensive system identifies severe risks like bleeding, organ damage, or reduced
                                effectiveness, and suggests safer alternatives.
                            </p>
                        </div>
                    </div>

                </div>

            </section>/About Section -->
<!-- ======================================================= -->