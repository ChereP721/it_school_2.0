document.addEventListener('DOMContentLoaded', function() {
  const btnAddComments = document.getElementById('add-comment');
  const modal = document.querySelector('.modal');
  const modalBtnClose = document.querySelector('.modal__btn-close');
  const btnSubmit = document.querySelector('.modal__btn');
  const shadowBlock = document.querySelector('.shadow');
  const loader = document.querySelector('.loader__wrapper');
  const notification = document.querySelector('.notification');

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

  function setNotification(isSuccess) {
    const noticeTitle = notification.querySelector('.notification__title'),
          noticeText = notification.querySelector('.notification__text');

    if (isSuccess) {
      noticeTitle.classList.add('success');
      noticeTitle.textContent = 'Успешно!';
      noticeText.classList.add('success'); 
      noticeText.textContent = 'Ваш комментарий сохранен!'; 
    } else {
      noticeTitle.classList.add('error');
      noticeTitle.textContent = 'Ошибка!';
      noticeText.classList.add('error');
      noticeText.textContent = 'Что-то пошло не так, пожалуйста, повторите попытку позднее'; 
    }
  }

  function getComment(content) {
    const commentsList = document.querySelector('.comments__list');
    const commetnItem = document.createElement('li');
    commetnItem.classList.add('comments__item');

    const itemContent = `
        <img class="comments__avatar"
        src="https://secure.gravatar.com/avatar/5cdc09662dd539303e316621ec21b6be?s=65&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D65&amp;r=G"
        alt="">
        <div class="comments__wrapper">
          <div class="comments__contact">
            <span class="comments__name">${content.name}</span>
            <time class="comments__time">${content.time}</time>
          </div>
          <p class="comments__desc">${content.comment}</p>
        </div>
    `;
    commetnItem.innerHTML = itemContent;
    commentsList.appendChild(commetnItem);
  }
  
  btnSubmit.addEventListener('click', function() {
    xhr.open('POST', 'data.php');
    xhr.responseType = 'json';

    const formInputs = [...document.querySelectorAll('[data-required]')];
    let isValid = formInputs.every(item => validation(item));

    if (isValid) {
      xhr.send(new FormData(document.forms.comment));
      loader.classList.add('loader__wrapper_show');
    }
  })
  
  xhr.onload = function() {
    if (xhr.status !== 200) {
      loader.classList.remove('loader__wrapper_show');
      setNotification(false);
      notification.classList.add('notification__show');
    } else {
      loader.classList.remove('loader__wrapper_show');
      setNotification(true);
      notification.classList.add('notification__show');

      getComment(xhr.response);
    }
   
    setTimeout(function() {
      hideModal();
      notification.classList.remove('notification__show');
    }, 3000);
  }
  
  xhr.onerror = function() {
    alert('request failed')
  }

});