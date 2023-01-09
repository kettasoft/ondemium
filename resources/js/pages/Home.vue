<template>
    <main>
        <Navbar />
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <h1>Welcome to Medilab</h1>
                <h2>
                    We are team of talented designers making websites with Bootstrap
                </h2>
                <a href="#about" class="btn-get-started scrollto">
                    Get Started
                </a>
            </div>
        </section>
        <div>
            <section id="why-us" class="why-us">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="content">
                                <h3>Why Choose Medilab?</h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.</p>
                                <div class="text-center">
                                    <a href="#" class="more-btn">
                                        Learn More <i class="bx bx-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="icon-boxes d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <font-awesome-icon class="i" icon="fa-solid fa-user-doctor" />
                                            <h4>Corporis voluptates sit</h4>
                                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <font-awesome-icon class="i" icon="fa-solid fa-notes-medical" />
                                            <h4>Ullamco laboris ladore pan</h4>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <font-awesome-icon class="i" icon="fa-solid fa-house-medical" />
                                            <h4>Labore consequatur</h4>
                                            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </main>
</template>

<script>
    import Navbar from '../components/Navbar';
    import Footer from '../components/Footer';
    export default {

        components: {
            Navbar,
            Footer
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss">
    #hero {
        width: 100%;
        height: 90vh;
        background: url('https://bootstrapmade.com/demo/templates/Medilab/assets/img/hero-bg.jpg') top center;
        background-size: cover;
        margin-bottom: -200px;
        h1 {
            margin: 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
            text-transform: uppercase;
            color: #2c4964;
        }

        h2 {
            color: #2c4964;
            margin: 10px 0 0 0;
            font-size: 24px;
        }
        .btn-get-started {
            font-family: "Raleway", sans-serif;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 35px;
            margin-top: 30px;
            border-radius: 50px;
            transition: 0.5s;
            color: #fff;
            background: #1977cc;
        }
    }

    section {
        padding: 60px 0;
        overflow: hidden;
    }

    .why-us .icon-boxes .icon-box h4 {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 30px 0;
}

.why-us .icon-boxes .icon-box .i {
    font-size: 40px;
    color: #1977cc;
    margin-bottom: 30px;
}
.why-us .content {
    padding: 30px;
    background: #1977cc;
    border-radius: 4px;
    color: #fff;
}
.why-us .icon-boxes .icon-box {
    text-align: center;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
    padding: 40px 30px;
    width: 100%;
}
.why-us .icon-boxes .icon-box p {
    font-size: 15px;
    color: #848484;
}
.why-us .content h3 {
    font-weight: 700;
    font-size: 34px;
    margin-bottom: 30px;
}
.why-us .content p {
    margin-bottom: 30px;
}
.why-us .content .more-btn {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 30px 8px 30px;
    color: #fff;
    border-radius: 50px;
    transition: all ease-in-out 0.4s;
}
</style>