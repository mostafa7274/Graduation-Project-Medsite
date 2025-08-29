@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('assets/drug-interaction/plugins/bootstrap/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/drug-interaction/plugins/icofont/icofont.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/drug-interaction/plugins/slick-carousel/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/drug-interaction/plugins/slick-carousel/slick/slick-theme.css')}} " />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/drug-interaction/css/style.css')}}" />

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
            background-color: #fff !important;

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

    <style>
        /* Core Carousel Styles */
        .banner {
            position: relative;
            min-height: 550px;
            overflow: hidden;
        }

        .auto-carousel {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
            z-index: 1;
        }

        .slide-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }



        .carousel-slide.active {
            opacity: 1;
            z-index: 2;
        }

        /* Content Styling */
        .block {
            position: relative;
            z-index: 3;
            color: #223a66;
            padding-top: 120px;
        }

        .block h1 {
            font-size: 60px;
            line-height: 1.2;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .divider {
            width: 40px;
            height: 5px;
            background: #15616D;
            margin-bottom: 15px;
        }

        .letter-spacing {
            letter-spacing: 2px;
        }

        .btn-main-2 {
            background-color: #15616D;
            border-color: #15616D;
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .block {
                padding-top: 80px;
            }

            .block h1 {
                font-size: 48px;
            }
        }

        @media (max-width: 768px) {
            .block h1 {
                font-size: 36px;
                line-height: 1.3;
            }
        }

        @media (max-width: 480px) {
            .banner {
                min-height: 450px;
            }

            .block h1 {
                font-size: 32px;
                line-height: 1.2;
            }

            .block {
                padding-top: 60px;
            }
        }
    </style>

    <style>
        /* Main Section Styling */
        .drug-interaction-checker {
            background: #f9f9ff;
            padding: 80px 0;
        }

        .interaction-form-wrap {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin: 0 auto;
        }

        /* Form Elements */
        .form-control {
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #15616D;
            box-shadow: 0 0 0 0.2rem rgba(21, 97, 109, 0.25);
        }

        /* Loading Spinner */
        .loading-spinner {
            margin: 20px 0;
            text-align: center;
        }

        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-left-color: #15616D;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Result Styling */
        .interaction-result {
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
            transition: all 0.3s ease;
        }

        /* Danger Alert (Interaction Found) */
        .alert-danger {
            background: #FFEBEE;
            border-left: 4px solid #F44336;
            color: #721C24;
        }

        .alert-danger h4 {
            color: #F44336;
        }

        /* Success Alert (No Interaction) */
        .alert-success {
            background: #E8F5E9;
            border-left: 4px solid #4CAF50;
            color: #155724;
        }

        .alert-success h4 {
            color: #4CAF50;
        }

        /* Icons */
        .icofont-warning-alt {
            color: #F44336;
            margin-right: 8px;
        }

        .icofont-check-circled {
            color: #4CAF50;
            margin-right: 8px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .drug-interaction-checker {
                padding: 40px 0;
            }

            .interaction-form-wrap {
                padding: 20px;
            }

            .form-control {
                font-size: 14px;
            }
        }
    </style>

    <!-- <style>
                    .ui-autocomplete {
                        position: absolute;
                        z-index: 1000;
                        cursor: default;
                        padding: 0;
                        margin-top: 2px;
                        list-style: none;
                        background-color: #ffffff;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                        max-height: 300px;
                        overflow-y: auto;
                        overflow-x: hidden;
                    }

                    .ui-autocomplete .ui-menu-item {
                        padding: 8px 15px;
                        font-size: 14px;
                        cursor: pointer;
                    }

                    .ui-autocomplete .ui-menu-item:hover {
                        background-color: #f0f0f0;
                        color: #15616D;
                    }

                    .ui-autocomplete .ui-state-active {
                        background-color: #15616D;
                        color: white;
                        border: none;
                    }

                    .autocomplete-type {
                        color: #777;
                        font-size: 0.9em;
                        float: right;
                    }
                </style> -->

    <style>
        /* Autocomplete dropdown styling */
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            max-height: 300px;
            overflow-y: auto;
            overflow-x: hidden;
            width: 25%;
        }

        .ui-autocomplete li {
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
            font-family: 'Open Sans', sans-serif;
            color: #333;
            transition: background-color 0.2s ease-in-out;
        }

        .ui-autocomplete li:last-child {
            border-bottom: none;
        }

        .ui-autocomplete li:hover,
        .ui-autocomplete li:focus {
            background-color: #15616D;
            color: white;
        }
    </style>




    <body id="top" style="margin-top: -25px; ">


        <!-- Start -->
        <section class="banner">
            <div class="auto-carousel">
                <!-- Slide 1 - Medication Safety -->
                <div class="carousel-slide carousel-slide1 active">
                    <div class="slide-background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xl-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">Medication Safety</span>
                                    <h1 class="mb-3 mt-3">Check Drug Interactions Safely</h1>
                                    <p class="mb-4 pr-5">
                                        Always verify potential interactions between medications before combining them.
                                        Our system provides FDA-approved information to help prevent dangerous combinations.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 - Common Interactions -->
                <div class="carousel-slide carousel-slide2">
                    <div class="slide-background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xl-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">Did You Know?</span>
                                    <h1 class="mb-3 mt-3">Common Dangerous Combinations</h1>
                                    <p class="mb-4 pr-5">
                                        Warfarin + NSAIDs can increase bleeding risk.
                                        Statins + Grapefruit juice may cause toxicity.
                                        Always consult your doctor before mixing medications.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 - Special Populations -->
                <div class="carousel-slide carousel-slide3">
                    <div class="slide-background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xl-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">Important Notice</span>
                                    <h1 class="mb-3 mt-3">Special Considerations</h1>
                                    <p class="mb-4 pr-5">
                                        Medications may affect children, elderly, or pregnant women differently.
                                        Our system provides age-specific and pregnancy category warnings for safer use.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 - Medication Management -->
                <div class="carousel-slide carousel-slide4">
                    <div class="slide-background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xl-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">Smart Tracking</span>
                                    <h1 class="mb-3 mt-3">Manage Your Medications</h1>
                                    <p class="mb-4 pr-5">
                                        Track all your medications in one place with our drug tracker.
                                        Get reminders and monitor for potential interactions with new prescriptions.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->


        <!-- Start -->
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="feature-block d-lg-flex">
                            <!-- Card 1: Drug Safety Tip -->
                            <div class="feature-item mb-5 mb-lg-0" style="box-shadow: 0 4px 20px #15616D;">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-pills"></i> <!-- Changed icon to pills -->
                                </div>
                                <span>Safety First</span>
                                <h4 class="mb-3">Always Check Interactions</h4>
                                <p class="mb-4">
                                    Mixing medications without checking can be dangerous.
                                    <strong>Example:</strong> Statins (e.g., atorvastatin) + macrolide antibiotics (e.g.,
                                    clarithromycin)
                                    <strong>Risk:</strong> Severe muscle damage (rhabdomyolysis) due to slowed statin
                                    breakdown.

                                </p>
                            </div>

                            <!-- Card 2: Medication Tracker Reminder -->
                            <div class="feature-item mb-5 mb-lg-0" style="box-shadow: 0 4px 20px #15616D;">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-ui-calendar"></i> <!-- Changed icon to calendar -->
                                </div>
                                <span>Stay Organized</span>
                                <h4 class="mb-3">Track Your Medications</h4>
                                <p class="mb-4">
                                    Forgetting doses? Our <strong>Drug Tracker</strong> helps you:
                                    ✓ Set reminders
                                    ✓ Log side effects
                                    ✓ Avoid missed doses
                                    <a href="{{ url('/medication-plan') }}">Try it now!</a>
                                </p>
                            </div>

                            <!-- Card 3: Emergency Warning -->
                            <div class="feature-item mb-5 mb-lg-0" style="box-shadow: 0 4px 20px #15616D;">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-warning"></i> <!-- Changed icon to warning -->
                                </div>
                                <span>Emergency Alert</span>
                                <h4 class="mb-3">Dangerous Reactions</h4>
                                <p class="mb-4">
                                    <strong>Seek help immediately</strong> if you experience:
                                    ✓ Severe dizziness
                                    ✓ Trouble breathing
                                    ✓ Swelling/rash

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Start -->
        <section class="section drug-interaction-checker">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="interaction-form-wrap mt-5 mt-lg-0 text-center" style="box-shadow: 0 4px 20px #15616D;">
                            <h2 class="mb-3 title-color" style="color: #15616D;">Drug - Drug Interaction Checker</h2>
                            <p class="mb-4">
                                Check potential interactions between medications, herbs, or supplements. <br>
                                Enter two medications to analyze their safety if taken together.
                            </p>

                            <form id="interaction-form" method="POST" action="{{ route('check-interaction') }}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="form-group mb-4">
                                            <label for="drug1" class="form-label">Drug 1 </label>
                                            <input type="text" name="drug1" id="drug1" class="form-control text-center"
                                                placeholder="e.g. ibuprofen, Lipitor" required autocomplete="off"
                                                value="{{ $drug1 ?? '' }}">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="drug2" class="form-label">Drug 2 </label>
                                            <input type="text" name="drug2" id="drug2" class="form-control text-center"
                                                placeholder="e.g. warfarin, sertraline" required autocomplete="off"
                                                value="{{ $drug2 ?? '' }}">
                                        </div>

                                        <button type="submit" class="btn px-5"
                                            style="padding: 0.8rem 1.5rem; font-size: 1rem; background-color: #15616D; border-color: #15616D; color:white;">
                                            <i class="icofont-search-2"></i> Check Interactions
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Loading Spinner -->
                            <div class="loading-spinner" id="loading-spinner" style="display: none;">
                                <div class="spinner"></div>
                            </div>

                            <!-- Result Container -->
                            <div id="interaction-result" class="mt-4">
                                @if(isset($message))
                                    <div class="interaction-result @if($hasInteraction) alert-danger @else alert-success @endif"
                                        style="display: block;">
                                        <h4 style="margin-bottom: 1rem; text-align: center;">
                                            @if($hasInteraction)
                                                <i class="icofont-warning-alt"></i> Interaction Found
                                            @else
                                                <i class="icofont-check-circled"></i> No Significant Interaction
                                            @endif
                                        </h4>
                                        <div class="result-content">
                                            {!! nl2br(e($message)) !!}
                                        </div>
                                        <p class="text-muted mt-2" style="font-size: 0.8rem; text-align: center;">
                                            Last checked: {{ now()->format('d/m/Y') }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->







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


        <script src="{{asset('assets/drug-interaction/plugins/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/drug-interaction/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/drug-interaction/plugins/slick-carousel/slick/slick.min.js')}}"></script>
        <script src="{{asset('assets/drug-interaction/plugins/shuffle/shuffle.min.js')}}"></script>
        <script src="{{asset('assets/drug-interaction/js/script.js')}}"></script>
        <!-- ================= -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const carousel = document.querySelector('.auto-carousel');
                const slides = document.querySelectorAll('.carousel-slide');
                let currentIndex = 0;
                const slideInterval = 4000; // 5 seconds

                function showSlide(index) {
                    // Hide all slides
                    slides.forEach(slide => {
                        slide.classList.remove('active');
                        slide.style.transition = 'none'; // Reset transition for instant hide
                    });

                    // Force reflow before showing new slide
                    void carousel.offsetWidth;

                    // Show new slide with smooth transition
                    slides[index].classList.add('active');
                    slides[index].style.transition = 'opacity 1.2s ease-in-out';
                    currentIndex = index;
                }

                function nextSlide() {
                    let newIndex = (currentIndex + 1) % slides.length;
                    showSlide(newIndex);
                }

                // Initialize first slide
                showSlide(0);

                // Start automatic rotation
                let intervalId = setInterval(nextSlide, slideInterval);

                // Pause on hover
                carousel.addEventListener('mouseenter', () => clearInterval(intervalId));
                carousel.addEventListener('mouseleave', () => {
                    intervalId = setInterval(nextSlide, slideInterval);
                });
            });
        </script>


        <script>
            $(document).ready(function () {
                const $form = $('#interaction-form');
                const $result = $('#interaction-result');
                const $spinner = $('#loading-spinner');
                const $drug1Input = $('#drug1');
                const $drug2Input = $('#drug2');

                $form.on('submit', function (e) {
                    e.preventDefault();

                    $spinner.show();
                    $result.fadeOut(200);

                    $.ajax({
                        url: $form.attr('action'),
                        method: $form.attr('method'),
                        data: $form.serialize(),
                        dataType: 'json',
                        success: function (response) {
                            // Build the result HTML directly
                            let resultHtml = `
                                                                                                                                                                                                                                                                                                                                <div class="interaction-result ${response.hasInteraction ? 'alert-danger' : 'alert-success'}" style="display: block;">
                                                                                                                                                                                                                                                                                                                                    <h4 style="margin-bottom: 1rem; text-align: center;">
                                                                                                                                                                                                                                                                                                                                        <i class="icofont-${response.hasInteraction ? 'warning-alt' : 'check-circled'}"></i>
                                                                                                                                                                                                                                                                                                                                        ${response.hasInteraction ? 'Interaction Found' : 'No Significant Interaction'}
                                                                                                                                                                                                                                                                                                                                    </h4>
                                                                                                                                                                                                                                                                                                                                    <div class="result-content">
                                                                                                                                                                                                                                                                                                                                        ${response.message.replace(/\n/g, '<br>')}
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                    <p class="text-muted mt-2" style="font-size: 0.8rem; text-align: center;">
                                                                                                                                                                                                                                                                                                                                        Last checked: ${new Date().toLocaleDateString('en-GB')}
                                                                                                                                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                            `;

                            $result.html(resultHtml);
                            $spinner.hide();
                            $result.fadeIn(300);

                            // Update input fields with the searched values
                            $drug1Input.val(response.drug1);
                            $drug2Input.val(response.drug2);
                        },
                        error: function () {
                            $spinner.hide();
                            $result.html(`
                                                                                                                                                                                                                                                                                                                                <div class="interaction-result alert-danger" style="display: block;">
                                                                                                                                                                                                                                                                                                                                    <h4 style="color: #F44336; margin-bottom: 1rem; text-align: center;">
                                                                                                                                                                                                                                                                                                                                        <i class="icofont-warning-alt"></i> Error
                                                                                                                                                                                                                                                                                                                                    </h4>
                                                                                                                                                                                                                                                                                                                                    <div class="result-content">
                                                                                                                                                                                                                                                                                                                                        Something went wrong. Please try again.
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                            `);
                            $result.fadeIn(300);
                        }
                    });
                });

                // Load previous searches
                if (localStorage.getItem('lastDrug1') && localStorage.getItem('lastDrug2')) {
                    $drug1Input.val(localStorage.getItem('lastDrug1'));
                    $drug2Input.val(localStorage.getItem('lastDrug2'));
                }
            });
        </script>


        <script>
            $(document).ready(function () {
                // Initialize autocomplete for both inputs
                $('#drug1, #drug2').autocomplete({
                    minLength: 2,
                    source: function (request, response) {
                        $.ajax({
                            url: '{{ route("autocomplete-check") }}',
                            dataType: 'json',
                            data: {
                                query: request.term
                            },
                            success: function (data) {
                                response($.map(data, function (item) {
                                    return {
                                        label: item.value,
                                        value: item.value,
                                        type: item.type
                                    };
                                }));
                            },
                            error: function () {
                                response([]);
                            }
                        });
                    },
                    focus: function (event, ui) {
                        $(this).val(ui.item.value);
                        return false;
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.value);
                        return false;
                    }
                }).autocomplete("instance")._renderItem = function (ul, item) {
                    return $("<li>")
                        .append(item.value)
                        .appendTo(ul);
                };
            });
        </script>




    </body>

@endsection

{{--
<h1>Drug Interaction Checker</h1>



<!-- Drug interaction form -->
<form action="{{ route('check-interaction') }}" method="POST">
    @csrf
    <label for="drug1">Enter Drug 1 (Generic or Trade Name):</label>
    <input type="text" name="drug1" required>
    <br>
    <label for="drug2">Enter Drug 2 (Generic or Trade Name):</label>
    <input type="text" name="drug2" required>
    <br>
    <button type="submit">Check Interaction</button>
</form>

<div>
    <!-- Display result message -->
    @if (isset($message))
    <p>{{ $message }}</p>
    @endif
</div>

--}}