<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory - Dark Mode</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-100 font-sans min-h-screen">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-900 to-blue-600 shadow-xl sticky top-0 z-50 backdrop-blur-lg bg-opacity-80">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-white font-bold text-xl tracking-wide drop-shadow-lg">
        User Management
      </a>
      <a href="<?=site_url('reg/logout');?>"
         class="bg-white/10 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-white/20 transition">
         Logout
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-gray-800/70 backdrop-blur-xl shadow-2xl rounded-2xl p-8 border border-gray-700">

      <!-- Logged In User -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-8 bg-gradient-to-r from-blue-700/60 to-blue-500/60 text-white px-6 py-5 rounded-xl shadow-lg text-center">
          <h2 class="text-2xl font-bold mb-1">
            Welcome, <span class="text-blue-300"><?= html_escape($logged_in_user['username']); ?></span>
          </h2>
          <p class="text-lg">
            Role:
            <span class="inline-block px-3 py-1 rounded-full font-semibold
              <?= $logged_in_user['role'] === 'admin' ? 'bg-red-600/30 text-red-300' : 'bg-green-600/30 text-green-300'; ?>">
              <?= html_escape($logged_in_user['role']); ?>
            </span>
          </p>
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-900/50 text-red-300 px-4 py-3 rounded-lg shadow text-center">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold text-gray-100">User Directory</h1>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('users');?>" class="flex w-full md:w-auto">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-gray-600 bg-gray-700/50 text-gray-100 placeholder-gray-400 rounded-l-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded-r-xl transition">
            Search
          </button>
        </form>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-700 shadow-md">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-blue-800 to-blue-600 text-white text-sm uppercase tracking-wide">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700 text-sm">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-gray-700/60 transition duration-200">
                <td class="py-3 px-4 font-medium text-gray-200"><?=($user['id']);?></td>
                <td class="py-3 px-4 text-gray-100 font-semibold"><?=($user['username']);?></td>
                <td class="py-3 px-4 text-gray-400 italic"><?=($user['email']);?></td>
                <td class="py-3 px-4">
                  <span class="px-3 py-1 text-sm font-semibold rounded-full
                    <?= $user['role'] === 'admin' ? 'bg-red-600/30 text-red-300' : 'bg-green-600/30 text-green-300'; ?>">
                    <?=($user['role']);?>
                  </span>
                </td>
                <td class="py-3 px-4 space-x-3">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['id']): ?>
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="px-3 py-1 text-sm rounded-lg bg-blue-600/30 text-blue-300 hover:bg-blue-600 hover:text-white transition duration-200 shadow-sm">
                      Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-3 py-1 text-sm rounded-lg bg-red-600/30 text-red-300 hover:bg-red-600 hover:text-white transition duration-200 shadow-sm">
                      Delete
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination flex gap-2">
          <?= $page; ?>
        </div>
      </div>

      <!-- Create New User -->
      <div class="mt-6 text-center md:text-right">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-medium px-6 py-3 rounded-full shadow-md transition duration-200 transform hover:scale-105">
          Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>