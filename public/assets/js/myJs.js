
/* Menu */
(() => {
    'use strict'
    document.querySelector('#navbarSideCollapse').addEventListener('click', () => {
        document.querySelector('.offcanvas-collapse').classList.toggle('open')
    })
})()


let btns = document.querySelectorAll('.btn-check');

btns.forEach(function(btn) {
  btn.addEventListener('change', function() {
    let checkedBtn = document.querySelector('.btn-check:checked');
    btns.forEach(function(btn) {
      btn.nextElementSibling.classList.remove('active');
    });
    if (checkedBtn) {
      checkedBtn.nextElementSibling.classList.add('active');
    }
  });
});


// Requête à l'API pour l'adresse autofill
function fetchAddresses(id_input_search, id_select, limit = 5) {
  // alert('fetchAddresse');
  const lieu = document.getElementById(id_input_search).value;
  let select = document.getElementById(id_select);
  if (lieu.length < 3) {
    select.style.display = "none";
    return
  }
  else {
    select.style.display = "block";
  }
  const apiUrl = "https://api-adresse.data.gouv.fr/search/?q=" + lieu + "&limit=" + limit;
  console.log(apiUrl);
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Traiter les résultats de l'API et afficher les adresses dans une liste select
      const addressesList = document.getElementById(id_select);
      addressesList.innerHTML = "";
      data.features.forEach(feature => {
        const listItem = document.createElement('li');
        listItem.textContent = feature.properties.city + ", " + feature.properties.context + ", " + feature.properties.street;
        listItem.addEventListener('click', function() {
          document.getElementById(id_input_search).value = this.textContent;
          select.style.display = "none"; // Cacher la liste de suggestions après avoir sélectionné une option
        });
        addressesList.appendChild(listItem);
      });


    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la récupération des adresses :', error);
    });
}

// Récuperer la valeur du select dans imput et supprime la liste du select
function push_me(opt, id_input_search ) {
  alert('Push me');
  console.log('update');
  let keywordInput = document.getElementById(id_input_search);
  // Récupérer la valeur sélectionnée dans la liste
  let selectedOption = opt.text;
  console.log(id_input_search, selectedOption);
  // Maj la valeur de l'input avec la sélection de l'utilisateur et cache le select
  keywordInput.value = selectedOption;
  opt.parentNode.style.display = "none";
}