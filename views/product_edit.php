<h1>Modifier le produit <?= $product->getName() ?></h1>
<a href="/products/<?= $product->getId() ?>">Retour au produit</a>
<form method="post">
    <label for="name">Nom du produit</label>
    <input type="text" name="name" value="<?= $product->getName() ?>" />
    <label for="name">Numéro de série</label>
    <input type="text" name="serialNumber" value="<?= $product->getSerialNumber() ?>" />
    <label for="name">Prix</label>
    <input type="number" name="price" value="<?= $product->getPrice() ?>" />
    <input type="submit" />
</form>
