<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-200 via-pink-300 to-pink-400 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-2xl w-full max-w-md animate-fadeIn border border-pink-300">
    <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">💖 Create Account</h2>

    <form action="<?=site_url('users/create')?>" method="POST" class="space-y-5">
      <!-- First Name -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">First Name</label>
        <input type="text" name="first_name" placeholder="Enter your first name" required
               class="w-full px-4 py-3 border border-pink-300 rounded-xl bg-pink-50 text-gray-800 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">Last Name</label>
        <input type="text" name="last_name" placeholder="Enter your last name" required
               class="w-full px-4 py-3 border border-pink-300 rounded-xl bg-pink-50 text-gray-800 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required
               class="w-full px-4 py-3 border border-pink-300 rounded-xl bg-pink-50 text-gray-800 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-pink-400 to-pink-600 hover:from-pink-500 hover:to-pink-700 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300">
        ✨ Sign Up
      </button>
    </form>
  </div>

  <!-- Small fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>
</body>
</html>