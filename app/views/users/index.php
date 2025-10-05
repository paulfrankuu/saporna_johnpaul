<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-pink-200 to-pink-300 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-pink-400 to-pink-500 shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4">
      <a href="#" class="text-white font-bold text-xl tracking-wide">💖 User Management</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-3xl p-6 border border-pink-300">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-pink-600">🌸 User Directory</h1>
      </div>

      <!-- Search Bar -->
      <form method="get" action="<?=site_url()?>" class="flex items-center mb-6">
        <input 
          type="text" 
          name="q" 
          value="<?=html_escape($_GET['q'] ?? '')?>" 
          placeholder="🔍 Search student..." 
          class="w-full px-4 py-2 rounded-l-xl border border-pink-300 bg-pink-50 placeholder-pink-400 focus:ring-2 focus:ring-pink-400 focus:outline-none">
        <button type="submit" 
          class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-r-xl shadow-md transition duration-200">
          Search
        </button>
      </form>

      <!-- Table -->
      <div class="overflow-x-auto rounded-2xl shadow-lg border border-pink-200">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-pink-400 to-pink-500 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-pink-100 transition duration-200">
                <td class="py-3 px-4"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['last_name']);?></td>
                <td class="py-3 px-4"><?=($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-pink-200 text-pink-700 text-sm font-medium px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 space-x-2">
                  <a href ="<?=site_url('users/update/'.$user['id']);?>" 
                     class="text-yellow-600 hover:underline font-medium">✏️ Update</a> 
                  <a href ="<?=site_url('users/delete/'.$user['id']);?>"
                     onclick="return confirm('Are you sure you want to delete this record?');"
                     class="text-red-500 hover:underline font-medium">🗑️ Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination flex space-x-2">
          <?=$page ?? ''?>
        </div>
      </div>

      <!-- Button -->
      <div class="mt-6 text-center">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-gradient-to-r from-pink-400 to-pink-600 hover:from-pink-500 hover:to-pink-700 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition duration-300">
          ➕ Add New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>