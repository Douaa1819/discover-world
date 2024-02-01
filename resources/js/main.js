
    document.addEventListener('DOMContentLoaded', function () {
      var modal = document.getElementById('crud-modal');
      var openModalButton = document.querySelector('[data-modal-toggle="crud-modal"]');
      var closeModalButtons = document.getElementById('close');
  
      openModalButton.addEventListener('click', function () {
        modal.classList.remove('hidden');
      });
  
      closeModalButtons.addEventListener('click', function () {
          modal.classList.add('hidden');
        });
      });
