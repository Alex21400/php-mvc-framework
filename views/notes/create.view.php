<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">

<div class="min-h-full">
  <?php require basePath('views/partials/nav.php') ?>

  <?php require basePath('views/partials/header.php') ?>
  <main>
    <div class="mx-auto max-w-3xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes">
           <div class="sm:overflow-hidden shadow sm:rounded-md p-3">
                <h4 class="text-xl font-semibold my-5">Please fill the required fields</h4>
                    <label for="body" class="font-semibold">Description</label>
                    <div class="mt-1">
                        <textarea name="body" id="body" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?= $_POST['body']  ?? '' ?></textarea>
                        <p class="text-sm text-red-500 mt-2"><?= $errors['body'] ?? '' ?></p>
                    </div>
                <button class="mt-5 px-4 py-3 font-semibold text-md rounded-md bg-gray-700 text-white">Add Note</button>
           </div>
        </form>
    </div>
  </main>
</div>

<?php require basePath('views/partials/footer.php') ?>

</body>
</html>