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