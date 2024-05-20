<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">{{ $survey->title }}</h1>
            <p class="text-gray-700 mb-8">{{ $survey->description }}</p>
            <h2 class="text-xl font-bold mb-4 text-blue-600">Questions</h2>
            @foreach($survey->questions as $question)
                <div class="mb-6 p-4 bg-blue-50 rounded-lg shadow-sm">
                    <p class="text-gray-700 text-lg font-bold mb-2">{{ $question->question_text }}</p>
                    <ul class="list-disc pl-6">
                        @if(is_string($question->options))
                            @foreach(json_decode($question->options, true) ?? [] as $option)
                                <li>{{ $option }}</li>
                            @endforeach
                        @else
                            @foreach($question->options ?? [] as $option)
                                <li>{{ $option }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endforeach

            <!-- Voeg hier de link naar het klantenformulier toe -->
            <div class="mt-4">
                <a href="{{ route('show_customer_survey_form', $survey->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Vul enquête in</a>
            </div>
        </div>
    </div>
</body>
</html>
