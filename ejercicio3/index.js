let invoices = [
    {
      customer: {
        name: "Coca Cola",
        type: "B2B"
      },
      paid: false,
      items: [
        { subtotal: 1234.44, description: 'asdfg' },
        { subtotal: 5678.88, description: 'qwerty' }
      ]
    },
    {
      customer: {
        name: "Juan Perez",
        type: "B2C"
      },
      paid: false,
      items: [
        { subtotal: 5556.54, description: 'asdfg' },
        { subtotal: 9632.21, description: 'qwerty' }
      ]
    },
    {
      customer: {
        name: "John Smith",
        type: "B2C"
      },
      paid: true,
      items: [
        { subtotal: 1234.44, description: 'asdfg' },
        { subtotal: 5678.88, description: 'qwerty' }
      ]
    },
    {
      customer: {
        name: "Esteban Quito",
        type: "B2C"
      },
      paid: false,
      items: [
        { subtotal: 895.7, description: 'asdfg' },
        { subtotal: 8542.34, description: 'qwerty' },
        { subtotal: 9674.95, description: 'qwerty' }
      ]
    }
  ];


let notPaidInvoices = invoices.filter(invoice => !invoice.paid);
let totalB2B = 0;
let totalB2C = 0;
   
notPaidInvoices.map(invoice => {

    let total = invoice.items.reduce((acc, item) => acc + item.subtotal, 0);
    console.log(`Customer: ${invoice.customer.name}, El cliente debe: ${total}`);

    if(invoice.customer.type === "B2B"){
        totalB2B += total;
    }

    if(invoice.customer.type === "B2C"){
        totalB2C += total;
    }
    
});

console.log(`Total deuda de clientes tipo B2B: $${Math.round(totalB2B*100)/100}`);
console.log(`Total deuda de clientes tipo B2C: $${Math.round(totalB2C*100)/100}`);