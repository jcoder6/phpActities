const addModal = document.querySelector('.add-new-student-modal');
const overlay = document.querySelector('.overlay');
const addBtn = document.querySelector('.add-student-btn');
const closeBtn = document.querySelector('.close-btn');
const closeBtnView = document.querySelector('.close-btn-view');


addBtn.addEventListener('click', () => {
    addModal.classList.toggle('display-none');
    overlay.classList.toggle('display-none');
})

closeBtn.addEventListener('click', () => {
    addModal.classList.add('display-none');
    overlay.classList.add('display-none');
})

closeBtnView.addEventListener('click', () => {
    location.href="http://localhost/phpActivity/2-crud-student-info-php/";
})

/* ======================================
        FOR MESSAGING MODAL
========================================*/

const msg = document.querySelector('.message');
try {
  let msgType = msg.dataset.messagetype;
  window.addEventListener('DOMContentLoaded', () => {
    console.log(msg);
    if(msgType == 'success'){
      msg.style.color = '#3d3d3d';
      msg.style.backgroundColor = '#96FE8A';
      msg.classList.add('message-active');
    }
  
    if(msgType == 'error'){
      msg.style.backgroundColor = '#F96F6F';
      msg.classList.add('message-active');
    }
  
    setTimeout(() => {
      msg.classList.remove('message-active');
    }, 2000);
  })
  
} catch (e) {
  console.log(e);
}

