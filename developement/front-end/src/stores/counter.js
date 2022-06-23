import Cookies from 'js-cookie';
import { defineStore } from 'pinia';

export const useStore = defineStore( 'store', {
  state: () => ({
    counter:  Cookies.get( 'counter' ) || 0 ,
    Panier: false,
    user: JSON.parse(Cookies.get('user') ?? '{}'),
    totals: [],
  }),
  actions: {
    setUser (user) {
          Cookies.set('user', JSON.stringify(user));
          this.user = user;
    },

    showPanier() {
      this.Panier = !this.Panier;
      return this.Panier;
    },
    lecturepanier(){
      return this.Panier;
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
