<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
  <script type="text/javascript">
    window.tailwind.config = {
      darkMode: ['class'],
      theme: {
        extend: {
          colors: {
            border: 'hsl(var(--border))',
            input: 'hsl(var(--input))',
            ring: 'hsl(var(--ring))',
            background: 'hsl(var(--background))',
            foreground: 'hsl(var(--foreground))',
            primary: {
              DEFAULT: 'hsl(var(--primary))',
              foreground: 'hsl(var(--primary-foreground))'
            },
            secondary: {
              DEFAULT: 'hsl(var(--secondary))',
              foreground: 'hsl(var(--secondary-foreground))'
            },
            destructive: {
              DEFAULT: 'hsl(var(--destructive))',
              foreground: 'hsl(var(--destructive-foreground))'
            },
            muted: {
              DEFAULT: 'hsl(var(--muted))',
              foreground: 'hsl(var(--muted-foreground))'
            },
            accent: {
              DEFAULT: 'hsl(var(--accent))',
              foreground: 'hsl(var(--accent-foreground))'
            },
            popover: {
              DEFAULT: 'hsl(var(--popover))',
              foreground: 'hsl(var(--popover-foreground))'
            },
            card: {
              DEFAULT: 'hsl(var(--card))',
              foreground: 'hsl(var(--card-foreground))'
            },
          },
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer base {
        :root {
          --background: 0 0% 100%;
          --foreground: 240 10% 3.9%;
          --card: 0 0% 100%;
          --card-foreground: 240 10% 3.9%;
          --popover: 0 0% 100%;
          --popover-foreground: 240 10% 3.9%;
          --primary: 240 5.9% 10%;
          --primary-foreground: 0 0% 98%;
          --secondary: 240 4.8% 95.9%;
          --secondary-foreground: 240 5.9% 10%;
          --muted: 240 4.8% 95.9%;
          --muted-foreground: 240 3.8% 46.1%;
          --accent: 240 4.8% 95.9%;
          --accent-foreground: 240 5.9% 10%;
          --destructive: 0 84.2% 60.2%;
          --destructive-foreground: 0 0% 98%;
          --border: 240 5.9% 90%;
          --input: 240 5.9% 90%;
          --ring: 240 5.9% 10%;
          --radius: 0.5rem;
        }
        .dark {
          --background: 240 10% 3.9%;
          --foreground: 0 0% 98%;
          --card: 240 10% 3.9%;
          --card-foreground: 0 0% 98%;
          --popover: 240 10% 3.9%;
          --popover-foreground: 0 0% 98%;
          --primary: 0 0% 98%;
          --primary-foreground: 240 5.9% 10%;
          --secondary: 240 3.7% 15.9%;
          --secondary-foreground: 0 0% 98%;
          --muted: 240 3.7% 15.9%;
          --muted-foreground: 240 5% 64.9%;
          --accent: 240 3.7% 15.9%;
          --accent-foreground: 0 0% 98%;
          --destructive: 0 62.8% 30.6%;
          --destructive-foreground: 0 0% 98%;
          --border: 240 3.7% 15.9%;
          --input: 240 3.7% 15.9%;
          --ring: 240 4.9% 83.9%;
        }
      }
    </style>
</head>

<body>
  <?php include __DIR__ . '/../shared/header_tiktok.php'; ?>
  <div class="flex flex-col h-screen bg-background">
    <div class="flex flex-1">
      <?php include __DIR__ . '/../shared/sibebar_left_tiktok.php'; ?>
      <main class="flex-1 p-4">
        <div class="flex items-center justify-between">
          <div>
            <h1 class="text-2xl font-bold">upvox_</h1>
            <p class="text-muted-foreground">11 posts • 41 followers • 17 following</p>
            <p class="mt-2 font-semibold">Upvox</p>
            <p class="text-muted-foreground">Your favourite fun clips</p>
            <p class="text-muted-foreground">in your language</p>
          </div>
          <button class="bg-primary text-primary-foreground hover:bg-primary/80 p-2 rounded-lg">Edit profile</button>
        </div>
        <div class="mt-4 flex space-x-4">
          <button class="p-2 border-b-2 border-primary">Posts</button>
          <button class="p-2 border-b-2 border-muted">Videos</button>
          <button class="p-2 border-b-2 border-muted">Saved</button>
          <button class="p-2 border-b-2 border-muted">Liked</button>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
          <?php
          for ($i = 0; $i < 8; $i++) { ?>
            <div class="h-48 bg-muted rounded-lg"></div>
          <?php } ?>
        </div>
      </main>
    </div>
</body>

</html>