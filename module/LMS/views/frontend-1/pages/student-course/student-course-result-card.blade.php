@extends('frontend-1.layout.app')

@section('content')
    <style>
        .advice-style {
            color: #787878;
        }
    </style>
    <style>
        :root {
            --gradient: linear-gradient(180deg, rgba(143,140,195,1) 0%, rgba(53,41,200,1) 50%);
            --gradient-2: linear-gradient(180deg, rgba(88,79,245,1) 0%, rgba(59,48,189,1) 53%);
            --gradient-3: linear-gradient(180deg, rgba(59,18,187,1) 35%, rgba(102,87,255,1) 83%);

            --clr-accent-1: 0, 100%, 67%;
            --clr-accent-2: 39, 100%, 56%;
            --clr-accent-3: 166, 100%, 37%;
            --clr-accent-4: 234, 85%, 45%;



            --ff-default: 'Hanken Grotesk', sans-serif;

            --fw-regular: 500;
            --fw-bold: 700;
            --fw-black: 800;

            --fs-400: 1.125rem;
            --fs-500: 1.25rem;
            --fs-600: 1.5rem;
            --fs-700: 1.75rem;
            --fs-800: 2rem;
            --fs-900: 5rem;
        }

        /* Resets */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        * {
            margin: 0;
            font: inherit;
        }
        /* ----------------------------- */

        /* layout staff */

        .flex-group {
            display: flex;
            align-items: center;
            gap: .4rem;
            flex-wrap: nowrap;
        }

        .grid-flow {
            display: grid;
            align-content: start;
            gap: .7rem;
        }

        /* ----------------------------- */

        .grid-flow[data-spacing="large"] {
            gap: 2rem;
        }


        .sections-title {
            font-weight: var(--fw-bold);
            font-size: var(--fs-600);
        }

        .button {
            color: white;
            line-height: 1;
            background: #2f364f;
            padding: 1rem 2rem;
            border: 0;
            border-radius: 100vw;
            cursor: pointer;
        }

        .button:hover,
        .button:focus-visible {
            background: var(--gradient);
        }

        .result-summary {
            --padding: 2rem;
            --border-radius: 2rem;
            max-width: 46rem;
            display: grid;
        }

        .summary {
            padding: var(--padding);
            display: grid;
            align-content: space-between;
        }

        .your-results {
            padding-inline: calc(var(--padding) * 1.6);
            padding-block: var(--padding);
            color: #efefef;
            text-align: center;
            background: var(--gradient-2);
            border-radius:  0 0 var(--border-radius) var(--border-radius);
        }

        .result-score {
            display: grid;
            place-content: center;
            width: 12rem;
            margin-inline: auto;
            background: var(--gradient-3);
            aspect-ratio: 1 / 1;
            border-radius: 100vw;
        }

        .result-score span {
            display: block;
            font-size: var(--fs-900);
            font-weight: var(--fw-black);
            line-height: 1;
            color: #efefef;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-radius: .5rem;
            background-color: hsl(var(--item-color), .2);
        }

        .summary-item svg {
            stroke: hsl(var(--item-color));
        }

        .summary-items-title {
            font-weight: var(--fw-bold);
            color: hsl(var(--item-color));
        }

        .summary-item[data-item-type="accent-1"]{
            --item-color: var(--clr-accent-1);
        }

        .summary-item[data-item-type="accent-2"]{
            --item-color: var(--clr-accent-2);
        }

        .summary-item[data-item-type="accent-3"]{
            --item-color: var(--clr-accent-3);
        }

        .summary-item[data-item-type="accent-4"]{
            --item-color: var(--clr-accent-4);
        }

        .summary-score {
            color: #131313;
            opacity: .8;
        }

        .summary-score span {
            font-weight: var(--fw-black);
            opacity: 1;
        }

        /* Media Query */
        /* desktop size */
        @media (width > 36em){


            .result-summary {
                margin-inline: 1rem;
                grid-template-columns: 1fr 1fr;
                border-radius: var(--border-radius);
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            }

            .your-results {
                border-radius: var(--border-radius);
            }
        }

    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <div align="center">
             <div class="result-summary"> <!-- whole card -->

                            <div class="your-results grid-flow" data-spacing="large"> <!-- blue box -->
                                <h1 class="sections-title text-white">Your Result</h1>
                                <p class="result-score"><span>
                                        @if($resultCard->grade == 'competency')
                                            {{ $lmsSettings->course_competency_full_mark }}
                                        @elseif($resultCard->grade == 'credit transfer')
                                            {{ $lmsSettings->course_credit_transfer_mark }}
                                        @elseif($resultCard->grade == 'not yet started')
                                            {{ $lmsSettings->course_not_yet_started_mark }}
                                        @endif
                                    </span> of 100</p>
                                <div class="grid-flow">
                                    <p class="result-rank">{{ $resultCard->grade }}</p>
                                    <p>{{ $resultCard->advice }}</p>
                                </div>
                            </div>

                            <div class="summary"> <!--white box -->
                                <h2 class="sections-title">Summary of {{ $resultCard->course->title }}</h2>
                                <div class="grid-flow">
                                    <div class="summary-item" data-item-type="accent-1">
                                        <div class="flex-group">
                                            <svg class="summary-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M10.833 8.333V2.5l-6.666 9.167h5V17.5l6.666-9.167h-5Z"/></svg>
                                            <h3 class="summary-items-title">Assignment</h3>
                                        </div>
                                        <p class="summary-score"><span>{{ $resultCard->total_assignment_mark }}</span></p>
                                    </div>

                                    <div class="summary-item" data-item-type="accent-2">
                                        <div class="flex-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M5.833 11.667a2.5 2.5 0 1 0 .834 4.858"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M3.553 13.004a3.333 3.333 0 0 1-.728-5.53m.025-.067a2.083 2.083 0 0 1 2.983-2.824m.199.054A2.083 2.083 0 1 1 10 3.75v12.917a1.667 1.667 0 0 1-3.333 0M10 5.833a2.5 2.5 0 0 0 2.5 2.5m1.667 3.334a2.5 2.5 0 1 1-.834 4.858"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M16.447 13.004a3.334 3.334 0 0 0 .728-5.53m-.025-.067a2.083 2.083 0 0 0-2.983-2.824M10 3.75a2.085 2.085 0 0 1 2.538-2.033 2.084 2.084 0 0 1 1.43 2.92m-.635 12.03a1.667 1.667 0 0 1-3.333 0"/></svg>
                                            <h3 class="summary-items-title">AI Quiz</h3>
                                        </div>
                                        <p class="summary-score"><span>{{ $resultCard->total_manual_exam_mark }}</span></p>
                                    </div>

                                    <div class="summary-item" data-item-type="accent-3">
                                        <div class="flex-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M7.5 10h5M10 18.333A8.333 8.333 0 1 0 1.667 10c0 1.518.406 2.942 1.115 4.167l-.699 3.75 3.75-.699A8.295 8.295 0 0 0 10 18.333Z"/></svg>
                                            <h3 class="summary-items-title">Exam</h3>
                                        </div>
                                        <p class="summary-score"><span>{{ $resultCard->total_ai_quiz_mark }}</span></p>
                                    </div>

                                    <div class="summary-item" data-item-type="accent-4">
                                        <div class="flex-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M10 11.667a1.667 1.667 0 1 0 0-3.334 1.667 1.667 0 0 0 0 3.334Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M17.5 10c-1.574 2.492-4.402 5-7.5 5s-5.926-2.508-7.5-5C4.416 7.632 6.66 5 10 5s5.584 2.632 7.5 5Z"/></svg>
                                            <h3 class="summary-items-title">Attendance</h3>
                                        </div>
                                        <p class="summary-score"><span>80%</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>

@endsection
