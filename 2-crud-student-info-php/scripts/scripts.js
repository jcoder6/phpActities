/* ======================================
      FOR ADDING AND VIEWING MODAL
========================================*/

const addModal = document.querySelector('.add-new-student-modal');
const overlay = document.querySelector('.overlay');
const addBtn = document.querySelector('.add-student-btn');
const closeBtn = document.querySelector('.close-btn');
const closeBtnView = document.querySelector('.close-btn-view');


try {
  window.addEventListener('DOMContentLoaded', () => {
    addBtn.addEventListener('click', () => {
      addModal.classList.toggle('display-none');
      addModal.classList.toggle('modal-active');
      overlay.classList.toggle('display-none');
      overlay.classList.toggle('fade-in');
    })
    
    closeBtn.addEventListener('click', () => {
      addModal.classList.remove('modal-active');
        addModal.classList.add('display-none');
        overlay.classList.add('display-none');
    })
  })
} catch (e) {
  console.log('Something went wrong')
}

try {
  closeBtnView.addEventListener('click', () => {
    location.href="http://localhost/phpActivity/2-crud-student-info-php/";
  })
} catch (error) {
  console.log('nothing in here');
}

/* ======================================
        FOR MESSAGING MODAL
========================================*/

const msg = document.querySelector('.message');
// console.log(msg);
try {
  let msgType = msg.dataset.messagetype;
  window.addEventListener('DOMContentLoaded', () => {
    // console.log(msg);
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
  console.log('Nothing in here');
}

