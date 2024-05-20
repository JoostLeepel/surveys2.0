<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Survey Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Customer Survey Form</h1>
            <form action="{{ route('submit_customer_survey', ['survey' => $survey]) }}" method="POST">
    @csrf
                @foreach($survey->questions as $question)
                    <div class="mb-6">
                        <label for="question{{$question->id}}" class="block text-gray-700 text-sm font-bold mb-2">{{ $question->question_text }}</label>
                        <select name="answers[{{ $question->id }}]" class="form-select w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" required>
                            <option value="">Select an answer</option>
                            @foreach(json_decode($question->options, true) ?? [] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>

            <!-- Aangepaste submit knop om naar het formulier voor het maken van een vraag te gaan -->
            <form action="{{ route('create_question_form') }}" method="GET">
                @csrf
                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Question</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
