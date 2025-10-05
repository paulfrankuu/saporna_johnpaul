<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Dark Theme</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen flex items-center justify-center font-sans">

  <div class="bg-gray-800/80 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn border border-gray-700">
    <h2 class="text-3xl font-bold text-center text-cyan-400 mb-6">Login</h2>

    <?php if (!empty($error)): ?>
      <div class="bg-red-900/50 text-red-400 border border-red-700 rounded-xl p-3 text-center mb-4">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('reg/login') ?>" class="space-y-5">
      <!-- Username -->
      <div>
        <input 
          type="text" 
          name="username" 
          placeholder="Username" 
          required
          class="w-full px-4 py-3 bg-gray-900 text-gray-100 border border-gray-700 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:outline-none placeholder-gray-500"
        >
      </div>

      <!-- Password with toggle -->
      <div class="relative">
        <input 
          type="password" 
          name="password" 
          id="password" 
          placeholder="Password" 
          required
          class="w-full px-4 py-3 bg-gray-900 text-gray-100 border border-gray-700 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:outline-none placeholder-gray-500"
        >
        <i 
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-cyan-400 hover:text-cyan-300 transition" 
          id="togglePassword">
        </i>
      </div>

      <!-- Login Button -->
      <button 
        type="submit"
        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-200"
      >
        Login
      </button>
    </form>

    <div class="text-center mt-5">
      <p class="text-gray-400 text-sm">
        Don’t have an account?
        <a href="<?= site_url('reg/register'); ?>" class="text-cyan-400 hover:text-cyan-300 hover:underline font-medium">Register here</a>
      </p>
    </div>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    });
  </script>
</body>
</html>