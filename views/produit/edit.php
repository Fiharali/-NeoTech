<?php
session_start();
include '../partials/navbar.php';
include  __DIR__ . '/../../controller/produit.php';

if (isset($_POST['edit'])) {
    $produitResult = $controller->edit($_POST['id']);
    if ($produitResult) {
        $produit = $produitResult->fetch_assoc();
    } else {
      
        header("location:index.php");
        exit();
    }
} else {
    header("location:index.php");
    exit();
}


?>
<div class=" sm:ml-64 mt-10">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">


        <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
            <form method="post" id="submitForm" action="../../controller/produit.php">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name
                        </label>
                        <input type="hidden" name="id" value="<?= $produit['id'] ?? '' ?>" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder=" Name">
                        <input type="text" name="name" value="<?= $produit['name'] ?? '' ?>" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder=" Name">
                        <span
                            class="text-red-950 ps-5"><?= isset($_SESSION['name']) ? $_SESSION['name']  : '' ; $_SESSION['name'] = ''; ?></span>


                    </div>
                    <div class="sm:col-span-2">
                        <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            prix </label>
                        <input type="number" name="prix" value="<?= $produit['prix'] ?? '' ?>" id="prix"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="prix">
                        <span
                            class="text-red-950 ps-5"><?= isset($_SESSION['prix']) ? $_SESSION['prix']  : '' ; $_SESSION['prix'] = ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="quantite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            quantite </label>
                        <input type="number" name="quantite" value="<?= $produit['quantité'] ?? '' ?>" id="quantite"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="quantite">
                        <span
                            class="text-red-950 ps-5"><?= isset($_SESSION['quantite']) ? $_SESSION['quantite']  : '' ; $_SESSION['quantite'] = ''; ?></span>
                    </div>
                    <div class="mt-12 sm:col-span-2">
                        <input type="submit" name="update"
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