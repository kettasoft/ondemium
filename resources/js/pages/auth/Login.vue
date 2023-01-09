<script setup>
  import { reactive, ref } from 'vue';

  let form = reactive({
    phone: '',
    password: '',
    remember: false
  });

  let errors = ref('')

  const login = async() => {
    axios.post('/api/user/auth/login', form).then(response => {
      if (response.data.success) {
        window.localStorage.setItem('token', response.data.data.token);
      } else {
          errors.value = response.data.data
        }
    }).catch((error) => {
      if (error.response.status === 402) {
        const Toast = Vue.swal.mixin({
          toast: true,
          position: 'bottom-end',
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Vue.swal.stopTimer)
            toast.addEventListener('mouseleave', Vue.swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'error',
          title: 'Phone number or password incorrect'
        })
      }
    })
  }
</script>
<template>
<main>
  <section class="vh-100" style="background-color: rgb(245, 245, 245);">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-5">
          <div class="card text-black m-auto" style="width: 456px;">
            <div class="card-body py-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-12 order-2 order-lg-1">

                  <div class="d-flex flex-column text-center">
                    <p class="title text-center h2 fw-bold mb-2 mx-1 mx-md-4">
                      Sign in to Ondemium
                    </p>
                    <div class="sub-title">
                      Take control of your time
                    </div>
                  </div>

                  <div class="d-flex flex-column align-items-center">
                    <div data-automation="sign-in-with-google" class="sc-gSQFLo rEpxu">
                      <img src="https://user.blocksite.co/images/google-icon.png" class="sc-lbhJGD koIxbT">
                      <div data-automation="sign-in-with-google-text" class="sc-iNGGcK dlobOK">
                      Sign in with Google
                    </div>
                    <div></div>
                  </div>

                  <div data-automation="sign-in-with-google" class="sc-gSQFLo rEpxu">
                      <img src="https://user.blocksite.co/images/facebook-icon.png" class="sc-lbhJGD koIxbT">
                      <div data-automation="sign-in-with-google-text" class="sc-iNGGcK dlobOK">
                      Sign in with Facebook
                    </div>
                    <div></div>
                  </div>

                  <div data-automation="sign-in-with-google" class="sc-gSQFLo rEpxu">
                      <img src="https://user.blocksite.co/images/apple-icon.png" class="sc-lbhJGD koIxbT">
                      <div data-automation="sign-in-with-google-text" class="sc-iNGGcK dlobOK">
                      Sign in with Apple
                    </div>
                    <div></div>
                  </div>
                  </div>

                  <div class="hnonof">OR</div>

                  <form class="mx-1" @submit.prevent="login" >

                    <div class="d-flex flex-row align-items-center mb-3">
                      <div class="form-outline flex-fill mb-0">
                        <!-- <label class="form-label" for="phone">Your phone number</label> -->
                        <input type="text" placeholder="What`s your email?" id="phone" class="form-control form-control-lg" v-model="form.phone" />
                        <span v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-3">
                      <div class="form-outline flex-fill mb-0">
                        <!-- <label class="form-label" for="password">Password</label> -->
                        <input type="password" placeholder="Enter password" id="password" class="form-control form-control-lg" v-model="form.password" />
                        <span v-if="errors.password" class="text-danger">{{errors.password[0]}}</span>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary">Continue</button>
                    </div>

                    <div class="sc-bTfYFJ bzbroT">
                      <router-link to="/signup" class="sc-kHOZwM dkudpE">
                        Don`t have an account?
                      </router-link>
                      <div data-automation="forgot-password?" class="sc-kHOZwM dkudpE">
                        Forgot password?
                      </div>
                    </div>

                  </form>

                </div>
                <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                   https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp 
                  <img src="/images/draw_doctor_kw-5-l.svg"
                    class="img-fluid" alt="Sample image">

                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
</template>

<style lang="scss">
  .subTitle {
    font-size: 14px;
    font-weight: 500;
    color: rgb(166, 166, 166);
    margin-bottom: 12px;
  }

  .rEpxu {
    display: flex;
    flex-direction: row;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-top: 12px;
    width: 100%;
    height: 40px;
    border-radius: 8px;
    background-color: rgb(242, 242, 242);
    cursor: pointer;
    padding: 15px;
    box-sizing: border-box;
    border: 1px solid rgb(245, 245, 245);
    transition: background-color 0.3s linear 0s;

    .koIxbT {
      width: 23px;
      height: 23px;
    }

    .dlobOK {
      font-size: 14px;
      font-weight: bold;
      color: rgb(115, 115, 115);
    }
  }

  .hnonof {
    font-size: 14px;
    font-weight: 500;
    color: rgb(166, 173, 201);
    text-align: center;
    margin: 16px 0px;
  }

  .bUezPs {
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    background-color: rgb(60, 193, 150);
    border-radius: 8px;
    padding: 8px 24px;
    font-weight: bold;
    font-size: 14px;
    line-height: 16px;
    min-height: 40px;
    width: 100%;
    color: rgb(255, 255, 255);
    cursor: pointer;
    box-sizing: border-box;
    text-align: center;
    transition: background-color 0.3s linear 0s;
  }

  .bzbroT {
    display: flex;
    flex-flow: row wrap;
    width: 100%;
    -webkit-box-pack: center;
    justify-content: center;
    column-gap: 12px;
}

.dkudpE {
    font-size: 14px;
    font-weight: 500;
    color: rgb(33, 33, 33);
    align-self: flex-start;
    margin-top: 24px;
    cursor: pointer;
    text-decoration: underline;
}
</style>
