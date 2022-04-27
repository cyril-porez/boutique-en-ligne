<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formPaiment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <main>
        <h1>PAIEMENT</h1>
        <form action="" method="post">
            <div id="carte-paiement">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-amazon-pay"></i>
                <i class="fa-brands fa-cc-apple-pay"></i>
                <i class="fa-brands fa-cc-amex"></i>
                <i class="fa-brands fa-cc-stripe"></i>
                <i class="fa-brands fa-cc-paypal"></i>
            </div>
            <div>
                <input class="inputCard" type="number" min="1000" max="9999" name="creditCard1" id="creditCard1" required/>
            -
                <input class="inputCard" type="number" min="1000" max="9999" name="creditCard2" id="creditCard2" required/>
            -
                <input class="inputCard" type="number" min="1000" max="9999" name="creditCard3" id="creditCard3" required/>
            -
                <input class="inputCard" type="number" min="1000" max="9999"  name="creditCard4" id="creditCard4" required/>
        <br />
            </div>
        Card Expiry:
        <input name="expiry" id="expiry" type="month" required/>
        <input class="inputCard" type="number" min="100" max="999"  name="creditCard4" id="creditCard4" required/>
        <button type="submit">Payer</button>
    </form>
    </main>
</body>
</html>