<?php
include '../partials/navbar.php'

?>
<div class=" sm:ml-64 mt-10">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">


        <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
            <form method="post" id="submitForm">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name </label>
                        <input type="text" name="name"
                            value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder=" Name">
                        <span><?= isset($_POST['name']) ? $error['name'] : ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email </label>
                        <input type="text" name="email"
                            value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Email">
                        <span><?= isset($_POST['email']) ? $error['email'] : ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password </label>
                        <input type="password" name="password"
                            value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="password">
                        <span><?= isset($_POST['password']) ? $error['password'] : ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            role </label>
                        <select name="selectRole" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Choose Role</option>
                            <option value="2"> User</option>
                            <option value="1">Admin </option>
                        </select>
                        <span><?= isset($_POST['selectRole']) ? $error['role'] : ''; ?></span>
                    </div>

                    <div class="mt-12 sm:col-span-2">
                        <input type="submit" name="submit"
                            class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<?php
include '../partials/footer.php'

?>