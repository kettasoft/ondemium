<script setup>
  import { reactive, ref } from 'vue';
  // import VueCookies from 'vue-cookies';

  let form = reactive({
    first_name: '',
    last_name: '',
    gender: 'Select your gender',
    date_birth: '',
    phone: '',
    country_code: '',
    password: '',
  });

  let errors = ref('')

  const login = async() => {
    axios.post('/api/user/auth/signup', form).then(response => {
      if (response.data.success) {
        let token = response.data.data.token;
        $cookies.set('XSRF_TOKEN', token);
        this.$router.push('Home');
      } else if(errors.value) {
          errors.value = response.data.data
        } else {
          errors.value = {}
        }
    }).catch((error) => {
      console.log(errors)
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
	<section class="vh-100" style="background-color: rgb(245, 245, 245);">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-5">
        <div class="card text-black m-auto" style="border-radius: 24px; width: 456px;">
          <div class="card-body py-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-12 order-2 order-lg-1">

                <div class="d-flex flex-column text-center">
                  <p class="title text-center h2 fw-bold mb-2 mx-1 mx-md-4">
                    Sign Up to Ondemium
                  </p>
                  <div class="sub-title">
                    dasdsada
                  </div>
                </div>

                <form class="mx-1" @submit.prevent="login" >

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill me-1">
                      <input type="text" placeholder="First name" id="first_name" class="form-control form-control-lg" v-model="form.first_name" />
                      <span v-if="errors.first_name" class="text-danger">{{errors.first_name[0]}}</span>
                    </div>
                    <div class="form-outline flex-fill ms-1">
                      <input type="text" placeholder="Last name?" id="last_name" class="form-control form-control-lg" v-model="form.last_name" />
                      <span v-if="errors.last_name" class="text-danger">{{errors.last_name[0]}}</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill me-1 col-9">
                      <input
                      type="text"
                      placeholder="Enter phone"
                      id="phone"
                      class="form-control form-control-lg"
                      v-model="form.phone" />
                      <span v-if="errors.phone" class="text-danger">
                        {{errors.phone[0]}}
                      </span>
                    </div>
                    <div class="form-outline flex-fill ms-1 mb-0 col-3">
                      <input
                      type="text"
                      placeholder="Postal code"
                      id="postal_code"
                      class="form-control form-control-lg"
                      v-model="form.country_code" />

                      <span v-if="errors.country_code" class="text-danger">
                        {{errors.country_code[0]}}
                      </span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                      <select class="form-select form-control-lg" v-model="form.gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      <span v-if="errors.gender" class="text-danger">{{errors.gender[0]}}</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                      <!-- <label class="form-label" for="password">Password</label> -->
                      <input type="date" placeholder="Date of birth" id="date_birth" class="form-control form-control-lg" v-model="form.date_birth" />
                      <span v-if="errors.date_birth" class="text-danger">{{errors.date_birth[0]}}</span>
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
                    <button type="submit" class="btn bUezPs">Continue</button>
                  </div>

              <div class="hint">
                By joining and creating an account, you agree to BlockSite collecting information about your use of the product in order to improve and personalize our service, and using personal information you provide solely for customer support purposes, all according to our 
                <a href="/privacy" target="_blank" class="">Privacy Policy</a> and <a href="/terms" target="_blank" class="sc-kTLmzF gPVaEe">
                Terms of Use</a>.</div>

                <div data-automation="already-member" class="sc-dwsnSq dovPMe">Already a member?</div>
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
</template>

<style lang="scss">

  .avatar {
    width: 100px;
    height: 100px;
    background: #bdbdbd;
    margin: auto;
    margin: 20px auto;
    margin-top: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
  }
  .card {
    box-shadow: rgb(96 97 112 / 16%) 0px 4px 8px 0px, rgb(40 41 61 / 4%) 0px 0px 2px 0px;
  }
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

.hint {
    font-size: 11px;
    color: rgb(166, 166, 166);
    margin-top: 24px;

    a {
      font-size: 11px;
      font-weight: 500;
      text-align: center;
      color: rgb(33, 33, 33);
      cursor: pointer;
      text-decoration: underline;
    }
}

.dovPMe {
    font-size: 14px;
    font-weight: 500;
    text-align: center;
    color: rgb(33, 33, 33);
    text-decoration: underline;
    margin-top: 24px;
    cursor: pointer;
}
</style>