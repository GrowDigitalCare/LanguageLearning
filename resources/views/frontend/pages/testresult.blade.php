<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .result-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
        }

        .result-message {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }

        .score {
            font-size: 24px;
            color: #blue;
            font-weight: bold;
        }

        .try-again-btn {
            display: inline-block;
            background-color: blue;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .try-again-btn:hover {
            background-color: #333;
        }

        .result-details {
            margin-top: 20px;
            text-align: left;
        }

        .result-details p {
            margin: 5px 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .result-container {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1s ease-out, scaleIn 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8);
            }

            to {
                transform: scale(1);
            }
        }

        .result-title {
            color: #333;
            font-size: 30px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .result-message {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out;
        }

        .animated-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            animation: fadeIn 1s ease-out, slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(10px);
            }

            to {
                transform: translateY(0);
            }
        }

        .animated-button:hover {
            background-color: #0056b3;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <h1>Quiz Result</h1>
        <p class="result-message">Congratulations! You've completed the quiz.</p>

        <p class="score">Your Score: {{ $latestResult['attempt']->percentage }}%</p>
        {{-- <p class="score">Your Score: {{ $latestResult['attempt']->marks_obtained }} / {{ $latestResult['total_marks'] }}</p> --}}

        <div class="result-details">
            <table style="width:100%">
                <tr>
                    <th>User Name:</th>
                    <td>{{ $latestResult['attempt']->user->name }}</td>
                </tr>
                {{-- <tr>
                    <th>Subject Name:</th>
                    <td>{{ $latestResult['attempt']->subject->name }}</td>
                </tr> --}}
                <tr>
                    <th>Test Title:</th>
                    <td>{{ $latestResult['attempt']->test->title }}</td>
                </tr>
                <tr>
                    <th>Total Marks (All Questions):</th>
                    <td>{{ $latestResult['total_marks'] }}</td>
                </tr>
                <tr>
                    <th>Marks Obtained (All Questions):</th>
                    <td>{{ $latestResult['mark'] }}</td>
                </tr>
                <tr>
                    <th>Total MCQs:</th>
                    <td>{{ $latestResult['total_mcq'] }}</td>
                </tr>
                {{-- <tr>
                    <th>MCQs Attempted:</th>
                    <td>{{ $latestResult['attempt']->mcqs_attempted }}</td>
                </tr>
                <tr>
                    <th>Marks Obtained (MCQs):</th>
                    <td>{{ $latestResult['attempt']->mcqs_marks_obtained }}</td>
                </tr> --}}
                <tr>
                    <th>Percentage:</th>
                    <td>{{ number_format(($latestResult['attempt']->marks_obtained / $latestResult['total_marks']) * 100) }}%</td>
                </tr>
                <tr>
                    <th>Remarks:</th>
                    @if ($latestResult['passmarks'] <= $latestResult['mark'])
                        <td style="color: green">Passed</td>
                    @else
                        <td style="color: red">Failed</td>
                    @endif
                </tr>
            </table>
        </div>
        <br><br>
        <a href="/" class="try-again-btn">Back</a>
    </div>
</body>

</html>
