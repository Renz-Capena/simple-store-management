const allPrice = document.querySelectorAll('#soldPrice');
const totalSoldResult = document.querySelector('#totalSoldResult');

let totalPrice = 0;

for(let i = 0 ; i < allPrice.length ; i++){
    totalPrice = totalPrice + Number(allPrice[i].innerText)
}

totalSoldResult.textContent = totalPrice

//DELETE QUESTION
const overlay = document.querySelector('.overlay');
const deleteInventory_wrapper = document.querySelector('.deleteInventory_wrapper');
const deleteThisInventoryBtn = document.querySelector('#deleteThisInventoryBtn');
const noBtn = document.querySelector('#noBtn');

deleteThisInventoryBtn.addEventListener('click',function(){
    overlay.style.display = 'block';
    deleteInventory_wrapper.style.transform = 'scale(1)';
})

overlay.addEventListener('click',closePopUp)
noBtn.addEventListener('click',closePopUp)

function closePopUp(){
    overlay.style.display = 'none';
    deleteInventory_wrapper.style.transform = 'scale(0)';
}

