<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
          <div class="flex-shrink-0 flex items-center">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="<?php echo checkURL('/') ? 'text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="/about" class="<?php echo checkURL('/about') ? 'text-white' : 'text-gray-300' ?> hover:text-gray-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
              
              <?php if($_SESSION['user'] ?? false) : ?>
                <a href="/notes" class="<?php echo checkURL('/notes') ? 'text-white' : 'text-gray-300' ?> hover:text-gray-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
              <?php endif ?>

              <a href="/contact" class="<?php echo checkURL('/contact') ? 'text-white' : 'text-gray-300' ?> hover:text-gray-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>
            </div>
          </div>
          </div>
          
          <div class="flex items-center gap-3">
            <?php if($_SESSION['user'] ?? false) : ?>
              <p class="text-white">Hello, <?= $_SESSION['user']['email'] ?></p>
              
              <form action="/logout" method="POST">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="text-white hover:text-gray-500">Logout</button>
              </form>
            <?php else : ?>
              <a href="/register" class="text-white font-medium text-sm mr-4">Register</a>
              <a href="/login" class="bg-indigo-600 text-white px-3 py-2 font-semibold rounded-md">Login</a>
            <?php endif; ?>  
          </div>
      </div>
    </div>
  </nav>