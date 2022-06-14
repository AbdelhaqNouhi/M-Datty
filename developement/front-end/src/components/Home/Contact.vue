<script setup>
 
 
</script>

<template>
    <div class="contact">
        <!-- <div class="first"> -->
            <div class="info">
                    <h2>Contact Us</h2>
                    <div class="help">
                        <img src="../../assets/images/contact/contact.svg" alt="">
                        <p>+33 5 32 59 26 62</p>
                    </div>
                    <div class="help">
                        <img src="../../assets/images/contact/email.svg" alt="">
                        <p>contact.datty@gmail.com</p>
                    </div>
                    <div class="help">
                        <img src="../../assets/images/contact/time.svg" alt="">
                        <p>Monday - Saturday: 09:00 am - 18:00 pm</p>
                    </div>
                    <div class="media">
                        <img src="../../assets/images/contact/twiter.svg" alt="">
                        <img src="../../assets/images/contact/facebook.svg" alt="">
                        <img src="../../assets/images/contact/instagram.svg" alt="">
                    </div>
            </div>
            <div class="form">
                <h5>LAny question or remarks? Just  fill up the form</h5>
                <div class="inputs">
                    <div class="input">
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="text" name="prenome" placeholder="Prenome">
                    </div>
                    <div class="input">
                        <input type="email" name="email" placeholder="E-mail">
                        <input type="tel" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="msg">
                     <textarea name="message" placeholder="Message"></textarea>
                </div>
                    <button>Send Message</button>
            </div>
    <!-- </div> -->
    </div>
</template>

<style lang="scss" scoped>
@import "../../assets/Scss/variable";
@import "../../assets/Scss/media";

.contact {
    display: flex;
    flex-direction: column-reverse;
    border-radius: 0.5rem;
    margin: 2rem 1rem;
    background-color: rgba(212, 199, 160, 0.1);

    @include desktop {
        display: flex;
        flex-direction: row;
        gap: 5rem;
        align-items: center;
        margin: 5rem 8rem;
    }
}
.info {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 2rem;

    h2 {
        padding: 2rem
    }
}

.help {
    width: 100%;
    display: flex;
    gap: 1rem;
    padding: 1rem 2rem;
    border-radius: 1rem;

    img {
      width: 1.2rem;
    }
  }
.media {
    margin: 4rem 2rem;
    display: flex;
    gap: 3rem;
}

.form {
   display: flex;
    flex-direction: column;
    gap: 3rem;
    width: 100%;
    padding: 2rem 2rem;
    border-radius: 2rem;

    @include desktop {

    }

     input {
         width: 100%;
        padding: 0.5rem;
        border: none;
        border-radius: 0.2rem;
    }
    button {
        width: 100%;
        border: none;
        border-radius: 0.2rem;
        background-color: $header-color;
        color: white;
        padding: 0.8rem;

        @include desktop {
            width: 46%;
            margin-left: auto;
        }
    }
}

.inputs {
    display: flex;
    flex-direction: column;
    gap: 3rem;
}
.input {
    display: flex;
    flex-direction: column;
    gap: 2rem;

    @include desktop {
        display: flex;
        flex-direction: row;
        height: 2.5rem;
    }
}
.msg {
    textarea{
        width: 100%;
        padding: 0.5rem;
        border: none;
        border-radius: 0.2rem;  

        @include desktop {
            // max-width: 40rem;
            // min-width: 40rem;
            // height: 5rem;
            
        }
    }
}
</style>