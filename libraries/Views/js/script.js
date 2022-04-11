window.onload = () => {
    // On récupère tous les boutons d'ouverture de modale
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");
    
    for(let button of modalButtons){
        button.addEventListener("click", function(e){
            // On empêche la navigation
            e.preventDefault();
            // On récupère le data-target
            let target = this.dataset.target
            console.log(target)
            // On récupère la bonne modale
            let modal = document.querySelector(target);
            console.log(modal)
            // On affiche la modale
            modal.classList.add("show");

            // On récupère les boutons de fermeture
            const modalClose = modal.querySelectorAll("[data-dismiss=dialog]");
            const annuler = modal.querySelector('modal-close')
            
            for(let close  of modalClose){
                close.addEventListener("click", () => {
                    modal.classList.remove("show");
                });
            }

            for(let close  of annuler){
                close.addEventListener("click", () => {
                    modal.classList.remove("show");
                });
            }

            // On gère la fermeture lors du clic sur la zone grise
            modal.addEventListener("click", function(){
                this.classList.remove("show");
            });
            // On évite la propagation du clic d'un enfant à son parent
            modal.children[0].addEventListener("click", function(e){
                e.stopPropagation();
            })
        });
    }

}