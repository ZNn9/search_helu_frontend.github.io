
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
</head>

<header class="flex items-center justify-between p-4 border-b border-border">
  <!-- Logo with link -->
  <a href="/search_helu_frontend/home" class="flex items-center">
    <img aria-hidden="true" alt="logo" src="https://openui.fly.dev/openui/24x24.svg?text=🏠" class="mr-2" />
    <span class="text-lg font-bold">Logo</span>
  </a>
  
  <!-- Search bar -->
  <input type="text" placeholder="Search" class="p-2 border border-border rounded" />
  
  <!-- Log in button -->
  <a class="bg-secondary text-secondary-foreground hover:bg-secondary/80 p-2 rounded" href="/search_helu_frontend/account/login"> 
    Log in
  </a>
</header>
