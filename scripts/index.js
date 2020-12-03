document.addEventListener('DOMContentLoaded', function() {
  const btnAddComments = document.getElementById('add-comment');
  const modal = document.querySelector('.modal');
  const modalBtnClose = document.querySelector('.modal__btn-close');
  const btnSubmit = document.querySelector('.modal__btn');
  const shadowBlock = document.querySelector('.shadow');
  const xhr = new XMLHttpRequest();
  initModal();
  
  function initModal() {
    if (btnAddComments && modal) {
      btnAddComments.addEventListener('click', showModal);
    }
    
    if (modalBtnClose) {
      modalBtnClose.addEventListener('click', hideModal);
    }
  }
  
  function showModal() {
    modal.classList.add('modal_show');
  
    if (shadowBlock) {
      shadowBlock.classList.add('shadow_active');
    }
  }
  
  function hideModal() {
    modal.classList.remove('modal_show');
  
    if (shadowBlock) {
      shadowBlock.classList.remove('shadow_active');
    }
  }

  function validation(field) {
    field.classList.remove('validate-error');

    if (field.value === '') {
      field.classList.add('validate-error');
      return false;
    }

    return true;
  }
  
  xhr.open('POST', 'data.php');
  xhr.responseType = 'json';

  btnSubmit.addEventListener('click', function() {
    const formInputs = [...document.querySelectorAll('[data-required]')];
    let isValid = formInputs.every(item => validation(item));

    if (isValid) {
      xhr.send(new FormData(document.forms.comment));
    }
  })
  
  xhr.onload = function() {
    if (xhr.status !== 200) {
      alert('Error')
    } else {
      alert('Success');
      console.log(xhr.response);
    }
  }
  
  xhr.onerror = function() {
    alert('request failed')
  }

  });