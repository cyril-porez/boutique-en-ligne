<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header>
    </header>
    <main>
    <section id="grand-container">
        <div class="articles-panier">
            <table>
                <thead>
                    <th class="article">Article</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="article">
                            <img src="images/gantCarnage.webp" alt="">
                            <div>
                                <h4>Gants de Boxe Carnage YKZ21</h4>
                                <p>Taille de gants: 12 0z</p>
                            </div>
                        </td>
                        <td>
                            <p>79,99€</p>
                        </td>
                        <td>
                            <input type="number" name="quantite" id="">
                        </td>
                        <td>
                            <p>79,99€</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-group">
                <input class="btn-mdc"type="submit" value="mettre de coté">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <hr>
            <button type="submit">Vider le panier</button>
        </div>
        <div id="resume">
            <h2>Résumé</h2>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td><p>Sous-total HT</p></td>
                        <td><p>66,66€</p></td>
                    </tr>
                    <tr>
                        <td><p>TVA</p></td>
                        <td><p>13,33€</p></td>
                    </tr>
                    <tr>
                        <td><p>Total TTC</p></td>
                        <td><p>79,99€</p></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Finaliser la commande</button>
        </div>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>