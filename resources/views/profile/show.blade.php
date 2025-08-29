@extends('layouts.app')

@section('content')

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
            color: #32325d;
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

        /* .dropdown {
                                                                                                                                                                                                                                                                                                                        position: relative;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-menu {
                                                                                                                                                                                                                                                                                                                        font-size: 1rem;
                                                                                                                                                                                                                                                                                                                        position: absolute;
                                                                                                                                                                                                                                                                                                                        z-index: 1000;
                                                                                                                                                                                                                                                                                                                        top: 100%;
                                                                                                                                                                                                                                                                                                                        left: 0;
                                                                                                                                                                                                                                                                                                                        display: none;
                                                                                                                                                                                                                                                                                                                        float: left;
                                                                                                                                                                                                                                                                                                                        min-width: 10rem;
                                                                                                                                                                                                                                                                                                                        margin: .125rem 0 0;
                                                                                                                                                                                                                                                                                                                        padding: .5rem 0;
                                                                                                                                                                                                                                                                                                                        list-style: none;
                                                                                                                                                                                                                                                                                                                        text-align: left;
                                                                                                                                                                                                                                                                                                                        color: #525f7f;
                                                                                                                                                                                                                                                                                                                        border: 0 solid rgba(0, 0, 0, .15);
                                                                                                                                                                                                                                                                                                                        border-radius: .4375rem;
                                                                                                                                                                                                                                                                                                                        background-color: #fff;
                                                                                                                                                                                                                                                                                                                        background-clip: padding-box;
                                                                                                                                                                                                                                                                                                                        box-shadow: 0 50px 100px rgba(50, 50, 93, .1), 0 15px 35px rgba(50, 50, 93, .15), 0 5px 15px rgba(0, 0, 0, .1);
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-menu.show {
                                                                                                                                                                                                                                                                                                                        display: block;
                                                                                                                                                                                                                                                                                                                        opacity: 1;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-menu-right {
                                                                                                                                                                                                                                                                                                                        right: 0;
                                                                                                                                                                                                                                                                                                                        left: auto;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-menu[x-placement^='top'],
                                                                                                                                                                                                                                                                                                                    .dropdown-menu[x-placement^='right'],
                                                                                                                                                                                                                                                                                                                    .dropdown-menu[x-placement^='bottom'],
                                                                                                                                                                                                                                                                                                                    .dropdown-menu[x-placement^='left'] {
                                                                                                                                                                                                                                                                                                                        right: auto;
                                                                                                                                                                                                                                                                                                                        bottom: auto;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-divider {
                                                                                                                                                                                                                                                                                                                        overflow: hidden;
                                                                                                                                                                                                                                                                                                                        height: 0;
                                                                                                                                                                                                                                                                                                                        margin: .5rem 0;
                                                                                                                                                                                                                                                                                                                        border-top: 1px solid #e9ecef;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-item {
                                                                                                                                                                                                                                                                                                                        font-weight: 400;
                                                                                                                                                                                                                                                                                                                        display: block;
                                                                                                                                                                                                                                                                                                                        clear: both;
                                                                                                                                                                                                                                                                                                                        width: 100%;
                                                                                                                                                                                                                                                                                                                        padding: .25rem 1.5rem;
                                                                                                                                                                                                                                                                                                                        text-align: inherit;
                                                                                                                                                                                                                                                                                                                        white-space: nowrap;
                                                                                                                                                                                                                                                                                                                        color: #212529;
                                                                                                                                                                                                                                                                                                                        border: 0;
                                                                                                                                                                                                                                                                                                                        background-color: transparent;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-item:hover,
                                                                                                                                                                                                                                                                                                                    .dropdown-item:focus {
                                                                                                                                                                                                                                                                                                                        text-decoration: none;
                                                                                                                                                                                                                                                                                                                        color: #16181b;
                                                                                                                                                                                                                                                                                                                        background-color: #f6f9fc;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-item:active {
                                                                                                                                                                                                                                                                                                                        text-decoration: none;
                                                                                                                                                                                                                                                                                                                        color: #fff;
                                                                                                                                                                                                                                                                                                                        background-color: #5e72e4;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-item:disabled {
                                                                                                                                                                                                                                                                                                                        color: #8898aa;
                                                                                                                                                                                                                                                                                                                        background-color: transparent;
                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                    .dropdown-header {
                                                                                                                                                                                                                                                                                                                        font-size: .875rem;
                                                                                                                                                                                                                                                                                                                        display: block;
                                                                                                                                                                                                                                                                                                                        margin-bottom: 0;
                                                                                                                                                                                                                                                                                                                        padding: .5rem 1.5rem;
                                                                                                                                                                                                                                                                                                                        white-space: nowrap;
                                                                                                                                                                                                                                                                                                                        color: #8898aa;
                                                                                                                                                                                                                                                                                                                    } */

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

            /* .dropdown {
                                                                                                                                                                                                                                                                                                                    display: inline-block;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu {
                                                                                                                                                                                                                                                                                                                    min-width: 12rem;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu .dropdown-item {
                                                                                                                                                                                                                                                                                                                    font-size: .875rem;
                                                                                                                                                                                                                                                                                                                    padding: .5rem 1rem;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu .dropdown-item>i {
                                                                                                                                                                                                                                                                                                                    font-size: 1rem;
                                                                                                                                                                                                                                                                                                                    margin-right: 1rem;
                                                                                                                                                                                                                                                                                                                    vertical-align: -17%;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-header {
                                                                                                                                                                                                                                                                                                                    font-size: .625rem;
                                                                                                                                                                                                                                                                                                                    font-weight: 700;
                                                                                                                                                                                                                                                                                                                    padding-right: 1rem;
                                                                                                                                                                                                                                                                                                                    padding-left: 1rem;
                                                                                                                                                                                                                                                                                                                    text-transform: uppercase;
                                                                                                                                                                                                                                                                                                                    color: #f6f9fc;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu a.media>div:first-child {
                                                                                                                                                                                                                                                                                                                    line-height: 1;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu a.media p {
                                                                                                                                                                                                                                                                                                                    color: #8898aa;
                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                .dropdown-menu a.media:hover .heading,
                                                                                                                                                                                                                                                                                                                .dropdown-menu a.media:hover p {
                                                                                                                                                                                                                                                                                                                    color: #172b4d !important;
                                                                                                                                                                                                                                                                                                                } */

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
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control-label {
            position: absolute;
            top: 14px;
            left: 12px;
            color: #6c757d;
            font-size: 0.9rem;
            transition: 0.2s ease all;
            pointer-events: none;
            z-index: 2;
            background-color: transparent;
        }

        /* For input fields */
        .form-control:focus~.form-control-label,
        .form-control:not(:placeholder-shown)~.form-control-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: #f8f9fa;
            background-color: #15616D;
            padding: 0 4px;
            z-index: 1;
            border-radius: .375rem;
        }

        /* For select fields - always move label up */
        select.form-control~.form-control-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: #f8f9fa;
            background-color: #15616D;
            padding: 0 4px;
            z-index: 1;
            border-radius: .375rem;
        }

        .form-control {
            padding: 20px 12px 6px 12px;
            height: auto;
            border-radius: .375rem;
        }

        textarea.form-control {
            height: auto;
        }

        /* Style for select when no option is selected */
        select.form-control:invalid {
            color: #6c757d;
        }

        /* Style for select when an option is selected */
        select.form-control:valid {
            color: inherit;
        }

        .form-control:focus {
            border-color: #15616D;
            box-shadow: 0 0 0 0.2rem rgba(22, 97, 109, 0.25);
        }
    </style>



    <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control-label {
            position: absolute;
            top: 14px;
            left: 12px;
            color: #6c757d;
            font-size: 0.9rem;
            transition: 0.2s ease all;
            pointer-events: none;
            z-index: 2;
            background-color: transparent;
        }

        .display-value {
            padding: 20px 12px 6px 12px;
            height: auto;
            min-height: calc(2.75rem + 2px);
            border-radius: .375rem;
            background-color: #fff;
            border: 1px solid #cad1d7;
            color: #525f7f;
            font-size: 0.875rem;
            margin-bottom: 0;
        }

        /* Make the display look like the focused form fields */
        .display-wrapper {
            position: relative;
        }

        .display-wrapper .form-control-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: #f8f9fa;
            background-color: #15616D;
            padding: 0 4px;
            z-index: 1;
            border-radius: .375rem;
        }

        /* Keep all your existing header styles */
        .header {
            padding-top: 6rem;
            padding-bottom: 8rem;
        }
    </style>

    <!-- <style>
                                                                                                                            /* Your existing styles */
                                                                                                                            .form-group {
                                                                                                                                position: relative;
                                                                                                                                margin-bottom: 1.5rem;
                                                                                                                            }

                                                                                                                            .form-control-label {
                                                                                                                                position: absolute;
                                                                                                                                top: 14px;
                                                                                                                                left: 12px;
                                                                                                                                color: #6c757d;
                                                                                                                                font-size: 0.9rem;
                                                                                                                                transition: 0.2s ease all;
                                                                                                                                pointer-events: none;
                                                                                                                                z-index: 2;
                                                                                                                                background-color: transparent;
                                                                                                                            }

                                                                                                                            .display-value {
                                                                                                                                padding: 20px 12px 6px 12px;
                                                                                                                                height: auto;
                                                                                                                                min-height: calc(2.75rem + 2px);
                                                                                                                                border-radius: .375rem;
                                                                                                                                background-color: #fff;
                                                                                                                                border: 1px solid #cad1d7;
                                                                                                                                color: #525f7f;
                                                                                                                                font-size: 0.875rem;
                                                                                                                                margin-bottom: 0;
                                                                                                                            }

                                                                                                                            .display-wrapper {
                                                                                                                                position: relative;
                                                                                                                            }

                                                                                                                            .display-wrapper .form-control-label {
                                                                                                                                top: -10px;
                                                                                                                                left: 10px;
                                                                                                                                font-size: 0.75rem;
                                                                                                                                color: #f8f9fa;
                                                                                                                                background-color: #15616D;
                                                                                                                                padding: 0 4px;
                                                                                                                                z-index: 1;
                                                                                                                                border-radius: .375rem;
                                                                                                                            }

                                                                                                                            /* PROFILE TABS SPECIFIC STYLES (scoped with #profile-tabs) */
                                                                                                                            #profile-tabs {
                                                                                                                                /* This ensures our tab styles don't leak to navbar */
                                                                                                                            }

                                                                                                                            #profile-tabs .nav-tabs {
                                                                                                                                border-bottom: 2px solid #dee2e6;
                                                                                                                                padding: 0 30px;
                                                                                                                            }

                                                                                                                            #profile-tabs .profile-tab-link {
                                                                                                                                margin-bottom: -2px;
                                                                                                                                border: none;
                                                                                                                                color: #6c757d;
                                                                                                                                font-weight: 500;
                                                                                                                                padding: 12px 20px;
                                                                                                                                cursor: pointer;
                                                                                                                            }

                                                                                                                            #profile-tabs .profile-tab-link.active {
                                                                                                                                color: #15616D;
                                                                                                                                background-color: transparent;
                                                                                                                                border-bottom: 2px solid #15616D;
                                                                                                                            }

                                                                                                                            #profile-tabs .profile-tab-link:hover:not(.active) {
                                                                                                                                color: #15616D;
                                                                                                                                border-bottom: 2px solid #dee2e6;
                                                                                                                            }

                                                                                                                            #profile-tabs .tab-content {
                                                                                                                                padding: 20px 30px;
                                                                                                                            }

                                                                                                                            /* Header adjustments */
                                                                                                                            .header {
                                                                                                                                padding-top: 4rem;
                                                                                                                                padding-bottom: 6rem;
                                                                                                                                min-height: 400px;
                                                                                                                            }

                                                                                                                            .container-fluid.mt--7 {
                                                                                                                                margin-top: -120px !important;
                                                                                                                            }

                                                                                                                            /* Form controls */
                                                                                                                            .form-control {
                                                                                                                                padding: 20px 12px 6px 12px;
                                                                                                                                height: auto;
                                                                                                                                border-radius: .375rem;
                                                                                                                            }

                                                                                                                            textarea.form-control {
                                                                                                                                min-height: 100px;
                                                                                                                            }

                                                                                                                            /* Buttons */
                                                                                                                            .btn-primary {
                                                                                                                                background-color: #15616D;
                                                                                                                                border-color: #15616D;
                                                                                                                            }
                                                                                                                        </style> -->

    <style>
        /* Your existing styles */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control-label {
            position: absolute;
            top: 14px;
            left: 12px;
            color: #6c757d;
            font-size: 0.9rem;
            transition: 0.2s ease all;
            pointer-events: none;
            z-index: 2;
            background-color: transparent;
        }

        .display-value {
            padding: 20px 12px 6px 12px;
            height: auto;
            min-height: calc(2.75rem + 2px);
            border-radius: .375rem;
            background-color: #fff;
            border: 1px solid #cad1d7;
            color: #525f7f;
            font-size: 0.875rem;
            margin-bottom: 0;
        }

        .display-wrapper {
            position: relative;
        }

        .display-wrapper .form-control-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: #f8f9fa;
            background-color: #15616D;
            padding: 0 4px;
            z-index: 1;
            border-radius: .375rem;
        }

        /* Enhanced Profile Tabs Styling */
        #profile-tabs {
            --primary-color: #15616D;
            --secondary-color: #f8f9fa;
            --text-color: #525f7f;
            --border-color: #e9ecef;
            --hover-bg: rgba(21, 97, 109, 0.05);
            --transition-speed: 0.3s;
        }

        #profile-tabs .nav-tabs {
            border-bottom: 2px solid var(--border-color);
            padding: 0;
            margin: 0 30px;
            position: relative;
        }

        #profile-tabs .profile-tab-link {
            margin-bottom: -2px;
            border: none;
            color: var(--text-color);
            font-weight: 600;
            padding: 14px 24px;
            cursor: pointer;
            position: relative;
            transition: all var(--transition-speed) ease;
            background: transparent;
            border-radius: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        #profile-tabs .profile-tab-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-color);
            transform: scaleX(0);
            transition: transform var(--transition-speed) ease;
        }

        #profile-tabs .profile-tab-link.active {
            color: var(--primary-color);
            background-color: transparent;
        }

        #profile-tabs .profile-tab-link.active::after {
            transform: scaleX(1);
        }

        #profile-tabs .profile-tab-link:hover:not(.active) {
            color: var(--primary-color);
            background-color: var(--hover-bg);
        }

        #profile-tabs .tab-content {
            padding: 25px 30px;
            background: #fff;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Header adjustments */
        .header {
            padding-top: 4rem;
            padding-bottom: 6rem;
            min-height: 400px;
            background-position: center center !important;
        }

        .container-fluid.mt--7 {
            margin-top: -120px !important;
        }

        /* Enhanced Form controls */
        .form-control {
            padding: 20px 12px 6px 12px;
            height: auto;
            border-radius: .375rem;
            border: 1px solid #e0e0e0;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus {
            border-color: #15616D;
            box-shadow: 0 0 0 0.2rem rgba(21, 97, 109, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
        }

        /* Enhanced Buttons */
        .btn-primary {
            background-color: #15616D;
            border-color: #15616D;
            padding: 10px 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #0e4c5a;
            border-color: #0e4c5a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Card enhancements */
        /* .card {
                                                                                                                                    border: none;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                                                                                                                                    overflow: hidden;
                                                                                                                                }

                                                                                                                                .card-header {
                                                                                                                                    background: #fff;
                                                                                                                                    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                                                                                                                                    padding: 0;
                                                                                                                                } */

        /* Section headings */
        /* .heading-small {
                                                                                                                                        font-size: 1rem;
                                                                                                                                        text-transform: uppercase;
                                                                                                                                        letter-spacing: 1px;
                                                                                                                                        color: #6c757d;
                                                                                                                                        margin-bottom: 1.5rem;
                                                                                                                                        position: relative;
                                                                                                                                        padding-bottom: 8px;
                                                                                                                                    }

                                                                                                                                    .heading-small::after {
                                                                                                                                        content: '';
                                                                                                                                        position: absolute;
                                                                                                                                        bottom: 0;
                                                                                                                                        left: 0;
                                                                                                                                        width: 40px;
                                                                                                                                        height: 2px;
                                                                                                                                        background: #15616D;
                                                                                                                                    } */
    </style>

    <style>
        /* Add to your existing styles */
        .save-button {
            background-color: #15616D;
            border-color: #15616D;
            color: white;
            transition: all 0.3s ease;
        }

        .save-button:hover {
            background-color: #0e4c5a;
            border-color: #0e4c5a;
            transform: translateY(-1px);
        }

        .save-button:disabled {
            opacity: 0.7;
            transform: none;
        }

        .cancel-button {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
            transition: all 0.3s ease;
        }

        .cancel-button:hover {
            background-color: #5a6268;
            border-color: #545b62;
            transform: translateY(-1px);
        }

        .alert {
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .spinner-border {
            vertical-align: text-top;
        }
    </style>

    <body>
        <div class="main-content">
            <!-- Header -->
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                style="min-height: 400px; background-image: url('{{ asset('assets/welcomee/images/section1.jpg') }}'); background-size: cover; background-position: center top;">
                <span class="mask bg-gradient-default opacity-8"></span>
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-2 text-white">Manage your health!</h1>
                            <p class="text-white mt-0 mb-5"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <div class="container-fluid mt--7">
                <div class="row">
                    <div style="width: 100%; padding: 30px; class=" col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <!-- Bordered Tabs with specific ID -->
                                <div id="profile-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="profile-tab-link active" id="overview-tab" data-bs-toggle="tab"
                                                data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                                aria-selected="true">Overview</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="profile-tab-link" id="edit-tab" data-bs-toggle="tab"
                                                data-bs-target="#edit" type="button" role="tab" aria-controls="edit"
                                                aria-selected="false">Edit Profile</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="profile-tab-link" id="settings-tab" data-bs-toggle="tab"
                                                data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                                aria-selected="false">Check Drug Interactions</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Overview Tab -->
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview-tab">
                                        <!-- User Information -->
                                        <h6 class="heading-small text-muted mb-4">User Information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->full_name }}</div>
                                                        <label class="form-control-label">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->gender }}</div>
                                                        <label class="form-control-label">Gender</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->date_of_birth }}</div>
                                                        <label class="form-control-label">Date of Birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->phone_number }}</div>
                                                        <label class="form-control-label">Phone Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <!-- Medical Information -->
                                        <h6 class="heading-small text-muted mb-4">Medical Information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->blood_type }}</div>
                                                        <label class="form-control-label">Blood Type</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">
                                                            {{ $profile->pregnancy_status ? 'Yes' : 'No' }}
                                                        </div>
                                                        <label class="form-control-label">Pregnancy Status</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->weight }} kg</div>
                                                        <label class="form-control-label">Weight</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group display-wrapper">
                                                        <div class="display-value">{{ $profile->height }} cm</div>
                                                        <label class="form-control-label">Height</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <!-- Medical History -->
                                        <h6 class="heading-small text-muted mb-4">Medical History</h6>
                                        <div class="pl-lg-4">
                                            <div class="form-group display-wrapper">
                                                <div class="display-value">{{ implode(', ', $profile->allergies ?? []) }}
                                                </div>
                                                <label class="form-control-label">Allergies</label>
                                            </div>
                                            <div class="form-group display-wrapper">
                                                <div class="display-value">
                                                    {{ implode(', ', $profile->chronic_conditions ?? []) }}
                                                </div>
                                                <label class="form-control-label">Chronic Conditions</label>
                                            </div>
                                            <div class="form-group display-wrapper">
                                                <div class="display-value">{{ implode(', ', $profile->medications ?? []) }}
                                                </div>
                                                <label class="form-control-label">Medications</label>
                                            </div>
                                            <div class="form-group display-wrapper">
                                                <div class="display-value">{{ implode(', ', $profile->prescription ?? []) }}
                                                </div>
                                                <label class="form-control-label">Prescriptions</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <!-- Additional Information -->
                                        <h6 class="heading-small text-muted mb-4">Additional Information</h6>
                                        <div class="pl-lg-4">
                                            <div class="form-group display-wrapper">
                                                <div class="display-value" style="min-height: 100px;">{{ $profile->notes }}
                                                </div>
                                                <label class="form-control-label">Notes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Profile Tab -->
                                    <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                        <form method="POST" action="{{ route('profile.update') }}" id="profileForm">
                                            @csrf
                                            @method('PUT')

                                            <!-- User Information -->
                                            <h6 class="heading-small text-muted mb-4">User Information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" name="full_name" class="form-control"
                                                                value="{{ $profile->full_name }}" required>
                                                            <label class="form-control-label">Full Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select name="gender" class="form-control" required>
                                                                <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                                <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                            </select>
                                                            <label class="form-control-label">Gender</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="date" name="date_of_birth" class="form-control"
                                                                value="{{ $profile->date_of_birth }}" required>
                                                            <label class="form-control-label">Date of Birth</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" name="phone_number" class="form-control"
                                                                value="{{ $profile->phone_number }}" required>
                                                            <label class="form-control-label">Phone Number</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <!-- Medical Information -->
                                            <h6 class="heading-small text-muted mb-4">Medical Information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" name="blood_type" class="form-control"
                                                                value="{{ $profile->blood_type }}" required>
                                                            <label class="form-control-label">Blood Type</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select name="pregnancy_status" class="form-control" required>
                                                                <option value="1" {{ $profile->pregnancy_status ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ !$profile->pregnancy_status ? 'selected' : '' }}>No</option>
                                                            </select>
                                                            <label class="form-control-label">Pregnancy Status</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" step="0.1" name="weight"
                                                                class="form-control" value="{{ $profile->weight }}"
                                                                required>
                                                            <label class="form-control-label">Weight (kg)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" step="0.1" name="height"
                                                                class="form-control" value="{{ $profile->height }}"
                                                                required>
                                                            <label class="form-control-label">Height (cm)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <!-- Medical History -->
                                            <h6 class="heading-small text-muted mb-4">Medical History</h6>
                                            <div class="pl-lg-4">
                                                <div class="form-group">
                                                    <input type="text" name="allergies" class="form-control"
                                                        value="{{ implode(', ', $profile->allergies ?? []) }}">
                                                    <label class="form-control-label">Allergies (comma separated)</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="chronic_conditions" class="form-control"
                                                        value="{{ implode(', ', $profile->chronic_conditions ?? []) }}">
                                                    <label class="form-control-label">Chronic Conditions (comma
                                                        separated)</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="medications" class="form-control"
                                                        value="{{ implode(', ', $profile->medications ?? []) }}">
                                                    <label class="form-control-label">Medications (comma separated)</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="prescription" class="form-control"
                                                        value="{{ implode(', ', $profile->prescription ?? []) }}">
                                                    <label class="form-control-label">Prescriptions (comma
                                                        separated)</label>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <!-- Additional Information -->
                                            <h6 class="heading-small text-muted mb-4">Additional Information</h6>
                                            <div class="pl-lg-4">
                                                <div class="form-group">
                                                    <textarea name="notes" class="form-control"
                                                        rows="4">{{ $profile->notes }}</textarea>
                                                    <label class="form-control-label">Notes</label>
                                                </div>
                                            </div>

                                            <div class="text-center mt-4">
                                                <button type="submit" class="btn px-5 save-button"
                                                    style="background-color: #15616D; border-color: #15616D; color: white;">Save
                                                    Changes</button>
                                                <!-- <button type="button" class="btn px-5 cancel-button"
                                                                                                    onclick="switchTab('overview')"
                                                                                                    style="background-color: #15616D; border-color: #15616D; color: white;"
                                                                                                    onclick="switchTab('overview')">Cancel</button> -->
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Settings Tab -->
                                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                        <h6 class="heading-small text-muted mb-4">Check Your Own Drug Interactions</h6>
                                        <div class="pl-lg-4">
                                            <form id="interactionForm" action="{{ route('check.drug.interactions') }}"
                                                method="POST" style="margin-top: 10px;">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $profile->user_id }}">
                                                <button type="submit" class="btn "
                                                    style="background-color: #15616D; border-color: #15616D; color: white;">Check
                                                    Interactions</button>
                                            </form>
                                            <div id="interactionResults" style="margin-top: 20px;"></div>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#interactionForm').on('submit', function (e) {
                                                        e.preventDefault(); // Prevent normal form submission

                                                        $.ajax({
                                                            type: 'POST',
                                                            url: $(this).attr('action'),
                                                            data: $(this).serialize(),
                                                            success: function (response) {
                                                                // Build the HTML response
                                                                let html = '<h3>Drug Warnings</h3>';

                                                                if (response.error) {
                                                                    html += `<div class="alert alert-danger">${response.error}</div>`;
                                                                } else if (response.warnings && response.warnings.length > 0) {
                                                                    html += '<ul>';
                                                                    response.warnings.forEach(warning => {
                                                                        html += `<li>${warning.drugs}: ${warning.risk_description} (Severity: ${warning.severity})</li>`;
                                                                    });
                                                                    html += '</ul>';
                                                                } else {
                                                                    html += '<p>No drug interactions found.</p>';
                                                                }

                                                                $('#interactionResults').html(html);
                                                            },
                                                            error: function (xhr) {
                                                                $('#interactionResults').html('<div class="alert alert-danger">An error occurred while checking interactions.</div>');
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6 m-auto text-center">
                        <div class="copyright">
                            <p>&copy; MEDSITE. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Bootstrap JS Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




            <!-- <script>
                                                                    // Function to switch tabs
                                                                    function switchTab(tabId) {
                                                                        const tab = new bootstrap.Tab(document.getElementById(tabId + '-tab'));
                                                                        tab.show();
                                                                    }

                                                                    // Check for success message in session storage on page load
                                                                    document.addEventListener('DOMContentLoaded', function () {
                                                                        const savedAlert = sessionStorage.getItem('profileUpdateAlert');
                                                                        if (savedAlert) {
                                                                            const { type, message } = JSON.parse(savedAlert);
                                                                            showAlert(type, message);
                                                                            sessionStorage.removeItem('profileUpdateAlert');

                                                                            // Switch to overview tab if we have a success message
                                                                            if (type === 'success') {
                                                                                switchTab('overview');
                                                                            }
                                                                        }
                                                                    });

                                                                    document.getElementById('profileForm')?.addEventListener('submit', async function (e) {
                                                                        e.preventDefault();

                                                                        const saveButton = document.querySelector('.save-button');
                                                                        const originalButtonText = saveButton.innerHTML;

                                                                        // Show loading state
                                                                        saveButton.disabled = true;
                                                                        saveButton.innerHTML = `
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...
                                                                `;

                                                                        try {
                                                                            const response = await fetch(this.action, {
                                                                                method: 'POST',
                                                                                body: new FormData(this),
                                                                                headers: {
                                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                                                                    'X-Requested-With': 'XMLHttpRequest'
                                                                                }
                                                                            });

                                                                            // Check if response is JSON or HTML
                                                                            const contentType = response.headers.get('content-type');
                                                                            let data;

                                                                            if (contentType && contentType.includes('application/json')) {
                                                                                data = await response.json();
                                                                            } else {
                                                                                // If HTML response, consider it a success
                                                                                data = { success: true, message: 'Profile updated successfully!' };
                                                                            }

                                                                            if (!response.ok) {
                                                                                if (data.errors) {
                                                                                    const errorMessages = Object.values(data.errors).flat();
                                                                                    throw new Error(errorMessages.join('\n'));
                                                                                }
                                                                                throw new Error(data.message || 'Failed to update profile');
                                                                            }

                                                                            // Store success message before reloading
                                                                            sessionStorage.setItem('profileUpdateAlert', JSON.stringify({
                                                                                type: 'success',
                                                                                message: data.message || 'Profile updated successfully!'
                                                                            }));

                                                                            // Reload the page - the message will show after reload
                                                                            location.reload();

                                                                        } catch (error) {
                                                                            console.error('Error:', error);
                                                                            showAlert('danger', error.message || 'An error occurred while saving');
                                                                        } finally {
                                                                            saveButton.disabled = false;
                                                                            saveButton.innerHTML = originalButtonText;
                                                                        }
                                                                    });

                                                                    // Alert helper
                                                                    function showAlert(type, message) {
                                                                        const existingAlert = document.querySelector('.global-alert');
                                                                        if (existingAlert) existingAlert.remove();

                                                                        const alertDiv = document.createElement('div');
                                                                        alertDiv.className = `global-alert alert alert-${type} alert-dismissible fade show`;
                                                                        alertDiv.style.position = 'fixed';
                                                                        alertDiv.style.top = '20px';
                                                                        alertDiv.style.right = '20px';
                                                                        alertDiv.style.zIndex = '9999';
                                                                        alertDiv.style.maxWidth = '400px';
                                                                        alertDiv.innerHTML = `
                                                                    ${message}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                `;
                                                                        document.body.appendChild(alertDiv);

                                                                        setTimeout(() => {
                                                                            new bootstrap.Alert(alertDiv).close();
                                                                        }, 5000);
                                                                    }
                                                                </script> -->


            <script>
                // Function to switch tabs
                function switchTab(tabId) {
                    const tab = new bootstrap.Tab(document.getElementById(tabId + '-tab'));
                    tab.show();
                }

                // Check for success message in session storage on page load
                document.addEventListener('DOMContentLoaded', function () {
                    const savedAlert = sessionStorage.getItem('profileUpdateAlert');
                    if (savedAlert) {
                        const { type, message, scrollToTop } = JSON.parse(savedAlert);
                        showAlert(type, message);
                        sessionStorage.removeItem('profileUpdateAlert');

                        // Switch to overview tab if we have a success message
                        if (type === 'success') {
                            switchTab('overview');
                        }

                        // Scroll to top if requested
                        if (scrollToTop) {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                    }
                });

                document.getElementById('profileForm')?.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const saveButton = document.querySelector('.save-button');
                    const originalButtonText = saveButton.innerHTML;

                    // Show loading state
                    saveButton.disabled = true;
                    saveButton.innerHTML = `
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...
                                                            `;

                    try {
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this),
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        // Check if response is JSON or HTML
                        const contentType = response.headers.get('content-type');
                        let data;

                        if (contentType && contentType.includes('application/json')) {
                            data = await response.json();
                        } else {
                            // If HTML response, consider it a success
                            data = { success: true, message: 'Profile updated successfully!' };
                        }

                        if (!response.ok) {
                            if (data.errors) {
                                const errorMessages = Object.values(data.errors).flat();
                                throw new Error(errorMessages.join('\n'));
                            }
                            throw new Error(data.message || 'Failed to update profile');
                        }

                        // Store success message and scroll instruction before reloading
                        sessionStorage.setItem('profileUpdateAlert', JSON.stringify({
                            type: 'success',
                            message: data.message || 'Profile updated successfully!',
                            scrollToTop: true
                        }));

                        // Reload the page - the message will show after reload
                        location.reload();

                    } catch (error) {
                        console.error('Error:', error);
                        showAlert('danger', error.message || 'An error occurred while saving');

                        // Scroll to top on error too
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    } finally {
                        saveButton.disabled = false;
                        saveButton.innerHTML = originalButtonText;
                    }
                });

                // Alert helper
                function showAlert(type, message) {
                    const existingAlert = document.querySelector('.global-alert');
                    if (existingAlert) existingAlert.remove();

                    const alertDiv = document.createElement('div');
                    alertDiv.className = `global-alert alert alert-${type} alert-dismissible fade show`;
                    alertDiv.style.position = 'fixed';
                    alertDiv.style.top = '20px';
                    alertDiv.style.right = '20px';
                    alertDiv.style.zIndex = '9999';
                    alertDiv.style.maxWidth = '400px';
                    alertDiv.innerHTML = `
                                                                ${message}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                            `;
                    document.body.appendChild(alertDiv);

                    setTimeout(() => {
                        new bootstrap.Alert(alertDiv).close();
                    }, 5000);
                }
            </script>



    </body>
@endsection


<!-- <div class="container">
                                <h2>My Profile</h2>

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $profile->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $profile->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{ $profile->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $profile->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Blood Type</th>
                                        <td>{{ $profile->blood_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Allergies</th>
                                        <td>{{ implode(', ', $profile->allergies ?? []) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Chronic Conditions</th>
                                        <td>{{ implode(', ', $profile->chronic_conditions ?? []) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Medications</th>
                                        <td>{{ implode(', ', $profile->medications ?? []) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Prescription</th>
                                        <td>{{ implode(', ', $profile->prescription ?? []) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pregnancy Status</th>
                                        <td>{{ $profile->pregnancy_status ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>{{ $profile->weight }} kg</td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <td>{{ $profile->height }} cm</td>
                                    </tr>
                                    <tr>
                                        <th>Notes</th>
                                        <td>{{ $profile->notes }}</td>
                                    </tr>
                                </table>

                                <a href="{{ route('profile') }}" class="btn btn-primary">Update Profile</a>
                            </div> -->