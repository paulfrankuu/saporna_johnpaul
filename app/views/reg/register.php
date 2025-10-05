<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Dark Theme</title>

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
    <h2 class="text-3xl font-bold text-center text-cyan-400 mb-6">Register</h2>

    <form method="POST" action="<?= site_url('reg/register'); ?>" class="space-y-5">

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

      <!-- Email -->
      <div>
        <input 
          type="email" 
          name="email" 
          placeholder="Email" 
          required
          class="w-full px-4 py-3 bg-gray-900 text-gray-100 border border-gray-700 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:outline-none placeholder-gray-500"
        >
      </div>

      <!-- Password -->
      <div class="relative">
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Password" 
          required
          class="w-full px-4 py-3 bg-gray-900 text-gray-100 border border-gray-700 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:outline-none placeholder-gray-500"
        >
        <i 
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-cyan-400 hover:text-cyan-300 transition"
          id="togglePassword"
        ></i>
      </div>

      <!-- Confirm Password -->
      <div class="relative">
        <input 
          type="password" 
          id="confirmPassword" 
          name="confirm_password" 
          placeholder="Confirm Password" 
          required
          class="w-full px-4 py-3 bg-gray-900 text-gray-100 border border-gray-700 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:outline-none placeholder-gray-500"
        >
        <i 
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-cyan-400 hover:text-cyan-300 transition"
          id="toggleConfirmPassword"
        ></i>
      </div>

      <!-- Hidden role input -->
      <input type="hidden" name="role" value="user">

      <!-- Register Button -->
      <button 
        type="submit"
        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-200"
      >
        Register
      </button>
    </form>

    <div class="text-center mt-5">
      <p class="text-gray-400 text-sm">
        Already have an account?
        <a href="<?= site_url('reg/login'); ?>" class="text-cyan-400 hover:text-cyan-300 hover:underline font-medium">
          Login here
        </a>
      </p>
    </div>
  </div>

  <!-- Password Toggle Script -->
  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      toggleVisibility('togglePassword', 'password');
      toggleVisibility('toggleConfirmPassword', 'confirmPassword');
    });
  </script>
</body>
</html>