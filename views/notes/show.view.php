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
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      
    <a href="/notes" class="text-md text-blue-500 my-4">&larr; Back to Notes</a>

    <div class="p-4 bg-white rounded-xl max-w-lg mx-auto relative">
        <h2 class="text-black text-xl"> <?= htmlspecialchars($note['body']) ?></h2>
        <p class="text-gray-400 text-sm my-3">At: <?= $note['created_at'] ?></p>
        <h5>Author: <?= $note['name'] ?></h5>
        <form action="/note" class="absolute top-5 right-5" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $note['id'] ?>">
          <button class="text-lg text-blue-500 hover:underline">Delete</button>
        </form>

        <a href="/notes/edit?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline text-lg">Edit Note</a>
    </div>
    </div>
  </main>
</div>

<?php require basePath('views/partials/footer.php') ?>

</body>
</html>