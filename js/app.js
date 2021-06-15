const stripe = require('stripe')('sk_test_51HGpuKHE1xzdsUkJWBlbN9PpYvDZkpuxqS6gEM2Y5Z9HXsOKMDwH0Xmcf9yaEaEqb7rULsE3oDgBwIWlGZKhdxoz00d2hCVlM7');

function createProduct() {
    const product = stripe.products.create({
        name: 'Blonde',
        type: 'good',
        attributes: ['size'],
        description: 'Ambrée des 4 Sucs'
    });
}

function createSku() {
    const sku = stripe.skus.create({
        currency: 'eur',
        inventory: {
            type: 'finite',
            quantity: 500
        },
        price: 300,
        product: 'prod_Hsfdqp6uMrLPJ1',
        attributes: {size: '33cl'}
    });
}

function createOrder () {
    const order = stripe.orders.create({
        currency: 'eur',
        email: 'example@example.com',
        items: [
            {type: 'sku', parent: 'sku_Hsfe5k6oUBpB2T', quantity: 3},
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

createOrder();