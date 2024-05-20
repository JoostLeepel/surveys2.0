<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe enquête maken</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Nieuwe enquête maken</h1>
            <form action="{{ route('surveys.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titel van de enquête</label>
                    <input type="text" name="title" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Titel van de enquête" required>
                </div>
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving van de enquête</label>
                    <textarea name="description" class="form-textarea w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Beschrijving van de enquête" required></textarea>
                </div>
                <hr class="my-6">
                <h2 class="text-xl font-bold mb-4 text-blue-600">Vragen</h2>
                @for($i = 0; $i < 5; $i++)
                    <div class="mb-6">
                        <label for="question{{$i}}" class="block text-gray-700 text-sm font-bold mb-2">Vraag {{$i + 1}}</label>
                        <input type="text" name="questions[{{$i}}][text]" class="form-input w-full px-4 py-2 mb-4 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Vraag {{$i + 1}}" required>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Opties (gescheiden door komma's)</label>
                        <div class="grid grid-cols-2 gap-4">
                            @for ($j = 0; $j < 4; $j++)
                                <input type="text" name="questions[{{$i}}][options][]" class="form-input w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Optie {{$j + 1}}" required>
                            @endfor
                        </div>
                    </div>
                @endfor
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


