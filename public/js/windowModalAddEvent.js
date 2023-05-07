// Obtenir la fenêtre modale
var modal = document.getElementById("myModal");

// Obtenir le bouton qui ouvre la fenêtre modale
var btn = document.getElementById("myBtn");

// Obtenir l'élément <span> qui ferme la fenêtre modale
var span = document.getElementsByClassName("close")[0];

// Quand l'utilisateur clique sur le bouton, ouvre la fenêtre modale
btn.onclick = function() {
  modal.style.display = "block";
}

// Quand l'utilisateur clique sur <span> (x), ferme la fenêtre modale
span.onclick = function() {
  modal.style.display = "none";
}

// Quand l'utilisateur clique n'importe où en dehors de la fenêtre modale, la ferme
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
