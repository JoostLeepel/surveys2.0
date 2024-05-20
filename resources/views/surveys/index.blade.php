<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquêtes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-8 text-center text-indigo-600">Enquêtes</h1>
            <div class="mb-8 text-center">
                <a href="{{ route('surveys.create') }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105">Enquête maken</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="bg-indigo-100 px-6 py-4 border-b border-gray-200 text-left text-gray-600 font-semibold">Titel</th>
                            <th class="bg-indigo-100 px-6 py-4 border-b border-gray-200 text-left text-gray-600 font-semibold">Omschrijving</th>
                            <th class="bg-indigo-100 px-6 py-4 border-b border-gray-200 text-left text-gray-600 font-semibold">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surveys as $survey)
                        <tr class="hover:bg-gray-100 transition duration-200 ease-in-out">
                            <td class="px-6 py-4 border-b border-gray-200">{{ $survey->title }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $survey->description }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <div class="flex space-x-2">
                                    <a href="{{ route('surveys.show', $survey->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Bekijken</a>
                                    <a href="{{ route('surveys.edit', $survey->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Bewerken</a>
                                    <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Verwijderen</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
