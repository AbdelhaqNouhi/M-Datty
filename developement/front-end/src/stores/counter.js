import { defineStore } from 'pinia';

export const useStore = defineStore( 'store', {
  state: () => ({
    Panier: false,
  }),

  actions: {
    showPanier() {
      this.Panier = !this.Panier;
      return this.Panier;
    },
    closePanier () {
      
    },
    lecturepanier(){
      return this.Panier;
    }
  },

  getters: {
    //  
  }
})
