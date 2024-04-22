<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
</head>
<body>
    <h2>Category Details</h2>

    <div>
        <p><strong>Category Name:</strong> {{ $category->name }}</p>
        <!-- Add other category details here if needed -->
    </div>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>
