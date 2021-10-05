<template>
    <header :class="{ 'scrolled-nav': scrolledNav }">
        <nav>
            <div class="branding">
                <div class="pp">Digital Food</div>
            </div>
            <ul v-show="!mobile" class="navigation">
                <li><router-link class="link" to="/all">Product List</router-link></li>
                <li><router-link class="link" to="/create">Create Product</router-link></li>
            </ul>
            <div class="">
                <div class="icon">
                    <i @click="toggleMobileNav" v-show="mobile" class="fas fa-bars" :class="{ 'icon-active': mobileNav }"></i>
                </div>
            </div>
            <transition name="mobile-nav">
                <ul v-show="mobileNav" class="dropdown-nav">
                    <li><p>Menu</p></li>
                    <li><router-link class="link" to="/all">Product List</router-link></li>
                    <li><router-link class="link" to="/create">Create Product</router-link></li>
                </ul>
            </transition>
        </nav>
    </header>  
</template>      
                <!-- <div class="content">
                
                    <nav role="navigation">
                        <div id="menuToggle">
                            <input type="checkbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                            <ul id="menu">
                                <li><a><router-link to="/" class="nav-item nav-link">Products List</router-link></a></li>
                                <li><a><router-link to="/create" class="nav-item nav-link">Create Product</router-link></a></li>
                                <li><a><router-link to="/test" class="nav-item nav-link">Test</router-link></a></li>
                            </ul>
                        </div>
                    </nav>
                </div> -->

 
<script>
    export default {
        name: "navigation",
        data() {
            return {
                scrolledNav: null,
                mobile: null,
                mobileNav: null,
                windowWidth: null,
            };
        },
        created() {
            window.addEventListener("resize", this.checkScreen);
            this.checkScreen();
        },
        mounted() {
            window.addEventListener("scroll", this.updateScroll);
        },
        methods: {
            toggleMobileNav() {
                this.mobileNav = !this.mobileNav;
            },

            updateScroll() {
                const scrollPosition = window.scrollY;
                if (scrollPosition > 50) {
                    this.scrolledNav = true;
                    return;
                }
                this.scrolledNav = false;
            },

            checkScreen() {
                this.windowWidth = window.innerWidth;
                if (this.windowWidth <= 750) {
                    this.mobile = true;
                    return;
                }
                this.mobile = false;
                this.mobileNav = false;
                return;
            },
        },
    };
</script>

<style lang="scss" scoped>
    header {
        background-color: rgba(77, 169, 255);
        z-index: 99;
        width: 100%;
        position: sticky;
        transition: 0.5s ease all;
        color: #fff;

        nav {
            display: flex;
            position: relative;
            flex-direction: row;
            padding: 12px 0;
            transition: 0.5s ease all;
            width: 90%;
            margin: 0 auto;
            @media (min-width: 1140) {
                max-width: 1140px;
            }

            ul,
            .link {
                font-weight: 500;
                color: #fff;
                list-style: none;
                text-decoration: none;
            }

            ul {
                margin-bottom: 0 !important;
            }

            li {
                text-transform: uppercase;
                padding: 10px;
                margin-left: 16px;
            }

            .link {
                font-size: 14px;
                transition: 0.5s ease all;
                padding-bottom: 4px;
                border-bottom: 1px solid transparent;

                &:hover {
                    color: #80afea;
                    border-color: #80afea;
                }
            }

            .branding {
                display: flex;
                align-items: center;

                .pp {
                    font-family: 'Montserrat', sans-serif;
                    font-weight: 600;
                    font-size: 20px;
                    transition: 0.5s ease all;
                }
            }

            .box {
                padding: 22px;
            }

            .navigation {
                display: flex;
                align-items: center;
                flex: 1;
                justify-content: flex-end;
            }

            .icon {
                display: flex;
                align-items: center;
                position: absolute;
                top: 0;
                right: 0;
                height: 100%;

                i {
                    cursor: pointer;
                    font-size: 24px;
                    transition: 0.8s ease all;
                }
            }

            .icon-active {
                transform: rotate(180deg);
            }

            .dropdown-nav {
                display: flex;
                flex-direction: column;
                position: fixed;
                width: 100%;
                max-width: 250px;
                height: 100%;
                background-color: #fff;
                top: 0;
                left: 0;
                box-shadow: 1px 0 5px -2px #888;

                li {
                    margin-left: 0;
                    .link {
                        color: #000;
                    }
                    p {
                        color: #000;
                        font-family: 'Montserrat', sans-serif;
                        font-size: 18px;
                        font-weight: 600;
                    }
                }
            }

            .mobile-nav-enter-active,
            .mobile-nav-leave-active {
                transition: 1s ease all;
            }

            .mobile-nav-enter-from,
            .mobile-nav-leave-to {
                transform: translateX(-250px);
            }

            .mobile-nav-enter-to {
                transform: translateX(0);
            }

        }
    }

    .scrolled-nav {
        background-color: #000;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.6)

        nav {
            padding: 8px 0;
        }
    }
</style>