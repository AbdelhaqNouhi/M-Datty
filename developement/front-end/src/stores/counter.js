import Cookies from 'js-cookie';
import { defineStore } from 'pinia';

export const useStore = defineStore( 'store', {
  state: () => ({
    counter:  Cookies.get( 'counter' ) || 0 ,
    Panier: false,
    user: JSON.parse(Cookies.get('user') ?? '{}'),
    admin: JSON.parse(Cookies.get('admin') ?? '{}'),
    total: 0,
  }),
  actions: {
    setUser (user) {
          Cookies.set('user', JSON.stringify(user));
          this.user = user;
    },

    setAdmin (admin) {
      Cookies.set('admin', JSON.stringify(admin));
      this.admin = admin;
    },

    showPanier() {
      this.Panier = !this.Panier;
      return this.Panier;
    },
    lecturepanier(){
      return this.Panier;
    },

    setAdminId() {
      this.admin_id = Cookies.get('id');
    },

    count (e) {
      Cookies.set('counter', e);
      this.counter = e;
    },
  },

  getters: {
    //  
  }
})
