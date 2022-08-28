
const formAddItems = document.querySelector('.formAddItems');
const addItemsBtn = document.querySelector('#addItemsBtn');
const closeFormItemsBtn = document.querySelector('#formAddItemsClose');
const overlay = document.querySelector('.overlay');

addItemsBtn.addEventListener('click',function(){
    formAddItems.style.transform = 'scale(1)';
    overlay.style.display = 'block';
})


closeFormItemsBtn.addEventListener('click',formItemsHide)
overlay.addEventListener('click',formItemsHide);

function formItemsHide(){
    formAddItems.style.transform = 'scale(0)';
    overlay.style.display = 'none';
}