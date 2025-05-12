document.addEventListener('DOMContentLoaded', function() {
    // gestion des pop informasionb
    const infoPopup = document.getElementById('infoPopup');
    const openPopupBtn = document.getElementById('openPopup');
    const closePopupBtn = document.getElementById('closePopupBtn');
    const closePopup = document.getElementById('closePopup');
    
    openPopupBtn.addEventListener('click', function() {
        infoPopup.classList.remove('hidden');
    });
    
    closePopupBtn.addEventListener('click', function() {
        infoPopup.classList.add('hidden');
    });
    
    closePopup.addEventListener('click', function() {
        infoPopup.classList.add('hidden');
    });
    
    infoPopup.addEventListener('click', function(e) {
        if (e.target === infoPopup) {
            infoPopup.classList.add('hidden');
        }
    });
    
    const tribuneData = window.tribuneData || {};
    
    window.selectTribune = function(tribune) {
        const ticketInfo = document.getElementById('ticketInfo');
        const tribuneTitle = document.getElementById('tribuneTitle');
        const categorySelect = document.getElementById('categorySelect');
        const availability = document.getElementById('availability');
        
        ticketInfo.classList.remove('hidden');
        
        const data = tribuneData[tribune];
        if (!data) {
            console.error('Tribune non trouvée:', tribune);
            return;
        }
        
        tribuneTitle.textContent = data.name;
        availability.textContent = data.available;
        
        categorySelect.innerHTML = '<option value="">Sélectionnez une catégorie</option>';
        data.categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.price;
            option.textContent = `${category.name} - ${category.price}DH`;
            option.setAttribute('data-name', category.name);
            categorySelect.appendChild(option);
        });
        
        updateUnitPrice();
    };
    
    function updateUnitPrice() {
        const categorySelect = document.getElementById('categorySelect');
        const unitPrice = document.getElementById('unitPrice');
        const quantityInput = document.getElementById('quantityInput');
        const totalPrice = document.getElementById('totalPrice');
        
        const price = parseFloat(categorySelect.value) || 0;
        const quantity = parseInt(quantityInput.value) || 0;
        
        unitPrice.textContent = price ? `${price}DH` : '--';
        totalPrice.textContent = price ? `${(price * quantity).toFixed(2)}DH` : '--';
    }
    
    document.getElementById('categorySelect').addEventListener('change', updateUnitPrice);
    
    document.getElementById('decreaseQuantity').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantityInput');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
            updateUnitPrice();
        }
    });
    
    document.getElementById('increaseQuantity').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantityInput');
        let quantity = parseInt(quantityInput.value);
        if (quantity < 10) {
            quantityInput.value = quantity + 1;
            updateUnitPrice();
        }
    });

    document.getElementById('confirmButton').addEventListener('click', function() {
        const categorySelect = document.getElementById('categorySelect');
        const quantityInput = document.getElementById('quantityInput');
        const tribuneTitle = document.getElementById('tribuneTitle');
        
        if (!categorySelect.value) {
            alert('Veuillez sélectionner une catégorie');
            return;
        }
        
        const ticketData = {
            tribune: tribuneTitle.textContent,
            category: categorySelect.options[categorySelect.selectedIndex].getAttribute('data-name'),
            price: parseFloat(categorySelect.value),
            quantity: parseInt(quantityInput.value),
            total: parseFloat(categorySelect.value) * parseInt(quantityInput.value)
        };
        
        console.log('Ticket à ajouter:', ticketData);
        alert(`${ticketData.quantity} place(s) ${ticketData.category} pour ${ticketData.tribune} ajoutée(s) au panier!`);
        

        addTicketToCart(ticketData);
        
        document.getElementById('ticketInfo').classList.add('hidden');
    });
    

    function addTicketToCart(ticketData) {
        const ticketSummary = document.getElementById('ticketSummary');
        const emptyTicketMessage = document.getElementById('emptyTicketMessage');
        const totalSummary = document.getElementById('totalSummary');
        const grandTotal = document.getElementById('grandTotal');
        

        emptyTicketMessage.classList.add('hidden');
    
        const ticketElement = document.createElement('div');
        ticketElement.className = 'bg-gray-100 p-3 rounded flex justify-between items-center';
        ticketElement.innerHTML = `
            <div>
                <p class="font-semibold">${ticketData.tribune} - ${ticketData.category}</p>
                <input name="tribune" type="hidden" value="${ticketData.tribune}">
                <input name="category" type="hidden" value="${ticketData.category}">
                <input name="quantity" type="hidden" value="${ticketData.quantity}">
                <input name="price" type="hidden" value="${ticketData.price}">
                <input name="total" type="hidden" value="${ticketData.total.toFixed(2)}">
                <p class="text-sm text-gray-600">${ticketData.quantity} x ${ticketData.price}DH</p>
            </div>
            <div class="flex items-center">
                <p class="font-bold text-blue-600 mr-3">${ticketData.total.toFixed(2)}DH</p>
                <button class="text-red-500 hover:text-red-700 remove-ticket">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        `;
        
        ticketSummary.appendChild(ticketElement);
        
        updateGrandTotal();
        
        totalSummary.classList.remove('hidden');
        
        const removeButton = ticketElement.querySelector('.remove-ticket');
        removeButton.addEventListener('click', function() {
            ticketElement.remove();
            updateGrandTotal();
            
            if (ticketSummary.children.length === 1) { 
                emptyTicketMessage.classList.remove('hidden');
                totalSummary.classList.add('hidden');
            }
        });
    }
    
    function updateGrandTotal() {
        const grandTotal = document.getElementById('grandTotal');
        const ticketElements = document.querySelectorAll('#ticketSummary > div:not(#emptyTicketMessage)');
        
        let total = 0;
        ticketElements.forEach(element => {
            const priceText = element.querySelector('.font-bold.text-blue-600').textContent;
            const price = parseFloat(priceText.replace('DH', ''));
            total += price;
        });
        
        grandTotal.textContent = `${total.toFixed(2)}DH`;
    }
    
    document.getElementById('checkoutButton').addEventListener('click', function() {
        alert('Redirection vers la page de paiement...');
    });
});