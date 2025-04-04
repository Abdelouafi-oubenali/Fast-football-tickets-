// Données des tribunes
const tribuneData = {
    nord: {
        name: "Tribune Nord",
        categories: [
            {name: "Catégorie 1", price: 70, available: 125},
            {name: "Catégorie 2", price: 45, available: 243},
            {name: "Catégorie 3", price: 25, available: 178}
        ]
    },
    sud: {
        name: "Tribune Sud",
        categories: [
            {name: "Catégorie 1", price: 65, available: 98},
            {name: "Catégorie 2", price: 40, available: 156},
            {name: "Catégorie 3", price: 20, available: 215}
        ]
    },
    est: {
        name: "Tribune Est",
        categories: [
            {name: "VIP", price: 150, available: 45},
            {name: "Catégorie 1", price: 80, available: 112},
            {name: "Catégorie 2", price: 50, available: 184}
        ]
    },
    ouest: {
        name: "Tribune Ouest",
        categories: [
            {name: "VIP", price: 180, available: 32},
            {name: "Catégorie 1", price: 90, available: 86},
            {name: "Catégorie 2", price: 55, available: 147}
        ]
    }
};

let currentTribuneId = '';

let selectedTickets = [];

function selectTribune(tribuneId) {
    const tribune = tribuneData[tribuneId];
    if (!tribune) return;
    
    currentTribuneId = tribuneId;
    
    document.getElementById('ticketInfo').classList.remove('hidden');
    
    document.getElementById('tribuneTitle').textContent = tribune.name;
    
    const categorySelect = document.getElementById('categorySelect');
    categorySelect.innerHTML = '<option value="">Sélectionnez une catégorie</option>';
    
    tribune.categories.forEach((category, index) => {
        const option = document.createElement('option');
        option.value = index;
        option.textContent = `${category.name} - ${category.price}€`;
        categorySelect.appendChild(option);
    });
    
    document.getElementById('unitPrice').textContent = '--';
    document.getElementById('availability').textContent = '--';
    document.getElementById('totalPrice').textContent = '--';
    document.getElementById('quantityInput').value = 1;
    
    const extraServices = document.querySelectorAll('.extra-service');
    extraServices.forEach(service => {
        service.checked = false;
    });
    
    categorySelect.onchange = function() {
        updateTicketInfo(tribuneId);
    };
    
    extraServices.forEach(service => {
        service.onchange = function() {
            updateTotalPrice(tribuneId);
        };
    });
}

function updateTicketInfo(tribuneId) {
    const categoryIndex = document.getElementById('categorySelect').value;
    if (categoryIndex === '') return;
    
    const category = tribuneData[tribuneId].categories[categoryIndex];
    
    document.getElementById('unitPrice').textContent = `${category.price}€`;
    
    const availabilityEl = document.getElementById('availability');
    availabilityEl.textContent = `${category.available} places`;
    
    if (category.available < 50) {
        availabilityEl.className = 'font-semibold text-red-600';
    } else if (category.available < 100) {
        availabilityEl.className = 'font-semibold text-orange-600';
    } else {
        availabilityEl.className = 'font-semibold text-green-600';
    }
    
    updateTotalPrice(tribuneId);
}


function updateTotalPrice(tribuneId) {
    const categoryIndex = document.getElementById('categorySelect').value;
    if (categoryIndex === '') return;
    
    const category = tribuneData[tribuneId].categories[categoryIndex];
    const quantity = parseInt(document.getElementById('quantityInput').value);
    
    let subtotal = category.price * quantity;
    
    let extras = [];
    const extraServices = document.querySelectorAll('.extra-service:checked');
    extraServices.forEach(service => {
        const price = parseInt(service.dataset.price);
        subtotal += price * quantity;
        extras.push({
            name: service.nextElementSibling.textContent.split('(+')[0].trim(),
            price: price
        });
    });
    
    document.getElementById('totalPrice').textContent = `${subtotal}€`;
    
    return {
        tribuneId: tribuneId,
        tribuneName: tribuneData[tribuneId].name,
        categoryIndex: categoryIndex,
        categoryName: category.name,
        unitPrice: category.price,
        quantity: quantity,
        extras: extras,
        subtotal: subtotal
    };
}

function addTicketToSummary(ticketDetails) {
    const ticketId = Date.now();
    selectedTickets.push({
        id: ticketId,
        ...ticketDetails
    });
    
    document.getElementById('emptyTicketMessage').classList.add('hidden');
    
    document.getElementById('totalSummary').classList.remove('hidden');
    
    const ticketElement = document.createElement('div');
    ticketElement.id = `ticket-${ticketId}`;
    ticketElement.className = 'bg-gray-50 p-3 rounded-lg border border-gray-200';
    
    let extrasHtml = '';
    if (ticketDetails.extras.length > 0) {
        extrasHtml = '<div class="mt-2 pl-4 text-sm text-gray-600"><p>Services additionnels:</p><ul class="list-disc pl-4">';
        ticketDetails.extras.forEach(extra => {
            extrasHtml += `<li>${extra.name} (${extra.price}€)</li>`;
        });
        extrasHtml += '</ul></div>';
    }
    
    ticketElement.innerHTML = `
        <div class="flex justify-between items-start">
            <div>
                <h3 class="font-semibold">${ticketDetails.tribuneName}</h3>
                <p>${ticketDetails.categoryName} - ${ticketDetails.unitPrice}€ x ${ticketDetails.quantity}</p>
                ${extrasHtml}
            </div>
            <div class="flex flex-col items-end">
                <p class="font-bold">${ticketDetails.subtotal}€</p>
                <button class="text-red-600 hover:text-red-800 text-sm mt-2" onclick="removeTicket(${ticketId})">
                    Supprimer
                </button>
            </div>
        </div>
    `;
    
    document.getElementById('ticketSummary').appendChild(ticketElement);
    
    updateGrandTotal();
    
    tribuneData[ticketDetails.tribuneId].categories[ticketDetails.categoryIndex].available -= ticketDetails.quantity;
}

function removeTicket(ticketId) {
    const ticketIndex = selectedTickets.findIndex(ticket => ticket.id === ticketId);
    if (ticketIndex === -1) return;
    
    const ticket = selectedTickets[ticketIndex];
    
    tribuneData[ticket.tribuneId].categories[ticket.categoryIndex].available += ticket.quantity;
    
    selectedTickets.splice(ticketIndex, 1);
    
    document.getElementById(`ticket-${ticketId}`).remove();
    
    if (selectedTickets.length === 0) {
        document.getElementById('emptyTicketMessage').classList.remove('hidden');
        document.getElementById('totalSummary').classList.add('hidden');
    }
    
    updateGrandTotal();
}

function updateGrandTotal() {
    let grandTotal = 0;
    selectedTickets.forEach(ticket => {
        grandTotal += ticket.subtotal;
    });
    document.getElementById('grandTotal').textContent = `${grandTotal}€`;
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('decreaseQuantity').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantityInput');
        const currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateTotalPrice(currentTribuneId);
        }
    });

    document.getElementById('increaseQuantity').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantityInput');
        const currentValue = parseInt(quantityInput.value);
        if (currentValue < 10) {
            quantityInput.value = currentValue + 1;
            updateTotalPrice(currentTribuneId);
        }
    });

    document.getElementById('confirmButton').addEventListener('click', function() {
        const categoryIndex = document.getElementById('categorySelect').value;
        if (categoryIndex === '') {
            alert('Veuillez sélectionner une catégorie de place.');
            return;
        }
        
        const ticketDetails = updateTotalPrice(currentTribuneId);
        

        addTicketToSummary(ticketDetails);
        
        document.getElementById('categorySelect').value = '';
        document.getElementById('unitPrice').textContent = '--';
        document.getElementById('availability').textContent = '--';
        document.getElementById('totalPrice').textContent = '--';
        document.getElementById('quantityInput').value = 1;
        
        const extraServices = document.querySelectorAll('.extra-service');
        extraServices.forEach(service => {
            service.checked = false;
        });
        
        alert('Billets ajoutés au panier !');
    });

    document.getElementById('checkoutButton').addEventListener('click', function() {
        alert('Redirection vers la page de paiement...');
    });
});