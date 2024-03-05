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
      <div class="flex justify-between my-4">
        <h3 class="text-2xl">All Notes</h3>
        <a href="/notes/create" class="text-xl text-blue-500 hover:underline">Create a Note</a>
      </div>

      <div class="my-6 flex gap-6 flex-wrap">
            <?php foreach($notes as $note) : ?>
                <div class="p-6 bg-white rounded-xl cursor-pointer">
                    <a href="/note?id=<?php echo $note['id']?>">
                        <h2 class="text-black text-xl"> <?= htmlspecialchars($note['body']) ?></h2>
                        <p class="text-gray-400 text-sm my-3">At: <?= $note['created_at'] ?></p>
                        <h5>Author: <?= $note['name'] ?></h5>
                    </a>
                </div>
            <?php endforeach ?>  
       </div>
      
    </div>
  </main>
</div>

<?php require basePath('views/partials/footer.php') ?>

</body>
</html>