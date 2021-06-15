function createOrder () {
    const order = stripe.orders.create({
        currency: 'eur',
        email: 'example@example.com',
        items: [
            {type: 'sku', parent: 'sku_Hsfe5k6oUBpB2T', quantity: 5},
            {type: 'sku', parent: 'sku_Hsfh8UtyisKD4Y'}
        ],
        shipping: {
            name: 'Jean Dujardin',
            address: {
                line1: '12 Rue Principale',
                city: 'Paris',
                state: 'FR',
                country: 'FR',
                postal_code: '75000',
            },
        },
    });
    console.log('La commande a bien été créer');
}

window.onload = () => {
    let stripe = Stripe('pk_test_51HGpuKHE1xzdsUkJK0KxPk6lXNOM93IlY2IFD3x7qeAZxSWNCaf1VUZ56Mq5Ar6BJABkL28hTklnCAYVELC9YZZx00hcVIov9x')
    let elements = stripe.elements()
    let redirect = "./index.php?payment=success"

    let cardHolderName = document.getElementById('cname')
    let cardButton = document.getElementById('submit-btn')
    let clientSecret = cardButton.dataset.secret;

    let card = elements.create('card')
    card.mount("#card-elements")

    card.addEventListener("change", (event) => {
        let displayError = document.getElementById('card-errors')
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    })

    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {name: cardHolderName.value}
                }
            }
        ).then((result) => {
            if (result.error) {
                document.getElementById('errors').innerText = result.error.message
            } else {
                createOrder()
                document.location.href = redirect
            }
        })
    })
}