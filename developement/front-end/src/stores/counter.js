import { defineStore } from 'pinia';

export const useStore = defineStore( 'store', {
  state: () => ({
    Panier: false,
    admin: '',
  }),
  actions: {
    Cookies () {
      localStorage.setItem('admin', 'admin');
      this.state.admin = localStorage.getItem('admin');
      return this.state.admin;
    },

    showPanier() {
      this.Panier = !this.Panier;
      return this.Panier;
    },
    closePanier () {
      
    },
    lecturepanier(){
      return this.Panier;
    },

    setAdminId() {
      this.admin_id = Cookies.get('id');
    }
  },

  getters: {
    //  
  }
})
