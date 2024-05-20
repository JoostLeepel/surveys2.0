<!-- create_question.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Create Question</h1>
            <form action="{{ route('store_question') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="question_text" class="block text-gray-700 text-sm font-bold mb-2">Question Text</label>
                    <input type="text" name="question_text" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Enter the question" required>
                </div>
                <div class="mb-6">
                    <label for="options" class="block text-gray-700 text-sm font-bold mb-2">Options (comma-separated)</label>
                    <input type="text" name="options" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Enter options separated by commas" required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Question</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
