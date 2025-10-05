<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User - Dark</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen flex items-center justify-center font-sans text-gray-100">

  <div class="bg-gray-800/80 backdrop-blur-xl p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700 animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-blue-400 mb-6 drop-shadow">
      Update User
    </h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-4">
      
      <!-- Username -->
      <div>
        <input type="text" name="username" value="<?= html_escape($user['username'])?>" required
               placeholder="Username"
               class="w-full px-4 py-3 bg-gray-700/60 border border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-100 placeholder-gray-400">
      </div>

      <!-- Email -->
      <div>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               placeholder="Email Address"
               class="w-full px-4 py-3 bg-gray-700/60 border border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-100 placeholder-gray-400">
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <!-- Role Dropdown for Admins -->
        <div>
          <select name="role" required
                  class="w-full px-4 py-3 bg-gray-700/60 border border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-100">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- Password Field for Admins -->
        <div class="relative">
          <input type="password" name="password" id="password"
                 placeholder="Leave blank to keep current password"
                 class="w-full px-4 py-3 bg-gray-700/60 border border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-100 placeholder-gray-400">
          <button type="button" id="togglePassword"
                  class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-400 focus:outline-none">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Update User
      </button>
    </form>

    <!-- Return Button -->
    <a href="<?=site_url('/users');?>"
       class="mt-4 block text-center bg-gray-700/50 hover:bg-gray-700 text-gray-200 py-2 rounded-xl shadow transition duration-200">
      Return to Home
    </a>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
          const type = password.type === 'password' ? 'text' : 'password';
          password.type = type;

          const icon = this.querySelector("i");
          icon.classList.toggle("fa-eye");
          icon.classList.toggle("fa-eye-slash");
        });
      }
    });
  </script>

  <!-- Fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>

  <!-- FontAwesome for the eye icon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>